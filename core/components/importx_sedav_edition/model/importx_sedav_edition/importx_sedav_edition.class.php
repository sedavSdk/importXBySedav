<?php 
class importX_sedav_edition {
    public $modx;
    public $config = [];
    public $data = '';
    public $type = 'csv';
    /* @var prepareImport $prepClass*/
    private $prepClass = null;
    public $preparedData = [];
    public $errors = [];
    public $defaults = [];
    public $post = [];
    
    function __construct (modX $modx, array $config = []) {
        $this->modx = $modx;
 
        $basePath = $this->modx->getOption('importx_sedav_edition.core_path',$config,$this->modx->getOption('core_path').'components/importx_sedav_edition/');
        $assetsUrl = $this->modx->getOption('importx_sedav_edition.assets_url',$config,$this->modx->getOption('assets_url').'components/importx_sedav_edition/');
        $this->config = array_merge([
            'basePath' => $basePath,
            'corePath' => $basePath,
            'modelPath' => $basePath . 'model/',
            'processorsPath' => $basePath . 'processors/',
            'chunksPath' => $basePath . 'elements/chunks/',
            'jsUrl' => $assetsUrl . 'js/',
            'cssUrl' => $assetsUrl . 'css/',
            'assetsUrl' => $assetsUrl,
            'connectorUrl' => $assetsUrl . 'connector.php',
            'templatesPath' => $basePath . 'templates/',
            'separator' => ';'
        ],$config);
        $this->modx->lexicon->load('importx_sedav_edition:default');
        
        $this->type = $this->modx->getOption('importx_sedav_edition.datatype',null,'csv');
        
    }

    public function initialize() {
        $this->getDefaults();
        $this->setExecutionLimit();
        $this->modx->request->registerLogging($this->post);
        
        $this->config['separator'] = (isset($this->post['separator']) && !empty($this->post['separator'])) ? $this->post['separator'] : $this->config['separator'];
    }
    
    public function getData(): ?string
    {
        // Handle file uploads
        if (!empty($_FILES['csv-file']['name']) && !empty($_FILES['csv-file']['tmp_name'])) {
            $this->log('info', $this->modx->lexicon('importx_sedav_edition.log.fileuploadfound', ['filename' => $_FILES['csv-file']['name']]));
            $data = file_get_contents($_FILES['csv-file']['tmp_name']);
            if ($data === false) {
                $msg = $this->modx->lexicon('importx_sedav_edition.err.fileuploadfailed');
                $this->log('error', $msg);
                return $msg;
            }
        }
        
        // Only if no file was uploaded check the manual input
        if ((!isset($data) || $data === false) &&
            (isset($this->post['csv']) && !empty($this->post['csv']))) {
            $data = trim($this->post['csv']);
        }
        
        // When no CSV detected (file or manual input), throw an error for that.
        if (!isset($data) || ($data === false) || empty($data)) {
            $msg = $this->modx->lexicon('importx_sedav_edition.err.nocsv');
            $this->log('error', $msg);
            return $msg;
        }
        
        // Check a minimum length-ish (debatable - might be a useless check really)
        if (strlen($data) < 10) {
            $msg = $this->modx->lexicon('importx_sedav_edition.err.invalidcsv');
            $this->log('error', $msg);
            return $msg;
        }
        
        $this->data = $data;
        return $data;
    }
    
    public function log ($type,$msg) {
        switch ($type) {
            case 'error':
                $this->modx->log(modX::LOG_LEVEL_ERROR,'Error: '.$msg);
                break;
            case 'complete':
                $this->modx->log(modX::LOG_LEVEL_INFO,'COMPLETED');
                sleep(1);
                break;
            case 'warn':
                $this->modx->log(modX::LOG_LEVEL_WARN,$msg);
                break;
            default:
            case 'info':
                $this->modx->log(modX::LOG_LEVEL_INFO,$msg);
                break;
        }
    }
    
    public function prepareData()
    {
        $file = $this->config['processorsPath'] . 'prepare/' . $this->type . '.php';
        if (file_exists($file)) {
            $class = include $file;
            if ($class) {
                $this->prepClass = new $class($this->modx, $this, $this->data);
                $this->preparedData = $this->prepClass->process();
                if (is_array($this->preparedData)) {
                    return $this->preparedData;
                }
                else {
                    foreach ($this->errors as $err) {
                        $this->log('error',$err);
                    }

                    return false;
                }
            }
        }

        $this->log('error',$this->modx->lexicon('importx_sedav_edition.log.classnf'));
        return false;
    }

    private function getDefaults(): void
    {
        $this->defaults['published'] = isset($this->post['published']) && $this->post['published'] === 'on';
        $this->defaults['searchable'] = isset($this->post['searchable']) && $this->post['searchable'] === 'on';
        $this->defaults['hidemenu'] = isset($this->post['hidemenu']) && $this->post['hidemenu'] === 'on';
        $this->defaults['lock_parent'] = isset($this->post['lock_parent']) && $this->post['lock_parent'] === 'on';
        $this->defaults['context_key'] = 'web';
        $this->defaults['parent'] = '';
        
        // $resource = $this->modx->getObject('modResource', $resourceId);

        // if ($resource) {
        //     $this->log('info', 'Current resource parent = ' . $resource->get('parent'));
        // } else {
        //     $this->log('error', 'Resource not found: ID ' . $resourceId);
        // }

            $parent = isset($this->post['parent']) ? $this->post['parent'] : 0;
            if (!is_numeric($parent)) {
                if ($this->modx->getObject('modContext', $parent)) {
                    $this->defaults['context_key'] = $parent;
                    $this->defaults['parent'] = 0;
                } else {
                    $this->log('error', $this->modx->lexicon('importx_sedav_edition.err.parentnotnumeric'));
                }
            } elseif ($parent < 0) {
                $this->log('error', $this->modx->lexicon('importx_sedav_edition.err.parentlessthanzero'));
            } else {
                $this->defaults['parent'] = $parent;
            }
    }

    private function setExecutionLimit(): void
    {
        /* Set a timeout limit */
        if (ini_get('safe_mode')) {
            $this->log('warn',$this->modx->lexicon('importx_sedav_edition.log.safemodeon'));
        }
        else {
            set_time_limit(0);
            $limit = ini_get('max_execution_time');
            $limit = ($limit > 0) ? $limit : $this->modx->lexicon('importx_sedav_edition.infinite');
            $this->log('info',$this->modx->lexicon('importx_sedav_edition.log.timelimit', ['limit' => $limit]));
        }
    }
}


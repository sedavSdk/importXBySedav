<?php
class StartImport extends modProcessor {
    protected $importX_sedav_edition;

    public function initialize(): bool
    {
        $init = parent::initialize();

        $path = $this->modx->getOption('importx_sedav_edition.core_path', null, $this->modx->getOption('core_path') . 'components/importx_sedav_edition/');
        $this->importX_sedav_edition = $this->modx->getService('importx_sedav_edition', 'importX_sedav_edition', $path);

        /* @var modX|MODX\Revolution\modX $modx */
        $this->importX_sedav_edition->post = $this->getProperties();//$scriptProperties;
        $this->importX_sedav_edition->initialize();
        sleep(1);
        $this->importX_sedav_edition->log('info', $this->modx->lexicon('importx_sedav_edition.log.runningpreimport'));
        sleep(1);

        return $init;
    }


    public function process()
    {
        /* Get the data and prepare it */
        $this->importX_sedav_edition->getData();
        sleep(1);
        $lines = $this->importX_sedav_edition->prepareData();

        if ($lines === false) {
            $this->importX_sedav_edition->log('complete','');
            return $this->modx->error->failure();
        }

        $this->importX_sedav_edition->log('info', $this->modx->lexicon('importx_sedav_edition.log.importvaluesclean', ['count' => count($lines)]));
        $resourceCount = 0;

        $processorName = $this->modx->getOption('importx_sedav_edition.processor', null, 'create');

        foreach ($lines as $line) {
            
            $line = $this->setDefaultClassKey($line);
            if (!empty($line['id']) && $this->importX_sedav_edition->defaults['lock_parent']) {
                $resource = $this->modx->getObject('modResource', $line['id']);
                if ($resource) {
                    $line['parent'] = $resource->get('parent');
                    $this->importX_sedav_edition->log('info', "lock_parent включен, сохраняем родителя ресурса ID {$line['id']} = {$line['parent']}");
                } else {
                    $this->importX_sedav_edition->log('warn', "lock_parent включен, но ресурс ID {$line['id']} не найден — родитель не сохранён");
                }
            }

            if ($processorName === 'updatenooverride') {
                // Используем встроенный процессор
                $this->modx->log(modX::LOG_LEVEL_INFO, '▶ Используется встроенный процессор UpdateNoOverride');

                $processorInstance = new UpdateNoOverride($this->modx, $line);
                $response = $processorInstance->run();

               
            } else {
                // Обычный процессор MODX
                $response = $this->modx->runProcessor('resource/' . $processorName, $line);
            }

            if ($response->isError()) {
                $errorMessage = $response->hasFieldErrors()
                    ? implode("\n", $response->getAllErrors())
                    : $this->modx->lexicon('importx_sedav_edition.err.savefailed') . "\n" . print_r($response->getMessage(), true);

                $this->importX->log('warn', $resourceCount.' of ' . count($lines) . ' resources were imported successfully');
                $this->importX->log('error', $errorMessage);

                return $this->importX->log('complete','');
            } else {
                $resourceCount++;
            }
        }

        sleep(1);
        $this->importX_sedav_edition->log('info', $this->modx->lexicon('importx_sedav_edition.log.complete', ['count' => $resourceCount]));
        sleep(1);
        $this->importX_sedav_edition->log('complete', '');
        sleep(1);

        return $this->success();
    }

    /**
     * @param array $record
     * @return array
     */
    protected function setDefaultClassKey(array $record): array
    {
        $modxVersion = $this->modx->getVersionData();
        if (version_compare($modxVersion['full_version'], '3.0.0-dev', '>=') && empty($line['class_key'])) {
            $record['class_key'] = 'MODX\Revolution\modDocument';
        }

        return $record;
    }
}

use MODX\Revolution\Processors\Model\UpdateProcessor;
use MODX\Revolution\modResource;


class UpdateNoOverride extends UpdateProcessor
{
    public $classKey = modResource::class;
    public $languageTopics = ['resource'];
    public $objectType = 'resource';

    public function beforeSet()
    {
        $properties = $this->getProperties();
        foreach ($properties as $key => $value) {
            if (preg_match('/^tv(\d+)$/', $key, $matches)) {
                $tvId = (int)$matches[1];
        
                $tv = $this->modx->getObject('modTemplateVar', $tvId);
                if ($tv) {
                    $tvName = $tv->get('name');
                    $this->object->setTVValue($tvName, $value);
        
                } else {
                    $this->modx->log(modX::LOG_LEVEL_ERROR, "TV с ID {$tvId} не найден!");
                }
        
                unset($properties[$key]);
            }
        }

        foreach ($properties as $key => $value) {
            if ($value === '' || $value === null) {
                $this->unsetProperty($key);
            }
        }

        return parent::beforeSet();
    }

    public function process()
    {
       

        if ($this->object->save()) {
    
            $this->modx->cacheManager->refresh([
                'resource' => ['contexts' => [$this->object->get('context_key')]]
            ]);

        } else {
            $this->modx->log(modX::LOG_LEVEL_ERROR, 'Ошибка при сохранении ресурса с ID: ' . $this->object->get('id'));
        }

        
        return parent::process();
    }
}
return 'StartImport';
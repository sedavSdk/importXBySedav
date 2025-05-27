<?php

class prepareImport {
    public $data;
    /* @var modX $modx */
    public $modx;
    public $importx_sedav_edition;
    
    public function __construct(modX &$modx, importX_sedav_edition &$importx_sedav_edition, $raw) {
        $this->modx =& $modx;
        $this->importx_sedav_edition =& $importx_sedav_edition;
        $this->data = $raw;
    }
    function process() {
        /* Do your processing here, returning an array with all the properly formatted data */
        return [
            [
                'pagetitle' => 'This is a simple array',
                'longtitle' => 'This is a simple array to show how to present the data',
                'tv2' => 'Including TV values'
            ],
            [
                'pagetitle' => 'This is a simple array',
                'longtitle' => 'This is a simple array to show how to present the data',
                'tv2' => 'Including TV values'
            ],
        ];
    }
}

/* Return the class name */
return 'prepareImport';

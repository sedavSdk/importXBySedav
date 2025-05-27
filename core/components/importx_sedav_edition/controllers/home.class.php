<?php

class ImportxSedavEditionHomeManagerController extends modExtraManagerController
{
    /** @var importX_sedav_edition $importX_sedav_edition */
    public $importx_sedav_edition;

    public function initialize()
    {
        $path = $this->modx->getOption('importx_sedav_edition.core_path', null, $this->modx->getOption('core_path') . 'components/importx_sedav_edition/') . 'model/importx_sedav_edition/';
        $this->importx_sedav_edition = $this->modx->getService('importx_sedav_edition', importX_sedav_edition::class, $path);
    }

    /**
     * @return string[]
     */
    public function getLanguageTopics(): array
    {
        return ['importx_sedav_edition:default'];
    }

    /**
     * @return string
     */
    public function getPageTitle(): string
    {
        return $this->modx->lexicon('importx_sedav_edition');
    }

    /**
     * @return void
     * @throws \xPDO\xPDOException
     */
    public function loadCustomCssJs(): void
    {
        $this->addJavascript($this->importx_sedav_edition->config['jsUrl'] . 'mgr/importx_sedav_edition.js');
        $this->addJavascript($this->importx_sedav_edition->config['jsUrl'] . 'mgr/widget.home.panel.js');
        $this->addJavascript($this->importx_sedav_edition->config['jsUrl'] . 'mgr/widget.home.form.js');
        $this->addLastJavascript($this->importx_sedav_edition->config['jsUrl'] . 'mgr/section.index.js');

        $defaults = [];
        $defaults['richtext'] = (bool)$this->modx->getOption('richtext_default', null, true);
        $defaults['template'] = (int)$this->modx->getOption('default_template', null, 1);
        $defaults['hidemenu'] = (bool)$this->modx->getOption('hidemenu_default', null, false);
        $defaults['lock_parent'] = (bool)$this->modx->getOption('lock_parent_default', null, true);
        $defaults['published'] = (bool)$this->modx->getOption('publish_default', null, true);
        $defaults['searchable'] = (bool)$this->modx->getOption('search_default', null, true);
        $defaults = $this->modx->toJSON($defaults);

        $this->addHtml('<script type="text/javascript">
Ext.onReady(function() {
    importX_sedav_edition.config = ' . $this->modx->toJSON($this->importx_sedav_edition->config) . ';
    importX_sedav_edition.defaults = ' . $defaults . ';
    
    Ext.QuickTips.init();
    MODx.load({ xtype: "importx_sedav_edition-page-home"});
});
</script>');
    }

    /**
     * @return string
     */
    public static function getDefaultController(): string
    {
        return 'home';
    }

    /**
     * @return string
     */
    public function getTemplateFile(): string
    {
        return $this->importx_sedav_edition->config['templatesPath'].'home.tpl';
    }
}
<?php

namespace PluginName\Core;

use PluginName\Services\Loader;
use PluginName\Config\Admin\AdminScriptsLoader;

require_once PLGUIN_AUTOLOADER_DIR;

class Bootstrap {

    private $adminScriptLoader;
    private $translations;
    private $loader;
    private $adminPageController;
    
    public function __construct(AdminScriptsLoader $adminScriptLoader, Translations $translations, Loader $loader, \PluginName\Controller\Admin\AdminPageController $adminPageController) {
        $this->adminScriptLoader = $adminScriptLoader;
        $this->translations = $translations;
        $this->loader = $loader;
        $this->adminPageController = $adminPageController;
    }

    private function setLocale() {
        $this->loader->addAction('plugins_loaded', $this->translations, 'loadPluginTextdomain');
    }

    private function addAdminGlobalAssets() {

        $this->loader->addAction('admin_enqueue_scripts', $this->adminScriptLoader, 'enqueueStyles');
        $this->loader->addAction('admin_enqueue_scripts', $this->adminScriptLoader, 'enqueueScripts');
    }
    
    private function addAdminPages(){
        $this->adminPageController->initPage();
    }
    
    private function defineAdminHooks() {

        $this->addAdminGlobalAssets();
        $this->addAdminPages();
    }

    public function run() {
        $this->setLocale();
        $this->defineAdminHooks();
        $this->loader->run();
    }

}

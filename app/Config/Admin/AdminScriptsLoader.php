<?php

namespace PluginName\Config\Admin;

require_once PLGUIN_AUTOLOADER_DIR;

class AdminScriptsLoader {

    private $wpScriptLoader;
    private $assetsManager;

    public function __construct(\PluginName\Adapter\WpScriptLoader $wpScriptLoader, \PluginName\Services\AssetsManager $assetsManager) {
        $this->wpScriptLoader = $wpScriptLoader;
        $this->assetsManager = $assetsManager; 
    }

    public function enqueueStyles() {
        $cssFile = (isDebug()) ? 'style.css' : 'style.min.css';
        $this->wpScriptLoader->wpEnqueueStyle(PLUGIN_SLUG, $this->assetsManager->getCssFromAdmin($cssFile), [], $this->assetsManager->getFileVersion(), 'all');
    }

    public function enqueueScripts() {
        $jsFile = (isDebug()) ? "scripts.js" : "scripts.min.js";
        $this->wpScriptLoader->wpEnqueueScripts(PLUGIN_SLUG, $this->assetsManager->getJsFromAdmin($jsFile), ['jquery'], $this->assetsManager->getFileVersion(), true);
    }

}

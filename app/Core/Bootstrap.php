<?php

namespace PluginName\Core;

class Core
{
    protected $loader;

    // protected $pluginName;
    protected $pluginSlug;


    protected $version;

    public function __construct()
    {
        $this->version = PLUGIN_NAME_VERSION;
        $this->pluginName = 'Post Planner';
        $this->pluginSlug = 'post-planner';

        $this->loadDependencies();
        $this->setLocale();
        $this->defineAdminHooks();
    }
    
    private function loadDependencies()
    {
        $this->loader = new Loader();
    }
    
    private function setLocale()
    {
        $translations = new Translations();

        $this->loader->addAction('plugins_loaded', $translations, 'loadPluginTextdomain');
    }

    private function defineAdminHooks()
    {
        $scriptsLoaderdmin = new ScriptsLoader($this->getPluginName(), $this->getVersion());

        $this->loader->addAction('admin_enqueue_scripts', $scriptsLoaderdmin, 'enqueue_styles');
        $this->loader->addAction('admin_enqueue_scripts', $scriptsLoaderdmin, 'enqueue_scripts');
    }
    
    public function run()
    {
        $this->loader->run();
    }

    public function getPluginName()
    {
        return $this->pluginSlug;
    }

    public function getLoader()
    {
        return $this->loader;
    }
    
    public function getVersion()
    {
        return $this->version;
    }
}
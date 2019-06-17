<?php

namespace PluginName\Controller\Admin;

class ScriptsLoader
{
    private $pluginSlug;
    private $version;

    public function __construct($pluginSlug, $version)
    {
        $this->pluginSlug = $pluginSlug;
        $this->version = $version;
    }


    public function enqueueStyles()
    {
        wp_enqueue_style($this->pluginSlug, plugin_dir_url(__FILE__) . 'css/style.css', array(), $this->version, 'all');
    }

    
    public function enqueueScripts()
    {
        wp_enqueue_script($this->pluginSlug, plugin_dir_url(__FILE__) . 'js/scripts.js', array( 'jquery' ), $this->version, false);
    }
}
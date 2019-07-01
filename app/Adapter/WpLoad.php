<?php

namespace PluginName\Adapter;

require_once PLGUIN_AUTOLOADER_DIR;

class WpLoad {

    public function addFilter($hook, $callbackArray, $priority, $acceptedArgs) {
        add_filter($hook, $callbackArray, $priority, $acceptedArgs);
    }

    public function addAction($hook, $callbackArray, $priority, $acceptedArgs) {
        add_action($hook, $callbackArray, $priority, $acceptedArgs);
    }

}

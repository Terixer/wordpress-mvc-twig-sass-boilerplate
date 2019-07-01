<?php

namespace PluginName\Core;

require_once PLGUIN_AUTOLOADER_DIR;

class Translations
{
    public function loadPluginTextdomain()
    {
        load_plugin_textdomain(
            'plugin-name',
            false,
            dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
        );
    }
}
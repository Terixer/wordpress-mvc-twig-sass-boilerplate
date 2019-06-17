<?php

namespace PluginName\Core;

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
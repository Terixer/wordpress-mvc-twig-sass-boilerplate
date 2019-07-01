<?php

namespace PluginName\Services;

require_once PLGUIN_AUTOLOADER_DIR;

class AssetsManager {

    public function getCssFromAdmin($file) {
        return PLUGIN_PUBLIC_ADMIN_ASSETS_CSS . $file;
    }

    public function getJsFromAdmin($file) {
        return PLUGIN_PUBLIC_ADMIN_ASSETS_JS . $file;
    }

    public function getFileVersion($version = null) {
        return ($version)?:(isDebug()) ? time() : PLUGIN_VERSION;
    }

}

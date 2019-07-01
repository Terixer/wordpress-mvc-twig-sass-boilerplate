<?php

namespace PluginName\Adapter;

require_once PLGUIN_AUTOLOADER_DIR;

class WpScriptLoader {

    public function wpEnqueueStyle($handle, $src = '', $deps = [], $ver = false, $media = 'all') {
        wp_enqueue_style($handle, $src, $deps, $ver, $media);
    }

    public function wpEnqueueScripts($handle, $src = '', $deps = [], $ver = false, $isInFooter = true) {
        wp_enqueue_script($handle, $src, $deps, $ver, $isInFooter);
    }

}

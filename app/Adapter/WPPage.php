<?php

namespace PluginName\Adapter;

require_once PLGUIN_AUTOLOADER_DIR;

class WPPage {

    public function addMenuPage( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = null, string $icon_url = '', int $position = null) {
        add_menu_page(
                $page_title,
                $menu_title,
                $capability,
                $menu_slug,
                $function,
                $icon_url,
                $position,
        );
    }

}

<?php

namespace PluginName\Controller\Admin;

require_once PLGUIN_AUTOLOADER_DIR;

class AdminPageController {

    private $loader;
    private $pageTitle = PLUGIN_FULL_NAME;
    private $menuTitle = PLUGIN_FULL_NAME;
    private $capability = 'manage_options';
    private $menuSlug = PLUGIN_SLUG;
    private $iconName = 'dashicons-tickets';
    private $piority = 6;

    public function __construct(\PluginName\Services\Loader $loader) {
        $this->loader = $loader;
    }
    public function addPage() {
        add_menu_page(
                $this->pageTitle,
                $this->menuTitle,
                $this->capability,
                $this->menuSlug,
                [$this, 'viewPage'],
                $this->iconName,
                $this->piority
        );
    }

    public function viewPage() {
        var_dump($GLOBALS);
    }

    public function initPage() {
        $this->loader->addAction('admin_menu', $this, 'addPage');
    }

}

<?php

namespace PluginName\Controller\Admin;

use PluginName\Adapter\WPPage;
use PluginName\Controller\BaseController;
use PluginName\Services\Loader;
use Psr\Container\ContainerInterface;
use const PLGUIN_AUTOLOADER_DIR;
use const PLUGIN_FULL_NAME;
use const PLUGIN_SLUG;

require_once PLGUIN_AUTOLOADER_DIR;

class AdminPageController extends BaseController {

    private $loader;
    private $wpPage;
    private $pageOptions = [
        'pageTitle' => PLUGIN_FULL_NAME,
        'menuTitle' => PLUGIN_FULL_NAME,
        'capability' => 'manage_options',
        'menuSlug' => PLUGIN_SLUG,
        'iconName' => 'dashicons-tickets',
        'position' => 6
    ];

    public function __construct(Loader $loader, ContainerInterface $cointainer, WPPage $wpPage) {
        parent::__construct($cointainer);
        $this->loader = $loader;
        $this->wpPage = $wpPage;
    }

    public function addPage() {
        $this->wpPage->addMenuPage(
                $this->pageOptions['pageTitle'],
                $this->pageOptions['menuTitle'],
                $this->pageOptions['capability'],
                $this->pageOptions['menuSlug'],
                [$this, 'viewPage'],
                $this->pageOptions['iconName'],
                $this->pageOptions['position'],
        );
    }

    public function viewPage() {
        echo $this->view()->render('admin/index.html.twig', ['pluginName' => PLUGIN_FULL_NAME]);
    }

    public function initPage() {
        $this->loader->addAction('admin_menu', $this, 'addPage');
    }

}

<?php

namespace PluginName\Controller;

require_once PLGUIN_AUTOLOADER_DIR;

abstract class BaseController {

    private $cointainer;
    private $view;

    public function __construct(\Psr\Container\ContainerInterface $cointainer) {
        $this->cointainer = $cointainer;
        $this->view = $this->cointainer->get('view');
    }

    protected function view() {
        return $this->view;
    }

}

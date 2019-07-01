<?php

require_once __DIR__ . '/constants.php';
require_once __DIR__ . '/devFunctions.php';

require_once PLGUIN_AUTOLOADER_DIR;

use PluginName\Core\Bootstrap;

/**
 *
 * @wordpress-plugin
 * Plugin Name:       Plugin Name
 * Plugin URI:        http://plugin-site.com
 * Description:       Plugin name description
 * Version:           1.0.0
 * Author:            Author Name
 * Author URI:        http://author-site.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       plugin-name
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

function activatePlugin() {
    PluginName\Core\PluginActivator::activate();
}

function deactivatePlugin() {
    PluginName\Core\PluginDeactivator::deactivate();
}

register_activation_hook(__FILE__, 'activatePlugin');
register_deactivation_hook(__FILE__, 'deactivatePlugin');

function twig() {
    $loader = new \Twig\Loader\FilesystemLoader(VIEW_DIR);
    $twig = new \Twig\Environment($loader);
    return $twig;
}

function run() {
    try {
        $containerBuilder = new DI\ContainerBuilder();
        $container = $containerBuilder->build();
        $container->set("view", twig());
        $di = $container->get(Bootstrap::class);
        $di->run();
    } catch (Exception $ex) {
        if (!isDebug()) {
            errorNotice($ex->getMessage(), 'error');
        } else {
            errorDevNotice($ex);
        }
    }
}

run();


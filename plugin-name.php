<?php

/**
 *
 * @wordpress-plugin
 * Plugin Name:       Plugin Name
 * Plugin URI:        http://plugin-site.com
 * Description:       Plugin name description
 * Version:           1.0.0
 * Author:            Autho Name
 * Author URI:        http://author-site.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       plugin-name
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (! defined('WPINC')) {
    die;
}

define('PLUGIN_NAME_VERSION', '1.0.0');


function activatePlugin()
{
    PluginActivator::activate();
}

function deactivatePlugin()
{
    PluginDeactivator::deactivate();
}

register_activation_hook(__FILE__, 'activatePlugin');
register_deactivation_hook(__FILE__, 'deactivatePlugin');


function run()
{
    $plugin = new Core();
    $plugin->run();
}
run();
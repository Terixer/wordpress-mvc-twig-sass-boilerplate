<?php

//Custom
define("PLUGIN_FULL_NAME", 'Plugin Name');
define("PLUGIN_SLUG", 'Plugin-name');
define('PLUGIN_VERSION', '1.0.0');

//Config
define("PLUGIN_DIR", plugin_dir_path(__FILE__));
define("PLGUIN_AUTOLOADER_DIR", PLUGIN_DIR . 'vendor/autoload.php');

//Cache
define("CACHE_DIR",PLUGIN_DIR.'cache/');

//Admin
define("PLUGIN_PUBLIC_ADMIN", plugin_dir_url(__FILE__) . 'public/admin/');
define("PLUGIN_PUBLIC_ADMIN_ASSETS_CSS", PLUGIN_PUBLIC_ADMIN . 'css/');
define("PLUGIN_PUBLIC_ADMIN_ASSETS_JS", PLUGIN_PUBLIC_ADMIN . 'js/');

//View
define("VIEW_DIR",PLUGIN_DIR.'views/');
define("VIEW_CACHE_DIR",CACHE_DIR.'views/');





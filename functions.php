<?php
/**
 * Theme functions file. Loaded before the parent theme's functions.
 *
 * @package community-builder-child
 */

use CB_Child\Bootstrap\Asset_Loader;
use CB_Child\Bootstrap\Autoloader;
use CB_Child\Bootstrap\Configurator;
use CB_Child\Bootstrap\Core_Loader;

// Do not allow direct access over web.
defined( 'ABSPATH' ) || exit;

// define version.
define( 'CB_CHILD_THEME_VERSION', '2.0.0' );

// Load and register autoloader.
require get_stylesheet_directory() . '/includes/bootstrap/class-autoloader.php';
try {
	spl_autoload_register( new Autoloader( 'CB_Child\\', __DIR__ . '/includes/' ) );
} catch ( \Exception $e ) {
	error_log( $e->getMessage() );
	return;
}

// Boot.
// Load dependencies which can not be auto loaded.
Core_Loader::boot();

// Configure.
Configurator::boot();

// CSS/JS loading.
Asset_Loader::boot();

// custom handlers/filters.
// CB_Child\Filters\Example_Filter::boot();

// add your own code here.
// if you are looking for our recommended best practice,
// Please see http://buddydev.com/community-builder/child-theme-best-practices/ .

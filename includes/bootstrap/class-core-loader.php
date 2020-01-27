<?php
/**
 * Community Builder Child Core loader
 *
 * @package    Community_Builder_Child
 * @subpackage Core
 * @copyright  Copyright (c) 2020, Brajesh Singh
 * @license    https://www.gnu.org/licenses/gpl.html GNU Public License
 * @author     Brajesh Singh
 */

namespace CB_Child\Bootstrap;

// Do not allow direct access over web.
defined( 'ABSPATH' ) || exit;

/**
 * Use it to load any construct which is non auto loadable.
 */
class Core_Loader {

	/**
	 * Singleton instance.
	 *
	 * @var Core_Loader
	 */
	protected static $instance = null;

	/**
	 * Boot itself
	 *
	 * @return self
	 */
	public static function boot() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
			self::$instance->load();
		}

		return self::$instance;
	}

	/**
	 * Load the files with non auto-loadable constructs(e.g functions etc).
	 */
	private function load() {
		// add your file paths in the array e.g 'includes/abc.php'.
		$files = array(
			'includes/functions.php',
			'includes/template-tags.php',
			// add other files here.
		);

		$path = get_stylesheet_directory();

		foreach ( $files as $file ) {
			require $path . '/' . $file;
		}
	}
}

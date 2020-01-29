<?php
/**
 * Assets Loader
 *
 * @package    Community_Builder_Child
 * @subpackage Bootstrap
 * @copyright  Copyright (c) 2020, Brajesh Singh
 * @license    https://www.gnu.org/licenses/gpl.html GNU Public License
 * @author     Brajesh Singh
 * @since      1.0.0
 */

namespace CB_Child\Bootstrap;

// Do not allow direct access over web.
defined( 'ABSPATH' ) || exit;

/**
 * Asset Loader.
 */
class Asset_Loader {

	/**
	 * Singleton instance.
	 *
	 * @var Asset_Loader
	 */
	protected static $instance = null;

	/**
	 * Boot
	 *
	 * @return self
	 */
	public static function boot() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
			self::$instance->setup();
		}

		return self::$instance;
	}

	/**
	 * Setup
	 */
	private function setup() {

		// Load assets. Loading late to allow child themes overwrite from the parent.
		add_action( 'wp_enqueue_scripts', array( $this, 'load_assets' ), 20 );
	}

	/**
	 * Load assets
	 */
	public function load_assets() {

		$this->register();
		$this->enqueue();
	}

	/**
	 * Register assets.
	 */
	public function register() {
		$this->register_vendors();
		$this->register_core();
	}

	/**
	 * Enqueue assets.
	 */
	public function enqueue() {
		// enqueue styles.
		wp_enqueue_style( 'cb-child-custom' );

		// enqueue js.
		wp_enqueue_script( 'cb-child-custom' );
		// Add extra data if any. Use associative array.
		// This data can be accessed in your js files using CBChild.key(where key is the key in associative array).
		$data = array();

		wp_localize_script( 'cb-child-custom', 'CBChild', $data );
	}

	/**
	 * Register vendor scripts.
	 */
	private function register_vendors() {
		// Register 3rd party vendors script/styles here.
	}

	/**
	 * Register core assets.
	 */
	private function register_core() {

		$template_url = get_stylesheet_directory_uri();
		$version      = CB_CHILD_THEME_VERSION;
		// Register assets/css/custom.css.
		wp_register_style( 'cb-child-custom', $template_url . '/assets/css/custom.css', array(), $version );

		// Register assets/js/custom.js.
		wp_register_script( 'cb-child-custom', $template_url . '/assets/js/custom.js', array( 'jquery' ), $version, false );
	}
}

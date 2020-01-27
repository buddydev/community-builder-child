<?php
/**
 * Theme Setup helper
 *
 * Use it to configure your theme.
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
 * Theme configurator. Sets up various features.
 */
class Configurator {

	/**
	 * Singleton instance.
	 *
	 * @var Configurator
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
	 * Setup.
	 */
	private function setup() {

		// Setup theme features.
		add_action( 'after_setup_theme', array( $this, 'after_setup_theme' ) );

		// setup widgetized area.
		add_action( 'widgets_init', array( $this, 'register_widgets' ) );

		// filter body_class.
		add_filter( 'body_class', array( $this, 'add_body_classes' ) );
	}

	/**
	 * Setup our theme feature
	 */
	public function after_setup_theme() {

		// Load theme text-domain.
		load_theme_textdomain( 'community-builder-child', get_stylesheet_directory() . '/languages' );
		// setup done, child theme can do their own setup here.
		do_action( 'cb_after_setup_theme' );
	}

	/**
	 * Register Widget Areas
	 */
	public function register_widgets() {
		// Register your extra sidebars here.
		// Example:-uncomment below lines.
		/* register_sidebar( array(
			'name'          => __( 'Sidebar-awesome', 'community-builder-child' ),
			'id'            => 'sidebar-awesome',
			'description'   => __( 'The sidebar widget area', 'community-builder-child' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>'
		) );
		*/
		// to use it on your theme, call dynamic_sidebar( 'sidebar-awesome');
		// in your template file.
	}

	/**
	 * Add Body Classes.
	 *
	 * @param array $classes css classes.
	 *
	 * @return array
	 */
	public function add_body_classes( $classes ) {
		// add your css classes to 'body' element.
		$classes[] = 'cb-child';

		return $classes;
	}
}

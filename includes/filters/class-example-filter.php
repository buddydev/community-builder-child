<?php
/**
 * Example Filter
 *
 * This filter shows how to create classes that applies filters.
 *
 * @package    Community_Builder_Child
 * @subpackage Filters
 * @copyright  Copyright (c) 2020, Brajesh Singh
 * @license    https://www.gnu.org/licenses/gpl.html GNU Public License
 * @author     Brajesh Singh
 * @since      1.0.0
 */

namespace CB_Child\Filters;

// Do not allow direct access over web.
defined( 'ABSPATH' ) || exit;

/**
 * Example Handler.
 *
 * You can enable it by calling \CB_Child\Filters\Example_Filter::boot(); in your code(probably functions.php in the theme)
 */
class Example_Filter {

	/**
	 * Boot.
	 */
	public static function boot() {
		$self = new self();
		$self->setup();
	}

	/**
	 * Setup hooks.
	 */
	private function setup() {
		// Add one or more filter callback.
		// Goal is to keep the code related to single functionality encapsulated.
		add_filter( 'body_class', array( $this, 'filter' ) );
	}

	/**
	 * Filter.
	 *
	 * In this example, we are filtering on 'body' class without doing anything meaningful.
	 *
	 * @param array $classes css classes array.
	 *
	 * @return array
	 */
	public function filter( $classes ) {
		// do something.
		return $classes;
	}
}

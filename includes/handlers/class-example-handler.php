<?php
/**
 * Example Handler
 *
 * This handler shows how to create classes that handle single purpose.
 *
 * @package    Community_Builder_Child
 * @subpackage Handlres
 * @copyright  Copyright (c) 2020, Brajesh Singh
 * @license    https://www.gnu.org/licenses/gpl.html GNU Public License
 * @author     Brajesh Singh
 * @since      1.0.0
 */

namespace CB_Child\Handlers;

// Do not allow direct access over web.
defined( 'ABSPATH' ) || exit;

/**
 * Example Handler.
 *
 * You can enable it by calling \CB_Child\Handlers\Example_Handler::boot(); in your code(probably functions.php in the theme)
 */
class Example_Handler {

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
		// Add one or more action handler callback.
		// Goal is to keep the code related to single functionality encapsulated.
		add_action( 'template_redirect', array( $this, 'handle' ) );
	}

	/**
	 * Handle the action.
	 */
	public function handle() {
		// do something.
	}
}

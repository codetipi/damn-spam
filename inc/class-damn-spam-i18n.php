<?php
/**
 *
 * Damn Spam internationalization
 *
 * @since      1.0.0
 *
 * @package    Damn Spam
 * @subpackage damn-spam/includes
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
class Damn_Spam_I18n {

	/**
	 * Load Translation
	 *
	 * @since    1.0.0
	 */
	public function damn_spam_textdomain() {
		load_plugin_textdomain( 'damn-spam', false, dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/' );
	}

}

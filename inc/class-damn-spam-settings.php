<?php
/**
 *
 * Damn Spam Settings
 *
 * @since      1.0.0
 *
 * @package    Damn Spam
 * @subpackage damn-spam/inc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
class Damn_Spam_Settings {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	*/
	public function __construct() {
		add_filter( 'admin_init', array( $this, 'damn_spam_register_settings' ) );
		add_action( 'admin_menu', array( $this, 'damn_spam_register_options_page' ) );
	}

	/**
	 * Comment Filter
	 *
	 * @since 1.0.0
	 */
	public function damn_spam_register_settings() {
		add_option( 'damn_spam_option_name', 'This is my option value.' );
		register_setting( 'damn_spam_options_group', 'damn_spam_option_name', 'damn_spam_callback' );
	}

	function damn_spam_register_options_page() {
		$options = new Damn_Spam_Options();
		add_options_page( 'Page Title', 'Damn Spam', 'manage_options', 'damn_spam', array( $options, 'damn_spam_options_page' ) );
	}

}

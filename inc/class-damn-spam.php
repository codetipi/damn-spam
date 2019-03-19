<?php
/**
 *
 * Damn Spam
 *
 * @since      1.0.0
 *
 * @package    Damn Spam
 * @subpackage damn-spam/inc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Damn_Spam {

	public static function init() {
		$class = __CLASS__;
		new $class();
	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	*/
	public function __construct() {
		$this->damn_spam_engine();
		$this->damn_spam_comments();
	}

	/**
	 * Loader
	 *
	 * @since 1.0.0
	 */
	private function damn_spam_engine() {
		$this->dir_path = plugin_dir_path( dirname( __FILE__ ) );
		require_once $this->dir_path . 'inc/class-damn-spam-i18n.php';
		require_once $this->dir_path . 'inc/class-damn-spam-comments.php';
	}

	/**
	 * Comments
	 *
	 * @since 1.0.0
	 */
	private function damn_spam_comments() {
		$comments = new Damn_Spam_Comments();
		add_filter( 'pre_comment_approved', array( $comments, 'damn_spam_pre_comment_approved' ), 10, 2 );
		add_filter( 'comment_post_redirect', array( $comments, 'damn_spam_comment_post_redirect' ), 10, 2 );
	}

	/**
	 * Translation Loader
	 *
	 * @since 1.0.0
	 */
	public function damn_spam_locale() {
		$i18n = new Damn_Spam_I18n();
		add_action( 'init', array( $i18n, 'damn_spam_textdomain' ) );
	}

}

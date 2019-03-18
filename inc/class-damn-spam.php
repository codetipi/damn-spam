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
		add_filter( 'pre_comment_approved', array( $this, 'damn_spam_naughty_comments', 10, 2 ) );
	}
	public function damn_spam_naughty_comments( $approved = '', $commentdata = '' ) {
		if ( 1 === $approved ) {
			if ( ! empty( $commentdata['comment_content'] ) ) {
				if ( strpos( $commentdata['comment_content'], 'http' ) !== false || strpos( $commentdata['comment_content'], 'www' ) !== false ) {
					$naughty = true;
				}
			}
		}
		if ( ! empty( $naughty ) ) {
			return 'spam';
		}
		return $approved;
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

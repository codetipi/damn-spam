<?php
/**
 *
 * Damn Spam In Comments
 *
 * @since      1.0.0
 *
 * @package    Damn Spam
 * @subpackage damn-spam/inc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
class Damn_Spam_Comments {

	/**
	 * Comment Filter
	 *
	 * @since 1.0.0
	 */
	public function damn_spam_pre_comment_approved( $approved = '', $commentdata = '' ) {
		if ( 1 === $approved ) {
			if ( ! empty( $commentdata['comment_content'] ) ) {
				$naughty = $this->damn_spam_comment_check( $commentdata['comment_content'] );
			}
		}
		if ( ! empty( $naughty ) ) {
			return 'spam';
		}
		return $approved;
	}

	/**
	 * Comment On Post Filter
	 *
	 * @since 1.0.0
	 */
	public function damn_spam_comment_post_redirect( $location = '', $comment = '' ) {
		if ( ! empty( $comment->comment_content ) ) {
			$naughty = $this->damn_spam_comment_check( $comment->comment_content );
		}
		if ( ! empty( $naughty ) ) {
			$naughty_comment = array();
			$naughty_comment['comment_ID'] = $comment->comment_ID ;
			$naughty_comment['comment_approved'] = 'spam';
			wp_update_comment( $naughty_comment );
		}
		return $location;
	}

	/**
	 * Comment Checker
	 *
	 * @since 1.0.1
	 */
	private function damn_spam_comment_check( $data = '' ) {
		if ( strpos( $data, 'http' ) !== false || strpos( $data, 'www.' ) !== false ) {
			return true;
		}
	}
}

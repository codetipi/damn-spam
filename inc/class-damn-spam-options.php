<?php
/**
 *
 * Damn Spam Options
 *
 * @since      1.1.0
 *
 * @package    Damn Spam
 * @subpackage damn-spam/inc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
class Damn_Spam_Options {

	/**
	 * Constructor
	 *
	 * @since 1.1.0
	 *
	*/
	public function __construct() {
		add_filter( 'comment_form_default_fields', 'damn_spam_remove_url' );
	}

	function damn_spam_remove_url( $fields = array() ) {
		if ( true === get_option( 'damn_spam_disable_url' ) && isset( $fields['url'] ) ) {
			unset( $fields['url'] );
		}
		return $fields;
	}

	/**
	 * Comment Filter
	 *
	 * @since 1.0.0
	 */
	function damn_spam_options_page() {
	?>
		<div>
		<h2>Damn Spam</h2>
		<form method="post" action="options.php">
		<?php settings_fields( 'myplugin_options_group' ); ?>
		<h3>This is my option</h3>
		<p>Some text here.</p>
		<table>
		<tr valign="top">
		<th scope="row"><label for="damn_spam_disable_url">Disable URL</label></th>
		<td><input type="text" id="damn_spam_disable_url" name="damn_spam_disable_url" value="<?php echo get_option( 'damn_spam_disable_url' ); ?>" /></td>
		</tr>
		</table>
		<?php submit_button(); ?>
		</form>
		</div>
	<?php
	}

}

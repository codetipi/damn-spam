<?php
/*!
Plugin Name: Damn Spam
Plugin URI: https://www.codetipi.com
Author: Codetipi
Author URI: https://www.codetipi.com
Description: Be gone foul spam...
Version: 1.0.0
Text Domain: damn-spam
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.html
Requires at least: 4.8
Tested up to: 5.1.1
Domain Path: /languages/
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

require plugin_dir_path( __FILE__ ) . 'inc/class-damn-spam.php';

/**
* Let's kick some spam butt
*
* @since 1.0.0
*/
add_action( 'plugins_loaded', array( 'Damn_Spam', 'init' ) );

<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.pressology.com/
 * @since             1.0.0
 * @package           Pressology_Forums
 *
 * @wordpress-plugin
 * Plugin Name:       Pressology Forums
 * Plugin URI:        http://pressology.io/forums
 * Description:       Fast, light-weight, and powerful forums for WordPress.
 * Version:           1.0.0
 * Author:            Pressology
 * Author URI:        http://www.pressology.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       pressology-forums
 * Domain Path:       /languages
 */

require plugin_dir_path( __FILE__ ) . 'includes/class-pressology-forums.php';

if ( !defined( 'WPINC' ) ) {
	// Abort if file is called directly.
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-pressology-forums-activator.php
 */
function activate_pressology_forums() {

	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pressology-forums-activator.php';
	Pressology_Forums_Activator::activate();
	
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-pressology-forums-deactivator.php
 */
function deactivate_pressology_forums() {

	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pressology-forums-deactivator.php';
	Pressology_Forums_Deactivator::deactivate();

}

$pressologyForums = new pressologyForums();
register_activation_hook( __FILE__, 'activate_pressology_forums' );
register_deactivation_hook( __FILE__, 'deactivate_pressology_forums' );

/**
 * AJAX front-end posting
 */

add_action( 'wp_ajax_nopriv_pressology_quick_post' , 'pressology_quick_post' );
add_action( 'wp_ajax_pressology_quick_post' , 'pressology_quick_post' );

function pressology_quick_post() {

	$title = $_POST['title'];
  	$author = $_POST['author'];
  	$forum = $_POST['forum'];
  	$content = $_POST['content'];

    $term = get_term( $forum );

    $post_arr = array(
	  'post_status' => 'publish',
      'post_author' => $author,
      'post_content' => $content,
      'post_title' => $title,
      'post_type' => 'pressology_post',
      'comment_status' => 'open'
    );

 	$pressology_post_id = wp_insert_post( $post_arr );

	$term_tax_ids = wp_set_object_terms( $pressology_post_id , $term->name, 'pressology_forum' );

	$msg = 'Post submitted.';

	echo $msg;
    
	wp_die();

}
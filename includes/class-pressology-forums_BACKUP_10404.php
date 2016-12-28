<?php

// Pressology Forum Class
require plugin_dir_path( __FILE__ ) . 'pressology-post-types.php';

if ( !class_exists( 'pressologyForums' ) ) {

	class pressologyForums {

		public function __construct() {

			$this->run();

		}

		public function run() {

			$this->hooks();

		}

		public function hooks() {

			  /*****************/
			 /* Public Hooks */
			/****************/

			add_action( 'init', array( $this, 'pressology_forum_post_type' ) );
			add_action( 'init', array( $this, 'pressology_forum' ) );
			add_action( 'template_include', array( $this, 'pressology_forum_template' ), 10, 1 );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_public_styles' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_public_scripts' ) );
			add_filter( 'single_template', array( $this, 'pressology_single_template' ), 10, 1 );
			add_action( 'init', array( $this, 'register_comment_editor_buttons' ) );


			  /***************/
			 /* Admin Hooks */
			/***************/

			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );

		}

		public function enqueue_public_styles() {

			wp_enqueue_style( 'pressology_public_style', str_replace( "\\", "/", plugin_dir_url( __FILE__ ) ) . 'css/public-pressology.css' );

		}

		public function enqueue_public_scripts() {

			wp_enqueue_script( 'pressology_public_script', str_replace( "\\", "/", plugin_dir_url( __FILE__ ) ) . 'js/public-pressology.js', array( 'jquery' ) );
<<<<<<< HEAD
			wp_localize_script( 'pressology_public_script', 'ajax_obj', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
			
=======

			if ( is_single() ) {
    			if ( comments_open() ) {
      				wp_enqueue_script( 'comment_editor_buttons' );
    			}
  			}
>>>>>>> 3b05180f3324531159e6dd42e3759c37be2fad4c
		}

		public function enqueue_admin_scripts() {

			wp_enqueue_script( 'pressology_admin_script', str_replace( "\\", "/", plugin_dir_url( __FILE__ ) ) . 'js/admin-pressology.js' );

		}

		public function enqueue_admin_styles() {

			wp_enqueue_style( 'pressology_admin_style', str_replace( "\\", "/", plugin_dir_url( __FILE__ ) ) . 'css/admin-pressology.css' );

		}

		public function pressology_forum_post_type() {

			pressologyPostTypes::pressology_forum_post_type();

		}

		public function pressology_forum() {

			pressologyPostTypes::pressology_forum();

		}

		public static function pressology_forum_template( $template ) {
			if ( is_tax( 'pressology_forum' ) ) {
				// do something
				$template = plugin_dir_path( __FILE__ ) . 'templates/template-pressology-forum.php';
				return $template;
			} else {
				return $template;
			}
		}

		function pressology_single_template( $single ) {
		    global $wp_query, $post;

		    /* Checks for single template by post type */
		    if ( $post->post_type == "pressology_post" ) {
		    	$template = plugin_dir_path( __FILE__ ) . "templates/template-pressology-post.php";
		        if ( file_exists( $template ) )
		            return $template;
		    }
		    return $single;
		}

		public function register_comment_editor_buttons() {
			wp_register_script( 'comment_editor_buttons', str_replace( "\\", "/", plugin_dir_url( __FILE__ ) ) . 'js/quicktags.js', array( 'quicktags' ), '0.1', true );
		}
	}
}
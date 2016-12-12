<?php
if ( $_POST['pressology-newpost-title'] ) {
	$title = $_POST['pressology-newpost-title'];
	$args = array(
		'post_author' => get_current_user_id(),
		'post_title' => $title,
		'post_type' => 'pressology_post',
		);
	if ( $post = wp_insert_post( $args ) ) {
		wp_redirect( get_the_permalink( $post ) );
	}
}
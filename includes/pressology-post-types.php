<?php
class pressologyPostTypes {
	public static function pressology_forum_post_type() {

		$labels = array(
			'name'                  => _x( 'Forum Posts', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Forum Post', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Forum Posts', 'text_domain' ),
			'name_admin_bar'        => __( 'Forum Post', 'text_domain' ),
			'archives'              => __( 'Forum Post Archives', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Forum Post', 'text_domain' ),
			'all_items'             => __( 'All Forum Posts', 'text_domain' ),
			'add_new_item'          => __( 'Add New Forum Post', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'new_item'              => __( 'New Forum', 'text_domain' ),
			'edit_item'             => __( 'Edit Forum', 'text_domain' ),
			'update_item'           => __( 'Update Forum Post', 'text_domain' ),
			'view_item'             => __( 'View Forum Post', 'text_domain' ),
			'search_items'          => __( 'Search Forum Post', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into forum post', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this forum post', 'text_domain' ),
			'items_list'            => __( 'Forum posts list', 'text_domain' ),
			'items_list_navigation' => __( 'Forum posts navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter forum posts list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Forum Post', 'text_domain' ),
			'description'           => __( 'A Forum Post', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'comments', 'trackbacks', 'custom-fields', 'page-attributes', 'post-formats', ),
			'taxonomies'            => array( 'pressology_forum', 'forum_tag' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 20,
			'menu_icon'             => 'dashicons-id-alt',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,		
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'pressology_post', $args );

	}

		public static function pressology_forum() {

		$labels = array(
			'name'                       => _x( 'Pressology Forums', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Pressology Forum', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Forums', 'text_domain' ),
			'all_items'                  => __( 'All Forums', 'text_domain' ),
			'parent_item'                => __( 'Parent Forum', 'text_domain' ),
			'parent_item_colon'          => __( 'Parent Forum:', 'text_domain' ),
			'new_item_name'              => __( 'New Forum Name', 'text_domain' ),
			'add_new_item'               => __( 'Add New Forum', 'text_domain' ),
			'edit_item'                  => __( 'Edit Forum', 'text_domain' ),
			'update_item'                => __( 'Update Forum', 'text_domain' ),
			'view_item'                  => __( 'View Forum', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separate Forums with commas', 'text_domain' ),
			'add_or_remove_items'        => __( 'Add or remove Forums', 'text_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
			'popular_items'              => __( 'Popular Forums', 'text_domain' ),
			'search_items'               => __( 'Search Forums', 'text_domain' ),
			'not_found'                  => __( 'Not Found', 'text_domain' ),
			'no_terms'                   => __( 'No Forums', 'text_domain' ),
			'items_list'                 => __( 'Forums list', 'text_domain' ),
			'items_list_navigation'      => __( 'Forums list navigation', 'text_domain' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'pressology_forum', array( 'pressology_post' ), $args );

	}

}

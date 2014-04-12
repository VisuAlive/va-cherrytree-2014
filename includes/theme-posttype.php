<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Replace menu text within the admin sidebar menu
 *
 * @link http://goo.gl/rLC2W
 * @return array
 */
function _visualive_theme_change_sidemenu_text() {
	global $menu;
	global $submenu;

	// Change menu item
	$menu[5][0] = __( 'Blog', 'VACT2014_TEXTDOMAIN' );
	// Change post submenu
	$submenu['edit.php'][5][0] = __( 'All Blogs', 'VACT2014_TEXTDOMAIN' );
}
add_action( 'admin_menu', '_visualive_theme_change_sidemenu_text' );


/**
 * Change the post type labels
 *
 * @link http://goo.gl/rLC2W
 * @return Object
 */
function _visualive_theme_change_posttype_labels() {
	global $wp_post_types;

	// Get the post labels
	$postLabels = $wp_post_types['post']->labels;
	$postLabels->name               = __( 'Blog', 'VACT2014_TEXTDOMAIN' );
	// $postLabels->singular_name      = 'Articles';
	// $postLabels->add_new            = 'Add Articles';
	$postLabels->add_new_item       = __( 'Add Blog', 'VACT2014_TEXTDOMAIN' );
	$postLabels->edit_item          = __( 'Edit Blog', 'VACT2014_TEXTDOMAIN' );
	// $postLabels->new_item           = 'Articles';
	$postLabels->view_item          = __( 'View Blog', 'VACT2014_TEXTDOMAIN' );
	$postLabels->search_items       = __( 'Search Blogs', 'VACT2014_TEXTDOMAIN' );
	// $postLabels->not_found          = 'No Articles found';
	// $postLabels->not_found_in_trash = 'No Articles found in Trash';
}
add_action( 'init', '_visualive_theme_change_posttype_labels' );


/**
 * Register Post Type
 * WordPress Codex Function register_post_type
 * @link http://goo.gl/C3qzd
 */
function _visualive_theme_register_post_type() {
	register_post_type( 'info', array(
		'label'               => __( 'Information', 'VACT2014_TEXTDOMAIN' ),
		'labels'              => array(
									'all_items' => __( 'All Informations', 'VACT2014_TEXTDOMAIN' )
								),
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		'taxonomies'          => array( 'info_cat' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	) ); // register_post_type

	register_post_type( 'showcase', array(
		'label'               => __( 'Showcase', 'VACT2014_TEXTDOMAIN' ),
		'labels'              => array(
									'all_items' => __( 'All Showcases', 'VACT2014_TEXTDOMAIN' )
								),
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		'taxonomies'          => array( 'sc_cat' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	) ); // register_post_type
}
add_action( 'init', '_visualive_theme_register_post_type', 0 );


// Register Custom Taxonomy
function _visualive_theme_register_taxonomy() {
	register_taxonomy( 'info_cat', array( 'info' ), array(
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
	) ); // register_taxonomy

	register_taxonomy( 'sc_cat', array( 'showcase' ), array(
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
	) ); // register_taxonomy
	register_taxonomy( 'sc_tag', array( 'showcase' ), array(
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	) ); // register_taxonomy
}
add_action( 'init', '_visualive_theme_register_taxonomy', 0 );

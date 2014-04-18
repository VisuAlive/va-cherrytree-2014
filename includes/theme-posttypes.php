<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_template_part( 'includes/class', 'posttype' );

if ( class_exists( 'VA_PostType_Class' ) ) :
function vacb2014_register_posttype() {
	$posttype_info            = new VA_PostType_Class;
	$posttype_info->type      = 'info';
	$posttype_info->name      = 'お知らせ';
	$posttype_info->menu_icon = 'dashicons-info';
	$posttype_info->taxonomy  = array( 'cat' );

	$posttype_sc            = new VA_PostType_Class;
	$posttype_sc->type      = 'showcase';
	$posttype_sc->name      = 'ショーケース';
	$posttype_sc->menu_icon = 'dashicons-media-document';
	register_taxonomy( 'genre', 'showcase', array(
		'label'                      => 'ジャンル',
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
	) ); // register_taxonomy
	register_taxonomy( 'charge', 'showcase', array(
		'label'                      => '担当箇所',
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
	) ); // register_taxonomy

	$posttype_carousel            = new VA_PostType_Class;
	$posttype_carousel->type      = 'carousel';
	$posttype_carousel->name      = 'カルーセル';
	$posttype_carousel->supports  = array( 'title', 'page-attributes' );
	$posttype_carousel->menu_icon = 'dashicons-format-gallery';
	// add_post_type_support( 'carousel', 'page-attributes' );
}
add_action( 'after_setup_theme', 'vacb2014_register_posttype' );
endif;

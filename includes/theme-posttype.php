<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_template_part( 'includes/class', 'posttype' );
if ( class_exists( 'VA_PostType_Class' ) ) :
function vacb2014_register_posttype() {
	$posttype_info = new VA_PostType_Class;
	$posttype_info->type = 'info';
	$posttype_info->name = 'お知らせ';
	$posttype_info->taxonomy = array( 'cat' );

	$posttype_sc = new VA_PostType_Class;
	$posttype_sc->type = 'showcase';
	$posttype_sc->name = 'ショーケース';
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
}
vacb2014_register_posttype();
endif;

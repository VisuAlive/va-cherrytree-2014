<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_template_part( 'includes/class', 'posttype' );
if ( class_exists( 'VA_PostType_Class' ) ) :
function vacb2014_register_posttype() {
	$posttype_info = new VA_PostType_Class;
	$posttype_info->type = 'info';
	$posttype_info->name = 'Information';

	$posttype_sc = new VA_PostType_Class;
	$posttype_sc->type = 'showcase';
	$posttype_sc->name = 'Showcase';
}
vacb2014_register_posttype();
endif;

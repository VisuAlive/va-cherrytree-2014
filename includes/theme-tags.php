<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function vacb_get_post_types() {
	$default_post = array('post' => 'post', 'page' => 'page');
	$custom_post  = get_post_types( array( 'public' => true, '_builtin' => false ), 'names' );
	return array_merge( $default_post, $custom_post );
}

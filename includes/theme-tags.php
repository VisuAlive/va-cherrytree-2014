<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function visualive_theme_post_types() {
	$default_post = array('post' => 'post', 'page' => 'page');
	$custom_post  = get_post_types( array( 'public' => true, '_builtin' => false ), 'names' );
	return array_merge( $default_post, $custom_post );
}


function visualive_theme_escape_text( $text ) {
	$text = strip_shortcodes( $text );
	$text = strip_tags( $text );
	$text = str_replace( array("\r\n","\r","\n"), '', $text );

	return esc_html( $text );
}


function is_login_page() {
	return in_array( $GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php') );
}

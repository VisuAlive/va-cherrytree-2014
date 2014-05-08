<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
if ( va_is_login() ) :
/**
 * The Setup login
 *
 * @package WordPress
 * @subpackage VA_CherryBlossum_2014
 * @since VA CherryBlossum 2014 1.0.0
 * @version 1.0.0
 * @author KUCKLU <kuck1u@visualive.jp>
 * @copyright Copyright (c) 2014 KUCKLU, VisuAlive.
 * @license http://opensource.org/licenses/gpl-2.0.php GPLv2
 * @link http://visualive.jp/
 */


if ( ! function_exists( '_visualive_theme_admin_css_url' ) ) :
/**
 * Login page custom css
 *
 * @return string
 */
function _visualive_theme_admin_css_url() {
	wp_enqueue_style( 'va-login', get_stylesheet_directory_uri() . '/assets/css/login.min.css', array() );
	wp_print_styles();
}
endif;
add_action( 'login_enqueue_scripts', '_visualive_theme_admin_css_url' );


if ( ! function_exists( '_visualive_theme_basic_auth' ) ) :
/**
 * ログイン時にBasic認証をつける
 */
function _visualive_theme_basic_auth() {
	$auth_id       = ( ! empty( $GLOBALS['vacb_options']['vacb_general_security_basic_id'] ) ) ? visualive_theme_get_stretched_password( $GLOBALS['vacb_options']['vacb_general_security_basic_id'] ) : '' ;
	$auth_pw       = ( ! empty( $GLOBALS['vacb_options']['vacb_general_security_basic_pass'] ) ) ? visualive_theme_get_stretched_password( $GLOBALS['vacb_options']['vacb_general_security_basic_pass'] ) : '' ;
	$php_auth_user = ( isset( $_SERVER['PHP_AUTH_USER'] ) ) ? visualive_theme_get_stretched_password( $_SERVER['PHP_AUTH_USER'] ) : '';
	$php_auth_pw   = ( isset( $_SERVER['PHP_AUTH_PW'] ) ) ? visualive_theme_get_stretched_password( $_SERVER['PHP_AUTH_PW'] ) : '';
	$improper      = array('');

	nocache_headers();

	if ( is_user_logged_in() || in_array( $auth_id, $improper ) || in_array( $auth_pw, $improper ) ) {
		return;
	}

	/**
	 * Echo basic auth
	 *
	 * @link http://www.phpbook.jp/tutorial/auth/index1.html
	 */
	if ( ! isset($php_auth_user) && ! isset($php_auth_pw) ) {
		header( 'WWW-Authenticate: Basic realm="Private Page"' );
		header( 'HTTP/1.0 401 Unauthorized' );
		die( __( 'Authorization Required.', VACB_TEXTDOMAIN ) );
	} else {
		if ( $php_auth_user != $auth_id || $php_auth_pw != $auth_pw ) {
			header( 'WWW-Authenticate: Basic realm="Private Page"' );
			header( 'HTTP/1.0 401 Unauthorized' );
			die( __( 'Authorization Required.', VACB_TEXTDOMAIN ) );
		}
	}
}
endif; // _visualive_theme_basic_auth
add_action( 'login_init', '_visualive_theme_basic_auth', 0 );


/**
 * salt + ストレッチングしたパスワードを取得
 *
 * @link http://www.websec-room.com/2013/02/27/246
 */
function visualive_theme_get_stretched_password( $word ) {
	$word = esc_attr($word);
	$salt = LOGGED_IN_SALT; // Set wp-config.php
	$hash = '';
	for ( $i = 0; $i < 1000; $i++ ) {
		$hash = hash( 'sha256', $hash . $salt . $word );
	}
	return $hash;
}


/**
 * Remove error message
 */
add_filter( 'login_errors', '__return_false' );


if ( ! function_exists('_visualive_theme_login_headerurl') ) :
/**
 * Change login header url
 *
 * @return string
 */
function _visualive_theme_login_headerurl( $login_header_url ) {
	$login_header_url = esc_url( home_url('/') );
	return $login_header_url;
}
endif;
add_filter( 'login_headerurl', '_visualive_theme_login_headerurl' );


if ( ! function_exists('_visualive_theme_login_headertitle') ) :
/**
 * Change login header title
 *
 * @return string
 */
function _visualive_theme_login_headertitle( $login_header_title ) {
	$login_header_title = esc_attr( get_bloginfo('name') );
	return $login_header_title;
}
endif;
add_filter( 'login_headertitle', '_visualive_theme_login_headertitle' );

endif; // va_is_login

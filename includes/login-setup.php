<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
if ( is_login_page() ) :


add_filter( 'login_errors', '__return_false' );


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


if ( ! function_exists( '_visualive_theme_admin_css_url' ) ) :
/**
 * Login page custom css
 *
 * @return string
 */
function _visualive_theme_admin_css_url() {
	wp_enqueue_style( 'va-login', get_stylesheet_directory_uri() . '/assets/css/login.css', array() );
	wp_print_styles();
}
endif;
add_action( 'login_enqueue_scripts', '_visualive_theme_admin_css_url' );


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


endif; // is_login_page

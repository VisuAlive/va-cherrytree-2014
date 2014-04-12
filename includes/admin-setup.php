<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


if ( ! current_user_can('update_core') ) {
	define( 'DISALLOW_FILE_MODS', true );
	define( 'DISALLOW_FILE_EDIT', true );
	define( 'DISALLOW_UNFILTERED_HTML', true );
}
add_filter( 'auto_update_plugin', '__return_true' );
add_filter( 'auto_update_theme', '__return_true' );
add_filter( 'login_errors', '__return_false' );


/**
 * Login page custom css
 *
 * @return string
 */
if ( ! function_exists( '_visualive_theme_admin_css_url' ) ) :
function _visualive_theme_admin_css_url() {
	wp_enqueue_style( 'va-login', get_stylesheet_directory_uri() . '/assets/css/login.css', array() );
	wp_print_styles();
}
endif;
add_action( 'login_enqueue_scripts', '_visualive_theme_admin_css_url' );


if ( ! function_exists( '_visualive_theme_remove_dashboard_widgets' ) ) :
function _visualive_theme_remove_dashboard_widgets() {
	global $wp_meta_boxes;
	// 現在の状況
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	// 最近のコメント
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	// 被リンク
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	// プラグイン
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	// クイック投稿
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	// 最近の下書き
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
	// WordPressブログ
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	// WordPressフォーラム
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
}
endif;
add_action( 'wp_dashboard_setup', '_visualive_theme_remove_dashboard_widgets' );


/**
 * フッタの先頭に何かを出力する場合、echo
 * @return void
 */
// if ( ! function_exists( '_visualive_theme_in_admin_footer' ) ) :
// function _visualive_theme_in_admin_footer() {
// 	echo '<p>in_admin_footer</p>';
// }
// endif;
// add_filter( 'in_admin_footer', '_visualive_theme_in_admin_footer' );


if ( ! function_exists( '_visualive_theme_custom_admin_footer_text' ) ) :
/**
 * フッタの文章を変更する。
 * @param string $code
 */
function _visualive_theme_custom_admin_footer_text() {
	return __( 'ウェブサイト制作でお困りの際は <a href="http://visualive.jp/" target="_blank">ヴィジュアライブ</a> 迄お問い合わせください。', VACB2014_TEXTDOMAIN );
}
endif;
add_filter( 'admin_footer_text', '_visualive_theme_custom_admin_footer_text' );


if ( ! function_exists( '_visualive_theme_custom_update_footer' ) ) :
/**
 * フッタのワードプレスのバージョン部分のテキストを設定する。
 * @param strign $string
 */
function _visualive_theme_custom_update_footer() {
	return 'Powered by VisuAlive';
}
endif;
add_filter( 'update_footer', '_visualive_theme_custom_update_footer', 9999 );

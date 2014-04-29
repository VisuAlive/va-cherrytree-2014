<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
if ( is_admin() ) :
/**
 * The Setup admin
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


if ( ! current_user_can('update_core') ) {
	define( 'DISALLOW_FILE_MODS',       true );
	define( 'DISALLOW_FILE_EDIT',       true );
	define( 'DISALLOW_UNFILTERED_HTML', true );
}
add_filter( 'auto_update_plugin', '__return_true' );
add_filter( 'auto_update_theme',  '__return_true' );


/**
 * ユーザープロフィールの項目のカスタマイズ
 */
function _visualive_theme_user_meta( $meta ) {
	//項目の追加
	$meta['twitter'] = 'Twitter';
	$meta['facebook'] = 'Facebook';
	$meta['phone'] = '電話';
	$meta['address'] = '住所';

	return $meta;
}
add_filter( 'user_contactmethods', '_visualive_theme_user_meta' );


/**
 * カスタム投稿タイプの投稿件数をダッシュボードに表示
 *
 * @link https://core.trac.wordpress.org/ticket/26571
 */
if ( ! function_exists( '_visualive_theme_posttype_dashboard' ) ) :
function _visualive_theme_posttype_dashboard() {
	$dashboard_custom_post_types = get_post_types( array( 'public' => true, '_builtin' => false ), 'names' );

	foreach( $dashboard_custom_post_types as $custom_post_type ) {
		global $wp_post_typeposts;
		$num_post_type = wp_count_posts( $custom_post_type );
		$num = number_format_i18n( $num_post_type->publish );
		$text = _n( get_post_type_object( $custom_post_type )->labels->singular_name, get_post_type_object( $custom_post_type )->labels->name, $num_post_type->publish );
		$capability = get_post_type_object( $custom_post_type )->cap->edit_posts;
		if ( current_user_can($capability) ) {
			$num = "<a href='edit.php?post_type=" . esc_attr( $custom_post_type ) . "'>" . esc_html( $num ) . "件の" . get_post_type_object( $custom_post_type )->labels->name . "</a>";
		}
		echo '<li class="' . esc_attr( $custom_post_type ) . '-count">' . $num . '</li>';
	}
}
endif;
add_action( 'dashboard_glance_items', '_visualive_theme_posttype_dashboard' );


/**
 * スラッグのデフォルト値をpost-***形式に変更
 *
 * @return string
 */
if ( ! function_exists( '_visualive_theme_auto_post_slug' ) ) :
function _visualive_theme_auto_post_slug( $slug, $post_ID, $post_status, $post_type, $post_title ) {
	if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
		// $slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
		$slug = 'post-' . $post_ID;
	}
	return $slug;
}
endif;
add_filter( 'wp_unique_post_slug', '_visualive_theme_auto_post_slug', 10, 5 );


if ( ! function_exists( '_visualive_theme_admin_setup_message' ) ) :
/**
 * The message of the purport that initial setting of theme is carried out is sent.
 *
 * @return string
 */
function _visualive_theme_admin_setup_message() {
	$auth_id   = $GLOBALS['vacb_options']['vacb_general_security_basic_id'];
	$auth_pass = $GLOBALS['vacb_options']['vacb_general_security_basic_pass'];
	$improper  = array('', 'root', 'admin', 'webmaster', 'pass', 'password');
	// functions.phpを開いて、VACB2014_AUTH_IDとVACB2014_AUTH_PASSを編集して、セットアップを完成してください。
	$message   = __( 'Please open ' . get_template_directory() . '/functions.php,<br>edit VACB2014_AUTH_ID and VACB2014_AUTH_PASS, and complete a setup.', VACB_TEXTDOMAIN );

	if ( in_array( $auth_id, $improper ) || in_array( $auth_pass, $improper ) ) {
		echo "<div id='message' class='error'><p><strong>$message</strong></p></div>";
	}
}
endif; // _visualive_theme_admin_setup_message
// add_action( 'admin_notices', '_visualive_theme_admin_setup_message' );


if ( ! function_exists( '_visualive_theme_remove_dashboard_widgets' ) ) :
function _visualive_theme_remove_dashboard_widgets() {
	global $wp_meta_boxes;
	if ( ! current_user_can('update_core') ) {
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
}
endif;
add_action( 'wp_dashboard_setup', '_visualive_theme_remove_dashboard_widgets' );


if ( ! function_exists( '_visualive_theme_remove_metabox' ) ) :
function _visualive_theme_remove_metabox() {
	remove_meta_box( 'slugdiv',          'post', 'normal' );
	remove_meta_box( 'authordiv',        'post', 'normal' );
	remove_meta_box( 'postcustom',       'post', 'normal' );
	remove_meta_box( 'commentstatusdiv', 'post', 'normal' );

	remove_meta_box( 'slugdiv',          'page', 'normal' );
	remove_meta_box( 'authordiv',        'page', 'normal' );
	remove_meta_box( 'postcustom',       'page', 'normal' );
	remove_meta_box( 'commentstatusdiv', 'page', 'normal' );
}
endif;
add_action( 'admin_menu', '_visualive_theme_remove_metabox' );
// ! current_user_can('update_core')

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
	return __( 'ウェブサイト制作でお困りの際は <a href="http://visualive.jp/" target="_blank">ヴィジュアライブ</a> 迄お問い合わせください。', VACB_TEXTDOMAIN );
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


if ( ! function_exists( '_visualive_theme_editor_classes' ) ) :
/**
 * Extend the default WordPress post classes.
 *
 * @param array $classes A list of existing post class values.
 * @return array The filtered post class list.
 */
function _visualive_theme_editor_classes( $classes ){
	$classes['body_class'] = 'editor-area';
	return $classes;
}
endif; // _visualive_theme_editor_classes
add_filter( 'tiny_mce_before_init', '_visualive_theme_editor_classes' );


endif; // is_admin

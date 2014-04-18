<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * @package VA CherryBlossum 2014
 * @version 0.0.1
 * @author KUCKLU <kucklu@visualive.jp>
 * @copyright Copyright (c) 2014 KUCKLU, VisuAlive.
 * @license http://opensource.org/licenses/gpl-2.0.php GPLv2
 * @link http://visualive.jp/
 */
/**
 * このファイルはBootstrapとして動きます。
 *
 * - ファイルの読み込みだけを行うようにしてください。
 * - 関数には必ず接頭辞としてvacb_をつけます。
 * - フックに登録するだけのコールバック関数は_visualive_theme_を接頭辞とします。
 * - フックに登録する場合、特定の事情がなければ関数定義のすぐ下に書いてください。
 * - admin-setupを先に読み込みその後theme-setup読み込む。theme-setupの後にmetaboxやoption等を必要に応じて読み込むようにしてください。
 *
 * @since 0.0.1
 */
ini_set( 'display_errors', 1 );
$GLOBALS['vacb_options'] = get_option('_vacb_options_');
define( 'VACB2014_TEXTDOMAIN', 'va_cherryblossum_2014' );

get_template_part( 'includes/admin', 'setup' );
get_template_part( 'includes/theme', 'setup' );
get_template_part( 'includes/theme', 'options' );
get_template_part( 'includes/theme', 'posttypes' );
get_template_part( 'includes/theme', 'metaboxs' );

// Plugin includes
get_template_part( 'includes/plugin', 'hack' );
get_template_part( 'includes/plugin', 'admin-postlist-addcolumns' );
get_template_part( 'includes/plugin', 'post-discussion-closed' );


function vacb_get_post_types() {
	$default_post = array('post' => 'post', 'page' => 'page');
	$custom_post  = get_post_types( array( 'public' => true, '_builtin' => false ), 'names' );
	return array_merge( $default_post, $custom_post );
}

/**
 * ポストIDとポストタイトルを取得
 * Vafpress Framework で使用
 *
 * @return array
 */
function vacb_get_post( $type = null ) {
	switch ( $type ) {
		case 'info':
			$posttye = 'info';
			break;
		case 'showcase':
			$posttye = 'showcase';
			break;
		default:
			$posttye = 'post';
			break;
	}
	$wp_posts = get_posts( array(
		'posts_per_page' => -1,
		'post_type' => $posttye
	) );

	$result = array();
	foreach ($wp_posts as $post) {
		$result[] = array( 'value' => $post->ID, 'label' => $post->post_title );
	}
	return $result;
}
function vacb_get_posts() {
	return vacb_get_post();
}
function vacb_get_infos() {
	return vacb_get_post( 'info' );
}
function vacb_get_showcases() {
	return vacb_get_post( 'showcase' );
}


// function test( $post_states, $post ) {
// 	if ( 'expiration' == $post->post_status )
// 		$post_states['expiration'] = __('Expiration');

// 	return $post_states;
// }
// add_filter( 'display_post_states', 'test', 10, 2 );

<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * The Functions
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
/**
 * このファイルはBootstrapとして動きます。
 *
 * - ファイルの読み込みだけを行うようにしてください。
 * - 関数には必ず接頭辞としてvacb_をつけます。
 * - フックに登録するだけのコールバック関数は_visualive_theme_を接頭辞とします。
 * - フックに登録する場合、特定の事情がなければ関数定義のすぐ下に書いてください。
 * - admin-setupを先に読み込みその後theme-setup読み込む。theme-setupの後にmetaboxやoption等を必要に応じて読み込むようにしてください。
 */
// ini_set( 'display_errors', 1 );
$GLOBALS['vacb_options'] = get_option('_vacb_options_');
define( 'VACB_TEXTDOMAIN', 'va-cherryblossum-2014' );

get_template_part( 'includes/admin', 'setup' );
get_template_part( 'includes/theme', 'setup' );
get_template_part( 'includes/theme', 'options' );
get_template_part( 'includes/theme', 'posttypes' );
get_template_part( 'includes/theme', 'metaboxs' );

// Plugin includes
get_template_part( 'includes/plugin', 'hack' );
get_template_part( 'includes/plugin', 'admin-postlist-addcolumns' );
get_template_part( 'includes/plugin', 'post-discussion-closed' );
get_template_part( 'includes/plugin', 'simple-expires' );


// function test( $post_states, $post ) {
// 	if ( 'expiration' == $post->post_status )
// 		$post_states['expiration'] = __('Expiration');

// 	return $post_states;
// }
// add_filter( 'display_post_states', 'test', 10, 2 );


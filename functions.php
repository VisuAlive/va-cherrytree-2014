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
 * - VA CherryBlossumシリーズとして今後も使用する関数
 *   - 関数には必ず接頭辞としてvisualive_theme_をつけます。
 *   - フックに登録するだけのコールバック関数は_visualive_theme_を接頭辞とします。
 * - VA CherryBlossum 2014のみで使用する関数
 *   - 関数には必ず接頭辞としてvacb2014_をつけます。
 *   - フックに登録するだけのコールバック関数は_vacb2014_を接頭辞とします。
 * - フックに登録する場合、特定の事情がなければ関数定義のすぐ下に書いてください。
 */
// ini_set( 'display_errors', 1 );
$GLOBALS['vacb_options'] = get_option('_vacb_options_');
define( 'VACB_TEXTDOMAIN', 'va-cherryblossum-2014' );


get_template_part( 'includes/vafpress-framework/bootstrap' );
get_template_part( 'includes/tags' );
get_template_part( 'includes/setup', 'login' );
get_template_part( 'includes/setup', 'admin' );
get_template_part( 'includes/setup', 'theme' );
get_template_part( 'includes/theme', 'options' );
get_template_part( 'includes/theme', 'posttypes' );
get_template_part( 'includes/theme', 'metaboxs' );

// Plugin includes
get_template_part( 'includes/plugin', 'hack' );
get_template_part( 'includes/plugin', 'admin-postlist-addcolumns' );
get_template_part( 'includes/plugin', 'post-discussion-closed' );
get_template_part( 'includes/plugin', 'simple-expires' );

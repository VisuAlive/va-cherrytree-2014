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
 * - 関数には必ず接頭辞としてvacb2014_をつけます。
 * - フックに登録するだけのコールバック関数は_vacb2014_を接頭辞とします。
 * - フックに登録する場合、特定の事情がなければ関数定義のすぐ下に書いてください。
 * - admin-setupを先に読み込みその後theme-setup読み込む。theme-setupの後にmetaboxやoption等を必要に応じて読み込むようにしてください。
 *
 * @since 0.0.1
 */
ini_set( 'display_errors', 1 );
define( 'VACB2014_TEXTDOMAIN', 'va_cherryblossum_2014' );
define( 'VACB2014_AUTH_ID', '' );
define( 'VACB2014_AUTH_PASS', '' );

get_template_part( 'includes/admin', 'setup' );
get_template_part( 'includes/theme', 'setup' );
get_template_part( 'includes/theme', 'posttype' );
get_template_part( 'includes/theme', 'metabox' );
get_template_part( 'includes/theme', 'options' );

// Plugin includes
get_template_part( 'includes/plugin', 'hack' );
get_template_part( 'includes/plugin', 'admin-postlist-addcolumns' );
get_template_part( 'includes/plugin', 'post-discussion-closed' );


<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_template_part( 'includes/class', 'posttype' );

if ( class_exists( 'VA_PostType_Class' ) ) :
function vacb2014_register_posttype() {
	$posttype_info            = new VA_PostType_Class;
	$posttype_info->type      = 'info';
	$posttype_info->name      = 'お知らせ';
	$posttype_info->menu_icon = 'dashicons-info';
	$posttype_info->taxonomy  = array( 'cat' );

	$posttype_dl            = new VA_PostType_Class;
	$posttype_dl->type      = 'download';
	$posttype_dl->name      = 'ダウンロード';
	$posttype_dl->menu_icon = 'dashicons-download';
	$posttype_dl->taxonomy  = array( 'cat', 'tag' );

	$posttype_sc            = new VA_PostType_Class;
	$posttype_sc->type      = 'showcase';
	$posttype_sc->name      = 'ショーケース';
	$posttype_sc->menu_icon = 'dashicons-media-document';
	register_taxonomy( 'genre', 'showcase', array(
		'label'                      => 'ジャンル',
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
	) ); // register_taxonomy
	register_taxonomy( 'charge', 'showcase', array(
		'label'                      => '担当箇所',
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
	) ); // register_taxonomy

	$posttype_carousel            = new VA_PostType_Class;
	$posttype_carousel->type      = 'carousel';
	$posttype_carousel->name      = 'カルーセル';
	$posttype_carousel->supports  = array( 'title', 'page-attributes' );
	$posttype_carousel->menu_icon = 'dashicons-format-gallery';

	add_post_type_support( 'page', 'excerpt' );
}
endif;
add_action( 'init', 'vacb2014_register_posttype', 0 );


// /**
//  * Replace menu text within the admin sidebar menu
//  *
//  * @link http://goo.gl/rLC2W
//  * @return array
//  */
// if ( ! function_exists( '_visualive_theme_change_sidemenu_text' ) ) :
// function _visualive_theme_change_sidemenu_text() {
// 	global $menu;
// 	global $submenu;

// 	// Change menu item
// 	$menu[5][0] = __( 'ブログ', VACB_TEXTDOMAIN );
// 	// Change post submenu
// 	$submenu['edit.php'][5][0] = __( 'ブログ一覧', VACB_TEXTDOMAIN );
// }
// endif;
// if ( is_admin() ) { add_action( 'admin_menu', '_visualive_theme_change_sidemenu_text' ); }


// /**
//  * Change the post type labels
//  *
//  * @link http://goo.gl/rLC2W
//  * @return Object
//  */
// if ( ! function_exists( '_visualive_theme_change_posttype_labels' ) ) :
// function _visualive_theme_change_posttype_labels() {
// 	global $wp_post_types;

// 	// Get the post labels
// 	$postLabels = $wp_post_types['post']->labels;
// 	$postLabels->name = __( 'ブログ', VACB_TEXTDOMAIN );
// }
// endif;
// if ( is_admin() ) { add_action( 'init', '_visualive_theme_change_posttype_labels' ); }

/**
 * page-attributes がサポートされていたら、自動的に順序（menu_order）順に従って表示
 */
if ( ! function_exists( '_vacb2014_archive_orderby_menu_order' ) ) :
function _vacb2014_archive_orderby_menu_order( $wp_query ) {
	if ( $wp_query->is_post_type_archive() && post_type_supports( $wp_query->query_vars['post_type'], 'page-attributes' ) ) {
		if ( ! isset( $wp_query->query_vars['orderby'] ) ) {
			$wp_query->query_vars['orderby'] = 'menu_order';
		}
		if ( ! isset( $wp_query->query_vars['order'] ) ) {
			$wp_query->query_vars['order'] = 'ASC';
		}
	}
}
endif;
add_action( 'pre_get_posts', '_vacb2014_archive_orderby_menu_order' );


/**
 * カスタム投稿タイプのアーカイブを作成
 */
if ( ! function_exists( '_vacb2014_schoolsummary_monthly_archive' ) ) :
function _vacb2014_schoolsummary_monthly_archive( $where, $r ) {
	global $my_archives_post_type;
	$my_archives_post_type = '';
	if ( isset($r['post_type']) ) {
		$my_archives_post_type = $r['post_type'];
		$where = str_replace( '\'post\'', '\'' . $r['post_type'] . '\'', $where );
	}
	return $where;
}
endif; // _vacb2014_schoolsummary_monthly_archive
add_filter( 'getarchives_where', '_vacb2014_schoolsummary_monthly_archive', 10, 2 );

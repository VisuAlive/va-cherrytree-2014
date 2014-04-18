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
	// add_post_type_support( 'carousel', 'page-attributes' );
}
endif;
add_action( 'after_setup_theme', 'vacb2014_register_posttype' );


/**
 * Replace menu text within the admin sidebar menu
 *
 * @link http://goo.gl/rLC2W
 * @return array
 */
if ( ! function_exists( '_visualive_theme_change_sidemenu_text' ) ) :
function _visualive_theme_change_sidemenu_text() {
	global $menu;
	global $submenu;

	// Change menu item
	$menu[5][0] = __( 'ブログ', VACB2014_TEXTDOMAIN );
	// Change post submenu
	$submenu['edit.php'][5][0] = __( 'ブログ一覧', VACB2014_TEXTDOMAIN );
}
endif;
add_action( 'admin_menu', '_visualive_theme_change_sidemenu_text' );


/**
 * Change the post type labels
 *
 * @link http://goo.gl/rLC2W
 * @return Object
 */
if ( ! function_exists( '_visualive_theme_change_posttype_labels' ) ) :
function _visualive_theme_change_posttype_labels() {
	global $wp_post_types;

	// Get the post labels
	$postLabels = $wp_post_types['post']->labels;
	$postLabels->name = __( 'ブログ', VACB2014_TEXTDOMAIN );
}
endif;
add_action( 'init', '_visualive_theme_change_posttype_labels' );


/**
 * スラッグのデフォルト値をpost-***形式に変更
 *
 * @return string
 */
if ( ! function_exists( '_vacb2014_auto_post_slug' ) ) :
function _vacb2014_auto_post_slug( $slug, $post_ID, $post_status, $post_type, $post_title ) {
	if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
		// $slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
		$slug = 'post-' . $post_ID;
	}
	return $slug;
}
endif;
add_filter( 'wp_unique_post_slug', '_vacb2014_auto_post_slug', 10, 5 );


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
 * カスタム投稿タイプの投稿件数をダッシュボードに表示
 *
 * @link https://core.trac.wordpress.org/ticket/26571
 */
if ( ! function_exists( '_vacb2014_posttype_dashboard' ) ) :
function _vacb2014_posttype_dashboard() {
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
add_action( 'dashboard_glance_items', '_vacb2014_posttype_dashboard' );


if ( ! function_exists( '_vacb2014_posttype_dashboard_style' ) ) :
function _vacb2014_posttype_dashboard_style() {
	echo '<style type="text/css">
		.info-count a:before {content:"\f348" !important;}
		.showcase-count a:before {content:"\f497" !important;}
		.carousel-count a:before {content:"\f161" !important;}
		</style>';
}
endif;
add_action('admin_head', '_vacb2014_posttype_dashboard_style');


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

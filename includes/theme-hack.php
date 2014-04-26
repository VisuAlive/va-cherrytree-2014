<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
if ( ! is_admin() ) :


/**
 * Shortcodes in WordPress Widget Area
 */
add_filter('widget_text', 'do_shortcode');


if ( ! function_exists( '_visualive_theme_wp_title' ) ) :
/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Twenty Fourteen 1.0 ( Custom VisuAlive )
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function _visualive_theme_wp_title( $title, $sep ) {
	global $paged, $page, $post;

	$meta_title = vp_metabox('_vacb_metaboxs_seo_.vacb_seo_title');

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	if ( is_home() || is_front_page() ) {
		$title = $title;
	}
	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentyfourteen' ), max( $paged, $page ) );

	}

	// Add a single page title
	if ( is_singular() && ! empty($meta_title) ) {
		$title = $meta_title . ' ' . $sep . ' ' . get_bloginfo( 'name' );
	}

	return $title;
}
endif; // _visualive_theme_wp_title
add_filter( 'wp_title', '_visualive_theme_wp_title', 10, 2 );


if ( ! function_exists( '_visualive_theme_bloginfo' ) ) :
/**
 * Change the description
 *
 * @return string
 */
function _visualive_theme_bloginfo( $output, $show) {
	if ( ! is_login_page() )
		return $output;

	switch( $show ) :
		case 'description':
				if ( is_home() || is_front_page() ) {
					$output = $output;
				} elseif ( is_singular() || is_single() || is_page() ) {
					$meta_description = vp_metabox('_vacb_metaboxs_seo_.vacb_seo_description');
					$meta_description = ( ! empty( $meta_description ) ) ? $meta_description : '';
					$post = get_post( get_the_ID(), 'OBJECT', 'edit' );
					$post_content = ( ! empty( $post ) ) ? visualive_theme_escape_text( $post->post_content ) : '';
					$post_excerpt = ( ! empty( $post ) ) ? visualive_theme_escape_text( $post->post_excerpt ) : '';

					if ( ! empty($meta_description) ) {
						$output = $meta_description;
					} elseif ( ! empty($post_excerpt) ) {
						$output = $post_excerpt;
					} elseif ( ! empty($post_content) ) {
						$output = mb_substr( $post_content, 0, 120 );
					}
				}
			break;
	endswitch;

	return $output;
}
endif; // _visualive_theme_bloginfo
add_filter( 'bloginfo', '_visualive_theme_bloginfo', 10, 2 );


if ( ! function_exists( '_visualive_theme_excerpt' ) ) :
/**
 * Change the excerpt
 *
 * @return string
 */
function _visualive_theme_excerpt( $output ) {
	$meta_description = vp_metabox('_vacb_metaboxs_seo_.vacb_seo_description');
	$post = get_post( get_the_ID(), 'OBJECT', 'edit' );
	$post_content = visualive_theme_escape_text( $post->post_content );
	$post_excerpt = visualive_theme_escape_text( $post->post_excerpt );

	if ( ! empty($meta_description) ) {
		$output = $meta_description;
	} elseif ( ! empty($post_excerpt) ) {
		$output = $post_excerpt;
	} elseif ( ! empty($post_content) ) {
		$output = mb_substr( $post_content, 0, 120 );
	}

	return $output;
}
endif; // _visualive_theme_bloginfo
add_filter( 'get_the_excerpt', '_visualive_theme_excerpt', 10, 2 );


if ( ! function_exists( '_visualive_theme_remove_cssjs_ver' ) ) :
/**
 * head内に出力されるlink-tag and script-tagよりversion情報を削除する
 *
 * @return string
 */
function _visualive_theme_remove_cssjs_ver( $src ) {
	if ( !is_user_logged_in() && strpos( $src, '?ver=' ) ) {
		$src = remove_query_arg( 'ver', $src );
	}
	return $src;
}
endif; // _visualive_theme_remove_cssjs_ver
add_filter( 'style_loader_src', '_visualive_theme_remove_cssjs_ver', 1000, 2 );
add_filter( 'script_loader_src', '_visualive_theme_remove_cssjs_ver', 1000, 2 );


endif; // is_admin

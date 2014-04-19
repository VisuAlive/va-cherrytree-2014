<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_template_part( 'includes/theme', 'tags' );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 714; /* pixels */
}

if ( ! function_exists( '_visualive_theme_setup' ) ) :
/**
 * VA Official 2014 setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since VA Official 2014 1.0
 */
function _visualive_theme_setup() {
	/*
	 * Make VA Official 2014 available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on VA Official 2014, use a find and
	 * replace to change 'va_official_2014' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( VACB2014_TEXTDOMAIN, get_template_directory() . '/languages' );
	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( 'assets/css/editor-style.css' );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'caption', 'gallery' ) );
	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	/**
	 * Add theme support for Infinite Scroll.
	 * See: http://jetpack.me/support/infinite-scroll/
	 */
	add_theme_support( 'infinite-scroll', array( 'container' => 'main', 'footer' => 'page' ) );
	/**
	 * Remove filter & action
	 */
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'rss_head', 'the_generator' );
	remove_action( 'rss2_head', 'the_generator' );
	remove_action( 'rdf_header', 'the_generator' );
	remove_action( 'atom_head', 'the_generator' );
	remove_action( 'opml_head', 'the_generator' );
	remove_action( 'app_head', 'the_generator' );
	remove_action( 'commentsrss2_head', 'the_generator' );
	remove_action( 'comments_atom_head', 'the_generator' );
}
endif; // _visualive_theme_setup
add_action( 'after_setup_theme', '_visualive_theme_setup' );


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
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
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


if ( ! function_exists( '_visualive_theme_the_meta_tags' ) ) :
/**
 * Create the meta-tags
 *
 * @return string
 */
function _visualive_theme_the_meta_tags() {
	$metatag      = '';
	$meta_title   = vp_metabox('_vacb_metaboxs_seo_.vacb_seo_title');
	$meta_noindex = vp_metabox('_vacb_metaboxs_seo_.vacb_seo_noindex');
	$noindex      = $GLOBALS['vacb_options']['vacb_general_seo_noindex'];

	/**
	 * Noindex
	 */
	if ( ( is_singular() || is_single() || is_page() ) && isset($meta_noindex) ) {
		$metatag .= '<meta name="robots" content="noindex,follow">' . "\n";
	} elseif (
		( in_array( 'category',   $noindex ) && is_category() ) ||
		( in_array( 'tag',        $noindex ) && is_tag() ) ||
		( in_array( 'search',     $noindex ) && is_search() ) ||
		( in_array( 'date',       $noindex ) && is_date() ) ||
		( in_array( 'author',     $noindex ) && is_author() ) ||
		( in_array( 'attachment', $noindex ) && is_attachment() ) ||
		( in_array( 'tax',        $noindex ) && is_tax() ) ) {
		$metatag .= '<meta name="robots" content="noindex,follow">' . "\n";
	}
	/**
	 * OGP周り
	 */
	// <link rel="author" href="">
	// <link rel="publisher" href="">
	$metatag .= '<meta name="description" content="' . esc_attr( get_bloginfo('description', 'display') ) . '">' . "\n";
	$metatag .= '<meta property="og:type" content="website">' . "\n";
	if ( is_home() || is_front_page() ) {
		$metatag .= '<meta property="og:title" content="' . esc_attr( get_bloginfo('name') ) . '">' . "\n";
		$metatag .= '<meta property="og:url" content="' . esc_url( get_bloginfo('url') ) . '">' . "\n";
	} elseif ( is_singular() || is_single() || is_page() ) {
		if ( ! empty($meta_title) ) {
			$metatag .= '<meta property="og:title" content="' . esc_attr( vp_metabox('_vacb_metaboxs_seo_.vacb_seo_title') ) . '">' . "\n";
		} else {
			$metatag .= '<meta property="og:title" content="' . esc_attr( get_the_title() ) . '">' . "\n";
		}
		$metatag .= '<meta property="og:url" content="' . esc_url( get_the_permalink() ) . '">' . "\n";
	}
	$metatag .= '<meta property="og:description" content="' . esc_attr( get_bloginfo('description', 'display') ) . '">' . "\n";
	if ( ( is_singular() || is_single() || is_page() ) && get_post_thumbnail_id() ) {
		$metatag .= '<meta property="og:image" content="' . esc_url( wp_get_attachment_url( get_post_thumbnail_id() ) ) .'">' . "\n";
	} elseif ( ! empty($GLOBALS['vacb_options']['vacb_general_seo_ogp_image']) ) {
		$metatag .= '<meta property="og:image" content="' . esc_url( $GLOBALS['vacb_options']['vacb_general_seo_ogp_image'] ) .'">' . "\n";
	}
	$metatag .= '<meta property="og:site_name" content="' . get_bloginfo('name') . '">' . "\n";
	if ( ! empty($GLOBALS['vacb_options']['vacb_general_seo_ogp_admins_id']) ) {
		$metatag .= '<meta property="fb:admins" content="' . esc_attr( $GLOBALS['vacb_options']['vacb_general_seo_ogp_admins_id'] ) . '">' . "\n";
	}
	if ( ! empty($GLOBALS['vacb_options']['vacb_general_seo_ogp_app_id']) ) {
		$metatag .= '<meta property="fb:app_id" content="' . esc_attr( $GLOBALS['vacb_options']['vacb_general_seo_ogp_app_id'] ) . '">' . "\n";
	}
	$metatag .= '<meta name="twitter:card" content="summary">' . "\n";
	if ( ! empty($GLOBALS['vacb_options']['vacb_general_seo_ogp_twitter_id']) ) {
		$metatag .= '<meta name="twitter:site" content="@' . esc_attr( $GLOBALS['vacb_options']['vacb_general_seo_ogp_twitter_id'] ) . '">' . "\n";
	}
	$metatag .= '<meta name="twitter:description" content="' . esc_attr( get_bloginfo('description', 'display') ) . '">' . "\n";

	echo $metatag;
}
endif; // _visualive_theme_the_meta_tags
add_filter( 'wp_head', '_visualive_theme_the_meta_tags', 0 );


if ( ! function_exists( '_visualive_theme_bloginfo' ) ) :
/**
 * Change the description
 *
 * @return string
 */
function _visualive_theme_bloginfo( $output, $show) {
	$meta_description = vp_metabox('_vacb_metaboxs_seo_.vacb_seo_description');

	switch( $show ) :
		case 'description':
				if ( is_home() || is_front_page() ) {
					$output = $output;
				}
				if ( is_singular() || is_single() || is_page() ) {
					if ( ! empty($meta_description) ) {
						$output = $meta_description;
					} elseif ( get_the_excerpt() ) {
						$output = get_the_excerpt();
					}
				}
			break;
	endswitch;

	return $output;
}
endif; // _visualive_theme_bloginfo
add_filter( 'bloginfo', '_visualive_theme_bloginfo', 10, 2 );


if ( ! function_exists( '_visualive_theme_page_menu_args' ) ) :
/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function _visualive_theme_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
endif; // _visualive_theme_page_menu_args
add_filter( 'wp_page_menu_args', '_visualive_theme_page_menu_args' );


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
if ( ! function_exists( '_visualive_theme_body_classes' ) ) :
function _visualive_theme_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	return $classes;
}
endif; // _visualive_theme_body_classes
add_filter( 'body_class', '_visualive_theme_body_classes' );


/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param array $classes A list of existing post class values.
 * @return array The filtered post class list.
 */
if ( ! function_exists( '_visualive_theme_post_classes' ) ) :
function _visualive_theme_post_classes( $classes ) {
	if ( ! post_password_required() && has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	}

	return $classes;
}
endif;
add_filter( 'post_class', '_visualive_theme_post_classes' );

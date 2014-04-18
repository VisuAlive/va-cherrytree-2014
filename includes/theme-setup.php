<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

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
 * @since Twenty Fourteen 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function _visualive_theme_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		// $title = "$title $sep $site_description";
		$title = "$title";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', VACB2014_TEXTDOMAIN ), max( $paged, $page ) );
	}

	return $title;
}
endif; // _visualive_theme_wp_title
add_filter( 'wp_title', '_visualive_theme_wp_title', 10, 2 );


/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
if ( ! function_exists( '_visualive_theme_page_menu_args' ) ) :
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

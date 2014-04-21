<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_template_part( 'includes/theme', 'tags' );
get_template_part( 'includes/theme', 'hack' );

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
	load_theme_textdomain( VACB_TEXTDOMAIN, get_template_directory() . '/languages' );
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


if ( ! function_exists( '_visualive_theme_the_meta_tags' ) ) :
/**
 * Create the meta-tags
 *
 * @return string
 */
function _visualive_theme_the_meta_tags() {
	$metatag      = '';
	$options      = $GLOBALS['vacb_options'];
	$meta_title   = vp_metabox('_vacb_metaboxs_seo_.vacb_seo_title');
	$meta_noindex = vp_metabox('_vacb_metaboxs_seo_.vacb_seo_noindex');
	$noindex      = $options['vacb_general_seo_noindex'];

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
	 * SEO
	 */
	if ( ! empty($options['vacb_general_seo_webmastertool']) ) {
		$metatag .= '<meta name="google-site-verification" content="' . $options['vacb_general_seo_webmastertool'] . '">' . "\n";
	}
	/**
	 * OGP
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
	} elseif ( ! empty($options['vacb_general_seo_ogp_image']) ) {
		$metatag .= '<meta property="og:image" content="' . esc_url( $options['vacb_general_seo_ogp_image'] ) .'">' . "\n";
	}
	$metatag .= '<meta property="og:site_name" content="' . get_bloginfo('name') . '">' . "\n";
	if ( ! empty($options['vacb_general_seo_ogp_admins_id']) ) {
		$metatag .= '<meta property="fb:admins" content="' . esc_attr( $options['vacb_general_seo_ogp_admins_id'] ) . '">' . "\n";
	}
	if ( ! empty($options['vacb_general_seo_ogp_app_id']) ) {
		$metatag .= '<meta property="fb:app_id" content="' . esc_attr( $options['vacb_general_seo_ogp_app_id'] ) . '">' . "\n";
	}
	$metatag .= '<meta name="twitter:card" content="summary">' . "\n";
	if ( ! empty($options['vacb_general_seo_ogp_twitter_id']) ) {
		$metatag .= '<meta name="twitter:site" content="@' . esc_attr( $options['vacb_general_seo_ogp_twitter_id'] ) . '">' . "\n";
	}
	$metatag .= '<meta name="twitter:description" content="' . esc_attr( get_bloginfo('description', 'display') ) . '">' . "\n";

	echo $metatag;
}
endif; // _visualive_theme_the_meta_tags
add_filter( 'wp_head', '_visualive_theme_the_meta_tags', 0 );


if ( ! function_exists( '_visualive_theme_google_analytics' ) ) :
/**
 * Echo Goolge Analytics JS code.
 *
 * @return string
 */
function _visualive_theme_google_analytics() {
	$tracking_id = $GLOBALS['vacb_options']['vacb_general_seo_analytics'];
	$domain = str_replace( array("http://","https://"), '', get_bloginfo('url') );

	if ( ! empty($tracking_id) ) :
?>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', '<?php echo esc_attr($tracking_id); ?>', '<?php echo esc_attr($domain); ?>');
ga('send', 'pageview');
</script>
<?php
	endif;
}
endif; // _visualive_theme_page_menu_args
if ( ! is_admin() ) { add_filter( 'wp_footer', '_visualive_theme_google_analytics', 9999 ); }


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

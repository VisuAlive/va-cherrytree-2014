<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * The Setup theme
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
get_template_part( 'includes/theme', 'hack' );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 714; /* pixels */
}

if ( ! function_exists( '_visualive_theme_after_switch_theme' ) ) :
function _visualive_theme_after_switch_theme() {
	flush_rewrite_rules();
}
endif;
add_action( 'after_switch_theme', '_visualive_theme_after_switch_theme' );


if ( ! function_exists( '_visualive_theme_setup' ) ) :
/**
 * VA CherryBlossum 2014 setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since VA CherryBlossum 2014 1.0
 */
function _visualive_theme_setup() {
	/*
	 * Make VA CherryBlossum 2014 available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on VA CherryBlossum 2014, use a find and
	 * replace to change 'visualive_theme' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( VACB_TEXTDOMAIN, get_template_directory() . '/languages' );

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( 'assets/css/editor-style.min.css' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'caption', 'gallery' ) );
	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'column-3', 606, 428, true );
	add_image_size( '636x470',  636, 470, true );
	add_image_size( 'column-4', 440, 310, true );
	add_image_size( 'va-cherryblossum-fullwidth', 1038, 576, true );
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', VACB_TEXTDOMAIN ),
		'offcanvas' => __( 'Off canvas menu', VACB_TEXTDOMAIN ),
	) );

	/**
	 * Setup the WordPress core custom header feature.
	 */
	add_theme_support( 'custom-header', apply_filters( 'designinglabo_custom_header_args', array(
		'default-image'          => '',
		'width'                  => 410,
		'height'                 => 100,
		'flex-height'            => true,
		'flex-width'             => true,
		'header-text'            => false,
		// 'wp-head-callback'       => 'designinglabo_header_style',
		// 'admin-head-callback'    => 'designinglabo_admin_header_style',
		// 'admin-preview-callback' => 'designinglabo_admin_header_image',
	) ) );

	/**
	 * Add theme support for Infinite Scroll.
	 * See: http://jetpack.me/support/infinite-scroll/
	 */
	add_theme_support( 'infinite-scroll', array( 'container' => 'main', 'footer' => 'page' ) );
	/**
	 * Remove filter & action
	 */
	remove_action( 'wp_head',            'wp_generator' );
	remove_action( 'rss_head',           'the_generator' );
	remove_action( 'rss2_head',          'the_generator' );
	remove_action( 'rdf_header',         'the_generator' );
	remove_action( 'atom_head',          'the_generator' );
	remove_action( 'opml_head',          'the_generator' );
	remove_action( 'app_head',           'the_generator' );
	remove_action( 'commentsrss2_head',  'the_generator' );
	remove_action( 'comments_atom_head', 'the_generator' );
}
endif; // _visualive_theme_setup
add_action( 'after_setup_theme', '_visualive_theme_setup' );


if ( ! function_exists( '_visualive_theme_widgets_init' ) ) :
/**
 * Register three VA Cherry Blossum widget areas.
 *
 * @return void
 */
function _visualive_theme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', VACB_TEXTDOMAIN ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the left.', VACB_TEXTDOMAIN ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Content Sidebar', VACB_TEXTDOMAIN ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Additional sidebar that appears on the right.', VACB_TEXTDOMAIN ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', VACB_TEXTDOMAIN ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears in the footer section of the site.', VACB_TEXTDOMAIN ),
		'before_widget' => '<aside id="%1$s" class="large-3 columns widget footer-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
} // _visualive_theme_widgets_init
endif;
add_action( 'widgets_init', '_visualive_theme_widgets_init' );


if ( ! is_admin() ) :
/**
 * Register Lato Google font for Twenty Fourteen.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return string
 */
function visualive_theme_font_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'twentyfourteen' ) ) {
		$font_url = add_query_arg( 'family', 'Lato:300,400,700,900|Sorts+Mill+Goudy', "//fonts.googleapis.com/css" );
	}

	return $font_url;
}

if ( ! function_exists( '_visualive_theme_scripts' ) ) :
/**
 * Enqueue scripts and styles for the front end.
 *
 * @return void
 */
function _visualive_theme_scripts() {
	wp_enqueue_style( 'va-loader', get_template_directory_uri() . '/assets/css/loader.min.css', array(), null );
	// Add Lato font, used in the main stylesheet.
	wp_enqueue_style( 'va-cherryblossum-font', visualive_theme_font_url(), array(), null );

	// Add Fort Awesome, used in the main stylesheet.
	wp_enqueue_style( 'fort-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css', array(), null );

	// Load our main stylesheet.
	wp_enqueue_style( 'va-cherryblossum-style', get_template_directory_uri() . '/assets/css/app.min.css', array(), null );

	// Load the Internet Explorer specific stylesheet.
	// wp_enqueue_style( 'twentyfourteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentyfourteen-style', 'genericons' ), '20131205' );
	// wp_style_add_data( 'twentyfourteen-ie', 'conditional', 'lt IE 9' );


	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), null );
	wp_enqueue_script( 'va-cherryblossum-core', get_template_directory_uri() . '/assets/js/app.min.js', array( 'jquery' ), null, true );
	if ( 'post' == get_post_type() && is_home() ) {
		wp_enqueue_script( 'jquery-masonry' );
	}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
} // _visualive_theme_scripts
endif;
add_action( 'wp_enqueue_scripts', '_visualive_theme_scripts' );


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
	$admins_id    = $options['vacb_general_seo_ogp_admins_id'];
	$admins_id    = ( preg_match("/^[a-zA-Z0-9]+$/", $admins_id) && ! empty($admins_id ) ) ? $admins_id : false ;
	$app_id       = $options['vacb_general_seo_ogp_app_id'];
	$app_id       = ( preg_match("/^[a-zA-Z0-9]+$/", $app_id) && ! empty($app_id ) ) ? $app_id : false ;
	$twitter_id   = $options['vacb_general_seo_ogp_twitter_id'];
	$twitter_id   = ( preg_match("/^[a-zA-Z0-9_]+$/", $twitter_id) && ! empty($twitter_id ) ) ? $twitter_id : false ;

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
		$metatag .= '<meta name="google-site-verification" content="' . esc_attr( $options['vacb_general_seo_webmastertool'] ) . '">' . "\n";
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
	if ( ( is_singular() || is_single() || is_page() ) && get_post_thumbnail_id() && ! is_home() && ! is_front_page() ) {
		$metatag .= '<meta property="og:image" content="' . esc_url( wp_get_attachment_url( get_post_thumbnail_id() ) ) .'">' . "\n";
	} elseif ( ! empty($options['vacb_general_seo_ogp_image']) ) {
		$metatag .= '<meta property="og:image" content="' . esc_url( $options['vacb_general_seo_ogp_image'] ) .'">' . "\n";
	}
	$metatag .= '<meta property="og:site_name" content="' . get_bloginfo('name') . '">' . "\n";
	if ( $admins_id ) {
		$metatag .= '<meta property="fb:admins" content="' . esc_attr( $admins_id ) . '">' . "\n";
	}
	if ( $app_id ) {
		$metatag .= '<meta property="fb:app_id" content="' . esc_attr( $app_id ) . '">' . "\n";
	}
	$metatag .= '<meta name="twitter:card" content="summary">' . "\n";
	if ( $twitter_id ) {
		$metatag .= '<meta name="twitter:site" content="@' . esc_attr( $twitter_id ) . '">' . "\n";
	}
	$metatag .= '<meta name="twitter:description" content="' . esc_attr( get_bloginfo('description', 'display') ) . '">' . "\n";

	echo $metatag;
}
endif; // _visualive_theme_the_meta_tags
add_filter( 'wp_head', '_visualive_theme_the_meta_tags', 0 );


if ( ! function_exists( '_visualive_theme_google_ad_wrap' ) ) :
/**
 * Google Ad Wrap.
 * Simple plugin to wrap a google_ad_section tag around comments and content
 *
 * @link http://svn.wp-plugins.org/google-ad-wrap/trunk/google-ad-wrap.php
 * @return string
 */
function _visualive_theme_google_ad_wrap( $content ) {
	return "\n<!-- google_ad_section_start -->\n" . $content . "<!-- google_ad_section_end -->\n";
}
endif;
add_filter( 'the_content', '_visualive_theme_google_ad_wrap' );
add_filter( 'the_excerpt', '_visualive_theme_google_ad_wrap' );
add_filter( 'comment_text', '_visualive_theme_google_ad_wrap' );


if ( ! function_exists( '_visualive_theme_google_analytics' ) ) :
/**
 * Echo Goolge Analytics JS code.
 *
 * @return string
 */
function _visualive_theme_google_analytics() {
	$tracking_id = $GLOBALS['vacb_options']['vacb_general_seo_analytics'];
	$tracking_id = ( preg_match("/^[a-zA-Z0-9-]+$/", $tracking_id) && ! empty($tracking_id) ) ? $tracking_id  : false ;
	$domain      = str_replace( array("http://","https://"), '', get_bloginfo('url') );

	if ( $tracking_id ) :
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
add_filter( 'wp_footer', '_visualive_theme_google_analytics', 9999 );


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


if ( ! function_exists( '_visualive_theme_post_classes' ) ) :
/**
 * Extend the default WordPress post classes.
 *
 * @param array $classes A list of existing post class values.
 * @return array The filtered post class list.
 */
function _visualive_theme_post_classes( $classes ) {
	global $post, $posts;

	if ( ! post_password_required() && has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	}
	if ( is_home() AND !is_paged() AND ($post == $posts[0]) ) {
		$classes[] = 'firstpost';
	}
	$classes[] = 'editor-area';

	return $classes;
}
endif; // _visualive_theme_post_classes
add_filter( 'post_class', '_visualive_theme_post_classes' );

endif; // ! is_admin

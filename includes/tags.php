<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_template_part( 'includes/class', 'top-bar-walker' );


function visualive_theme_post_types() {
	$default_post = array('post' => 'post', 'page' => 'page');
	$custom_post  = get_post_types( array( 'public' => true, '_builtin' => false ), 'names' );
	return array_merge( $default_post, $custom_post );
}


function visualive_theme_escape_text( $text ) {
	$text = strip_shortcodes( $text );
	$text = strip_tags( $text );
	$text = str_replace( array("\r\n","\r","\n"), '', $text );

	return esc_html( $text );
}


function is_login_page() {
	return in_array( $GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php') );
}


/**
 * Top bar
 */
function visualive_theme_primary_menu() {
	wp_nav_menu(array( 
		'container' => false,                           // remove nav container
		'container_class' => '',                        // class of container
		'menu' => '',                                   // menu name
		'menu_class' => 'top-bar-menu right',           // adding custom nav class
		'theme_location' => 'primary',                  // where it's located in the theme
		'before' => '',                                 // before each link <a> 
		'after' => '',                                  // after each link </a>
		'link_before' => '',                            // before each link text
		'link_after' => '',                             // after each link text
		'depth' => 5,                                   // limit the depth of the nav
		'fallback_cb' => false,                         // fallback function (see below)
		'walker' => new Top_Bar_Walker()
	));
}


/**
 * Custom header.
 *
 * @return
 */
function visualive_theme_custom_header() {
if ( get_header_image() ) :
?>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo get_bloginfo('name'); ?>"></a>
<?php endif;
}


/**
 * User profile.
 *
 * @return
 */
function visualive_theme_user_prof( $userid = false, $size = 180 ) {
	if ( ! $userid || ! preg_match("/^[0-9]+$/", $userid) || ! preg_match("/^[0-9]+$/", $size))
		return false;

	$data = get_userdata( $userid );
	$user['name']        = esc_html( $data->display_name );
	$user['description'] = nl2br( esc_html( $data->description ) );
	$user['avatar']      = get_avatar( $userid, $size, '', $data->display_name );
	$user['archive']     = esc_url( get_author_posts_url( $userid ) );

	return $user;
?>

<?php
}


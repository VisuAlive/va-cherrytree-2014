<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_template_part( 'includes/class', 'top-bar-walker' );


function va_get_post_types() {
	$default_post = array('post' => 'post', 'page' => 'page');
	$custom_post  = get_post_types( array( 'public' => true, '_builtin' => false ), 'names' );
	return array_merge( $default_post, $custom_post );
}


function va_get_escape_text( $text ) {
	$text = strip_shortcodes( $text );
	$text = strip_tags( $text );
	$text = str_replace( array("\r\n","\r","\n"), '', $text );

	return esc_html( $text );
}


function va_is_login() {
	return in_array( $GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php') );
}


/**
 * Top bar
 */
function va_the_primary_menu() {
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
function va_the_custom_header() {
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
function va_get_user_prof( $userid = false, $size = 180 ) {
	if ( ( ! $userid && ! preg_match("/^[0-9]+$/", $userid) ) && ! preg_match("/^[0-9]+$/", $size) )
		return false;

	$data = get_userdata( $userid );
	$user['name']        = esc_html( $data->display_name );
	$user['description'] = nl2br( esc_html( $data->description ) );
	$user['avatar']      = get_avatar( $userid, $size, '', $data->display_name );
	$user['archive']     = esc_url( get_author_posts_url( $userid ) );

	return $user;
}


function va_get_page_id( $slug = false ) {
	$str = get_page_by_path( $slug );
	return $str->ID;
}


if ( ! function_exists( 'va_the_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since Twenty Fourteen 1.0
 */
function va_the_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '&larr; Previous' ),
		'next_text' => __( 'Next &rarr;' ),
	) );

	if ( $links ) :
	?>
	<div class="row" role="navigation">
		<div class="small-12 columns">
			<div class="navigation paging-navigation">
				<div class="pagination loop-pagination">
					<?php echo $links; ?>
				</div><!-- .pagination -->
			</div><!-- .navigation -->
		</div>
	</div>
	<?php
	endif;
}
endif;

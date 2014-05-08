<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Jetpack plugin filter
 */
add_filter('jetpack_enable_open_graph', '__return_false', 99);


/**
 * Breadcrumb NavXT
 */
function _visualive_theme_bcn_li_attributes( $li_class, $type, $get_id ) {
	return str_replace('current_item', 'current', $li_class);
}
add_filter( 'bcn_li_attributes', '_visualive_theme_bcn_li_attributes', 10, 3 );

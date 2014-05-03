<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * コールバック
 *
 * @return 
 */
VP_Security::instance()->whitelist_function( 'vacb_dep_is_tag' );
function vacb_dep_is_tag( $value ) {
	if($value === 'tag')
		return true;
	return false;
}
VP_Security::instance()->whitelist_function( 'vacb_dep_is_category' );
function vacb_dep_is_category( $value ) {
	if($value === 'category')
		return true;
	return false;
}
VP_Security::instance()->whitelist_function( 'vacb_dep_is_post' );
function vacb_dep_is_post( $value ) {
	if($value === 'post')
		return true;
	return false;
}
VP_Security::instance()->whitelist_function( 'vacb_dep_is_page' );
function vacb_dep_is_page( $value ) {
	if($value === 'page')
		return true;
	return false;
}
VP_Security::instance()->whitelist_function( 'vacb_dep_is_info' );
function vacb_dep_is_info( $value ) {
	if($value === 'info')
		return true;
	return false;
}
VP_Security::instance()->whitelist_function( 'vacb_dep_is_works' );
function vacb_dep_is_works( $value ) {
	if($value === 'works')
		return true;
	return false;
}
VP_Security::instance()->whitelist_function( 'vacb_dep_is_url' );
function vacb_dep_is_url( $value ) {
	if($value === 'url')
		return true;
	return false;
}


/**
 * ポストIDとポストタイトルを取得
 *
 * @return array
 */
function vacb_get_post( $type = null ) {
	switch ( $type ) {
		case 'info':
			$posttye = 'info';
			break;
		case 'works':
			$posttye = 'works';
			break;
		default:
			$posttye = 'post';
			break;
	}
	$wp_posts = get_posts( array(
		'posts_per_page' => -1,
		'post_type' => $posttye
	) );

	$result = array();
	foreach ($wp_posts as $post) {
		$result[] = array( 'value' => $post->ID, 'label' => $post->post_title );
	}
	return $result;
}
function vacb_get_posts() {
	return vacb_get_post();
}
function vacb_get_infos() {
	return vacb_get_post( 'info' );
}
function vacb_get_workss() {
	return vacb_get_post( 'works' );
}


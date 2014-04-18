<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


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
VP_Security::instance()->whitelist_function( 'vacb_dep_is_showcase' );
function vacb_dep_is_showcase( $value ) {
	if($value === 'showcase')
		return true;
	return false;
}
VP_Security::instance()->whitelist_function( 'vacb_dep_is_url' );
function vacb_dep_is_url( $value ) {
	if($value === 'url')
		return true;
	return false;
}

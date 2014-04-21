<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'VA_Admin_Postlist_Addcolumns' ) && is_admin() ) :
class VA_Admin_Postlist_Addcolumns {
	function __construct() {
		// sort request
		add_filter( 'request', array( $this, '_va_apac_posts_orderby_columns' ) );
		// Post
		add_filter( 'manage_posts_columns', array( $this, '_va_apac_posts_add_columns') );
		add_action( 'manage_posts_custom_column', array( $this, '_va_apac_postos_echo_columns' ), 10, 2 );
		add_filter( 'manage_edit-post_sortable_columns', array( $this, '_va_apac_posts_sortable_columns' ) );
		// Page
		add_filter( 'manage_pages_columns', array( $this, '_va_apac_posts_add_columns' ) );
		add_action( 'manage_pages_custom_column', array( $this, '_va_apac_postos_echo_columns' ), 10, 2 );
		add_filter( 'manage_edit-page_sortable_columns', array( $this, '_va_apac_posts_sortable_columns' ) );
	}
	// add
	function _va_apac_posts_add_columns( $defaults ) {
		$defaults['post_modified'] = __( '最終更新日時', VACB_TEXTDOMAIN );
		$defaults['post_id'] = __( 'ID', VACB_TEXTDOMAIN );
		return $defaults;
	}
	function _va_apac_postos_echo_columns( $column_name, $id ) {
		if( $column_name === 'post_modified' ){
			echo get_the_modified_date( __( 'Y.m.d', VACB_TEXTDOMAIN ) );
		}
		if( $column_name === 'post_id' ){
			echo intval( $id );
		}
	}
	// sort
	function _va_apac_posts_orderby_columns( $vars ) {
		if ( isset($vars['orderby']) AND 'post_modified' == $vars['orderby'] ) {
			$vars = array_merge( $vars, array(
				// 'meta_key' => 'modified',
				// 'orderby' => 'meta_value'
				'orderby' => 'modified'
			));
		}
		if ( isset($vars['orderby']) AND 'post_id' == $vars['orderby'] ) {
			$vars = array_merge( $vars, array(
				'orderby' => 'ID'
			));
		}
		return $vars;
	}
	function _va_apac_posts_sortable_columns( $sortable_column ) {
		$sortable_column['post_modified'] = 'post_modified';
		$sortable_column['post_id'] = 'post_id';
		return $sortable_column;
	}
}
new VA_Admin_Postlist_Addcolumns;
endif; // VA_Admin_Postlist_Addcolumns

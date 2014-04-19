<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'VA_PostType_Class' ) ) :
class VA_PostType_Class {
	public $type          = false;
	public $name          = false;
	public $slug          = false;
	public $menu_position = 5;
	public $menu_icon     = 'dashicons-admin-post';
	public $has_archive   = true;
	public $taxonomy      = array();
	public $supports      = array( 'title', 'editor', 'excerpt', 'thumbnail' );

	function __construct() {
		add_action( 'init', array( $this, '_va_ptc_register_post_type' ) );
		add_action( 'init', array( $this, '_va_ptc_register_taxonomy' ) );
		add_action( 'admin_init', array( $this, '_va_ptc_add_posttype_caps' ) );
	}


	/**
	 * Register Post Type
	 * WordPress Codex Function register_post_type
	 * @link http://goo.gl/C3qzd
	 */
	function _va_ptc_register_post_type() {
		if ( $this->type && $this->name) :
			register_post_type( $this->type, array(
				'label'               => sprintf( __( '%s' ), $this->type ),
				'labels'              => array(
											'name'      => sprintf( __( '%s' ), $this->name ),
											'all_items' => sprintf( __( '%s一覧' ), $this->name )
										),
				'supports'            => $this->supports,
				'taxonomies'          => array( $this->type . '_cat' ),
				'hierarchical'        => false,
				'public'              => true,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'show_in_nav_menus'   => true,
				'show_in_admin_bar'   => true,
				'menu_position'       => $this->menu_position,
				'menu_icon'           => $this->menu_icon,
				'can_export'          => true,
				'has_archive'         => $this->has_archive,
				'exclude_from_search' => false,
				'publicly_queryable'  => true,
				'query_var'           => true,
				'map_meta_cap'        => true,
				'capability_type'     => $this->type,
				'capabilities'        => array(
					'edit_post'                 => 'va_' . $this->type . '_edit',
					'read_post'                 => 'va_' . $this->type . '_read',
					'delete_post'               => 'va_' . $this->type . '_delete',
					'edit_posts'                => 'va_' . $this->type . '_edits',            // 記事の投稿
					'edit_published_posts'      => 'va_' . $this->type . '_edit_publisheds',  // 公開した記事の編集
					'edit_private_posts'        => 'va_' . $this->type . '_edit_privates',    // 他のユーザーの非公開記事の閲覧
					'edit_others_posts'         => 'va_' . $this->type . '_edit_otherss',     // 他のユーザーの記事の編集
					'delete_posts'              => 'va_' . $this->type . '_deletes',          // 記事の削除
					'delete_private_posts'      => 'va_' . $this->type . '_delete_privates',  // 他のユーザーの非公開記事の削除
					'delete_published_posts'    => 'va_' . $this->type . '_delete_publisheds',// 公開した記事の削除
					'delete_others_posts'       => 'va_' . $this->type . '_delete_otherss',   // 他のユーザーの記事の削除
					'publish_posts'             => 'va_' . $this->type . '_publishs',         // 記事の公開
					'read_private_posts'        => 'va_' . $this->type . '_read_privates'     // 他のユーザーの非公開記事の閲覧
				)
			) ); // register_post_type
		endif;
	}


	// Register Custom Taxonomy
	function _va_ptc_register_taxonomy() {
		if ( $this->type && in_array( 'cat', $this->taxonomy ) ) {
			register_taxonomy( $this->type . '_cat', $this->type, array(
				'hierarchical'               => true,
				'public'                     => true,
				'show_ui'                    => true,
				'show_admin_column'          => true,
				'show_in_nav_menus'          => true,
				'show_tagcloud'              => false,
			) ); // register_taxonomy
		}

		if ( $this->type && in_array( 'tag', $this->taxonomy ) ) {
			register_taxonomy( $this->type . '_tag', $this->type, array(
				'hierarchical'               => false,
				'public'                     => true,
				'show_ui'                    => true,
				'show_admin_column'          => true,
				'show_in_nav_menus'          => true,
				'show_tagcloud'              => true,
			) ); // register_taxonomy
		}
	}


	// gets the administrator role
	function _va_ptc_add_posttype_caps() {
		if ( $this->type  ) :
			$admins = get_role( 'administrator' );
			$admins->add_cap( 'va_' . $this->type . '_edit' );
			$admins->add_cap( 'va_' . $this->type . '_read' );
			$admins->add_cap( 'va_' . $this->type . '_delete' );
			$admins->add_cap( 'va_' . $this->type . '_edits' );             // 記事の投稿
			$admins->add_cap( 'va_' . $this->type . '_edit_publisheds' );   // 公開した記事の編集
			$admins->add_cap( 'va_' . $this->type . '_edit_privates' );     // 他のユーザーの非公開記事の閲覧
			$admins->add_cap( 'va_' . $this->type . '_edit_otherss' );      // 他のユーザーの記事の編集
			$admins->add_cap( 'va_' . $this->type . '_deletes' );           // 記事の削除
			$admins->add_cap( 'va_' . $this->type . '_delete_privates' );   // 他のユーザーの非公開記事の削除
			$admins->add_cap( 'va_' . $this->type . '_delete_publisheds' ); // 公開した記事の削除
			$admins->add_cap( 'va_' . $this->type . '_delete_otherss' );    // 他のユーザーの記事の削除
			$admins->add_cap( 'va_' . $this->type . '_publishs' );          // 記事の公開
			$admins->add_cap( 'va_' . $this->type . '_read_privates' );     // 他のユーザーの非公開記事の閲覧
			$editors = get_role( 'editor' );
			$editors->add_cap( 'va_' . $this->type . '_edit' );
			$editors->add_cap( 'va_' . $this->type . '_read' );
			$editors->add_cap( 'va_' . $this->type . '_delete' );
			$editors->add_cap( 'va_' . $this->type . '_edits' );             // 記事の投稿
			$editors->add_cap( 'va_' . $this->type . '_edit_publisheds' );   // 公開した記事の編集
			$editors->add_cap( 'va_' . $this->type . '_edit_privates' );     // 他のユーザーの非公開記事の閲覧
			$editors->add_cap( 'va_' . $this->type . '_edit_otherss' );      // 他のユーザーの記事の編集
			$editors->add_cap( 'va_' . $this->type . '_deletes' );           // 記事の削除
			$editors->add_cap( 'va_' . $this->type . '_delete_privates' );   // 他のユーザーの非公開記事の削除
			$editors->add_cap( 'va_' . $this->type . '_delete_publisheds' ); // 公開した記事の削除
			$editors->add_cap( 'va_' . $this->type . '_delete_otherss' );    // 他のユーザーの記事の削除
			$editors->add_cap( 'va_' . $this->type . '_publishs' );          // 記事の公開
			$editors->add_cap( 'va_' . $this->type . '_read_privates' );     // 他のユーザーの非公開記事の閲覧
		endif;
	}
}
endif; // VA_PostType_Class

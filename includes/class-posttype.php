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
					'edit_post'                 => 'edit_' . $this->type,
					'read_post'                 => 'read_' . $this->type,
					'delete_post'               => 'delete_' . $this->type,
					'edit_posts'                => 'edit_' . $this->type . 's',            // 記事の投稿
					'edit_published_posts'      => 'edit_published_' . $this->type . 's',  // 公開した記事の編集
					'edit_private_posts'        => 'edit_private_' . $this->type . 's',    // 他のユーザーの非公開記事の閲覧
					'edit_others_posts'         => 'edit_others_' . $this->type . 's',     // 他のユーザーの記事の編集
					'delete_posts'              => 'delete_' . $this->type . 's',          // 記事の削除
					'delete_private_posts'      => 'delete_private_' . $this->type . 's',  // 他のユーザーの非公開記事の削除
					'delete_published_posts'    => 'delete_published_' . $this->type . 's',// 公開した記事の削除
					'delete_others_posts'       => 'delete_others_' . $this->type . 's',   // 他のユーザーの記事の削除
					'publish_posts'             => 'publish_' . $this->type . 's',         // 記事の公開
					'read_private_posts'        => 'read_private_' . $this->type . 's'     // 他のユーザーの非公開記事の閲覧
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
			$admins->add_cap( 'edit_' . $this->type );
			$admins->add_cap( 'read_' . $this->type );
			$admins->add_cap( 'delete_' . $this->type );
			$admins->add_cap( 'edit_' . $this->type . 's' );                 // 記事の投稿
			$admins->add_cap( 'edit_published_' . $this->type . 's' );       // 公開した記事の編集
			$admins->add_cap( 'edit_private_' . $this->type . 's' );         // 他のユーザーの非公開記事の閲覧
			$admins->add_cap( 'edit_others_' . $this->type . 's' );          // 他のユーザーの記事の編集
			$admins->add_cap( 'delete_' . $this->type . $this->type . 's' ); // 記事の削除
			$admins->add_cap( 'delete_private_' . $this->type . 's' );       // 他のユーザーの非公開記事の削除
			$admins->add_cap( 'delete_published_' . $this->type . 's' );     // 公開した記事の削除
			$admins->add_cap( 'delete_others_' . $this->type . 's' );        // 他のユーザーの記事の削除
			$admins->add_cap( 'publish_' . $this->type . 's' );              // 記事の公開
			$admins->add_cap( 'read_private_' . $this->type . 's' );         // 他のユーザーの非公開記事の閲覧
			$editors = get_role( 'editor' );
			$editors->add_cap( 'edit_' . $this->type );
			$editors->add_cap( 'read_' . $this->type );
			$editors->add_cap( 'delete_' . $this->type );
			$editors->add_cap( 'edit_' . $this->type . 's' );                 // 記事の投稿
			$editors->add_cap( 'edit_published_' . $this->type . 's' );       // 公開した記事の編集
			$editors->add_cap( 'edit_private_' . $this->type . 's' );         // 他のユーザーの非公開記事の閲覧
			$editors->add_cap( 'edit_others_' . $this->type . 's' );          // 他のユーザーの記事の編集
			$editors->add_cap( 'delete_' . $this->type . $this->type . 's' ); // 記事の削除
			$editors->add_cap( 'delete_private_' . $this->type . 's' );       // 他のユーザーの非公開記事の削除
			$editors->add_cap( 'delete_published_' . $this->type . 's' );     // 公開した記事の削除
			$editors->add_cap( 'delete_others_' . $this->type . 's' );        // 他のユーザーの記事の削除
			$editors->add_cap( 'publish_' . $this->type . 's' );              // 記事の公開
			$editors->add_cap( 'read_private_' . $this->type . 's' );         // 他のユーザーの非公開記事の閲覧

			add_role( $this->type, $this->name, array(
				'read'                                      => true, // True allows that capability, False specifically removes it.
				'edit_' . $this->type                       => true,
				'read_' . $this->type                       => true,
				'delete_' . $this->type                     => true,
				'edit_' . $this->type . 's'                 => true, // 記事の投稿
				'edit_published_' . $this->type . 's'       => true, // 公開した記事の編集
				'edit_private_' . $this->type . 's'         => true, // 他のユーザーの非公開記事の閲覧
				'edit_others_' . $this->type . 's'          => true, // 他のユーザーの記事の編集
				'delete_' . $this->type . $this->type . 's' => true, // 記事の削除
				'delete_private_' . $this->type . 's'       => true, // 他のユーザーの非公開記事の削除
				'delete_published_' . $this->type . 's'     => true, // 公開した記事の削除
				'delete_others_' . $this->type . 's'        => true, // 他のユーザーの記事の削除
				'publish_' . $this->type . 's'              => true, // 記事の公開
				'read_private_' . $this->type . 's'         => true, // 他のユーザーの非公開記事の閲覧
				'upload_files'                              => true  // last in array needs no comma!
			));
		endif;
	}
}
endif; // VA_PostType_Class

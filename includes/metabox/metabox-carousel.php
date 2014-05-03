<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Create instance of Metaboxs
 */
$vacb_mb_carousel = new VP_Metabox(
	array(
		'id'          => '_vacb_metaboxs_carousel_',
		'types'       => array( 'carousel' ),
		'title'       => __( 'Add Carousel', VACB_TEXTDOMAIN ),
		'priority'    => 'high',
		'template'    => array(
			array(
				'type' => 'notebox',
				'name' => 'notebox',
				'label' => __( 'imgタグのalt属性について', VACB_TEXTDOMAIN ),
				'description' => __( 'imgタグのalt属性は、タイトルに入力した内容がalt属性に適用されます。', VACB_TEXTDOMAIN ),
				'status' => 'info',
			),
			array(
				'type'        => 'upload',
				'name'        => 'vacb_carousel_image',
				'label'       => __( 'イメージ', VACB_TEXTDOMAIN ),
				// 'description' => __( 'It is common and is used.', VACB_TEXTDOMAIN ),
				'default'     => ''
			),
			array(
				'type'        => 'radiobutton',
				'name'        => 'vacb_carousel_link_filter',
				'label'       => __( 'リンク先', VACB_TEXTDOMAIN ),
				// 'description' => __( 'Different type will show different type of field', VACB_TEXTDOMAIN ),
				'items'       => array(
					array(
						'value' => 'post',
						'label' => __( '投稿', VACB_TEXTDOMAIN ),
					),
					array(
						'value' => 'page',
						'label' => __( '固定ページ', VACB_TEXTDOMAIN ),
					),
					array(
						'value' => 'info',
						'label' => __( 'お知らせ', VACB_TEXTDOMAIN ),
					),
					array(
						'value' => 'works',
						'label' => __( '制作実績', VACB_TEXTDOMAIN ),
					),
					array(
						'value' => 'url',
						'label' => __( '任意リンク', VACB_TEXTDOMAIN ),
					),
					array(
						'value' => 'none',
						'label' => __( 'リンク無', VACB_TEXTDOMAIN ),
					)
				),
				'default'     => 'none'
			), // radiobutton
			array(
				'type'        => 'select',
				'name'        => 'vacb_carousel_link_post',
				'label'       => __( 'リンク先', VACB_TEXTDOMAIN ),
				'description' => __( 'リンク先を選択してください。', VACB_TEXTDOMAIN ),
				'items'       => array(
					'data' => array(
						array(
							'source' => 'function',
							'value'  => 'vacb_get_posts',
						)
					)
				),
				'dependency' => array(
					'field'    => 'vacb_carousel_link_filter',
					'function' => 'vacb_dep_is_post',
				)
			), // select
			array(
				'type'        => 'select',
				'name'        => 'vacb_carousel_link_page',
				'label'       => __( 'リンク先', VACB_TEXTDOMAIN ),
				'description' => __( 'リンク先を選択してください。', VACB_TEXTDOMAIN ),
				'items'       => array(
					'data' => array(
						array(
							'source' => 'function',
							'value'  => 'vp_get_pages',
						)
					)
				),
				'dependency' => array(
					'field'    => 'vacb_carousel_link_filter',
					'function' => 'vacb_dep_is_page',
				)
			), // select
			array(
				'type'        => 'select',
				'name'        => 'vacb_carousel_link_info',
				'label'       => __( 'リンク先', VACB_TEXTDOMAIN ),
				'description' => __( 'リンク先のページを選択してください。', VACB_TEXTDOMAIN ),
				'items'       => array(
					'data' => array(
						array(
							'source' => 'function',
							'value'  => 'vacb_get_infos',
						)
					)
				),
				'dependency' => array(
					'field'    => 'vacb_carousel_link_filter',
					'function' => 'vacb_dep_is_info',
				)
			), // select
			array(
				'type'        => 'select',
				'name'        => 'vacb_carousel_link_works',
				'label'       => __( 'Choose works', VACB_TEXTDOMAIN ),
				'description' => __( 'リンク先のページを選択してください。', VACB_TEXTDOMAIN ),
				'items'       => array(
					'data' => array(
						array(
							'source' => 'function',
							'value'  => 'vacb_get_workss',
						)
					)
				),
				'dependency' => array(
					'field'    => 'vacb_carousel_link_filter',
					'function' => 'vacb_dep_is_works',
				)
			), // select
			array(
				'type'        => 'textbox',
				'name'        => 'vacb_carousel_link_url',
				'label'       => __( 'Edit url', VACB_TEXTDOMAIN ),
				// 'description' => __( 'URL to filter.', VACB_TEXTDOMAIN ),
				// 'default'     => 'abcdefg',
				'dependency' => array(
					'field'    => 'vacb_carousel_link_filter',
					'function' => 'vacb_dep_is_url',
				),
				'validation'  => 'url'
			) // textbox
		) // template
	)
);

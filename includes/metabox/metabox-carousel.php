<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Create instance of Metaboxs
 */
$vacb_mb_carousel = new VP_Metabox(
	array(
		'id'          => '_vacb_metaboxs_carousel_',
		'types'       => array( 'carousel' ),
		'title'       => __( 'Add Carousel', VACB2014_TEXTDOMAIN ),
		'priority'    => 'high',
		'template'    => array(
			array(
				'type' => 'notebox',
				'name' => 'notebox',
				'label' => __( 'imgタグのalt属性について', VACB2014_TEXTDOMAIN ),
				'description' => __( 'imgタグのalt属性はタイトルに入力した内容がalt属性に適用されます。', VACB2014_TEXTDOMAIN ),
				'status' => 'info',
			),
			array(
				'type'        => 'upload',
				'name'        => 'vacb_carousel_image',
				'label'       => __( 'イメージ', VACB2014_TEXTDOMAIN ),
				// 'description' => __( 'It is common and is used.', VACB2014_TEXTDOMAIN ),
				'default'     => ''
			),
			array(
				'type'        => 'radiobutton',
				'name'        => 'vacb_carousel_link_filter',
				'label'       => __( 'リンク先', VACB2014_TEXTDOMAIN ),
				// 'description' => __( 'Different type will show different type of field', VACB2014_TEXTDOMAIN ),
				'items'       => array(
					array(
						'value' => 'post',
						'label' => __( '投稿', VACB2014_TEXTDOMAIN ),
					),
					array(
						'value' => 'page',
						'label' => __( '固定ページ', VACB2014_TEXTDOMAIN ),
					),
					array(
						'value' => 'info',
						'label' => __( 'お知らせ', VACB2014_TEXTDOMAIN ),
					),
					array(
						'value' => 'showcase',
						'label' => __( 'ショーケース', VACB2014_TEXTDOMAIN ),
					),
					array(
						'value' => 'url',
						'label' => __( '任意リンク', VACB2014_TEXTDOMAIN ),
					),
					array(
						'value' => 'none',
						'label' => __( 'リンク無', VACB2014_TEXTDOMAIN ),
					)
				),
				'default'     => 'none'
			), // radiobutton
			array(
				'type'        => 'select',
				'name'        => 'vacb_carousel_link_post',
				'label'       => __( 'Choose post', VACB2014_TEXTDOMAIN ),
				'description' => __( 'Post to filter.', VACB2014_TEXTDOMAIN ),
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
				'label'       => __( 'Choose page', VACB2014_TEXTDOMAIN ),
				'description' => __( 'Page to filter.', VACB2014_TEXTDOMAIN ),
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
				'label'       => __( 'Choose info', VACB2014_TEXTDOMAIN ),
				'description' => __( 'Info to filter.', VACB2014_TEXTDOMAIN ),
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
				'name'        => 'vacb_carousel_link_showcase',
				'label'       => __( 'Choose showcase', VACB2014_TEXTDOMAIN ),
				'description' => __( 'Showcase to filter.', VACB2014_TEXTDOMAIN ),
				'items'       => array(
					'data' => array(
						array(
							'source' => 'function',
							'value'  => 'vacb_get_showcases',
						)
					)
				),
				'dependency' => array(
					'field'    => 'vacb_carousel_link_filter',
					'function' => 'vacb_dep_is_showcase',
				)
			), // select
			array(
				'type'        => 'textbox',
				'name'        => 'vacb_carousel_link_url',
				'label'       => __( 'Edit url', VACB2014_TEXTDOMAIN ),
				// 'description' => __( 'URL to filter.', VACB2014_TEXTDOMAIN ),
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


$vacb_mb_showcase = new VP_Metabox(
	array(
		'id'          => '_vacb_metaboxs_showcase_',
		'types'       => array( 'showcase' ),
		'title'       => __( 'Showcase Data', VACB2014_TEXTDOMAIN ),
		'priority'    => 'high',
		'template'    => array(
			array(
				'type'        => 'textbox',
				'name'        => 'vacb_showcase_client',
				'label'       => __( 'クライアント名', VACB2014_TEXTDOMAIN )
			), // textbox
			array(
				'type'        => 'upload',
				'name'        => 'vacb_showcase_image',
				'label'       => __( 'サイトイメージ', VACB2014_TEXTDOMAIN ),
				'default'     => ''
			),
			array(
				'type'        => 'textbox',
				'name'        => 'vacb_showcase_url',
				'label'       => __( 'サイトURL', VACB2014_TEXTDOMAIN ),
				'validation'  => 'url'
			) // textbox
		) // template
	)
);


$vacb_mb_seo = new VP_Metabox(
	array(
		'id'          => '_vacb_metaboxs_seo_',
		'types'       => array( 'post', 'page', 'info', 'showcase' ),
		'title'       => __( 'SEO', VACB2014_TEXTDOMAIN ),
		'priority'    => 'high',
		'template'    => array(
			array(
				'type'        => 'textbox',
				'name'        => 'vacb_seo_title',
				'label'       => __( 'タイトル', VACB2014_TEXTDOMAIN )
			), // textbox
			array(
				'type'        => 'textarea',
				'name'        => 'vacb_seo_description',
				'label'       => __( 'ディスクリプション', VACB2014_TEXTDOMAIN )
			) // textbox
		) // template
	)
);

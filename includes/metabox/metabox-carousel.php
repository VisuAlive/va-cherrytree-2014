<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Create instance of Metaboxs
 */
$vacb_mb_carousel = new VP_Metabox(
	array(
		'id'          => '_vacb_metaboxs_seo_',
		'types'       => array( 'carousel' ),
		'title'       => __( 'Add Carousel', VACB2014_TEXTDOMAIN ),
		'priority'    => 'high',
		'template'    => array(
			array(
				'type' => 'notebox',
				'name' => 'notebox',
				'label' => __('Normal Announcement', 'vp_textdomain'),
				'description' => __('Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas', 'vp_textdomain'),
				'status' => 'info',
			),
			array(
				'type'        => 'upload',
				'name'        => 'vacb_carousel_image',
				'label'       => __( 'Image', VACB2014_TEXTDOMAIN ),
				// 'description' => __( 'It is common and is used.', VACB2014_TEXTDOMAIN ),
				'default'     => ''
			),
			array(
				'type'        => 'radiobutton',
				'name'        => 'vacb_carousel_url_filter',
				'label'       => __( 'Anchor by', VACB2014_TEXTDOMAIN ),
				// 'description' => __( 'Different type will show different type of field', VACB2014_TEXTDOMAIN ),
				'items'       => array(
					array(
						'value' => 'post',
						'label' => __( '投稿', VACB2014_TEXTDOMAIN ),
					),
					array(
						'value' => 'page',
						'label' => __( '固定', VACB2014_TEXTDOMAIN ),
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
				'name'        => 'vacb_carousel_url_post',
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
					'field'    => 'vacb_carousel_url_filter',
					'function' => 'vacb_dep_is_post',
				)
			), // select
			array(
				'type'        => 'select',
				'name'        => 'vacb_carousel_url_page',
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
					'field'    => 'vacb_carousel_url_filter',
					'function' => 'vacb_dep_is_page',
				)
			), // select
			array(
				'type'        => 'select',
				'name'        => 'vacb_carousel_url_info',
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
					'field'    => 'vacb_carousel_url_filter',
					'function' => 'vacb_dep_is_info',
				)
			), // select
			array(
				'type'        => 'select',
				'name'        => 'vacb_carousel_url_showcase',
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
					'field'    => 'vacb_carousel_url_filter',
					'function' => 'vacb_dep_is_showcase',
				)
			), // select
			array(
				'type'        => 'textbox',
				'name'        => 'vacb_carousel_url_url',
				'label'       => __( 'Edit url', VACB2014_TEXTDOMAIN ),
				// 'description' => __( 'URL to filter.', VACB2014_TEXTDOMAIN ),
				// 'default'     => 'abcdefg',
				'dependency' => array(
					'field'    => 'vacb_carousel_url_filter',
					'function' => 'vacb_dep_is_url',
				),
			) // textbox
		) // template
	)
);


// array(
// 	'type' => 'select',
// 	'name' => 'vacb_se_pages',
// 	'label' => __( 'Pages', VACB2014_TEXTDOMAIN ),
// 	'description' => __( 'Select field with WP Pages Data Source', VACB2014_TEXTDOMAIN ),
// 	'items' => array(
// 		'data' => array(
// 			array(
// 				'source' => 'function',
// 				'value' => 'vp_get_pages',
// 			)
// 		)
// 	)
// )

// array(
// 	'type' => 'select',
// 	'name' => 'se_posts',
// 	'label' => __( 'Posts', VACB2014_TEXTDOMAIN ),
// 	'description' => __( 'Select field with WP Post Data Source', VACB2014_TEXTDOMAIN ),
// 	'items' => array(
// 		'data' => array(
// 			array(
// 				'source' => 'function',
// 				'value' => 'vp_get_posts'
// 			)
// 		)
// 	)
// )

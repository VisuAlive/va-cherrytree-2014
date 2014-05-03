<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Create instance of Metaboxs
 */
$vacb_mb_seo = new VP_Metabox(
	array(
		'id'          => '_vacb_metaboxs_seo_',
		'types'       => array( 'post', 'page', 'info', 'works', 'download' ),
		'title'       => __( 'SEO', VACB_TEXTDOMAIN ),
		'priority'    => 'high',
		'template'    => array(
			array(
				'type'        => 'textbox',
				'name'        => 'vacb_seo_title',
				'label'       => __( 'タイトル', VACB_TEXTDOMAIN )
			), // textbox
			array(
				'type'        => 'textarea',
				'name'        => 'vacb_seo_description',
				'label'       => __( 'ディスクリプション', VACB_TEXTDOMAIN )
			), // textarea
			array(
				'type'        => 'checkbox',
				'name'        => 'vacb_seo_noindex',
				'label'       => __( 'Noindex', VACB_TEXTDOMAIN ),
				'items'       => array(
					array(
						'value' => 1,
						'label' => __( 'Noindeにする', VACB_TEXTDOMAIN ),
					)
				) // items
			) // checkbox
		) // template
	)
);

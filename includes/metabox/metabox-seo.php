<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Create instance of Metaboxs
 */
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
			), // textarea
			array(
				'type'        => 'checkbox',
				'name'        => 'vacb_seo_noindex',
				'label'       => __( 'Noindex', VACB2014_TEXTDOMAIN ),
				'items'       => array(
					array(
						'value' => 1,
						'label' => __( 'Noindeにする', VACB2014_TEXTDOMAIN ),
					)
				) // items
			) // checkbox
		) // template
	)
);

<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Create instance of Metaboxs
 */
$vacb_mb_works = new VP_Metabox(
	array(
		'id'          => '_vacb_metaboxs_works_',
		'types'       => array( 'works' ),
		'title'       => __( '制作実績データ', VACB_TEXTDOMAIN ),
		'priority'    => 'high',
		'template'    => array(
			array(
				'type'        => 'textbox',
				'name'        => 'vacb_works_client',
				'label'       => __( 'クライアント名', VACB_TEXTDOMAIN )
			), // textbox
			array(
				'type'        => 'upload',
				'name'        => 'vacb_works_image',
				'label'       => __( 'サイトイメージ', VACB_TEXTDOMAIN ),
				'default'     => ''
			),
			array(
				'type'        => 'textbox',
				'name'        => 'vacb_works_url',
				'label'       => __( 'サイトURL', VACB_TEXTDOMAIN ),
				'validation'  => 'url'
			) // textbox
		) // template
	)
);

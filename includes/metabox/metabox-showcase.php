<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Create instance of Metaboxs
 */
$vacb_mb_showcase = new VP_Metabox(
	array(
		'id'          => '_vacb_metaboxs_showcase_',
		'types'       => array( 'showcase' ),
		'title'       => __( 'ショーケース データ', VACB_TEXTDOMAIN ),
		'priority'    => 'high',
		'template'    => array(
			array(
				'type'        => 'textbox',
				'name'        => 'vacb_showcase_client',
				'label'       => __( 'クライアント名', VACB_TEXTDOMAIN )
			), // textbox
			array(
				'type'        => 'upload',
				'name'        => 'vacb_showcase_image',
				'label'       => __( 'サイトイメージ', VACB_TEXTDOMAIN ),
				'default'     => ''
			),
			array(
				'type'        => 'textbox',
				'name'        => 'vacb_showcase_url',
				'label'       => __( 'サイトURL', VACB_TEXTDOMAIN ),
				'validation'  => 'url'
			) // textbox
		) // template
	)
);

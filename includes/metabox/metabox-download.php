<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Create instance of Metaboxs
 */
$vacb_mb_download = new VP_Metabox(
	array(
		'id'          => '_vacb_metaboxs_works_',
		'types'       => array( 'download' ),
		'title'       => __( 'ファイルデータ', VACB_TEXTDOMAIN ),
		'priority'    => 'high',
		'template'    => array(
			array(
				'type'        => 'textbox',
				'name'        => 'vacb_download_test',
				'label'       => __( '検証環境', VACB_TEXTDOMAIN )
			), // textbox
			array(
				'type'        => 'textbox',
				'name'        => 'vacb_download_url',
				'label'       => __( 'ダウンロードURL', VACB_TEXTDOMAIN ),
				'validation'  => 'url'
			) // textbox
		) // template
	)
);

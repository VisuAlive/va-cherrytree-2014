<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Include Custom Data Sources
 */
get_template_part( 'includes/metabox/data-sources' );


/**
 * Create instance of Metaboxs
 */
get_template_part( 'includes/metabox/metabox', 'carousel' );



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

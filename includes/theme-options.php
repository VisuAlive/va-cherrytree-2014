<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Create instance of Options
 */
$theme_options = new VP_Option(
	array(
		'is_dev_mode'           => false,                                  // dev mode, default to false
		'option_key'            => '_vacb_options_',                       // options key in db, required
		'page_slug'             => 'vacb_options',                         // options page slug, required
		'template'              => array(                                  // template file path or array, required
										'title' => __( 'VA CherryBlossum 2014 Options', VACB_TEXTDOMAIN ),
										'logo'  => get_template_directory_uri() . '/assets/images/img/option.png',
										'menus' => array(
											array(
												'title' => __( 'General Settings', VACB_TEXTDOMAIN ),
												'name'  => 'vacb_general',
												'icon'  => 'font-awesome:fa-cogs',
												'menus' => array(
													array(
														'title' => __( 'Security', VACB_TEXTDOMAIN ),
														'name'  => 'vacb_general_security',
														'icon' => 'font-awesome:fa-key',
														'controls' => array(
															array(
																'type'        => 'section',
																'title'       => __( 'Basic attestation', VACB_TEXTDOMAIN ),
																'name'        => 'vacb_general_security_basic_attestation',
																//'description' => __( 'Meta OGP Setting', VACB_TEXTDOMAIN ),
																'fields'      => array(
																	array(
																		'type'        => 'textbox',
																		'name'        => 'vacb_general_security_basic_id',
																		'label'       => __( 'Id', VACB_TEXTDOMAIN ),
																		//'description' => __( 'It is common and is used.', VACB_TEXTDOMAIN ),
																		'validation'  => 'alphanumeric'
																	),
																	array(
																		'type'        => 'textbox',
																		'name'        => 'vacb_general_security_basic_pass',
																		'label'       => __( 'Password', VACB_TEXTDOMAIN ),
																		//'description' => __( 'It is common and is used.', VACB_TEXTDOMAIN ),
																		'validation'  => 'alphanumeric'
																	)
																) // fields
															) // section
														) // controls
													), // Basic Attestation Setting 
													array(
														'title'    => __( 'SEO', VACB_TEXTDOMAIN ),
														'name'     => 'vacb_general_seo',
														'icon'     => 'font-awesome:fa-sitemap',
														'controls' => array(
															array(
																'type'        => 'section',
																'title'       => __( 'meta:ogp', VACB_TEXTDOMAIN ),
																'name'        => 'vacb_general_seo_ogp_section',
																//'description' => __( 'Meta AND OGP Setting', VACB_TEXTDOMAIN ),
																'fields'      => array(
																	// array(
																	// 	'type'        => 'textbox',
																	// 	'name'        => 'vacb_general_seo_ogp_title',
																	// 	'label'       => __( 'Site name', VACB_TEXTDOMAIN ),
																	// 	'description' => __( 'It is common and is used.', VACB_TEXTDOMAIN )
																	// ),
																	// array(
																	// 	'type'        => 'textbox',
																	// 	'name'        => 'vacb_general_seo_ogp_url',
																	// 	'label'       => __( 'Site url', VACB_TEXTDOMAIN ),
																	// 	'description' => __( 'It is common and is used.', VACB_TEXTDOMAIN ),
																	// 	'validation'  => 'url',
																	// ),
																	// array(
																	// 	'type'        => 'textarea',
																	// 	'name'        => 'vacb_general_seo_ogp_description',
																	// 	'label'       => __( 'Description', VACB_TEXTDOMAIN ),
																	// 	'description' => __( 'It is common and is used.', VACB_TEXTDOMAIN )
																	// ),
																	array(
																		'type'        => 'upload',
																		'name'        => 'vacb_general_seo_ogp_image',
																		'label'       => __( 'Default image', VACB_TEXTDOMAIN ),
																		'description' => __( 'It is common and is used.', VACB_TEXTDOMAIN ),
																		'default'     => ''
																	),
																	array(
																		'type'        => 'textbox',
																		'name'        => 'vacb_general_seo_ogp_admins_id',
																		'label'       => __( 'Facebook Admins ID', VACB_TEXTDOMAIN ),
																		'description' => __( 'Your Profile Admin ID is your Facebook profile ID.<br>It is common and is used.', VACB_TEXTDOMAIN ),
																		'validation'  => 'numeric'
																	),
																	array(
																		'type'        => 'textbox',
																		'name'        => 'vacb_general_seo_ogp_app_id',
																		'label'       => __( 'Facebook App ID', VACB_TEXTDOMAIN ),
																		'description' => __( 'Your Profile App ID is your Facebook Application ID.<br>It is common and is used.', VACB_TEXTDOMAIN ),
																		'validation'  => 'numeric'
																	),
																	array(
																		'type'        => 'textbox',
																		'name'        => 'vacb_general_seo_ogp_twitter_id',
																		'label'       => __( 'Twitter Account', VACB_TEXTDOMAIN ),
																		'description' => __( 'It is common and is used.', VACB_TEXTDOMAIN )
																	)
																) // fields
															), // section
															array(
																'type'   => 'section',
																'title'  => __( 'Noindex', VACB_TEXTDOMAIN ),
																'name'   => 'vacb_general_seo_noindex_section',
																'fields' => array(
																	array(
																		'type'        => 'checkbox',
																		'name'        => 'vacb_general_seo_noindex',
																		'label'       => __( 'Check noindex', VACB_TEXTDOMAIN ),
																		'description' => __( 'Use noindex for Archives.', VACB_TEXTDOMAIN ),
																		'items'       => array(
																			array(
																				'value' => 'category',
																				'label' => __( 'Category', VACB_TEXTDOMAIN ),
																			),
																			array(
																				'value' => 'tag',
																				'label' => __( 'Tag', VACB_TEXTDOMAIN ),
																			),
																			array(
																				'value' => 'tax',
																				'label' => __( 'Taxonomy', VACB_TEXTDOMAIN ),
																			),
																			array(
																				'value' => 'search',
																				'label' => __( 'Search', VACB_TEXTDOMAIN ),
																			),
																			array(
																				'value' => 'date',
																				'label' => __( 'Date', VACB_TEXTDOMAIN ),
																			),
																			array(
																				'value' => 'author',
																				'label' => __( 'Author', VACB_TEXTDOMAIN ),
																			),
																			array(
																				'value' => 'attachment',
																				'label' => __( 'Media', VACB_TEXTDOMAIN ),
																			)
																		) // items
																	) // checkbox
																), // fields
															), // section
														) // controls
													) // SEO Setting
												)
											)
										)
									),
		'menu_page'             => 'themes.php',                           // parent menu slug or supply `array` (can contains 'icon_url' & 'position') for top level menu
		'use_auto_group_naming' => true,                                   // default to true
		'use_util_menu'         => true,                                   // default to true, shows utility menu
		'minimum_role'          => 'edit_theme_options',                   // default to 'edit_theme_options'
		'layout'                => 'fixed',                                // fluid or fixed, default to fixed
		'page_title'            => __( 'Theme Options', VACB_TEXTDOMAIN ), // page title
		'menu_label'            => __( 'Theme Options', VACB_TEXTDOMAIN ), // menu label
	)
);

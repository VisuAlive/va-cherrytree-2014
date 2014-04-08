<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
 * Jetpack plugin filter
 */
add_filter('jetpack_enable_open_graph', '__return_false', 99);

<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'VisuAlive_API' ) ) :
class VisuAlive_API {
	function __construct() {
		add_action( 'generate_rewrite_rules', array( $this, 'generate_rewrite_rules' ) );
		add_action( 'wp', array( $this, 'wp' ) );
		add_filter( 'query_vars', array( $this, 'query_vars' ) );
		add_filter( 'api_cachemanifest', array( $this, 'api_cachemanifest' ), 10, 2 );
		add_filter( 'api_robots', array( $this, 'api_robots' ), 10, 2 );
	}

	/**
	 * リライトルールを追加する
	 *
	 * URL書式
	 * http://example.com/api/api_name?param1=value1&param2=value2
	 *
	 * @since 1.0
	 *
	 * @param void 
	 * @return void
	 */
	function generate_rewrite_rules( $wp_rewrite ) {
		$wp_rewrite->rules = array(
			'api/(.+?)/?$'       => 'index.php?api=$matches[1]',
			'manifest.appcache$' => 'index.php?api=cachemanifest',
			'robots\.txt$'       => 'index.php?api=robots',
		) + $wp_rewrite->rules;
	}

	/**
	 * APIを実行する
	 *
	 * @since 1.0
	 *
	 * @param void 
	 * @return void
	 */
	function wp() {
		$data = false;
		$json = false;

		if ( $api = get_query_var( 'api' ) ) {
			$response = apply_filters( "api_$api", $data, $json );

			if ( ! empty( $response[0] ) && ! $response[1] ) {
				if ( file_exists( $response[0] ) ) {
					include( $response[0] );
				} else {
					echo 'File not found';
				}
				exit;
			} elseif ( ! empty( $response[0] ) && is_array( $response[0] ) && $response[1] ) {
				if ( ! empty( $response[0] ) )
					wp_send_json_success( $response[0] );
				wp_send_json_error();
			} else {
				wp_send_json_error();
				exit;
			}
		}
	}

	/**
	 * クエリ変数を追加する
	 *
	 * @since 1.0
	 * @uses 'va_api_query_vars' filter
	 *
	 * @param void 
	 * @return array Query vars.
	 */
	function query_vars( $vars ) {
		return array_merge(
			apply_filters( 'api_query_vars', array( 'api' ) ),
			$vars
		);
	}

	/**
	 * アプリケーションキャッシュ
	 *
	 * @since 1.0
	 *
	 * @param bloom
	 * @param bloom
	 * @return array
	 */
	function api_cachemanifest( $data, $json ) {
		$args    = func_get_args();
		$file    = get_stylesheet_directory() . '/includes/api/cache-manifest.php';
		$args[0] = ( file_exists($file) ) ? $file : false;
		$args[1] = false;

		return $args;
	}

	/**
	 * Robots.txt
	 *
	 * @since 1.0
	 *
	 * @param bloom
	 * @param bloom
	 * @return array
	 */
	function api_robots( $data, $json ) {
		$args    = func_get_args();
		$file    = get_stylesheet_directory() . '/includes/api/robots.php';
		$args[0] = ( file_exists($file) ) ? $file : false;
		$args[1] = false;

		return $args;
	}


/********************
 * JSONを返すサンプル
 *******************/
/* フックする */
// function __construct() {
// 	add_filter( 'api_query_vars', array( $this, 'api_query_vars' ) );
// 	add_filter( 'api_data', array( $this, 'api_data' ) );
// }
/* クエリ変数を追加する */
// function api_query_vars( $vars ) {
// 	return array_merge( array( 'id', 'type', 'count' ), $vars );
// }
/* APIを作成 */
// function api_data() {
// 	$args = func_get_args();
// 	if ( 'author' == get_query_var( 'type' ) ) {
// 		if ( ! $id = get_query_var( 'id' ) ) {
// 			$id = 1;
// 		}
// 		$data = get_userdata( $id );
// 		if ( $data ) {
// 			$args[0]['name']        = esc_html( $data->display_name );
// 			$args[0]['description'] = nl2br( esc_html( $data->description ) );
// 			$args[0]['avatar']      = get_avatar( $id, 100, '', $data->display_name );
// 			$args[0]['archive']     = esc_url( get_author_posts_url( $id ) );
// 			$args[1]                = true;
// 		}
// 	}

// 	return $args;
// }
}
new VisuAlive_API;
endif;

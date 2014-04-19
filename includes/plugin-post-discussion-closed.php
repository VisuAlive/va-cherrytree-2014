<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'VA_Post_Discussion_Closed' ) ) :
class VA_Post_Discussion_Closed {
	private $target_post_type = array( 'page', 'info', 'showcase', 'carousel', 'attachment', 'link' );

	function __construct() {
		add_filter( 'comments_open', array( $this, '_va_pdc_comment_close' ), 9999, 2 );
		add_filter( 'pings_open', array( $this, '_va_pdc_comment_close' ), 9999, 2 );
		add_filter( 'trackback_url', array( $this, '_va_pdc_comment_close' ), 9999, 2 );
		add_filter( 'xmlrpc_methods', array( $this, '_va_pdc_xmlrpc_methods' ) );
		add_action( 'admin_notices', array( $this, '_va_pdc_show_admin_messages' ) );
		add_action( 'admin_menu', array( $this, '_va_pdc_remove_extra_meta_boxes' ) );
	}
	/**
	 * Disable Comments
	 * デフォルトで全固定ページのコメントをクローズ
	 * @link http://www.warna.info/archives/1199/
	 * @return boolean
	 */
	public function _va_pdc_comment_close( $open, $post_id ) {
		$post_id = (int)$post_id;
		$post = get_post( $post_id );

		if ( $post AND in_array( $post->post_type, $this->target_post_type ) ) {
			$open = false;
		}

		return $open;
	}
	/**
	 * XMLRPC経由でのPingbackを閉じる
	 * @link http://wpist.me/wp/wp-total-hacks/
	 * @return boolean
	 */
	public function _va_pdc_xmlrpc_methods( $methods ) {
		unset( $methods['pingback.ping'] );
		return $methods;
	}
	/**
	 * クローズ且つオープン不可である旨のメッセージを表示
	 * @link http://kachibito.net/wp-code/show-an-urgent-message-in-admin-panel
	 * @return string
	 */
	private function va_pdc_show_message( $message, $errormsg = false, $target_post_type = array('') ) {
		$post_type = get_post_type();

		if ( $target_post_type AND in_array( $post_type, $target_post_type ) ) {
			if ( $errormsg ) {
				echo '<div id="message" class="error">';
			} else {
				echo '<div id="message" class="updated fade">';
			}	echo "<p><strong>$message</strong></p></div>";
		}
	}
	/**
	 * クローズ且つオープン不可である旨のメッセージの内容
	 * @return callback
	 */
	public function _va_pdc_show_admin_messages() {
		$post_type = get_post_type();
		if ( $post_type ) {
			$name = esc_attr( get_post_type_object( $post_type )->labels->name );
			$target = $this->target_post_type;
			$this->va_pdc_show_message( sprintf( __('ディカッションにて「コメントの投稿を許可する」を有効にしても、%sではコメント投稿は有効になりません。', VACB2014_TEXTDOMAIN ), $name ), true, $target );
		}
	}
	/**
	 * 固定ページの入稿画面から一部入力欄を削除
	 * @return callback 
	 */
	public function _va_pdc_remove_extra_meta_boxes() {
		remove_meta_box( 'commentstatusdiv', 'page' , 'normal' );
		remove_meta_box( 'commentstatusdiv', 'page' , 'advanced' );
		remove_meta_box( 'commentstatusdiv', 'page' , 'side' );
		remove_meta_box( 'commentsdiv', 'page' , 'normal' );
		remove_meta_box( 'commentsdiv', 'page' , 'advanced' );
		remove_meta_box( 'commentsdiv', 'page' , 'side' );
	}
}
new VA_Post_Discussion_Closed;
endif; // VA_Post_Discussion_Closed

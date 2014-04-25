<?php
/**
 * The Header
 *
 * @package WordPress
 * @subpackage VA_CherryBlossum_2014
 * @since VA CherryBlossum 2014 1.0.0
 * @version 1.0.0
 * @author KUCKLU <kuck1u@visualive.jp>
 * @copyright Copyright (c) 2014 KUCKLU, VisuAlive.
 * @license http://opensource.org/licenses/gpl-2.0.php GPLv2
 * @link http://visualive.jp/
 */
 ?>
<!doctype html>
<!--[if IE 9]><html class="no-js lt-ie10" <?php language_attributes(); ?>> <![endif]-->
<html class="no-js" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php wp_head(); ?>
<script>
jQuery(function($){
	$(window).load(function(){
		console.log('body : ' + $('body').height());
		console.log('right-off-canvas-menu : ' + $('.right-off-canvas-menu').actual( 'height' ));
	});
});
</script>
</head>
<body <?php body_class(); ?>>
<div class="loader-wrap">
	<div class="loader">
		Loading<img alt="" title="" width="16" height="16" src="data:image/gif;base64,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">
	</div>
</div>

<div id="wrap" class="off-canvas-wrap" data-offcanvas>
<div class="inner-wrap">

<aside class="right-off-canvas-menu">
	<ul class="off-canvas-list">
		<li><label>VisuAlive</label></li>
		<?php wp_nav_menu(array( 'container' => false, 'depth' => 1, 'items_wrap' => '%3$s' )); ?>
		<?php _visualive_theme_offcanvas_menu(); ?>
		<?php wp_nav_menu(array( 'container' => false, 'depth' => 1, 'items_wrap' => '%3$s' )); ?>
		<?php _visualive_theme_offcanvas_menu(); ?>
	</ul>
</aside>

<header>
	<nav class="top-bar" data-topbar data-options="is_hover: false">
		<ul class="title-area">
			<li class="name">
				<h1><a href="<?php echo home_url('/'); ?>"><?php bloginfo('name') ?></a></h1>
			</li>
		</ul>
		<div class="right-small show-for-medium">
			<a class="right-off-canvas-toggle menu-icon" href="#"><span class="fa fa-bars"></span></a>
		</div>
		<div class="right-small show-for-small">
			<a class="right-off-canvas-toggle menu-icon" href="#"><span class="fa fa-bars"></span></a>
		</div>
		<div class="top-bar-section hide-for-medium">
			<?php _visualive_theme_primary_menu(); ?>
		</div>
	</nav>
</header>

<div class="img-holder" data-image="https://raw.github.com/pederan/ImageScroll/master/demo/img/autumn_season-1600x900.jpg" data-image-mobile="https://raw.github.com/pederan/ImageScroll/master/demo/img/autumn_season-800x450.jpg" data-width="1600" data-height="900"></div>

<div class="content-wrap">

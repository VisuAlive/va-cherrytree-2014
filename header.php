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
// jQuery(function($){
// 	$(window).load(function(){
// 		console.log('body : ' + $('body').actual('outerHeight', { includeMargin : true }));
// 		console.log('right-off-canvas-menu : ' + $('.right-off-canvas-menu').actual('outerHeight', { includeMargin : true }));
// 		var bH = $('body').actual('outerHeight', { includeMargin : true }),
// 			rMenu = $('.right-off-canvas-menu').actual('outerHeight', { includeMargin : true });


// 		$('.right-off-canvas-toggle').click(function(){
// 			if (bH <= rMenu) {
// 				$('html,body,.off-canvas-wrap').css({'height':rMenu});
// 			}
// 		});
// 		$('.exit-off-canvas').click(function(){
// 			$('html,body,.off-canvas-wrap').css({'height':''});
// 		});
// 	});
// });
</script>
</head>
<body <?php body_class(); ?>>
<div class="loader-wrap"><div class="loader">Loading</div></div>

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

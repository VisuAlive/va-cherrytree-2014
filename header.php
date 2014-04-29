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

<?php get_template_part( 'parts', 'nav' ); ?>
<?php get_template_part( 'parts', 'navm' ); ?>

<header 
	class="img-holder"
	data-image="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/main/main_visual_4546_2.jpg"
	data-image-mobile="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/main/main_visual_4546_2_m.jpg">
	<h1 class="header-title">
		<div class="header-title-inner"><?php echo get_bloginfo('name'); ?></div>
	</h1>
</header>

<div class="content-wrap">

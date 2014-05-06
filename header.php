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
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="VisuAlive">
<meta name="format-detection" content="telephone=no">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<style>
/**
 * ローディング
 * @source http://codepen.io/pupismyname/pen/rAxmB
 */
#loader-wrap {
	position: absolute;
	top: 0;
	left: 0;
	z-index: 100000;
	width: 100%;
	height: 100%;
	background: #050505;
	color: #fff;
	font-size: 0.875rem;
}
#loader-wrap .loader {
	position: absolute;
	top: 50%;
	left: 50%;
	z-index: 0;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	margin: -75px 0 0 -75px;
	width: 150px;
	height: 150px;
	text-align: center;
	text-transform: uppercase;
	line-height: 150px;
}
#loader-wrap .loader:before,
#loader-wrap .loader:after {
	position: absolute;
	top: 0;
	left: 0;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	width: 100%;
	height: 100%;
	border: 5px solid #fff;
	border-radius: 100px;
	-webkit-box-shadow: 0 0 50px #fff, inset 0 0 50px #fff;
	box-shadow: 0 0 50px #fff, inset 0 0 50px #fff;
	content: "\0020";
	opacity: 0;
}
#loader-wrap .loader:after {
	z-index: 1;
	-webkit-animation: gogoloader 2s ease 1s infinite;
	animation: gogoloader 2s ease 1s infinite;
}
#loader-wrap .loader:before {
	z-index: 2;
	-webkit-animation: gogoloader 2s ease 0s infinite;
	animation: gogoloader 2s ease 0s infinite;
}
</style>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="loader-wrap"><div class="loader">Loading</div></div>

<div id="wrap" class="off-canvas-wrap" data-offcanvas>
<div class="inner-wrap">

<?php get_template_part( 'parts', 'nav' ); ?>
<?php get_template_part( 'parts', 'navm' ); ?>

<div class="row">
	<header 
		class="img-holder"
		data-image="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/main/main_visual_4546_2.jpg"
		data-image-mobile="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/main/main_visual_4546_2_m.jpg">
		<div class="header-title">
			<h1 class="header-title-inner"><?php echo get_bloginfo('name'); ?></h1>
		</div>
	</header>
</div>

<div class="content-wrap">

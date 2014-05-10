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
<html class="no-js" <?php language_attributes(); ?> manifest="<?php bloginfo( 'manifest', 'display' ); ?>">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="VisuAlive">
<meta name="format-detection" content="telephone=no">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<!--
    Your smile is the best reward.
                            by VisuAlive (｡◕ ∀ ◕｡)
-->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- <div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&appId=272538956253165&version=v2.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script> -->
<div id="loader-wrap"><div class="loader">Loading</div></div>

<div id="wrap" class="off-canvas-wrap" data-offcanvas>
<div class="inner-wrap">

<?php get_template_part( 'parts', 'nav' ); ?>
<?php get_template_part( 'parts', 'navm' ); ?>
<?php get_template_part( 'parts', 'header' ); ?>

<div class="content-wrap">

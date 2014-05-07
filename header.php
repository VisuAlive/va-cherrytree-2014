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
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="loader-wrap"><div class="loader">Loading</div></div>

<div id="wrap" class="off-canvas-wrap" data-offcanvas>
<div class="inner-wrap">

<?php get_template_part( 'parts', 'nav' ); ?>
<?php get_template_part( 'parts', 'navm' ); ?>

<header 
class="img-holder"
data-image="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/main/main_visual_4546_2.jpg"
data-image-mobile="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/main/main_visual_4546_2_m.jpg">
<div class="row">
<div class="small-12 columns">
<div class="header-title">
<h1 class="header-title-inner"><?php echo get_bloginfo('name'); ?></h1>
</div>
</div>
</div>
</header>

<div class="content-wrap">

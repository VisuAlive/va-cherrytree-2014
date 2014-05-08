<?php
/**
 * The Parts Header
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

if ( is_front_page() ) : ?>
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
<?php endif; ?>

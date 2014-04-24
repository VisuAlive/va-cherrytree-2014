<?php
/**
 * The Footer
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
<footer>
<?php get_sidebar( 'footer' ); ?>
<div class="copyright">
<div class="row">
<small class="small-12 columns">Copyright (C) <?php echo date_i18n( 'Y' ); ?> KUCKLU, VisuAlive All Rights Reserved.</small>
</div>
</div>
</footer>
<!-- close the off-canvas menu -->
<a class="exit-off-canvas"></a>
</div><!-- content-wrap -->
</div><!-- inner-wrap -->
</div><!-- off-canvas-wrap -->
<?php wp_footer(); ?>
<script src='https://rawgithub.com/pederan/Parallax-ImageScroll/master/jquery.imageScroll.min.js'></script>
<script>
var touch = Modernizr.touch;
jQuery('.img-holder').imageScroll({
	imageAttribute: (touch === true) ? 'image-mobile' : 'image',
	touch: touch
});
</script>
</body>
</html>

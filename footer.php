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
<footer class="page-footer">
<?php get_sidebar( 'footer' ); ?>
<div class="copyright">
<div class="row">
<small class="small-12 columns">Copyright (C) <?php echo date_i18n( 'Y' ); ?> KUCKLU, VisuAlive All Rights Reserved.</small>
</div>
</div>
</footer>
<!-- close the off-canvas menu -->
<a class="exit-off-canvas"></a>
<a id="goTop" href="#wrap"><span class="fa fa-chevron-circle-up"></span></a>
</div><!-- content-wrap -->
</div><!-- inner-wrap -->
</div><!-- off-canvas-wrap -->
<?php wp_footer(); ?>
</body>
</html>

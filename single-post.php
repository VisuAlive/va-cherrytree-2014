<?php get_header(); ?>
<?php get_template_part( 'parts', 'breadcrumbs' ); ?>
<div class="row">
	<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class( 'large-8 large-push-4 columns'); ?>>
		<?php get_template_part( 'content', get_post_format() ); ?>
	</div>
	<?php endwhile; endif; ?>
	<div class="large-4 large-pull-8 columns"><?php get_sidebar( 'blog' ); ?></div>
</div>
<?php get_footer(); ?>

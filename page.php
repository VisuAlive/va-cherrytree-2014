<?php get_header();
get_template_part( 'parts', 'breadcrumbs' );

if ( have_posts() ) :
while( have_posts() ) : the_post();
?>
<div class="row">
<div <?php post_class("small-12 columns"); ?>>
	<div class="entry-title"><?php the_title(); ?></div>
	<div class="entry-body"><?php the_content(); ?></div>
</div>
</div>
<?php
endwhile;
else:
endif;

get_footer(); ?>

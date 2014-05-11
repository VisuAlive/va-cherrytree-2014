<?php get_header();

if ( have_posts() ) :
while( have_posts() ) : the_post();
?>
<header class="entry-title primary">
	<div class="row">
		<div class="small-12 columns">
			<h1><?php the_title(); ?></h1>
		</div>
	</div>
</header>
<?php get_template_part( 'parts', 'breadcrumbs' ); ?>
<div <?php post_class("entry-body"); ?>>
	<div class="row">
		<div class="small-12 columns">
			<?php the_content(); ?>
		</div>
	</div>
</div>
<?php
endwhile;
else:
endif;

get_footer(); ?>

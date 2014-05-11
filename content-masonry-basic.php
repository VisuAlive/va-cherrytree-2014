<div class="row">
	<div class="large-8 large-push-4 columns">
		<div class="row">
			<div class="small-12 columns post-orbit">
				<ul data-orbit data-options="bullets:false;">
					<li>
						<img src="http://foundation.zurb.com/docs/assets/img/examples/satelite-orbit.jpg" height="450" alt="slide 1" />
						<div class="orbit-caption">
							Caption One.
						</div>
					</li>
					<li class="active">
						<img src="http://foundation.zurb.com/docs/assets/img/examples/andromeda-orbit.jpg" height="450" alt="slide 2" />
						<div class="orbit-caption">
							Caption Two.
						</div>
					</li>
					<li>
						<img src="http://foundation.zurb.com/docs/assets/img/examples/launch-orbit.jpg" height="450" alt="slide 3" />
						<div class="orbit-caption">
							Caption Three.
						</div>
					</li>
				</ul>
			</div>
		</div>
	<?php
	query_posts( array( 'post_type' => 'post', 'paged' => get_query_var( 'paged' ) ) );
	if ( have_posts() ) : ?>
		<div id="masonry" class="row">
		<?php while( have_posts() ): the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'medium-6 columns'); ?>>
				<div class="small-12 columns">
					<?php if ( has_post_thumbnail() ) : ?>
					<div class="row entry-thumbnail">
						<a href="<?php the_permalink(); ?>" class="post-link"><?php the_post_thumbnail(); ?></a>
					</div>
					<?php endif; ?>
					<header class="entry-header">
						<div class="entry-title"><h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1></div>
					</header>
					<div class="entry-excerpt">
						<?php the_excerpt(); ?>
					</div><!-- .entry-content -->
					<footer class="entry-footer">
						<?php echo '<span class="fa fa-folder-open"></span>' . get_the_category_list( __( ', ') ); ?>
						<?php
							$time_string = '<time class="entry-date published" datetime="%2$s"><span class="fa fa-calendar"></span><a href="%1$s" rel="bookmark">%3$s</a></time>';
							echo sprintf( $time_string, esc_url( get_permalink() ), esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() ) );
						?>
					</footer>
				</div>
			</article>
		<?php endwhile; ?>
		</div>
	<?php
	endif;
	wp_reset_query();
	?>
	</div>
	<div class="large-4 large-pull-8 columns"><?php get_sidebar( 'blog' ); ?></div>
</div>

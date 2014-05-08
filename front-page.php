<?php get_header(); ?>
<section class="occupation">
	<div class="section-heading">
		<h2><?php the_title(); ?></h2>
	</div>
	<div class="row">
		<div class="small-12 columns">
			<ul class="medium-block-grid-3 service">
<?php
$service      = va_get_page_id('service');
$service_args = array (
					'post_type'      => 'page',
					'posts_per_page' => '-1',
					'post_parent'    => $service,
					'orderby'        => 'menu_order',
					'order'          => 'asc'
				);
query_posts( $service_args );
if ( have_posts() ) :
	while( have_posts() ) : the_post();
?>
				<li id="post-<?php the_ID(); ?>" <?php post_class('large-4 columns'); ?>>
					<?php the_post_thumbnail('column-3'); ?>
					<h3><?php the_title(); ?></h3>
					<?php the_excerpt(); ?>
				</li>
<?php
	endwhile;
else:
endif;
wp_reset_query();
?>
			</ul>
		</div>
	</div>
	<div class="solution">
		<div class="row">
			<div class="large-8 large-push-4 columns"><?php the_post_thumbnail('636x470'); ?></div>
			<div class="large-4 large-pull-8 columns">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</section>


<?php
$download_args = array(
					'post_type'      => 'download',
					'posts_per_page' => 3,
				);
query_posts( $download_args );
if ( have_posts() ) :
?>
<section class="release">
	<div class="row">
		<div class="small-12 columns">
			<div class="section-heading">
				<h2>WordPress plugins which VisuAlive released</h2>
				<p>Though it is a very small thing, I offer convenience when there is it.</p>
			</div>
			<?php while( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'medium-4 columns post-figure' ); ?>>
				<?php the_post_thumbnail( 'column-3' ); ?>
				<div class="figcaption">
					<h3 class="post-title"><?php the_title(); ?></h3>
					<?php the_excerpt(); ?>
				</div>
			</article>
			<?php endwhile; ?>
		</div>
	</div>
</section>
<?php else:
endif;
wp_reset_query();
?>


<?php
$works_args = array(
					'post_type'      => 'works',
					'posts_per_page' => 4,
				);
query_posts( $works_args );
if ( have_posts() ) :
?>
<section class="row project">
	<div class="small-12 columns">
		<div class="section-heading">
			<h2>The past projects of VisuAlive</h2>
			<h3>Though it is a very small thing, I offer convenience when there is it.</h3>
		</div>
		<?php while( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'medium-3 columns post-figure' ); ?>>
			<?php the_post_thumbnail( 'column-4' ); ?>
			<div class="figcaption">
				<h3 class="post-title"><?php the_title(); ?></h3>
			</div>
		</article>
		<?php endwhile; ?>
	</div>
</section>
<?php else:
endif;
wp_reset_query();
?>


<section class="profile parallax" data-stellar-background-ratio="0.5">
	<div class="row">
		<div class="section-heading">
			<h2>The KUCKLU of VisuAlive</h2>
		</div>
		<div class="medium-4 columns">
			<div class="profile-avatar"><?php echo va_get_user_prof('1', '256')['avatar']; ?></div>
		</div>
		<div class="medium-8 columns">
			<p class="profile-desc">
				テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
			</p>
		</div>
	</div>
</section>
<!-- <a href="<?php echo add_query_arg( array( 'lang'=>'en' ), $_SERVER['REQUEST_URI'] ); ?>">テスト</a> -->
<?php get_footer(); ?>

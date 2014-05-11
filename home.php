<?php get_header(); ?>
<header class="entry-title primary">
	<div class="row">
		<div class="small-12 columns">
			<h1><?php echo single_post_title(); ?></h1>
		</div>
	</div>
</header>
<?php get_template_part( 'parts', 'breadcrumbs' ); ?>
<?php
$masonry = 'basic';
switch ( $masonry ) {
	case 'basic':
		get_template_part( 'content', 'masonry-basic' );
		break;
	case 'fullsmall':
		get_template_part( 'content', 'masonry-fullsmall' );
		break;
	case 'fullwide':
		get_template_part( 'content', 'masonry-fullwide' );
		break;
	default:
		get_template_part( 'content', 'masonry-basic' );
		break;
}
?>
<?php va_the_paging_nav(); ?>
<?php get_footer(); ?>

<?php get_header(); ?>
<section class="row occupation">
	<div class="small-12 columns">
		<h2>ヴィジュアライブにお任せください</h2>
		<div class="row service">
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
			<div class="large-4 columns">
				<?php the_post_thumbnail('column-3'); ?>
				<h3><?php the_title(); ?></h3>
				<div><?php the_excerpt(); ?></div>
			</div>
<?php
	endwhile;
else:
endif;
wp_reset_query();
?>
		</div>
<!-- 		<div class="row service">
			<div class="large-4 columns">
				<img src="http://placehold.jp/606x428.png" alt="">
				<h3>CMSの導入</h3>
				<div>WordPressを使ったウェブサイトの制作。現在運営中のウェブサイトをWordPressへの移行。</div>
			</div>
			<div class="large-4 columns">
				<img src="http://placehold.jp/606x428.png" alt="">
				<h3>保守管理</h3>
				<div>レンタルサーバー・ドメインの契約更新作業、WordPressのアップデート並びにアップグレード等の保守管理。</div>
			</div>
			<div class="large-4 columns">
				<img src="http://placehold.jp/606x428.png" alt="">
				<h3>HTMLコーディング</h3>
				<div>PC・スマートフォンサイト、レスポンシブデザインのHTMLコーディング。</div>
			</div>
		</div> -->
		<div class="row solution">
			<div class="large-8 columns"><img src="http://placehold.jp/636x470.png" alt=""></div>
			<div class="large-4 columns">
				<dl>
					<dt>自社内で記事の更新したい！</dt>
					<dd>WordPressなら扱い易い管理画面な為、自社内で簡単に記事の公開・更新が可能です。学習コストは多くありません。</dd>
					<dt>アクセスアップしたい！</dt>
					<dd>WordPressはSEOと非常に相性の良いCMSです。すぐにアクセスアップに繋げるのは難しいですが、中期〜長期的に運営していく事でアクセスアップが見込めます。</dd>
					<dt>お金かけられないんだけど…</dt>
					<dd>WordPressはGPL v2ライセンスのもとで無償で提供されています。その為、CMSの大規模開発を行う必要が無く、ウェブサイトの制作コストを抑える事が可能です。</dd>
				</dl>
			</div>
		</div>
	</div>
</section>

<section class="row release">
	<div class="small-12 columns">
		<h2>WordPress plugins which VisuAlive released</h2>
		<h3>Though it is a very small thing, I offer convenience when there is it.</h3>
		<ul class="medium-block-grid-3">
			<li>
				<img src="http://placehold.jp/606x428.png" alt="">
			</li>
			<li>
				<img src="http://placehold.jp/606x428.png" alt="">
			</li>
			<li>
				<img src="http://placehold.jp/606x428.png" alt="">
			</li>
		</ul>
	</div>
</section>

<section class="row project">
	<div class="small-12 columns">
		<h2>The past projects of VisuAlive</h2>
		<h3>Though it is a very small thing, I offer convenience when there is it.</h3>
		<ul class="medium-block-grid-2 large-block-grid-4">
			<li>
				<img src="http://placehold.jp/440x310.png" alt="">
			</li>
			<li>
				<img src="http://placehold.jp/440x310.png" alt="">
			</li>
			<li>
				<img src="http://placehold.jp/440x310.png" alt="">
			</li>
			<li>
				<img src="http://placehold.jp/440x310.png" alt="">
			</li>
		</ul>
	</div>
</section>

<section class="row profile">
	<div class="medium-4 columns"><img src="http://placehold.jp/256x256.png" alt=""></div>
	<div class="medium-8 columns"></div>
</section>
<!-- <a href="<?php echo add_query_arg( array( 'lang'=>'en' ), $_SERVER['REQUEST_URI'] ); ?>">テスト</a> -->
<?php get_footer(); ?>

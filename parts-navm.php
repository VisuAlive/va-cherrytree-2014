<div class="show-for-medium-down">
	<nav class="top-bar" data-topbar>
		<ul class="title-area">
			<li class="name"><?php va_the_custom_header(); ?></li>
		</ul>
		<div class="right-small">
			<a class="right-off-canvas-toggle menu-icon" href="#"><span class="fa fa-bars"></span></a>
		</div>
	</nav>
</div>
<aside class="right-off-canvas-menu">
	<div class="off-canvas-profile">
		<ul>
			<li class="profile-avatar"><?php echo va_get_user_prof('1', '128')['avatar']; ?></li>
			<li class="profile-archive"><a href="<?php echo va_get_user_prof('1')['archive']; ?>"><?php echo va_get_user_prof('1')['name']; ?><span>プロフィールを見る</span></a></li>
		</ul>
	</div>
	<ul class="off-canvas-list">
		<li><label>VisuAlive</label></li>
		<?php wp_nav_menu(array( 'container' => false, 'theme_location' => 'offcanvas', 'depth' => 1, 'items_wrap' => '%3$s' )); ?>
	</ul>
</aside>

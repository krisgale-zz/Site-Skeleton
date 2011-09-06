<?php
/*
TEMPLATE NAME: Sitemap
*/
get_header(); ?>

<div id="content" class="clearfix">
	<div id="content-main">
		<h2>Sitemap</h2>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<?php wp_nav_menu(array('menu' => 'sitemap', 'menu_class' => 'circle', 'container' => '')); ?>

		<?php endwhile; endif; ?>
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	
	</div><!--/end content-main-->
<?php get_sidebar(); ?>
</div><!--/end content-->
<?php get_footer(); ?>
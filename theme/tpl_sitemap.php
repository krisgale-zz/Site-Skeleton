<?php
/* TEMPLATE NAME: Sitemap */
get_header(); ?>

<section class="content clearfix">
	<section class="content-main">
		<h1>Sitemap</h1>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<?php wp_nav_menu(array('menu' => 'sitemap', 'menu_class' => 'circle', 'container' => '')); ?>

		<?php endwhile; endif; ?>
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	
	</section><!--/end .content-main-->
	<?php get_sidebar(); ?>
</section><!--/end .content-->
<?php get_footer(); ?>
<?php
/*
TEMPLATE NAME: NO Auto P
*/
get_header(); ?>

<div id="content" class="clearfix">
	<div id="content-main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php remove_filter('the_content','wpautop'); the_content(); ?>

		<?php endwhile; endif; ?>
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	
	
	</div><!--/end content-main-->
<?php get_sidebar(); ?>
</div><!--/end content-->
<?php get_footer(); ?>
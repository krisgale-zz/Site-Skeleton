<?php
get_header(); ?>

<div id="content" class="clearfix">
	<div id="content-main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h2><?php the_title(); ?></h2>
            <?php the_content(); ?>

		<?php endwhile; endif; ?>
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	
	</div><!--/end content-main-->
<?php get_sidebar(); ?>
</div><!--/end content-->
<?php get_footer(); ?>
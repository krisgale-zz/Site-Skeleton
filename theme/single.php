<?php
get_header();
?>

<div id="content" class="clearfix">
	<div id="content-main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


        <h2><?php the_title(); ?></h2>
        
        <?php the_content(); ?>
        <?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>
        
        <p><?php edit_post_link('Edit this entry','','.'); ?></p>


	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

	</div><!--/end content-main-->
<?php get_sidebar(); ?>
</div><!--/end content-->
<?php get_footer(); ?>

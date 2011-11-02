<?php
get_header();
?>

<section class="content clearfix">
	<section class="content-main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


        <h1><?php the_title(); ?></h1>
        
        <?php the_content(); ?>
        <?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>
        
        <p><?php edit_post_link('Edit this entry','','.'); ?></p>


	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

	</section><!--/end .content-main-->
	<?php get_sidebar(); ?>
</section><!--/end .content-->
<?php get_footer(); ?>

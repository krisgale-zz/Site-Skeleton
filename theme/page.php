<?php
get_header(); ?>

<section class="content clearfix">
	<section class="content-main">
		<?php 
		while ( have_posts() ) : the_post();
			echo "<h1>".get_the_title()."</h1>";
			the_content();
		endwhile;
		edit_post_link('Edit this entry.', '<p>', '</p>');
		?>
	</section><!--/end .content-main-->
	<?php get_sidebar(); ?>
</section><!--/end .content-->
<?php get_footer(); ?>
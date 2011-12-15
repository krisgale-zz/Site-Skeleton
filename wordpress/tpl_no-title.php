<?php
/* TEMPLATE NAME: No Title */
get_header(); ?>

<section class="content clearfix">
	<section class="content-main">

	<?php
	
		while ( have_posts() ) : the_post();

			the_content();

		endwhile;
		
	edit_post_link( 'Edit this entry.', '<p>', '</p>' ); 
	
	?>
	
	
	</section><!--/end .content-main-->
	<?php get_sidebar(); ?>
</section><!--/end .content-->
<?php get_footer(); ?>
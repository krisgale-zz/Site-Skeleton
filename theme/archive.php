<?php

get_header();
?>

<section class="content clearfix">
	<section class="content-main">
		
		<?php if (have_posts()) : ?>
        
		<h1>
		<?php 
		if ( is_day() ) :
			echo "Daily Archives: ".get_the_date();
		elseif ( is_month() ) :
			echo "Monthly Archives: ".get_the_date('F Y');
		elseif ( is_year() ) :
			echo "Yearly Archives: ".get_the_date('Y');
		else :
			echo "Blog Archives";
		endif; 
		?>
		</h1>
        
		<?php while (have_posts()) : the_post(); ?>
		<article>
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<p class="date"><?php the_time('l, F jS, Y') ?></p>
			<?php the_excerpt(); ?>
		</article><!--/end entry-->
		<?php endwhile; ?>

		<div class="clearfix">
			<p class="right"><?php previous_posts_link('Newer Entries &raquo;') ?></p>
			<p class="left"><?php next_posts_link('&laquo; Older Entries') ?></p>
		</div>
        
		<?php else : ?>
			<h1>Sorry nothing here yet...</h1>
			<p>Please check back later for future updates.</p>
		<?php endif; ?>

	</section><!--/end .content-main-->
	<?php get_sidebar(); ?>
</section><!--/end .content-->
<?php get_footer(); ?>

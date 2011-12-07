<?php get_header(); ?>

<section class="content clearfix">
	<section class="content-main">
		
	<?php if (have_posts()) : ?>
	
   	<header>     
		<h1><?php single_cat_title(); ?></h1>
  	</header>      
  	
	<?php while (have_posts()) : the_post(); ?>
	
	<article <?php post_class(); ?>>
	
		<header>
			<h2><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		</header>
		
		<footer>
			<p>Posted by <cite><?php the_author_link(); ?></cite> on <time datetime="<?php the_time('c'); ?>" pubdate="pubdate"><?php the_time('F jS, Y') ?></time></p>
		</footer>
		
		<?php the_excerpt(); ?>
		
	</article>
	
	<?php endwhile; ?>

	<div class="clearfix">
		<p class="right"><?php previous_posts_link('Newer Entries &raquo;') ?></p>
		<p class="left"><?php next_posts_link('&laquo; Older Entries') ?></p>
	</div>

	<?php else : ?>
	
    		<header>
    			<h1>Sorry nothing here yet...</h1>
    		</header>
    		
        	<p>Please check back later for future updates.</p>
        	
    <?php endif; ?>

	</section><!--/end .content-main-->
	<?php get_sidebar(); ?>
</section><!--/end .content-->
<?php get_footer(); ?>

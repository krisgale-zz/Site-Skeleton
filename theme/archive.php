<?php

get_header();
?>

<div id="content" class="clearfix">
	<div id="content-main">
		
		<?php if (have_posts()) : ?>
        
        <h2>
		<?php if ( is_day() ) : ?>
        	Daily Archives: <?php get_the_date(); ?>
        <?php elseif ( is_month() ) : ?>
        	Monthly Archives: <?php get_the_date('F Y'); ?>
        <?php elseif ( is_year() ) : ?>
        	Yearly Archives: <?php get_the_date('Y'); ?>
        <?php else : ?>
        	Blog Archives
        <?php endif; ?>
        </h2>
        
        <?php while (have_posts()) : the_post(); ?>
        	<div class="entry">
                <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                <p class="date"><?php the_time('l, F jS, Y') ?></p>
                
                <?php the_excerpt() ?>
			</div><!--/end entry-->
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>
        
	<?php else : ?>
    	<h2>Sorry nothing here yet...</h2>
        <p>Please check back later for future updates.</p>
    <?php endif; ?>

	</div><!--/end content-main-->
<?php get_sidebar(); ?>
</div><!--/end content-->
<?php get_footer(); ?>

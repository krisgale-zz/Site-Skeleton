<?php get_header(); ?>

<section class="content clearfix">
	<section class="content-main">

	<?php if ( have_posts() ) : 
		while ( have_posts() ) : the_post(); ?>
		
			<article <?php post_class(); ?>>
			
				<header>
					<h2><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				</header>
				
				<footer>
					<p>Posted by <?php the_author_link(); ?> on <time datetime="<?php the_time('c'); ?>" pubdate="pubdate"><?php the_time('F jS, Y') ?></time></p>
				</footer>
				
				<?php the_content(); ?>
				
				<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
				
			</article><!--/end article-->
			
		<?php endwhile; ?>

		<div class="clearfix">
			<p class="right"><?php previous_posts_link('Newer Entries &raquo;') ?></p>
			<p class="left"><?php next_posts_link('&laquo; Older Entries') ?></p>
		</div>

	<?php else : ?>
		<header>
			<h1>Not Found</h1>
		</header>
		<p>Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>

	</section><!--/end .content-main-->
	<?php get_sidebar(); ?>
</section><!--/end .content-->
<?php get_footer(); ?>
<?php get_header(); ?>

<section class="content clearfix">
	<section class="content-main">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<article <?php post_class(); ?>>
		
			<header>
				<h1><?php the_title(); ?></h1>
			</header>
			
			<footer>
				<p>Posted by <cite><?php the_author_link(); ?></cite> on <time datetime="<?php the_time('c'); ?>" pubdate="pubdate"><?php the_time( 'F jS, Y' ) ?></time></p>
			</footer>
			
			<?php the_content(); ?>
			
			<p class="postmetadata"><?php the_tags( 'Tags: ', ', ', '<br />' ); ?> Posted in <?php the_category( ', ' ) ?> | <?php edit_post_link( 'Edit', '', ' | ' ); ?>  <?php comments_popup_link( 'No Comments &#187;', '1 Comment &#187;', '% Comments &#187;' ); ?></p>
		
		</article>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

	</section><!--/end .content-main-->
	<?php get_sidebar(); ?>
</section><!--/end .content-->
<?php get_footer(); ?>

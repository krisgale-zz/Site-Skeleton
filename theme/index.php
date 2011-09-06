<?php

get_header(); ?>

<div id="content" class="clearfix">
	<div id="content-main">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
			<div class="entry">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<p class="date"><?php the_time('F jS, Y') ?></p>

				<?php the_content(); ?>

				<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
			</div><!--/end entry-->
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2>Not Found</h2>
		<p>Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>

	</div><!--/end content-main-->
<?php get_sidebar(); ?>
</div><!--/end content-->
<?php get_footer(); ?>

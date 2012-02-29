<aside class="sidebar">
	<ul>
		<li>
			<h3>Archives</h3>
			<ul class="circle">
			<?php wp_get_archives('type=monthly'); ?>
			</ul>
		</li>
		<li>
			<h3>Categories</h3>
			<ul class="circle">
			<?php wp_list_categories('show_count=1&title_li='); ?>
			</ul>
		</li>
		<?php dynamic_sidebar( 'ps_widgets' ); ?>
	</ul>
</aside><!--end .sidebar-->


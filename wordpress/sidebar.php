<aside class="sidebar">
	<h3>Archives</h3>
	<ul class="circle">
	<?php wp_get_archives('type=monthly'); ?>
	</ul>
	
	<h3>Categories</h3>
	<ul class="circle">
	<?php wp_list_categories('show_count=1&title_li='); ?>
	</ul>
</aside><!--end .sidebar-->


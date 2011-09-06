<div id="sidebar">
    
    <h3>Archives</h3>
    <ul>
    	<?php wp_get_archives('type=monthly'); ?>
    </ul>
    
    <h3>Categories</h3>
    <ul>
    	<?php wp_list_categories('show_count=1&title_li='); ?>
    </ul>

</div><!--end sidebar-->


<div id="container">
	<header class="header clearfix">
	
		<a class="logo" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><?php print $site_name; ?></a>
		
		<?php print render($page['header']); ?>
		
		<?php if ($main_menu): ?>
		<nav>
			<?php print theme('links__system_main_menu', array(
				'links' => $main_menu,
				'attributes' => array(
					'id' => 'main-menu-links',
					'class' => array( 'inline', 'clearfix' )
				)
			)); ?>
		</nav><!--/end nav-->
		<?php endif; ?>
		
	</header><!--/end .header-->

<section class="content clearfix" role="main">

	<?php if ($messages): ?>
	<div id="messages"><div class="section clearfix">
		<?php print $messages; ?>
	</div></div> <!-- /.section, /#messages -->
	<?php endif; ?>
	
	<?php if ($page['sidebar']): ?>
	<section class="content-main">
	<?php endif; ?>
		
		<?php if ($tabs): ?>
		<div class="tabs">
			<?php print render($tabs); ?>
		</div>
		<?php endif; ?>
		
		<?php print render($title_prefix); ?>
		
		<?php if ($title): ?>
			<h1><?php print $title; ?></h1>
		<?php endif; ?>
		 
		<?php print render($title_suffix); ?>
		 
		<?php print render($page['content']); ?>
	
	<?php if ($page['sidebar']): ?>

	</section><!--/end .content-main-->
	<aside class="sidebar">
		
		<?php print render($page['sidebar']); ?>
		
	</aside><!--/end sidebar-->
	
	 <?php endif; ?>
	
</section><!--/end .content-->
</div><!--/end container-->
<?php if ($page['footer']): ?>
<footer class="footer"><div class="wrapper">
	
	<?php print render($page['footer']); ?>
	
</div></footer><!--/end .footer-->
<?php endif; ?>
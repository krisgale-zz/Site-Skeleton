<!doctype html>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width,initial-scale=1">

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/ui/favicon.ico">
<?php 
wp_enqueue_style( 'styleDev', get_bloginfo('template_url').'/css/style.css', '', '1.0' );
//wp_enqueue_style( 'style', get_bloginfo('template_url').'/css/style.min.css', '', '1.0' ); 
?>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<!--[if IE]><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie.css" /><![endif]-->

<?php 
wp_enqueue_script("modernizr",get_bloginfo("template_url").'/js/modernizr-2.0.6.min.js');
wp_enqueue_script("functionalityDev",get_bloginfo("template_url")."/js/functionality.js",array("jquery"),"1.0",true);
//wp_enqueue_script("functionality",get_bloginfo("template_url")."/js/functionality.min.js",array("jquery"),"1.0",true);
wp_head(); 
?>
</head>
<body <?php body_class(); ?>> 
<div id="container">
<header class="header clearfix">
	<a class="logo" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
	<nav class="clearfix" role="navigation">
		<?php wp_nav_menu(array('menu' => 'main', 'menu_class' => 'dropdown clearfix', 'container' => '')); ?>
	</nav><!--/end nav-->
</header><!--/end .header-->

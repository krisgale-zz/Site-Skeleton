<!doctype html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/ui/favicon.ico">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/wordpress.css">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<!--[if IE]><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie.css" /><![endif]-->

<?php 
wp_enqueue_script("modernizr",get_bloginfo("template_url")."/js/modernizr-2.0.6.min.js");
//wp_enqueue_script("cufon",get_bloginfo("template_url")."/js/cufon-yui.js",array("jquery"),"",true);
//wp_enqueue_script("minion",get_bloginfo("template_url")."/js/Minion.font.js",array("jquery","cufon"),"",true);
//wp_enqueue_script("init",get_bloginfo("template_url")."/js/init.js",array("jquery","cufon","minion","",true));
//wp_enqueue_script("cufonNow",get_bloginfo("template_url")."/js/cufon.now.js",array("jquery","cufon","minion","init"),"",true);
wp_enqueue_script("superfish",get_bloginfo("template_url")."/js/superfish.js",array("jquery"),"",true);
wp_enqueue_script("superfishControls",get_bloginfo("template_url")."/js/superfish.controls.js",array("jquery","superfish"),"",true);
?>

<?php if (is_front_page()) {
//wp_enqueue_script("cycle",get_bloginfo("template_url")."/js/jquery.cycle.all.min.js",array("jquery"),"",true);
//wp_enqueue_script("cycleControls",get_bloginfo("template_url")."/js/cycle.controls.js",array("jquery","cycle"),"",true);
} ?>

<?php if (is_page_template('tpl_gallery.php')) {
//wp_enqueue_script("prettyPhoto",get_bloginfo("template_url")."/js/jquery.prettyPhoto.js",array("jquery"),"",true);
//wp_enqueue_script("prettyPhotoController",get_bloginfo("template_url")."/js/prettyPhotoController.js",array("jquery","prettyPhoto"),"",true);
?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/prettyPhoto.css">
<?php } ?>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>> 
<div id="container">
<header class="header clearfix">
	<a class="logo" href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a>
	<nav class="clearfix">
		<?php wp_nav_menu(array('menu' => 'main', 'menu_class' => 'dropdown clearfix', 'container' => '')); ?>
	</nav><!--/end nav-->
</header><!--/end .header-->

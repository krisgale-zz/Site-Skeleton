<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/ui/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/wordpress.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/print.css" type="text/css" media="print" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<!--[if IE]>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/ie.css" media="screen" />
<![endif]-->

<?php 
//wp_enqueue_script("cufon",get_bloginfo("template_url")."/js/cufon-yui.js",array("jquery"));
//wp_enqueue_script("minion",get_bloginfo("template_url")."/js/Minion.font.js",array("jquery","cufon"));
//wp_enqueue_script("init",get_bloginfo("template_url")."/js/init.js",array("jquery","cufon","minion"));
//wp_enqueue_script("cufonNow",get_bloginfo("template_url")."/js/cufon.now.js",array("jquery","cufon","minion","init"),"",true);
wp_enqueue_script("superfish",get_bloginfo("template_url")."/js/superfish.js",array("jquery"));
wp_enqueue_script("superfishControls",get_bloginfo("template_url")."/js/superfish.controls.js",array("jquery","superfish"));
//wp_enqueue_script("onblur",get_bloginfo("template_url")."/js/onblur.js",array("jquery"));
?>

<?php if (is_front_page()) {
//wp_enqueue_script("cycle",get_bloginfo("template_url")."/js/jquery.cycle.all.min.js",array("jquery"));
//wp_enqueue_script("cycleControls",get_bloginfo("template_url")."/js/cycle.controls.js",array("jquery","cycle"));
} ?>

<?php if (is_page_template('tpl_gallery.php')) {
//wp_enqueue_script("prettyPhoto",get_bloginfo("template_url")."/js/jquery.prettyPhoto.js",array("jquery"));
//wp_enqueue_script("prettyPhotoController",get_bloginfo("template_url")."/js/prettyPhotoController.js",array("jquery","prettyPhoto"));
?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/prettyPhoto.css" type="text/css" media="screen" />
<?php } ?>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>> 
<div id="container">
	<div id="header" class="clearfix">
    	<h1 class="left"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
    	<div id="nav" class="clearfix">
        	<?php wp_nav_menu(array('menu' => 'main', 'menu_class' => 'dropdown', 'container' => '')); ?>
        </div><!--/end nav-->
    </div><!--/end header-->

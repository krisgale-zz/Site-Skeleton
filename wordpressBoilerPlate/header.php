<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width,initial-scale=1">

<title><?php wp_title( '&laquo;', true, 'right' ); ?> <?php bloginfo( 'name' ); ?></title>

<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/ui/favicon.ico">
<?php 
wp_enqueue_style( 'styleDev', get_template_directory_uri().'/css/style.css', '', '1.0' );
//wp_enqueue_style( 'style', get_template_directory_uri().'/css/style.min.css', '', '1.0' ); 
?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if IE]><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie.css" /><![endif]-->

<?php 
wp_enqueue_script( 'modernizr', get_template_directory_uri().'/js/modernizr-2.0.6.min.js' );
wp_enqueue_script( 'functionalityDev', get_template_directory_uri().'/js/functionality.js', array( 'jquery' ), '1.0', true );
//wp_enqueue_script( 'functionality', get_template_directory_uri().'/js/functionality.min.js', array( 'jquery' ), '1.0', true );
if ( is_singular( 'post' ) ) wp_enqueue_script( 'comment-reply' );
wp_head(); 
?>
</head>
<body <?php body_class(); ?>> 
<div id="container">
<header class="header clearfix">
	<hgroup>
		<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo get_bloginfo( 'name' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<h2><?php bloginfo( 'description' ); ?></h2>
	</hgroup>
	<?php /*
	To use a logo instead of the site name.
	Styles are already in place in CSS. 
	<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo get_bloginfo( 'name' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
	*/ ?>
	<nav class="clearfix" role="navigation">
		<?php wp_nav_menu( array( 'menu' => 'main', 'menu_class' => 'inline clearfix', 'container' => '' ) ); ?>
	</nav><!--/end nav-->
</header><!--/end .header-->

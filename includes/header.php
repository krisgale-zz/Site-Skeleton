<!doctype html>
<head>
<meta charset="utf-8">
<title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $description; ?>">
<meta name="keywords" content="<?php echo $keywords; ?>">
<meta name="viewport" content="width=device-width,initial-scale=1">

<!--START OPEN GRAPH FOR FACEBOOK-->
<meta property="og:title" content="The Rock"/>
<meta property="og:type" content="movie"/>
<meta property="og:url" content="http://www.imdb.com/title/tt0117500/"/>
<meta property="og:image" content="http://ia.media-imdb.com/rock.jpg"/>
<meta property="og:site_name" content="IMDb"/>
<meta property="og:description"
	content="A group of U.S. Marines, under command of
		    a renegade general, take over Alcatraz and
		    threaten San Francisco Bay with biological
		    weapons."/>
<!--END OPEN GRAPH FOR FACEBOOK-->

<link rel="shortcut icon" href="images/ui/favicon.ico">
<link rel="stylesheet" href="css/style.css">
<link href="blog/feed/" type="application/rss+xml" rel="alternate" title="Site Name's RSS Feed">
<!--[if IE]>
	<link rel="stylesheet" href="css/ie.css" media="screen">
<![endif]-->

<script src="js/modernizr-2.0.6.min.js"></script>

<!--START CUFON
<script src="js/cufon-yui.js"></script>
<script src="js/Minion.font.js"></script>
<script src="js/cufon.controls.js"></script>
END CUFON-->

<!--START MOOTOOLS-->
<script src="https://ajax.googleapis.com/ajax/libs/mootools/1.3.2/mootools-yui-compressed.js"></script>
<?php if ($activePage == "home") { ?>
<?php } ?>

<?php if ($lightbox) { ?>
<?php } ?>
<!--END MOOTOOLS-->

<!--START JQUERY-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<script src="js/superfish.js"></script>
<script src="js/superfish.controls.js"></script>

<?php if ($activePage == "home") { ?>
<script src="js/jquery.cycle.all.min.js"></script>
<script src="js/cycle.controls.js"></script>
<?php } ?>

<?php if ($lightbox) { ?>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/prettyPhotoController.js"></script>
<link rel="stylesheet" href="css/prettyPhoto.css" media="screen">
<?php } ?>
<!--END JQUERY-->


</head>
<body>
<div id="container">
	<header class="clearfix">
		<h1>Site Name</h1>
		<nav class="clearfix">
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">About</a>
					<ul>
						<li><a href="#">Sample About Link 1</a></li>
						<li><a href="#">Sample About Link 2</a></li>
						<li><a href="#">Sample About Link 3</a></li>
					</ul>
				</li>
				<li><a href="#">Services</a>
					<ul>
						<li><a href="#">Sample Service Link 1</a></li>
						<li><a href="#">Sample Service Link 2</a></li>
						<li><a href="#">Sample Service Link 3</a></li>
					</ul>
				</li>
				<li><a href="#">Contact</a></li>
			</ul>
		</nav><!--/end nav-->
	</header><!--/end header-->
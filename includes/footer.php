</div><!--/end container-->
<footer class="footer"><div class="wrapper">

	<nav>
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Services</a></li>
			<li><a href="#">Contact Us</a></li>
		</ul>
	</nav>
	
	<p>Copyright <?php echo date('Y'); ?>. All rights reserved. <a href="#">Sitemap</a>.</p>
	
</div></footer><!--/end .footer-->

<!--START CUFON
<script src="js/cufon-yui.js"></script>
<script src="js/Minion.font.js"></script>
<script src="js/cufon.controls.js"></script>
<script src="js/cufon.now.js"></script>
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

</body>
</html>
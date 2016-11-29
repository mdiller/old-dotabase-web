<!DOCTYPE html>

<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
	<title>
		<?php if(defined("TITLE")) { echo TITLE . " - "; } ?>
		Dotabase
	</title>
	<?php 
	if(defined("FAVICON")) { 
		echo "<link rel='shortcut icon' href='" . FAVICON . "' type='image/png'>"; 
	} else {
		echo "<link rel='shortcut icon' href='" . SITE_URL . "/resources/images/dota.png" . "' type='image/png'>"; 
	}
	?>

	<link rel="apple-touch-icon-precomposed apple-touch-icon icon" href="<?php echo SITE_URL ?>/resources/images/dota.png">

	<!-- Theme color -->
	<meta name="theme-color" content="#121717">
	<meta name="msapplication-navbutton-color" content="#121717">
	<meta name="apple-mobile-web-app-status-bar-style" content="#121717">

	<!-- Opengraph Metadata -->
	<meta property="og:title" content="Dotabase" />
	<meta property="og:description" content="A collection of information about the game Dota 2" />
	<meta property="og:type" content="image" />
	<meta property="og:image" content="<?php echo SITE_URL ?>/resources/images/dota.png" />
	<meta property="og:image:type" content="image/png" />
	<meta property="og:image:width" content="128" />
	<meta property="og:image:height" content="128" />
</head>

<body>
	<div id="bodydiv">
		<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href=<?php echo SITE_URL ?>>
					</a>
					<img class="topbar" src="<?php echo VPK_PATH; ?>/panorama/images/topbar/topbar_png.png">
					<div class="topbar"></div>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li>
							<a href=<?php echo SITE_URL . "/responses" ?>>Responses</a>
						</li>
						<li>
							<a href=<?php echo SITE_URL . "/heroes/statstable" ?>>Hero Stats Table</a>
						</li>
						<li>
							<a href=<?php echo SITE_URL . "/heroes" ?>>Heroes</a>
						</li>
						<li>
							<a href=<?php echo SITE_URL . "/dota-vpk" ?>>VPK files</a>
						</li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container -->
		</nav>

		<!-- Page Content -->
		<div class="container">
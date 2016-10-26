<!DOCTYPE html>

<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
	<title>Dotabase</title>
</head>

<body>

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
					 <img src="<?php echo VPK_PATH; ?>/panorama/images/topbar/home_logo_hover_png.png">
				</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li>
						<a href=<?php echo SITE_URL . "/responses" ?>>Hero Responses</a>
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
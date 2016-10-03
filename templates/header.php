<!DOCTYPE html>

<?php $siteurl = "http://" . $_SERVER['SERVER_NAME']; ?>

<?php $sitedir = __DIR__ . "/.."; ?>

<html lang="en">

<head>
	<title>Dotabase</title>

	<?php include $sitedir . "/templates/link_includes.php"; ?>

</head>

<body>

	<!-- Navigation -->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href=<?php echo $siteurl ?>>Dotabase</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li>
						<a href=<?php echo $siteurl . "/responses" ?>>Hero Responses</a>
					</li>
					<li>
						<a href=<?php echo $siteurl . "/dota-vpk" ?>>VPK files</a>
					</li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>

	<!-- Page Content -->
	<div class="container">
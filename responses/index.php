<?php include "../templates/header.php";?>

<form id="search" action="index.php" method="get">
	<fieldset>
		<div class="input-group">
			<input type="text" name="text" placeholder="Search for text here">
			<button type="submit" class="btn btn-primary">
				<span class="glyphicon glyphicon-search">
			</button>
		</div>
	</fieldset>
</form>

<?php include "../templates/footer.php";?>
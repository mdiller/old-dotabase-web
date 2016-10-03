<?php 
$dotabase = new PDO("sqlite:c:\Development\Projects\dotabase\dotabase.db");

$keyphrase = @$_GET['keyphrase']?: '';

$result = $dotabase->query("SELECT * FROM responses WHERE text LIKE '%" . $keyphrase . "%' LIMIT 100");

include "../templates/header.php";
?>

<form id="search" action="index.php" method="get">
	<fieldset>
		<div class="input-group">
			<input type="text" 
				name="keyphrase" 
				class="form-control" 
				placeholder="Search for a key phrase here"
				value=<?php echo $keyphrase ?>>
			<div class="input-group-btn">
				<button type="submit" class="btn btn-primary">
					<span class="glyphicon glyphicon-search">
				</button>
			</span>
		</div>
	</fieldset>
</form>

<?php 
foreach($result as $response)
{
	include "response.php";
}

include "../templates/footer.php";
?>
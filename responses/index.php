<?php 
include "../templates/dotabasepath.php"
$dotabase = new PDO("sqlite:" + $dotabasepath);

$keyphrase = @$_GET['keyphrase']?: '';

$result = $dotabase->query("
SELECT r.text, r.mp3, r.name, h.icon AS heroicon
FROM responses as r 
JOIN heroes as h ON r.hero_id=h.id 
WHERE text LIKE '%" . $keyphrase . "%' 
ORDER BY LENGTH(r.text) DESC 
LIMIT 100");

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
<script>
	// For discord copy buttons
	new Clipboard('.btn');
</script>
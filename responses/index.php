<?php
include "../resources/base.php";
$dotabase = new PDO("sqlite:" . $dotabasepath);

$keyphrase = get_get('keyphrase', '');
$hero = get_get('hero', '');
$concept = get_get('concept', '');
$sortby = get_get('sortby', 'text');
$sortdir = get_get('sortdir', false, 'bool');

if($sortby == "text") { $sortdir = !$sortdir; }

$sortby_dict = array(
	"text" => "LENGTH(r.text)",
	"rand" => "RANDOM()",
	"crit" => "responserule_name",
	"resp" => "r.name",
);
if($keyphrase != "")
	$keyphrase = " " . strtolower(preg_replace("/[^a-z0-9A-Z\s]/", "", $keyphrase)) . " ";

$sortby = $sortby_dict[$sortby];
$sortdir = $sortdir ? "DESC" : "ASC";
$keyphrase = "%" . $keyphrase . "%";
$concept = "%_" . $concept . "%";

$statement = $dotabase->prepare("
SELECT DISTINCT r.text, r.mp3, r.name, h.icon AS heroicon
FROM responses as r 
LEFT JOIN responsegroupings as g ON r.fullname=g.response_fullname
JOIN heroes as h ON r.hero_id=h.id 
WHERE text_simple LIKE ? 
AND text != '' 
AND h.name LIKE ? 
AND responserule_name LIKE ? 
ORDER BY " . $sortby . " " . $sortdir ." 
LIMIT 100");
$statement->execute(array($keyphrase, $hero, $concept));
$responses = $statement->fetchAll();

$herolist = $dotabase->query("SELECT localized_name, name from heroes ORDER BY localized_name");
$conceptlist = $dotabase->query("SELECT name FROM criteria WHERE matchkey='Concept' ORDER BY name");

include HEADER;
?>

<form id="search" action="index.php" method="get">
	<fieldset>
		<input name="keyphrase" 
			type="text" 
			class="form-control" 
			placeholder="Search for a key phrase here"
			<?php echo form_value("keyphrase", "text"); ?> >
		<select name="hero" class="form-control">
			<option value="">Any Heroes</option>
			<?php
			foreach($herolist as $hero)
				echo "<option " . form_value("hero", "select", $hero['name']) . ">" . $hero['localized_name'] . "</option>";
			?>
		</select>
		<select name="concept" class="form-control">
			<option value="">Any Concept</option>
			<?php
			foreach($conceptlist as $concept)
				echo "<option" . form_value("concept", "select", $concept['name']) . ">" . $concept['name'] . "</option>";
			?>
		</select>
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Sort By:</span>
			<select name="sortby" class="form-control">
				<option <?php echo form_value("sortby", "select", "text"); ?>>Text Length</option>
				<option <?php echo form_value("sortby", "select", "crit"); ?>>Criteria</option>
				<option <?php echo form_value("sortby", "select", "rand"); ?>>Random</option>
				<option <?php echo form_value("sortby", "select", "resp"); ?>>Response Name</option>
			</select>
			<span class="input-group-addon">
				<input id="sortdir" name="sortdir" type="checkbox" <?php echo form_value("sortdir", "checkbox"); ?>>
				<label for="sortdir"></label>
			</span>
		</div>
		<button type="submit" class="btn btn-primary">
			<span class="glyphicon glyphicon-search"></span>
			Search
		</button>
	</fieldset>
</form>

<?php 
foreach($responses as $response)
{
	include "response.php";
}

include FOOTER;
?>
<script>
	// For discord copy buttons
	new Clipboard('.btn');
</script>
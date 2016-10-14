<?php
include "../resources/base.php";
$dotabase = new PDO("sqlite:" . $dotabasepath);

$keyphrase = @$_GET['keyphrase']?: '';
$hero = @$_GET['hero']?: '';
$concept = @$_GET['concept']?: '';
$sortby = @$_GET['sortby']?: "text";
$sortdir = @$_GET['sortdir']?: "DESC";

$sortby_dict = array(
	"text" => "LENGTH(r.text)",
	"rand" => "RANDOM()",
	"crit" => "[group]",
);
$sortby = $sortby_dict[$sortby];

$responses = $dotabase->query("
SELECT DISTINCT r.text, r.mp3, r.name, h.icon AS heroicon, g.responserule_name as [group]
FROM responses as r 
LEFT JOIN responsegroupings as g ON r.fullname=g.response_fullname
JOIN heroes as h ON r.hero_id=h.id 
WHERE text LIKE '%" . $keyphrase ."%' 
AND text!='' 
AND h.name LIKE '%" . $hero . "%'
AND responserule_name LIKE '%_" . $concept . "%'
ORDER BY " . $sortby . " " . $sortdir ." 
LIMIT 100");

$herolist = $dotabase->query("SELECT localized_name, name from heroes");
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
			</select>
			<span class="input-group-addon">
				<input id="sortdir" name="sortdir" type="checkbox" value="ASC" <?php echo form_value("sortdir", "checkbox"); ?>>
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
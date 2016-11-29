<?php
include "../resources/base.php";

define("TITLE", "Responses");

$dotabase = init_dotabase();

$keyphrase = get_get('keyphrase', '');
$hero = get_get('hero', '');
$concept = get_get('concept', '');
$sortby = get_get('sortby', '');
$sortdir = get_get('sortdir', false, 'bool');

if($sortby == "") { $sortdir = !$sortdir; }

$sortby_dict = array(
	"" => "LENGTH(r.text)",
	"rand" => "RANDOM()",
	"crit" => "responserule_name",
	"resp" => "r.name",
);
if($keyphrase != "")
	$keyphrase = " " . strtolower(preg_replace("/[^a-z0-9A-Z\s]/", "", $keyphrase)) . " ";

$sortby = $sortby_dict[$sortby];
$sortdir = $sortdir ? "DESC" : "ASC";
$keyphrase = "%" . $keyphrase . "%";
$hero = "%" . $hero . "%";
$concept = ($concept == "") ? "%" : $concept . " %";

$statement = $dotabase->prepare("
SELECT DISTINCT r.text, r.mp3, r.name, h.icon AS heroicon
FROM responses as r 
JOIN heroes as h ON r.hero_id=h.id 
WHERE text_simple LIKE ? 
AND text != '' 
AND h.name LIKE ? 
AND (r.criteria LIKE ? OR r.criteria LIKE ?)
ORDER BY " . $sortby . " " . $sortdir ." 
LIMIT 500");
$statement->execute(array($keyphrase, $hero, $concept, "|" . $concept));
$responses = $statement->fetchAll();

$herolist = $dotabase->query("SELECT localized_name, name from heroes ORDER BY localized_name");
$conceptlist = $dotabase->query("SELECT name FROM criteria WHERE matchkey='Concept' ORDER BY name");

include HEADER;
?>

<form id="search" method="get">
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
				<option <?php echo form_value("sortby", "select", ""); ?>>Text Length</option>
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

if(empty($responses))
{
	echo "<div style='text-align: center;''>";
	echo "no responses found";
	echo "</div>";
}

include FOOTER;
?>
<script>
	// For discord copy buttons
	new Clipboard('.btn');
	$('form#search').submit(function(e){
		var emptyinputs = $(this).find('select').filter(function(){
		return !$.trim(this.value).length;  
		}).prop('disabled',true);    

		var emptyinputs = $(this).find('input').filter(function(){
		return !$.trim(this.value).length;  
		}).prop('disabled',true);    
	});

	// For custom audio elements
	var pause_path = "M0,0 L33.33,0 33.33,100 0,100  M66.66,0 L100,0 100,100 66.66,100";
	var play_path =  "M50,25 L100,50 100,50 50,75 M0,0 L50,25 50,75 0,100";

	function animateAudio(speaker, isnowplaying) {
		speaker.find("svg").find("animate").attr({
			"from": isnowplaying ? pause_path : play_path,
			"to": isnowplaying ? play_path : pause_path
		}).get(0).beginElement();
	}

	$('.speaker').on('click touchend', function() {
		var getaudio = $(this).find('audio')[0];
		animateAudio($(this), !getaudio.paused);

		if (getaudio.paused) {
			getaudio.play();
		} else {
			getaudio.pause();
		}
	});

	$('.speaker > audio').on('ended', function() {
		animateAudio($(this).parent(), true);
	});
</script>
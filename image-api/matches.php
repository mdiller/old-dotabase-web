<!DOCTYPE html>
<?php
include "../resources/base.php";

function get(&$var, $default=null) {
	return isset($var) ? $var : $default;
}

$dotabase = init_dotabase();
$heroes = $dotabase->query("SELECT * from heroes ORDER BY localized_name");
$hero_imgs = array();
foreach($heroes as $hero){
	$hero_imgs[$hero['id']] = VPK_PATH . $hero['image'];
}

$match_id = $_GET['match'];

$response = @file_get_contents("http://api.opendota.com/api/matches/" . $match_id);

if($response == false){
	echo "Could not find match with id = " . $match_id;
	die(0);
}

$match = json_decode($response, true);

?>
<html>
<body>

<table class="match-table">
	<thead>
		<th>Player</th>
		<th>K</th>
		<th>D</th>
		<th>A</th>
		<th class="money-row">GPM</th>
		<th>Hero DMG</th>
	</thead>
	<tbody>
		<?php 
		foreach($match['players'] as $player)
		{
			include "match_player.php"; 
		}
		?>
	</tbody>
</table>

</body>
</html>

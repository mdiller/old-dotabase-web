<!DOCTYPE html>
<?php
include "../resources/base.php";

$dotabase = init_dotabase();
$heroes = $dotabase->query("SELECT * from heroes ORDER BY localized_name");
$hero_imgs = array();
foreach($heroes as $hero){
	$hero_imgs[$hero['id']] = VPK_PATH . $hero['image'];
}
$items = $dotabase->query("SELECT * from items ORDER BY localized_name");
$item_imgs = array();
foreach($items as $item){
	$item_imgs[$item['id']] = VPK_PATH . $item['icon'];
}

function get(&$var, $default=null) {
	return isset($var) ? $var : $default;
}

function get_lane($player) {
	$lane_dict = array( 1 => "Bot", 3 => "Top" );
	$lane_role_dict = array( 1 => "Safe", 2 => "Mid", 3 => "Off", 4 => "Jungle" );
	if (isset($lane_dict[$player['lane']])) {
		return sprintf("%s(%s)", $lane_role_dict[$player['lane_role']], $lane_dict[$player['lane']]);
	}
	else {
		return $lane_role_dict[$player['lane_role']];
	}
}
function print_items($player, $item_imgs) {
	for($i = 0; $i < 6; $i++) {
		$item_id = get($player['item_' . $i]);
		if($item_id != 0) {
			echo "<img src='" . $item_imgs[$item_id] . "'>";
		}
	}
}

$match_id = $_GET['match'];

$response = @file_get_contents("http://api.opendota.com/api/matches/" . $match_id);

if($response == false){
	echo "Could not find match with id = " . $match_id;
	die(0);
}

$match = json_decode($response, true);

$is_parsed = get($match['radiant_gold_adv']) != null

?>
<html>
<body>

<div class="match-title">
<?php 
if($match['radiant_win']) {
	include RESOURCES . "/images/radiant.svg"; 
	echo "&nbspRadiant Victory";
}
else {
	include RESOURCES . "/images/dire.svg"; 
	echo "&nbspDire Victory";
}
?>
</div>
<table class="match-table">
	<thead>
		<th>Player</th>
		<th>K</th>
		<th>D</th>
		<th>A</th>
		<th class="money-row">GPM</th>
		<?php if($is_parsed){ ?>
		<th>APM</th>
		<th>Lane</th>
		<th>Pings</th>
		<?php } ?>
		<th>Items</th>
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

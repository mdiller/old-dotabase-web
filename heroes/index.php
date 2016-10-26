<?php
include "../resources/base.php";

$dotabase = new PDO("sqlite:" . DOTABASE_PATH . "/dotabase.db");

$attr_icon_dict = array(
	"DOTA_ATTRIBUTE_STRENGTH" => (VPK_PATH . "/resource/flash3/images/heroes/selection/pip_str.png"),
	"DOTA_ATTRIBUTE_INTELLECT" => (VPK_PATH . "/resource/flash3/images/heroes/selection/pip_int.png"),
	"DOTA_ATTRIBUTE_AGILITY" => (VPK_PATH . "/resource/flash3/images/heroes/selection/pip_agi.png"),
);

include HEADER;

if(!isset($_GET['hero'])) {
	$heroes = $dotabase->query("SELECT * from heroes ORDER BY localized_name");
	echo "<form id='heroes' method='get' action='.'>";
	foreach($heroes as $hero)
	{
		include "herocard.php";
	}
	echo "</form>";
}
else {
	$statement = $dotabase->prepare("SELECT * from heroes WHERE name = ?");
	$statement->execute(array($_GET['hero']));
	$hero = $statement->fetch();
	
	include "heroprofile.php";
}
include FOOTER;
?>
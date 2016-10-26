<?php
include "../resources/base.php";

$dotabase = init_dotabase();

if(!isset($_GET['hero'])) {
	$heroes = $dotabase->query("SELECT * from heroes ORDER BY localized_name");
	define("TITLE", "Heroes");

	include HEADER;
	foreach($heroes as $hero)
	{
		include "herocard.php";
	}
	include FOOTER;
}
else {
	$statement = $dotabase->prepare("SELECT * from heroes WHERE name = ?");
	$statement->execute(array($_GET['hero']));
	$hero = $statement->fetch();
	
	define("FAVICON", VPK_PATH . $hero['icon']);
	define("TITLE", $hero['localized_name']);


	include HEADER;
	include "heroprofile.php";
	include FOOTER;
}
?>
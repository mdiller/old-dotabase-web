<?php
include "../resources/base.php";

$dotabase = init_dotabase();

if(!isset($_GET['ability'])) {
	$abilities = $dotabase->query("SELECT * from abilities ORDER BY id");
	define("TITLE", "Abilities");

	include HEADER;
	foreach($abilities as $ability)
	{
		include "abilitycard.php";
	}
	include FOOTER;
}
else {
	$statement = $dotabase->prepare("SELECT * from abilities WHERE name = ?");
	$statement->execute(array($_GET['ability']));
	$ability = $statement->fetch();
	
	define("TITLE", $ability['localized_name']);


	include HEADER;
	include "abilityprofile.php";
	include FOOTER;
}
?>
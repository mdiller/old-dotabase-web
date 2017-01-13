<?php
# Handles all of the cards / profile displays 

include "../base.php";

$type = $_GET['type'];

$cardtypes = json_decode(file_get_contents("cardtypes.json"), true);

if(!array_key_exists($type, $cardtypes))
{
	echo $type;
	echo "404 key not found";
	die(1);
}

$cardinfo = $cardtypes[$type];

$dotabase = init_dotabase();

if((!isset($_GET['key'])) or $_GET['key'] == "") {
	$items = $dotabase->query($cardinfo['query']);
	define("TITLE", $cardinfo['title']);

	include HEADER;
	foreach($items as $item){ ?>
<div class="itemcard">
	<a href="<?php echo SITE_URL . '/' . $type . '/' . $item[$cardinfo['key']]; ?>">
		<img src='<?php echo VPK_PATH . $item[$cardinfo['card_img']]; ?>' alt="Thumbnail">
	</a>
</div><?php } ?>
<style>
#bodydiv > div.container { padding-bottom: 10px; }

div.itemcard a img {
	width: <?php echo $cardinfo['card_width']; ?>px; /* 71 53 */
	height: <?php echo $cardinfo['card_height']; ?>px; /* 94 70 */
}
</style>
<?php
	include FOOTER;
}
else {
	$statement = $dotabase->prepare("SELECT * from " . $cardinfo['table'] . " WHERE " . $cardinfo['key'] . " = ?");
	$statement->execute(array($_GET['key']));
	$item = $statement->fetch();

	if($item == null)
	{
		echo "404 item not found";
		die(1);
	}

	if(array_key_exists("profile_icon", $cardinfo)){
		define("FAVICON", VPK_PATH . $item[$cardinfo['profile_icon']]);
	}
	if(array_key_exists("profile_title", $cardinfo)){
		define("TITLE", $item[$cardinfo['profile_title']]);
	}
	include HEADER;
	echo "<div class='profile'>";
	include $cardinfo['profile'];
	echo "</div>";
	include FOOTER;
}
?>
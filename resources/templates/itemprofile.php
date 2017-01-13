<?php $item = $item; ?>

<div class="row">
	<img src='<?php echo VPK_PATH . $item['icon']; ?>' alt='item icon'> 
	<h1><?php echo $item['localized_name']; ?></h1>
</div>
<div class="row">
	<img src='<?php echo VPK_PATH . "/panorama/images/hud/reborn/gold_small_psd.png"; ?>' alt='gold' width="24" height="24">
	<?php echo $item['cost']; ?>
</div>
<?php
if($item['lore'] != "") {
	echo "<h3>Lore</h3>";
	echo "<div class='row'>";
	echo $item['lore'];
	echo "</div>";
}
if($item['description'] != "") {
	echo "<h3>Description</h3>";
	echo "<div class='row'>";
	echo $item['description'];
	echo "</div>";
}
?>
<h2>JSON Data</h2>
<div id="json_data" value=""></div>


<script type="text/javascript" src="<?php echo JS_URL; ?>renderjson.js"></script>
<script>
	renderjson.set_icons('▶', '▼');
	renderjson.set_show_to_level(1);
	document.getElementById("json_data").appendChild(
        renderjson(<?php echo $item['json_data'] ?>)
    );
</script>
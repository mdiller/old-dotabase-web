<?php $ability = $item; ?>

<div class="row">
	<img src='<?php echo VPK_PATH . $ability['icon']; ?>' alt='ability icon'> 
	<h1><?php echo $ability['localized_name']; ?></h1>
</div>
<?php
if($ability['lore'] != "") {
	echo "<h3>Lore</h3>";
	echo "<div class='row'>";
	echo $ability['lore'];
	echo "</div>";
}
if($ability['description'] != "") {
	echo "<h3>Description</h3>";
	echo "<div class='row'>";
	echo $ability['description'];
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
        renderjson(<?php echo $ability['json_data'] ?>)
    );
</script>
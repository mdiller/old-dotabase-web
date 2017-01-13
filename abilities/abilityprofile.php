<div class="row">
	<img src='<?php echo VPK_PATH . $ability['icon']; ?>' alt='ability icon'> 
	<h1><?php echo $ability['localized_name']; ?></h1>
</div>
<h3>Description</h3>
<div class="row">
	<?php echo $ability['description']; ?>
</div>
<h3>Lore</h3>
<div class="row">
	<?php echo $ability['lore']; ?>
</div>
<h2>JSON Data</h2>
<div id="json_data" value=""></div>


<script type="text/javascript" src="<?php echo JS_URL; ?>renderjson.js"></script>
<script>
	renderjson.set_icons('▶', '▼');
	document.getElementById("json_data").appendChild(
        renderjson(<?php echo $ability['json_data'] ?>)
    );
</script>
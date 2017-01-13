<?php $hero = $item; ?>

<div class="row">
	<img src='<?php echo VPK_PATH . $hero['image']; ?>' alt='hero image'> 
	<h1><?php echo $hero['localized_name']; ?></h1>
</div>
<div class="row">
	<div>
		<img class="attricon" src='<?php echo attr_icon('DOTA_ATTRIBUTE_STRENGTH'); ?>' alt='strength' height='32'> 
		<?php echo $hero['attr_base_strength']; ?>
		+ <?php echo $hero['attr_strength_gain']; ?>
	</div>
	<div>
		<img class="attricon" src='<?php echo attr_icon('DOTA_ATTRIBUTE_INTELLECT'); ?>' alt='intelligence' height='32'> 
		<?php echo $hero['attr_base_intelligence']; ?>
		+ <?php echo $hero['attr_intelligence_gain']; ?>
	</div>
	<div>
		<img class="attricon" src='<?php echo attr_icon('DOTA_ATTRIBUTE_AGILITY'); ?>' alt='agility' height='32'> 
		<?php echo $hero['attr_base_agility']; ?>
		+ <?php echo $hero['attr_agility_gain']; ?>
	</div>
</div>
<h2>Biography</h2>
<div class="row">
	<?php echo $hero['bio']; ?>
</div>
<h2>JSON Data</h2>
<div id="json_data" value=""></div>

<script type="text/javascript" src="<?php echo JS_URL; ?>renderjson.js"></script>
<script>
	renderjson.set_icons('▶', '▼');
	renderjson.set_show_to_level(1);
	document.getElementById("json_data").appendChild(
        renderjson(<?php echo $hero['json_data'] ?>)
    );
</script>
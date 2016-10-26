<link rel="shortcut icon" href='<?php echo VPK_PATH . $hero['icon']; ?>' type="image/png">

<div class="row">
	<img src='<?php echo VPK_PATH . $hero['image']; ?>' alt='hero image'> 
	<h1><?php echo $hero['localized_name']; ?></h1>
</div>
<div class="row">
	<div>
		<img class="attricon" src='<?php echo $attr_icon_dict['DOTA_ATTRIBUTE_STRENGTH']; ?>' alt='strength' height='32'> 
		<?php echo $hero['attr_base_strength']; ?>
		+ <?php echo $hero['attr_strength_gain']; ?>
	</div>
	<div>
		<img class="attricon" src='<?php echo $attr_icon_dict['DOTA_ATTRIBUTE_INTELLECT']; ?>' alt='intelligence' height='32'> 
		<?php echo $hero['attr_base_intelligence']; ?>
		+ <?php echo $hero['attr_intelligence_gain']; ?>
	</div>
	<div>
		<img class="attricon" src='<?php echo $attr_icon_dict['DOTA_ATTRIBUTE_AGILITY']; ?>' alt='agility' height='32'> 
		<?php echo $hero['attr_base_agility']; ?>
		+ <?php echo $hero['attr_agility_gain']; ?>
	</div>
</div>
<h2>Biography</h2>
<div class="row">
	<?php echo $hero['bio']; ?>
</div>

<style type="text/css">
	h1 {
		display: inline-block;
		margin: 10px;
	}
	div.row {
		padding: 5px;
	}
</style>
<tr>
	<td>
		<div style="white-space:nowrap" align='left'>
			<img src='<?php echo VPK_PATH . $hero['icon']; ?>' alt='hero icon' height='24'> 
			<?php echo $hero['localized_name']; ?>
		</div>
	</td>
	<td data-value="<?php echo $hero['attr_primary']; ?>">
		<img src='<?php echo $attr_icon_dict[$hero['attr_primary']]; ?>' alt='primary attribute' height='24'>
	</td>
	<td><?php echo $hero['attr_base_strength']; ?></td>
	<td><?php echo $hero['attr_strength_gain']; ?></td>
	<td><?php echo $hero['attr_base_intelligence']; ?></td>
	<td><?php echo $hero['attr_intelligence_gain']; ?></td>
	<td><?php echo $hero['attr_base_agility']; ?></td>
	<td><?php echo $hero['attr_agility_gain']; ?></td>
	<td><?php echo $hero['base_health_regen']; ?></td>
	<td><?php echo $hero['base_armor']; ?></td>
	<td><?php echo $hero['base_movement']; ?></td>
	<td><?php echo $hero['turn_rate']; ?></td>
	<td><?php echo $hero['attack_range']; ?></td>
	<td><?php echo $hero['attack_projectile_speed']; ?></td>
	<td><?php echo $hero['attack_damage_min']; ?></td>
	<td><?php echo $hero['attack_damage_max']; ?></td>
	<td><?php echo $hero['attack_point']; ?></td>
	<td><?php echo $hero['attack_rate']; ?></td>
</tr>
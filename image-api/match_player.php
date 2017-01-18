<tr>
	<td>
		<img src='<?php echo $hero_imgs[$player['hero_id']]; ?>' alt='hero image' height="24">
		<?php echo get($player['personaname'], 'Anonymous'); ?>
	</td>
	<td><?php echo $player['kills']; ?></td>
	<td><?php echo $player['deaths']; ?></td>
	<td><?php echo $player['assists']; ?></td>
	<td class="money-row"><?php echo $player['gold_per_min']; ?></td>
	<td><?php echo $player['hero_damage']; ?></td>
</tr>
<tr>
	<td>
		<img src='<?php echo $hero_imgs[$player['hero_id']]; ?>' alt='hero image'>
		<?php echo get($player['personaname'], 'Anonymous'); ?>
	</td>
	<td><?php echo $player['kills']; ?></td>
	<td><?php echo $player['deaths']; ?></td>
	<td><?php echo $player['assists']; ?></td>
	<td class="money-row"><?php echo $player['gold_per_min']; ?></td>
	<?php if($is_parsed){ ?>
	<td><?php echo $player['actions_per_min']; ?></td>
	<td><?php echo get_lane($player); ?></td>
	<td><?php echo get($player['pings'], "-"); ?></td>
	<?php } ?>
	<td class="items"><?php print_items($player, $item_imgs); ?></td>
</tr>
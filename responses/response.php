<div class="response">
	<div class="soundtitle">
		<img src='<?php echo $vpkpath . $response['heroicon'] ?>'>
		<?php echo $response['name'] . "<br>" ?>
	</div>
	<?php echo $response['text'] . "<br>" ?>
	<div class="soundbar">
		<audio controls> <source src='<?php echo $vpkpath . $response['mp3'] ?>' type='audio/mpeg'> </audio>
		<button class='btn' data-clipboard-text='<?php echo "?dota " . $response['name'] ?>'>
			<img src='https://discordapp.com/assets/e05ead6e6ebc08df9291738d0aa6986d.png' title='Copy for use in mangobyte'>
		</button>
	</div>
<!-- "<img src=\"" . $row['iconlink'] . "\" alt=\"" . $row['name'] . "\">"; -->

</div>
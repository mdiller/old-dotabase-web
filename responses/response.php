<div class="response">
	<div class="soundtitle">
		<div class="speaker">
			<svg viewBox="0 0 100 100">
				<path d="M0,0 L100,50 0,100 Z">
					<animate attributeName="d" dur="200ms" fill="freeze" begin="indefinite"></animate>
				</path>
			</svg>
			<audio src='<?php echo VPK_PATH . $response['mp3'] ?>' type='audio/mp3'></audio>
		</div>
		<div>
		<img src='<?php echo VPK_PATH . $response['heroicon'] ?>'>
		<?php echo $response['name'] ?>
		</div>
	</div>
	<div>
		<?php echo $response['text'] ?>
	</div>
	<!-- <div class="soundbar">
		<button class='btn' data-clipboard-text='<?php echo $response['name'] ?>'>
			<img src='https://discordapp.com/assets/e05ead6e6ebc08df9291738d0aa6986d.png' title='Copy for use in mangobyte'>
		</button>
	</div> -->

</div>
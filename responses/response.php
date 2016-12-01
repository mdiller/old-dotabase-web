<div class="response">
	<div class="soundtitle">
		<div>
			<div class="link-menu-list">
				<a class="circle-link copyclip" data-clipboard-text="?dota <?php echo $response['name'] ?>">
					<img src="<?php echo SITE_URL ?>/resources/images/discord.png"/>
				</a>
				<a class="circle-link" href="<?php echo VPK_PATH . $response['mp3'] ?>">
					<img src="<?php echo SITE_URL ?>/resources/images/link.png"/>
				</a>
				<a class="circle-link" href="<?php echo VPK_PATH . $response['mp3'] ?>" download>
					<img src="<?php echo SITE_URL ?>/resources/images/download.png"/>
				</a>
			</div>
			<div class="speaker">
				<svg viewBox="0 0 100 100">
					<path d="M0,0 L100,50 0,100 Z">
						<animate attributeName="d" dur="200ms" fill="freeze" begin="indefinite"></animate>
					</path>
				</svg>
				<audio src='<?php echo VPK_PATH . $response['mp3'] ?>' type='audio/mp3'></audio>
			</div>
		</div>
		<div>
			<img src='<?php echo VPK_PATH . $response['heroicon'] ?>'>
			<?php echo $response['name'] ?>
		</div>
	</div>
	<div>
		<?php echo $response['text'] ?>
	</div>
</div>
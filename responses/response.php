<div class="response">
	<div class="soundtitle">
		<span>
			<span class="link-menu-list">
				<a class="link-button copyclip" data-clipboard-text="?dota <?php echo $response['name'] ?>">
					<img src="<?php echo SITE_URL ?>/resources/images/discord.svg"/>
				</a>
				<a class="link-button" href="<?php echo VPK_PATH . $response['mp3'] ?>">
					<img src="<?php echo SITE_URL ?>/resources/images/link.svg"/>
				</a>
				<a class="link-button" href="<?php echo VPK_PATH . $response['mp3'] ?>" download>
					<img src="<?php echo SITE_URL ?>/resources/images/download.svg"/>
				</a>
			</span>
			<span class="speaker">
				<svg viewBox="0 0 100 100">
					<path d="M0,0 L100,50 0,100 Z">
						<animate attributeName="d" dur="200ms" fill="freeze" begin="indefinite"></animate>
					</path>
				</svg>
				<audio src='<?php echo VPK_PATH . $response['mp3'] ?>' type='audio/mp3'></audio>
			</span>
		</span>
		<span>
			<img src='<?php echo VPK_PATH . $response['heroicon'] ?>'>
			<?php echo $response['name'] ?>
		</span>
	</div>
	<div>
		<?php echo $response['text'] ?>
	</div>
</div>
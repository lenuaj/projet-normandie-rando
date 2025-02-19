<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="sidebox" id="direct-feedback">
	<div id="feedback-choice">
		<h3><?php _e( 'Are you happy with Admin Columns?', 'lenuaj-admin-columns' ); ?></h3>

		<div class="inside">
			<a href="#" class="yes"><?php _e( 'Yes' ); ?></a>
			<a href="#" class="no"><?php _e( 'No' ); ?></a>
		</div>
	</div>
	<div id="feedback-support">
		<div class="inside">
			<p>
				<?php _e( "What's wrong? Need help? Let us know!", 'lenuaj-admin-columns' ); ?>
			</p>
			<p>
				<?php _e( 'Check out our extensive documentation, or you can open a support topic on WordPress.org!', 'lenuaj-admin-columns' ); ?>
			</p>
			<ul class="share">
				<li>
					<a href="<?= esc_url( $this->documentation_url ); ?>" target="_blank">
						<div class="dashicons dashicons-editor-help"></div> <?php _e( 'Docs', 'lenuaj-admin-columns' ); ?>
					</a>
				</li>
				<li>
					<a href="https://wordpress.org/support/plugin/lenuaj-admin-columns" target="_blank">
						<div class="dashicons dashicons-wordpress"></div> <?php _e( 'Forums', 'lenuaj-admin-columns' ); ?>
					</a>
				</li>
			</ul>
			<div class="clear"></div>
		</div>
	</div>
	<div id="feedback-rate">
		<div class="inside">
			<p>
				<?php _e( "Woohoo! We're glad to hear that!", 'lenuaj-admin-columns' ); ?>
			</p>
			<p>
				<?php _e( 'We would really love it if you could show your appreciation by giving us a rating on WordPress.org or tweet about Admin Columns!', 'lenuaj-admin-columns' ); ?>
			</p>
			<ul class="share">
				<li>
					<a href="<?= esc_url( $this->review_url ) ?>" target="_blank">
						<div class="dashicons dashicons-star-empty"></div> <?php _e( 'Rate', 'lenuaj-admin-columns' ); ?>
					</a>
				</li>

				<li>
					<a href="<?= esc_url( $this->tweet_url ) ?>" target="_blank">
						<div class="dashicons dashicons-twitter"></div> <?php _e( 'Tweet', 'lenuaj-admin-columns' ); ?>
					</a>
				</li>

				<li>
					<a href="<?= esc_url( $this->upgrade_url ); ?>" target="_blank">
						<div class="dashicons dashicons-cart"></div> <?php _e( 'Buy Pro', 'lenuaj-admin-columns' ); ?>
					</a>
				</li>
			</ul>
			<div class="clear"></div>
		</div>
	</div>
</div>
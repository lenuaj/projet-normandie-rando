<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="ac-modal -feedback" id="ac-modal-feedback">
	<div class="ac-modal__dialog -feedback">
		<form method="post" id="frm-ac-feedback">
			<div class="ac-modal__dialog__header">

				<?php _e( 'Leave your feedback', 'lenuaj-admin-columns' ); ?>

				<button class="ac-modal__dialog__close" data-dismiss="modal">
					<span class="dashicons dashicons-no"></span>
				</button>
			</div>
			<div class="ac-modal__dialog__content">
				<input name="_ajax_nonce" value="<?php echo esc_attr( $this->nonce ); ?>" type="hidden" readonly>

				<div class="field-group">
					<label for="frm_ac_fb_email"><?php _e( 'Your Email', 'lenuaj-admin-columns' ); ?></label>
					<input type="email" name="name" id="frm_ac_fb_email" required value="<?php echo esc_attr( $this->email ); ?>" autocomplete="off">
				</div>
				<div class="field-group">
					<label for="frm_ac_fb_feedback"><?php _e( 'Feedback', 'lenuaj-admin-columns' ); ?></label>
					<textarea name="feedback" id="frm_ac_fb_feedback" rows="6" autocomplete="off"></textarea>
				</div>
				<div class="ac-feedback__error"></div>
			</div>
			<div class="ac-modal__dialog__footer">
				<button type="submit" class="button-primary" value="send" name="frm_ac_fb_submit"><?php _e( 'Send feedback', 'lenuaj-admin-columns' ); ?></button>
			</div>
		</form>
	</div>
</div>
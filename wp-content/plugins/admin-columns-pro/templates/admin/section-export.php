<?php

use AC\Type\Url\Documentation;
use ACP\Nonce\ExportNonce;

?>
<div class="ac-tool-section -export">
	<h2 class="ac-lined-header"><?= __('Export', 'lenuaj-admin-columns') ?></h2>
	<p class="ac-section-description">
        <?= __('Select the columns settings you would like to export.', 'lenuaj-admin-columns'); ?>
        <?= __(
            'The result is a JSON file that can be imported in any WordPress install that uses Admin Columns Pro.',
            'lenuaj-admin-columns'
        ); ?>
	</p>

	<form method="post">
        <?= (new ExportNonce())->create_field() ?>

		<input type="hidden" name="action" value="acp-export">

        <?= $this->table->render() ?>

		<div style="display: flex;">
			<button class="button button-primary" data-export="json">
                <?php
                _e('Export selection to JSON', 'lenuaj-admin-columns'); ?>
			</button>
			<p class="php-export">
                <?= __('Looking for PHP Export?', 'lenuaj-admin-columns'); ?>
				<a target="_blank" href="<?= esc_url(
                    (new Documentation(Documentation::ARTICLE_LOCAL_STORAGE))->get_url()
                ); ?>">
                    <?= sprintf(
                        __('Read about its successor: %s', 'lenuaj-admin-columns'),
                        __('Local Storage', 'lenuaj-admin-columns')
                    ); ?>
				</a>
			</p>
		</div>
	</form>
</div>
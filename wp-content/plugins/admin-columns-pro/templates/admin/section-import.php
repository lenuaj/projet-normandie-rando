<?php

use ACP\Nonce\ImportFileNonce;

?>

<div class="ac-tool-section -import">
	<h2 class="ac-lined-header">
        <?= esc_html(__('Import', 'lenuaj-admin-columns')) ?>
	</h2>
	<p>
        <?= esc_html(
            __(
                'Select the Admin Columns JSON file you would like to import. When you click the import button below, Admin Columns will import the column settings.',
                'lenuaj-admin-columns'
            )
        ); ?>
	</p>
	<form method="post" action="" enctype="multipart/form-data" class="ac-import">
        <?= (new ImportFileNonce())->create_field() ?>
		<input type="hidden" name="action" value="acp-import-upload">
		<div class="ac-import__field">
			<label for=""><?= esc_html(__('Select File', 'lenuaj-admin-columns')) ?></label>
			<input type="file" size="25" name="import" id="upload" accept=".json">
		</div>

		<input type="submit" value="<?= __(
            'Import File',
            'lenuaj-admin-columns'
        ) ?>" class="button button-primary" name="file-submit">
	</form>

</div>
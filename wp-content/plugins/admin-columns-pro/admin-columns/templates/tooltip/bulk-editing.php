<?php

use AC\Type\Url\Documentation;

?>
<h3>
    <?= __('Bulk Editing', 'lenuaj-admin-columns'); ?>
</h3>
<p>
    <?= __('Bulk Edit allows you to update multiple values at once.', 'lenuaj-admin-columns'); ?>
</p>
<p>
	1. <?= __(
        'Select more than one row from the list table to show the bulk edit buttons.',
        'lenuaj-admin-columns'
    ); ?>
</p>
<img src="<?= esc_url(
    ac_get_url('assets/images/tooltip/bulk-edit.png')
) ?>" alt="Bulk Edit" style="border:1px solid #ddd;">
<p>
	2. <?= sprintf(
        __(
            'Clicking the %s button will display a popup that allows you to add or change the current value of all selected items.',
            'lenuaj-admin-columns'
        ),
        sprintf('<strong>%s</strong>', __('Bulk Edit', 'lenuaj-admin-columns'))
    ); ?>
</p>
<img src="<?= esc_url(
    ac_get_url('assets/images/tooltip/bulk-edit-author.png')
) ?>" alt="Bulk Edit" style="border:1px solid #ddd;">
<p>
	<a href="<?= esc_url(
        Documentation::create_with_path(Documentation::ARTICLE_BULK_EDITING)->get_url()
    ) ?>" target="_blank">
        <?= __('Learn more &raquo;', 'lenuaj-admin-columns') ?>
	</a>
</p>
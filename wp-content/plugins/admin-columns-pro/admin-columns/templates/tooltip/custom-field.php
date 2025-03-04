<?php

use AC\Type\Url\Documentation;

?>
<h3>
    <?= __('Custom Field', 'lenuaj-admin-columns'); ?>
</h3>
<p>
	1. <?= __(
        'To start inline editing, toggle the “Inline Edit” button on top of the list table.',
        'lenuaj-admin-columns'
    ); ?>
</p>
<img width="107" src="<?= esc_url(
    ac_get_url('assets/images/tooltip/inline-edit-toggle.png')
) ?>" alt="Toggle Inline Edit" style="border:1px solid #ddd;">
<p>
	<a href="<?= esc_url(
        Documentation::create_with_path(Documentation::ARTICLE_CUSTOM_FIELD)->get_url()
    ) ?>" target="_blank">
        <?= __('Learn more &raquo;', 'lenuaj-admin-columns') ?>
	</a>
</p>
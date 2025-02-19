<?php

use AC\Type\Url\Documentation;

?>
<h3>
    <?= __('Inline Editing', 'lenuaj-admin-columns') ?>
</h3>
<p>
    <?= sprintf(
        __(
            'With Inline Edit, you can update your content quick and easy, without having to open each %s one at the time.',
            'lenuaj-admin-columns'
        ),
        sprintf('"%s"', $this->object_type)
    ); ?>
</p>
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
	2. <?= __('Click on the pencil icon to start editing the value of a field.', 'lenuaj-admin-columns'); ?>
</p>
<img src="<?= esc_url(
    ac_get_url('assets/images/tooltip/inline-edit.png')
) ?>" alt="Usage of Inline Edit" width="213" style="border:1px solid #ddd;">
<p>
	3. <?= __(
        'It is possible to undo and redo all changes made with Inline Editing, so using it is without risk.',
        'lenuaj-admin-columns'
    ); ?>
</p>
<p>
	<a href="<?= esc_url(
        Documentation::create_with_path(Documentation::ARTICLE_INLINE_EDITING)->get_url()
    ); ?>" target="_blank">
        <?= __('Learn more &raquo;', 'lenuaj-admin-columns'); ?>
	</a>
</p>
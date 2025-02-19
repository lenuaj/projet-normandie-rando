<?php

use AC\Type\Url\Documentation;

?>
<h3>
    <?= __('Sorting', 'lenuaj-admin-columns') ?>
</h3>
<p>
    <?= __(
        'Sort by clicking the column header on the list table. Click the column header again to switch between <em>ascending</em> and <em>descending</em>.',
        'lenuaj-admin-columns'
    ); ?>
</p>
<img width="230" src="<?= esc_url(
    ac_get_url('assets/images/tooltip/sort-table.png')
) ?>" alt="Sort" style="border:1px solid #ddd;">
<p>
    <?= __('The sorted column is saved as your personal preference.', 'lenuaj-admin-columns'); ?>
    <?= __('When you come back the content is sorted just the way you left it.', 'lenuaj-admin-columns'); ?>
</p>
<p>
    <?= sprintf(
        __('Reset the sorting by clicking the %s button.', 'lenuaj-admin-columns'),
        sprintf('<strong>%s</strong>', __('Reset Sorting', 'lenuaj-admin-columns'))
    ); ?>
</p>
<img width="222" src="<?= esc_url(ac_get_url('assets/images/tooltip/reset-sorting.png')) ?>" alt="Reset Sorting">
<p>
    <?= __('You can change the default sorted column in the optional settings below.', 'lenuaj-admin-columns'); ?>
</p>
<p>
	<a href="<?= esc_url(
        Documentation::create_with_path(Documentation::ARTICLE_SORTING)->get_url()
    ); ?>" target="_blank">
        <?= __('Learn more &raquo;', 'lenuaj-admin-columns') ?>
	</a>
</p>

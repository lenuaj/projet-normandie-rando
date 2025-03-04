<?php

use AC\Type\Url\Documentation;

$url = (new Documentation(Documentation::ARTICLE_SHOW_ALL_SORTING_RESULTS))->get_url();

?>
<h3>
    <?= __('Sorting', 'lenuaj-admin-columns'); ?>
</h3>
<p>
    <?= __("By enabling this setting the sorting results will include empty values.", 'lenuaj-admin-columns') ?>
</p>
<img style="border:1px solid #ddd;" width="260" src="<?= esc_url(
    ac_get_url('assets/images/tooltip/sorting-include-empty.png')
) ?>" alt="Include empty values">
<p>
	<a href="<?= esc_url($url) ?>" target="_blank">
        <?= __('Read more &raquo;', 'lenuaj-admin-columns') ?>
	</a>
</p>
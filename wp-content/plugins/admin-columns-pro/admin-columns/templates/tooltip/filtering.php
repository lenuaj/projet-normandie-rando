<h3>
    <?= __('Filtering', 'lenuaj-admin-columns'); ?>
</h3>
<p>
    <?= __('This will allow the column to be filtered.', 'lenuaj-admin-columns'); ?>
    <?= __(
        'You can filter the contents by selecting the column value from the filter dropdown menu.',
        'lenuaj-admin-columns'
    ); ?>
</p>
<img src="<?= esc_url(ac_get_url('assets/images/tooltip/filter.png')) ?>" alt="Export" style="border:1px solid #ddd;">
<p><strong><?= __('Filters vs Smart Filters', 'lenuaj-admin-columns'); ?></strong></p>
<p class="notice notice-warning">
    <?= sprintf(
        __('We recommend using %s', 'lenuaj-admin-columns'),
        sprintf('<strong>%s</strong>', __('Smart Filters', 'lenuaj-admin-columns'))
    ); ?>
</p>
<p>
    <?= sprintf(
        __('%s is an improved version of %s.', 'lenuaj-admin-columns'),
        sprintf('<em>%s</em>', __('Smart Filtering', 'lenuaj-admin-columns')),
        sprintf('<em>%s</em>', __('Filtering', 'lenuaj-admin-columns'))
    ); ?>
    <?= sprintf(
        __(
            'Finding the right content will be much easier with the use of conditionals, such as %s.',
            'lenuaj-admin-columns'
        ),
        wp_sprintf('%l', ["contains", "between", "starts with"])
    ); ?>
</p>
<p>
    <?= sprintf(
        __(
            '%s also has better support for all the different types of fields, such as text, numbers and dates.',
            'lenuaj-admin-columns'
        ),
        sprintf('<em>%s</em>', __('Smart Filtering', 'lenuaj-admin-columns'))
    ); ?>
</p>
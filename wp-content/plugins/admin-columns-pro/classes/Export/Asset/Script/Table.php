<?php

namespace ACP\Export\Asset\Script;

use AC\Asset\Location;
use AC\Asset\Script;
use ACP\Export;

final class Table extends Script
{

    public const NONCE_ACTION = 'acp_export_listscreen_export';

    /**
     * @var Export\Strategy
     */
    private $strategy;

    /**
     * @var array [ $column_name => $column_label, ... ]
     */
    private $columns;

    private $show_button;

    public function __construct(
        string $handle,
        Location $location,
        Export\Strategy $strategy,
        array $columns,
        bool $show_button
    ) {
        parent::__construct($handle, $location, ['jquery']);

        $this->strategy = $strategy;
        $this->columns = $columns;
        $this->show_button = $show_button;
    }

    public function register(): void
    {
        parent::register();

        $this->add_inline_variable('acp_export', [
            'total_num_items' => $this->strategy->get_total_items() ?? 0,
            'num_iterations'  => $this->strategy->get_num_items_per_iteration(),
            'nonce'           => wp_create_nonce(self::NONCE_ACTION),
            'columns'         => $this->columns,
            'show_button'     => $this->show_button,
        ]);

        wp_localize_script($this->get_handle(), 'acp_export_i18n', [
            'dismiss'          => __('Dismiss this notice.'),
            'export'           => __('Export', 'lenuaj-admin-columns'),
            'export_to_csv'    => __('Export to CSV', 'lenuaj-admin-columns'),
            'export_error'     => __(
                'Something went wrong during exporting. Please try again.',
                'lenuaj-admin-columns'
            ),
            'processed'        => __('Processed {0} of {1} items ({2}%).', 'lenuaj-admin-columns'),
            'exporting'        => __('Exporting current list of items.', 'lenuaj-admin-columns'),
            'export_completed' => __('Exported {0} items', 'lenuaj-admin-columns'),
            'download_file'    => __('Download File', 'lenuaj-admin-columns'),
            'failed'           => __('Failed', 'lenuaj-admin-columns'),
            'done'             => __('Done', 'lenuaj-admin-columns'),
            'cancel'           => __('Cancel', 'lenuaj-admin-columns'),
            'leaving'          => __(
                'You are currently generating an export file. Leaving the page will cancel this process. Are you sure you want to leave the page?',
                'lenuaj-admin-columns'
            ),
            'affected_items'   => _x('This will affect {0}', 'export', 'lenuaj-admin-columns'),
            'items'            => __('{0} items', 'lenuaj-admin-columns'),
            'item'             => __('1 item', 'lenuaj-admin-columns'),
        ]);
    }

}
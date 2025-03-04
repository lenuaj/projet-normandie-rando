<?php

namespace AC\Integration;

use AC\Integration;
use AC\ListScreen;
use AC\Screen;
use AC\Type\Url\Site;

final class Pods extends Integration
{

    public function __construct()
    {
        parent::__construct(
            'ac-addon-pods',
            __('Pods', 'lenuaj-admin-columns'),
            'assets/images/addons/pods.png',
            sprintf(
                '%s %s',
                sprintf(
                    __('Integrates %s with Admin Columns.', 'lenuaj-admin-columns'),
                    __('Pods', 'lenuaj-admin-columns')
                ),
                sprintf(
                    __(
                        'Display, inline- and bulk-edit, export, smart filter and sort your %s contents on any admin list table.',
                        'lenuaj-admin-columns'
                    ),
                    __('Pods', 'lenuaj-admin-columns')
                )
            ),
            new Site(Site::PAGE_ADDON_PODS)
        );
    }

    public function is_plugin_active(): bool
    {
        return function_exists('pods');
    }

    public function show_notice(Screen $screen): bool
    {
        return in_array(
            $screen->get_id(),
            [
                'toplevel_page_pods',
                'pods-admin_page_pods-settings',
            ],
            true
        );
    }

    public function show_placeholder(ListScreen $list_screen): bool
    {
        return true;
    }

}
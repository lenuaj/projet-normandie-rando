<?php

namespace AC\Admin;

use AC\Admin\Menu\Item;
use AC\Asset\Location;
use AC\Deprecated\Hooks;
use AC\Type\Url\Site;
use AC\Type\Url\UtmTags;

class MenuFactory implements MenuFactoryInterface
{

    protected $url;

    protected $location;

    public function __construct(string $url, Location\Absolute $location)
    {
        $this->url = $url;
        $this->location = $location;
    }

    protected function create_menu_link(string $slug): string
    {
        return add_query_arg(
            [
                RequestHandlerInterface::PARAM_PAGE => Admin::NAME,
                RequestHandlerInterface::PARAM_TAB  => $slug,
            ],
            $this->url
        );
    }

    public function create(string $current): Menu
    {
        $menu = new Menu();

        $items = [
            Page\Columns::NAME => __('Columns', 'lenuaj-admin-columns'),
            Page\Settings::NAME => __('Settings', 'lenuaj-admin-columns'),
            Page\Addons::NAME => __('Add-ons', 'lenuaj-admin-columns'),
        ];

        $hooks = new Hooks();

        if ($hooks->get_count() > 0) {
            $items[Page\Help::NAME] = sprintf(
                '%s %s',
                __('Help', 'lenuaj-admin-columns'),
                '<span class="ac-badge">' . $hooks->get_count() . '</span>'
            );
        }

        foreach ($items as $slug => $label) {
            $menu->add_item(
                new Item(
                    $slug,
                    $this->create_menu_link($slug),
                    $label,
                    sprintf('-%s %s', $slug, $current === $slug ? '-active' : '')
                )
            );
        }

        $url = (new UtmTags(new Site(Site::PAGE_ABOUT_PRO), 'upgrade'))->get_url();
        $image = sprintf(
            '<img alt="%s" src="%s">',
            'Admin Columns Pro',
            $this->location->with_suffix('/assets/images/external.svg')->get_url()
        );

        $menu->add_item(new Item('pro', $url, sprintf('%s %s', 'Admin Columns Pro', $image), '-pro', '_blank'));

        do_action('ac/admin/page/menu', $menu);

        return $menu;
    }

}
<?php

declare(strict_types=1);

namespace ACP\Admin\ScriptFactory;

use AC;
use AC\Asset;
use AC\Asset\Location;
use AC\Asset\Script;
use AC\Asset\Script\Localize\Translation;
use AC\Asset\ScriptFactory;
use AC\ListScreen;
use AC\ListScreenRepository\Sort\ManualOrder;
use ACP\Admin\Encoder;
use ACP\ListScreenRepository\Template;
use ACP\Settings\ListScreen\HideOnScreenCollection;
use ACP\Type\HideOnScreen\Group;

class SettingsFactory implements ScriptFactory
{

    public const HANDLE = 'acp-settings';

    private $location;

    private $elements;

    private $list_screen;

    private $storage;

    private $template_repository;

    public function __construct(
        Location $location,
        HideOnScreenCollection $elements,
        ListScreen $list_screen,
        AC\ListScreenRepository\Storage $storage,
        Template $template_repository
    ) {
        $this->location = $location;
        $this->elements = $elements;
        $this->list_screen = $list_screen;
        $this->storage = $storage;
        $this->template_repository = $template_repository;
    }

    public function create(): Script
    {
        $script = new Asset\Script(
            self::HANDLE,
            $this->location->with_suffix('assets/core/js/layouts.js'),
            ['ac-admin-page-columns', Script\GlobalTranslationFactory::HANDLE]
        );

        $translation = new Translation([
            'roles'       => __('Select roles', 'lenuaj-admin-columns'),
            'users'       => __('Select users', 'lenuaj-admin-columns'),
            'table_views' => [
                'default_columns'   => __('Default columns', 'lenuaj-admin-columns'),
                'table_views'       => __('Table Views', 'lenuaj-admin-columns'),
                'add_view'          => __('+ Add view', 'lenuaj-admin-columns'),
                'add'               => __('Add', 'lenuaj-admin-columns'),
                'cancel'            => __('Cancel', 'lenuaj-admin-columns'),
                'create_label'      => __('Create a new view for the %s list table.', 'lenuaj-admin-columns'),
                'group_table_views' => __('Table Views', 'lenuaj-admin-columns'),
                'group_presets'     => __('Templates', 'lenuaj-admin-columns'),
                'current'           => __('current', 'lenuaj-admin-columns'),
                'name'              => __('Name', 'lenuaj-admin-columns'),
                'enter_name'        => __('Enter Name', 'lenuaj-admin-columns'),
                'preview'           => __('Preview', 'lenuaj-admin-columns'),
                'delete'            => __('Delete', 'lenuaj-admin-columns'),
                'template'          => __('Settings Template', 'lenuaj-admin-columns'),
                'copy_settings'     => __('Copy settings from:', 'lenuaj-admin-columns'),
                'read_only'         => __('Read Only', 'lenuaj-admin-columns'),
                'instructions'      => __('Instructions', 'lenuaj-admin-columns'),
                'delete_message'    => __(
                    "Warning! The %s columns data will be deleted. This cannot be undone. 'OK' to delete, 'Cancel' to stop",
                    'lenuaj-admin-columns'
                ),
            ],
        ]);

        $script->localize('acp_settings_i18n', $translation);

        $inline_vars = [
            '_nonce' => wp_create_nonce('acp-layout'),
        ];

        $groups = [
            Group::FEATURE => __('Features', 'lenuaj-admin-columns'),
            Group::ELEMENT => __('Default Elements', 'lenuaj-admin-columns'),
        ];

        $table_views = $this->get_table_views($this->list_screen->get_key());
        $presets = $this->get_templates($this->list_screen->get_key());

        foreach ($groups as $group_name => $group_label) {
            $group = [
                'group_name'  => $group_name,
                'group_label' => $group_label,
            ];

            $elements = $this->elements->all([
                'filter_by_group' => new Group($group_name),
            ]);

            foreach ($elements as $element) {
                $group['elements'][] = [
                    'name'         => $element->get_name(),
                    'label'        => $element->get_label(),
                    'active'       => ! $element->is_hidden($this->list_screen),
                    'dependent_on' => $element->has_dependent_on() ? $element->get_dependent_on() : null,
                ];
            }

            $inline_vars['table_elements'][] = $group;
            $inline_vars['read_only'] = $this->list_screen->is_read_only();
            $inline_vars['table_views'] = $table_views;
            $inline_vars['presets'] = $presets;
            $inline_vars['list_screen_label'] = $this->list_screen->get_label();
            $inline_vars['confirm_delete'] = apply_filters('ac/delete_confirmation', true);
        }

        return $script->add_inline_variable('acp_settings', $inline_vars);
    }

    private function get_templates(string $key): array
    {
        $templates = [];
        foreach ($this->template_repository->find_all_by_key($key) as $list_screen) {
            $templates[] = (new Encoder($list_screen))->encode();
        }

        return $templates;
    }

    private function get_table_views(string $key): array
    {
        $list_screens = [];

        foreach (
            $this->storage->find_all_by_key($key, new ManualOrder()) as $list_screen
        ) {
            $list_screens[] = (new Encoder($list_screen))->encode();
        }

        return $list_screens;
    }

}
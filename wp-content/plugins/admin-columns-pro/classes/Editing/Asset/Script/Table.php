<?php

namespace ACP\Editing\Asset\Script;

use AC;
use AC\Asset\Location;
use AC\Asset\Script;
use ACA;
use ACP;
use ACP\Editing\ApplyFilter;
use ACP\Editing\EditableDataFactory;
use ACP\Editing\Preference;
use WP_List_Table;
use WP_User;

final class Table extends Script
{

    /**
     * @var AC\ListScreen
     */
    private $list_screen;

    /**
     * @var array
     */
    private $active_states;

    /**
     * @var EditableDataFactory
     */
    private $editable_data_factory;

    /**
     * @var Preference\EditState
     */
    private $edit_state;

    public function __construct(
        string $handle,
        Location $location,
        AC\ListScreen $list_screen,
        EditableDataFactory $editable_data_factory,
        Preference\EditState $edit_state,
        array $active_states
    ) {
        parent::__construct(
            $handle,
            $location,
            ['jquery', 'ac-table', 'jquery-ui-datepicker', 'password-strength-meter']
        );

        $this->list_screen = $list_screen;
        $this->editable_data_factory = $editable_data_factory;
        $this->edit_state = $edit_state;
        $this->active_states = $active_states;
    }

    public function register(): void
    {
        parent::register();

        // Allow JS to access the column data for this list screen on the edit page
        wp_localize_script($this->get_handle(), 'acp_editing_columns', $this->editable_data_factory->create());

        wp_localize_script($this->get_handle(), 'acp_editing', [
            'inline_edit' => [
                'active'       => $this->active_states['inline_edit'],
                'toggle_state' => $this->edit_state->is_active($this->list_screen->get_key()),
                'persistent'   => $this->is_persistent_editing(),
                'version'      => apply_filters('acp/editing/inline/deprecated_style', false) ? 'v1' : 'v2',
            ],
            'bulk_edit'   => [
                'active'                     => $this->active_states['bulk_edit'],
                'updated_rows_per_iteration' => $this->get_updated_rows_per_iteration(),
                'total_items'                => $this->get_total_items() ?: 0,
                'total_items_formatted'      => number_format_i18n($this->get_total_items() ?: 0),
                'show_confirmation'          => $this->show_bulk_edit_confirmation(),
            ],
            'bulk_delete' => [
                'active'                    => $this->active_states['bulk_delete'],
                'delete_rows_per_iteration' => $this->get_deleted_rows_per_iteration(),
                'component'                 => $this->get_bulk_delete_component(),
                'reassign_user_id'          => $this->get_reassign_user()->ID,
                'reassign_user_name'        => $this->get_reassign_user_name(),
            ],
        ]);
        $this->localize(
            'acp_editing_i18n',
            new Script\Localize\Translation([
                'select_author'  => __('Select author', 'lenuaj-admin-columns'),
                'edit'           => __('Edit'),
                'redo'           => __('Redo', 'lenuaj-admin-columns'),
                'undo'           => __('Undo', 'lenuaj-admin-columns'),
                'date'           => __('Date'),
                'delete'         => __('Delete', 'lenuaj-admin-columns'),
                'generate'       => __('Generate', 'lenuaj-admin-columns'),
                'restore'        => __('Restore', 'lenuaj-admin-columns'),
                'show'           => __('Show', 'lenuaj-admin-columns'),
                'hide'           => __('Hide', 'lenuaj-admin-columns'),
                'download'       => __('Download', 'lenuaj-admin-columns'),
                'errors'         => [
                    'field_required' => __('This field is required.', 'lenuaj-admin-columns'),
                    'invalid_float'  => __('Please enter a valid float value.', 'lenuaj-admin-columns'),
                    'invalid_floats' => __('Please enter valid float values.', 'lenuaj-admin-columns'),
                    'unknown'        => __('Something went wrong.', 'lenuaj-admin-columns'),
                ],
                'inline_edit'    => __('Inline Edit', 'lenuaj-admin-columns'),
                'failed'         => __('Failed', 'lenuaj-admin-columns'),
                'media'          => __('Media', 'lenuaj-admin-columns'),
                'image'          => __('Image', 'lenuaj-admin-columns'),
                'audio'          => __('Audio', 'lenuaj-admin-columns'),
                'time'           => __('Time', 'lenuaj-admin-columns'),
                'update'         => __('Update', 'lenuaj-admin-columns'),
                'cancel'         => __('Cancel', 'lenuaj-admin-columns'),
                'done'           => __('Done', 'lenuaj-admin-columns'),
                'replace_with'   => __('Replace with', 'lenuaj-admin-columns'),
                'add'            => __('Add', 'lenuaj-admin-columns'),
                'remove'         => __('Remove', 'lenuaj-admin-columns'),
                'operators'      => [
                    'subtract' => __('Subtract', 'lenuaj-admin-columns'),
                    'add'      => __('Add', 'lenuaj-admin-columns'),
                    'remove'   => __('Remove', 'lenuaj-admin-columns'),
                    'multiply' => __('Multiply', 'lenuaj-admin-columns'),
                    'divide'   => __('Divide', 'lenuaj-admin-columns'),
                ],
                'bulk_selection' => [
                    'affected_items'     => _x('This will affect {0}', 'bulk-delete', 'lenuaj-admin-columns'),
                    'all_selected_items' => __('all selected items', 'lenuaj-admin-columns'),
                    'all_items'          => __('all items', 'lenuaj-admin-columns'),
                    'all_items_ucfirst'  => ucfirst(__('all items', 'lenuaj-admin-columns')),
                    'items'              => __('{0} items', 'lenuaj-admin-columns'),
                    'item'               => __('1 item', 'lenuaj-admin-columns'),
                    'select_all'         => __('Select all {0} items', 'lenuaj-admin-columns'),
                    'selected'           => sprintf(
                        __('{0} selected for %s.', 'lenuaj-admin-columns'),
                        ac_helper()->string->enumeration_list($this->get_bulk_selection_labels())
                    ),
                ],
                'bulk_delete'    => [
                    'assignment_to'                     => _x(
                        'Assign all content to:',
                        'bulk-delete',
                        'lenuaj-admin-columns'
                    ),
                    'bulk_delete'                       => __('Bulk Delete', 'lenuaj-admin-columns'),
                    'bulk_restore'                      => __('Bulk Restore', 'lenuaj-admin-columns'),
                    'confirmation'                      => __(
                        'Do you want to bulk delete all selected items?',
                        'lenuaj-admin-columns'
                    ),
                    'confirmation_restore'              => __(
                        'Do you want to bulk restore all selected items?',
                        'lenuaj-admin-columns'
                    ),
                    'current_user'                      => _x('current user', 'bulk-delete', 'lenuaj-admin-columns'),
                    'delete_all_content'                => _x(
                        'Delete all content',
                        'bulk-delete',
                        'lenuaj-admin-columns'
                    ),
                    'delete_items_permanently'          => _x(
                        'Delete the items permanently',
                        'bulk-delete',
                        'lenuaj-admin-columns'
                    ),
                    'delete_selected_items_permanently' => _x(
                        'The selected items will be deleted permanently.',
                        'bulk-delete',
                        'lenuaj-admin-columns'
                    ),
                    'restore'                           => _x('Restore', 'bulk-delete', 'lenuaj-admin-columns'),
                    'restore_items'                     => _x(
                        'Restore the items',
                        'bulk-delete',
                        'lenuaj-admin-columns'
                    ),
                    'finished'                          => __('Processed {0} items', 'lenuaj-admin-columns'),
                    'move_to_trash'                     => _x(
                        'Move the items to trash',
                        'bulk-delete',
                        'lenuaj-admin-columns'
                    ),
                    'user_assignment_description'       => _x(
                        'What should be done with content owned by these users?',
                        'bulk-delete',
                        'lenuaj-admin-columns'
                    ),
                    'yes_delete'                        => __('Yes, Delete', 'lenuaj-admin-columns'),
                    'yes_restore'                       => __('Yes, Restore', 'lenuaj-admin-columns'),
                ],
                'bulk_edit'      => [
                    'bulk_edit'     => __('Bulk Edit', 'lenuaj-admin-columns'),
                    'done_deselect' => __('Done & Deselect All', 'lenuaj-admin-columns'),
                    'form'          => [
                        'heads_up'      => __('This will update {0} items.', 'lenuaj-admin-columns'),
                        'clear_values'  => __('You are about to clear {0} items.', 'lenuaj-admin-columns'),
                        'update_values' => __('You are about to update {0} items.', 'lenuaj-admin-columns'),
                        'are_you_sure'  => __('Are you sure?', 'lenuaj-admin-columns'),
                        'yes_update'    => __('Yes, Update', 'lenuaj-admin-columns'),
                    ],
                    'feedback'      => [
                        'show_items'         => __('Show items', 'lenuaj-admin-columns'),
                        'hide_items'         => __('Hide items', 'lenuaj-admin-columns'),
                        'finished'           => __('Processed {0} items', 'lenuaj-admin-columns'),
                        'updating'           => __('Updating items.', 'lenuaj-admin-columns'),
                        'processed'          => __('Processed {0} of {1} items.', 'lenuaj-admin-columns'),
                        'failure'            => __('Updating failed. Please try again.', 'lenuaj-admin-columns'),
                        'error'              => _x(
                            'We have found {0} while processing.',
                            'bulk edit errors',
                            'lenuaj-admin-columns'
                        ),
                        'not_editable_found' => __(
                            'These items are not editable and could not be modified:',
                            'lenuaj-admin-columns'
                        ),
                    ],
                ],
            ])
        );
    }

    private function get_bulk_selection_labels(): array
    {
        $selection = [];

        $labels = [
            'bulk_edit'   => [
                'label' => __('bulk edit', 'lenuaj-admin-columns'),
                'tip'   => __(
                    'Bulk edit items by clicking the Bulk Edit button below the column labels.',
                    'lenuaj-admin-columns'
                ),
            ],
            'bulk_delete' => [
                'label' => __('bulk delete', 'lenuaj-admin-columns'),
                'tip'   => __(
                    'Bulk delete items by clicking the trash icon in the top left corner.',
                    'lenuaj-admin-columns'
                ),
            ],
            'export'      => [
                'label' => __('export', 'lenuaj-admin-columns'),
                'tip'   => __('Export items by clicking the Export button.', 'lenuaj-admin-columns'),
            ],
        ];

        foreach ($labels as $key => $item) {
            if ($this->active_states[$key]) {
                $selection[] = sprintf(
                    '<span data-ac-tip="%s">%s</span>',
                    esc_attr($item['tip']),
                    esc_html($item['label'])
                );
            }
        }

        return $selection;
    }

    private function get_reassign_user_name(): string
    {
        $user = $this->get_reassign_user();
        $name = ac_helper()->user->get_display_name($user);

        if (get_current_user_id() === $user->ID) {
            $name = sprintf('%s (%s)', $name, __('current user', 'lenuaj-admin-columns'));
        }

        return $name;
    }

    private function get_reassign_user(): WP_User
    {
        $user_id = (new ApplyFilter\ReassignUser())->apply_filters(get_current_user_id());

        $user = get_userdata($user_id);

        if ( ! $user) {
            return wp_get_current_user();
        }

        return $user;
    }

    /**
     * @return false|int
     */
    private function get_total_items()
    {
        global $wp_list_table;

        return $wp_list_table instanceof WP_List_Table
            ? $wp_list_table->get_pagination_arg('total_items')
            : false;
    }

    private function show_bulk_edit_confirmation(): bool
    {
        return (bool)apply_filters('acp/editing/bulk/show_confirmation', true);
    }

    private function get_bulk_delete_component(): string
    {
        switch (true) {
            case $this->list_screen instanceof ACP\ListScreen\Post:
                if ('trash' === get_query_var('post_status', null)) {
                    return 'trash';
                }

                return 'post';
            case $this->list_screen instanceof ACA\WC\ListScreen\Order:
                return 'post';
            case $this->list_screen instanceof ACP\ListScreen\User:
                return 'user';
            case $this->list_screen instanceof ACP\ListScreen\Comment:
                $comment_status = isset($_REQUEST['comment_status']) ? wp_unslash($_REQUEST['comment_status']) : '';
                if ('trash' === $comment_status) {
                    return 'trash';
                }

                return 'comment';
            default:
                return '';
        }
    }

    private function is_persistent_editing(): bool
    {
        return (bool)apply_filters('acp/editing/persistent', false, $this->list_screen);
    }

    private function get_updated_rows_per_iteration(): int
    {
        return (int)apply_filters('acp/editing/bulk/updated_rows_per_iteration', 250, $this->list_screen);
    }

    private function get_deleted_rows_per_iteration(): int
    {
        return (int)apply_filters('acp/delete/bulk/deleted_rows_per_iteration', 250, $this->list_screen);
    }

}
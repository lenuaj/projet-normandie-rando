<?php

namespace AC\Controller;

use AC\Ajax;
use AC\Column\AjaxValue;
use AC\ListScreenRepository\Storage;
use AC\Registerable;
use AC\Request;
use AC\Type\ListScreenId;

class AjaxColumnModalValue implements Registerable
{

    private $repository;

    public function __construct(Storage $repository)
    {
        $this->repository = $repository;
    }

    public function register(): void
    {
        $this->get_ajax_handler()->register();
    }

    private function get_ajax_handler()
    {
        $handler = new Ajax\Handler();
        $handler
            ->set_action('ac_get_column_modal_value')
            ->set_callback([$this, 'get_value']);

        return $handler;
    }

    public function get_value()
    {
        check_ajax_referer('ac-ajax');

        $request = new Request();

        $id = (int)$request->filter('object_id', null, FILTER_SANITIZE_NUMBER_INT);
        $list_id = $request->filter('layout', null, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $column_name = $request->filter('column_name', null, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if ( ! $id) {
            wp_send_json_error(__('Invalid item ID.', 'lenuaj-admin-columns'), 400);
        }

        if ( ! ListScreenId::is_valid_id($list_id)) {
            wp_send_json_error(__('Invalid list ID.', 'lenuaj-admin-columns'), 400);
        }

        $list_screen = $this->repository->find(new ListScreenId($list_id));

        if ( ! $list_screen || ! $list_screen->is_user_allowed(wp_get_current_user())) {
            wp_send_json_error(__('Invalid list screen.', 'lenuaj-admin-columns'), 400);
        }

        $column = $list_screen->get_column_by_name($column_name);

        if ( ! $column) {
            wp_send_json_error(__('Invalid column.', 'lenuaj-admin-columns'), 400);
        }

        if ( ! $column instanceof AjaxValue) {
            wp_send_json_error(__('Invalid method.', 'lenuaj-admin-columns'), 400);
        }

        $seconds = 60;
        header("Cache-Control: max-age=" . $seconds);

        echo $column->get_ajax_value($id);
        exit;
    }

}
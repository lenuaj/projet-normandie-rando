<?php

namespace ACP\Editing\BulkDelete\RequestHandler;

use ACP\Editing\BulkDelete\RequestHandler;
use RuntimeException;
use WP_Error;

class Taxonomy extends RequestHandler
{

    private $taxonomy;

    public function __construct(string $taxonomy)
    {
        $this->taxonomy = $taxonomy;
    }

    protected function delete($id, array $args = []): void
    {
        $id = (int)$id;

        if ( ! current_user_can('manage_categories') || ! current_user_can('delete_term', $id)) {
            throw new RuntimeException(__('You have no permission to delete this item.', 'lenuaj-admin-columns'));
        }

        $result = wp_delete_term($id, $this->taxonomy);

        if (false === $result) {
            throw new RuntimeException(__('Term does not exists.', 'lenuaj-admin-columns'));
        }
        if (0 === $result) {
            throw new RuntimeException(__('A default term can not be deleted.', 'lenuaj-admin-columns'));
        }
        if ($result instanceof WP_Error) {
            throw new RuntimeException($result->get_error_message());
        }
    }

}
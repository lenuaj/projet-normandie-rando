<?php

namespace AC\Admin\Section;

use AC\Admin\Section;
use AC\View;

class Restore extends Section
{

    public function __construct()
    {
        parent::__construct('restore');
    }

    public function render(): string
    {
        $form = (new View())->set_template('admin/page/settings-section-restore');

        $view = new View([
            'title' => __('Restore Settings', 'lenuaj-admin-columns'),
            'description' => __(
                'Delete all column settings and restore the default settings.',
                'lenuaj-admin-columns'
            ),
            'content' => $form->render(),
            'class' => '-general',
        ]);

        $view->set_template('admin/page/settings-section');

        return $view->render();
    }

}
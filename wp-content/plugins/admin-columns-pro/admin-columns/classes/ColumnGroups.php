<?php

namespace AC;

class ColumnGroups
{

    public static function get_groups(): Groups
    {
        $groups = new Groups();

        $groups->add('default', __('Default', 'lenuaj-admin-columns'));
        $groups->add('plugin', __('Plugins'), 20);
        $groups->add('custom_field', __('Custom Fields', 'lenuaj-admin-columns'), 30);
        $groups->add('media-meta', __('Meta', 'lenuaj-admin-columns'), 32);
        $groups->add('media-image', __('Image', 'lenuaj-admin-columns'), 33);
        $groups->add('media-video', __('Video', 'lenuaj-admin-columns'), 34);
        $groups->add('media-audio', __('Audio', 'lenuaj-admin-columns'), 35);
        $groups->add('media-document', __('Document', 'lenuaj-admin-columns'), 35);
        $groups->add('media-file', __('File', 'lenuaj-admin-columns'), 35);
        $groups->add('custom', __('Custom', 'lenuaj-admin-columns'), 40);

        do_action('ac/column_groups', $groups);

        return $groups;
    }

}
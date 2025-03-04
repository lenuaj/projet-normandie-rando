<?php

namespace AC\Column;

use AC\Column;
use AC\Settings;

/**
 * Custom field column, displaying the contents of meta fields.
 * Suited for all list screens supporting WordPress' default way of handling meta data.
 * Supports different types of meta fields, including dates, serialized data, linked content,
 * and boolean values.
 */
class CustomField extends Column\Meta
{

    public function __construct()
    {
        $this->set_type('column-meta')
             ->set_label(__('Custom Field', 'lenuaj-admin-columns'))
             ->set_group('custom_field');
    }

    public function get_meta_key()
    {
        return (string)$this->get_setting(Settings\Column\CustomField::NAME)->get_value();
    }

    private function is_acp_active(): bool
    {
        return defined('ACP_FILE');
    }

    public function register_settings()
    {
        $this->add_setting(new Settings\Column\CustomField($this))
             ->add_setting(new Settings\Column\BeforeAfter($this));

        if ( ! $this->is_acp_active()) {
            $this->add_setting(new Settings\Column\Pro\Sorting($this))
                 ->add_setting(new Settings\Column\Pro\InlineEditing($this))
                 ->add_setting(new Settings\Column\Pro\BulkEditing($this))
                 ->add_setting(new Settings\Column\Pro\SmartFiltering($this))
                 ->add_setting(new Settings\Column\Pro\Export($this));
        }
    }

    /**
     * @return string e.g. excerpt|color|date|numeric|image|has_content|link|checkmark|library_id|title_by_id|user_by_id|array|count
     * @see Settings\Column\CustomFieldType
     */
    public function get_field_type()
    {
        return (string)($this->get_setting(Settings\Column\CustomFieldType::NAME)->get_value() ?: '');
    }

    public function get_field()
    {
        return $this->get_meta_key();
    }

}
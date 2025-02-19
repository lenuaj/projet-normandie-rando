<?php

namespace AC\Settings\Column;

use AC\Column;
use AC\Settings\FormatValue;

class FileMetaAudio extends FileMeta implements FormatValue
{

    public function __construct(Column $column)
    {
        $types = [
            'bitrate'           => __('Bitrate', 'lenuaj-admin-columns'),
            'bitrate_mode'      => __('Bitrate Mode', 'lenuaj-admin-columns'),
            'channelmode'       => __('Channelmode', 'lenuaj-admin-columns'),
            'channels'          => __('Channels', 'lenuaj-admin-columns'),
            'compression_ratio' => __('Compression Ratio', 'lenuaj-admin-columns'),
            'created_timestamp' => __('Created Timestamp', 'lenuaj-admin-columns'),
            'dataformat'        => __('Data Format', 'lenuaj-admin-columns'),
            'encoder_options'   => __('Encoder Options', 'lenuaj-admin-columns'),
            'fileformat'        => __('Fileformat', 'lenuaj-admin-columns'),
            'filesize'          => __('Filesize', 'lenuaj-admin-columns'),
            'length'            => __('Length', 'lenuaj-admin-columns'),
            'length_formatted'  => __('Length Formatted', 'lenuaj-admin-columns'),
            'lossless'          => __('Losless', 'lenuaj-admin-columns'),
            'mime_type'         => __('Mime Type', 'lenuaj-admin-columns'),
            'sample_rate'       => __('Sample Rate', 'lenuaj-admin-columns'),
        ];

        natcasesort($types);

        parent::__construct($column, $types, 'dataformat');
    }

    public function format($value, $original_value)
    {
        switch ($this->get_media_meta_key()) {
            case 'bitrate':
                if ($value > 1000) {
                    $value = sprintf('%s %s', number_format($value / 1000), __('Kbps', 'lenuaj-admin-columns'));
                }

                return $value;
            case 'channels':
                if ($value > 0) {
                    $value = sprintf(
                        '%s %s',
                        number_format($value),
                        _n('channel', 'channels', $value, 'lenuaj-admin-columns')
                    );
                }

                return $value;
            case 'compression_ratio':
                if ($value > 0) {
                    $value = number_format($value, 4);
                }

                return $value;
            case 'created_timestamp':
                return $value
                    ? ac_helper()->date->format_date(
                        sprintf('%s %s', get_option('date_format'), get_option('time_format')),
                        $value
                    )
                    : '';
            case 'filesize':
                return ac_helper()->file->get_readable_filesize($value);
            case 'length':
                if ($value > 0) {
                    $value = sprintf('%s %s', number_format($value), __('sec', 'lenuaj-admin-columns'));
                }

                return $value;
            case 'sample_rate':
                if ($value > 0) {
                    $value = sprintf('%s %s', number_format($value), __('Hz', 'lenuaj-admin-columns'));
                }

                return $value;
            default:
                return $value;
        }
    }

}
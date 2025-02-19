<?php

namespace AC\Settings\Column;

use AC\Column;
use AC\Settings\FormatValue;

class FileMetaVideo extends FileMeta implements FormatValue {

	public function __construct( Column $column ) {
		$video_types = [
			'created_timestamp' => __( 'Created Timestamp', 'lenuaj-admin-columns' ),
			'dataformat'        => __( 'Dataformat', 'lenuaj-admin-columns' ),
			'fileformat'        => __( 'Fileformat', 'lenuaj-admin-columns' ),
			'height'            => __( 'Height', 'lenuaj-admin-columns' ),
			'length'            => __( 'Length', 'lenuaj-admin-columns' ),
			'length_formatted'  => __( 'Length Formatted', 'lenuaj-admin-columns' ),
			'width'             => __( 'Width', 'lenuaj-admin-columns' ),
		];

		natcasesort( $video_types );

		$audio_types = [
			'audio.bits_per_sample' => __( 'Bits Per Sample', 'lenuaj-admin-columns' ),
			'audio.channelmode'     => __( 'Channelmode', 'lenuaj-admin-columns' ),
			'audio.channels'        => __( 'Channels', 'lenuaj-admin-columns' ),
			'audio.codec'           => __( 'Codec', 'lenuaj-admin-columns' ),
			'audio.dataformat'      => __( 'Dataformat', 'lenuaj-admin-columns' ),
			'audio.lossless'        => __( 'Losless', 'lenuaj-admin-columns' ),
			'audio.sample_rate'     => __( 'Sample Rate', 'lenuaj-admin-columns' ),
		];

		$audio_types = array_map( [ $this, 'wrap_audio_string' ], $audio_types );

		natcasesort( $audio_types );

		parent::__construct( $column, array_merge( $video_types, $audio_types ), 'dataformat' );
	}

	private function wrap_audio_string( $string ) {
		return sprintf( '%s (%s)', $string, __( 'audio', 'lenuaj-admin-columns' ) );
	}

	public function format( $value, $original_value ) {
		switch ( $this->get_media_meta_key() ) {
			case 'height':
			case 'width':
				if ( $value > 0 ) {
					$value = sprintf( '%s %s', number_format( $value ), __( 'px', 'lenuaj-admin-columns' ) );
				}

				return $value;
			case 'length':
				if ( $value > 0 ) {
					$value = sprintf( '%s %s', number_format( $value ), __( 'sec', 'lenuaj-admin-columns' ) );
				}

				return $value;
			case 'audio/channels':
				if ( $value > 0 ) {
					$value = sprintf( '%s %s', number_format( $value ), _n( 'channels', 'channels', $value, 'lenuaj-admin-columns' ) );
				}

				return $value;
			case 'audio/sample_rate':
				if ( $value > 0 ) {
					$value = sprintf( '%s %s', number_format( $value ), __( 'Hz', 'lenuaj-admin-columns' ) );
				}

				return $value;
			case 'created_timestamp':
				return $value
					? ac_helper()->date->format_date( sprintf( '%s %s', get_option( 'date_format' ), get_option( 'time_format' ) ), $value )
					: '';
			default:
				return $value;
		}
	}

}
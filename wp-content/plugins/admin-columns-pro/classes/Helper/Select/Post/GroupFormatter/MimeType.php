<?php
declare( strict_types=1 );

namespace ACP\Helper\Select\Post\GroupFormatter;

use ACP\Helper\Select\Post\GroupFormatter;
use WP_Post;

class MimeType implements GroupFormatter {

	public function format( WP_Post $post ): string {
		$extension = ac_helper()->image->get_file_extension( $post->ID );

		return $this->get_label( $extension ) ?: $extension;
	}

	private function get_label( string $extension ): ?string {
		foreach ( $this->get_extensions() as $type => $extensions ) {
			if ( in_array( $extension, $extensions, true ) ) {
				return $this->get_translation( $type );
			}
		}

		return null;
	}

	private function get_translation( string $type ): ?string {
		$translations = $this->get_translations();

		return $translations[ $type ] ?? null;
	}

	private function get_extensions(): array {
		static $extensions;

		if ( null === $extensions ) {
			$extensions = wp_get_ext_types();
		}

		return $extensions;
	}

	private function get_translations(): array {
		static $translations;

		if ( null === $translations ) {
			$translations = [
				'image'       => _x( 'Image', 'mediatype', 'lenuaj-admin-columns' ),
				'audio'       => _x( 'Audio', 'mediatype', 'lenuaj-admin-columns' ),
				'video'       => _x( 'Video', 'mediatype', 'lenuaj-admin-columns' ),
				'document'    => _x( 'Document', 'mediatype', 'lenuaj-admin-columns' ),
				'spreadsheet' => _x( 'Spreadsheet', 'mediatype', 'lenuaj-admin-columns' ),
				'interactive' => _x( 'Interactive', 'mediatype', 'lenuaj-admin-columns' ),
				'text'        => _x( 'Text', 'mediatype', 'lenuaj-admin-columns' ),
				'archive'     => _x( 'Archive', 'mediatype', 'lenuaj-admin-columns' ),
				'code'        => _x( 'Code', 'mediatype', 'lenuaj-admin-columns' ),
			];
		}

		return $translations;
	}

}
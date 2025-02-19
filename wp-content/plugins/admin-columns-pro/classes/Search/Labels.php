<?php

namespace ACP\Search;

use AC\ArrayIterator;

class Labels extends ArrayIterator {

	public function __construct( array $labels = [] ) {
		$labels = array_merge( [
			Operators::EQ           => __( 'is', 'lenuaj-admin-columns' ),
			Operators::NEQ          => __( 'is not', 'lenuaj-admin-columns' ),
			Operators::GT           => __( 'is larger than', 'lenuaj-admin-columns' ),
			Operators::GTE          => __( 'is larger or equal than', 'lenuaj-admin-columns' ),
			Operators::LT           => __( 'is smaller than', 'lenuaj-admin-columns' ),
			Operators::LTE          => __( 'is smaller or equal than', 'lenuaj-admin-columns' ),
			Operators::CONTAINS     => __( 'contains', 'lenuaj-admin-columns' ),
			Operators::NOT_CONTAINS => __( 'does not contain', 'lenuaj-admin-columns' ),
			Operators::BEGINS_WITH  => __( 'starts with', 'lenuaj-admin-columns' ),
			Operators::ENDS_WITH    => __( 'ends with', 'lenuaj-admin-columns' ),
			Operators::IN           => __( 'in', 'lenuaj-admin-columns' ),
			Operators::NOT_IN       => __( 'not in', 'lenuaj-admin-columns' ),
			Operators::BETWEEN      => __( 'between', 'lenuaj-admin-columns' ),
			Operators::IS_EMPTY     => __( 'is not set', 'lenuaj-admin-columns' ),
			Operators::NOT_IS_EMPTY => __( 'is set', 'lenuaj-admin-columns' ),
			Operators::CURRENT_USER => __( 'is current user', 'lenuaj-admin-columns' ),
		], $labels );

		parent::__construct( $labels );
	}

}
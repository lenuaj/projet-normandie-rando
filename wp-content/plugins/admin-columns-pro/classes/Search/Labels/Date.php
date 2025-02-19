<?php

namespace ACP\Search\Labels;

use ACP\Search\Labels;
use ACP\Search\Operators;

class Date extends Labels {

	public function __construct( array $labels = [] ) {
		$labels = array_merge( [
			Operators::GT          => __( 'is after', 'lenuaj-admin-columns' ),
			Operators::LT          => __( 'is before', 'lenuaj-admin-columns' ),
			Operators::TODAY       => __( 'is today', 'lenuaj-admin-columns' ),
			Operators::PAST        => __( 'is in the past', 'lenuaj-admin-columns' ),
			Operators::FUTURE      => __( 'is in the future', 'lenuaj-admin-columns' ),
			Operators::LT_DAYS_AGO => __( 'is less than', 'lenuaj-admin-columns' ),
			Operators::GT_DAYS_AGO => __( 'is more than', 'lenuaj-admin-columns' ),
			Operators::WITHIN_DAYS => __( 'is within', 'lenuaj-admin-columns' ),
			Operators::EQ_MONTH => __( 'in month', 'lenuaj-admin-columns' ),
			Operators::EQ_YEAR => __( 'in year', 'lenuaj-admin-columns' ),
		], $labels );

		parent::__construct( $labels );
	}

}
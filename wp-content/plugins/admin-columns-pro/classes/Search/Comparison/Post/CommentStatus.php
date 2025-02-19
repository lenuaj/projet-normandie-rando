<?php

namespace ACP\Search\Comparison\Post;

use AC;
use AC\Helper\Select\Options;
use ACP\Search\Comparison\Values;
use ACP\Search\Operators;

class CommentStatus extends PostField
	implements Values {

	public function __construct() {
		$operators = new Operators( [
			Operators::EQ,
		] );

		parent::__construct( $operators );
	}

	public function get_values(): Options {
		return AC\Helper\Select\Options::create_from_array( [
			'open'   => __( 'Open', 'lenuaj-admin-columns' ),
			'closed' => __( 'Closed', 'lenuaj-admin-columns' ),
		] );
	}

	protected function get_field(): string {
		return 'comment_status';
	}

}
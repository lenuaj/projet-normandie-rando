<?php

namespace ACP\Settings\ListScreen\HideOnScreen;

use ACP\Settings\ListScreen\HideOnScreen;

class FilterCategory extends HideOnScreen {

	public function __construct() {
		parent::__construct(
			'hide_filter_category',
			__( 'Category', 'lenuaj-admin-columns' ),
			HideOnScreen\Filters::NAME
		);
	}

}
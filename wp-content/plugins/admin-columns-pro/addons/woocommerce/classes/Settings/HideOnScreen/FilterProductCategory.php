<?php

namespace ACA\WC\Settings\HideOnScreen;

use ACP;

class FilterProductCategory extends ACP\Settings\ListScreen\HideOnScreen {

	public function __construct() {
		parent::__construct( 'hide_filter_product_category', __( 'Category', 'lenuaj-admin-columns' ), ACP\Settings\ListScreen\HideOnScreen\Filters::NAME );
	}

}
<?php

namespace ACA\WC\Settings\HideOnScreen;

use ACP;

class FilterSubscriptionPayment extends ACP\Settings\ListScreen\HideOnScreen {

	public function __construct() {
		parent::__construct( 'hide_filter_subscription_payment', __( 'Payment Method', 'lenuaj-admin-columns' ), ACP\Settings\ListScreen\HideOnScreen\Filters::NAME );
	}

}
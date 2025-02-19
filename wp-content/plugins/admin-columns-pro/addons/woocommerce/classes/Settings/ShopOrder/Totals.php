<?php

namespace ACA\WC\Settings\ShopOrder;

use AC;

/**
 * @since 3.0
 */
class Totals extends AC\Settings\Column {

	/**
	 * @var string
	 */
	private $order_total_property;

	protected function define_options() {
		return [
			'order_total_property' => 'total',
		];
	}

	public function create_view() {
		$select = $this->create_element( 'select' )
		               ->set_attribute( 'data-refresh', 'column' )
		               ->set_attribute( 'data-label', 'update' )
		               ->set_options( $this->get_display_options() );

		return new AC\View( [
			'label'   => __( 'Display', 'lenuaj-admin-columns' ),
			'setting' => $select,
		] );
	}

	protected function get_display_options() {
		$options = [
			'total'    => __( 'Total', 'lenuaj-admin-columns' ),
			'subtotal' => __( 'Subtotal', 'lenuaj-admin-columns' ),
			'shipping' => __( 'Shipping Costs', 'lenuaj-admin-columns' ),
			'tax'      => __( 'Tax', 'lenuaj-admin-columns' ),
			'refunded' => __( 'Refunds', 'lenuaj-admin-columns' ),
			'discount' => __( 'Discounts', 'lenuaj-admin-columns' ),
			'paid'     => __( 'Paid', 'lenuaj-admin-columns' ),
			'fees'     => __( 'Fees', 'lenuaj-admin-columns' ),
		];

		natcasesort( $options );

		return $options;
	}

	/**
	 * @return string
	 */
	public function get_order_total_property() {
		return $this->order_total_property;
	}

	/**
	 * @param string $order_total_property
	 */
	public function set_order_total_property( $order_total_property ) {
		$this->order_total_property = $order_total_property;
	}

}
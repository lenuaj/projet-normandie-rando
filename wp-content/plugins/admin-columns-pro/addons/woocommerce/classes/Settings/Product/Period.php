<?php

namespace ACA\WC\Settings\Product;

use AC;
use AC\View;

/**
 * @since 3.0
 */
class Period extends AC\Settings\Column {

	/**
	 * @var string
	 */
	private $period;

	protected function set_name() {
		$this->name = 'period';
	}

	protected function define_options() {
		return [
			'period' => '365',
		];
	}

	public function create_view() {
		$select = $this->create_element( 'select' )
		               ->set_attribute( 'data-refresh', 'column' )
		               ->set_options( $this->get_display_options() );

		return new View( [
			'label'   => __( 'Period', 'lenuaj-admin-columns' ),
			'tooltip' => __( 'Select the time period from now', 'lenuaj-admin-columns' ),
			'setting' => $select,
		] );
	}

	protected function get_display_options() {
		return [
			'365' => __( 'Last year', 'lenuaj-admin-columns' ),
			'92'  => __( 'Last quarter', 'lenuaj-admin-columns' ),
			'31'  => __( 'Last month', 'lenuaj-admin-columns' ),
			'7'   => __( 'Last week', 'lenuaj-admin-columns' ),
		];
	}

	/**
	 * @return int
	 */
	public function get_period() {
		return absint( $this->period );
	}

	/**
	 * @param string $period
	 */
	public function set_period( $period ) {
		$this->period = $period;
	}

}
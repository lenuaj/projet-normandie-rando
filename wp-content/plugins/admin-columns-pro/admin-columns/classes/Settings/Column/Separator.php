<?php

namespace AC\Settings\Column;

use AC\ApplyFilter;
use AC\Collection;
use AC\Settings;
use AC\View;

class Separator extends Settings\Column
	implements Settings\FormatCollection {

	const NAME = 'separator';

	/**
	 * @var string
	 */
	private $separator;

	protected function define_options() {
		return [ 'separator' => 'comma' ];
	}

	public function create_view() {
		$options = [
			'comma'           => __( 'Comma Separated', 'lenuaj-admin-columns' ),
			'horizontal_rule' => __( 'Horizontal Rule', 'lenuaj-admin-columns' ),
			'newline'         => __( 'New Line', 'lenuaj-admin-columns' ),
			'none'            => __( 'None', 'lenuaj-admin-columns' ),
			'white_space'     => __( 'Whitespace', 'lenuaj-admin-columns' ),
		];

		natcasesort( $options );

		$options = [ '' => __( 'Default', 'lenuaj-admin-columns' ) ] + $options;

		$select = $this
			->create_element( 'select' )
			->set_options( $options );

		$view = new View( [
			'label'   => __( 'Separator', 'lenuaj-admin-columns' ),
			'setting' => $select,
		] );

		return $view;
	}

	public function get_separator() {
		return $this->separator;
	}

	public function set_separator( $separator ) {
		$this->separator = $separator;

		return $this;
	}

	public function get_separator_formatted() {
		switch ( $this->separator ) {
			case 'comma' :
				return ', ';
			case 'newline' :
				return "<br/>";
			case 'none' :
				return '';
			case 'white_space' :
				return '&nbsp;';
			case 'horizontal_rule' :
				return '<hr>';
			default :
				return ( new ApplyFilter\ColumnSeparator( $this->column ) )->apply_filters( ', ' );
		}
	}

	public function format( Collection $collection, $original_value ) {
		return $collection->filter()->implode( $this->get_separator_formatted() );
	}

}
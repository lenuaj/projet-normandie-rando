<?php

namespace ACP\Settings\ListScreen\HideOnScreen;

use ACP\Settings\ListScreen\HideOnScreen;

class RowActions extends HideOnScreen {

	public function __construct() {
		parent::__construct( 'hide_row_actions', sprintf( '%s (%s)', __( 'Row Actions', 'lenuaj-admin-columns' ), __( 'Below Title', 'lenuaj-admin-columns' ) ) );
	}

}
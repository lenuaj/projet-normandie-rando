<?php

namespace AC;

class ListScreenGroupsFactory {

	public static function create(): Groups {
		$groups = new Groups();

		$groups->add( 'post', __( 'Post Type', 'lenuaj-admin-columns' ), 5 );
		$groups->add( 'user', __( 'Users' ) );
		$groups->add( 'media', __( 'Media' ) );
		$groups->add( 'comment', __( 'Comments' ), 20 );
		$groups->add( 'link', __( 'Links' ), 40 );
		$groups->add( 'other', __( 'Other' ), 50 );

		do_action( 'ac/list_screen_groups', $groups );

		return $groups;
	}

}
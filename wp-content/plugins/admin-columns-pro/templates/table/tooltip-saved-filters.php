<?php use AC\Type\Url\Documentation; ?>

<p>
	<?php _e( 'Save a set of custom smart filters for later use.', 'lenuaj-admin-columns' ); ?>
</p>
<p>
	<?php _e( 'This can be useful to group your WordPress content based on different criteria.', 'lenuaj-admin-columns' ); ?>&nbsp;<?php _e( 'Click on a segment to load the filtered list.', 'lenuaj-admin-columns' ); ?>
</p>
<p>
	<?php printf( __( 'The %s segments are available to all users.', 'lenuaj-admin-columns' ), sprintf( '<strong>%s</strong>', __( 'Public', 'lenuaj-admin-columns' ) ) ); ?>
</p>
<p>
	<a href="<?= esc_url( Documentation::create_with_path( Documentation::ARTICLE_SAVED_FILTERS ) ); ?>" target="_blank">
		<?= __( 'Online documentation', 'lenuaj-admin-columns' ); ?>
	</a>
</p>
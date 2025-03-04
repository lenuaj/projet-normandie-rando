<?php use AC\Type\Url\Documentation; ?>
<p>
	<?php _e( 'Select the filtered segment that you want as the default when users visit the table.', 'lenuaj-admin-columns' ); ?>
</p>
<p>
	<?php printf(
		__( 'Only saved filtered segments marked as %s are selectable.', 'lenuaj-admin-columns' ),
		sprintf( '<strong>%s</strong>', __( 'Public', 'lenuaj-admin-columns' ) )
	); ?>
</p>

<img src="<?= esc_url( $this->location->with_suffix( 'assets/core/images/preferred-filters.png' )->get_url() ) ?>" alt=""/>

<p>
	<a href="<?= esc_url( Documentation::create_with_path( Documentation::ARTICLE_SAVED_FILTERS ) ); ?>" target="_blank">
		<?= __( 'How to create a filtered segment', 'lenuaj-admin-columns' ); ?> &raquo;
	</a>
</p>
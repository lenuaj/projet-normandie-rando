<?php

use AC\Type\Url\Documentation;

?>
<h3>
	<?= __( 'Export Unavailable', 'lenuaj-admin-columns' ); ?>
</h3>
<p>
	<?= __( 'Unfortunately not every column can be exported.', 'lenuaj-admin-columns' ); ?>
</p>
<p>
	<?= __( 'Third-party columns and some custom columns cannot be exported unless there is build-in support for that specific column.', 'lenuaj-admin-columns' ); ?>
</p>
<p>
	<a href="<?= esc_url( Documentation::create_with_path( Documentation::ARTICLE_EXPORT )->get_url() ); ?>" target="_blank">
		<?= __( 'Learn more &raquo;', 'lenuaj-admin-columns' ); ?>
	</a>
</p>
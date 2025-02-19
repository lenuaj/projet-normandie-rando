<p>
	<?php _e( "The custom field column uses the custom fields from posts and users. There are 14 types which you can set.", 'lenuaj-admin-columns' ); ?>
</p>
<ul>
	<li>
		<strong><?php _e( "Default", 'lenuaj-admin-columns' ); ?></strong><br/>
		<?php _e( "Value: Can be either a string or array. Arrays will be flattened and values are seperated by commas.", 'lenuaj-admin-columns' ); ?>
	</li>
	<li>
		<strong><?php _e( "Color", 'lenuaj-admin-columns' ); ?></strong><br/>
		<?php _e( "Value: Hex value color, such as #808080.", 'lenuaj-admin-columns' ); ?>
	</li>
	<li>
		<strong><?php _e( "Counter", 'lenuaj-admin-columns' ); ?></strong><br/>
		<?php _e( "Value: Can be either a string or array. This will display a count of the number of times the meta key is used by the item.", 'lenuaj-admin-columns' ); ?>
	</li>
	<li>
		<strong><?php _e( "Date", 'lenuaj-admin-columns' ); ?></strong><br/>
		<?php printf( __( "Value: Can be unix time stamp or a date format as described in the <a href='%s'>Codex</a>. You can change the outputted date format at the <a href='%s'>general settings</a> page.", 'lenuaj-admin-columns' ), 'http://codex.wordpress.org/Formatting_Date_and_Time', admin_url( 'options-general.php' ) ); ?>
	</li>
	<li>
		<strong><?php _e( "Excerpt", 'lenuaj-admin-columns' ); ?></strong><br/>
		<?php _e( "Value: This will show the first 20 words of the Post content.", 'lenuaj-admin-columns' ); ?>
	</li>
	<li>
		<strong><?php _e( "Has Content", 'lenuaj-admin-columns' ); ?></strong><br/>
		<?php _e( "Value: This will show if the field has content or not.", 'lenuaj-admin-columns' ); ?>
	</li>
	<li>
		<strong><?php _e( "Image", 'lenuaj-admin-columns' ); ?></strong><br/>
		<?php _e( "Value: Should contain one or more Image URLs or Attachment IDs, separated by commas.", 'lenuaj-admin-columns' ); ?>
	</li>
	<li>
		<strong><?php _e( "Media", 'lenuaj-admin-columns' ); ?></strong><br/>
		<?php _e( "Value: Should contain one or more Attachment IDs, separated by commas.", 'lenuaj-admin-columns' ); ?>
	</li>
	<li>
		<strong><?php _e( "Multiple Values", 'lenuaj-admin-columns' ); ?></strong><br/>
		<?php _e( "Value: Should be an array. This will flatten any ( multi dimensional ) array.", 'lenuaj-admin-columns' ); ?>
	</li>
	<li>
		<strong><?php _e( "Number", 'lenuaj-admin-columns' ); ?></strong><br/>
		<?php _e( "Value: Integers only.<br/>If you have the 'sorting addon' this will be used for sorting, so you can sort your posts on numeric (custom field) values.", 'lenuaj-admin-columns' ); ?>
	</li>
	<li>
		<strong><?php _e( "Post", 'lenuaj-admin-columns' ); ?></strong><br/>
		<?php _e( "Value: Should contain one or more Post IDs, separated by commas.", 'lenuaj-admin-columns' ); ?>
	</li>
	<li>
		<strong><?php _e( "True / False", 'lenuaj-admin-columns' ); ?></strong><br/>
		<?php _e( "Value: Should be a 1 (one) or 0 (zero).", 'lenuaj-admin-columns' ); ?>
	</li>
	<li>
		<strong><?php _e( "URL", 'lenuaj-admin-columns' ); ?></strong><br/>
		<?php _e( "Value: Should contain a URL.", 'lenuaj-admin-columns' ); ?>
	</li>
	<li>
		<strong><?php _e( "User", 'lenuaj-admin-columns' ); ?></strong><br/>
		<?php _e( "Value: Should contain one or more User IDs, separated by commas.", 'lenuaj-admin-columns' ); ?>
	</li>
</ul>
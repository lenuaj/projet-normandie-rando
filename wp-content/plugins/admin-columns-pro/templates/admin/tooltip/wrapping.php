<p>
    <?php
    _e('Select your wrapping method:', 'lenuaj-admin-columns'); ?></p>
<p><strong><?php
        _e('Wrap', 'lenuaj-admin-columns'); ?></strong><br>
    <?php
    _e(
        'Use "wrap" if you want your text to continue on a new line when it reaches the end of a cell.',
        'lenuaj-admin-columns'
    ); ?>
</p>
<img src="<?= esc_url($this->location->with_suffix('assets/core/images/wrapping_wrap.png')->get_url()) ?>" alt=""/>
<p>
	<strong><?php
        _e('Clip', 'lenuaj-admin-columns'); ?></strong><br>
    <?php
    _e(
        'Use "clip" if you want your text to stay on a single line when it reaches the end of a cell.',
        'lenuaj-admin-columns'
    ); ?>
</p>
<img src="<?= esc_url($this->location->with_suffix('assets/core/images/wrapping_clip.png')->get_url()) ?>" alt=""/>
<?php

use AC\Type\Url\Site;
use AC\Type\Url\UtmTags;

if ( ! defined('ABSPATH')) {
    exit;
}

?>
<section class="ac-setbox ac-ls-settings ac-section ac-ls-settings-mockup" data-section="ls-settings">
	<header class="ac-section__header">
		<div class="ac-setbox__header__title"><?= __('Settings', 'lenuaj-admin-columns'); ?>
			<small>(<?= __('optional', 'lenuaj-admin-columns'); ?>)</small>
		</div>
	</header>
	<form>

		<div class="ac-unlock-modal">
            <?php
            echo ac_helper()->icon->dashicon(['icon' => 'lock']); ?>
            <?php
            _e('Unlock with Admin Columns Pro', 'lenuaj-admin-columns'); ?>
			<a target="_blank" href="<?php
            echo esc_url(
                (new UtmTags(new Site(Site::PAGE_ABOUT_PRO), 'upgrade'))->get_url()
            ); ?>" class="button-primary -pink">
                <?php
                _e('Upgrade', 'lenuaj-admin-columns'); ?>
			</a>
		</div>

		<div class="ac-setbox__row">
			<div class="ac-setbox__row__th">
				<label><?= __('Conditionals', 'lenuaj-admin-columns'); ?></label>
				<small><?= __(
                        'Make this table view available only for specific users or roles.',
                        'lenuaj-admin-columns'
                    ); ?></small>
			</div>
			<div class="ac-setbox__row__fields">
				<div class="ac-setbox__row__fields__inner">
					<fieldset>
						<label for="layout-roles-<?php
                        echo $this->id; ?>" class="screen-reader-text">
                            <?php
                            _e('Roles', 'lenuaj-admin-columns'); ?>
							<span>(<?php
                                _e('optional', 'lenuaj-admin-columns'); ?>)</span>
						</label>
						<input style="width: 100%;margin-bottom: 12px;" placeholder="Select roles" disabled type="text">
						<input style="width: 100%;margin-bottom: 12px;" placeholder="Select users" disabled type="text">
					</fieldset>
				</div>
			</div>
		</div>

		<div class="ac-setbox__row" id="hide-on-screen">
			<div class="ac-setbox__row__th">
				<label><?= __('Table Elements', 'lenuaj-admin-columns'); ?></label>
				<small><?= __(
                        'Show or hide elements from the table list screen.',
                        'lenuaj-admin-columns'
                    ); ?></small>
			</div>
			<div class="ac-setbox__row__fields">
				<div class="ac-setbox__row__fields__inner">
					<div class="checkbox-labels checkbox-labels vertical">

                        <?php
                        $checks = [
                            __('Inline Edit', 'lenuaj-admin-columns'),
                            __('Bulk Edit', 'lenuaj-admin-columns'),
                            __('Filters', 'lenuaj-admin-columns'),
                            __('Smart Filters', 'lenuaj-admin-columns'),
                            __('Export', 'lenuaj-admin-columns'),
                            __('Add Row', 'lenuaj-admin-columns'),
                            __('Status (Quick Links)', 'lenuaj-admin-columns'),
                            __('Search', 'lenuaj-admin-columns'),
                            __('Bulk Actions', 'lenuaj-admin-columns'),
                        ];

                        foreach ($checks as $label) {
                            echo sprintf(
                                '<div style="margin-bottom: 5px;"><input type="checkbox" disabled="disabled"> %s</div>',
                                $label
                            );
                        }
                        ?>

					</div>
				</div>
			</div>
		</div>

		<div class="ac-setbox__row">
			<div class="ac-setbox__row__th">
				<label><?= __('Preferences', 'lenuaj-admin-columns'); ?></label>
				<small><?= __(
                        'Set default settings that users will see when they visit the list table.',
                        'lenuaj-admin-columns'
                    ); ?></small>
			</div>

			<div class="ac-setbox__row__fields -has-subsettings -subsetting-total-3">
				<div class="ac-setbox__row -sub -horizontal-scrolling">
					<div class="ac-setbox__row__th">
						<label><?= __('Horizontal Scrolling', 'lenuaj-admin-columns'); ?></label>
					</div>
					<div class="ac-setbox__row__fields">
						<div class="ac-setbox__row__fields__inner">
							<div class="radio-labels radio-labels">
								<label class="ac-setting-input_filter"><input name="horizontal_scrolling" type="radio" value="on" disabled><?= __(
                                        'Yes'
                                    ); ?></label>
								<label class="ac-setting-input_filter"><input name="horizontal_scrolling" type="radio" value="off" checked disabled><?= __(
                                        'No'
                                    ); ?></label>
							</div>
						</div>
					</div>
				</div>

				<div class="ac-setbox__row -sub -sorting" data-setting="sorting-preference">
					<div class="ac-setbox__row__th">
						<label><?= __('Sorting', 'lenuaj-admin-columns'); ?></label>
					</div>
					<div class="ac-setbox__row__fields">
						<div class="ac-setbox__row__fields__inner">
							<div class="radio-labels">
								<select name="ordercol" disabled>
									<option><?= __('Default', 'lenuaj-admin-columns') ?></option>
								</select>
								<select name="order" disabled>
									<option><?= __('Ascending', 'lenuaj-admin-columns') ?></option>
								</select>
							</div>
						</div>
					</div>
				</div>

				<div class="ac-setbox__row -sub -predefinedfilters" data-setting="filter-segment-preference">
					<div class="ac-setbox__row__th">
						<label><?= __('Pre-applied Filters', 'lenuaj-admin-columns'); ?></label>
					</div>
					<div class="ac-setbox__row__fields">
						<div class="ac-setbox__row__fields__inner">
                            <?php
                            _e("No public saved filters available.", 'lenuaj-admin-columns'); ?>
						</div>
					</div>
				</div>

			</div>
		</div>

	</form>
</section>
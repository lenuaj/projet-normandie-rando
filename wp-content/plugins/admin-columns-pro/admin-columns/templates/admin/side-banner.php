<?php

use AC\Integration;
use AC\Promo;
use AC\Type\Url\Site;
use AC\Type\Url\UtmTags;

if ( ! defined('ABSPATH')) {
    exit;
}

/**
 * @global Promo         $promo
 * @global Integration[] $integrations
 * @global int           $discount
 * @global string        $price
 */

$integrations = $this->integrations;
$promo = $this->promo;
$discount = $this->discount;

$is_promo_active = $promo && $promo->is_active();

$upgrade_page_url = new UtmTags(new Site(Site::PAGE_ABOUT_PRO), 'banner');

?>

<div class="sidebox" id="ac-pro-version">
	<div class="padding-box">
		<h3>
			<a href="<?= esc_url($upgrade_page_url->add_content('title')->get_url()); ?>">
                <?php
                _e('Upgrade to', 'lenuaj-admin-columns'); ?>&nbsp;<span><?php
                    _e('Pro', 'lenuaj-admin-columns'); ?></span>
			</a>
		</h3>

		<div class="inside">
			<p><?php
                _e('Take Admin Columns to the next level:', 'lenuaj-admin-columns'); ?></p>
			<ul class="features">
                <?php

                $items = [
                    'search'      => __('Search any content', 'lenuaj-admin-columns'),
                    'editing'     => __('Inline Edit any content', 'lenuaj-admin-columns'),
                    'bulk-edit'   => __('Bulk Edit any content', 'lenuaj-admin-columns'),
                    'sorting'     => __('Sort any content', 'lenuaj-admin-columns'),
                    'filter'      => __('Filter any content', 'lenuaj-admin-columns'),
                    'column-sets' => __('Create multiple columns sets', 'lenuaj-admin-columns'),
                    'export'      => __('Export table contents to CSV', 'lenuaj-admin-columns'),
                ];

                foreach ($items as $utm_content => $label) : ?>
					<li>
						<a target="_blank" href="<?= esc_url(
                            $upgrade_page_url->add_content('usp-' . $utm_content)->get_url()
                        ); ?>"><?= esc_html($label); ?></a>
					</li>
                <?php
                endforeach; ?>

			</ul>

            <?php
            if ($integrations) : ?>
				<strong class="extra"><?php
                    _e('Includes special integrations for:', 'lenuaj-admin-columns'); ?></strong>
				<ul>
                    <?php
                    foreach ($integrations as $integration) : ?>
						<li class="acp-integration">
							<a href="<?= esc_url((string)$integration->get_url()); ?>" target="_blank">
								<strong><?= $integration->get_title(); ?></strong>
							</a>
						</li>
                    <?php
                    endforeach; ?>
				</ul>
            <?php
            endif; ?>
			<p class="center nopadding">
                <?php
                if ( ! $is_promo_active) : ?>
					<a target="_blank" href="<?= esc_url(
                        $upgrade_page_url->add_content('cta')->get_url()
                    ); ?>" class="acp-button">
                        <?php
                        _e('Get Admin Columns Pro', 'lenuaj-admin-columns'); ?>
					</a>
                <?php
                endif; ?>
			</p>
			<p class="center ac-pro-prices">
                <?php
                if ($this->price) : ?>
                    <?php
                    printf(__('Prices starting from %s', 'lenuaj-admin-columns'), '$' . $this->price); ?>
                <?php
                endif; ?>
			</p>
		</div>
	</div>

    <?php
    if ($is_promo_active) : ?>

		<div class="padding-box ac-pro-deal">
			<h3>
                <?php
                echo esc_html($promo->get_title()); ?>
			</h3>
			<a target="_blank" href="<?php
            echo esc_url($promo->get_url()->get_url()); ?>" class="acp-button">
                <?php
                echo esc_html(sprintf(__('Get %s Off!', 'lenuaj-admin-columns'), $promo->get_discount() . '%')); ?>
			</a>
			<p class="nomargin">
                <?php
                echo esc_html(
                    sprintf(
                        __("Discount is valid until %s", 'lenuaj-admin-columns'),
                        $promo->get_date_range()->get_end()->format('j F Y')
                    )
                ); ?>
			</p>
		</div>

    <?php
    else : ?>

		<div class="padding-box ac-pro-newsletter">
			<h3>
                <?php
                echo esc_html(sprintf(__('Get %s Off!', 'lenuaj-admin-columns'), $discount . '%')); ?>
			</h3>
			<div class="inside">
				<p>
                    <?php
                    echo esc_html(
                        sprintf(
                            __(
                                "Submit your email and we'll send you a discount for %s off.",
                                'lenuaj-admin-columns'
                            ),
                            $discount . '%'
                        )
                    ); ?>
				</p>
                <?php
                $user_data = wp_get_current_user(); ?>
				<form method="post" action="<?= esc_url(
                    $upgrade_page_url->add_medium('send-coupon')->get_url()
                ); ?>" target="_blank">
					<input name="action" type="hidden" value="mc_upgrade_pro">
					<input type="text" name="EMAIL" placeholder="<?php
                    esc_attr_e("Your Email", 'lenuaj-admin-columns'); ?>" value="<?= esc_attr(
                        $user_data->user_email
                    ); ?>" required>
					<input type="text" name="FNAME" placeholder="<?php
                    esc_attr_e("Your First Name", 'lenuaj-admin-columns'); ?>" value="<?= esc_attr(
                        $user_data->first_name
                    ); ?>" required>
					<input type="submit" value="<?php
                    esc_attr_e("Send me the discount", 'lenuaj-admin-columns'); ?>" class="acp-button">
				</form>
			</div>
		</div>

    <?php
    endif; ?>

</div>
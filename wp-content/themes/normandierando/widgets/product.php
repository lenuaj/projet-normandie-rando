<?php

if (!defined("ABSPATH")) {
    exit(); // Exit if accessed directly.
}

class Widget_Product_Page extends Elementor\Widget_Base {
    public function get_name()
    {
        return "product-page-content";
    }

    public function get_title()
    {
        return esc_html__("Contenu Page Produit", "product-page-content");
    }

    public function get_icon()
    {
        return "eicon-favorite";
    }

    public function get_categories()
    {
        return ["basic"];
    }

    public function get_keywords()
    {
        return ["product"];
    }

		public function get_style_depends(): array {
			return [ 'widget-product-page-style'];
		}

    protected function register_controls()
    {
        $this->start_controls_section("section_display", [
            "label" => esc_html__("Mise en page", "bacterie-maladie-archive"),
        ]);

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
				global $post;
				?>
				<div class="r14-header">
					<div class="r14-title">
						<h1><?= get_the_title($post->ID) ?></h1>
						<h2><?= get_field("accroche") ?></h2>
					</div>
					<?= get_the_post_thumbnail($post->ID) ?>;
				</div>
				
				
				<div class="r14-product-main">

					<div class="r14-product-nav">
						<div class="r14-nav">
							<a href="#resume"><?= __('en resumé', 'normandie-rando') ?></a>
							<a href="#description"><?= __('description', 'normandie-rando') ?></a>
							<a href="#itineraire"><?= __('itinéraire', 'normandie-rando') ?></a>
							<a href="#hebergement"><?= __('hébergement', 'normandie-rando') ?></a>
							<a href="#location"><?= __('location vélos', 'normandie-rando') ?></a>
							<a href="#infos"><?= __('infos pratiques', 'normandie-rando') ?></a>
						</div>
					</div>

					<div class="r14-price">
						<div>
							<span><?= __("à partir de", 'normandie-rando') ?></span>
							<span><?= get_field("prix") ?> €</span>
							<span><?= __("/ personne", 'normandie-rando') ?></span>
						</div>
						<a class="r14-btn black"><?= __("demander un devis", 'normandie-rando') ?></a>
					</div>

					<div class="r14-resume" id="resume">
						<div>
							<div>
								<?= yoast_breadcrumb( '<p id="breadcrumbs">','</p>' ); ?>
							</div>
							<div>
								<div>

								</div>
							</div>
						</div>
					</div>

					<section class="r14-description-container" id="description">
						<div class="r14-column-title">
							<h2><?= __('DESCRIPTION', 'normandie-rando') ?></h2>
						</div>
						<div class="r14-content">
							<div class="r14-description">
								<?= get_field("description") ?> 
							</div>

							<div class="swiper r14-gallery-media-product">
								<div class="swiper-wrapper">
									<?php
										$images = get_field('galerie_images');
										if( $images ): ?>
											<?php foreach( $images as $image ): ?>
												<div class="swiper-slide">
													<img src="<?= esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
												</div>
											<?php endforeach; ?>
										<?php endif; ?>
								</div>
							</div>
						</div>
					</section>

					<h2><?= __('Itinéraire', 'normandie-rando') ?></h2>

					<section class="r14-itineraire-container" id="itineraire">
						<div  class="r14-content">
							<div class="r14-map-image">
								<img src="<?= esc_url(get_field('carte')) ?>" alt="">
							</div>
							<div class="r14-itineraire">
								<div class="swiper r14-itineraire-swiper">
									<div class="swiper-wrapper">
										<?php
											$etapes = get_field('etape');
											if( $etapes ): ?>
												<?php foreach( $etapes as $etape ): ?>
													<div class="swiper-slide">
														<div class="r14-itineraire-item">
															<div class="r14-itineraire-item-title">
																<h3><?= $etape['titre'] ?></h3>
															</div>
															<div class="r14-itineraire-item-content">
																<?= $etape['Details'] ?>
															</div>
															<div class="r14-itineraire-item-content">
																<?= $etape['fin_de_journee'] ?>
															</div>
														</div>
													</div>
												<?php endforeach; ?>
											<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</section>


					<section class="r14-hebergement-container" id="hebergement">
						<div class="r14-column-title">
							<h2><?= __('Hébergement', 'normandie-rando') ?></h2>
						</div>
					</section>

					<section class="r14-location-container" id="location">
						<div class="r14-column-title">
							<h2><?= __('Location Vélos', 'normandie-rando') ?></h2>
						</div>
					</section>

					<section class="r14-infos-container" id="infos">
						<div class="r14-column-title">
							<h2><?= __('Infos Pratiques', 'normandie-rando') ?></h2>
						</div>
					</section>

					<section class="r14-actualites-container" id="actualites">
						<div class="r14-column-title">
							<h2><?= __('Actualités', 'normandie-rando') ?></h2>
						</div>
					</section>


				</div>





	<?php
		}

    protected function content_template() {
        ?>
          <h2>Contenu page produit</h2>
        <?php
    }
}
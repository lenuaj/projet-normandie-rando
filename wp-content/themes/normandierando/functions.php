<?php
/**
 * Theme functions and definitions.
 *
 * For additional information on potential customization options,
 * read the developers' documentation:
 *
 * https://developers.elementor.com/docs/hello-elementor-theme/
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'HELLO_ELEMENTOR_CHILD_VERSION', '2.0.0' );

/**
 * Load child theme scripts & styles.
 *
 * @return void
 */
function hello_elementor_child_scripts_styles() {

	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		HELLO_ELEMENTOR_CHILD_VERSION
	);

	wp_enqueue_style(
		'normandie-rando-swiper-style',
		get_stylesheet_directory_uri() . '/assets/css/swiper-bundle.min.css'
	);

	wp_enqueue_style(
		'normandie-rando-style',
		get_stylesheet_directory_uri() . '/assets/css/style.css',
		[],
		rand(0, 999),
	);

	wp_enqueue_script(
		'normandie-rando-swiper-11',
		get_stylesheet_directory_uri() . '/assets/js/swiper-bundle.min.js'
	);

	wp_enqueue_script( 
		'normandi-rando-main-script', 
		get_stylesheet_directory_uri() . '/assets/js/main.js', 
		array('normandie-rando-swiper-11'),
		rand(0, 999),
		false
	);

}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_scripts_styles', 20 );


function register_product_page_widget($widgets_manager) {
	require_once __DIR__ . "/widgets/product.php";
	$widgets_manager->register(new Widget_Product_Page());
}

add_action("elementor/widgets/widgets_registered","register_product_page_widget");
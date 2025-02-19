<?php
/**
 * Plugin Name: Normandie Rando
 * Text Domain: normandie-rando
 */


function normandie_rando_header_injector() {
	if($_GET['page'] == "normandie_rando") {
		?>
			<link rel="stylesheet" href="<?= plugin_dir_url(__FILE__); ?>browser/styles-HRW6ME544.css" media="print" onload="this.media='all'">
		<?php
	}
}

add_action('admin_head', 'normandie_rando_header_injector');

function normandie_rando_admin_page() {
	if($_GET['page'] == "normandie_rando") {
		?>
			<app-root></app-root>
			<script src="<?= plugin_dir_url(__FILE__); ?>browser/polyfills-FFHMD2TL.js" type="module"></script>
			<script src="<?= plugin_dir_url(__FILE__); ?>browser/main-BJTHIVPP4.js" type="module"></script></body>
		<?php
	}
}

function normandie_rando_create_menu() {
	//create new top-level menu
	add_menu_page(
		'Normandie Rando', 
		'Normandie Rando', 
		'read', 
		'normandie_rando', 
		'normandie_rando_admin_page',
		'dashicons-clipboard',
		2
	);

	//call register settings function
	add_action( 'admin_init', 'register_normandie_rando_settings' );
}

add_action('admin_menu', 'normandie_rando_create_menu');

add_filter( 'rest_post_collection_params', 'my_prefix_change_post_per_page', 10, 1 );

function my_prefix_change_post_per_page( $params ) {
    if ( isset( $params['per_page'] ) ) {
        $params['per_page']['maximum'] = 9999;
    }
    return $params;
}

function normandierando_get_orders(WP_REST_Request $request) {
	
	$args = array(
		'post_type'  		 => 'commande',
		'nopaging'       => true,
	);

	$query =  new WP_Query( $args );

	//provide all post meta for query posts
	foreach ($query->posts as $key => $post) {
		$query->posts[$key]->metas = get_post_meta($post->ID);
	}

	return new WP_REST_Response( $query->posts, 200 );

}

add_action( 'rest_api_init', function () {
  register_rest_route( 'normandierando/v1', '/orders', array(
    'methods' => 'GET',
    'callback' => 'normandierando_get_orders',
  ) );
} );


function normandierando_get_products(WP_REST_Request $request) {
	
	$args = array(
		'post_type'  		 => 'produit',
		'nopaging'       => true,
	);

	$query =  new WP_Query( $args );

	//provide all post meta for query posts
	foreach ($query->posts as $key => $post) {
		$query->posts[$key]->metas = get_post_meta($post->ID);
	}

	return new WP_REST_Response( $query->posts, 200 );

}

add_action( 'rest_api_init', function () {
  register_rest_route( 'normandierando/v1', '/products', array(
    'methods' => 'GET',
    'callback' => 'normandierando_get_products',
  ) );
} );

?>
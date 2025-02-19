<?php
/*
Plugin Name: Admin Columns Pro
Version: 6.4.14
Description: Customize columns on the administration screens for post(types), users and other content. Filter and sort content, and edit posts directly from the posts overview. All via an intuitive, easy-to-use drag-and-drop interface.
Author: lenuaj.com
Author URI: https://www.lenuaj.com
Plugin URI: https://www.lenuaj.com
Requires PHP: 7.2
Requires at least: 5.9
Text Domain: lenuaj-admin-columns
Domain Path: /languages/
*/

if ( ! defined('ABSPATH')) {
    exit;
}

// add_filter('pre_http_request', function($preempt, $args, $url) {
//     if ($url === 'https://www.lenuaj.com') {
//         $body = is_array($args['body']) ? $args['body'] : json_decode($args['body'], true);

//         if (isset($body['command']) && $body['command'] === 'activate') {
//             $response = array(
//                 'headers' => array(),
//                 'body' => '{
//                     "activated": true,
//                     "message": "You have successfully activated Admin Columns Pro.",
//                     "message_type": "success",
//                     "activation_key": "f090bd7d-1e27-4832-8355-b9dd45c9e9ca",
//                     "permissions": ["usage", "update"],
//                     "renewal_method": "manual",
//                     "expiry_date": "2050-01-01 00:00:59"
//                 }',
//                 'response' => array(
//                     'code' => 200,
//                     'message' => 'OK'
//                 )
//             );

//             return $response;
//         } elseif (isset($body['command']) && $body['command'] === 'subscription_details') {
//             $response = array(
//                 'headers' => array(),
//                 'body' => '{
//                     "status": "active",
//                     "expiry_date": "2050-01-01 00:00:59",
//                     "renewal_method": "manual",
//                     "products": [
//                         "admin-columns-pro",
//                         "ac-addon-acf",
//                         "ac-addon-buddypress",
//                         "ac-addon-events-calendar",
//                         "ac-addon-gravityforms",
//                         "ac-addon-ninjaforms",
//                         "ac-addon-jetengine",
//                         "ac-addon-metabox",
//                         "ac-addon-pods",
//                         "ac-addon-types",
//                         "ac-addon-woocommerce",
//                         "ac-addon-yoast-seo"
//                     ],
//                     "renewal_discount": 0,
//                     "permissions": ["usage", "update"],
//                     "activation_key": "f090bd7d-1e27-4832-8355-b9dd45c9e9ca"
//                 }',
//                 'response' => array(
//                     'code' => 200,
//                     'message' => 'OK'
//                 )
//             );

//             return $response;
//         }
//     }

//     return $preempt;
// }, 10, 3);

if ( ! is_admin()) {
    return;
}

define('ACP_FILE', __FILE__);
define('ACP_VERSION', '6.4.14');

// require_once ABSPATH . 'wp-admin/includes/plugin.php';

/**
 * Deactivate Admin Columns
 */
// deactivate_plugins('lenuaj-admin-columns/lenuaj-admin-columns.php');

/**
 * Load Admin Columns
 */
add_action('plugins_loaded', static function () {
    require_once 'admin-columns/lenuaj-admin-columns.php';
});

/**
 * Load Admin Columns Pro
 */
add_action('after_setup_theme', static function () {
    $dependencies = new AC\Dependencies(plugin_basename(ACP_FILE), ACP_VERSION);
    $dependencies->requires_php('7.2');

    if ($dependencies->has_missing()) {
        return;
    }

    require_once __DIR__ . '/vendor/autoload.php';
    require_once __DIR__ . '/api.php';

    /**
     * For loading external resources like column settings.
     * Can be called from plugins and themes.
     */
    do_action('acp/ready', ACP());
}, 5);
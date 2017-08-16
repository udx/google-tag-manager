<?php
/**
 * Plugin Name: WP Google Tags
 * Plugin URI: https://www.usabilitydynamics.com
 * Description: Options for Google Tag Manager
 * Author: UsabilityDynamics, inc.
 * Version: 1.0.0
 * Tested up to: 4.8.1
 * Text Domain: wgtm
 * Domain Path: /static/languages/
 * Author URI: https://www.usabilitydynamics.com
 */

define( 'WGTM_DOMAIN', 'wgtm' );
define( 'WGTM_TEMPLATES_PATH', plugin_dir_path( __FILE__ ) . 'static/templates/' );

if ( is_admin() ){
    add_action( 'admin_menu', 'wgtm_admin_menu' );
    add_action( 'admin_init', 'wgtm_register_settings' );
} else {
    add_action( 'wp_head', 'wgtm_render_head_snippet' );
    add_action( 'wp_footer', 'wgtm_render_body_snippet' );
}

/**
 * Header code
 */
function wgtm_render_head_snippet() {
    if ( !empty( $snippet = get_option('head-snippet') ) ) {
        echo "\n<!-- WP Google Tags -->\n" . $snippet . "\n<!-- /WP Google Tags -->\n\n";
    }
}

/**
 * Body code
 */
function wgtm_render_body_snippet() {
    if ( !empty( $snippet = get_option('body-snippet') ) ) {
        echo "\n<!-- WP Google Tags -->\n" . $snippet . "\n<!-- /WP Google Tags -->\n\n";
    }
}

/**
 * Menu
 */
function wgtm_admin_menu() {
    add_management_page( __( 'Manage Google Tags', WGTM_DOMAIN ), __( 'Manage Google Tags', WGTM_DOMAIN ), 'manage_options', 'wgtm', 'wgtm_options_page_render' );
}

/**
 * Options page
 */
function wgtm_options_page_render() {

    ob_start();
    include WGTM_TEMPLATES_PATH . 'options.php';
    echo apply_filters( 'wgtm_options_html', ob_get_clean() );

}

/**
 * Register settings
 */
function wgtm_register_settings() {
    register_setting( 'wgtm-group', 'head-snippet' );
    register_setting( 'wgtm-group', 'body-snippet' );
}
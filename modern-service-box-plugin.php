<?php
/**
 * Plugin Name: Modern Service Box for Elementor
 * Description: A custom service box widget for Elementor.
 * Version: 1.0
 * Author : Mian Moiz
 * Author URI : https://github.com/moizxox
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Check if Elementor is loaded
function modern_service_box_check_elementor_loaded() {
    // Check if Elementor is active and loaded
    if ( ! did_action( 'elementor/loaded' ) ) {
        // Display an admin notice if Elementor is not active
        add_action( 'admin_notices', 'modern_service_box_elementor_not_active_notice' );
        return;
    }

    // Register the widget
    add_action( 'elementor/widgets/register', 'register_modern_service_box_widget' );
}

// Admin notice if Elementor is not active
function modern_service_box_elementor_not_active_notice() {
    ?>
    <div class="notice notice-warning is-dismissible">
        <p><?php _e( 'Modern Service Box for Elementor requires Elementor to be active. Please activate Elementor to use this plugin.', 'modern-service-box' ); ?></p>
    </div>
    <?php
}

// Enqueue the CSS file
function modern_service_box_enqueue_styles() {
    wp_enqueue_style( 'modern-service-box-style', plugin_dir_url( __FILE__ ) . 'modern-service-box-style.css' );
}
add_action( 'wp_enqueue_scripts', 'modern_service_box_enqueue_styles' );

// Register the widget
function register_modern_service_box_widget( $widgets_manager ) {
    require_once( __DIR__ . '/class-modern-service-box-elementor-widget.php' );
    $widgets_manager->register( new \Modern_Service_Box_Elementor_Widget() );
}

// Hook to check if Elementor is loaded and register widget
add_action( 'plugins_loaded', 'modern_service_box_check_elementor_loaded' );

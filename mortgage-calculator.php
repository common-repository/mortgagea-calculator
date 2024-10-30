<?php 
/**
* Plugin Name: Mortgage Calculator
* Description: For Using This Plugin you Can Know Monthly Payment, Total Payment and Total Interest for your loan.
* Version: 1.0
* Copyright: 2023
* Text Domain: mortgage-calculator
*/

if (!defined('ABSPATH')) {
    die('-1');
}


// define for base name
define('WMC_BASE_NAME', plugin_basename(__FILE__));


// define for plugin file
define('wmc_plugin_file', __FILE__);


// define for plugin dir path
define('WMC_PLUGIN_DIR',plugins_url('', __FILE__));


// Include function files
include_once('inc/wmc_backend.php');
include_once('inc/wmc_fronted.php');


function wmc_load_script_style(){
    wp_enqueue_script( 'jquery-calculator-chart', WMC_PLUGIN_DIR . '/asset/js/chart.js', array('jquery'), '2.0');
    wp_enqueue_script( 'jquery-calculator', WMC_PLUGIN_DIR . '/asset/js/wmc_custom.js', array('jquery'), '2.0');
    wp_localize_script( 'jquery-calculator', 'wmc_frontend_ajax_object',
        array( 
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'enable_chart' => get_option("wcf_enable_chart",'true'),
            'mortgage_chart_type' => get_option("wmc_chart_type",'doughnut_chart'),
            'mortgage_monthley_color' => get_option("wmc_monthley_color",'rgb(124, 100, 195)'),
            'mortgage_totalpayment_color' => get_option("wmc_totalpayment_color",'rgb(72, 152, 255)'),
            'mortgage_totalinterset_color' => get_option("wmc_totalinterset_color",'rgb(136, 221, 155)'),
            'mortgage_schedule_enable' => get_option("wcf_enable_month_annual_schedule",'true'),
            'mortgage_annual_schedule_enable' => get_option("wcf_enable_annual_schedule",'true'),
            'mortgage_monthly_schedule_enable' => get_option("wcf_enable_monthly_schedule",'true'),
            'mortgage_chart_month_pay_text' => get_option("wmc_chart_month_pay_text",'Monthly Payment'),
            'mortgage_chart_total_pay_text' => get_option("wmc_chart_total_pay_text",'Total Payment'),
            'mortgage_chart_total_interest_text' => get_option("wmc_chart_total_interest_text",'Total interest'),
            'mortgage_min_purchase_price' => get_option("min_purchase_price",'1'),
            'mortgage_max_purchase_price' => get_option("max_purchase_price",'10000000'),
            'mortgage_min_roi' => get_option("min_roi",'1'),
            'mortgage_max_roi' => get_option("max_roi",'30'),
            'mortgage_min_loan_term' => get_option("min_loan_term",'1'),
            'mortgage_max_loan_term' => get_option("max_loan_term",'30'),
        )
    );
    wp_enqueue_style( 'jquery-calculator-style', WMC_PLUGIN_DIR. '/asset/css/wmc_style.css', '', '3.0' );
}
add_action( 'wp_enqueue_scripts', 'wmc_load_script_style' );

function wmc_load_admin_script(){
    wp_enqueue_script('jquery', false, array(), false, false);
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker-alpha', WMC_PLUGIN_DIR . '/asset/js/wp-color-picker-alpha.js', array( 'wp-color-picker' ), '3.0.2', true );
    wp_add_inline_script(
        'wp-color-picker-alpha',
        'jQuery( function() { jQuery( ".color-picker" ).wpColorPicker(); } );'
    );
    wp_enqueue_script( 'wp-color-picker-alpha' );
    wp_enqueue_style( 'jquery-admin-style', WMC_PLUGIN_DIR. '/asset/css/wmc_admin.css', '', '1.0' );
    wp_enqueue_script( 'jquery-admin-js', WMC_PLUGIN_DIR. '/asset/js/wmc_admin.js', '', '1.0' );
}
add_action( 'admin_enqueue_scripts', 'wmc_load_admin_script' );

?>
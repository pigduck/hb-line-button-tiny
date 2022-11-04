<?php
/*
 * Plugin Name: HB Line Button Tiny
 * Plugin URI: https://piglet.me/hb-line-button-tiny
 * Description: A HB Line Button Tiny
 * Version: 0.1.0
 * Author: heiblack
 * Author URI: https://piglet.me
 * License:  GPL 3.0
 * Domain Path: /languages
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
*/


class hb_line_button_tiny_admin
{
    public function __construct()
    {
        if (!defined('ABSPATH')) {
            http_response_code(404);
            die();
        }
        if (!function_exists('plugin_dir_url')) {
            return;
        }
        if (!function_exists('is_plugin_active')) {
            require_once(ABSPATH . 'wp-admin/includes/plugin.php');
        }
        if (!is_plugin_active('woocommerce/woocommerce.php')) {
            return;
        }
        $this->init();
    }
    private function init(){
        $this->HBAddpluginlink();
        $this->addCsssJsEvent();
        $this->addSettingPage();
    }
    private function HBAddpluginlink(){
        add_filter('plugin_action_links_'.plugin_basename(__FILE__), function ( $links ) {
            $links[] = '<a href="' .
                admin_url( 'tools.php?page=hb_line_button_tiny' ) .
                '">' . esc_html(__('Settings')) . '</a>';
            return $links;
        });
    }
    private function addCsssJsEvent(){
        if (!is_admin()) {
            wp_enqueue_script('hb_line_button_tiny_index', plugin_dir_url(__FILE__) . 'assets/index.js');
            wp_enqueue_script('hb_line_button_tiny_qrcode',plugin_dir_url(__FILE__) . 'assets/qrcode.min.js');
            wp_enqueue_style( 'hb_line_button_tiny_style', plugin_dir_url( __FILE__ ) . 'assets/style.css' );
            $this->addLineButtom();
        }
    }
    private function addLineButtom(){
        add_action( 'wp_footer', function (){
            require_once(dirname(__FILE__) . '/page/hb_line_button_tiny_button.php');
        });
    }
    private function addSettingPage(){
        add_action('admin_menu', function () {
            add_submenu_page(
                'tools.php',
                __('HB Line Button', 'hb-line-button-tiny'),
                __('HB Line Button', 'hb-line-button-tiny'),
                'administrator',
                'hb_line_button_tiny',
                function (){
                    require_once(dirname(__FILE__) . '/page/hb_line_button_tiny_setting.php');
                }
            );
        });
    }


}


new hb_line_button_tiny_admin();




<?php
/*
 * Plugin Name:       My First Plugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           7.1.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Zubair
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */

 if(!defined('ABSPATH')){
    die("");
 }


function firstplugin_do_action_on_registration() {
    $user = wp_get_current_user();
    $welcome_message = sprintf("Hello %s! Thank you for activating your plugin", $user->user_login);

    set_transient('firstplugin_activation_notice', $welcome_message, 5);
}


register_activation_hook(__FILE__, 'firstplugin_do_action_on_registration');


function display_activation_notice() {
    $activation_notice = get_transient('firstplugin_activation_notice');

    if ($activation_notice) {
        ?>
        <div class="notice notice-success is-dismissible">
            <p><?php echo esc_html($activation_notice); ?></p>
        </div>
        <?php
        delete_transient('firstplugin_activation_notice');
    }
}
add_action('admin_notices', 'display_activation_notice');

// Hook the function to the plugin activation
register_activation_hook(__FILE__, 'firstplugin_do_action_on_registration');


register_activation_hook(__FILE__, 'firstplugin_do_action_on_registration');


function first_plugin_function(){
echo "First Plugin";
}

add_action( 'admin_menu', 'wporg_options_page' );

function wporg_options_page() {
add_menu_page( 'first_plugin_Page', 'FirstPlugin Menu', 'manage_options', 'firstplugin', 'first_plugin_function', 'dashicons-admin-site', 5 );
}

// Short Codes 

add_shortcode( 'shortcode', 'first_shortcode_function' );

function first_shortcode_function($params){
    $values = shortcode_atts(
        array(
            "name"=>"Zubair",
            "class"=>"Wordpress"
        ), $params
    );

    echo "Name: ". $values['name']. " and class: ". $values['class'];
}

// Second Short code
add_shortcode( 'shortcodetwo', 'second_shortcode' );

function second_shortcode($params, $content){
    echo "<h1>". $content ."</h1>";
}

// Third Short code
add_shortcode( 'shortcodethird', 'third_shortcode' );
add_shortcode( 'first_tag', 'third_shortcode' );
add_shortcode( 'second_tag', 'third_shortcode' );

function third_shortcode($params, $content,$tag){
    if ($tag == "first_tag"){
        echo "This is the first tag";
    }

    if ($tag == "second_tag"){
        echo "<subscript>". $content ."</subscript>";
    }
    echo "Third short code";
}



?>
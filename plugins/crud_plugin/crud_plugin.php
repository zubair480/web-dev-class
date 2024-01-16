<?php

/*
  Plugin Name: CRUD Plugin
  Description: Plugin for learning CRUD operations
  Version: 1.0.0
  Author: Zubair
  Author URI: http://zubair.com
 */

global $db_version;
$db_version = '1.0';

function database() {
    global $wpdb;
    global $db_version;

    $table_name = $wpdb->prefix . 'employee_list';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		name tinytext NOT NULL,
		address text NOT NULL,
		role text NOT NULL,
		contact bigint(12), 
		PRIMARY KEY  (id)
	) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );

    add_option( 'db_version', $db_version );
}
register_activation_hook( __FILE__, 'database' );
//adding in menu
add_action('admin_menu', 'at_try_menu');

function at_try_menu() {
    //adding plugin in menu
    add_menu_page('employee_list', 
        'Employee Listing', 
        'manage_options', 
        'Employee_Listing', 
        'employee_list' 
    );
    //adding submenu to a menu
    add_submenu_page('Employee_Listing',
        'employee_insert',
        'Employee Insert',
        'manage_options',
        'Employee_Insert',
        'employee_insert'
    );
    add_submenu_page( null,
        'employee_update',
        'Employee Update',
        'manage_options',
        'Employee_Update',
        'employee_update'
    );
    add_submenu_page( null,
        'employee_delete',
        'Employee Delete',
        'manage_options',
        'Employee_Delete',
        'employee_delete'
    );
}


// returns the root directory path of particular plugin
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'employee_list.php');
require_once (ROOTDIR.'employee_insert.php');
require_once (ROOTDIR.'employee_update.php');
require_once (ROOTDIR.'employee_delete.php');
?>
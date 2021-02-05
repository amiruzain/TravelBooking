<?php 
    /*
    Plugin Name: Booking Trip by Nt
    Plugin URI: http://www.midnightproject.id
    Description: Plugin for handling Booking Trip
    Author: Nt04
    Version: 1.0
    Author URI: http://www.midnightproject.id
    */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // disable direct access
}

if ( ! class_exists( 'Booking_Trip_Plugin' ) ) :
	add_action( 'wp_enqueue_scripts', 'booking_trip_scripts' );
	add_action( 'admin_enqueue_scripts', 'bookin_trip_admin_scripts' );

	//enqueues scripts and styled on the front end
	function booking_trip_scripts(){
		wp_enqueue_style('booking-theme', plugin_dir_url(__FILE__). 'css/theme.css');
		wp_enqueue_style('step-form', plugin_dir_url(__FILE__). 'library/myvalidation/myvalidation.min.css');		
		wp_enqueue_style('booking-validation', plugin_dir_url(__FILE__). 'library/step-form/step-form.css');
		wp_enqueue_style('booking-datepicker', plugin_dir_url(__FILE__). 'library/date-picker/bootstrap-datepicker3.css');
		wp_enqueue_style('booking-timepicker', plugin_dir_url(__FILE__). 'library/time-picker/bootstrap-timepicker.min.css');
		
		wp_enqueue_script( 'booking-vendor-js', plugin_dir_url(__FILE__). 'library/vendor/jquery.min.js', array( ));
		wp_enqueue_script( 'booking-theme-js', plugin_dir_url(__FILE__). 'js/theme.js', array( ));
		wp_enqueue_script( 'step-form-js', plugin_dir_url(__FILE__). 'library/step-form/step-form.js', array( ));
		wp_enqueue_script( 'step-backstretch-js', plugin_dir_url(__FILE__). 'library/step-form/jquery.backstretch.min.js', array( ));
		wp_enqueue_script( 'booking-validation-js', plugin_dir_url(__FILE__). 'library/myvalidation/myvalidation.min.js', array( ));
		wp_enqueue_script( 'booking-datepicker-js', plugin_dir_url(__FILE__). 'library/date-picker/bootstrap-datepicker.min.js', array( ));
		wp_enqueue_script( 'booking-timepicker-js', plugin_dir_url(__FILE__). 'library/time-picker/bootstrap-timepicker.min.js', array( ));	
	}
	
	//enqueues scripts and styled on the back end
	function bookin_trip_admin_scripts(){
		//wp_enqueue_style('booking-bootstrap-theme', plugin_dir_url(__FILE__). 'bootstrap/css/bootstrap.min.css');
		
		//wp_enqueue_script( 'booking-bootstrap-theme-js', plugin_dir_url(__FILE__). 'bootstrap/js/bootstrap.min.js', array( ));
	
		//wp_enqueue_script('tripout-countdown-jquery-js', plugin_dir_url(__FILE__). 'js/jquery.tripout.countdown.js', array( ), '1.0.0', true);
		//wp_enqueue_script( 'booking-vendor-js', plugin_dir_url(__FILE__). 'library/vendor/jquery.min.js', array( ));
		
		wp_enqueue_style('booking-table-theme', plugin_dir_url(__FILE__). 'library/data-table/css/jquery.dataTables.css');
		wp_enqueue_style('booking-validation', plugin_dir_url(__FILE__). 'library/myvalidation/myvalidation.min.css');
		
		wp_enqueue_script( 'booking-table-theme-js', plugin_dir_url(__FILE__). 'library/data-table/js/jquery.dataTables.js', array( ));
		wp_enqueue_script( 'booking-my-table-js', plugin_dir_url(__FILE__). 'library/data-table/table-theme.js', array( ));
		
		wp_enqueue_script( 'booking-theme-js', plugin_dir_url(__FILE__). 'js/admin-theme.js', array( ));
		wp_enqueue_script( 'booking-validation-js', plugin_dir_url(__FILE__). 'library/myvalidation/myvalidation.min.js', array( ));		
	}
	
endif;

	
add_action( 'admin_menu', 'booking_trip_menu' );

function booking_trip_menu() {
	add_menu_page( 'Booking Trip Plugin', 'Booking Trip', 'manage_options', 'booking-setting', 'booking_trip_admin_page', 'dashicons-calendar-alt', 5 );
	add_submenu_page( 'booking-setting', 'Data Booking Peserta', 'Booking', 'manage_options', 'booking-setting', 'booking_trip');
	add_submenu_page( 'booking-setting', 'Tambah Data Trip', 'Add Trip', 'manage_options', 'add-trip-setting', 'add_data_trip');
	add_submenu_page( 'booking-setting', 'Data Trip', 'Data Trip', 'manage_options', 'control-trip-setting', 'control_data_trip');
	add_submenu_page( 'booking-setting', 'Parent Trip', 'Parent Trip', 'manage_options', 'parent-trip-setting', 'parent_trip');
	add_submenu_page( 'booking-setting', 'Setting Booking Trip', 'Setting', 'manage_options', 'trip-setting', 'setting_trip');	
	
	//add_submenu_page( null, 'View Booking Trip', 'View Booking', 'manage_options', 'view-trip', 'view_trip');	
}
	
function booking_trip_admin_page(){
	
}

function booking_trip (){
	include('inc/control-booking.php');	
}

function add_data_trip (){
	include('inc/add-trip.php');
}

function control_data_trip (){
	include('inc/control-trip.php');
}

function parent_trip (){
	include('inc/parent-trip.php');
}

function setting_trip (){
	include('inc/setting.php');
}

/*
function view_trip (){
	include('inc/setting.php');
}
*/

//include widgets
include(plugin_dir_path(__FILE__) . 'widget/widget-trip.php');

add_action( 'wp', 'booking_frontend' );

function booking_frontend()
{
	if( is_page('booking-trip') ){	
		$dir = plugin_dir_path( __FILE__ );
		include( $dir. 'inc/page-booking.php' );
		die();
	}
}
	
?>
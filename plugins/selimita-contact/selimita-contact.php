<?php
/*
Plugin Name: Selimita Contact
Plugin URI:
Description: Companion Plugin for Selimita Contact SECTION
Version: 1.0.0
Author: SELIMITA
Author URI:
License: GPLv2 or later
Text Domain: selimita-contact
Domain Path: /languages/
*/
function selimita_contact_textdomain() {
	load_plugin_textdomain( 'selimita-contact', false, dirname( __FILE__ ) . "/languages" );
}
add_action( 'plugins_loaded', 'selimita_contact_textdomain' );

// Contact => Get IN Touch
function selimita_contact_mail(){
	if(check_ajax_referer('contact','cn')) {
		$name    = isset( $_POST['name'] ) ? $_POST['name'] : '';
		$email   = isset( $_POST['email'] ) ? $_POST['email'] : '';
		$phone   = isset( $_POST['phone'] ) ? $_POST['phone'] : '';
		$message = isset( $_POST['message'] ) ? $_POST['message'] : '';

		$_message    = sprintf( "%s \nFrom: %s\nEmail: %s\nPhone: %s", $message, $name, $email, $phone );
		$admin_email = get_option( 'admin_email' );

		//postfix

		wp_mail( 'me@hasin.me', __( 'Someone tried to contact you', 'meal' ), $_message, "From: hasin@hasinhayder.com\r\n" );
		// wp_mail( $admin_email, __( 'Someone tried to contact you', 'meal' ), $_message, "From: {$admin_email}\r\n" );
		die( 'successful' );
	}
	die('error');
}
add_action('wp_ajax_contact','selimita_contact_mail');
add_action('wp_ajax_nopriv_contact','selimita_contact_mail');






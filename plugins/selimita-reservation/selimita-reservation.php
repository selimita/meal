<?php
/*
Plugin Name: Selimita Reservation
Plugin URI:
Description: Companion Plugin for Selimita Reservation SECTION
Version: 1.0.0
Author: SELIMITA
Author URI:
License: GPLv2 or later
Text Domain: selimita-reservation
Domain Path: /languages/
*/
function mealc_load_text_domain() {
	load_plugin_textdomain( 'meal-companion', false, dirname( __FILE__ ) . "/languages" );
}
add_action( 'plugins_loaded', 'mealc_load_text_domain' );

// Reservation JS Enqueue
function meal_reservation_assets(){
    if ( is_page_template( 'landing.php' ) ) {
        wp_enqueue_script( 'meal-reservation-js', get_template_directory_uri() . '/assets/js/reservation.js', array( 'jquery' ), VERSION, true );
        $ajaxurl = admin_url( 'admin-ajax.php' );
        wp_localize_script( 'meal-reservation-js', 'mealurl', array( 'ajaxurl' => $ajaxurl ) );
    }
}
//add_action( 'wp_enqueue_scripts', 'meal_reservation_assets' );

function mealc_register_my_cpts_section() {

	/**
	 * Post Type: Section.
	 */

	$labels = array(
		"name"          => __( "Reservation", "meal-companion" ),
		"singular_name" => __( "Reservations", "meal-companion" ),
	);

	$args = array(
		"label"               => __( "Reservation", "meal-companion" ),
		"labels"              => $labels,
		"description"         => "",
		"public"              => false,
		"publicly_queryable"  => false,
		"show_ui"             => true,
		"show_in_rest"        => false,
		"rest_base"           => "",
		"has_archive"         => false,
		"show_in_menu"        => true,
		"show_in_nav_menus"   => false,
		"exclude_from_search" => true,
		"capability_type"     => "post",
		"map_meta_cap"        => true,
		"hierarchical"        => false,
		"rewrite"             => array( "slug" => "reservation", "with_front" => true ),
		"query_var"           => true,
		"menu_position"       => 5,
		"menu_icon"           => "dashicons-media-document",
		"supports"            => array( "title" ),
	);

	register_post_type( "reservation", $args );
}

add_action( 'init', 'mealc_register_my_cpts_section' );

// Reservation FUNCTION
function meal_process_reservation() {
	if ( check_ajax_referer( 'reservation', 'rn' ) ) {
		$name    = sanitize_text_field( $_POST['name'] );
		$email   = sanitize_text_field( $_POST['email'] );
		$persons = sanitize_text_field( $_POST['persons'] );
		$phone   = sanitize_text_field( $_POST['phone'] );
		$date    = sanitize_text_field( $_POST['date'] );
		$time    = sanitize_text_field( $_POST['time'] );
		$data = array(
			'name'    => $name,
			'email'   => $email,
			'phone'   => $phone,
			'persons' => $persons,
			'date'    => $date,
			'time'    => $time
		);
		//print_r( $data );
		$reservation_arguments = array(
			'post_type'   => 'reservation',
			'post_author' => 1,
			'post_date'   => date( 'Y-m-d H:i:s' ),
			'post_status' => 'publish',
			'post_title'  => sprintf( '%s - Reservation for %s persons on %s - %s', $name, $persons, $date . " : " . $time, $email ),
			'meta_input'  => $data
		);
		$reservations = new WP_Query( array(
			'post_type'   => 'reservation',
			'post_status' => 'publish',
			'meta_query'  => array(
				'relation'    => 'AND',
				'email_check' => array(
					'key'   => 'email',
					'value' => $email
				),
				'date_check'  => array(
					'key'   => 'date',
					'value' => $date
				),
				'time_check'  => array(
					'key'   => 'time',
					'value' => $time
				),
			)
		) );
		if ( $reservations->found_posts > 0 ) {
			echo 'Duplicate';
		} else {
			$wp_error = '';
			$reservation_id = wp_insert_post( $reservation_arguments, $wp_error );

            //transient check
			$reservation_count = get_transient('res_count')?get_transient('res_count'):0;
			//transient check end

			if ( ! $wp_error ) {
				$reservation_count++;
                set_transient('res_count',$reservation_count,0);

				$_name      = explode( " ", $name );
				$order_data = array(
					'first_name' => $_name[0],
					'last_name'  => isset( $_name[1] ) ? $_name[1] : '',
					'email'      => $email,
					'phone'      => $phone,
				);
				$order      = wc_create_order();
				$order->set_address( $order_data );
				$order->add_product( wc_get_product( 65 ), 1 );
				$order->set_customer_note( $reservation_id );
				$order->calculate_totals();

				add_post_meta( $reservation_id, 'order_id', $order->get_id() );

				echo $order->get_checkout_payment_url();
			}
		}
	} else {
		echo 'Not allowed';
	}
	die();
}
add_action( 'wp_ajax_reservation', 'meal_process_reservation' );
add_action( 'wp_ajax_nopriv_reservation', 'meal_process_reservation' );

// Reservation Count
function meal_change_menu($menu){
    /* echo '<pre>';
    print_r($menu);
    echo '</pre>';
    die(); */
	$reservation_count = get_transient('res_count')?get_transient('res_count'):0;
	if($reservation_count>0){
		$menu[3][0] = "Reservation <span class='awaiting-mod'>{$reservation_count}</span> ";
	}
	return $menu;
}
add_filter('add_menu_classes','meal_change_menu');

function meal_admin_scripts($screen){
	$_screen = get_current_screen();
	if('edit.php'==$screen && 'reservation'==$_screen->post_type){
		delete_transient('res_count');
	}
}
add_action('admin_enqueue_scripts','meal_admin_scripts');

// WooCommerce Default OFF
function meal_checkout_fields( $fields ) {

	// remove billing fields
	unset( $fields['billing']['billing_company'] );
	unset( $fields['billing']['billing_address_1'] );
	unset( $fields['billing']['billing_address_2'] );
	unset( $fields['billing']['billing_city'] );
	unset( $fields['billing']['billing_postcode'] );
	unset( $fields['billing']['billing_country'] );
	unset( $fields['billing']['billing_state'] );

	// remove shipping fields
	unset( $fields['shipping']['shipping_first_name'] );
	unset( $fields['shipping']['shipping_last_name'] );
	unset( $fields['shipping']['shipping_company'] );
	unset( $fields['shipping']['shipping_address_1'] );
	unset( $fields['shipping']['shipping_address_2'] );
	unset( $fields['shipping']['shipping_city'] );
	unset( $fields['shipping']['shipping_postcode'] );
	unset( $fields['shipping']['shipping_country'] );
	unset( $fields['shipping']['shipping_state'] );

	// remove order comment fields
	unset( $fields['order']['order_comments'] );

	return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'meal_checkout_fields' );

// WooCommerce Order STATUS
function meal_order_status_processing( $order_id ) {
	$order          = wc_get_order( $order_id );
	$reservation_id = $order->get_customer_note();
	if ( $reservation_id ) {
		$reservation = get_post( $reservation_id );
		wp_update_post( array(
			'ID'         => $reservation_id,
			'post_title' => "[Paid] - " . $reservation->post_title
		) );

		add_post_meta( $reservation_id, 'paid', 1 );
	}
}
add_filter( 'woocommerce_order_status_processing', 'meal_order_status_processing' );





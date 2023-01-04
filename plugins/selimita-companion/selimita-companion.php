<?php
/*
Plugin Name: Selimita Companion
Plugin URI:
Author: SELIMITA
Author URI: https://plugins.selimita.com
Description: Selimita Companion by free.selimita.com
Version: 1.0.0
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: selimita
Domain Path: /languages/
*/

// Load PLUGIN Textdomain => load_plugin_texdomain()
function selimita_plugin_textdomain(){
    load_plugin_textdomain('selimita-companion',false,dirname(__FILE__)."/languages");
}
add_action("plugins_loaded", "selimita_plugin_textdomain");

// All Sections & Add Section ACF META DATA
if( function_exists('acf_add_local_field_group') ):
// Add Section META DATA ACF
acf_add_local_field_group(array(
	'key' => 'group_63a92fe0618df',
	'title' => 'Add Section',
	'fields' => array(
		array(
			'key' => 'field_63a92fe1d731c',
			'label' => 'Add Section',
			'name' => 'add_section',
			'aria-label' => '',
			'type' => 'post_object',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array(
				0 => 'section',
			),
			'taxonomy' => '',
			'return_format' => 'id',
			'multiple' => 1,
			'allow_null' => 0,
			'ui' => 1,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
			array(
				'param' => 'post_template',
				'operator' => '==',
				'value' => 'landing.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
));
// All Sections META DATA ACF
acf_add_local_field_group(array(
	'key' => 'group_63a92d77c0a12',
	'title' => 'All Sections',
	'fields' => array(
		array(
			'key' => 'field_63a92d7ae8803',
			'label' => 'All Sections',
			'name' => 'all_sections',
			'aria-label' => '',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'Banner' => 'Banner',
				'Featured' => 'Featured',
				'Gallery' => 'Gallery',
				'Chef' => 'Chef',
				'Services' => 'Services',
				'Testimonials' => 'Testimonials',
			),
			'default_value' => false,
			'return_format' => 'value',
			'multiple' => 0,
			'allow_null' => 0,
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_63a939113a4eb',
			'label' => 'Banner Image',
			'name' => 'banner_image',
			'aria-label' => '',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_63a92d7ae8803',
						'operator' => '==',
						'value' => 'Banner',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
			'preview_size' => 'medium',
		),
		array(
			'key' => 'field_63a93e2610224',
			'label' => 'Banner Button',
			'name' => 'banner_button',
			'aria-label' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_63a92d7ae8803',
						'operator' => '==',
						'value' => 'Banner',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'maxlength' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_63a93e6110225',
			'label' => 'Banner URL',
			'name' => 'banner_url',
			'aria-label' => '',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_63a92d7ae8803',
						'operator' => '==',
						'value' => 'Banner',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'section',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
));
endif;

// Custom POST Type => CPT UI
function selimita_custom_section() {
	/**
	 * Post Type: Sections.
	 */
	$labels = [
		"name" => esc_html__( "Sections", "meal" ),
		"singular_name" => esc_html__( "Section", "meal" ),
	];
	$args = [
		"label" => esc_html__( "Sections", "meal" ),
		"labels" => $labels,
		"description" => "",
		"public" => false,
		"publicly_queryable" => false,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"can_export" => false,
		"rewrite" => [ "slug" => "section", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];
	register_post_type( "section", $args );
}
add_action( 'init', 'selimita_custom_section' );

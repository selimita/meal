<?php
if( function_exists('acf_add_local_field_group') ):

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
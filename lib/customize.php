<?php

/* Removing Customize from Appearance */
function dctr_remove_customize_page(){
	global $submenu;
	unset($submenu['themes.php'][6]); // remove customize link
}
add_action( 'admin_menu', 'dctr_remove_customize_page');


/* Adding Customizer into Menu */
function dctr_register_menu_item_for_customizer() {
	add_menu_page( 'Customizer title', 'Theme Options', 'manage_options', 'customize.php', '', '', 100 );
}
add_action( 'admin_menu', 'dctr_register_menu_item_for_customizer' );


/* Customizer Main */
function dctr_customizer($wp_customize) {

    
    // $wp_customize->remove_panel('widgets');
    // $wp_customize->remove_panel( 'nav_menus');

    // $wp_customize->remove_section('background_image');
    // $wp_customize->remove_section('colors');
    // $wp_customize->remove_section('nav');
    // $wp_customize->remove_section('static_front_page');
    // $wp_customize->remove_section('title_tagline');
    // $wp_customize->remove_section('custom_css');

    // $wp_customize->remove_control('blogdescription');
    // $wp_customize->remove_control('header_image');


    /* ======================== section ======================== */
	$wp_customize -> add_section('section_top_bar', array(
		'title'     => 'Top Bar',
		'priority'  => 1
	));

	// $wp_customize -> add_setting('logo', array(
	// 	'default'   => '',
	// 	'transport' => 'refresh'
	// ));		
	// $wp_customize -> add_control(
	// 	new WP_Customize_Image_Control($wp_customize,'logo',array(
	// 		'section'   => 'section_1',
	// 		'label'     => 'Logo'
	// 	))
	// );
	$wp_customize -> add_setting('top_bar_phone_no', array(
		'default'   => '',
		'transport' => 'refresh'
	));
	$wp_customize -> add_control('top_bar_phone_no', array(
		'section'   => 'section_top_bar',
		'label'     => 'Phone Number',
		'type'      => 'text'
	));
	$wp_customize -> add_setting('top_bar_email', array(
		'default'   => '',
		'transport' => 'refresh'
	));
	$wp_customize -> add_control('top_bar_email', array(
		'section'   => 'section_top_bar',
		'label'     => 'Email Address',
		'type'      => 'text'
	));



	for($i=1;$i<=5;$i++) {
		$wp_customize -> add_setting('top_bar_social_'.$i.'_icon', array(
			'default'   => '',
			'transport' => 'refresh'
		));
		$wp_customize -> add_control('top_bar_social_'.$i.'_icon', array(
			'section'   => 'section_top_bar',
			'label'     => 'Social '.$i.' - Icon Code',
			'type'      => 'text'
		));
		$wp_customize -> add_setting('top_bar_social_'.$i.'_url', array(
			'default'   => '',
			'transport' => 'refresh'
		));
		$wp_customize -> add_control('top_bar_social_'.$i.'_url', array(
			'section'   => 'section_top_bar',
			'label'     => 'Social '.$i.' - URL',
			'type'      => 'text'
		));
	}


	// $wp_customize -> add_setting('top_bar_social_1_icon', array(
	// 	'default'   => '',
	// 	'transport' => 'refresh'
	// ));
	// $wp_customize -> add_control('top_bar_social_1_icon', array(
	// 	'section'   => 'section_top_bar',
	// 	'label'     => 'Social 1 - Icon Code',
	// 	'type'      => 'text'
	// ));
	// $wp_customize -> add_setting('top_bar_social_1_url', array(
	// 	'default'   => '',
	// 	'transport' => 'refresh'
	// ));
	// $wp_customize -> add_control('top_bar_social_1_url', array(
	// 	'section'   => 'section_top_bar',
	// 	'label'     => 'Social 1 - URL',
	// 	'type'      => 'text'
	// ));

	// $wp_customize -> add_setting('top_bar_social_2_icon', array(
	// 	'default'   => '',
	// 	'transport' => 'refresh'
	// ));
	// $wp_customize -> add_control('top_bar_social_2_icon', array(
	// 	'section'   => 'section_top_bar',
	// 	'label'     => 'Social 2 - Icon Code',
	// 	'type'      => 'text'
	// ));
	// $wp_customize -> add_setting('top_bar_social_2_url', array(
	// 	'default'   => '',
	// 	'transport' => 'refresh'
	// ));
	// $wp_customize -> add_control('top_bar_social_2_url', array(
	// 	'section'   => 'section_top_bar',
	// 	'label'     => 'Social 2 - URL',
	// 	'type'      => 'text'
	// ));


	// $wp_customize -> add_setting('top_bar_social_3_icon', array(
	// 	'default'   => '',
	// 	'transport' => 'refresh'
	// ));
	// $wp_customize -> add_control('top_bar_social_3_icon', array(
	// 	'section'   => 'section_top_bar',
	// 	'label'     => 'Social 3 - Icon Code',
	// 	'type'      => 'text'
	// ));
	// $wp_customize -> add_setting('top_bar_social_3_url', array(
	// 	'default'   => '',
	// 	'transport' => 'refresh'
	// ));
	// $wp_customize -> add_control('top_bar_social_3_url', array(
	// 	'section'   => 'section_top_bar',
	// 	'label'     => 'Social 3 - URL',
	// 	'type'      => 'text'
	// ));


	// $wp_customize -> add_setting('top_bar_social_4_icon', array(
	// 	'default'   => '',
	// 	'transport' => 'refresh'
	// ));
	// $wp_customize -> add_control('top_bar_social_4_icon', array(
	// 	'section'   => 'section_top_bar',
	// 	'label'     => 'Social 4 - Icon Code',
	// 	'type'      => 'text'
	// ));
	// $wp_customize -> add_setting('top_bar_social_4_url', array(
	// 	'default'   => '',
	// 	'transport' => 'refresh'
	// ));
	// $wp_customize -> add_control('top_bar_social_4_url', array(
	// 	'section'   => 'section_top_bar',
	// 	'label'     => 'Social 4 - URL',
	// 	'type'      => 'text'
	// ));


	// $wp_customize -> add_setting('top_bar_social_5_icon', array(
	// 	'default'   => '',
	// 	'transport' => 'refresh'
	// ));
	// $wp_customize -> add_control('top_bar_social_5_icon', array(
	// 	'section'   => 'section_top_bar',
	// 	'label'     => 'Social 5 - Icon Code',
	// 	'type'      => 'text'
	// ));
	// $wp_customize -> add_setting('top_bar_social_5_url', array(
	// 	'default'   => '',
	// 	'transport' => 'refresh'
	// ));
	// $wp_customize -> add_control('top_bar_social_5_url', array(
	// 	'section'   => 'section_top_bar',
	// 	'label'     => 'Social 5 - URL',
	// 	'type'      => 'text'
	// ));




	$wp_customize -> add_section('section_header', array(
		'title'     => 'Header',
		'priority'  => 2
	));

	$wp_customize -> add_setting('logo', array(
		'default'   => '',
		'transport' => 'refresh'
	));		
	$wp_customize -> add_control(
		new WP_Customize_Image_Control($wp_customize,'logo',array(
			'section'   => 'section_header',
			'label'     => 'Logo'
		))
	);
	$wp_customize -> add_setting('header_quote_text', array(
		'default'   => '',
		'transport' => 'refresh'
	));
	$wp_customize -> add_control('header_quote_text', array(
		'section'   => 'section_header',
		'label'     => 'Quote Text',
		'type'      => 'text'
	));
	$wp_customize -> add_setting('header_quote_url', array(
		'default'   => '',
		'transport' => 'refresh'
	));
	$wp_customize -> add_control('header_quote_url', array(
		'section'   => 'section_header',
		'label'     => 'Quote URL',
		'type'      => 'text'
	));


	/* ======================== panel ======================== */
	$wp_customize->add_panel('panel_home_page', 
		array(
			'priority' => 3,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => 'Home Page',
		) 
	);

	for($i=1;$i<=3;$i++) {
		$wp_customize -> add_section('section_feature_'.$i, array(
			'title'     => 'Featured Item '.$i,
			'priority'  => 2,
			'panel' => 'panel_home_page'
		));
		$wp_customize -> add_setting('feature_photo_'.$i, array(
			'default'   => '',
			'transport' => 'refresh'
		));
		$wp_customize -> add_control(
			new WP_Customize_Image_Control($wp_customize,'feature_photo_'.$i,array(
				'section'   => 'section_feature_'.$i,
				'label'     => 'Photo'
			))
		);
		$wp_customize -> add_setting('feature_title_'.$i, array(
			'default'   => '',
			'transport' => 'refresh'
		));
		$wp_customize -> add_control('feature_title_'.$i, array(
			'section'   => 'section_feature_'.$i,
			'label'     => 'Title',
			'type'      => 'text'
		));
		$wp_customize -> add_setting('feature_url_'.$i, array(
			'default'   => '',
			'transport' => 'refresh'
		));
		$wp_customize -> add_control('feature_url_'.$i, array(
			'section'   => 'section_feature_'.$i,
			'label'     => 'URL',
			'type'      => 'text'
		));
	}



	$wp_customize -> add_section('section_headlines', array(
			'title'     => 'All Section Headlines',
			'priority'  => 2,
			'panel' => 'panel_home_page'
		));
	$wp_customize -> add_setting('service_title', array(
		'default'   => '',
		'transport' => 'refresh'
	));
	$wp_customize -> add_control('service_title', array(
		'section'   => 'section_headlines',
		'label'     => 'Service Title',
		'type'      => 'text'
	));
	$wp_customize -> add_setting('service_text', array(
		'default'   => '',
		'transport' => 'refresh'
	));
	$wp_customize -> add_control('service_text', array(
		'section'   => 'section_headlines',
		'label'     => 'Service Text',
		'type'      => 'textarea'
	));

	$wp_customize -> add_setting('why_choose_us_title', array(
		'default'   => '',
		'transport' => 'refresh'
	));
	$wp_customize -> add_control('why_choose_us_title', array(
		'section'   => 'section_headlines',
		'label'     => 'Why Choose Us Title',
		'type'      => 'text'
	));
	$wp_customize -> add_setting('why_choose_us_text', array(
		'default'   => '',
		'transport' => 'refresh'
	));
	$wp_customize -> add_control('why_choose_us_text', array(
		'section'   => 'section_headlines',
		'label'     => 'Why Choose Us Text',
		'type'      => 'textarea'
	));


	$wp_customize -> add_setting('success_level_title', array(
		'default'   => '',
		'transport' => 'refresh'
	));
	$wp_customize -> add_control('success_level_title', array(
		'section'   => 'section_headlines',
		'label'     => 'Success Level Title',
		'type'      => 'text'
	));
	$wp_customize -> add_setting('success_level_text', array(
		'default'   => '',
		'transport' => 'refresh'
	));
	$wp_customize -> add_control('success_level_text', array(
		'section'   => 'section_headlines',
		'label'     => 'Success Level Text',
		'type'      => 'textarea'
	));

	$wp_customize -> add_setting('doctor_title', array(
		'default'   => '',
		'transport' => 'refresh'
	));
	$wp_customize -> add_control('doctor_title', array(
		'section'   => 'section_headlines',
		'label'     => 'Doctor Title',
		'type'      => 'text'
	));
	$wp_customize -> add_setting('doctor_text', array(
		'default'   => '',
		'transport' => 'refresh'
	));
	$wp_customize -> add_control('doctor_text', array(
		'section'   => 'section_headlines',
		'label'     => 'Doctor Text',
		'type'      => 'textarea'
	));

	$wp_customize -> add_setting('latest_news_title', array(
		'default'   => '',
		'transport' => 'refresh'
	));
	$wp_customize -> add_control('latest_news_title', array(
		'section'   => 'section_headlines',
		'label'     => 'Latest News Title',
		'type'      => 'text'
	));
	$wp_customize -> add_setting('latest_news_text', array(
		'default'   => '',
		'transport' => 'refresh'
	));
	$wp_customize -> add_control('latest_news_text', array(
		'section'   => 'section_headlines',
		'label'     => 'Latest News Text',
		'type'      => 'textarea'
	));	
}
add_action('customize_register', 'dctr_customizer', 20);

// require_once( get_template_directory() . '/inc/customizer/customizer-css.php' );
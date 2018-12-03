<?php



function nasa2_customize_register($wp_customize){

	$wp_customize->add_section('general_section', array(
		'title' => 'Setting CusTom',
		'priority' => 20
	));

	$wp_customize->add_setting('text_farid', array(
		'default' => 'HMM',
		'transport' => 'refresh'
	));

	$wp_customize->add_control('text_farid', array(

		'section' => 'general_section',
		'label' => 'Open Or Close',
		'type'	=> 'radio',
		'choices' => array(
			'Open' => 'Open',
			'Close' => 'Close',

		),
	));
// warna
	

	$wp_customize->add_setting('recentUpdatesCoy', array(
	'default' => '#ffffff',
	'transport' => 'postMessage',
	'type'		=> 'theme_mod',
	'sanitize_callback'	=> 'sanitize_hex_color',
	));

	$wp_customize->add_control(
			new WP_Customize_Color_Control(
				  $wp_customize,
				  'recentUpdatesCoy', array(
				  		'label' => __('Status Warna', 'nasa2'),
				  		'section' => 'general_section',
				  		'settings' => 'recentUpdatesCoy'

				  )
			));

	$wp_customize->add_setting('hmm1', array(
	'default' => '#ffffff',
	'transport' => 'postMessage',
	'type'		=> 'theme_mod',
	'sanitize_callback'	=> 'sanitize_hex_color',
	));

	$wp_customize->add_control(
			new WP_Customize_Color_Control(
				  $wp_customize,
				  'hmm1', array(
				  		'label' => __('Color Level 1', 'nasa2'),
				  		'section' => 'general_section',
				  		'settings' => 'hmm1'

				  )
			));

	$wp_customize->add_setting('hmm2', array(
	'default' => '#ffffff',
	'transport' => 'postMessage',
	'type'		=> 'theme_mod',
	'sanitize_callback'	=> 'sanitize_hex_color',
	));

	$wp_customize->add_control(
			new WP_Customize_Color_Control(
				  $wp_customize,
				  'hmm2', array(
				  		'label' => __('Color Level 2', 'nasa2'),
				  		'section' => 'general_section',
				  		'settings' => 'hmm2'

				  )
			));

	$wp_customize->add_setting('hmm3', array(
	'default' => '#ffffff',
	'transport' => 'postMessage',
	'type'		=> 'theme_mod',
	'sanitize_callback'	=> 'sanitize_hex_color',
	));

	$wp_customize->add_control(
			new WP_Customize_Color_Control(
				  $wp_customize,
				  'hmm3', array(
				  		'label' => __('Color Level 3', 'nasa2'),
				  		'section' => 'general_section',
				  		'settings' => 'hmm3'

				  )
			));

	$wp_customize->add_setting('hmm4', array(
	'default' => '#ffffff',
	'transport' => 'postMessage',
	'type'		=> 'theme_mod',
	'sanitize_callback'	=> 'sanitize_hex_color',
	));

	$wp_customize->add_control(
			new WP_Customize_Color_Control(
				  $wp_customize,
				  'hmm4', array(
				  		'label' => __('Color Level 3', 'nasa2'),
				  		'section' => 'general_section',
				  		'settings' => 'hmm4'

				  )
			));

}

?>
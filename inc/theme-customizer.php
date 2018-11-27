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
		'label' => 'Open Atau Close',
		'type'	=> 'radio',
		'choices' => array(
			'open' => 'open',
			'close' => 'close',

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


}

?>
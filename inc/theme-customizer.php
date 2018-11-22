<?php



function nasa2_customize_register($wp_customize){

	$wp_customize->add_section('general_section', array(
		'title' => 'General Options',
		'priority' => 20
	));

	$wp_customize->add_setting('text_farid', array(
		'default' => 'HMM',
		'transport' => 'refresh'
	));

	$wp_customize->add_control('text_farid', array(

		'section' => 'general_section',
		'label' => 'Open Atau Close',
		'type'	=> 'text'
	));

}

?>
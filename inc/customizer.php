<?php
add_action('customize_register', function (WP_Customize_Manager $wp_customize) {

	$wp_customize->add_section('eximstone_section', [
		'title' => __('Опции EximStone'),
		'priority' => 10,
	]);

	$wp_customize->add_setting('eximstone_slogan');
	$wp_customize->add_control('eximstone_slogan', [
		'label' => __('Слоган'),
		'section' => 'eximstone_section'
	]);

	$wp_customize->add_setting('eximstone_addr');
	$wp_customize->add_control('eximstone_addr', [
		'label' => __('Адрес'),
		'section' => 'eximstone_section'
	]);

	$wp_customize->add_setting('eximstone_phone1');
	$wp_customize->add_control('eximstone_phone1', [
		'label' => __('Номер телефона 1'),
		'section' => 'eximstone_section'
	]);

	$wp_customize->add_setting('eximstone_phone2');
	$wp_customize->add_control('eximstone_phone2', [
		'label' => __('Номер телефона 2'),
		'section' => 'eximstone_section'
	]);

	$wp_customize->add_setting('eximstone_email');
	$wp_customize->add_control('eximstone_email', [
		'label' => __('Email'),
		'section' => 'eximstone_section'
	]);

	$wp_customize->add_setting('eximstone_opening_hours');
	$wp_customize->add_control('eximstone_opening_hours', [
		'label' => __('График работы'),
		'section' => 'eximstone_section'
	]);
});
<?php
/**
 * Created by PhpStorm.
 * User: Masood.Usama
 * Date: 6/7/2016
 * Time: 8:14 PM
 */
function twenty_fourteen_child_enqueue(){
	// enqueue parent stylesheet.
	wp_enqueue_style( 'twenty_fourteen_parent', get_template_directory_uri().'/style.css' );

	// conditional check for mobile accordion menu
	if( get_theme_mod( 'accordion_sub_menu_setting') == 'enable'){
		wp_enqueue_script('twenty-fourteen-child-js.js', get_stylesheet_directory_uri() . '/js/twenty-fourteen-child-js.js');
	}
}
add_action( 'wp_enqueue_scripts', 'twenty_fourteen_child_enqueue' );

// Customize function.
if ( ! function_exists( 'tfc_customize_name_panel_section' ) ) {
	// Customize Register action.
	add_action( 'customize_register', 'tfc_customize_name_panel_section' );

	/**
	 * Customize: Panel.
	 *
	 * Customize function.
	 *
	 * @param  object WP_Customize  Instance of the WP_Customize_Manager class.
	 * @since  1.0.0
	 */
	function tfc_customize_name_panel_section( $wp_customize ) {
		// Setting: Accordian Sub Menu Setting
		$wp_customize->add_setting( 'accordion_sub_menu_setting', array(
			'type'                 => 'theme_mod',
			'default'              => 'disable',
			'transport'            => 'refresh', // Options: refresh or postMessage.
			'capability'           => 'edit_theme_options',
			'theme_supports' 		=> 'menus', // Optional. This can be used to hide a setting if the theme lacks support for a specific feature (using add_theme_support).
		) );
		// Control: Name.
		$wp_customize->add_control( 'accordion_sub_menu', array(
			'label'       => __( 'Mobile Dropdown Accordion', 'twentyfourteen' ),
			'section'     => 'menu_locations',
			'type'        => 'select', // text (default | variations email/url/number/hidden/date), textarea, checkbox, radio/select (requires choices array below), dropdown-pages
			'choices'  => array(
				'enable'  => 'Enable',
				'disable' => 'Disable',
			),
			'settings'    => 'accordion_sub_menu_setting',
			//'active_callback' => 'is_front_page',
		) );
	}
}




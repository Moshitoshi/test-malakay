<?php
/**
 * Malakay Theme Customizer
 *
 * @package Malakay
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function malakay_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'malakay_customize_register' );





if ( ! function_exists( 'malakay_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function malakay_theme_customize_register( $wp_customize ) {

		// Theme layout settings.
		$wp_customize->add_section( 'malakay_theme_layout_options', array(
			'title'       => __( 'Theme Layout Settings', 'malakay' ),
			'capability'  => 'edit_theme_options',
			'description' => __( 'Container width and sidebar defaults', 'malakay' ),
			'priority'    => 160,
		) );

		$wp_customize->add_setting( 'malakay_container_type', array(
			'default'           => 'container',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'container_type', array(
					'label'       => __( 'Container Width', 'malakay' ),
					'description' => __( "Choose between Bootstrap's container and container-fluid", 'malakay' ),
					'section'     => 'malakay_theme_layout_options',
					'settings'    => 'malakay_container_type',
					'type'        => 'select',
					'choices'     => array(
						'container'       => __( 'Fixed width container', 'malakay' ),
						'container-fluid' => __( 'Full width container', 'malakay' ),
					),
					'priority'    => '10',
				)
			) );

		$wp_customize->add_setting( 'malakay_sidebar_position', array(
			'default'           => 'right',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'malakay_sidebar_position', array(
					'label'       => __( 'Sidebar Positioning', 'malakay' ),
					'description' => __( "Set sidebar's default position. Can either be: right, left, both or none. Note: this can be overridden on individual pages.",
					'malakay' ),
					'section'     => 'malakay_theme_layout_options',
					'settings'    => 'malakay_sidebar_position',
					'type'        => 'select',
					'choices'     => array(
						'right' => __( 'Right sidebar', 'malakay' ),
						'left'  => __( 'Left sidebar', 'malakay' ),
						'both'  => __( 'Left & Right sidebars', 'malakay' ),
						'none'  => __( 'No sidebar', 'malakay' ),
					),
					'priority'    => '20',
				)
			) );
	}
} // endif function_exists( 'malakay_theme_customize_register' ).
add_action( 'customize_register', 'malakay_theme_customize_register' );







/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function malakay_customize_preview_js() {
	wp_enqueue_script( 'malakay_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'malakay_customize_preview_js' );

if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'miniatura', 150, 150, true); //(immagine ritagliata)

}

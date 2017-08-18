<?php
/**
 * Menus configuration.
 *
 * @package Chefplaza
 */

add_action( 'after_setup_theme', 'chefplaza_register_menus', 5 );
function chefplaza_register_menus() {

	// This theme uses wp_nav_menu() in four locations.
	register_nav_menus( array(
		'top'    => esc_html__( 'Top', 'chefplaza' ),
		'main'   => esc_html__( 'Main', 'chefplaza' ),
		'footer' => esc_html__( 'Footer', 'chefplaza' ),
		'social' => esc_html__( 'Social', 'chefplaza' ),
	) );
}

<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Chefplaza
 */
$sidebar_position = get_theme_mod( 'sidebar_position' );

if ( 'fullwidth' === $sidebar_position
     || is_404()
     || ! is_active_sidebar( 'sidebar' )
     || ( function_exists( 'is_shop' ) && is_shop() )
     || is_singular( 'product' ) ) {
	return;
}

do_action( 'chefplaza_render_widget_area', 'sidebar' );

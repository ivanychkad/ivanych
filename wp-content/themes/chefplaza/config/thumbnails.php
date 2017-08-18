<?php
/**
 * Thumbnails configuration.
 *
 * @package Chefplaza
 */

add_action( 'after_setup_theme', 'chefplaza_register_image_sizes', 5 );
function chefplaza_register_image_sizes() {
	set_post_thumbnail_size( 370, 230, true );

	// Registers a new image sizes.
	add_image_size( 'chefplaza-thumb-s', 150, 150, true );
	add_image_size( 'chefplaza-thumb-m', 400, 400, true );
	add_image_size( 'chefplaza-thumb-l', 1170, 780, true );
	add_image_size( 'chefplaza-thumb-xl', 1920, 1080, true );
	add_image_size( 'chefplaza-author-avatar', 512, 512, true );
	add_image_size( 'chefplaza-thumb-247-107', 240, 100, true );
	add_image_size( 'chefplaza-thumb-536-257', 536, 257, true );
	add_image_size( 'chefplaza-thumb-560-350', 560, 350, true );
	add_image_size( 'chefplaza-thumb-425-273', 425, 273, true );
	add_image_size( 'chefplaza-thumb-1728-830', 1728, 830, true );
}

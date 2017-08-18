<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Chefplaza
 */

while ( have_posts() ) : the_post();

	get_template_part( 'template-parts/content-single', get_post_format() );

	if ( get_theme_mod( 'single_post_navigation', chefplaza_theme()->customizer->get_default( 'single_post_navigation' ) ) ) :

		the_post_navigation( array(
			'next_text' => esc_html__( 'Next post', 'chefplaza' ),
			'prev_text' => esc_html__( 'Previous post', 'chefplaza' ),
		) );

	endif;

	chefplaza_post_author_bio();

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;

endwhile; // End of the loop.

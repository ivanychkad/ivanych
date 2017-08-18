<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Chefplaza
 */
?>

<section class="error-404 not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( '404', 'chefplaza' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<h1><?php esc_html_e( 'The page not found.', 'chefplaza' ); ?></h1>
		<h5><?php esc_html_e( 'Unfortunately the page you were looking for could not be found. Maybe search can help
		.', 'chefplaza' ); ?></h5>

		<?php get_search_form(); ?>

	</div><!-- .page-content -->
</section><!-- .error-404 -->
<?php
/**
 * Contextual functions for the header, footer, content and sidebar classes.
 *
 * @package Chefplaza
 */

/**
 *
 * Contain utility module from Cherry framework
 *
 * @since  1.0.0
 * @return object
 */

function chefplaza_utility() {
	return chefplaza_theme()->get_core()->modules['cherry-utility'];
}

/**
 * Prints site header CSS classes.
 *
 * @since  1.0.0
 *
 * @param  array $classes Additional classes.
 *
 * @return void
 */
function chefplaza_header_class( $classes = array() ) {
	$classes[] = 'site-header';
	$classes[] = get_theme_mod( 'header_layout_type' );
	echo chefplaza_get_container_classes( $classes );
}

/**
 * Prints site content CSS classes.
 *
 * @since  1.0.0
 *
 * @param  array $classes Additional classes.
 *
 * @return void
 */
function chefplaza_content_class( $classes = array() ) {
	$classes[] = 'site-content';
	echo chefplaza_get_container_classes( $classes );
}

/**
 * Prints site footer CSS classes.
 *
 * @since  1.0.0
 *
 * @param  array $classes Additional classes.
 *
 * @return void
 */
function chefplaza_footer_class( $classes = array() ) {
	$classes[] = 'site-footer';
	$classes[] = get_theme_mod( 'footer_layout_type' );
	echo chefplaza_get_container_classes( $classes );
}

/**
 * Retrieve a CSS class attribute for container based on `Page Layout Type` option.
 *
 * @since  1.0.0
 *
 * @param  array $classes Additional classes.
 *
 * @return string
 */
function chefplaza_get_container_classes( $classes ) {
	$layout_type = get_theme_mod( 'page_layout_type' );

	if ( 'boxed' == $layout_type ) {
		$classes[] = 'container';
	}

	return 'class="' . join( ' ', $classes ) . '"';
}

/**
 * Prints primary content wrapper CSS classes.
 *
 * @since  1.0.0
 *
 * @param  array $classes Additional classes.
 *
 * @return void
 */
function chefplaza_primary_content_class( $classes = array() ) {
	echo chefplaza_get_layout_classes( 'content', $classes );
}

/**
 * Prints sidebar CSS class.
 *
 * @since  1.0.0
 *
 * @param  array $classes Additional classes.
 *
 * @return void
 */
function chefplaza_sidebar_class( $classes = array() ) {
	echo chefplaza_get_layout_classes( 'sidebar', $classes );
}

/**
 * Get CSS class attribute for passed layout context.
 *
 * @since  1.0.0
 *
 * @param  string $layout Layout context.
 * @param  array $classes Additional classes.
 *
 * @return string
 */
function chefplaza_get_layout_classes( $layout = 'content', $classes = array() ) {
	$sidebar_position = get_theme_mod( 'sidebar_position' );
	$sidebar_width    = get_theme_mod( 'sidebar_width' );

	if ( 'fullwidth' === $sidebar_position
	     || is_404()
	     || ( function_exists( 'is_shop' ) && is_shop() )
	     || ( function_exists( 'is_product' ) && is_product() ) ) {
		$sidebar_width = '0';
	}

	$layout_classes = ! empty( chefplaza_theme()->layout[ $sidebar_position ][ $sidebar_width ][ $layout ] ) ? chefplaza_theme()->layout[ $sidebar_position ][ $sidebar_width ][ $layout ] : array();

	if ( ! empty( $classes ) ) {
		$layout_classes = array_merge( $layout_classes, $classes );
	}

	if ( empty( $layout_classes ) ) {
		return '';
	}

	$layout_classes = apply_filters( "chefplaza_{$layout}_classes", $layout_classes );

	return 'class="' . join( ' ', $layout_classes ) . '"';
}

/**
 * Retrieve or print `class` attribute for Post List wrapper.
 *
 * @since  1.0.0
 *
 * @param  array $classes Additional classes.
 * @param  boolean $echo True for print. False - return.
 *
 * @return string|void
 */
function chefplaza_posts_list_class( $classes = array(), $echo = true ) {
	$layout_type      = get_theme_mod( 'blog_layout_type', chefplaza_theme()->customizer->get_default( 'blog_layout_type' ) );
	$layout_type      = ! is_search() ? $layout_type : 'grid-2-cols';
	$sidebar_position = get_theme_mod( 'sidebar_position', chefplaza_theme()->customizer->get_default( 'sidebar_position' ) );

	$classes[] = 'posts-list';
	$classes[] = 'posts-list--' . sanitize_html_class( $layout_type );
	$classes[] = sanitize_html_class( $sidebar_position );

	if ( in_array( $layout_type, array( 'grid-2-cols', 'grid-3-cols' ) ) ) {
		$classes[] = 'card-deck';
	}

	if ( in_array( $layout_type, array( 'masonry-2-cols', 'masonry-3-cols' ) ) ) {
		$classes[] = 'card-columns';
	}

	$sidebars = array(
		'full-width-header-area',
		'before-content-area',
		'before-loop-area',
	);

	$has_sidebars = false;

	foreach ( $sidebars as $sidebar ) {
		if ( chefplaza_widget_area()->is_active_sidebar( $sidebar ) ) {
			$has_sidebars = true;
		}
	}

	if ( ! $has_sidebars && is_home() ) {
		$classes[] = 'no-sidebars-before';
	}

	$classes = apply_filters( 'chefplaza_posts_list_class', $classes );

	$output = 'class="' . join( ' ', $classes ) . '"';

	if ( ! $echo ) {
		return $output;
	}

	echo $output;
}

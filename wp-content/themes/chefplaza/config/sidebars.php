<?php
/**
 * Sidebars configuration.
 *
 * @package Chefplaza
 */

add_action( 'after_setup_theme', 'chefplaza_register_sidebars', 5 );
function chefplaza_register_sidebars() {

	chefplaza_widget_area()->widgets_settings = apply_filters( 'tm_widget_area_default_settings', array(
		'sidebar' => array(
			'name'           => esc_html__( 'Sidebar', 'chefplaza' ),
			'description'    => '',
			'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'   => '</aside>',
			'before_title'   => '<h3 class="widget-title">',
			'after_title'    => '</h3>',
			'before_wrapper' => '<div id="%1$s" %2$s role="complementary">',
			'after_wrapper'  => '</div>',
			'is_global'      => true,
		),
		'full-width-header-area' => array(
			'name'           => esc_html__( 'Header Fullwidth Area', 'chefplaza' ),
			'description'    => '',
			'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'   => '</aside>',
			'before_title'   => '<h2 class="widget-title">',
			'after_title'    => '</h2>',
			'before_wrapper' => '<section id="%1$s" %2$s>',
			'after_wrapper'  => '</section>',
			'is_global'      => false,
			'conditional'    => array( 'is_home', 'is_front_page' ),
		),
		'before-content-area' => array(
			'name'           => esc_html__( 'Before Content Area', 'chefplaza' ),
			'description'    => '',
			'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'   => '</aside>',
			'before_title'   => '<h2 class="widget-title">',
			'after_title'    => '</h2>',
			'before_wrapper' => '<section id="%1$s" %2$s>',
			'after_wrapper'  => '</section>',
			'is_global'      => false,
			'conditional'    => array( 'is_home', 'is_front_page' ),
		),
		'before-loop-area' => array(
			'name'           => esc_html__( 'Before Loop Area', 'chefplaza' ),
			'description'    => '',
			'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'   => '</aside>',
			'before_title'   => '<h2 class="widget-title">',
			'after_title'    => '</h2>',
			'before_wrapper' => '<section id="%1$s" %2$s>',
			'after_wrapper'  => '</section>',
			'is_global'      => false,
			'conditional'    => array( 'is_home', 'is_front_page' ),
		),
		'after-loop-area' => array(
			'name'           => esc_html__( 'After Loop Area', 'chefplaza' ),
			'description'    => '',
			'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'   => '</aside>',
			'before_title'   => '<h3 class="widget-title">',
			'after_title'    => '</h3>',
			'before_wrapper' => '<section id="%1$s" %2$s>',
			'after_wrapper'  => '</section>',
			'is_global'      => false,
			'conditional'    => array( 'is_home', 'is_front_page' ),
		),
		'after-content-area' => array(
			'name'           => esc_html__( 'After Content Area', 'chefplaza' ),
			'description'    => '',
			'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'   => '</aside>',
			'before_title'   => '<h2 class="widget-title">',
			'after_title'    => '</h2>',
			'before_wrapper' => '<section id="%1$s" %2$s>',
			'after_wrapper'  => '</section>',
			'is_global'      => false,
			'conditional'    => array( 'is_home', 'is_front_page' ),
		),
		'after-content-full-width-area' => array(
			'name'           => esc_html__( 'After Content Fullwidth Area', 'chefplaza' ),
			'description'    => '',
			'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'   => '</aside>',
			'before_title'   => '<h1 class="widget-title">',
			'after_title'    => '</h1>',
			'before_wrapper' => '<section id="%1$s" %2$s>',
			'after_wrapper'  => '</section>',
			'is_global'      => false,
			'conditional'    => array( 'is_home', 'is_front_page' ),
		),
		'footer-area' => array(
			'name'           => esc_html__( 'Footer Area', 'chefplaza' ),
			'description'    => '',
			'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'   => '</aside>',
			'before_title'   => '<h3 class="widget-title">',
			'after_title'    => '</h3>',
			'before_wrapper' => '<section id="%1$s" %2$s>',
			'after_wrapper'  => '</section>',
			'is_global'      => true,
		),
	) );
}

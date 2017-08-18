<?php
/**
 * Theme Customizer.
 *
 * @package Chefplaza
 */

/**
 * Retrieve a holder for Customizer options.
 *
 * @since  1.0.0
 * @return array
 */
function chefplaza_get_customizer_options() {
	/**
	 * Filter a holder for Customizer options (for theme/plugin developer customization).
	 *
	 * @since 1.0.0
	 */
	return apply_filters( 'chefplaza_get_customizer_options', array(
		'prefix'     => 'chefplaza',
		'capability' => 'edit_theme_options',
		'type'       => 'theme_mod',
		'options'    => array(

			/** `Site Indentity` section */
			'show_tagline'                  => array(
				'title'    => esc_html__( 'Show tagline after logo', 'chefplaza' ),
				'section'  => 'title_tagline',
				'priority' => 60,
				'default'  => false,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			'totop_visibility'              => array(
				'title'    => esc_html__( 'Show ToTop button', 'chefplaza' ),
				'section'  => 'title_tagline',
				'priority' => 61,
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			'page_preloader'                => array(
				'title'    => esc_html__( 'Show page preloader', 'chefplaza' ),
				'section'  => 'title_tagline',
				'priority' => 62,
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			'general_settings'              => array(
				'title'    => esc_html__( 'General Site settings', 'chefplaza' ),
				'priority' => 40,
				'type'     => 'panel',
			),

			/** `Logo & Favicon` section */
			'logo_favicon'                  => array(
				'title'    => esc_html__( 'Logo &amp; Favicon', 'chefplaza' ),
				'priority' => 25,
				'panel'    => 'general_settings',
				'type'     => 'section',
			),
			'header_logo_type'              => array(
				'title'   => esc_html__( 'Logo Type', 'chefplaza' ),
				'section' => 'logo_favicon',
				'default' => 'image',
				'field'   => 'radio',
				'choices' => array(
					'image' => esc_html__( 'Image', 'chefplaza' ),
					'text'  => esc_html__( 'Text', 'chefplaza' ),
				),
				'type'    => 'control',
			),
			'header_logo_url'               => array(
				'title'           => esc_html__( 'Logo Upload', 'chefplaza' ),
				'description'     => esc_html__( 'Upload logo image', 'chefplaza' ),
				'section'         => 'logo_favicon',
				'default'         => get_stylesheet_directory_uri() . '/assets/images/logo.png',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'chefplaza_is_header_logo_image',
			),
			'retina_header_logo_url'        => array(
				'title'           => esc_html__( 'Retina Logo Upload', 'chefplaza' ),
				'description'     => esc_html__( 'Upload logo for retina-ready devices', 'chefplaza' ),
				'section'         => 'logo_favicon',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'chefplaza_is_header_logo_image',
			),
			'header_logo_font_family'       => array(
				'title'           => esc_html__( 'Font Family', 'chefplaza' ),
				'section'         => 'logo_favicon',
				'default'         => 'Montserrat, sans-serif',
				'field'           => 'fonts',
				'type'            => 'control',
				'active_callback' => 'chefplaza_is_header_logo_text',
			),
			'header_logo_font_style'        => array(
				'title'           => esc_html__( 'Font Style', 'chefplaza' ),
				'section'         => 'logo_favicon',
				'default'         => 'normal',
				'field'           => 'select',
				'choices'         => chefplaza_get_font_styles(),
				'type'            => 'control',
				'active_callback' => 'chefplaza_is_header_logo_text',
			),
			'header_logo_font_weight'       => array(
				'title'           => esc_html__( 'Font Weight', 'chefplaza' ),
				'section'         => 'logo_favicon',
				'default'         => '700',
				'field'           => 'select',
				'choices'         => chefplaza_get_font_weight(),
				'type'            => 'control',
				'active_callback' => 'chefplaza_is_header_logo_text',
			),
			'header_logo_font_size'         => array(
				'title'           => esc_html__( 'Font Size, px', 'chefplaza' ),
				'section'         => 'logo_favicon',
				'default'         => '36',
				'field'           => 'number',
				'input_attrs'     => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type'            => 'control',
				'active_callback' => 'chefplaza_is_header_logo_text',
			),
			'header_logo_character_set'     => array(
				'title'           => esc_html__( 'Character Set', 'chefplaza' ),
				'section'         => 'logo_favicon',
				'default'         => 'latin',
				'field'           => 'select',
				'choices'         => chefplaza_get_character_sets(),
				'type'            => 'control',
				'active_callback' => 'chefplaza_is_header_logo_text',
			),

			/** `Breadcrumbs` section */
			'breadcrumbs'                   => array(
				'title'    => esc_html__( 'Breadcrumbs', 'chefplaza' ),
				'priority' => 30,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'breadcrumbs_visibillity'       => array(
				'title'   => esc_html__( 'Enable Breadcrumbs', 'chefplaza' ),
				'section' => 'breadcrumbs',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_front_visibillity' => array(
				'title'   => esc_html__( 'Enable Breadcrumbs on front page', 'chefplaza' ),
				'section' => 'breadcrumbs',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_page_title'        => array(
				'title'   => esc_html__( 'Enable page title in breadcrumbs area', 'chefplaza' ),
				'section' => 'breadcrumbs',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_path_type'         => array(
				'title'   => esc_html__( 'Show full/minified path', 'chefplaza' ),
				'section' => 'breadcrumbs',
				'default' => 'minified',
				'field'   => 'select',
				'choices' => array(
					'full'     => esc_html__( 'Full', 'chefplaza' ),
					'minified' => esc_html__( 'Minified', 'chefplaza' ),
				),
				'type'    => 'control',
			),

			/** `Social links` section */
			'social_links'                  => array(
				'title'    => esc_html__( 'Social links', 'chefplaza' ),
				'priority' => 50,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'header_social_links'           => array(
				'title'   => esc_html__( 'Show social links in header', 'chefplaza' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_social_links'           => array(
				'title'   => esc_html__( 'Show social links in footer', 'chefplaza' ),
				'section' => 'social_links',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_share_buttons'       => array(
				'title'   => esc_html__( 'Show social sharing to blog posts', 'chefplaza' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_share_buttons'     => array(
				'title'   => esc_html__( 'Show social sharing to single blog post', 'chefplaza' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Page Layout` section */
			'page_layout'                   => array(
				'title'    => esc_html__( 'Page Layout', 'chefplaza' ),
				'priority' => 55,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'page_layout_type'              => array(
				'title'   => esc_html__( 'Type', 'chefplaza' ),
				'section' => 'page_layout',
				'default' => 'boxed',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'chefplaza' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'chefplaza' ),
				),
				'type'    => 'control',
			),
			'container_width'               => array(
				'title'       => esc_html__( 'Container width (px)', 'chefplaza' ),
				'section'     => 'page_layout',
				'default'     => 1788,
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 960,
					'max'  => 1920,
					'step' => 1,
				),
				'type'        => 'control',
			),
			'sidebar_width'                 => array(
				'title'             => esc_html__( 'Sidebar width', 'chefplaza' ),
				'section'           => 'page_layout',
				'default'           => '1/4',
				'field'             => 'select',
				'choices'           => array(
					'1/3' => '1/3',
					'1/4' => '1/4',
				),
				'sanitize_callback' => 'sanitize_text_field',
				'type'              => 'control',
			),

			/** `Color Scheme` panel */
			'color_scheme'                  => array(
				'title'       => esc_html__( 'Color Scheme', 'chefplaza' ),
				'description' => esc_html__( 'Configure Color Scheme', 'chefplaza' ),
				'priority'    => 40,
				'type'        => 'panel',
			),

			/** `Regular scheme` section */
			'regular_scheme'                => array(
				'title'    => esc_html__( 'Regular scheme', 'chefplaza' ),
				'priority' => 1,
				'panel'    => 'color_scheme',
				'type'     => 'section',
			),
			'regular_accent_color_1'        => array(
				'title'   => esc_html__( 'Accent color (1)', 'chefplaza' ),
				'section' => 'regular_scheme',
				'default' => '#ec4e4e',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_accent_color_2'        => array(
				'title'   => esc_html__( 'Accent color (2)', 'chefplaza' ),
				'section' => 'regular_scheme',
				'default' => '#a3c420',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_accent_color_3'        => array(
				'title'   => esc_html__( 'Accent color (3)', 'chefplaza' ),
				'section' => 'regular_scheme',
				'default' => '#702538',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_accent_color_4'        => array(
				'title'   => esc_html__( 'Accent color (4)', 'chefplaza' ),
				'section' => 'regular_scheme',
				'default' => '#eeeeee',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_accent_color_5'        => array(
				'title'   => esc_html__( 'Accent color (5)', 'chefplaza' ),
				'section' => 'regular_scheme',
				'default' => '#7f7e7e',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_accent_color_6'        => array(
				'title'   => esc_html__( 'Accent color (5)', 'chefplaza' ),
				'section' => 'regular_scheme',
				'default' => '#ffb20d',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_text_color'            => array(
				'title'   => esc_html__( 'Text color', 'chefplaza' ),
				'section' => 'regular_scheme',
				'default' => '#3e3a48',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_link_color'            => array(
				'title'   => esc_html__( 'Link color', 'chefplaza' ),
				'section' => 'regular_scheme',
				'default' => '#cd2559',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_link_hover_color'      => array(
				'title'   => esc_html__( 'Link hover color', 'chefplaza' ),
				'section' => 'regular_scheme',
				'default' => '#3e3a48',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h1_color'              => array(
				'title'   => esc_html__( 'H1 color', 'chefplaza' ),
				'section' => 'regular_scheme',
				'default' => '#3e3a48',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h2_color'              => array(
				'title'   => esc_html__( 'H2 color', 'chefplaza' ),
				'section' => 'regular_scheme',
				'default' => '#3e3a48',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h3_color'              => array(
				'title'   => esc_html__( 'H3 color', 'chefplaza' ),
				'section' => 'regular_scheme',
				'default' => '#3e3a48',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h4_color'              => array(
				'title'   => esc_html__( 'H4 color', 'chefplaza' ),
				'section' => 'regular_scheme',
				'default' => '#3e3a48',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h5_color'              => array(
				'title'   => esc_html__( 'H5 color', 'chefplaza' ),
				'section' => 'regular_scheme',
				'default' => '#3e3a48',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h6_color'              => array(
				'title'   => esc_html__( 'H6 color', 'chefplaza' ),
				'section' => 'regular_scheme',
				'default' => '#3e3a48',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Invert scheme` section */
			'invert_scheme'                 => array(
				'title'    => esc_html__( 'Invert scheme', 'chefplaza' ),
				'priority' => 1,
				'panel'    => 'color_scheme',
				'type'     => 'section',
			),
			'invert_accent_color_1'         => array(
				'title'   => esc_html__( 'Accent color (1)', 'chefplaza' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_accent_color_2'         => array(
				'title'   => esc_html__( 'Accent color (2)', 'chefplaza' ),
				'section' => 'invert_scheme',
				'default' => '#303043',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_accent_color_3'         => array(
				'title'   => esc_html__( 'Accent color (3)', 'chefplaza' ),
				'section' => 'invert_scheme',
				'default' => '#f7f7f7',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_text_color'             => array(
				'title'   => esc_html__( 'Text color', 'chefplaza' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_link_color'             => array(
				'title'   => esc_html__( 'Link color', 'chefplaza' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_link_hover_color'       => array(
				'title'   => esc_html__( 'Link hover color', 'chefplaza' ),
				'section' => 'invert_scheme',
				'default' => '#303043',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h1_color'               => array(
				'title'   => esc_html__( 'H1 color', 'chefplaza' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h2_color'               => array(
				'title'   => esc_html__( 'H2 color', 'chefplaza' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h3_color'               => array(
				'title'   => esc_html__( 'H3 color', 'chefplaza' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h4_color'               => array(
				'title'   => esc_html__( 'H4 color', 'chefplaza' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h5_color'               => array(
				'title'   => esc_html__( 'H5 color', 'chefplaza' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h6_color'               => array(
				'title'   => esc_html__( 'H6 color', 'chefplaza' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Typography Settings` panel */
			'typography'                    => array(
				'title'       => esc_html__( 'Typography', 'chefplaza' ),
				'description' => esc_html__( 'Configure typography settings', 'chefplaza' ),
				'priority'    => 45,
				'type'        => 'panel',
			),

			/** `Body text` section */
			'body_typography'               => array(
				'title'    => esc_html__( 'Body text', 'chefplaza' ),
				'priority' => 5,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'body_font_family'              => array(
				'title'   => esc_html__( 'Font Family', 'chefplaza' ),
				'section' => 'body_typography',
				'default' => 'Roboto, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'body_font_style'               => array(
				'title'   => esc_html__( 'Font Style', 'chefplaza' ),
				'section' => 'body_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => chefplaza_get_font_styles(),
				'type'    => 'control',
			),
			'body_font_weight'              => array(
				'title'   => esc_html__( 'Font Weight', 'chefplaza' ),
				'section' => 'body_typography',
				'default' => '300',
				'field'   => 'select',
				'choices' => chefplaza_get_font_weight(),
				'type'    => 'control',
			),
			'body_font_size'                => array(
				'title'       => esc_html__( 'Font Size, px', 'chefplaza' ),
				'section'     => 'body_typography',
				'default'     => '22',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type'        => 'control',
			),
			'body_line_height'              => array(
				'title'       => esc_html__( 'Line Height', 'chefplaza' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'chefplaza' ),
				'section'     => 'body_typography',
				'default'     => '1.454',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type'        => 'control',
			),
			'body_letter_spacing'           => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'chefplaza' ),
				'section'     => 'body_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => - 10,
					'max'  => 10,
					'step' => 1,
				),
				'type'        => 'control',
			),
			'body_character_set'            => array(
				'title'   => esc_html__( 'Character Set', 'chefplaza' ),
				'section' => 'body_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => chefplaza_get_character_sets(),
				'type'    => 'control',
			),
			'body_text_align'               => array(
				'title'   => esc_html__( 'Text Align', 'chefplaza' ),
				'section' => 'body_typography',
				'default' => 'left',
				'field'   => 'select',
				'choices' => chefplaza_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H1 Heading` section */
			'h1_typography'                 => array(
				'title'    => esc_html__( 'H1 Heading', 'chefplaza' ),
				'priority' => 10,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h1_font_family'                => array(
				'title'   => esc_html__( 'Font Family', 'chefplaza' ),
				'section' => 'h1_typography',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h1_font_style'                 => array(
				'title'   => esc_html__( 'Font Style', 'chefplaza' ),
				'section' => 'h1_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => chefplaza_get_font_styles(),
				'type'    => 'control',
			),
			'h1_font_weight'                => array(
				'title'   => esc_html__( 'Font Weight', 'chefplaza' ),
				'section' => 'h1_typography',
				'default' => '700',
				'field'   => 'select',
				'choices' => chefplaza_get_font_weight(),
				'type'    => 'control',
			),
			'h1_font_size'                  => array(
				'title'       => esc_html__( 'Font Size, px', 'chefplaza' ),
				'section'     => 'h1_typography',
				'default'     => '52',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type'        => 'control',
			),
			'h1_line_height'                => array(
				'title'       => esc_html__( 'Line Height', 'chefplaza' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'chefplaza' ),
				'section'     => 'h1_typography',
				'default'     => '1.25',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type'        => 'control',
			),
			'h1_letter_spacing'             => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'chefplaza' ),
				'section'     => 'h1_typography',
				'default'     => '2.6',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => - 10,
					'max'  => 10,
					'step' => 1,
				),
				'type'        => 'control',
			),
			'h1_character_set'              => array(
				'title'   => esc_html__( 'Character Set', 'chefplaza' ),
				'section' => 'h1_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => chefplaza_get_character_sets(),
				'type'    => 'control',
			),
			'h1_text_align'                 => array(
				'title'   => esc_html__( 'Text Align', 'chefplaza' ),
				'section' => 'h1_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => chefplaza_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H2 Heading` section */
			'h2_typography'                 => array(
				'title'    => esc_html__( 'H2 Heading', 'chefplaza' ),
				'priority' => 15,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h2_font_family'                => array(
				'title'   => esc_html__( 'Font Family', 'chefplaza' ),
				'section' => 'h2_typography',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h2_font_style'                 => array(
				'title'   => esc_html__( 'Font Style', 'chefplaza' ),
				'section' => 'h2_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => chefplaza_get_font_styles(),
				'type'    => 'control',
			),
			'h2_font_weight'                => array(
				'title'   => esc_html__( 'Font Weight', 'chefplaza' ),
				'section' => 'h2_typography',
				'default' => '700',
				'field'   => 'select',
				'choices' => chefplaza_get_font_weight(),
				'type'    => 'control',
			),
			'h2_font_size'                  => array(
				'title'       => esc_html__( 'Font Size, px', 'chefplaza' ),
				'section'     => 'h2_typography',
				'default'     => '32',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type'        => 'control',
			),
			'h2_line_height'                => array(
				'title'       => esc_html__( 'Line Height', 'chefplaza' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'chefplaza' ),
				'section'     => 'h2_typography',
				'default'     => '1.25',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type'        => 'control',
			),
			'h2_letter_spacing'             => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'chefplaza' ),
				'section'     => 'h2_typography',
				'default'     => '1.6',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => - 10,
					'max'  => 10,
					'step' => 1,
				),
				'type'        => 'control',
			),
			'h2_character_set'              => array(
				'title'   => esc_html__( 'Character Set', 'chefplaza' ),
				'section' => 'h2_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => chefplaza_get_character_sets(),
				'type'    => 'control',
			),
			'h2_text_align'                 => array(
				'title'   => esc_html__( 'Text Align', 'chefplaza' ),
				'section' => 'h2_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => chefplaza_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H3 Heading` section */
			'h3_typography'                 => array(
				'title'    => esc_html__( 'H3 Heading', 'chefplaza' ),
				'priority' => 20,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h3_font_family'                => array(
				'title'   => esc_html__( 'Font Family', 'chefplaza' ),
				'section' => 'h3_typography',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h3_font_style'                 => array(
				'title'   => esc_html__( 'Font Style', 'chefplaza' ),
				'section' => 'h3_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => chefplaza_get_font_styles(),
				'type'    => 'control',
			),
			'h3_font_weight'                => array(
				'title'   => esc_html__( 'Font Weight', 'chefplaza' ),
				'section' => 'h3_typography',
				'default' => '700',
				'field'   => 'select',
				'choices' => chefplaza_get_font_weight(),
				'type'    => 'control',
			),
			'h3_font_size'                  => array(
				'title'       => esc_html__( 'Font Size, px', 'chefplaza' ),
				'section'     => 'h3_typography',
				'default'     => '20',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type'        => 'control',
			),
			'h3_line_height'                => array(
				'title'       => esc_html__( 'Line Height', 'chefplaza' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'chefplaza' ),
				'section'     => 'h3_typography',
				'default'     => '1.4',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type'        => 'control',
			),
			'h3_letter_spacing'             => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'chefplaza' ),
				'section'     => 'h3_typography',
				'default'     => '1',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => - 10,
					'max'  => 10,
					'step' => 1,
				),
				'type'        => 'control',
			),
			'h3_character_set'              => array(
				'title'   => esc_html__( 'Character Set', 'chefplaza' ),
				'section' => 'h3_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => chefplaza_get_character_sets(),
				'type'    => 'control',
			),
			'h3_text_align'                 => array(
				'title'   => esc_html__( 'Text Align', 'chefplaza' ),
				'section' => 'h3_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => chefplaza_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H4 Heading` section */
			'h4_typography'                 => array(
				'title'    => esc_html__( 'H4 Heading', 'chefplaza' ),
				'priority' => 25,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h4_font_family'                => array(
				'title'   => esc_html__( 'Font Family', 'chefplaza' ),
				'section' => 'h4_typography',
				'default' => 'Roboto, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h4_font_style'                 => array(
				'title'   => esc_html__( 'Font Style', 'chefplaza' ),
				'section' => 'h4_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => chefplaza_get_font_styles(),
				'type'    => 'control',
			),
			'h4_font_weight'                => array(
				'title'   => esc_html__( 'Font Weight', 'chefplaza' ),
				'section' => 'h4_typography',
				'default' => '700',
				'field'   => 'select',
				'choices' => chefplaza_get_font_weight(),
				'type'    => 'control',
			),
			'h4_font_size'                  => array(
				'title'       => esc_html__( 'Font Size, px', 'chefplaza' ),
				'section'     => 'h4_typography',
				'default'     => '20',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type'        => 'control',
			),
			'h4_line_height'                => array(
				'title'       => esc_html__( 'Line Height', 'chefplaza' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'chefplaza' ),
				'section'     => 'h4_typography',
				'default'     => '1.4',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type'        => 'control',
			),
			'h4_letter_spacing'             => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'chefplaza' ),
				'section'     => 'h4_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => - 10,
					'max'  => 10,
					'step' => 1,
				),
				'type'        => 'control',
			),
			'h4_character_set'              => array(
				'title'   => esc_html__( 'Character Set', 'chefplaza' ),
				'section' => 'h4_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => chefplaza_get_character_sets(),
				'type'    => 'control',
			),
			'h4_text_align'                 => array(
				'title'   => esc_html__( 'Text Align', 'chefplaza' ),
				'section' => 'h4_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => chefplaza_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H5 Heading` section */
			'h5_typography'                 => array(
				'title'    => esc_html__( 'H5 Heading', 'chefplaza' ),
				'priority' => 30,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h5_font_family'                => array(
				'title'   => esc_html__( 'Font Family', 'chefplaza' ),
				'section' => 'h5_typography',
				'default' => 'Roboto, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h5_font_style'                 => array(
				'title'   => esc_html__( 'Font Style', 'chefplaza' ),
				'section' => 'h5_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => chefplaza_get_font_styles(),
				'type'    => 'control',
			),
			'h5_font_weight'                => array(
				'title'   => esc_html__( 'Font Weight', 'chefplaza' ),
				'section' => 'h5_typography',
				'default' => '300',
				'field'   => 'select',
				'choices' => chefplaza_get_font_weight(),
				'type'    => 'control',
			),
			'h5_font_size'                  => array(
				'title'       => esc_html__( 'Font Size, px', 'chefplaza' ),
				'section'     => 'h5_typography',
				'default'     => '18',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type'        => 'control',
			),
			'h5_line_height'                => array(
				'title'       => esc_html__( 'Line Height', 'chefplaza' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'chefplaza' ),
				'section'     => 'h5_typography',
				'default'     => '1.444444444444444',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type'        => 'control',
			),
			'h5_letter_spacing'             => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'chefplaza' ),
				'section'     => 'h5_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => - 10,
					'max'  => 10,
					'step' => 1,
				),
				'type'        => 'control',
			),
			'h5_character_set'              => array(
				'title'   => esc_html__( 'Character Set', 'chefplaza' ),
				'section' => 'h5_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => chefplaza_get_character_sets(),
				'type'    => 'control',
			),
			'h5_text_align'                 => array(
				'title'   => esc_html__( 'Text Align', 'chefplaza' ),
				'section' => 'h5_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => chefplaza_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H6 Heading` section */
			'h6_typography'                 => array(
				'title'    => esc_html__( 'H6 Heading', 'chefplaza' ),
				'priority' => 35,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h6_font_family'                => array(
				'title'   => esc_html__( 'Font Family', 'chefplaza' ),
				'section' => 'h6_typography',
				'default' => 'Roboto, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h6_font_style'                 => array(
				'title'   => esc_html__( 'Font Style', 'chefplaza' ),
				'section' => 'h6_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => chefplaza_get_font_styles(),
				'type'    => 'control',
			),
			'h6_font_weight'                => array(
				'title'   => esc_html__( 'Font Weight', 'chefplaza' ),
				'section' => 'h6_typography',
				'default' => '300',
				'field'   => 'select',
				'choices' => chefplaza_get_font_weight(),
				'type'    => 'control',
			),
			'h6_font_size'                  => array(
				'title'       => esc_html__( 'Font Size, px', 'chefplaza' ),
				'section'     => 'h6_typography',
				'default'     => '16',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type'        => 'control',
			),
			'h6_line_height'                => array(
				'title'       => esc_html__( 'Line Height', 'chefplaza' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'chefplaza' ),
				'section'     => 'h6_typography',
				'default'     => '1.375',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type'        => 'control',
			),
			'h6_letter_spacing'             => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'chefplaza' ),
				'section'     => 'h6_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => - 10,
					'max'  => 10,
					'step' => 1,
				),
				'type'        => 'control',
			),
			'h6_character_set'              => array(
				'title'   => esc_html__( 'Character Set', 'chefplaza' ),
				'section' => 'h6_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => chefplaza_get_character_sets(),
				'type'    => 'control',
			),
			'h6_text_align'                 => array(
				'title'   => esc_html__( 'Text Align', 'chefplaza' ),
				'section' => 'h6_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => chefplaza_get_text_aligns(),
				'type'    => 'control',
			),

			/** `Breadcrumbs` section */
			'breadcrumbs_typography'        => array(
				'title'    => esc_html__( 'Breadcrumbs', 'chefplaza' ),
				'priority' => 45,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'breadcrumbs_font_family'       => array(
				'title'   => esc_html__( 'Font Family', 'chefplaza' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'Roboto, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'breadcrumbs_font_style'        => array(
				'title'   => esc_html__( 'Font Style', 'chefplaza' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => chefplaza_get_font_styles(),
				'type'    => 'control',
			),
			'breadcrumbs_font_weight'       => array(
				'title'   => esc_html__( 'Font Weight', 'chefplaza' ),
				'section' => 'breadcrumbs_typography',
				'default' => '700',
				'field'   => 'select',
				'choices' => chefplaza_get_font_weight(),
				'type'    => 'control',
			),
			'breadcrumbs_font_size'         => array(
				'title'       => esc_html__( 'Font Size, px', 'chefplaza' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '13',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type'        => 'control',
			),
			'breadcrumbs_line_height'       => array(
				'title'       => esc_html__( 'Line Height', 'chefplaza' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'chefplaza' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '1.5',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type'        => 'control',
			),
			'breadcrumbs_letter_spacing'    => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'chefplaza' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => - 10,
					'max'  => 10,
					'step' => 1,
				),
				'type'        => 'control',
			),
			'breadcrumbs_character_set'     => array(
				'title'   => esc_html__( 'Character Set', 'chefplaza' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => chefplaza_get_character_sets(),
				'type'    => 'control',
			),

			/** `Header` panel */
			'header_options'                => array(
				'title'    => esc_html__( 'Header', 'chefplaza' ),
				'priority' => 60,
				'type'     => 'panel',
			),

			/** `Header styles` section */
			'header_styles'                 => array(
				'title'    => esc_html__( 'Styles', 'chefplaza' ),
				'priority' => 5,
				'panel'    => 'header_options',
				'type'     => 'section',
			),
			'header_bg_color'               => array(
				'title'   => esc_html__( 'Background Color', 'chefplaza' ),
				'section' => 'header_styles',
				'field'   => 'hex_color',
				'default' => '#ffffff',
				'type'    => 'control',
			),
			'header_bg_image'               => array(
				'title'   => esc_html__( 'Background Image', 'chefplaza' ),
				'section' => 'header_styles',
				'field'   => 'image',
				'type'    => 'control',
			),
			'header_bg_repeat'              => array(
				'title'   => esc_html__( 'Background Repeat', 'chefplaza' ),
				'section' => 'header_styles',
				'default' => 'repeat',
				'field'   => 'select',
				'choices' => array(
					'no-repeat' => esc_html__( 'No Repeat', 'chefplaza' ),
					'repeat'    => esc_html__( 'Tile', 'chefplaza' ),
					'repeat-x'  => esc_html__( 'Tile Horizontally', 'chefplaza' ),
					'repeat-y'  => esc_html__( 'Tile Vertically', 'chefplaza' ),
				),
				'type'    => 'control',
			),
			'header_bg_position_x'          => array(
				'title'   => esc_html__( 'Background Position', 'chefplaza' ),
				'section' => 'header_styles',
				'default' => 'center',
				'field'   => 'select',
				'choices' => array(
					'left'   => esc_html__( 'Left', 'chefplaza' ),
					'center' => esc_html__( 'Center', 'chefplaza' ),
					'right'  => esc_html__( 'Right', 'chefplaza' ),
				),
				'type'    => 'control',
			),
			'header_bg_attachment'          => array(
				'title'   => esc_html__( 'Background Attachment', 'chefplaza' ),
				'section' => 'header_styles',
				'default' => 'scroll',
				'field'   => 'select',
				'choices' => array(
					'scroll' => esc_html__( 'Scroll', 'chefplaza' ),
					'fixed'  => esc_html__( 'Fixed', 'chefplaza' ),
				),
				'type'    => 'control',
			),
			'header_layout_type'            => array(
				'title'   => esc_html__( 'Layout', 'chefplaza' ),
				'section' => 'header_styles',
				'default' => 'minimal',
				'field'   => 'select',
				'choices' => array(
					'minimal'  => esc_html__( 'Style 1', 'chefplaza' ),
					'centered' => esc_html__( 'Style 2', 'chefplaza' ),
					'default'  => esc_html__( 'Style 3', 'chefplaza' ),
				),
				'type'    => 'control',
			),

			/** `Top Panel` section */
			'header_top_panel'              => array(
				'title'    => esc_html__( 'Top Panel', 'chefplaza' ),
				'priority' => 10,
				'panel'    => 'header_options',
				'type'     => 'section',
			),
			'top_panel_text'                => array(
				'title'       => esc_html__( 'Disclaimer Text', 'chefplaza' ),
				'description' => esc_html__( 'HTML formatting support', 'chefplaza' ),
				'section'     => 'header_top_panel',
				'default'     => chefplaza_get_default_top_panel_text(),
				'field'       => 'textarea',
				'type'        => 'control',
			),
			'top_panel_search'              => array(
				'title'   => esc_html__( 'Enable search', 'chefplaza' ),
				'section' => 'header_top_panel',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'top_currency_switcher'         => array(
				'title'   => esc_html__( 'On/Off Currency Switcher', 'chefplaza' ),
				'section' => 'header_top_panel',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'top_panel_bg'                  => array(
				'title'   => esc_html__( 'Background color', 'chefplaza' ),
				'section' => 'header_top_panel',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Main Menu` section */
			'header_main_menu'              => array(
				'title'    => esc_html__( 'Main Menu', 'chefplaza' ),
				'priority' => 15,
				'panel'    => 'header_options',
				'type'     => 'section',
			),
			'header_menu_sticky'            => array(
				'title'   => esc_html__( 'Enable sticky menu', 'chefplaza' ),
				'section' => 'header_main_menu',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_menu_attributes'        => array(
				'title'   => esc_html__( 'Enable title attributes', 'chefplaza' ),
				'section' => 'header_main_menu',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'hidden_menu_items_title'       => array(
				'title'   => esc_html__( 'Hidden menu items title', 'chefplaza' ),
				'section' => 'header_main_menu',
				'default' => esc_html__( 'More', 'chefplaza' ),
				'field'   => 'input',
				'type'    => 'control',
			),

			/** `Sidebar` section */
			'sidebar_settings'              => array(
				'title'    => esc_html__( 'Sidebar', 'chefplaza' ),
				'priority' => 105,
				'type'     => 'section',
			),
			'sidebar_position'              => array(
				'title'   => esc_html__( 'Sidebar Position', 'chefplaza' ),
				'section' => 'sidebar_settings',
				'default' => 'one-right-sidebar',
				'field'   => 'select',
				'choices' => array(
					'one-left-sidebar'  => esc_html__( 'Sidebar on left side', 'chefplaza' ),
					'one-right-sidebar' => esc_html__( 'Sidebar on right side', 'chefplaza' ),
					'fullwidth'         => esc_html__( 'No sidebars', 'chefplaza' ),
				),
				'type'    => 'control',
			),

			/** `MailChimp` section */
			'mailchimp'                     => array(
				'title'       => esc_html__( 'MailChimp', 'chefplaza' ),
				'description' => esc_html__( 'Setup MailChimp settings for subscribe widget', 'chefplaza' ),
				'priority'    => 109,
				'type'        => 'section',
			),
			'mailchimp_api_key'             => array(
				'title'   => esc_html__( 'MailChimp API key', 'chefplaza' ),
				'section' => 'mailchimp',
				'field'   => 'text',
				'type'    => 'control',
			),
			'mailchimp_list_id'             => array(
				'title'   => esc_html__( 'MailChimp list ID', 'chefplaza' ),
				'section' => 'mailchimp',
				'field'   => 'text',
				'type'    => 'control',
			),

			/** `Ads Management` panel */
			'ads_management'                => array(
				'title'    => esc_html__( 'Ads Management', 'chefplaza' ),
				'priority' => 110,
				'type'     => 'section',
			),
			'ads_header'                    => array(
				'title'             => esc_html__( 'Header', 'chefplaza' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_home_before_loop'          => array(
				'title'             => esc_html__( 'Front Page Before Loop', 'chefplaza' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_post_before_content'       => array(
				'title'             => esc_html__( 'Post Before Content', 'chefplaza' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_post_before_comments'      => array(
				'title'             => esc_html__( 'Post Before Comments', 'chefplaza' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),

			/** `Footer` panel */
			'footer_options'                => array(
				'title'    => esc_html__( 'Footer', 'chefplaza' ),
				'priority' => 110,
				'type'     => 'section',
			),
			'footer_logo_url'               => array(
				'title'   => esc_html__( 'Logo upload', 'chefplaza' ),
				'section' => 'footer_options',
				'field'   => 'image',
				'default' => get_stylesheet_directory_uri() . '/assets/images/footer-logo.png',
				'type'    => 'control',
			),
			'footer_copyright'              => array(
				'title'   => esc_html__( 'Copyright text', 'chefplaza' ),
				'section' => 'footer_options',
				'default' => chefplaza_get_default_footer_copyright(),
				'field'   => 'textarea',
				'type'    => 'control',
			),
			'footer_text'                   => array(
				'title'           => esc_html__( 'Footer text', 'chefplaza' ),
				'section'         => 'footer_options',
				'default'         => chefplaza_get_default_footer_text(),
				'field'           => 'textarea',
				'type'            => 'control',
				'active_callback' => 'chefplaza_is_footer_style_2',
			),
			'footer_widget_columns'         => array(
				'title'   => esc_html__( 'Widget Area Columns', 'chefplaza' ),
				'section' => 'footer_options',
				'default' => '4',
				'field'   => 'select',
				'choices' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
				),
				'type'    => 'control',
			),
			'footer_layout_type'            => array(
				'title'   => esc_html__( 'Layout', 'chefplaza' ),
				'section' => 'footer_options',
				'default' => 'default',
				'field'   => 'select',
				'choices' => array(
					'default'  => esc_html__( 'Style 1', 'chefplaza' ),
					'centered' => esc_html__( 'Style 2', 'chefplaza' ),
					'minimal'  => esc_html__( 'Style 3', 'chefplaza' ),
				),
				'type'    => 'control',
			),
			'footer_widgets_bg'             => array(
				'title'   => esc_html__( 'Footer Widgets Area color', 'chefplaza' ),
				'section' => 'footer_options',
				'default' => '#efeff2',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'footer_bg'                     => array(
				'title'   => esc_html__( 'Footer Background color', 'chefplaza' ),
				'section' => 'footer_options',
				'default' => '#efeff2',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Blog Settings` panel */
			'blog_settings'                 => array(
				'title'    => esc_html__( 'Blog Settings', 'chefplaza' ),
				'priority' => 115,
				'type'     => 'panel',
			),

			/** `Blog` section */
			'blog'                          => array(
				'title'           => esc_html__( 'Blog', 'chefplaza' ),
				'panel'           => 'blog_settings',
				'priority'        => 10,
				'type'            => 'section',
				'active_callback' => 'is_home',
			),
			'blog_layout_type'              => array(
				'title'   => esc_html__( 'Layout', 'chefplaza' ),
				'section' => 'blog',
				'default' => 'grid-2-cols',
				'field'   => 'select',
				'choices' => array(
					'default'        => esc_html__( 'Listing', 'chefplaza' ),
					'grid-2-cols'    => esc_html__( 'Grid (2 Columns)', 'chefplaza' ),
					'grid-3-cols'    => esc_html__( 'Grid (3 Columns)', 'chefplaza' ),
					'masonry-2-cols' => esc_html__( 'Masonry (2 Columns)', 'chefplaza' ),
					'masonry-3-cols' => esc_html__( 'Masonry (3 Columns)', 'chefplaza' ),
				),
				'type'    => 'control',
			),
			'blog_sticky_label'             => array(
				'title'       => esc_html__( 'Featured Post Label', 'chefplaza' ),
				'description' => esc_html__( 'Label for sticky post', 'chefplaza' ),
				'section'     => 'blog',
				'default'     => 'icon:material:star',
				'field'       => 'text',
				'type'        => 'control',
			),
			'blog_posts_content'            => array(
				'title'   => esc_html__( 'Post content', 'chefplaza' ),
				'section' => 'blog',
				'default' => 'excerpt',
				'field'   => 'select',
				'choices' => array(
					'excerpt' => esc_html__( 'Only excerpt', 'chefplaza' ),
					'full'    => esc_html__( 'Full content', 'chefplaza' ),
				),
				'type'    => 'control',
			),
			'blog_featured_image'           => array(
				'title'   => esc_html__( 'Featured image', 'chefplaza' ),
				'section' => 'blog',
				'default' => 'fullwidth',
				'field'   => 'select',
				'choices' => array(
					'small'     => esc_html__( 'Small', 'chefplaza' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'chefplaza' ),
				),
				'type'    => 'control',
			),
			'blog_read_more_text'           => array(
				'title'   => esc_html__( 'Read More button text', 'chefplaza' ),
				'section' => 'blog',
				'default' => esc_html__( 'More', 'chefplaza' ),
				'field'   => 'text',
				'type'    => 'control',
			),
			'blog_post_author'              => array(
				'title'   => esc_html__( 'Show post author', 'chefplaza' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_publish_date'        => array(
				'title'   => esc_html__( 'Show publish date', 'chefplaza' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_categories'          => array(
				'title'   => esc_html__( 'Show categories', 'chefplaza' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_tags'                => array(
				'title'   => esc_html__( 'Show tags', 'chefplaza' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_comments'            => array(
				'title'   => esc_html__( 'Show comments', 'chefplaza' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Post` section */
			'blog_post'                     => array(
				'title'           => esc_html__( 'Post', 'chefplaza' ),
				'panel'           => 'blog_settings',
				'priority'        => 20,
				'type'            => 'section',
				'active_callback' => 'callback_single',
			),
			'single_post_author'            => array(
				'title'   => esc_html__( 'Show post author', 'chefplaza' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_publish_date'      => array(
				'title'   => esc_html__( 'Show publish date', 'chefplaza' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_categories'        => array(
				'title'   => esc_html__( 'Show categories', 'chefplaza' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_tags'              => array(
				'title'   => esc_html__( 'Show tags', 'chefplaza' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_comments'          => array(
				'title'   => esc_html__( 'Show comments', 'chefplaza' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_author_block'           => array(
				'title'   => esc_html__( 'Enable the author block after each post', 'chefplaza' ),
				'section' => 'blog_post',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_navigation'        => array(
				'title'   => esc_html__( 'Enable the post navigation', 'chefplaza' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'top_language_selector'         => array(
				'title'           => esc_html__( 'On/Off Language Selector', 'chefplaza' ),
				'section'         => 'header_top_panel',
				'default'         => false,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'chefplaza_has_wpml',
			),
			'woocommerce'                   => array(
				'title'           => esc_html__( 'Woocommerce', 'chefplaza' ),
				'priority'        => 200,
				'type'            => 'section',
				'active_callback' => 'chefplaza_has_woocommerce',
			),
			'single_product_slider_layout'  => array(
				'title'           => esc_html__( 'Single product slider layout', 'chefplaza' ),
				'section'         => 'woocommerce',
				'default'         => 'horizontal',
				'field'           => 'radio',
				'choices'         => array(
					'vertical'   => esc_html__( 'Vertical', 'chefplaza' ),
					'horizontal' => esc_html__( 'Horizontal', 'chefplaza' ),
				),
				'type'            => 'control',
				'active_callback' => 'is_product',
			),
		),
	) );
}

/**
 * Return true if logo in header has image type. Otherwise - return false.
 *
 * @param  object $control
 *
 * @return bool
 */
function chefplaza_is_header_logo_image( $control ) {

	if ( $control->manager->get_setting( 'header_logo_type' )->value() == 'image' ) {
		return true;
	}

	return false;
}

/**
 * Return true if logo in header has text type. Otherwise - return false.
 *
 * @param  object $control
 *
 * @return bool
 */
function chefplaza_is_header_logo_text( $control ) {

	if ( $control->manager->get_setting( 'header_logo_type' )->value() == 'text' ) {
		return true;
	}

	return false;
}

// Move native `site_icon` control (based on WordPress core) in custom section.
add_action( 'customize_register', 'chefplaza_customizer_change_core_controls', 20 );
function chefplaza_customizer_change_core_controls( $wp_customize ) {
	$wp_customize->get_control( 'site_icon' )->section      = 'chefplaza_logo_favicon';
	$wp_customize->get_control( 'background_color' )->label = esc_html__( 'Body Background Color', 'chefplaza' );
}

////////////////////////////////////
// Typography utility function    //
////////////////////////////////////
function chefplaza_get_font_styles() {
	return apply_filters( 'chefplaza_get_font_styles', array(
		'normal'  => esc_html__( 'Normal', 'chefplaza' ),
		'italic'  => esc_html__( 'Italic', 'chefplaza' ),
		'oblique' => esc_html__( 'Oblique', 'chefplaza' ),
		'inherit' => esc_html__( 'Inherit', 'chefplaza' ),
	) );
}

function chefplaza_get_character_sets() {
	return apply_filters( 'chefplaza_get_character_sets', array(
		'latin'        => esc_html__( 'Latin', 'chefplaza' ),
		'greek'        => esc_html__( 'Greek', 'chefplaza' ),
		'greek-ext'    => esc_html__( 'Greek Extended', 'chefplaza' ),
		'vietnamese'   => esc_html__( 'Vietnamese', 'chefplaza' ),
		'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'chefplaza' ),
		'latin-ext'    => esc_html__( 'Latin Extended', 'chefplaza' ),
		'cyrillic'     => esc_html__( 'Cyrillic', 'chefplaza' ),
	) );
}

function chefplaza_get_text_aligns() {
	return apply_filters( 'chefplaza_get_text_aligns', array(
		'inherit' => esc_html__( 'Inherit', 'chefplaza' ),
		'center'  => esc_html__( 'Center', 'chefplaza' ),
		'justify' => esc_html__( 'Justify', 'chefplaza' ),
		'left'    => esc_html__( 'Left', 'chefplaza' ),
		'right'   => esc_html__( 'Right', 'chefplaza' ),
	) );
}

function chefplaza_get_font_weight() {
	return apply_filters( 'chefplaza_get_font_weight', array(
		'100' => '100',
		'200' => '200',
		'300' => '300',
		'400' => '400',
		'500' => '500',
		'600' => '600',
		'700' => '700',
		'800' => '800',
		'900' => '900',
	) );
}

/**
 * Return array of arguments for dynamic CSS module
 *
 * @return array
 */
function chefplaza_get_dynamic_css_options() {
	return apply_filters( 'chefplaza_get_dynamic_css_options', array(
		'prefix'    => 'chefplaza',
		'type'      => 'theme_mod',
		'single'    => true,
		'css_files' => array(
			CHEFPLAZA_THEME_DIR . '/assets/css/dynamic.css',
			CHEFPLAZA_THEME_DIR . '/assets/css/dynamic/site/elements.css',
			CHEFPLAZA_THEME_DIR . '/assets/css/dynamic/site/header.css',
			CHEFPLAZA_THEME_DIR . '/assets/css/dynamic/site/forms.css',
			CHEFPLAZA_THEME_DIR . '/assets/css/dynamic/site/social.css',
			CHEFPLAZA_THEME_DIR . '/assets/css/dynamic/site/menus.css',
			CHEFPLAZA_THEME_DIR . '/assets/css/dynamic/site/post.css',
			CHEFPLAZA_THEME_DIR . '/assets/css/dynamic/site/navigation.css',
			CHEFPLAZA_THEME_DIR . '/assets/css/dynamic/site/footer.css',
			CHEFPLAZA_THEME_DIR . '/assets/css/dynamic/site/misc.css',
			CHEFPLAZA_THEME_DIR . '/assets/css/dynamic/site/buttons.css',
			CHEFPLAZA_THEME_DIR . '/assets/css/dynamic/site/woostyles.css',
			CHEFPLAZA_THEME_DIR . '/assets/css/dynamic/widgets/widget-default.css',
			CHEFPLAZA_THEME_DIR . '/assets/css/dynamic/widgets/taxonomy-tiles.css',
			CHEFPLAZA_THEME_DIR . '/assets/css/dynamic/widgets/image-grid.css',
			CHEFPLAZA_THEME_DIR . '/assets/css/dynamic/widgets/carousel.css',
			CHEFPLAZA_THEME_DIR . '/assets/css/dynamic/widgets/smart-slider.css',
			CHEFPLAZA_THEME_DIR . '/assets/css/dynamic/widgets/instagram.css',
			CHEFPLAZA_THEME_DIR . '/assets/css/dynamic/widgets/subscribe.css',
		),
		'options'   => array(
			'header_logo_font_style',
			'header_logo_font_weight',
			'header_logo_font_size',
			'header_logo_font_family',

			'body_font_style',
			'body_font_weight',
			'body_font_size',
			'body_line_height',
			'body_font_family',
			'body_letter_spacing',
			'body_text_align',

			'h1_font_style',
			'h1_font_weight',
			'h1_font_size',
			'h1_line_height',
			'h1_font_family',
			'h1_letter_spacing',
			'h1_text_align',

			'h2_font_style',
			'h2_font_weight',
			'h2_font_size',
			'h2_line_height',
			'h2_font_family',
			'h2_letter_spacing',
			'h2_text_align',

			'h3_font_style',
			'h3_font_weight',
			'h3_font_size',
			'h3_line_height',
			'h3_font_family',
			'h3_letter_spacing',
			'h3_text_align',

			'h4_font_style',
			'h4_font_weight',
			'h4_font_size',
			'h4_line_height',
			'h4_font_family',
			'h4_letter_spacing',
			'h4_text_align',

			'h5_font_style',
			'h5_font_weight',
			'h5_font_size',
			'h5_line_height',
			'h5_font_family',
			'h5_letter_spacing',
			'h5_text_align',

			'h6_font_style',
			'h6_font_weight',
			'h6_font_size',
			'h6_line_height',
			'h6_font_family',
			'h6_letter_spacing',
			'h6_text_align',

			'breadcrumbs_font_style',
			'breadcrumbs_font_weight',
			'breadcrumbs_font_size',
			'breadcrumbs_line_height',
			'breadcrumbs_font_family',
			'breadcrumbs_letter_spacing',
			'breadcrumbs_text_align',

			'regular_accent_color_1',
			'regular_accent_color_2',
			'regular_accent_color_3',
			'regular_accent_color_4',
			'regular_accent_color_5',
			'regular_accent_color_6',
			'regular_text_color',
			'regular_link_color',
			'regular_link_hover_color',
			'regular_h1_color',
			'regular_h2_color',
			'regular_h3_color',
			'regular_h4_color',
			'regular_h5_color',
			'regular_h6_color',

			'invert_accent_color_1',
			'invert_accent_color_2',
			'invert_accent_color_3',
			'invert_text_color',
			'invert_link_color',
			'invert_link_hover_color',
			'invert_h1_color',
			'invert_h2_color',
			'invert_h3_color',
			'invert_h4_color',
			'invert_h5_color',
			'invert_h6_color',

			'header_bg_color',
			'header_bg_image',
			'header_bg_repeat',
			'header_bg_position_x',
			'header_bg_attachment',

			'top_panel_bg',

			'container_width',

			'footer_widgets_bg',
			'footer_bg',
		),
	) );
}

/**
 * Return array of arguments for Google Font loader module.
 *
 * @since  1.0.0
 * @return array
 */
function chefplaza_get_fonts_options() {
	return apply_filters( 'chefplaza_get_fonts_options', array(
		'prefix'  => 'chefplaza',
		'type'    => 'theme_mod',
		'single'  => true,
		'options' => array(
			'body'        => array(
				'family'  => 'body_font_family',
				'style'   => 'body_font_style',
				'weight'  => 'body_font_weight',
				'charset' => 'body_character_set',
			),
			'h1'          => array(
				'family'  => 'h1_font_family',
				'style'   => 'h1_font_style',
				'weight'  => 'h1_font_weight',
				'charset' => 'h1_character_set',
			),
			'h2'          => array(
				'family'  => 'h2_font_family',
				'style'   => 'h2_font_style',
				'weight'  => 'h2_font_weight',
				'charset' => 'h2_character_set',
			),
			'h3'          => array(
				'family'  => 'h3_font_family',
				'style'   => 'h3_font_style',
				'weight'  => 'h3_font_weight',
				'charset' => 'h3_character_set',
			),
			'h4'          => array(
				'family'  => 'h4_font_family',
				'style'   => 'h4_font_style',
				'weight'  => 'h4_font_weight',
				'charset' => 'h4_character_set',
			),
			'h5'          => array(
				'family'  => 'h5_font_family',
				'style'   => 'h5_font_style',
				'weight'  => 'h5_font_weight',
				'charset' => 'h5_character_set',
			),
			'h6'          => array(
				'family'  => 'h6_font_family',
				'style'   => 'h6_font_style',
				'weight'  => 'h6_font_weight',
				'charset' => 'h6_character_set',
			),
			'header_logo' => array(
				'family'  => 'header_logo_font_family',
				'style'   => 'header_logo_font_style',
				'weight'  => 'header_logo_font_weight',
				'charset' => 'header_logo_character_set',
			),
			'breadcrumbs' => array(
				'family'  => 'breadcrumbs_font_family',
				'style'   => 'breadcrumbs_font_style',
				'weight'  => 'breadcrumbs_font_weight',
				'charset' => 'breadcrumbs_character_set',
			),
		),
	) );
}

/**
 * Get default top panel text.
 *
 * @since  1.0.0
 * @return string
 */
function chefplaza_get_default_top_panel_text() {
	return esc_html__( 'FREE  SHIPPING across UK on orders over &#163;75!', 'chefplaza' );
}

/**
 * Get default footer text.
 *
 * @since  1.0.0
 * @return string
 */
function chefplaza_get_default_footer_text() {
	return esc_html__( 'With literally thousands of wine producing brands on the market, dozens of wine-producing countries and hundreds of renown local regional vineyards, we are poised to a diversity of choice!', 'chefplaza' );
}

function chefplaza_is_footer_style_2() {
	return 'centered' == get_theme_mod( 'footer_layout_type' );
}

/**
 * Get default footer copyright.
 *
 * @since  1.0.0
 * @return string
 */
function chefplaza_get_default_footer_copyright() {
	return esc_html__( '&#169; %%year%% All rights reserved by %%site-name%% | %%privacy-policy%%', 'chefplaza' );
}

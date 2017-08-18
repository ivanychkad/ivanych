<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Chefplaza
 */

/**
 * Show top panel message.
 *
 * @since  1.0.0
 *
 * @param  string $format Output formatting.
 *
 * @return void
 */
function chefplaza_top_message( $format = '%s' ) {
	$message = get_theme_mod( 'top_panel_text', chefplaza_theme()->customizer->get_default( 'top_panel_text' ) );

	if ( ! $message ) {
		return;
	}

	printf( $format, wp_kses( $message, wp_kses_allowed_html( 'post' ) ) );
}

/**
 * Show top panel search.
 *
 * @since  1.0.0
 *
 * @param  string $format Output formatting.
 *
 * @return void
 */
function chefplaza_top_search( $format = '%s' ) {
	$is_enabled = get_theme_mod( 'top_panel_search', chefplaza_theme()->customizer->get_default( 'top_panel_search' ) );

	if ( ! $is_enabled ) {
		return;
	}

	printf( $format, do_action( 'chefplaza_menu_shop_header' ) );
}

/***WOOCOMMERCE PART***/
/**
 * Display Product Search
 * @since  1.0.0
 * @uses  chefplaza_is_woocommerce_activated() check if WooCommerce is activated
 * @return void
 */
if ( ! function_exists( 'chefplaza_product_search' ) ) {
	function chefplaza_product_search() {
		if ( chefplaza_is_woocommerce_activated() ) { ?>
			<div class="top-panel__search navbar-search">
				<div class="navbar-search-toggle"></div>
				<?php the_widget( 'WC_Widget_Product_Search', 'title=' ); ?>
			</div>
			<?php
		}
	}
}
add_action( 'chefplaza_menu_shop_header', 'chefplaza_product_search', 40 );


/**
 * Check is Currency Switcher Plugin exists and enabled
 *
 * @return bool
 */
function chefplaza_has_currency_switcher() {
	return in_array( 'woocommerce-currency-switcher/index.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
}

/**
 * Display Currency Switcher
 * @since  1.0.0
 * @uses  chefplaza_is_woocommerce_activated() check if WooCommerce is activated
 * @return void
 */
if ( ! function_exists( 'chefplaza_currency_switcher' ) ) {
	function chefplaza_currency_switcher() {
		if ( chefplaza_is_woocommerce_activated() && chefplaza_has_currency_switcher() ) {
			echo do_shortcode( '[woocs show_flags=0 width="60px" txt_type="code"]' );
		}
	}
}

/**
 * Show top currency switcher.
 *
 * @since  1.0.0
 *
 * @return void
 */
function chefplaza_top_currency_switcher( $format = '%s' ) {
	$is_enabled = get_theme_mod( 'top_currency_switcher', chefplaza_theme()->customizer->get_default( 'top_currency_switcher' ) );

	if ( ! $is_enabled ) {
		return;
	}

	printf( $format, chefplaza_currency_switcher() );
}


/**
 * Show top Language Selector
 *
 * @param  string $format Output formatting.
 *
 * @return void
 */

function chefplaza_top_language_selector( $format = '%s' ) {
	$is_enabled = get_theme_mod( 'top_language_selector', chefplaza_theme()->customizer->get_default( 'top_language_selector' ) );
	if ( ! $is_enabled ) {
		return;
	}
	printf( $format, do_action( 'wpml_add_language_selector' ) );
}

/**
 * Query WooCommerce activation
 */
if ( ! function_exists( 'chefplaza_is_woocommerce_activated' ) ) {
	function chefplaza_is_woocommerce_activated() {
		return class_exists( 'woocommerce' ) ? true : false;
	}
}

/**
 * Query WC_Jetpack activation
 */
if ( ! function_exists( 'chefplaza_wc_jetpack' ) ) {
	function chefplaza_wc_jetpack() {
		return class_exists( 'WC_Jetpack' ) ? true : false;
	}
}

/**
 * Display Currency Switcher
 * @since  1.0.0
 * @uses  chefplaza_is_woocommerce_activated() check if WooCommerce is activated
 * @return void
 */
if ( ! function_exists( 'chefplaza_currency_switcher' ) ) {
	function chefplaza_currency_switcher() {
		if ( chefplaza_wc_jetpack() ) { ?>
			<div class="currency_switcher">
				<?php the_widget( 'WCJ_Widget_Multicurrency', array(
					'title'         => '',
					'switcher_type' => 'wcj_currency_select_drop_down_list',
				) ) ?>
			</div>
			<?php
		}
	}
}


/**
 * Cart Link
 * Displayed a link to the cart including the number of items present and the cart total
 *
 * @param  array $settings Settings
 *
 * @return array           Settings
 * @since  1.0.0
 */
if ( ! function_exists( 'chefplaza_cart_link' ) ) {
	function chefplaza_cart_link() {
		?>
		<div class="cart-contents">
			<span class="count">
				<i class="fl-glypho-shopping-cart7"></i>
				<span><?php echo WC()->cart->get_cart_contents_count(); ?></span>
			</span>
		</div>
		<?php
	}
}

/**
 * Display Header Cart
 * @since  1.0.0
 * @uses  chefplaza_is_woocommerce_activated() check if WooCommerce is activated
 * @return void
 */
if ( ! function_exists( 'chefplaza_header_cart' ) ) {
	function chefplaza_header_cart() {
		if ( chefplaza_is_woocommerce_activated() ) {
			if ( is_cart() ) {
				$class = 'current-menu-item';
			} else {
				$class = '';
			}
			?>
			<ul class="site-header-cart navbar-header-cart menu">
				<li class="<?php echo esc_attr( $class ); ?>">
					<?php chefplaza_cart_link(); ?>
				</li>
				<li class="header-cart-dropdown">
					<div class="shopping_cart-dropdown-wrap">
						<h3><?php echo esc_html__( 'My Cart', 'chefplaza' ) ?></h3>
						<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
					</div>
				</li>
			</ul>
			<?php
		}
	}
}

/**
 * Show footer logo, uploaded from customizer.
 *
 * @since  1.0.0
 * @return void
 */
function chefplaza_footer_logo() {

	$logo_url = get_theme_mod( 'footer_logo_url' );

	if ( ! $logo_url ) {
		return;
	}

	$url      = esc_url( home_url( '/' ) );
	$alt      = esc_attr( get_bloginfo( 'name' ) );
	$logo_url = esc_url( chefplaza_render_theme_url( $logo_url ) );
	$logo_id  = chefplaza_get_image_id_by_url( chefplaza_render_theme_url( $logo_url ) );
	$logo_src = wp_get_attachment_image_src( $logo_id, 'full' );

	if ( $logo_id && $logo_src ) {
		$atts = ' width="' . esc_attr( $logo_src[1] ) . '" height="' . esc_attr( $logo_src[2] ) . '"';
	} else {
		$atts = '';
	}

	$logo_format = apply_filters( 'chefplaza_footer_logo_format', '<div class="footer-logo"><a href="%2$s" class="footer-logo_link"><img src="%1$s" alt="%3$s" class="footer-logo_img" %4$s></a></div>' );

	printf( $logo_format, $logo_url, $url, $alt, $atts );
}

/**
 * Show footer copyright text.
 *
 * @return void
 */
function chefplaza_footer_text_center() {
	$centerText = get_theme_mod( 'footer_text', chefplaza_theme()->customizer->get_default( 'footer_text' ) );
	$format     = '<div class="footer-text-center">%s</div>';

	if ( ! empty( $centerText ) ) {
		printf( $format, wp_kses( chefplaza_render_macros( $centerText ), wp_kses_allowed_html( 'post' ) ) );

		return;
	}
}

/**
 * Show footer copyright text.
 *
 * @since  1.0.0
 * @return void
 */
function chefplaza_footer_copyright() {
	$copyright = get_theme_mod( 'footer_copyright', chefplaza_theme()->customizer->get_default( 'footer_copyright' ) );
	$format    = '<div class="footer-copyright">%s</div>';

	if ( empty( $copyright ) ) {
		return;
	}

	printf( $format, wp_kses( chefplaza_render_macros( $copyright ), wp_kses_allowed_html( 'post' ) ) );
}

/**
 * Show Social list.
 *
 * @since  1.0.0
 * @since  1.0.1 Added new param - $type.
 * @return void
 */
function chefplaza_social_list( $context = '', $type = 'icon' ) {
	$visibility_in_header = get_theme_mod( 'header_social_links', chefplaza_theme()->customizer->get_default( 'header_social_links' ) );
	$visibility_in_footer = get_theme_mod( 'footer_social_links', chefplaza_theme()->customizer->get_default( 'footer_social_links' ) );

	if ( ! $visibility_in_header && ( 'header' === $context ) ) {
		return;
	}

	if ( ! $visibility_in_footer && ( 'footer' === $context ) ) {
		return;
	}

	echo chefplaza_get_social_list( $context, $type );
}

/**
 * Show sticky menu label grabbed from options.
 *
 * @since  1.0.0
 * @return void
 */
function chefplaza_sticky_label() {

	if ( ! is_sticky() || ! is_home() || is_paged() ) {
		return;
	}

	$sticky_label = get_theme_mod( 'blog_sticky_label' );

	if ( empty( $sticky_label ) ) {
		return;
	}

	printf( '<span class="sticky__label">%s</span>', chefplaza_render_icons( $sticky_label ) );
}

/**
 * Display the header logo.
 *
 * @since  1.0.0
 * @return void
 */
function chefplaza_header_logo() {
	$logo = chefplaza_get_site_title_by_type( get_theme_mod( 'header_logo_type', chefplaza_theme()->customizer->get_default( 'header_logo_type' ) ) );

	if ( is_front_page() && is_home() ) {
		$tag = 'h1';
	} else {
		$tag = 'div';
	}

	$format = apply_filters( 'chefplaza_header_logo_format', '<%1$s class="site-logo"><a class="site-logo__link" href="%2$s" rel="home">%3$s</a></%1$s>' );

	printf( $format, $tag, esc_url( home_url( '/' ) ), $logo );
}

/**
 * Retrieve the site title (image or text).
 *
 * @since  1.0.0
 * @return string
 */
function chefplaza_get_site_title_by_type( $type ) {

	if ( ! in_array( $type, array( 'text', 'image' ) ) ) {
		$type = 'text';
	}

	$logo = get_bloginfo( 'name' );

	if ( 'text' === $type ) {
		return $logo;
	}

	$logo_url = get_theme_mod( 'header_logo_url', chefplaza_theme()->customizer->get_default( 'header_logo_url' ) );

	if ( ! $logo_url ) {
		return $logo;
	}

	$logo_url = chefplaza_render_theme_url( $logo_url );

	$retina_logo     = '';
	$retina_logo_url = get_theme_mod( 'retina_header_logo_url' );
	$retina_logo_url = chefplaza_render_theme_url( $retina_logo_url );

	$logo_id = chefplaza_get_image_id_by_url( $logo_url );

	if ( $retina_logo_url ) {
		$retina_logo = sprintf( 'srcset="%s 2x"', esc_url( $retina_logo_url ) );
	}

	$logo_src = wp_get_attachment_image_src( $logo_id, 'full' );

	if ( $logo_id && $logo_src ) {
		$atts = ' width="' . $logo_src[1] . '" height="' . $logo_src[2] . '"';
	} else {
		$atts = '';
	}

	$format_image = apply_filters( 'chefplaza_header_logo_image_format', '<img src="%1$s" alt="%2$s" class="site-link__img" %3$s%4$s>' );

	return sprintf( $format_image, esc_url( $logo_url ), esc_attr( $logo ), $retina_logo, $atts );
}

/**
 * Display the site description.
 *
 * @since  1.0.0
 * @return void
 */
function chefplaza_site_description() {
	$show_desc = get_theme_mod( 'show_tagline', chefplaza_theme()->customizer->get_default( 'show_tagline' ) );

	if ( ! $show_desc ) {
		return;
	}

	$description = get_bloginfo( 'description', 'display' );

	if ( ! ( $description || is_customize_preview() ) ) {
		return;
	}

	$format = apply_filters( 'chefplaza_site_description_format', '<div class="site-description">%s</div>' );

	printf( $format, $description );
}

/**
 * Dispaply box with information about author.
 *
 * @since  1.0.0
 * @return void
 */
function chefplaza_post_author_bio() {
	$is_enabled = get_theme_mod( 'single_author_block', chefplaza_theme()->customizer->get_default( 'single_author_block' ) );

	if ( ! $is_enabled ) {
		return;
	}

	get_template_part( 'template-parts/content', 'author-bio' );

}

/**
 * Display a link to all posts by an author.
 *
 * @since  1.0.0
 *
 * @param  array $args Arguments.
 *
 * @return string      An HTML link to the author page.
 */
function chefplaza_get_the_author_posts_link() {
	ob_start();
	the_author_posts_link();
	$author = ob_get_clean();

	return $author;
}

/**
 * Display the breadcrumbs.
 *
 * @since  1.0.0
 * @return void
 */
function chefplaza_site_breadcrumbs() {
	$breadcrumbs_visibillity       = get_theme_mod( 'breadcrumbs_visibillity', chefplaza_theme()->customizer->get_default( 'breadcrumbs_visibillity' ) );
	$breadcrumbs_page_title        = get_theme_mod( 'breadcrumbs_page_title', chefplaza_theme()->customizer->get_default( 'breadcrumbs_page_title' ) );
	$breadcrumbs_path_type         = get_theme_mod( 'breadcrumbs_path_type', chefplaza_theme()->customizer->get_default( 'breadcrumbs_path_type' ) );
	$breadcrumbs_front_visibillity = get_theme_mod( 'breadcrumbs_front_visibillity', chefplaza_theme()->customizer->get_default( 'breadcrumbs_front_visibillity' ) );

	$breadcrumbs_settings = apply_filters( 'chefplaza_breadcrumbs_settings', array(
		'wrapper_format'    => '<div class="container"><div class="breadcrumbs__title">%1$s</div><div class="breadcrumbs__items">%2$s</div><div class="clear"></div></div>',
		'page_title_format' => '<h5 class="page-title">%s</h5>',
		'show_title'        => $breadcrumbs_page_title,
		'path_type'         => $breadcrumbs_path_type,
		'show_on_front'     => $breadcrumbs_front_visibillity,
		'labels'            => array(
			'browse'         => '',
			'error_404'      => esc_html__( '404 Not Found', 'chefplaza' ),
			'archives'       => esc_html__( 'Archives', 'chefplaza' ),
			/* Translators: %s is the search query. The HTML entities are opening and closing curly quotes. */
			'search'         => esc_html__( 'Search results for &#8220;%s&#8221;', 'chefplaza' ),
			/* Translators: %s is the page number. */
			'paged'          => esc_html__( 'Page %s', 'chefplaza' ),
			/* Translators: Minute archive title. %s is the minute time format. */
			'archive_minute' => esc_html__( 'Minute %s', 'chefplaza' ),
			/* Translators: Weekly archive title. %s is the week date format. */
			'archive_week'   => esc_html__( 'Week %s', 'chefplaza' ),
		),
		'date_labels'       => array(
			'archive_minute_hour' => _x( 'g:i a', 'minute and hour archives time format', 'chefplaza' ),
			'archive_minute'      => _x( 'i', 'minute archives time format', 'chefplaza' ),
			'archive_hour'        => _x( 'g a', 'hour archives time format', 'chefplaza' ),
			'archive_year'        => _x( 'Y', 'yearly archives date format', 'chefplaza' ),
			'archive_month'       => _x( 'F', 'monthly archives date format', 'chefplaza' ),
			'archive_day'         => _x( 'j', 'daily archives date format', 'chefplaza' ),
			'archive_week'        => _x( 'W', 'weekly archives date format', 'chefplaza' ),
		),
		'css_namespace'     => array(
			'module'    => 'breadcrumbs',
			'content'   => 'breadcrumbs__content',
			'wrap'      => 'breadcrumbs__wrap',
			'browse'    => 'breadcrumbs__browse',
			'item'      => 'breadcrumbs__item',
			'separator' => 'breadcrumbs__item-sep',
			'link'      => 'breadcrumbs__item-link',
			'target'    => 'breadcrumbs__item-target',
		),
	) );

	if ( $breadcrumbs_visibillity ) {
		chefplaza_theme()->get_core()->init_module( 'cherry-breadcrumbs', $breadcrumbs_settings );
		do_action( 'cherry_breadcrumbs_render' );
	}

}

/**
 * Display the page preloader.
 *
 * @since  1.0.0
 * @return void
 */
function chefplaza_get_page_preloader() {
	$page_preloader = get_theme_mod( 'page_preloader', chefplaza_theme()->customizer->get_default( 'page_preloader' ) );

	if ( $page_preloader ) {
		echo '<div class="page-preloader-cover">
			<div class="page-preloader-spinner">
				<div></div>
				<div></div>
				<div></div>
				<div></div>
			</div>
		</div>';
	}
}

/**
 * Check if top panele visible or not
 *
 * @return bool
 */
function chefplaza_is_top_panel_visible() {
	$message = get_theme_mod( 'top_panel_text', chefplaza_theme()->customizer->get_default( 'top_panel_text' ) );
	$search  = get_theme_mod( 'top_panel_search', chefplaza_theme()->customizer->get_default( 'top_panel_search' ) );
	$menu    = has_nav_menu( 'top' );

	$conditions = apply_filters( 'chefplaza_top_panel_visibility_conditions', array( $message, $search, $menu ) );

	$is_visible = false;

	foreach ( $conditions as $condition ) {
		if ( ! empty( $condition ) ) {
			$is_visible = true;
		}
	}

	return $is_visible;
}

/**
 * Display the ads.
 *
 * @since  1.0.0
 *
 * @param  string $location location of ads in theme.
 *
 * @return void
 */
function chefplaza_ads( $location ) {
	$ads    = trim( get_theme_mod( 'ads_' . $location, chefplaza_theme()->customizer->get_default( 'ads_' . $location ) ) );
	$format = '<div class="' . $location . '-ads">%s</div>';

	if ( empty( $ads ) ) {
		return;
	}

	printf( $format, wp_specialchars_decode( $ads, ENT_QUOTES ) );
}

/**
 * Display the header ads.
 *
 */
function chefplaza_ads_header() {
	chefplaza_ads( 'header' );
}

/**
 * Display ads for before loop location.
 *
 */
function chefplaza_ads_home_before_loop() {
	chefplaza_ads( 'home_before_loop' );
}

/**
 * Display ads for before loop content.
 *
 */
function chefplaza_ads_post_before_content() {
	chefplaza_ads( 'post_before_content' );
}

/**
 * Display ads for before comments.
 *
 */
function chefplaza_ads_post_before_comments() {
	chefplaza_ads( 'post_before_comments' );
}

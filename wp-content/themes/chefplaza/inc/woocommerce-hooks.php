<?php
/**
 * chefplaza WooCommerce Theme hooks.
 *
 * @package chefplaza
 */

add_action( 'after_setup_theme', 'chefplaza_woocommerce_support' );

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

add_action( 'wp_enqueue_scripts', 'chefplaza_enqueue_assets' );

add_action( 'woocommerce_before_single_product', 'chefplaza_enqueue_single_product_scripts' );

add_filter( 'cherry_page_title', 'chefplaza_cherry_page_title', 10, 2 );

add_filter( 'cherry_breadcrumbs_custom_trail', 'chefplaza_get_woo_breadcrumbs', 10, 2 );

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

add_filter( 'tm_woocommerce_include_bootstrap_grid', 'chefplaza_tm_woocommerce_include_bootstrap_grid' );

add_action( 'get_product_search_form', 'chefplaza_get_product_search_form' );


add_action( 'woocommerce_before_shop_loop', 'chefplaza_woocommerce_before_shop_loop' );

add_action( 'woocommerce_after_shop_loop', 'chefplaza_woocommerce_after_shop_loop' );


if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '2.3', '>=' ) ) {
	add_filter( 'woocommerce_add_to_cart_fragments', 'chefplaza_cart_link_fragment' );
} else {
	add_filter( 'add_to_cart_fragments', 'chefplaza_cart_link_fragment' );
}

add_action( 'woocommerce_before_single_product_summary', 'chefplaza_before_single_product_summary_wrap_before', 1 );

add_action( 'woocommerce_before_single_product_summary', 'chefplaza_before_single_product_summary_wrap_after', 99 );

add_action( 'woocommerce_single_product_summary', 'chefplaza_after_single_product_summary_wrap', 999 );

remove_action( 'woocommerce_before_shop_loop', 'wccm_register_add_compare_button_hook' );

remove_action( 'woocommerce_single_product_summary', 'wccm_add_single_product_compare_buttton', 35 );

remove_action( 'woocommerce_before_shop_loop', 'wccm_render_catalog_compare_info' );

remove_action( 'widgets_init', 'wccm_widgets_init' );

remove_action( 'wp_enqueue_scripts', 'wccm_enqueue_compare_scripts' );

add_filter( 'woocommerce_sale_flash', 'chefplaza_woocommerce_sale_flash' );

add_action( 'woocommerce_before_shop_loop_item_title', 'chefplaza_woocommerce_show_flash', 12 );

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash' );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 12 );

add_filter( 'woocommerce_loop_add_to_cart_link', 'chefplaza_woocommerce_loop_add_to_cart_link', 10, 2 );

add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

add_action( 'woocommerce_before_shop_loop_item', 'chefplaza_product_image_wrap_open', 9 );
add_action( 'woocommerce_before_shop_loop_item_title', 'chefplaza_product_image_wrap_close', 12 );

add_action( 'woocommerce_shop_loop_item_title', 'tm_products_carousel_widget_tag', 9 );

add_filter( 'tm_products_carousel_widget_hooks', 'chefplaza_products_carousel_widget_hooks' );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 11 );

function chefplaza_products_carousel_widget_hooks( $hooks ) {

	$hooks['tag'] = array(
		'woocommerce_shop_loop_item_title',
		'tm_products_carousel_widget_tag',
		9,
		1
	);

	return $hooks;
}


remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_rating', 9 );

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 11 );

add_filter( 'woocommerce_get_price_html_from_to', 'chefplaza_woocommerce_get_price_html_from_to', 10, 3 );

if ( chefplaza_has_woocommerce_share() ) {
	remove_action( 'wp_footer', 'toastie_wc_smsb_social_footer' );
	remove_action( 'woocommerce_single_product_summary', 'toastie_wc_smsb_form_code', 31 );
	add_action( 'woocommerce_share', 'toastie_wc_smsb_form_code' );
	add_action( 'woocommerce_before_single_product_summary', 'chefplaza_enqueue_single_product_smsb_assets' );
}

remove_action( 'woocommerce_after_shop_loop_item_title', 'tm_products_carousel_widget_sale_end_date', 11 );
add_action( 'woocommerce_before_shop_loop_item_title', 'tm_products_carousel_widget_sale_end_date', 11 );

add_filter( 'tm_products_carousel_widget_sale_end_date_format', 'chefplaza_format_sale_end_date' );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 11 );

add_filter( 'comment_form_fields', 'chefplaza_comment_form_fields' );

add_filter( 'wpcf7_ajax_loader', 'chefplaza_wpcf7_ajax_loader' );

remove_action( 'wp_print_scripts', 'toastie_wc_smsb_my_enqueue' );

remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );

add_action( 'woocommerce_checkout_after_order_review', 'woocommerce_checkout_payment' );

remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );

add_filter( 'tm_products_carousel_widget_wrapper_open', 'chefplaza_products_carousel_widget_wrapper_open' );
add_filter( 'tm_products_carousel_widget_wrapper_close', 'chefplaza_products_carousel_widget_wrapper_close' );

add_filter( 'tm_categories_carousel_widget_arrows_pos', 'chefplaza_tm_categories_carousel_widget_arrows_pos' );
add_filter( 'tm_products_carousel_widget_arrows_pos', 'chefplaza_tm_categories_carousel_widget_arrows_pos' );

add_action( 'widgets_init', 'chefplaza_override_woocommerce_widgets', 15 );

add_action( 'woocommerce_before_shop_loop', 'chefplaza_woocommerce_catalog_result_wrap_before', 10 );

add_action( 'woocommerce_before_shop_loop', 'chefplaza_woocommerce_catalog_result_wrap_after', 40 );

add_action( 'woocommerce_before_shop_loop', 'chefplaza_woocommerce_before_shop_loop_category_wrap', 41 );

add_action( 'woocommerce_after_shop_loop', 'chefplaza_woocommerce_after_shop_loop_category_wrap' );

remove_action( 'woocommerce_review_before_comment_meta', 'woocommerce_review_display_rating' );

add_filter( 'tm_banners_grid_widget_grids', 'cheflaza_banners_grid_widget_grids' );
function cheflaza_banners_grid_widget_grids( $banners_grids ) {
	array_push($banners_grids[2], array( array( 'w' => 3, 'h' => 1 ), array( 'w' => 3, 'h' => 1 ), array( 'w' => 6, 'h' => 1 ), ) );
	return $banners_grids;
}

/**
 * Enable Woocommerce theme support
 */
function chefplaza_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}

function chefplaza_has_compare() {
	$chefplaza_has_compare = in_array( 'woocommerce-compare-list/index.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );

	return $chefplaza_has_compare;
}

function chefplaza_has_woocommerce_share() {
	return in_array( 'woocommerce-social-media-share-buttons/index.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
}

/**
 * Check is WPML Plugin exists and enabled
 *
 * @return bool
 */
function chefplaza_has_wpml() {
	if ( ! isset( $chefplaza_has_wpml ) || null == $chefplaza_has_wpml ) {
		$chefplaza_has_wpml = in_array( 'sitepress-multilingual-cms/sitepress.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
	}

	return $chefplaza_has_wpml;
}

/**
 * Check is WooCommerce Plugin exists and enabled
 *
 * @return bool
 */
function chefplaza_has_woocommerce() {

	if ( ! isset( $chefplaza_has_woocommerce ) || null == $chefplaza_has_woocommerce ) {
		$chefplaza_has_woocommerce = in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
	}

	return $chefplaza_has_woocommerce;

}

function chefplaza_enqueue_assets() {

	// Jssor Slider
	wp_register_script( 'jquery-jssor', CHEFPLAZA_THEME_JS . '/jssor.slider.mini.js', array( 'jquery' ), '1.0.0', true );

	// Easyzoom
	wp_register_script( 'jquery-easyzoom', CHEFPLAZA_THEME_JS . '/easyzoom.js', array( 'jquery' ), '2.3.1', true );

	wp_enqueue_script( 'jquery-countdown', '//cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.1.0/jquery.countdown.min.js', array( 'jquery' ), '2.1.0', true );

	// Navbar
	wp_enqueue_script( 'navbar-script', CHEFPLAZA_THEME_URI . '/assets/js/jquery.rd-navbar.js', array(), '1.0.0', true );

	// Jquery Chosen
	wp_enqueue_script( 'jquery-chosen', CHEFPLAZA_THEME_URI . '/assets/js/chosen.jquery.min.js', array(), '1.5.1', true );
}

/**
 * Enqueue Jssor Slider.
 *
 * @since 1.0.0
 */
function chefplaza_enqueue_single_product_scripts() {
	// Jssor Slider
	wp_enqueue_script( 'jquery-jssor' );

	// Easyzoom
	wp_enqueue_script( 'jquery-easyzoom' );
}

/**
 * Change WooCommerce loop category title layout
 *
 * @param object $category
 *
 * @return string
 */
function woocommerce_template_loop_category_title( $category ) { ?>
	<h3>
		<?php
		echo $category->name;
		if ( $category->count > 0 ) {
			echo apply_filters( 'woocommerce_subcategory_count_html', ' <mark class="count"><span class="count__number">' . $category->count . '</span> ' . _n('product' ,'products', $category->count, 'chefplaza') . '</mark>', $category );
		}
		?>
	</h3>
	<?php
}

function chefplaza_cherry_page_title( $title, $args ) {
	if ( function_exists( 'is_product' ) ) {
		if ( is_product() ) {
			return sprintf( $args['page_title_format'], esc_html__( 'Shop', 'chefplaza' ) );
		}
	}
	if ( is_single() ) {
		return sprintf( $args['page_title_format'], esc_html__( 'Blog', 'chefplaza' ) );
	}

	return $title;
}

/**
 * Get custom WooCommerce breadcrumbs trail
 *
 * @since  4.0.0
 *
 * @param  bool $is_custom_breadcrumbs default custom breadcrums trigger
 */
function chefplaza_get_woo_breadcrumbs( $is_custom_breadcrumbs, $args ) {

	if ( ! chefplaza_is_woo_page() ) {
		return $is_custom_breadcrumbs;
	}

	if ( ! class_exists( 'Cherry_Woo_Breadcrumbs' ) ) {
		require_once( 'classes/class-cherry-woo-breadcrumbs.php' );
	}

	$core = apply_filters( 'chefplaza_get_theme_core', false );

	if ( ! $core ) {
		return $is_custom_breadcrumbs;
	}

	$woo_breadcrums = new Cherry_Woo_Breadcrumbs( $core, $args );

	return array( 'items' => $woo_breadcrums->items, 'page_title' => $woo_breadcrums->page_title );
}

/**
 * Check if we viewing Woo-related page
 *
 * @since  4.0.0
 */
function chefplaza_is_woo_page() {

	if ( ! function_exists( 'is_woocommerce' ) ) {
		return false;
	}

	return is_woocommerce();
}

function chefplaza_tm_woocommerce_include_bootstrap_grid() {
	return false;
}

/**
 * Disable WooCommerce Page Title
 *
 */

function chefplaza_get_product_search_form( $form ) {
	$form = '<form role="search" method="get" class="woocommerce-product-search" action="' . esc_url( home_url( '/' ) ) . '">
				<label>
					<span class="screen-reader-text">' . esc_html_x( 'Search for:', 'label', 'chefplaza' ) . '></span>
					<input type="search" id="woocommerce-product-search-field" class="search-form__field"
					       placeholder="' . esc_attr_x( 'Search &hellip;', 'placeholder', 'chefplaza' ) . '"
					       value="' . get_search_query() . '" name="s"
					       title="' . esc_attr_x( 'Search for:', 'label', 'chefplaza' ) . '"/>
				</label>
				<button type="submit" id="searchsubmit" class="search-form__submit btn btn-primary"><i class="material-icons">search</i></button>
				<input type="hidden" name="post_type" value="product"/>
			</form>';

	return $form;
}

/**
 * Output the related products.
 *
 * @subpackage    Product
 */
function woocommerce_output_related_products() {

	$args = array(
		'posts_per_page' => 10,
		'columns'        => 4,
		'orderby'        => 'rand',
	);

	woocommerce_related_products( apply_filters( 'woocommerce_output_related_products_args', $args ) );
}

/**
 * Output the related products.
 *
 * @param array Provided arguments
 * @param bool Columns argument for backwards compat
 * @param bool Order by argument for backwards compat
 */
function woocommerce_related_products( $args = array(), $columns = false, $orderby = false ) {

	if ( ! is_array( $args ) ) {
		_deprecated_argument( __FUNCTION__, '2.1', esc_html__( 'Use ', 'chefplaza' ) . $args .  esc_html__( 'argument as an array instead. Deprecated argument will be removed in WC 2.2.', 'chefplaza' ) );

		$argsvalue = $args;

		$args = array(
			'posts_per_page' => $argsvalue,
			'columns'        => $columns,
			'orderby'        => $orderby,
		);
	}

	$defaults = array(
		'post_type'           => 'product',
		'ignore_sticky_posts' => 1,
		'no_found_rows'       => 1,
		'posts_per_page'      => 2,
		'columns'             => 2,
		'orderby'             => 'rand',
	);

	$args = wp_parse_args( $args, $defaults );


	global $product, $woocommerce_loop;

	if ( empty( $product ) || ! $product->exists() ) {
		return;
	}

	$related = $product->get_related( $args['posts_per_page'] );

	if ( 0 === sizeof( $related ) ) {
		return;
	}

	$args['post__in']     = $related;
	$args['post__not_in'] = array( $product->id );

	$args = apply_filters( 'woocommerce_related_products_args', $args );

	$products = new WP_Query( $args );

	$woocommerce_loop['columns'] = $columns;

	if ( $products->have_posts() ) : ?>

		<div class="related products">

			<h2><?php esc_html_e( 'Related Products', 'chefplaza' ); ?></h2>

			<?php woocommerce_product_loop_start( true, true ); ?>

			<?php while ( $products->have_posts() ) : $products->the_post(); ?>

				<?php wc_get_template( 'content-product.php', array( 'swiper' => true ) ); ?>

			<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end( true, true ); ?>

		</div>

	<?php endif;

	wp_reset_postdata();
}

function chefplaza_woocommerce_before_shop_loop() {
	if ( is_shop() && ! ( isset( $_GET['post_type'] ) && 'product' === $_GET['post_type'] ) ) {
		echo '<div class="shop_wrapper store_wrapper">';
	}
}

function chefplaza_woocommerce_after_shop_loop() {
	if ( is_shop() && ! ( isset( $_GET['post_type'] ) && 'product' === $_GET['post_type'] ) ) {
		echo '</div>';
	}
}

function woocommerce_product_loop_start( $echo = true, $swiper = false ) {
	ob_start();
	if ( is_product() || $swiper ) {
		global $uniqid;
		$sidebar_position = get_theme_mod( 'sidebar_position' );
		$slides_per_view  = 'fullwidth' === $sidebar_position || is_product() ? '4' : '3';
		$data_attr_line   = 'class="chefplaza-carousel swiper-container"';
		$data_attr_line .= ' data-uniq-id="swiper-carousel-' . $uniqid . '"';
		$data_attr_line .= ' data-slides-per-view="' . $slides_per_view . '"';
		$data_attr_line .= ' data-slides-per-group="1"';
		$data_attr_line .= ' data-slides-per-column="1"';
		$data_attr_line .= ' data-space-between-slides="0"';
		$data_attr_line .= ' data-duration-speed="500"';
		$data_attr_line .= ' data-swiper-loop="false"';
		$data_attr_line .= ' data-free-mode="false"';
		$data_attr_line .= ' data-grab-cursor="true"';
		$data_attr_line .= ' data-mouse-wheel="false"';

		echo '<div class="swiper-carousel-container">';
		echo '<div id="swiper-carousel-' . $uniqid . '" ' . $data_attr_line . '>';
		echo '<div class="swiper-wrapper">';
	} elseif ( is_shop() || is_product_taxonomy() ) { ?>
		<div class="products row">
	<?php } else { ?>
		<div class="shop_wrapper category_wrapper">
		<div class="products row">
	<?php }
	if ( $echo ) {
		echo ob_get_clean();
	} else {
		return ob_get_clean();
	}
}

function woocommerce_product_loop_end( $echo = true, $swiper = false ) {
	ob_start();
	if ( is_product() || $swiper ) {
		global $uniqid;
		echo '</div>';
		echo '</div>';
		echo '<div id="swiper-carousel-' . $uniqid . '-next" class="swiper-button-next button-next"><i class="material-icons">navigate_next</i></div><div id="swiper-carousel-' . $uniqid . '-prev" class="swiper-button-prev button-prev"><i class="material-icons">navigate_before</i></div>';
		echo '</div>';
	} elseif ( is_shop() || is_product_taxonomy() ) { ?>
		</div>
	<?php } else { ?>
		</div>
		</div>
	<?php }
	if ( $echo ) {
		echo ob_get_clean();
	} else {
		return ob_get_clean();
	}
}


/**
 * Replace sale flash text
 *
 * @return string
 */
function chefplaza_woocommerce_sale_flash() {
	return '<span class="onsale">' . esc_html__( 'Sale', 'chefplaza' ) . '</span>';
}

/**
 * Add WooCommerce 'New' and 'Featured' Flashes
 *
 */
function chefplaza_woocommerce_show_flash() {

	global $product, $woocommerce_loop;

	if ( ! $product->is_on_sale() ) {

		if ( 604800 > ( date( 'U' ) - strtotime( $product->post->post_date ) ) ) {
			echo '<span class="new">' . esc_html__( 'New', 'chefplaza' ) . '</span>';
		} else if ( $product->is_featured() ) {
			echo '<span class="featured">' . esc_html__( 'Featured', 'chefplaza' ) . '</span>';
		}
	}
}

/**
 * Modify WooCommerce Add to cart Button in Loop
 *
 * @param  array $product Button object
 * @param  string $link
 *
 * @return string
 */
function chefplaza_woocommerce_loop_add_to_cart_link( $link, $product ) {
	$preloader = '<svg class="ajax-loading uil-ring" width="26px" height="26px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
					<circle cx="50" cy="50" r="40" stroke-dasharray="65" stroke="#fff" fill="none" stroke-width="15">
							<animateTransform attributeName="transform" type="rotate" values="0 50 50;180 50 50;360 50 50;" keyTimes="0;0.5;1" dur=".8s" repeatCount="indefinite" begin="0s"></animateTransform>
					</circle>
				  </svg>';

	return sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="1" class="add_to_cart_button btn btn-primary %s">%s' . $preloader . '</a>', esc_url( $product->add_to_cart_url() ), esc_attr( $product->id ), esc_attr( $product->get_sku() ), implode( ' ', array_filter( array(
		'button',
		'product_type_' . $product->product_type,
		$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
		$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
	) ) ), ( $product->is_purchasable() && $product->is_in_stock() && $product->is_type( 'simple' ) ) ? '<span class="product_actions_tip add_to_cart_button__text add">' . $product->add_to_cart_text() . '</span>' . '<span class="product_actions_tip add_to_cart_button__text added">' . esc_html__( 'Added to cart!', 'chefplaza' ) . '</span>' : '<span class="product_actions_tip add_to_cart_button__text select">' .  $product->add_to_cart_text() . '</span>' );

}

function chefplaza_cart_link_fragment( $fragments ) {

	global $woocommerce;

	ob_start();

	chefplaza_cart_link();

	$fragments['div.cart-contents'] = ob_get_clean();

	return $fragments;
}

/**
 * Show the product title in the product loop. By default this is an H3.
 */
function woocommerce_template_loop_product_title() {
	echo '<h5 class="widget-product-title"><a href="'. get_the_permalink() .'">' . get_the_title() . '</a></h5>';
}

/**
 * Open wrap product loop elements
 *
 * @return string
 */
function chefplaza_product_image_wrap_open() {
	echo "<div class='block_product_thumbnail'>";
}

/**
 * Close wrap product loop elements
 *
 * @return string
 */
function chefplaza_product_image_wrap_close() {
	echo "</div>";
}

/**
 * Change WooCommerce Price Output when Product is on Sale
 *
 * @param  string $price Price
 * @param  int|string $from Regular price
 * @param  int|string $to Sale price
 *
 * @return string
 */
function chefplaza_woocommerce_get_price_html_from_to( $price, $from, $to ) {

	$price = '<ins>' . ( ( is_numeric( $to ) ) ? wc_price( $to ) : $to ) . '</ins> <del>' . ( ( is_numeric( $from ) ) ? wc_price( $from ) : $from ) . '</del>';

	return $price;
}

function chefplaza_format_sale_end_date() {
	return sprintf( '<span>%%D <strong>%1$s</strong></span> <span>%%H <strong>%2$s</strong></span><span>%%M <strong>%3$s</strong></span>', esc_html__( 'days', 'chefplaza' ), esc_html__( 'Hrs', 'chefplaza' ), esc_html__( 'Min', 'chefplaza' ) );
}

function chefplaza_enqueue_single_product_smsb_assets() {
	$smsb_data = get_plugin_data( WP_PLUGIN_DIR . '/woocommerce-social-media-share-buttons/index.php' );
	if ( '1.3.0' !== $smsb_data['Version'] ) {
		if ( function_exists( 'toastie_wc_smsb_my_enqueue' ) ) {
			toastie_wc_smsb_my_enqueue();
		}
	} else {
		wp_enqueue_script( 'smsb_script', CHEFPLAZA_THEME_URI . '/assets/js/smsb_script.min.js', array( 'jquery' ), '1.0
		.0', true );
	}
}

function woocommerce_template_single_title() { ?>
	<h4 itemprop="name" class="product_title_single"><?php the_title(); ?></h4>
<?php }

function woocommerce_template_single_meta() {
	global $post, $product;

	$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
	$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );

	?>
	<div class="product_meta">

		<?php do_action( 'woocommerce_product_meta_start' );

		if ( wc_product_sku_enabled() ) { ?>

			<span class="sku_wrapper"><?php esc_html_e( 'SKU:', 'chefplaza' ); ?>
				<span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'chefplaza' ); ?></span>
			</span>

		<?php }

		echo $product->get_categories( ', ', '<span class="posted_in">' . '<span>' . _n( 'Category:', 'Categories:', $cat_count, 'chefplaza' ) . '</span>' . ' ', '</span>' );

		echo $product->get_tags( ', ', '<span class="tagged_as">' . '<span>' . _n( 'Tag:', 'Tags:', $tag_count, 'chefplaza' ) . '</span>' . ' ', '</span>' );

		do_action( 'woocommerce_product_meta_end' ); ?>

	</div>
<?php }

function chefplaza_woocommerce_product_review_comment_form_args( $comment_form ) {
	$comment_form['title_reply_before'] = '<p id="reply-title" class="comment-reply-title"><strong>';
	$comment_form['title_reply_after']  = '</strong></p>';

	return $comment_form;
}

function woocommerce_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	$rating             = intval( get_comment_meta( $comment->comment_ID, 'rating', true ) );
	$verified           = wc_review_is_from_verified_owner( $comment->comment_ID );

	?>
	<li itemprop="review" itemscope itemtype="http://schema.org/Review" <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

	<div id="comment-<?php comment_ID(); ?>" class="comment_container">

		<?php echo get_avatar( $comment, apply_filters( 'woocommerce_review_gravatar_size', '190' ), '' ); ?>

		<div class="comment-text">

			<?php do_action( 'woocommerce_review_before_comment_meta', $comment ); ?>

			<?php if ( '0' == $comment->comment_approved ) : ?>

				<p class="entry-meta"><em><?php esc_html_e( 'Your comment is awaiting approval', 'chefplaza' ); ?></em></p>

			<?php else : ?>

				<p class="entry-meta">
						<span itemprop="author">
							<?php esc_html_e( 'Posted by', 'chefplaza' ); ?>
							<span> <?php comment_author(); ?> </span>
						</span>
					<?php
					if ( 'yes' === get_option( 'woocommerce_review_rating_verification_label' ) ) {
						if ( $verified ) {
							echo '<span class="verified">(' . esc_html__( 'verified owner', 'chefplaza' ) . ')</span> ';
						}
					} ?>
					<span itemprop="datePublished">
						<?php esc_html_e( 'Published on', 'chefplaza' ); ?>
						<time datetime="<?php echo get_comment_date( 'c' ); ?>"><?php echo get_comment_date( wc_date_format() ); ?></time>
					</span>
				</p>

			<?php endif; ?>

			<?php do_action( 'woocommerce_review_before_comment_text', $comment ); ?>

			<div itemprop="description" class="description"><?php comment_text(); ?></div>

			<?php do_action( 'woocommerce_review_after_comment_text', $comment ); ?>

			<?php if ( $rating && 'yes' === get_option( 'woocommerce_enable_review_rating' ) ) : ?>

				<div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" class="star-rating" title="<?php echo esc_html__( 'Rated ', 'chefplaza' ) . $rating . esc_html__( ' out of 5', 'chefplaza' ) ?>">
						<span style="width:<?php echo ( $rating / 5 ) * 100; ?>%">
							<strong itemprop="ratingValue"><?php echo $rating; ?></strong>
							<?php esc_html_e( 'out of 5', 'chefplaza' ); ?>
						</span>
				</div>

			<?php endif; ?>

		</div>
	</div>
<?php }

function chefplaza_comment_form_fields( $comment_fields ) {
	$comment_field = $comment_fields['comment'];
	unset( $comment_fields['comment'] );

	return array_merge( $comment_fields, array( 'comment' => $comment_field ) );
}

function chefplaza_wpcf7_ajax_loader() {
	return CHEFPLAZA_THEME_URI . '/assets/images/preloader.svg';
}

function woocommerce_product_description_tab() {
	global $post;

	$heading = esc_html( apply_filters( 'woocommerce_product_description_heading', esc_html__( 'Description', 'chefplaza' ) ) );
	if ( $heading ) { ?>
		<p><strong><?php echo $heading; ?></strong></p>
	<?php }

	the_content();
}

function woocommerce_product_additional_information_tab() {
	global $product;

	$heading = apply_filters( 'woocommerce_product_additional_information_heading', esc_html__( 'Additional Information', 'chefplaza' ) );
	if ( $heading ): ?>
		<p><strong><?php echo $heading; ?></strong></p>
	<?php endif;
	$product->list_attributes();
}

function woocommerce_cart_totals() { ?>
	<div class="cart_totals <?php if ( WC()->customer->has_calculated_shipping() ) {
		echo 'calculated_shipping';
	} ?>">

		<?php do_action( 'woocommerce_before_cart_totals' ); ?>

		<h3><?php esc_html_e( 'Cart Totals', 'chefplaza' ); ?></h3>

		<table cellspacing="0" class="">

			<tr class="cart-subtotal">
				<th><?php esc_html_e( 'Subtotal:', 'chefplaza' ); ?></th>
				<td data-title="<?php esc_html_e( 'Subtotal:', 'chefplaza' ); ?>"><?php wc_cart_totals_subtotal_html(); ?></td>
			</tr>

			<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
				<tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
					<th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
					<td data-title="<?php wc_cart_totals_coupon_label( $coupon ); ?>"><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
				</tr>
			<?php endforeach; ?>

			<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

				<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

				<?php wc_cart_totals_shipping_html(); ?>

				<?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

			<?php elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>

				<tr class="shipping">
					<th><?php esc_html_e( 'Shipping', 'chefplaza' ); ?></th>
					<td data-title="<?php esc_html_e( 'Shipping', 'chefplaza' ); ?>"><?php woocommerce_shipping_calculator(); ?></td>
				</tr>

			<?php endif; ?>

			<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
				<tr class="fee">
					<th><?php echo esc_html( $fee->name ); ?></th>
					<td data-title="<?php echo esc_html( $fee->name ); ?>"><?php wc_cart_totals_fee_html( $fee ); ?></td>
				</tr>
			<?php endforeach; ?>

			<?php if ( wc_tax_enabled() && 'excl' === WC()->cart->tax_display_cart ) :
				$taxable_address = WC()->customer->get_taxable_address();
				$estimated_text  = WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping() ? sprintf( ' <small>(' . esc_html__( 'estimated for ', 'chefplaza' ) . '%s' . ')</small>', WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] ) : '';

				if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
					<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
						<tr class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
							<th><?php echo esc_html( $tax->label ) . $estimated_text; ?></th>
							<td data-title="<?php echo esc_html( $tax->label ); ?>"><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
						</tr>
					<?php endforeach; ?>
				<?php else : ?>
					<tr class="tax-total">
						<th><?php echo esc_html( WC()->countries->tax_or_vat() ) . $estimated_text; ?></th>
						<td data-title="<?php echo esc_html( WC()->countries->tax_or_vat() ); ?>"><?php wc_cart_totals_taxes_total_html(); ?></td>
					</tr>
				<?php endif; ?>
			<?php endif; ?>

			<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

			<tr class="order-total">
				<th><?php esc_html_e( 'Total:', 'chefplaza' ); ?></th>
				<td data-title="<?php esc_html_e( 'Total:', 'chefplaza' ); ?>"><?php wc_cart_totals_order_total_html(); ?></td>
			</tr>

			<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>

		</table>

		<div class="wc-proceed-to-checkout">
			<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
		</div>

		<?php do_action( 'woocommerce_after_cart_totals' ); ?>

	</div>
<?php }

function chefplaza_tm_categories_carousel_widget_arrows_pos() {
	return 'outside';
}

/**
 * Override Woocommerce Standard Widgets
 */
function chefplaza_override_woocommerce_widgets() {
	if ( class_exists( 'WC_Widget_Recent_Reviews' ) ) {
		unregister_widget( 'WC_Widget_Recent_Reviews' );
		include_once( 'widgets/recent-reviews-products/reviews-product-widget.php' );
		register_widget( 'Chefplaza_WC_Widget_Recent_Reviews' );
	}
	if ( class_exists( 'WP_Widget_Recent_Posts' ) ) {
		unregister_widget( 'WP_Widget_Recent_Posts' );
		include_once( 'widgets/recent-post/widget-recent-posts.php' );
		register_widget( 'Chefplaza_WP_Widget_Recent_Posts' );
	}
}

function chefplaza_woocommerce_catalog_result_wrap_before() {
	echo '<div class="catalog-result">';
}

function chefplaza_woocommerce_catalog_result_wrap_after() {
	echo '</div>';
}

function chefplaza_woocommerce_before_shop_loop_category_wrap() {
	echo '<div class="shop_wrapper category_wrapper">';
}

function chefplaza_woocommerce_after_shop_loop_category_wrap() {
	echo '</div>';
}

function chefplaza_before_single_product_summary_wrap_before() {
	echo '<div class="row"><div class="col-lg-6 col-md-12 col-sm-12 col-xs-12"><div class="single-image-container">';
}

function chefplaza_before_single_product_summary_wrap_after() {
	echo '</div></div><div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">';
}

function chefplaza_after_single_product_summary_wrap() {
	echo '</div>';
}

function chefplaza_products_carousel_widget_wrapper_open() {
	return '<div class="swiper-wrapper tm-products-carousel-widget-wrapper products">';
}

function chefplaza_products_carousel_widget_wrapper_close() {
	return '</div>';
}



<?php
/**
 * Template part for top panel in header.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Chefplaza
 */

// Don't show top panel if all elements are disabled.
if ( ! chefplaza_is_top_panel_visible() ) {
	return;
} ?>

<div class="top-panel">
	<div <?php echo chefplaza_get_container_classes( array() ); ?>>
		<div class="top-panel__wrap">
			<?php
			chefplaza_top_currency_switcher();
			chefplaza_top_language_selector();
			chefplaza_top_message( '<div class="top-panel__message">%s</div>' );
			chefplaza_top_menu();
			chefplaza_header_cart();
			chefplaza_top_search();
			?>
		</div>
	</div>
</div><!-- .top-panel -->
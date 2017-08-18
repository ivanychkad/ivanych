<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package Chefplaza
 */
?>

<div class="footer-area-wrap">
	<div class="container">
		<?php
		//chefplaza_footer_logo();
		?>
		<?php do_action( 'chefplaza_render_widget_area', 'footer-area' ); ?>

	</div>
</div>

<div class="footer-container">
	<div <?php echo chefplaza_get_container_classes( array( 'site-info' ) ); ?>>
			<?php
				chefplaza_social_list( 'footer' );
				chefplaza_footer_copyright();
				chefplaza_footer_menu();
			?>
	</div><!-- .site-info -->
</div><!-- .container -->
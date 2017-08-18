<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package Chefplaza
 */

?>
<div class="footer-container">
	<div <?php echo chefplaza_get_container_classes( array( 'site-info' ) ); ?>>
		<?php
			//chefplaza_footer_logo();
			chefplaza_footer_text_center();
			chefplaza_social_list( 'footer' );
			chefplaza_footer_copyright();
			chefplaza_footer_menu();
		?>
	</div><!-- .site-info -->
</div><!-- .container -->
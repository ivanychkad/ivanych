<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package Chefplaza
 */
?>

<div class="footer-container">
	<div <?php echo chefplaza_get_container_classes( array( 'site-info' ) ); ?>>
		<div class="site-info__flex">
			<?php //chefplaza_footer_logo(); ?>
			<?php chefplaza_social_list( 'footer' ); ?>
			<div class="site-info__mid-box"><?php
				chefplaza_footer_copyright();
				chefplaza_footer_menu();
			?></div>
		</div>
	</div><!-- .site-info -->
</div><!-- .container -->
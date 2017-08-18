<?php
/**
 * Template part for minimal Header layout.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Chefplaza
 */
?>

<div class="header-container__flex">
	<div class="site-branding">
		<?php chefplaza_header_logo() ?>
		<?php chefplaza_site_description(); ?>
	</div>

	<?php chefplaza_social_list( 'header' ); ?>

	<?php chefplaza_main_menu(); ?>
</div>

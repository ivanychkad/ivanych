<?php
/**
 * Template part for centered Header layout.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Chefplaza
 */
?>

<div class="site-branding">
	<?php chefplaza_header_logo() ?>
	<?php chefplaza_site_description(); ?>
</div>

<?php chefplaza_social_list( 'header' ); ?>

<?php chefplaza_main_menu(); ?>
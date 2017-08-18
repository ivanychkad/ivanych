<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Chefplaza
 */

?>

</div><!-- #content -->

<?php do_action( 'chefplaza_render_widget_area', 'after-content-full-width-area' ); ?>

<footer id="colophon" <?php chefplaza_footer_class() ?> role="contentinfo">
	<?php get_template_part( 'template-parts/footer/layout', get_theme_mod( 'footer_layout_type' ) ); ?>
</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>

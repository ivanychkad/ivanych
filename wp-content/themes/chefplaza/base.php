<?php get_header( chefplaza_template_base() ); ?>

<?php do_action( 'chefplaza_render_widget_area', 'full-width-header-area' ); ?>

<?php chefplaza_site_breadcrumbs(); ?>

<div class="container">

	<?php do_action( 'chefplaza_render_widget_area', 'before-content-area' ); ?>

	<div class="row">

		<div id="primary" <?php chefplaza_primary_content_class(); ?>>

			<?php do_action( 'chefplaza_render_widget_area', 'before-loop-area' ); ?>

			<main id="main" class="site-main" role="main">

				<?php include chefplaza_template_path(); ?>

			</main><!-- #main -->

			<?php do_action( 'chefplaza_render_widget_area', 'after-loop-area' ); ?>

		</div><!-- #primary -->

		<?php get_sidebar(); // Loads the sidebar.php template.  ?>

	</div><!-- .row -->

	<?php do_action( 'chefplaza_render_widget_area', 'after-content-area' ); ?>

</div><!-- .container -->

<?php get_footer( chefplaza_template_base() ); ?>

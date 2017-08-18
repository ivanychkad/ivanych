<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Chefplaza
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php $utility = chefplaza_utility()->utility; ?>

	<header class="entry-header">

		<?php $utility->attributes->get_title( array(
			'class' => 'entry-title',
			'html'  => '<h2 %1$s>%4$s</h2>',
			'echo'  => true,
		) );
		?>

		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
					<span class="post__date">
						<?php $date_visible = chefplaza_is_meta_visible( 'single_post_publish_date', 'single' ) ? 'true' : 'false';

						$utility->meta_data->get_date( array(
							'visible' => $date_visible,
							'class'   => 'post__date-link',
							'prefix'  => esc_html__( 'Published on ', 'chefplaza' ),
							'echo'    => true,
						) );
						?>
					</span>

				<?php $author_visible = chefplaza_is_meta_visible( 'single_post_author', 'single' ) ? 'true' : 'false'; ?>

				<?php $utility->meta_data->get_author( array(
					'visible' => $author_visible,
					'class'   => 'posted-by__author',
					'prefix'  => esc_html__( 'by ', 'chefplaza' ),
					'html'    => '<span class="posted-by">%1$s<a href="%2$s" %3$s %4$s rel="author">%5$s%6$s</a></span>',
					'echo'    => true,
				) );
				?>

				<span class="post__comments">
						<?php $comment_visible = chefplaza_is_meta_visible( 'single_post_comments', 'single' ) ? 'true' : 'false';

						$utility->meta_data->get_comment_count( array(
							'visible' => $comment_visible,
							'class'   => 'post__comments-link',
							'sufix'  => _n_noop( '%s Comment', '%s Comments', 'chefplaza' ),
							'echo'    => true,
						) );
						?>
					</span>
			</div><!-- .entry-meta -->

		<?php endif; ?>

	</header><!-- .entry-header -->

	<?php chefplaza_ads_post_before_content() ?>

	<figure class="post-thumbnail">
		<?php $utility->media->get_image( array(
			'size'        => 'chefplaza-thumb-1728-830',
			'html'        => '<img class="post-thumbnail__img wp-post-image" src="%3$s" alt="%4$s">',
			'placeholder' => false,
			'echo'        => true,
		) );
		?>

		<div class="post-thumbnail__format-link">
			<?php do_action( 'cherry_post_format_link', array( 'render' => true ) ); ?>
		</div>
	</figure><!-- .post-thumbnail -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links__title">' . esc_html__( 'Pages:', 'chefplaza' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span class="page-links__item">',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'chefplaza' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta-bottom">
			<?php $cats_visible = chefplaza_is_meta_visible( 'single_post_categories', 'single' ) ? 'true' : 'false'; ?>

			<?php $utility->meta_data->get_terms( array(
				'visible' => $cats_visible,
				'type'    => 'category',
				'before'  => '<div class="post__cats">',
				'after'   => '</div>',
				'prefix'  => esc_html__( 'Categories: ', 'chefplaza' ),
				'echo'    => true,
			) );
			?>

			<?php $tags_visible = chefplaza_is_meta_visible( 'single_post_tags', 'single' ) ? 'true' : 'false';

			$utility->meta_data->get_terms( array(
				'visible'   => $tags_visible,
				'type'      => 'post_tag',
				'before'    => '<div class="post__tags">',
				'after'     => '</div>',
				'prefix'  => esc_html__( 'Tags: ', 'chefplaza' ),
				'echo'      => true,
			) );
			?>
		</div>
	<?php endif; ?>

	<footer class="entry-footer">
		<?php chefplaza_share_buttons( 'single' ); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Chefplaza
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-list__item card' ); ?>>

	<?php $utility = chefplaza_utility()->utility; ?>

	<div class="post-list__item-content">
		<header class="entry-header">
			<?php
			$title_html = ( is_single() ) ? '<h2 %1$s>%4$s</h2>' : '<h2 %1$s><a href="%2$s" rel="bookmark">%4$s</a></h2>';

			$utility->attributes->get_title( array(
				'class' => 'entry-title',
				'html'  => $title_html,
				'echo'  => true,
			) );
			?>

			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<span class="post__date">
						<?php $date_visible = chefplaza_is_meta_visible( 'blog_post_publish_date', 'loop' ) ? 'true' : 'false';

						$utility->meta_data->get_date( array(
							'visible' => $date_visible,
							'class'   => 'post__date-link',
							'prefix'  => esc_html__( 'Published on ', 'chefplaza' ),
							'echo'    => true,
						) );
						?>
					</span>

					<?php $author_visible = chefplaza_is_meta_visible( 'blog_post_author', 'loop' ) ? 'true' : 'false'; ?>

					<?php $utility->meta_data->get_author( array(
						'visible' => $author_visible,
						'class'   => 'posted-by__author',
						'prefix'  => esc_html__( 'by ', 'chefplaza' ),
						'html'    => '<span class="posted-by">%1$s<a href="%2$s" %3$s %4$s rel="author">%5$s%6$s</a></span>',
						'echo'    => true,
					) );
					?>

					<span class="post__comments">
						<?php $comment_visible = chefplaza_is_meta_visible( 'blog_post_comments', 'loop' ) ? 'true' : 'false';

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

		<figure class="post-thumbnail">
			<?php $size = chefplaza_post_thumbnail_size( array( 'class_prefix' => 'post-thumbnail--' ) ); ?>

			<?php $utility->media->get_image( array(
				'size'        => $size['size'],
				'class'       => 'post-thumbnail__link ' . $size[ 'class' ],
				'html'        => '<a href="%1$s" %2$s><img class="post-thumbnail__img wp-post-image" src="%3$s" alt="%4$s" %5$s></a>',
				'placeholder' => false,
				'echo'        => true,
			) );
			?>

			<div class="post-thumbnail__format-link">
				<?php do_action( 'cherry_post_format_link', array( 'render' => true ) ); ?>
			</div>

			<?php chefplaza_sticky_label(); ?>
		</figure><!-- .post-thumbnail -->

		<div class="entry-content">
			<?php $blog_content = get_theme_mod( 'blog_posts_content', chefplaza_theme()->customizer->get_default( 'blog_posts_content' ) );
			$length             = ( 'full' === $blog_content ) ? 0 : 55;

			$utility->attributes->get_content( array(
				'length'       => $length,
				'content_type' => 'post_excerpt',
				'echo'         => true,
			) );
			?>
		</div><!-- .entry-content -->

		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta-bottom">
				<?php $cats_visible = chefplaza_is_meta_visible( 'blog_post_categories', 'loop' ) ? 'true' : 'false'; ?>

				<?php $utility->meta_data->get_terms( array(
					'visible' => $cats_visible,
					'type'    => 'category',
					'before'  => '<div class="post__cats">',
					'after'   => '</div>',
					'prefix'  => esc_html__( 'Categories: ', 'chefplaza' ),
					'echo'    => true,
				) );
				?>

				<?php $tags_visible = chefplaza_is_meta_visible( 'blog_post_tags', 'loop' ) ? 'true' : 'false';

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

	</div><!-- .post-list__item-content -->

	<footer class="entry-footer">
		<?php chefplaza_share_buttons( 'loop' ); ?>

		<?php $utility->attributes->get_button( array(
			'class' => 'btn btn-primary',
			'text'  => get_theme_mod( 'blog_read_more_text', chefplaza_theme()->customizer->get_default( 'blog_read_more_text' ) ),
			'html'  => '<a href="%1$s" %3$s>%4$s</a>',
			'echo'  => true,
		) );
		?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->

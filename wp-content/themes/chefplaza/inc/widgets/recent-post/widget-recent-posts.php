<?php
/**
 * Widget API: WP_Widget_Recent_Posts class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */

/**
 * Core class used to implement a Recent Posts widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class Chefplaza_WP_Widget_Recent_Posts extends WP_Widget_Recent_Posts {


	/**
	 * Outputs the content for the current Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $args Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Recent Posts widget instance.
	 */
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Recent Posts', 'chefplaza' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {
			$number = 5;
		}
		$show_date   = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
		$show_author = isset( $instance['show_author'] ) ? $instance['show_author'] : false;

		/**
		 * Filter the arguments for the Recent Posts widget.
		 *
		 * @since 3.4.0
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args An array of arguments used to retrieve the recent posts.
		 */
		$r = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true,
		) ) );

		if ( $r->have_posts() ) :
			?>
			<?php echo $args['before_widget']; ?>
			<?php if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		} ?>
			<ul>
				<?php while ( $r->have_posts() ) : $r->the_post(); ?>
					<li>
						<?php if ( $show_author ) :
							echo chefplaza_utility()->utility->meta_data->get_author( array(
								'class'  => 'post-by__author',
								'prefix' => esc_html__( 'Posted by ', 'chefplaza' ),
								'html'   => '<span class="post-by">%1$s<a href="%2$s" %3$s %4$s rel="author">%5$s%6$s</a></span>',
								'echo'   => true,
							) );
						endif; ?>
						<a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>

						<?php if ( $show_date ) : ?>
							<span class="post-date"><?php echo get_the_date(); ?></span>
						<?php endif; ?>

					</li>
				<?php endwhile; ?>
			</ul>
			<?php echo $args['after_widget']; ?>
			<?php
			// Reset the global $the_post as this query will have stomped on it
			wp_reset_postdata();

		endif;
	}

	/**
	 * Handles updating the settings for the current Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 *
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance                = $old_instance;
		$instance['title']       = sanitize_text_field( $new_instance['title'] );
		$instance['number']      = (int) $new_instance['number'];
		$instance['show_date']   = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		$instance['show_author'] = isset( $new_instance['show_author'] ) ? (bool) $new_instance['show_author'] : false;

		return $instance;
	}

	/**
	 * Outputs the settings form for the Recent Posts widget.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title       = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number      = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_date   = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		$show_author = isset( $instance['show_author'] ) ? (bool) $instance['show_author'] : false;
		?>

		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html__( 'Title:', 'chefplaza' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
			       name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>"/>
		</p>

		<p><label
				for="<?php echo $this->get_field_id( 'number' ); ?>"><?php esc_html_e( 'Number of posts to show:', 'chefplaza' );
				?></label>
			<input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>"
			       name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1"
			       value="<?php echo $number; ?>" size="3"/></p>

		<p><input class="checkbox" type="checkbox"<?php checked( $show_date ); ?>
		          id="<?php echo $this->get_field_id( 'show_date' ); ?>"
		          name="<?php echo $this->get_field_name( 'show_date' ); ?>"/>
			<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php esc_html_e( 'Display post date?', 'chefplaza' );
				?></label></p>

		<p><input class="checkbox" type="checkbox"<?php checked( $show_author ); ?>
		          id="<?php echo $this->get_field_id( 'show_author' ); ?>"
		          name="<?php echo $this->get_field_name( 'show_author' ); ?>"/>
			<label
				for="<?php echo $this->get_field_id( 'show_author' ); ?>"><?php esc_html_e( 'Display post author?', 'chefplaza' );
				?></label></p>
		<?php
	}
}

<?php
/**
 * Adds a Twitter widget.
 *
 * @package brixel
 */

/**
 * Class Definition.
 */
class brixel_Twitter_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			// Base ID of your widget.
			'brixel_twitter_widget',
			// Widget name will appear in UI.
			esc_html__( 'Brixel Twitter Widget', 'brixel' ),
			// Widget description.
			array(
				'description' => esc_html__( 'Widget for twitter box.', 'brixel' ),
			)
		);
	}

	/**
	 * Creating widget front-end.
	 *
	 * @param  [type] $args     description.
	 * @param  [type] $instance description.
	 * @return void
	 */
	public function widget( $args, $instance ) {
		// before and after widget arguments are defined by themes.
		echo wp_kses_post( $args['before_widget'] );
		if ( ! empty( $instance['title'] ) ) {
			echo wp_kses_post( $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'] );
		}
		$username    = ! empty( $instance['username'] ) ? $instance['username'] : esc_html__( 'twitter', 'brixel' );
		$maxtweets   = ! empty( $instance['maxtweets'] ) ? $instance['maxtweets'] : esc_html__( '5', 'brixel' );
		$enablelinks = esc_attr( $instance['enablelinks'] );
		$showuser    = esc_attr( $instance['showuser'] );
		$showtime    = esc_attr( $instance['showtime'] );
		$showimages  = esc_attr( $instance['showimages'] );
		// This is where you run the code and display the output.
		?>
		<?php $random_id = substr( md5( microtime() ), 0, 40 ); ?>
		<div id="<?php echo esc_attr( $random_id ); ?>" class="rt-twitter-box" data-twitter-box-username="<?php echo esc_attr( $username ); ?>" data-twitter-box-maxtweets="<?php echo esc_attr( $maxtweets ); ?>" data-twitter-box-enablelinks="<?php echo esc_attr( $enablelinks ); ?>" data-twitter-box-showuser="<?php echo esc_attr( $showuser ); ?>" data-twitter-box-showtime="<?php echo esc_attr( $showtime ); ?>" data-twitter-box-showimages="<?php echo esc_attr( $showimages ); ?>">
		</div>

		<?php

		echo wp_kses_post( $args['after_widget'] );
	}

	/**
	 * Widget Backend
	 *
	 * @param  [type] $instance description.
	 */
	public function form( $instance ) {
		$username  = ! empty( $instance['username'] ) ? $instance['username'] : esc_html__( 'twitter', 'brixel' );
		$maxtweets = ! empty( $instance['maxtweets'] ) ? $instance['maxtweets'] : esc_html__( '5', 'brixel' );
		if ( $instance ) {
			$enablelinks = esc_attr( $instance['enablelinks'] );
			$showuser    = esc_attr( $instance['showuser'] );
			$showtime    = esc_attr( $instance['showtime'] );
			$showimages  = esc_attr( $instance['showimages'] );
		} else {
			$enablelinks = '';
			$showuser    = '';
			$showtime    = '';
			$showimages  = '';
		}
		// Widget admin form.
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>"><?php esc_html_e( 'Username:', 'brixel' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'username' ) ); ?>" type="text" value="<?php echo esc_attr( $username ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'maxtweets' ) ); ?>"><?php esc_html_e( 'No. of Maximum Tweets:', 'brixel' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'maxtweets' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'maxtweets' ) ); ?>" type="number" value="<?php echo esc_attr( $maxtweets ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'enablelinks' ) ); ?>"><?php esc_html_e( 'Enable Links:', 'brixel' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'enablelinks' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'enablelinks' ) ); ?>" class="widefat">
				<?php
				$options = array( 'true', 'false' );
				foreach ( $options as $option ) {
					echo '<option value="' . esc_attr( $option ) . '" id="' . esc_attr( $option ) . '"', $enablelinks === $option ? ' selected="selected"' : '', '>', esc_attr( $option ), '</option>';
				}
				?>
			</select>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'showuser' ) ); ?>"><?php esc_html_e( 'Show User:', 'brixel' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'showuser' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'showuser' ) ); ?>" class="widefat">
				<?php
				foreach ( $options as $option ) {
					echo '<option value="' . esc_attr( $option ) . '" id="' . esc_attr( $option ) . '"', $showuser === $option ? ' selected="selected"' : '', '>', esc_attr( $option ), '</option>';
				}
				?>
			</select>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'showtime' ) ); ?>"><?php esc_html_e( 'Show Time:', 'brixel' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'showtime' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'showtime' ) ); ?>" class="widefat">
				<?php
				foreach ( $options as $option ) {
					echo '<option value="' . esc_attr( $option ) . '" id="' . esc_attr( $option ) . '"', $showtime === $option ? ' selected="selected"' : '', '>', esc_attr( $option ), '</option>';
				}
				?>
			</select>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'showimages' ) ); ?>"><?php esc_html_e( 'Show Images:', 'brixel' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'showimages' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'showimages' ) ); ?>" class="widefat">
				<?php
				foreach ( $options as $option ) {
					echo '<option value="' . esc_attr( $option ) . '" id="' . esc_attr( $option ) . '"', $showimages === $option ? ' selected="selected"' : '', '>', esc_attr( $option ), '</option>';
				}
				?>
			</select>
		</p>
	<?php
	}

	/**
	 * Updating widget replacing old instances with new.
	 *
	 * @param  [type] $new_instance description.
	 * @param  [type] $old_instance description.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance                = array();
		$instance['username']    = ( ! empty( $new_instance['username'] ) ) ? strip_tags(
			$new_instance['username']
		) : '';
		$instance['maxtweets']   = ( ! empty( $new_instance['maxtweets'] ) ) ? strip_tags(
			$new_instance['maxtweets']
		) : '';
		$instance['enablelinks'] = ( ! empty( $new_instance['enablelinks'] ) ) ? strip_tags(
			$new_instance['enablelinks']
		) : '';
		$instance['showuser']    = ( ! empty( $new_instance['showuser'] ) ) ? strip_tags(
			$new_instance['showuser']
		) : '';
		$instance['showtime']    = ( ! empty( $new_instance['showtime'] ) ) ? strip_tags(
			$new_instance['showtime']
		) : '';
		$instance['showimages']  = ( ! empty( $new_instance['showimages'] ) ) ? strip_tags(
			$new_instance['showimages']
		) : '';

		return $instance;
	}

}
/**
 * Register and load the widget
 */
function brixel_twitter_load_widget() {
	register_widget( 'brixel_Twitter_Widget' );
}
add_action( 'widgets_init', 'brixel_twitter_load_widget' );

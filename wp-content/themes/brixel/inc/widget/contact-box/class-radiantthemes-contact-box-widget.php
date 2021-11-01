<?php
/**
 * Adds a Contact widget.
 *
 * @package brixel
 */

/**
 * Class Definition.
 */
class brixel_Contact_Box_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			// Base ID of your widget.
			'brixel_contact_box_widget',
			// Widget name will appear in UI.
			esc_html__( 'Brixel Contact Box', 'brixel' ),
			// Widget description.
			array(
				'description' => esc_html__( 'Contact box for footer area.', 'brixel' ),
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
		$contacttitledata  = ! empty( $instance['contacttitledata'] ) ? $instance['contacttitledata'] : '';        
		$addressdata  = ! empty( $instance['addressdata'] ) ? $instance['addressdata'] : esc_html__( '123 6th St. Melbourne, FL 32904', 'brixel' );
		$phonenumber  = ! empty( $instance['phonenumber'] ) ? $instance['phonenumber'] : esc_html__( 'Phone: (888) 123-4567', 'brixel' );
		$emailid      = ! empty( $instance['emailid'] ) ? $instance['emailid'] : esc_html__( 'Email: info@example.com', 'brixel' );

		// This is where you run the code and display the output.
		if($contacttitledata)
		{ $output =  '<h5 class="widget-title">' . esc_html( $contacttitledata ) . '</h5>';}
		$output .=  '<ul class="contact">
                    <li class="address">
                    	' . esc_html( $addressdata ) . '
                    </li>
                    <li class="phone">
                    	' . esc_html( $phonenumber ) . '
                    </li>
                    <li class="email">
                    	' . esc_html( $emailid ) . '
                    </li>
                    </ul>';

		echo wp_kses_post( $output );

		echo wp_kses_post( $args['after_widget'] );
	}

	/**
	 * Widget Backend
	 *
	 * @param  [type] $instance description.
	 */
	public function form( $instance ) {
	    $contacttitledata  = ! empty( $instance['contacttitledata'] ) ? $instance['contacttitledata'] : '';
		$addressdata  = ! empty( $instance['addressdata'] ) ? $instance['addressdata'] : esc_html__( '123 6th St. Melbourne, FL 32904', 'brixel' );
		$phonenumber  = ! empty( $instance['phonenumber'] ) ? $instance['phonenumber'] : esc_html__( 'Phone: (888) 123-4567', 'brixel' );
		$emailid      = ! empty( $instance['emailid'] ) ? $instance['emailid'] : esc_html__( 'Email: info@example.com', 'brixel' );

		// Widget admin form.
		?>		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'contacttitledata' ) ); ?>"><?php esc_html_e( 'Title:', 'brixel' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'contacttitledata' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'contacttitledata' ) ); ?>" type="text" value="<?php echo esc_attr( $contacttitledata ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'addressdata' ) ); ?>"><?php esc_html_e( 'Address:', 'brixel' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'addressdata' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'addressdata' ) ); ?>" type="text" value="<?php echo esc_attr( $addressdata ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'phonenumber' ) ); ?>"><?php esc_html_e( 'Phone Number:', 'brixel' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'phonenumber' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'phonenumber' ) ); ?>" type="text" value="<?php echo esc_attr( $phonenumber ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'emailid' ) ); ?>"><?php esc_html_e( 'Email ID:', 'brixel' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'emailid' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'emailid' ) ); ?>" type="text" value="<?php echo esc_attr( $emailid ); ?>" />
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
		$instance                 = array();
		$instance['contacttitledata']  = ( ! empty( $new_instance['contacttitledata'] ) ) ? strip_tags(
			$new_instance['contacttitledata']
		) : '';
		$instance['addressdata']  = ( ! empty( $new_instance['addressdata'] ) ) ? strip_tags(
			$new_instance['addressdata']
		) : '';
		$instance['phonenumber']  = ( ! empty( $new_instance['phonenumber'] ) ) ? strip_tags(
			$new_instance['phonenumber']
		) : '';
		$instance['emailid']      = ( ! empty( $new_instance['emailid'] ) ) ? strip_tags(
			$new_instance['emailid']
		) : '';
		return $instance;
	}

}

/**
 * [brixel_contact_box_load_widget description]
 */
function brixel_contact_box_load_widget() {
	register_widget( 'brixel_Contact_Box_Widget' );
}
add_action( 'widgets_init', 'brixel_contact_box_load_widget' );

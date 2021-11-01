<?php

class RT_Megamenu_Setting {
	public function __construct() {
		add_action( 'admin_init', array( $this, 'register_metabox' ) );
		add_action( 'wp_ajax_rt_mega_menu_save_option', array( $this, 'ajax_save' ) );

		add_filter( 'wp_nav_menu_args', array( $this, 'add_filter_to_wp_nav_menu' ) );
	}

	public function register_metabox() {
		add_meta_box( 'rt-megamenu-setting', __( 'Megamenu Setting', 'rt-megamenu' ), array( $this, 'metabox' ), 'nav-menus', 'side', 'high' );
	}

	public function register_transition() {
		$transition = apply_filters( 'rt_megamenu_register_transition', array(
			'default' => __( 'Default', 'rt-megamenu' ),
			'slide'   => __( 'Slide', 'rt-megamenu' ),
			'fading'  => __( 'Fading', 'rt-megamenu' ),
			'zoom'    => __( 'Zoom', 'rt-megamenu' ),
			'elastic' => __( 'Elastic', 'rt-megamenu' )
		) );

		return $transition;
	}

	public function metabox() {
		$transition = get_option( 'rt_megamenu_setting', 'default' );
		?>
		<p><?php _e( 'Effect:', 'rt-megamenu' ) ?></p>
		<ul class="rt-mega-menu-select-transition">

			<?php foreach( $this->register_transition() as $key => $label ) : ?>
				<li>
					<label>
						<input type="radio" name="megamenu-transition" id="megamenu-transition" value="<?php echo esc_attr( $key ) ?>" <?php checked( esc_attr( $transition ), esc_attr( $key ) ); ?> >
						<?php echo esc_attr( $label ) ?>
					</label>
				</li>
			<?php endforeach; ?>
		</ul>

		<div class="rt_megamenu_settings" id="rt_megamenu_setting">
			<p class="button-controls">
				<span class="save-setting">
					<button class="button-secondary submit-save-setting right" id="submit-save-setting"><?php _e( 'Save', 'rt-megamenu' ); ?></button>
					<span class="spinner"></span>
				</span>
			</p>
		</div>
		<?php
	}

	public function ajax_save() {
		if ( isset( $_POST['transition'] ) ) {
			update_option( 'rt_megamenu_setting', sanitize_text_field( $_POST['transition'] ) );
			wp_send_json_success( array( $_POST ) );
		}
	}

	public function add_filter_to_wp_nav_menu( $args ) {
		$transition = get_option( 'rt_megamenu_setting', 'default' );

		if ( !empty( $transition ) ) {
			$args['menu_class'] = $args['menu_class'] . ' rt-mega-menu-transition-' . $transition;
		}

		return $args;
	}
}

return new RT_Megamenu_Setting();
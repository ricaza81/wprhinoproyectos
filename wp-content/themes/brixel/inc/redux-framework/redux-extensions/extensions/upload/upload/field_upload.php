<?php
/**
 * Redux Framework is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Redux Framework is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Redux Framework. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package     ReduxFramework
 * @author      Muhammad Ashfaq
 * @version     1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
	exit;
}

// Don't duplicate me!
if (!class_exists('ReduxFramework_upload')) {

	/**
	 * Main ReduxFramework_box_shadow class
	 *
	 * @since       1.0.0
	 */
	class ReduxFramework_upload extends ReduxFramework_extension_upload
	{

		/**
		 * Field Constructor.
		 * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
		 *
		 * @since       1.0.0
		 * @access      public
		 * @return      void
		 */
		public function __construct($field = array(), $value = '', $parent){

			$this->parent = $parent;
			$this->field  = $field;
			$this->value  = $value;

			if (empty($this->extension_dir)) {
				$this->extension_dir = trailingslashit(str_replace('\\', '/', dirname(__FILE__)));
				$this->extension_url = site_url(str_replace(trailingslashit(str_replace('\\', '/', ABSPATH)), '', $this->extension_dir));
			}

			// Set default args for this field to avoid bad indexes. Change this to anything you use.
			$defaults = array(
				'options'          => array(),
				'stylesheet'       => '',
				'output'           => true,
				'enqueue'          => true,
				'enqueue_frontend' => true,
			);
			$this->field = wp_parse_args($this->field, $defaults);


		}

		/**
		 * Field Render Function.
		 * Takes the vars and outputs the HTML for the field in the settings
		 */
		public function render( $meta = false )
		{
			// class ----------------------------------------------------
		if( isset( $this->field['class']) ){
			$class = $this->field['class'];
		} else {
			$class = 'image';
		}

		// name -----------------------------------------------------
		if( $meta == 'new' ){

			// builder new
			$name = 'data-name="'. $this->field['id'] .'"';

		} elseif( $meta ){

			// page mata & builder existing items
			$name = 'name="'. $this->field['id'] .'"';

		} else {

			// theme options
			$name = 'name="'. 'test' .'['. $this->field['id'] .']"';

		}

		// value is empty -------------------------------------------
		if( $this->value == '' ){
			$remove = 'style="display:none;"';
			$upload = '';
		} else {
			$remove = '';
			$upload = 'style="display:none;"';
		}

		// echo -----------------------------------------------------
		echo '<div class="mfn-upload-field">';

			echo '<input type="text" ' . esc_attr( $name ) . ' value="' . esc_attr( $this->value ) . '" class="' . esc_attr( $class ) . '" />';
			echo ' <a href="javascript:void(0);" data-choose="Choose a File" data-update="Select File" class="mfn-opts-upload" ' . esc_attr( $upload ) . '><span></span>' . esc_html__( 'Browse', 'brixel' ) . '</a>';
			echo ' <a href="javascript:void(0);" class="mfn-opts-upload-remove" ' . esc_attr( $remove ) . '>' . esc_html__( 'Remove Upload', 'brixel' ) . '</a>';

			if( $class == 'image' ) echo '<img class="mfn-opts-screenshot ' . esc_attr( $class ) . '" src="' . esc_attr( $this->value ) . '" />';

			if( isset($this->field['desc']) && !empty($this->field['desc']) ){
				echo '<span class="description ' . esc_attr( $class ) . '">' . esc_attr( $this->field['desc'] ) . '</span>';
			}

		echo '</div>';
		}

		/**
		 * Enqueue Function.
		 *
		 * If this field requires any scripts, or css define this function and register/enqueue the scripts/css
		 */
		public function enqueue()
		{

			$extension = ReduxFramework_extension_upload::getInstance();

			wp_enqueue_script(
				'fild-upld',
				$this->extension_url . 'field_upload.js',
				array('jquery'),
				time(),
				true
			);

			if (!wp_style_is('select2-css')) {
				wp_enqueue_style('select2-css');
			}

			wp_enqueue_style('redux-color-picker-css');
			wp_enqueue_style(
				'redux-field-icon-select-css',
				$this->extension_url . 'field_upload.css',
				time(),
				true
			);

		}

		/**
		 * Output Function.
		 *
		 * Used to enqueue to the front-end
		 *
		 * @since       1.0.0
		 * @access      public
		 * @return      void
		 */
		public function output() {

			if ( ! empty ( $this->value ) ){

				$horizontal     = isset( $this->value['horizontal'] )       ? $this->value['horizontal']    : '0px';
				$vertical       = isset( $this->value['vertical'] )         ? $this->value['vertical']      : '0px';
				$blur           = isset( $this->value['blur'] )             ? $this->value['blur']          : '0px';
				$spread         = isset( $this->value['spread'] )           ? $this->value['spread']        : '0px';
				$shadow_color   = isset( $this->value['shadow-color'] )     ? $this->value['shadow-color']  : 'transparent';
				$opacity        = isset( $this->value['opacity'] )          ? $this->value['opacity']       : '1';
				$shadow_type    = isset( $this->value['shadow-type'] )      ? $this->value['shadow-type']   : '';



				//unset shadow type if it is not Inset
				if ( !empty ( $shadow_type ) && $shadow_type != 'inset' ){
					$shadow_type = '';
				}


				//Get RGBA
				if ( !empty ( $shadow_color ) && $shadow_color != 'transparent' ){
					$shadow_color = $this->getRGBA ( $shadow_color, $opacity );
				}


				//Build Style element
				$style  = '-moz-box-shadow:'    .$shadow_type.' '.$horizontal.' '.$vertical.' '.$blur.' '.$spread.' '.$shadow_color.';';
				$style .= '-webkit-box-shadow:' .$shadow_type.' '.$horizontal.' '.$vertical.' '.$blur.' '.$spread.' '.$shadow_color.';';
				$style .= '-ms-box-shadow:'     .$shadow_type.' '.$horizontal.' '.$vertical.' '.$blur.' '.$spread.' '.$shadow_color.';';
				$style .= '-o-box-shadow:'      .$shadow_type.' '.$horizontal.' '.$vertical.' '.$blur.' '.$spread.' '.$shadow_color.';';
				$style .= 'box-shadow:'         .$shadow_type.' '.$horizontal.' '.$vertical.' '.$blur.' '.$spread.' '.$shadow_color.';';

				if ( ! empty( $this->field['output'] ) && is_array( $this->field['output'] ) ) {
					if (!empty($style)) {
						$keys = implode( ",", $this->field['output'] );
						$this->parent->outputCSS .= $keys . "{" . $style . '}';
					}
				}

				if ( ! empty( $this->field['compiler'] ) && is_array( $this->field['compiler'] ) ) {
					if (!empty($style)) {
						$keys = implode( ",", $this->field['compiler'] );
						$this->parent->compilerCSS .= $keys . "{" . $style . '}';
					}
				}
			}

		}

	}
}
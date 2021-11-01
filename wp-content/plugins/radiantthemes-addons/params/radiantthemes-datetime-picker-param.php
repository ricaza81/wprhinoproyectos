<?php
/**
 * Datetimepicker Parameter
 *
 * @package Radiantthemes
 */

vc_add_shortcode_param(
	'datetimepicker',
	'datetimepicker_settings_field',
	plugins_url( 'admin/js/bootstrap-datetimepicker.min.js', dirname( __FILE__ ) )
);

/**
 * [datetimepicker_settings_field description]
 *
 * @param  [type] $settings description.
 * @param  [type] $value    description.
 * @return [type]           [description]
 */
function datetimepicker_settings_field( $settings, $value ) {
	$dependency = '';
	$param_name = isset( $settings['param_name'] ) ? $settings['param_name'] : '';
	$type       = isset( $settings['type'] ) ? $settings['type'] : '';
	$class      = isset( $settings['class'] ) ? $settings['class'] : '';
	$uni        = uniqid( 'datetimepicker-' . rand() );

	return '<div id="ult-date-time ' . esc_attr( $uni ) . '" class="ult-datetime"><input data-format="yyyy/MM/dd hh:mm:ss" readonly class="wpb_vc_param_value ' . esc_attr( $param_name ) . ' ' . esc_attr( $type ) . ' ' . esc_attr( $class ) . '" name="' . esc_attr( $param_name ) . '" style="width:258px;" value="' . esc_attr( $value ) . '" ' . $dependency . '/><div class="add-on" >  <i class="fa fa-calendar" aria-hidden="true"></i></div></div>';
	// This is html markup that will be outputted in content elements edit form.
}

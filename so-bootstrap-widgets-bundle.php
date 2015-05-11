<?php

/*
Plugin Name: SiteOrigin Bootstrap Widgets Bundle
Description: Overwrites widget templates in SiteOrigin Widgets Bundle and includes extra widgets.
Version: 1.0.0
Author: Duane Cilliers
Author URI: http://duane.co.za
Plugin URI: http://duane.co.za/plugins/so-bootstrap-widgets-bundle/
License: GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.txt
*/

class SO_Bootstrap_Widget_Bundle {

	function __construct() {
		add_filter( 'siteorigin_widgets_form_options_sow-button', array( $this, 'extend_button_form' ), 10, 2 );
		add_filter( 'siteorigin_widgets_template_file_sow-button', array( $this, 'button_template_file' ), 10, 3 );
	}

	function extend_button_form( $form_options, $widget ) {
		if ( isset( $form_options['design']['fields'] ) ) {
			unset( $form_options['design']['fields']['font_size'] );
			unset( $form_options['design']['fields']['padding'] );

			$form_options['design']['fields']['size'] = array(
				'type' => 'select',
				'label' => __('Button Size', 'so-bootstrap-widgets-bundle'),
				'default' => 'default',
				'options' => array(
					'extra_small' => __( 'Extra Small', 'so-bootstrap-widgets-bundle' ),
					'small' => __( 'Small', 'so-bootstrap-widgets-bundle' ),
					'default' => __( 'Default', 'so-bootstrap-widgets-bundle' ),
					'large' => __( 'Large', 'so-bootstrap-widgets-bundle' )
				)
			);

			$form_options['design']['fields']['style'] = array(
				'type' => 'select',
				'label' => __('Button Style', 'so-bootstrap-widgets-bundle'),
				'default' => 'primary',
				'options' => array(
					'default' => __( 'Default', 'so-bootstrap-widgets-bundle' ),
					'primary' => __( 'Primary', 'so-bootstrap-widgets-bundle' ),
					'success' => __( 'Success', 'so-bootstrap-widgets-bundle' ),
					'info' => __( 'Info', 'so-bootstrap-widgets-bundle' ),
					'warning' => __( 'Warning', 'so-bootstrap-widgets-bundle' ),
					'danger' => __( 'Danger', 'so-bootstrap-widgets-bundle' )
				)
			);
		}
		return $form_options;
	}

	function button_template_file( $filename, $instance, $widget ) {
		$filename = plugin_dir_path( __FILE__ ) . 'tpl/button.php';
		return $filename;
	}
}

new SO_Bootstrap_Widget_Bundle();

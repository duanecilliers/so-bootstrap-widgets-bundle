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
		add_filter( 'siteorigin_widgets_template_file_sow-button', array( $this, 'button_template_file' ), 10, 3 );
	}

	function button_template_file( $filename, $instance, $widget ) {
		$filename = plugin_dir_path( __FILE__ ) . 'tpl/button.php';
		return $filename;
	}
}

new SO_Bootstrap_Widget_Bundle();

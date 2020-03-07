<?php
/**
 * @package Matrix Title
 */
/*
Plugin Name: Matrix Title
Plugin URI: 
Description: Use Javascript to create a widget that will display a Matrix Title
Version: 1.1
Author: Nathan Gajewski
License: GPLv2 or later

*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

*/

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

// Add required files 
if ( file_exists(plugin_dir_path(__FILE__).'/includes/matrixWidget.php')) {
	require_once(plugin_dir_path(__FILE__).'/includes/matrixWidget.php');
}else{
	exit;
}


if ( !class_exists( 'Matrix' ) ) {// is single design - make sure that only 1 class can be created 
	class Matrix
		{
			function __construct() { // is executed when an object of the class is created 

				add_action('wp_enqueue_scripts',array( $this, 'AddScripts')); // adds our method to the correct hook for adding our scripts  
				add_action('widgets_init',array($this,'AddWidget'));// adds our method to the correct hook for registering our widget  
			}

			function AddScripts() {
				// add all our scripts to the plugin 
				//css
				wp_enqueue_style('matrix_style',plugins_url('/matrix/css/style.css'));
				// js 
				wp_enqueue_script('matrix_script', plugins_url('/matrix/js/main.js'));
			}

			function AddWidget(){
				register_widget('TheMatrixWidget');  // uses WordPress function to add our widget to the plugin
			}
		}

	$matrix = new Matrix(); // creates an object of our Matrix Title
	}
	
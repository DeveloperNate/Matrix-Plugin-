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

class Matrix
	{
        function __construct() { // is executed when an object of the class is created 

            add_action('wp_enqueue_scripts',array( $this, 'AddScripts')); // adds our method to the correct hook for adding our scripts  
        }

        function AddScripts() {
			// add all our scripts to the plugin 
			//css
			wp_enqueue_style('matrix_style',plugins_url('/matrix/css/style.css'));
			// js 
			wp_enqueue_script('matrix_script', plugins_url('/matrix/js/main.js'));
		}
    }

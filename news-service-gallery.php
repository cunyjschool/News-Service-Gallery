<?php
/*
Plugin Name: News Service Gallery
Plugin URI: http://nycitynewsservice.com/
Description: Gallery for the NYCity News Service based on nggGalleryview
Author: Daniel Bachhuber
Author URI: http://danielbachhuber.com/
Version: 0.1
*/

if (!class_exists('NewsServiceGallery')) {
	class NewsServiceGallery {
		
		var $plugin_url = false;
		
		function galleryview() {
			
			$this->plugin_url = WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/';
			
			// load scripts into the head
			add_action('wp_print_scripts', array(&$this, 'load_scripts') );
			add_action('wp_print_styles', array(&$this, 'load_styles') );
			add_filter('ngg_render_template', array(&$this, 'add_template'), 10, 2);
		}

		function add_template( $path, $template_name = false) {
			if ($template_name == 'gallery-galleryview')
				$path = WP_PLUGIN_DIR . '/' . plugin_basename( dirname(__FILE__) ) . '/view/gallery-galleryview.php';
				
			return $path;
		}

		function load_styles() {
			wp_enqueue_style('galleryview', $this->plugin_url . 'galleryview.css', false, '1.0.1', 'screen');
		}

		function load_scripts() {
			wp_enqueue_script('easing', $this->plugin_url . 'jquery.easing.1.2.js', array('jquery'), '1.2');			
			wp_enqueue_script('galleryview', $this->plugin_url . 'jquery.galleryview-1.1-pack.js', array('jquery'), '1.1');
 			wp_enqueue_script('timers', $this->plugin_url . 'jquery.timers-1.1.2.js', array('jquery'), '1.1.2');
		}

	}
	
	// Start this plugin once all other plugins are fully loaded
	add_action( 'plugins_loaded', create_function( '', 'global $NewsServiceGallery; $NewsServiceGallery = new NewsServiceGallery();' ) );

}
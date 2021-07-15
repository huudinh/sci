<?php
/*
Plugin Name: Shortcodes
Plugin URI: http://module.codeteam.xyz
Description: A free shortcodes plugin.
Author: Dinh Trieu
Author URI: https://www.facebook.com/huudinh85
Version: 1.0.0
License: GPLv2
*/

if ( ! class_exists( 'SympleShortcodes' ) ) {

	class SympleShortcodes {

		/**
		 * Main Constructor
		 *
		 * @since  2.0.0
		 * @access public
		 */
		public function __construct() {

			// Plugin version Constant
			define( 'SYMPLE_SHORTCODES_VERSION', '2.1.3' );
			define( 'SYMPLE_SHORTCODES_PLUGIN_SLUG', plugin_basename( __FILE__ ) );

			// Define path
			$this->dir_path = plugin_dir_path( __FILE__ );

			// Register de-activation hook
			register_deactivation_hook( __FILE__, array( $this, 'on_deactivation' ) );

			// Admin only
			if ( is_admin() ) {

				// MCE button
				add_action( 'admin_head', array( $this, 'add_mce_button' ) );
				add_action( 'admin_enqueue_scripts', array( $this, 'mce_css' ) );

				

			}

			// Front end only
			else {

				// Front-end scripts
				add_action( 'wp_enqueue_scripts', array( $this, 'load_scripts' ) );

				// Add responsive tag to body
				add_filter( 'body_class', array( $this, 'body_class' ) );

			}

			// Test domain
			add_action( 'plugins_loaded', array( $this, 'load_text_domain' ) );

			// The actual shortcode functions
			require_once( $this->dir_path .'/shortcodes/shortcodes.php' );

		}

		/**
		 * Load Text Domain for translations
		 *
		 * @since  2.0.0
		 * @access public
		 */


		/**
		 * Add filters for the TinyMCE buttton
		 *
		 * @since  2.0.0
		 * @access public
		 */
		function add_mce_button() {

			// Check user permissions
			if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
				return;
			}

			// Check if WYSIWYG is enabled
			if ( 'true' == get_user_option( 'rich_editing' ) ) {
				add_filter( 'mce_external_plugins', array( $this, 'add_tinymce_plugin' ) );
				add_filter( 'mce_buttons', array( $this, 'register_mce_button' ) );
			}

		}

		/**
		 * Loads the TinyMCE button js file
		 *
		 * @since  2.0.0
		 * @access public
		 */
		function add_tinymce_plugin( $plugin_array ) {
			$plugin_array['symple_shortcodes_mce_button'] = plugins_url( '/tinymce/symple_shortcodes_tinymce.js', __FILE__ );
			return $plugin_array;
		}

		/**
		 * Adds the TinyMCE button to the post editor buttons
		 *
		 * @since  2.0.0
		 * @access public
		 */
		function register_mce_button( $buttons ) {
			array_push( $buttons, 'symple_shortcodes_mce_button' );
			return $buttons;
		}

		/**
		 * Loads custom CSS for the TinyMCE editor button
		 *
		 * @since  2.0.0
		 * @access public
		 */
		function mce_css() {
			wp_enqueue_style('symple_shortcodes-tc', plugins_url( '/tinymce/symple_shortcodes_tinymce_style.css', __FILE__ ) );
		}

		/**
		 * Registers/Enqueues all scripts and styles
		 *
		 * @since  2.0.0
		 * @access public
		 */
		function load_scripts() {

			// Get options
			$options = get_option( 'symple_shortcodes' );

			// Define js directory
			$js_dir = plugin_dir_url( __FILE__ ) . 'shortcodes/js/';

			// Define CSS directory
			$css_dir = plugin_dir_url( __FILE__ ) . 'shortcodes/css/';

			// Core jQuery
			wp_enqueue_script( 'jquery' );
		}

		/**
		 * Add admin notice to enable the Visual Composer
		 *
		 * @since  2.0.0
		 * @access public
		 */


		
		/**
		 * Adds classes to the body tag
		 *
		 * @since 2.1.0
		 */
		public function body_class( $classes ) {
			$classes[] = 'symple-shortcodes ';
			if ( apply_filters( 'symple_shortcodes_responsive', true ) ) {
				$classes[] = 'symple-shortcodes-responsive';
			}
			return $classes;
		}
		
	}

	// Start things up
	$symple_shortcodes = new SympleShortcodes();

}
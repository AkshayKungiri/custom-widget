<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://webaone.com
 * @since      1.0.0
 *
 * @package    Wp_cstm_widget
 * @subpackage Wp_cstm_widget/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wp_cstm_widget
 * @subpackage Wp_cstm_widget/includes
 * @author     Akshay Kungiri <akshaykungiri@gmail.com>
 */
class Wp_cstm_widget_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wp_cstm_widget',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}

<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://webaone.com
 * @since      1.0.0
 *
 * @package    Wp_cstm_widget
 * @subpackage Wp_cstm_widget/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_cstm_widget
 * @subpackage Wp_cstm_widget/admin
 * @author     Akshay Kungiri <akshaykungiri@gmail.com>
 */
class Wp_cstm_widget_Admin
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		add_action("admin_menu", array($this, "addSettingPageMenu"));
		add_action('admin_init', array($this, 'registerSettingFields'));
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_cstm_widget_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_cstm_widget_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style('thickbox');
		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/wp_cstm_widget-admin.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_cstm_widget_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_cstm_widget_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/wp_cstm_widget-admin.js', array( 'jquery', 'media-upload', 'thickbox', 'wp-color-picker' ), $this->version, false);
	}

	/**
	 * 
	 */
	public function addSettingPageMenu()
	{
		add_menu_page($this->plugin_name, 'WP Settings & Widget Page', 'administrator', $this->plugin_name, array($this, 'displayPluginSettingPage'));
	}

	/**
	 * 
	 */
	public function displayPluginSettingPage()
	{
		require_once 'partials/' . $this->plugin_name . '-admin-display.php';
	}

	public function registerSettingFields()
	{
		register_setting($this->plugin_name . '_general_settings', "wp_cstm_widget_title");
		register_setting($this->plugin_name . '_general_settings', "wp_cstm_widget_description");
		register_setting($this->plugin_name . '_general_settings', "wp_cstm_widget_editor_content");
		register_setting($this->plugin_name . '_general_settings', "wp_cstm_widget_date");
		register_setting($this->plugin_name . '_general_settings', "wp_cstm_widget_logo_image");
		register_setting($this->plugin_name . '_general_settings', "wp_cstm_widget_color");
	}

	public function wp_cstm_widget_init_callback() {
		register_widget( 'Wp_Cstm_Widget_Create' );
	}
}

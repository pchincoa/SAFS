<?php
/*
Plugin Name: Responsive P5JS for WP
Plugin URI: http://cagewebdev.com/responsive-p5js-for-wp
Description: Embed an existing P5JS sketch in a post or page
Version: 1.1.1
Date: 04/17/2021
Author: Rolf van Gelder
Author URI: http://cagewebdev.com/
License: GPL2
*/

/***********************************************************************************************
 *
 *	USAGE:
 *
 *	You can use the shorttag [p5js] ... [/p5js] to embed your code into your post / page:
 *
 *	[p5js sketchfolder=myfirstsketch canvaswidth=566 canvasheight=378 bordersize=1 bordercolor=#aaa][/p5js]
 *
 ***********************************************************************************************/

/***********************************************************************************************
 *
 * 	CREATE INSTANCE
 *
 ***********************************************************************************************/
global $p5js_class;
$p5js_class = new p5js;


/***********************************************************************************************
 *
 * 	MAIN CLASS
 *
 ***********************************************************************************************/ 
class p5js {	

	/*******************************************************************************************
	 *
	 * 	PROPERTIES
	 *
	 *******************************************************************************************/
	var $version      = '1.1.1';
	var $release_date = '04/17/2021';
	
	var $slug         = 'p5js';
	
	var $plugindir    = '';
	var $pluginurl    = '';
	
	var $upload_dir_p5js;
	var $images_url;
	
	// OBJECTS
	var $p5js_displayer_obj;
	
	var $txt_domain   = 'p5js';
	
	// MINIFYING?
	var $minify;	

	
	/*******************************************************************************************
	 *
	 * 	CONSTRUCTOR
	 *
	 *******************************************************************************************/	 
	function __construct() {

		// INITIALIZE PLUGIN
		add_action('init', array(&$this, 'p5js_init'));
		
		// FRONTEND AND BACKEND ACTIONS
		if($this->p5js_is_fontend_page()) {
			// ADD SHORTCODE
			add_shortcode('p5js', array(&$this, 'p5js_insert_iframe'));
			// LOAD THE FRONTEND SCRIPTS
			add_action('init', array(&$this, 'p5js_fe_scripts'));	
		} else {
			// BACKEND
			add_action('admin_menu', array(&$this, 'p5js_admin_settings'));
		} // if($this->p5js_is_fontend_page())
		
		// ADD 'SETTINGS' LINK TO THE MAIN PLUGIN PAGE
		add_filter('plugin_action_links_'.plugin_basename(__FILE__), array(&$this, 'p5js_settings_link'));				
	} // __construct()
	
	
	/*******************************************************************************
	 *
	 * 	INITIALIZE PLUGIN
	 *
	 *******************************************************************************/	
	function p5js_init() {
		// USE THE NON-MINIFIED VERSION OF SCRIPTS AND STYLE SHEETS WHILE DEBUGGING
		$this->minify = (defined('WP_DEBUG') && WP_DEBUG) ? '' : '.min';		
		
		// PLUGIN PROPERTIES
		$this->plugindir = plugin_dir_path(__FILE__);
		$this->pluginurl = plugins_url().'/responsive-p5js-for-wp/';
		
		// IMAGE DIRECTORY
		$this->images_url = $this->pluginurl . 'images/';
		
		// CREATE THE uploads/p5js/ SKETCH DIRECTORY (IF IT DOESN'T EXIST YET)
		$upload_dir = wp_upload_dir();
		$this->upload_dir_p5js = $upload_dir['basedir'].'/'. $this->slug . '/';;
		
		// CREATE DIRECTORY
		if (!file_exists($this->upload_dir_p5js)) wp_mkdir_p($this->upload_dir_p5js);
		
		// LOAD CLASSES & CREATE INSTANCES
		include_once('classes/p5js-displayer.php');
		$this->p5js_displayer_obj = new P5JS_Displayer();
		
		// LOAD STYLE SHEETS
		//$handle, $src, $deps, $ver, $media
		wp_register_style('p5js-style-'.$this->version, plugins_url('css/p5js' . $this->minify . '.css', __FILE__), null, $this->version);
		wp_enqueue_style('p5js-style-'.$this->version);	
	} // p5js_init()


	/*******************************************************************************
	 *
	 * 	ADD 'SETTINGS' LINK TO THE MAIN PLUGIN PAGE
	 *
	 *******************************************************************************/
	function p5js_settings_link($links) {
		array_unshift($links, '<a href="options-general.php?page=p5js_settings_page">'.__('Settings', $this->txt_domain).'</a>');
		return $links;
	} // p5js_settings_link()


	/*******************************************************************************
	 *
	 * 	ADD ENTRY TO THE ADMIN SETTINGS MENU
	 *
	 *******************************************************************************/	
	function p5js_admin_settings() {
		if (function_exists('add_options_page'))
			add_options_page(
				__('Responsive P5JS Instructions', $this->txt_domain),	// page title
				__('Responsive P5JS Instructions', $this->txt_domain),	// menu title
				'manage_options',								// capability
				'p5js_settings_page',							// menu slug
				array(&$this, 'p5js_settings_page')				// function
			);
	} // p5js_admin_settings()


	/*******************************************************************************
	*
	 * 	L0AD THE HELP PAGE
	 *
	 *******************************************************************************/
	function p5js_settings_page() {
		include_once(trailingslashit(dirname(__FILE__)).'/admin/p5js_instructions.php');
	} // p5js_settings_page()	

	/*******************************************************************************************
	 *
	 *	LOAD FRONTEND JAVASCRIPT
	 *
	 *******************************************************************************************/
	function p5js_fe_scripts() {
		wp_enqueue_script('loader-script', plugin_dir_url( __FILE__ ).'js/loader' . $this->minify . '.js', array('jquery'), $this->version, false);
	} // p5js_fe_scripts()
	

	/*******************************************************************************************
	 *
	 *	SHOW A LINK TO THE INSTRUCTIONS PAGE ON THE MAIN PLUGINS PAGE
	 *
	 *******************************************************************************************/ 
	function p5js_plugin_instructions_link($links) { 
	  array_unshift($links, '<a href="options-general.php?page=p5js_instructions">'.__('Instructions', $this->slug).'</a>'); 	  
	  return $links;
	} // p5js_plugin_instructions_link()
	

	/*******************************************************************************************
	 *
	 * 	IS THIS A FRONTEND PAGE?
	 *
	 *******************************************************************************************/
	function p5js_is_fontend_page() {
		if (isset($GLOBALS['pagenow'])) {
			return !is_admin() && !in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
		} else {
			return !is_admin();
		}
	} // p5js_is_regular_page()
	

	/*******************************************************************************************
	 *
	 *	ADD THE INSTRUCTIONS TO THE SETTINGS MENU (HIDDEN LINK!)
	 *
	 *******************************************************************************************/ 
	function p5js_instructions_link() {
		if (function_exists('add_submenu_page')) {
			add_submenu_page(
				null, // parent_slug: HIDE FROM MENUS!
				__('Responsive P5JS', $this->slug), // page_title
				__('Responsive P5JS', $this->slug), // menu_title
				'manage_options', // capabitily
				'p5js_instructions', // menu_slug
				'p5js_instructions' // function
			);
		}	
	} // p5js_instructions_link()

	
	/*******************************************************************************************
	 *
	 *	ADD THE PROCESSING CODE TO THE POST / PAGE (CALLBACK FOR THE SHORT CODES
	 *
	 *******************************************************************************************/ 
	function p5js_insert_iframe($atts, $content) {
		// GET THE ATTRIBUTES FROM THE SHORTCODE
		$sketch_folder = '';
		if(isset($atts['sketchfolder'])) { $sketch_folder = $atts['sketchfolder'];	}
		
		$width = '';
		if(isset($atts['canvaswidth'])) { $width = $atts['canvaswidth']; }

		$height = '';
		if(isset($atts['canvasheight'])) { $height = $atts['canvasheight']; }
		
		$border_size = '0';
		if(isset($atts['bordersize'])) { $border_size = $atts['bordersize']; }
	
		$border_color = '';
		if(isset($atts['bordercolor'])) { $border_color = $atts['bordercolor']; }
		
		//$border_style = 'border: solid ' . $border_size . 'px ' . $border_color . '"';
		$border_style = '"border: solid ' . $border_size . 'px ' . $border_color . '"';

		// ADD IFRAME TO THE PAGE
		$iframe_id = 'p5js-iframe-' . rand(1, 10000);

		$upload_dir = wp_upload_dir();
		$sketch_url = $upload_dir['baseurl'] . '/' . $this->slug . '/' . $sketch_folder . '/';

		// SCALING FACTOR
		$canvas_ratio = ($height / $width) * 100;

		// RESPONSIVE
		$output =
		'
<div class="p5js-embed-container" style="padding-bottom: ' . $canvas_ratio . '%;">
	<iframe plugin="p5js" src="' . $sketch_url . '" id="' . $iframe_id . '" style=' . $border_style . ' class="p5js-iframe" name="' . $iframe_id . '" scrolling="no" allowfullscreen></iframe>
</div>
		';
		return $output;
	} // p5js_insert_iframe()
} // p5js


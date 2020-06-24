<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://fr.linkedin.com/in/mohammed-bensaad-developpeur
 * @since      1.0.0
 *
 * @package    Show_Expo
 * @subpackage Show_Expo/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Show_Expo
 * @subpackage Show_Expo/includes
 * @author     Mohammed Bensaas <bensaadmucret@gmail.com>
 */
class Show_Expo_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'show-expo',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}

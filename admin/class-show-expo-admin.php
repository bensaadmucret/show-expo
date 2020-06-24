<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://fr.linkedin.com/in/mohammed-bensaad-developpeur
 * @since      1.0.0
 *
 * @package    Show_Expo
 * @subpackage Show_Expo/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Show_Expo
 * @subpackage Show_Expo/admin
 * @author     Mohammed Bensaas <bensaadmucret@gmail.com>
 */
class Show_Expo_Admin
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
         * defined in Show_Expo_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Show_Expo_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/show-expo-admin.css', array(), $this->version, 'all');
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
         * defined in Show_Expo_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Show_Expo_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/show-expo-admin.js', array( 'jquery' ), $this->version, false);
    }

    
        
    public function wpdocs_register_my_custom_menu_page()
    {
        add_menu_page(
            __('Custom Menu Title', 'show-expo'),
            'SHOW EXPO',
            'manage_options',
            'exposants-management-tool',
            array($this, 'exposants_management_dashboard'),
            'dashicons-welcome-write-blog',
            22
        );
        
        add_submenu_page(
            'exposants-management-tool',
            'Dashboard',
            'Dashboard',
            'manage_options',
            'exposants-management-tool',
            array($this, 'exposants_management_dashboard'),
        );

        add_submenu_page(
            'exposants-management-tool',
            'Gestion des exposants',
            'Gestion des exposants',
            'manage_options',
            'Gestion-des-exposants',
            array($this, 'exposants_management_plugin'),
        );
        
        add_submenu_page(
            'exposants-management-tool',
            'Création',
            'Création',
            'manage_options',
            'Gestion-des-exposants-creation',
            array($this, 'exposants_management_create'),
        );
    }

 
    /**
     * Display a custom menu page
     */
    public function exposants_management_dashboard()
    {
        echo '<h3>Gestionnaire des exposants</h3>'	;
    }
    
    /**
     * Display a custom menu page
     */
    public function exposants_management_create()
    {
        echo '<h3>Gestionnaire création </h3>'	;
    }
    
    /**
    * Display a custom menu page
    */
    public function exposants_management_plugin()
    {
        echo '<h3>sous menu</h3>'	;
        global $wpdb;
        $results = $wpdb->get_results("SELECT ID, post_title  FROM {$wpdb->prefix}posts");
        $post_row = $wpdb->get_row(
            $wpdb->prepare("SELECT * from {$wpdb->prefix}posts WHERE ID =%d", 1)
        );
        
        var_dump($post_row);
    }
}

<?php

/**
 * Fired during plugin activation
 *
 * @link       https://fr.linkedin.com/in/mohammed-bensaad-developpeur
 * @since      1.0.0
 *
 * @package    Show_Expo
 * @subpackage Show_Expo/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Show_Expo
 * @subpackage Show_Expo/includes
 * @author     Mohammed Bensaas <bensaadmucret@gmail.com>
 */
class Show_Expo_Activator
{

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public function activate()
    {
        $table_query = "CREATE TABLE IF NOT EXISTS `{$this->wp_owt_tbl_books()}` ( 
                `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(150) NULL , 
                `amount` INT(11) NULL , 
                `desscription` TEXT NULL , 
                `book_image` VARCHAR(200) NULL , 
                `language` VARCHAR(150) NULL , 
                `status` INT(11) 
                NOT NULL DEFAULT '1' , 
                `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
                PRIMARY KEY (`id`)
            ) ENGINE = InnoDB CHARSET = utf8";

        require_once(ABSPATH. 'wp-admin'. DIRECTORY_SEPARATOR .'includes'. DIRECTORY_SEPARATOR . 'upgrade.php');
        dbDelta($table_query);
        flush_rewrite_rules();
    }
    /**
     * prefix dynamiquement la table
     *
     * @return void
     */
    private function wp_owt_tbl_books()
    {
        global $wpdb;
        return $wpdb->prefix."owt_tbl_books";
    }
}

<?php
/**
 * Plugin Name: PerDays Addon
 * Description: A Mulistep Form Plugin
 * Plugin URI: https://abdullah.co
 * Author: Abdullah
 * Author URI: https://gitlab.com/masumtaf/
 * Version: 1.0.0
 * License: GPL3 or later
 * License URI: https://www.gnu.org/licenses/quick-guide-gplv3.html
 * Text Domain: perdays-addon
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


/**
 * Main PerDays Addon Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class PerDays_Addon {

    /**
     * Plugin Version
     *
     * @since 1.0.0
     *
     * @var string The plugin version.
     */
    const VERSION = '1.0.0';

    /**
     * Minimum Elementor Version
     *
     * @since 1.0.0
     *
     * @var string Minimum Elementor version required to run the plugin.
     */
    const MINIMUM_ELEMENTOR_VERSION = '3.5.1';

    /**
     * Minimum PHP Version
     *
     * @since 1.0.0
     *
     * @var string Minimum PHP version required to run the plugin.
     */
    const MINIMUM_PHP_VERSION = '7.0';

    /**
     * Instance
     *
     * @since 1.0.0
     *
     * @access private
     * @static
     *
     * @var PerDays_Addon The single instance of the class.
     */
    private static $_instance = null;

    /**
     * Instance
     *
     * Ensures only one instance of the class is loaded or can be loaded.
     *
     * @since 1.0.0
     *
     * @access public
     * @static
     *
     * @return PerDays_Addon An instance of the class.
     */
    public static function instance() {

        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Constructor
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function __construct() {

        $this->define_constants();

        register_activation_hook( __FILE__ , [ $this, 'activated' ] );

        add_action('plugins_loaded', [ $this, 'on_plugins_loaded' ]);

    }

    /**
     * Define the required plugin constants
     *
     * @return void
     */
    public function define_constants() {

        if ( ! defined( 'PEDN_PBNAME' ) ) define( 'PEDN_PBNAME', plugin_basename(__FILE__) );
        if ( ! defined( 'PEDN_PATH' ) ) define( 'PEDN_PATH', plugin_dir_path( __FILE__ ) );
        if ( ! defined( 'PEDN_VER' ) ) define( 'PEDN_VER', '1.0.0' );
        if ( ! defined( 'PEDN_ADMIN' ) ) define( 'PEDN_ADMIN', PEDN_PATH . 'admin/' );	
        if ( ! defined( 'PEDN_ADMIN_URL' ) ) define( 'PEDN_ADMIN_URL', plugins_url( '/', __FILE__ ) . 'admin/' );	
        if ( ! defined( 'PEDN_INCLUDES' ) ) define( 'PEDN_INCLUDES', PEDN_PATH . 'includes/' );
        // if ( ! defined( 'PEDN_CLASSES' ) ) define( 'PEDN_CLASSES', PEDN_PATH . 'includes/classes/' );
        // if ( ! defined( 'PEDN_TEMPLATES' ) ) define( 'PEDN_TEMPLATES', PEDN_PATH . 'includes/template-parts/' );
        if ( ! defined( 'PEDN_URL' ) ) define( 'PEDN_URL', plugins_url( '/', __FILE__ ) );
        if ( ! defined( 'PEDN_ASSETS_URL' ) ) define( 'PEDN_ASSETS_URL', PEDN_URL . 'assets/' );
        if ( ! defined( 'PEDN_PLUGIN_VERSION' ) ) define( 'PEDN_PLUGIN_VERSION', '1.0.0' );
        if ( ! defined( 'MINIMUM_PHP_VERSION' ) ) define( 'MINIMUM_PHP_VERSION', '7.4' );
    

    }

      /**
     * On Plugins Loaded
     *
     * Checks if Elementor has loaded, and performs some compatibility checks.
     * If All checks pass, inits the plugin.
     *
     * Fired by `plugins_loaded` action hook.
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function on_plugins_loaded() {

        $this->includes();

        // new Antares_Addon\includes\Assets_Manager();
        // new Antares_Addon\includes\Custom_PostTypes();
        // new Antares_Addon\includes\Metaboxes();
        // // new Antares\Utility();
        // // new Antares\Frontend\Shortcodes();

        // new Antares_Addon\Includes\Antares_Widgets_Controls();

        // if (is_admin()) {
        //     new Antares\Admin();
        // }

        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );

       
        new PerDays_Addon\Includes\PerDays_Customer_details_Form();
    }

    /**
     * 
     * Including necessary assets
     * @since 1.0.0
     */
    public function includes() {

        include_once PEDN_INCLUDES . '/helpers.php';
        include_once PEDN_INCLUDES . '/shortcode-functions.php';
        include_once PEDN_INCLUDES . '/class-customer-details.php';

    }

    public function enqueue_scripts() {

        // wp_enqueue_style( 'bootstrap-css', PEDN_ASSETS_URL . 'css/bootstrap.css' );
        wp_enqueue_style( 'select2-style', PEDN_ASSETS_URL . 'css/select2.min.css' );
        wp_enqueue_style( 'pedn-main-style', PEDN_ASSETS_URL . 'css/main-style.css' );
	
		// wp_enqueue_script( 'bootstrap-js', PEDN_ASSETS_URL . 'js/bootstrap.min.js', array(), PEDN_VER, true );
		// wp_enqueue_script( 'jquery.easing', PEDN_ASSETS_URL . 'js/jquery.easing.min.js', array(), PEDN_VER, true );
		wp_enqueue_script( 'select2-js', PEDN_ASSETS_URL . 'js/select2.full.min.js', array(), PEDN_VER, true );
		wp_enqueue_script( 'pedn-main-js', PEDN_ASSETS_URL . 'js/main.js', array(), PEDN_VER, true );
	
    }

    /**
     * Do stuff when plugin active
     * 
     * @return void
     */
    public function activated(){

        $this->create_tables();

    }
    
    
    /**
     * Create Table to $wpdb
     * 
     * 
     */
    public function create_tables() {
        global $wpdb;

        $charset_collate = $wpdb->get_charset_collate();

        $schema = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}pdy_customer_detls` (
          `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
          `created_by` int(20),
          `name` varchar(100) NOT NULL DEFAULT '',
          `phone` varchar(30) DEFAULT NULL,
          `email` varchar(30) DEFAULT NULL,
          `address` varchar(255) DEFAULT NULL,
          `prd_id` varchar(30) DEFAULT NULL,
          `summery_of_order` varchar(255) DEFAULT NULL,
          PRIMARY KEY (`id`)
        ) $charset_collate";

        if ( ! function_exists( 'dbDelta' ) ) {
            require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        }

        dbDelta( $schema );
    }

}

PerDays_Addon::instance();

<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://titu.com
 * @since      1.0.0
 *
 * @package    Woo_Quick_View
 * @subpackage Woo_Quick_View/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Woo_Quick_View
 * @subpackage Woo_Quick_View/public
 * @author     TItu <titu@gmail.com>
 */
class Woo_Quick_View_Public {

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
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct( $plugin_name, $version ) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

        wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/woo-quick-view-public.css', array(), $this->version, 'all' );
        wp_enqueue_style( 'normalize', plugin_dir_url( __FILE__ ) . 'css/normalize.css', array(), $this->version, 'all' );
        wp_enqueue_style( 'animate', plugin_dir_url( __FILE__ ) . 'css/animate.css', array(), $this->version, 'all' );

    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        wp_enqueue_script( 'quick-view-public', plugin_dir_url( __FILE__ ) . 'js/woo-quick-view-public.js', array( 'jquery' ), $this->version, true );

        wp_localize_script('quick-view-public','woo-quick-view',array(
            'ajax_url' => admin_url('admin-ajax.php'),
            // 'site_url' => site_url(),
            // 'some_variable' => 'some_value',
            // 'another_variable' => 'another_value'
        ));

    }
}

<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://alifallahrn.ir
 * @since      1.0.0
 *
 * @package    Wppb
 * @subpackage Wppb/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Wppb
 * @subpackage Wppb/includes
 * @author     Ali Fallah <alifallahrn@gmail.com>
 */
class Wppb
{
    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     * the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function __construct()
    {
        $this->classes = apply_filters('afrn_wppb_classes', array(
            \AFRN\WPPB\Core\AdminManager::class,
            \AFRN\WPPB\Core\PublicManager::class,
        ));

        $this->load_dependencies();
    }

    /**
     * Load the required dependencies for this plugin.
     *
     * Include the following files that make up the plugin:
     *
     * - Wppb_Loader. Orchestrates the hooks of the plugin.
     * - Wppb_i18n. Defines internationalization functionality.
     * - Wppb_Admin. Defines all hooks for the admin area.
     * - Wppb_Public. Defines all hooks for the public side of the site.
     *
     * Create an instance of the loader which will be used to register the hooks
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function load_dependencies()
    {
        /**
         * The file responsible for defining all functions of the core plugin.
         */
        require_once WPPB_DIR . 'includes/functions.php';
    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     * @since    1.0.0
     */
    public function run()
    {
        if (is_array($this->classes) && !empty($this->classes)) {
            foreach ($this->classes as $class) {
                $classObject = new $class();
                if (method_exists($classObject, 'init')) {
                    call_user_func([$classObject, 'init']);
                }
            }
        }
    }
}

<?php

namespace AFRN\WPPB\Core;

class PublicManager
{
    public function init()
    {
        // Load the plugin text domain for translation.
        add_action('plugins_loaded', array($this, 'load_plugin_textdomain'));

        // Enqueue styles
        add_action('wp_enqueue_scripts', array($this, 'enqueue_styles'));

        // Enqueue scripts
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
    }

    public function load_plugin_textdomain()
    {
        load_plugin_textdomain(WPPB_NAME, false, dirname(WPPB_DIR, 2) . '/languages/');
    }

    public function enqueue_styles()
    {
        wp_enqueue_style(WPPB_NAME, WPPB_URL . 'public/css/wppb-public.css', array(), WPPB_VERSION, 'all');
    }

    public function enqueue_scripts()
    {
        wp_enqueue_script(WPPB_NAME, WPPB_URL . 'public/js/wppb-public.js', array('jquery'), WPPB_VERSION, false);
    }
}
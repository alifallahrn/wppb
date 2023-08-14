<?php

namespace AFRN\WPPB\Core;

class AdminManager
{
    public function init()
    {
        // Enqueue styles
        add_action('admin_enqueue_scripts', array($this, 'enqueue_styles'));

        // Enqueue scripts
        add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));

        // display admin notice
        add_action('admin_notices', array($this, 'display_admin_notice'));
    }

    public function enqueue_styles()
    {
        wp_enqueue_style(WPPB_NAME, WPPB_URL . 'admin/css/wppb-admin.css', array(), WPPB_VERSION, 'all');
    }

    public function enqueue_scripts()
    {
        wp_enqueue_script(WPPB_NAME, WPPB_URL . 'admin/js/wppb-admin.js', array('jquery'), WPPB_VERSION, false);
    }

    public function display_admin_notice()
    {
        echo '<div class="notice notice-success is-dismissible">';
        echo '<p>Admin notice from WPPB</p>';
        echo '</div>';
    }
}
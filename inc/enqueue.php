<?php

if (!function_exists('ddev_pc_enqueue_scripts')) {
    function ddev_pc_enqueue_scripts()
    {
        global $post;
        //register styling
        wp_register_style('dpc-main-style', plugins_url('/assets/css/main-style.css', DPC_PLUGIN_URL));
        //register scripts
        wp_register_script(
            'dpc-main-script',
            plugins_url('/assets/js/main.js', DPC_PLUGIN_URL),
            ['jquery', 'dpc-vue', 'wp-i18n'],
            '1.0.0',
            true
        );
        wp_register_script(
            'dpc-vue',
            plugins_url('/assets/js/vue.js', DPC_PLUGIN_URL),
            ['jquery'],
            '1.0.0',
            true
        );
        wp_register_script(
            'dpc-vue-loader',
            plugins_url('/assets/js/vue-loader.js', DPC_PLUGIN_URL),
            ['jquery'],
            '1.0.0',
            true
        );
        if (has_shortcode($post->post_content, 'power-calculator')) {
            //enqueue styling
            wp_enqueue_style('dpc-main-style');
            //enqueue scripts
            wp_enqueue_script('dpc-vue');
            wp_enqueue_script('dpc-vue-loader');
            wp_enqueue_script('dpc-main-script');
        }
    }
}

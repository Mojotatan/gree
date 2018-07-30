<?php
/**
 * Added by Michael Gusev <_@gus.eu>
 */

if ( ! defined('ABSPATH')) {
    header(
        'Cache-Control: max-age=1209600, s-maxage=86400, stale-while-revalidate=86400, stale-if-error=432000',
        true,
        404
    );
    exit;
}

add_action('wp_enqueue_scripts', 'gree_action_wp_enqueue_scripts');
function gree_action_wp_enqueue_scripts()
{
    $version = defined('WP_DEBUG') && WP_DEBUG ? time() : '20180622.1';
    wp_enqueue_style('gree-style-fixes', get_template_directory_uri() . '/fixes.css', array(), $version);
}

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

add_action('init', 'gree_products_action_init');
function gree_products_action_init()
{
    if (function_exists('register_field_group')) {
        register_field_group(array(
            'key'                   => 'group_products',
            'title'                 => __('Product Information', 'gree'),
            'fields'                => array(
                array (
                    'key' => 'field_group_products_background',
                    'label' => __('Product Background Image', 'gree'),
                    'name' => 'background',
                    'type' => 'image',
                    'save_format' => 'url',
                    'preview_size' => 'thumbnail',
                    'library' => 'all',
                ),
            ),
            'location'              => array(
                array(
                    array(
                        'param'    => 'post_type',
                        'operator' => '==',
                        'value'    => 'product',
                    ),
                ),
            ),
            'menu_order'            => -10,
            'position'              => 'normal',
            'style'                 => 'default',
            'label_placement'       => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen'        => '',
            'active'                => 1,
            'description'           => '',
        ));
    }
}

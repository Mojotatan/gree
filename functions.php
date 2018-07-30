<?php
	if ( function_exists('register_sidebar') )
		register_sidebar(array(
			'before_widget' => '<div class="sidepanel">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
	));

	add_theme_support( 'post-thumbnails');

	function empty_content($str) {
		return trim(str_replace('&nbsp;','',strip_tags($str))) == '';
	}

	function register_my_menu() {
	  register_nav_menu('main-menu',__( 'Primary Navigation' ));
	  register_nav_menu('footer-menu',__( 'Footer Menu' ));
	}
	add_action( 'init', 'register_my_menu' );

/**
 * Added by Michael Gusev <_@gus.eu>
 */
add_action('after_setup_theme', 'gree_action_after_setup_theme');
function gree_action_after_setup_theme()
{
    load_theme_textdomain('gree', get_template_directory() . '/languages');

    $postTypes = array();
    foreach (glob(__DIR__ . '/entities/*.php') as $file) {
        require_once $file;
    }
    foreach (glob(__DIR__ . '/src/*.php') as $file) {
        require_once $file;
    }
    foreach (glob(__DIR__ . '/hooks/*.php') as $file) {
        require_once $file;
    }

    foreach ($postTypes as $type => $meta) {
        register_post_type($type, $meta);
    }
}

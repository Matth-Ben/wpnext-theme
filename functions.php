<?php

require_once get_template_directory() . '/admin/acf.php';
require_once get_template_directory() . '/admin/comments.php';
require_once get_template_directory() . '/admin/menu.php';
require_once get_template_directory() . '/admin/posts.php';
require_once get_template_directory() . '/admin/role.php';

function wp_menu_route() {
    $menuLocations = get_nav_menu_locations(); // Get nav locations set in theme, usually functions.php)
    $menuID = $menuLocations['header-menu']; // Get the *primary* menu added in register_nav_menus()
    $primaryNav = wp_get_nav_menu_items($menuID); // Get the array of wp objects, the nav items for our queried location.
    return $primaryNav;
}

add_action( 'rest_api_init', function () {
    //https://your-wp-domain-url.com/wp-json/custom-name/menu
    register_rest_route( 'custom-name', '/menu', array(
        'methods' => 'GET',
        'callback' => 'wp_menu_route',
    ));
} ); 
<?php
class Custom_Post_Types
{
    public function __construct()
    {
    }
    /*public function cityandpeople_register_post_type_init()
    {
        $labels = array(
            'name' => __('High school'),
            'singular_name' => __('High school'), // show in admin panel add->Movie
            'add_new' => __('Add high school'),
            'add_new_item' => __('Add new high school'), // <title>
            'edit_item' => __('Edit high school'),
            'new_item' => __('New high school'),
            'all_items' => __('All high schools'),
            'view_item' => __('View high school'),
            'search_items' => __('Search high school'),
            'not_found' => __('High schools not found.'),
            'not_found_in_trash' => __('High schools not found in trash.'),
            'menu_name' => __('High schools'),
        );
        $args = array(
            'labels' => $labels,
            'public' => true, //for all users - true
            'show_ui' => true, // show in admin panel
            'has_archive' => true,
            'menu_icon' => get_stylesheet_directory_uri() . '/img/function_icon.png', // иконка в меню
            'menu_position' => 20,
            'supports' => array('title', 'editor', 'comments', 'author', 'thumbnail'),
        );
        register_post_type('high-school', $args);
    }

    public function cityandpeople_register_human_init()
    {
        $labels = array(
            'name' => __('Human'),
            'singular_name' => __('Human'), // show in admin panel add->Movie
            'add_new' => __('Add human'),
            'add_new_item' => __('Add new human'), // <title>
            'edit_item' => __('Edit human'),
            'new_item' => __('New human'),
            'all_items' => __('All people'),
            'view_item' => __('View human'),
            'search_items' => __('Search people'),
            'not_found' => __('People not found.'),
            'not_found_in_trash' => __('People not found in trash.'),
            'menu_name' => __('People'),
        );
        $args = array(
            'labels' => $labels,
            'public' => true, //for all users - true
            'show_ui' => true, // show in admin panel
            'has_archive' => true,
            'menu_icon' => get_stylesheet_directory_uri() . '/img/function_icon.png', // иконка в меню
            'menu_position' => 20,
            'supports' => array('title', 'editor', 'comments', 'author', 'thumbnail'),
        );
        register_post_type('human', $args);
    }

    public function cityandpeople_register_theatre_init()
    {
        $labels = array(
            'name' => __('Theatre'),
            'singular_name' => __('Theatre'), // show in admin panel add->Movie
            'add_new' => __('Add theatre'),
            'add_new_item' => __('Add new theatre'), // <title>
            'edit_item' => __('Edit theatre'),
            'new_item' => __('New theatre'),
            'all_items' => __('All theatres'),
            'view_item' => __('View theatre'),
            'search_items' => __('Search theatres'),
            'not_found' => __('Theatres not found.'),
            'not_found_in_trash' => __('Theatres not found in trash.'),
            'menu_name' => __('Theatre'),
        );
        $args = array(
            'labels' => $labels,
            'public' => true, //for all users - true
            'show_ui' => true, // show in admin panel
            'has_archive' => true,
            'menu_icon' => get_stylesheet_directory_uri() . '/img/function_icon.png', // иконка в меню
            'menu_position' => 20,
            'supports' => array('title', 'editor', 'comments', 'author', 'thumbnail'),
        );
        register_post_type('theatre', $args);
    }

    public function cityandpeople_register_museum_init()
    {
        $labels = array(
            'name' => __('Museum'),
            'singular_name' => __('Museum'), // show in admin panel add->Movie
            'add_new' => __('Add museum'),
            'add_new_item' => __('Add new museum'), // <title>
            'edit_item' => __('Edit museum'),
            'new_item' => __('New museum'),
            'all_items' => __('All museums'),
            'view_item' => __('View museum'),
            'search_items' => __('Search museums'),
            'not_found' => __('Museums not found.'),
            'not_found_in_trash' => __('Museums not found in trash.'),
            'menu_name' => __('Museums'),
        );
        $args = array(
            'labels' => $labels,
            'public' => true, //for all users - true
            'show_ui' => true, // show in admin panel
            'has_archive' => true,
            'menu_icon' => get_stylesheet_directory_uri() . '/img/function_icon.png', // иконка в меню
            'menu_position' => 20,
            'supports' => array('title', 'editor', 'comments', 'author', 'thumbnail'),
        );
        register_post_type('museum', $args);
    }*/
	
    public function cityandpeople_register_city_object_init()
    {
		//echo "lll";
        $labels = array(
            'name' => __('City object'),
            'singular_name' => __('City object'), // show in admin panel add->Movie
            'add_new' => __('Add city object'),
            'add_new_item' => __('Add new city object'), // <title>
            'edit_item' => __('Edit city object'),
            'new_item' => __('New city object'),
            'all_items' => __('All city objects'),
            'view_item' => __('View city object'),
            'search_items' => __('Search city objects'),
            'not_found' => __('City objects not found.'),
            'not_found_in_trash' => __('City objects not found in trash.'),
            'menu_name' => __('City objects'),
        );
        $args = array(
            'labels' => $labels,
            'public' => true, //for all users - true
            'show_ui' => true, // show in admin panel
            'has_archive' => true,
            'menu_icon' => get_stylesheet_directory_uri() . '/img/function_icon.png', // иконка в меню
            'menu_position' => 20,
            'supports' => array('title', 'editor', 'comments', 'author', 'thumbnail'),
        );
        register_post_type('city_object', $args);
		//register_taxonomy_for_object_type( 'city_object_taxonomy', 'city_object' );
    }
}

add_action( 'init', 'post_tag_for_pages' );
function post_tag_for_pages(){
	register_taxonomy_for_object_type( 'city_object_taxonomy', 'city_object');
}

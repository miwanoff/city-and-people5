<?php

// Setup
define('CITYANDPEOPLE_DEV_MODE', true);

// Includes
include get_theme_file_path('includes/core/Enqueue.php');
include get_theme_file_path('includes/core/Setup.php');
include get_theme_file_path('includes/core/Widgets.php');
include get_theme_file_path('includes/core/Options.php');
include get_theme_file_path('includes/core/Cityandpeople_Nav_Walker.php');
include get_theme_file_path('includes/core/Custom_Post_Types.php');
include get_theme_file_path('includes/core/Custom_Taxonomies.php');
include get_theme_file_path('includes/core/Custom_Fields_Type.php');
//include get_theme_file_path('includes/acf-fields.php');
//include get_theme_file_path('includes/filter_rating.php');
include get_theme_file_path('includes/filters/Acf_Filter_Rating.php');
include get_theme_file_path('includes/filters/Acf_Filter_Year.php');
include get_theme_file_path('includes/filters/Filter_dates.php');

//include get_theme_file_path('includes/filter_year.php');
//include get_theme_file_path('includes/acf-slider.php');
include get_theme_file_path('includes/core/My_Slider.php');
include get_theme_file_path('includes/core/Cpt_Gutenberg_Support.php');
include get_theme_file_path('includes/core/Gutenberg_Template_To_Single_Post.php');
include get_theme_file_path('includes/core/Flickr_Cache.php');
//include get_theme_file_path('includes/core/Voices.php');
// Hooks
add_action('wp_enqueue_scripts', [new Enqueue(), 'cityandpeople_enqueue']);
add_action('after_setup_theme', [new Setup(), 'cityandpeople_setup_theme']);
add_action('widgets_init', [new Widgets(), 'cityandpeople_widgets']);
//add_action('init', [new Custom_Post_Types(), 'cityandpeople_register_post_type_init']);
//add_action('init', [new Custom_Post_Types(), 'cityandpeople_register_human_init']);
//add_action('init', [new Custom_Post_Types(), 'cityandpeople_register_theatre_init']);
//add_action('init', [new Custom_Post_Types(), 'cityandpeople_register_museum_init']);
add_action('init', [new Custom_Post_Types(), 'cityandpeople_register_city_object_init']);
add_action('init', [new Custom_Taxonomies(), 'cityandpeople_register_taxonomies_init']);
//$rating_object = new acf_filter_rating($query);
//echo " ro: ";
//print_r($rating_object);
add_action('pre_get_posts', /*[new acf_filter_rating($query), */'acf_filter_rating', 1);
add_action('pre_get_posts', /*[new acf_filter_rating($query), */'acf_filter_rating', 1);
add_action('init', /*[new acf_filter_year($query), */'acf_filter_year', 1);
//add_action('pre_get_posts', 'filter_year', 1);
add_action('acf/init', [new My_Slider(), 'my_register_blocks']);
add_action('acf/init', [new Options(), 'options']);
add_action('init', [new Custom_Fields_Type(), 'is_post_type']);
add_action('init', [new Cpt_Gutenberg_Support(), 'custom_post_types']);
add_action('init', [new Gutenberg_Template_To_Single_Post(), 'gutenberg_template_to_single_post']);
//add_action('init', [new Flickr_Cache(), 'get_User_ID']);
add_action('init', [new Flickr_Cache(), 'get_API_Key']);
add_action('init', [new Flickr_Cache(), 'get_API_Secret']);
add_action('wp_ajax_myfilter', 'my_filter_function'); // wp_ajax_{ACTION HERE} 
add_action('wp_ajax_nopriv_myfilter', 'my_filter_function');
//add_action('wp_enqueue_scripts', [new Voices(), 'blog_js'], 99);
/*add_action('rest_api_init', function () {

    //echo "hhh";
    register_rest_route('example/v2', '/likes/(?P<id>\d+)', array(
        'methods' => array('GET', 'POST'),
        'callback' => array("Voices", 'example__like'),
    ));

});*/

// Shortcodes
<?php
class Cpt_Gutenberg_Support
{
    public function __construct()
    {
    }
    /*Register WordPress Gutenberg CPT */
    public function custom_post_types()
    {
        /*register_post_type('high-school',
            array(
                'labels' => array(
                    'name' => __('High school'),
                    'singular_name' => __('High_school'),
                ),
                'has_archive' => true,
                'public' => true,
                'rewrite' => array('slug' => 'high-school'),
                'show_in_rest' => true,
                'supports' => array('editor'),
            )
        );
        register_post_type('human',
            array(
                'labels' => array(
                    'name' => __('Human'),
                    'singular_name' => __('Human'),
                ),
                'has_archive' => true,
                'public' => true,
                'rewrite' => array('slug' => 'human'),
                'show_in_rest' => true,
                'supports' => array('editor'),
            )
        );
        register_post_type('theatre',
            array(
                'labels' => array(
                    'name' => __('Theatre'),
                    'singular_name' => __('Theatre'),
                ),
                'has_archive' => true,
                'public' => true,
                'rewrite' => array('slug' => 'theatre'),
                'show_in_rest' => true,
                'supports' => array('editor'),
            )
        );
        register_post_type('museum',
            array(
                'labels' => array(
                    'name' => __('Museum'),
                    'singular_name' => __('Museum'),
                ),
                'has_archive' => true,
                'public' => true,
                'rewrite' => array('slug' => 'museum'),
                'show_in_rest' => true,
                'supports' => array('editor'),
            )
        );*/
        register_post_type('city_object',
            array(
                'labels' => array(
                    'name' => __('City Object'),
                    'singular_name' => __('City Object'),
                ),
                'has_archive' => true,
                'public' => true,
                'rewrite' => array('slug' => 'city_object'),
                'show_in_rest' => true,
                'supports' => array('editor'),
            )
        );
    }
}

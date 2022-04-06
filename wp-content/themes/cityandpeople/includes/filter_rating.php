<?php

function filter_rating($query)
{
    if (isset($_GET["rating"]) && is_archive()) {

        // $query->set('post_type', ['high-school']);
        //    print_r($_GET['rating']);
        $args = array(
            'numberposts' => 2,
            'post_type' => 'high-school',
            'meta_key' => 'rating',
            'meta_value' => $_GET['rating'],
        );
        $query = new WP_Query($args);

        // $current_meta = $query->get('meta_query') ? $query->get('meta_query') : [];
        // print_r($current_meta);
        // $current_meta[] = array(
        //     'key' => 'rating',
        //     'value' => $_GET['rating'],
        //     'compare' => '=',
        // );
        //  print_r($current_meta);
        // $query->set('meta_query', $current_meta);

        // $args = array(
        //     'post_type' => 'high-school',
        //     'meta_query' => array(
        //         array(
        //             'key' => 'rating',
        //             'value' => $_GET["rating"],
        //             'compare' => '=',
        //         ),
        //     ),
        // );
        // $query = new WP_Query($args);
    }
}
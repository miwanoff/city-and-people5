<?php
 
function kc_show_carousel($content)
{
	//echo "uuu";
	$args = [
        'category_name' => get_option('kc_category_name'),
        //'post_type' => 'post',
        'post_type' => get_option('kc_post_type') ? get_option('kc_post_type') : 'post',
        //'post_type' => 'recipe',
        // 'post_type' => 'movies',
        //'tag' => get_option('kc_tag'),
        'showposts' => get_option('kc_count'),
        //'category_name' => 'cooking',
        //'post_type' => 'recipe',
        // 'post_type' => 'movies',
        //'tag' => 'cooking',
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
    ];
 
	//echo " a: ";
	//print_r ($args);
    $query = new WP_Query($args);
	//echo " q: ";
	//print_r ($query);
    $html = '';
    if ($query->have_posts()) {
        $html = '<section id="demos">
    <div class="row">
        <div class="large-12 columns">
            <div class="owl-carousel owl-theme">';
        while ($query->have_posts()) {
            $query->the_post();
            $html .= '<div class="item" style="background:url(' . get_the_post_thumbnail_url($query->post->ID, 'thumbnail') . ') #80808052 center;background-size:cover;"><h5>';
            $html .= '<a href="' . get_permalink($query->post->ID) . '">' . $query->post->post_title . '</a>';
            $html .= '</h5></div>';
        }
        $html .= ' </div>
    </div>
	</div>
	</section>';
    }
	wp_reset_postdata();
	
	//echo $content . $html;
    return $content . $html;
}

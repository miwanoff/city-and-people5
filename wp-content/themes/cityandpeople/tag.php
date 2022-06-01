<?php get_header("v2");?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- Title -->
            <h1 class="mt-4 mb-3"><?php the_archive_title();?></h1>
            <span><?php the_archive_description();?></span>
        </div>
    </div>
</div>
<!-- Page Content -->
<div class="container">

    <!-- <h1 class="my-4">Welcome to Modern Business</h1> -->

    <!-- Marketing Icons Section -->
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">



            <?php $args = array(
						//'posts_per_page' => 4, // сколько похожих постов нужно вывести,
						'post_type' => 'city_object',
						'tag' => get_queried_object()->slug
						//'post_status' => 'public'
					);
					$my_query = new WP_Query( $args );
					if ($my_query->have_posts()) {
    while ($my_query->have_posts()) {
        $my_query->the_post();
        get_template_part('partials/posts/content', 'excerpt');
    }
} else {
    get_template_part('partials/posts/content', 'none');
}
?>

            <!-- Pagination -->
            <ul class="pagination justify-content-center mb-4">
                <li class="page-item">
                    <?php previous_posts_link("&larr; Older");?>
                    <!-- <a class="page-link" href="#">&larr; Older</a> -->
                </li>
                <li class="page-item">
                    <?php next_posts_link("Newer &rarr;");?>
                    <!-- <a class="page-link" href="#">Newer &rarr;</a> -->
                </li>
            </ul>


        </div>
        <?php get_sidebar();?>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>
<?php get_footer();?>
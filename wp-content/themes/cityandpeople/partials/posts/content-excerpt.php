<!-- Blog Post -->
<div class="card mb-4">
    <!-- <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap"> -->
    <?php if (has_post_thumbnail()) {
    the_post_thumbnail("full", ["class" => "card-img-top"]);
}?>
    <div class="card-body">
        <h2 class="card-title"><a href="<?php the_permalink()?>"><?php the_title()?></a></h2>

        <p class="card-text"><?php the_excerpt()?></p>
        <!-- <a href="#" class="btn btn-primary">Read More &rarr;</a> -->
        <a href="<?php the_permalink()?>" class="btn btn-primary"><?php _e("Read More &rarr;") ?></a>
    </div>
    <div class="card-footer text-muted">
        <?php _e ("Post category:"); echo " "; the_category(" ")?>
        <?php _e ("Posted on"); echo " ".get_the_date()." "; _e ("by"); ?> 
        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author()?></a>
        <?php _e('Comments: ', 'cityandpeople');
comments_number("0");?>
    </div>
</div>
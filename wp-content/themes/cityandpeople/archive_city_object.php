<?php 
/*
 * Template Name: Архів міських об'єктів
 * Template post type: page, city_object
*/
get_header("v2");?>

<!-- Page Content -->
<div class="container">

    <!-- Marketing Icons Section -->
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">

			<div id="object_archive">
				<?php $args = array(
						'posts_per_page' => 4, // сколько похожих постов нужно вывести,
						'post_type' => 'city_object',
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
					</li>
					<li class="page-item">
						<?php next_posts_link("Newer &rarr;");?>
					</li>
				</ul>
			</div>
			<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
				<input type="date" name="old_date" placeholder="<?php _e("The oldest date"); ?>" />
				<input type="date" name="new_date" placeholder="<?php _e("The newsest date"); ?>" />
				<button><?php _e("Apply filter"); ?></button>
				<input type="hidden" name="action" value="myfilter">
			</form>
        </div>
        <?php get_sidebar();?>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>

<?php get_footer();?>
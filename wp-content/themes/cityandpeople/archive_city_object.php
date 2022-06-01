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
			<?php
			while (have_posts())
			{
				the_post();
			global $post;
			$author_ID = $post->post_author;
			$author_URL = get_author_posts_url($author_ID);
    ?>

            <!-- Title -->

            <h1 class="mt-4 mb-3"><?php the_title()?></h1>

            <!-- Post category: -->
            <h2 class="mt-4"><?php the_category(" ")?></h2>

            <!-- Author -->
            <p class="lead">
                by
                <a href="<?php echo $author_URL; ?>"><?php the_author();?></a>
            </p>

            <hr>

            <!-- Date/Time -->
            <p><?php the_time(get_option('date_format'));
    echo " ";
    the_time(get_option('time_format'));?></p>

            <hr>

            <!-- Preview Image -->
            <!-- <img class="img-fluid rounded" src="http://placehold.it/900x300" alt=""> -->
            <?php
if (has_post_thumbnail()) {
        the_post_thumbnail("full", ["class" => "card-img-top"]);
    }
    ?>

            <hr>

            <!-- Post Content -->
            <?php
the_content();
    $defaults = array(
        'before' => '<div class="row justify-content-center align-items-center">' . __('Pages:'),
        'after' => '</div>',
    );

    wp_link_pages($defaults);

    edit_post_link();
    ?>

            <hr>

            <!-- Tag cloud -->
            <?php the_tags('', ', ');?>

            <hr>

            <!-- Pagination -->
            <ul class="pagination justify-content-center mb-4">
                <li class="page-item">
                    <?php previous_post_link();?>
                </li>
                <li class="page-item">
                    <?php next_post_link();?>
                </li>
            </ul>
			<?PHP
			}
			?>
			<div id="object_archive" class="row">
				<?php $args = array(
						//'posts_per_page' => 4, // сколько похожих постов нужно вывести,
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
				<?php 
				$queried_object = get_queried_object();
				$taxonomies = get_terms( [
					'taxonomy'     => 'city_object_taxonomy',
					'type'         => 'city_object',
					'orderby'      => 'name',
					'order'        => 'ASC',
					'hide_empty'   => 0,
					'hierarchical' => 1,
					'show_count' => 1,
					'pad_counts' => 0,
					'child_of' => $queried_object->term_id
				// полный список параметров смотрите в описании функции http://wp-kama.ru/function/get_terms
				] );
				//echo " t: ";
				$tax_hierarchies = array();
				Hierarchical::sort_terms_hierarchicaly( $taxonomies, $tax_hierarchies );

				//print_r( $tax_hierarchies );
				echo "<h4>";
				_e ("Object categories:");
				echo "</h4>
				<ul>";
				Hierarchical::child_list ($tax_hierarchies);
				//print_r ($taxonomies);

				/*if( $tax_hierarchies ){
					foreach( $tax_hierarchies as $taxonomy ){
						// Данные в объекте $cat

						echo $taxonomy->name."<br/>";

					}
				}*/
				?>
				<button><?php _e("Apply filter"); ?></button>
				<input type="hidden" name="action" value="myfilter"/>
			</form>
        </div>
        <?php get_sidebar();?>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>

<?php get_footer();
?>
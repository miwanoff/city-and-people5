<!-- Sidebar Widgets Column -->
<div class="col-md-4">
    <?php //get_search_form();?>
    <?php
if (is_active_sidebar('cityandpeople_sidebar')) {
    dynamic_sidebar('cityandpeople_sidebar');
}
?>
<h3>Фильтр</h3>
<?php echo do_shortcode( '[searchandfilter fields="city_object_taxonomy" hierarchical=1]' ); ?>
</div>
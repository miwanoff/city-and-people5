<?php

function my_filter_function(){
	//echo "jjjj";
	 
	//echo " pdn: ".$_POST ["new_date"]." pdo: ".$_POST ["old_date"];
	// create $args['meta_query'] array if one of the following fields is filled
	if( isset( $_POST['new_date'] ) && $_POST['new_date'] || isset( $_POST['old_date'] ) && $_POST['old_date'])
		$args['meta_query'] = array( 'relation'=>'AND' ); // AND means that all conditions of meta_query should be true
 
	// if both minimum price and maximum price are specified we will use BETWEEN comparison
	if( isset( $_POST['new_date'] ) && $_POST['new_date'] && isset( $_POST['old_date'] ) && $_POST['old_date'] ) {
		$args['meta_query'][] = array(
			'key' => 'дата',
			'value' => array( $_POST['old_date'], $_POST['new_date'] ),
			'type' => 'date',
			'compare' => 'between'
		);
	} else {
		// if only min price is set
		if( isset( $_POST['old_date'] ) && $_POST['old_date'] )
			$args['meta_query'][] = array(
				'key' => 'дата',
				'value' => $_POST['old_date'],
				'type' => 'date',
				'compare' => '>'
			);
 
		// if only max price is set
		if( isset( $_POST['new_date'] ) && $_POST['new_date'] )
			$args['meta_query'][] = array(
				'key' => 'дата',
				'value' => $_POST['new_date'],
				'type' => 'date',
				'compare' => '<'
			);
	}
	//echo " a: ";
	$args['post_type'] = "city_object";
	print_r ($args);
 
	$query = new WP_Query( $args );
	//echo " q: ";
	//print_r ($query);
	
	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			get_template_part('partials/posts/content', 'excerpt');
		}
	}
	else {
		get_template_part('partials/posts/content', 'none');
	}	
	die();
}
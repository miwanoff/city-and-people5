<?php
class My_nearest_objects
{
	public function __construct()
	{
	}
	public function my_nearest_function()
	{
		//echo "jjjj";
	 
		//echo " pdn: ".$_POST ["new_date"]." pdo: ".$_POST ["old_date"];
		// create $args['meta_query'] array if one of the following fields is filled
		$args = array
		(
			"post_type" => "city_object",
			"post__not_in" => array ($_POST ["current_id"])
		);
		$wide = strstr (substr (strstr (get_the_content (null, null, $_POST ["current_id"]), "map_center"), 12, strlen (strstr (get_the_content (null, null, $_POST ["current_id"]), "map_center")) - 12), ",", true);
		$long = strstr (substr (strstr (strstr (get_the_content (null, null, $_POST ["current_id"]), "map_center"), ","), 1, strlen (strstr (strstr (get_the_content (null, null, $_POST ["current_id"]), "map_center"), ",")) - 1), '"', true);
		$my_query = new WP_Query ($args);
		usort
		(
			$my_query->posts, array
			(
				$this,
				function ($post1, $post2) use ($wide, $long)
				{
					if ((strstr ($post1->post_content, "map_center")) && (strstr ($post2->post_content, "map_center")))
					{
						$wide_near1 = strstr (substr (strstr ($post1->post_content, "map_center"), 12, strlen (strstr ($post1->post_content, "map_center")) - 12), ",", true);
						$long_near1 = strstr (substr (strstr (strstr ($post1->post_content, "map_center"), ","), 1, strlen (strstr (strstr ($post1->post_content, "map_center"), ",")) - 1), '"', true);	
						$is_near1 = 12742000 * asin (sqrt (pow (sin (($wide_near1 - $wide) * pi () / 360), 2) + cos ($wide_near1 * pi () / 180) * cos ($wide * pi () / 180) * pow (sin (($long_near1 - $long) * pi () / 360), 2)));
						$wide_near2 = strstr (substr (strstr ($post2->post_content, "map_center"), 12, strlen (strstr ($post2->post_content, "map_center")) - 12), ",", true);
						$long_near2 = strstr (substr (strstr (strstr ($post2->post_content, "map_center"), ","), 1, strlen (strstr (strstr ($post2->post_content, "map_center"), ",")) - 1), '"', true);	
						$is_near2 = 12742000 * asin (sqrt (pow (sin (($wide_near1 - $wide) * pi () / 360), 2) + cos ($wide_near1 * pi () / 180) * cos ($wide * pi () / 180) * pow (sin (($long_near1 - $long) * pi () / 360), 2)));
						if ($is_near1 == $is_near2)
							return -1;
						if ($is_near > $is_near2)
							return 0;
						if ($is_near < $is_near2)
							return -1;
					}
				}
			)
		);
		if ($my_query->have_posts())
		{
			$title = "";
			$link = "";
			while ($my_query->have_posts())
			{
				$my_query->the_post();;
				if (strstr ($my_query->post->post_content, "map_center"))
				{
					$wide_near = strstr (substr (strstr ($my_query->post->post_content, "map_center"), 12, strlen (strstr ($my_query->post->post_content, "map_center")) - 12), ",", true);
					$long_near = strstr (substr (strstr (strstr ($my_query->post->post_content, "map_center"), ","), 1, strlen (strstr (strstr ($my_query->post->post_content, "map_center"), ",")) - 1), '"', true);	
					$distance_near = 12742 * asin (sqrt (pow (sin (($wide_near - $wide) * pi () / 360), 2) + cos ($wide_near * pi () / 180) * cos ($wide * pi () / 180) * pow (sin (($long_near - $long) * pi () / 360), 2)));
					if ($distance_near <= $_POST ["diapason"])
					{
						$title = $my_query->post->post_title;
						$link = get_permalink ($my_query->post->ID);
						echo "<a href = '".$link."'>".$title."</a> - ".$distance_near."&nbsp;";
						_e ("km");
						echo "<br/>";
					}
				}
			}
		}
		wp_reset_postdata ();
		wp_die ();
		return;
	}
}
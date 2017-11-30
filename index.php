<?php get_header(); ?>
<?php
	//Only display center widget if current page is home page
	if(is_home())
		get_sidebar('center');
	else
	{
	?>
		<div id="main-content" role="main">
			<?php
			if(!is_single() && !is_page()){
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array( 'post_type' => 'post', 'posts_per_page' => 3, 'paged' => $paged );
				$wp_query = new WP_Query($args);
			}
			if(have_posts()): 
				while(have_posts()): the_post(); //Loop 
					get_template_part('content', get_post_format());
				endwhile;
			else:
				get_template_part('content', 'none'); //Nhúng trang content-none.php nếu không có post
			endif;
			echo '<div class="paginate">';
			previous_posts_link( '<i class="glyphicon glyphicon-arrow-left btn-paginate"></i>' );
			next_posts_link( '<i class="glyphicon glyphicon-arrow-right btn-paginate"></i>', $wp_query ->max_num_pages);
			echo '</div>';
			?>
		</div><!-- End #main-content -->
	<?php } ?>
<?php get_footer(); ?>




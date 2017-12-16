<?php get_header(); ?>
	<div id="main-content" role="main">
		<?php
		if(have_posts()):
			?>
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<?php
							while(have_posts()): 
								the_post(); //Loop 
								get_template_part('content', get_post_format());
							endwhile; 
						?>
					</div>
					<div class="col-md-4">
						<div class="related-posts">
							<h4><i class='glyphicon glyphicon-pushpin'></i> Bài viết liên quan</h4>
							<?php
								$tags = wp_get_post_tags($post->ID);
								if ($tags) {
									$first_tag = $tags[0]->term_id;
									$args=array(
										'tag__in' => array($first_tag),
										'post__not_in' => array($post->ID),
										'posts_per_page'=>5,
										'caller_get_posts'=>1
									);
									$my_query = new WP_Query($args);
									if( $my_query->have_posts() ) {
										echo '<ul>';
										while ($my_query->have_posts()) : $my_query->the_post(); ?>
										<li><i class='glyphicon glyphicon-flash'></i><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">

											<?php the_title(); ?>
										</a></li>
										<?php
										endwhile;
										echo '</ul>';
									}
									wp_reset_query();
								}
							?>
						</div>
						<div class="ad">
							<!-- Ad -->
						</div>
					</div>
				</div>
			</div>
			<?php 
		else:
			get_template_part('content', 'none'); //Nhúng trang content-none.php nếu không có post
		endif;
		?>
	</div><!-- End #main-content -->
<?php get_footer(); ?>
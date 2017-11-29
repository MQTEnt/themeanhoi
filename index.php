<?php get_header(); ?>
<?php
	//Only display center widget if current page is home page
	if(is_home())
		get_sidebar('center');
	else
	{
	?>
		<div id="main-content" role="main">
			<?php if(have_posts()): while(have_posts()): the_post(); //Loop ?>
			<?php
				get_template_part('content', get_post_format());
			?>
			<?php endwhile ?>
			<?php else: ?>
				<?php get_template_part('content', 'none'); //Nhúng trang content-none.php nếu không có post ?>
			<?php endif ?>
		</div><!-- End #main-content -->
	<?php } ?>
<?php get_footer(); ?>

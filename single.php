<?php
// page
get_header();
?>
	<!-- Main body Wrap -->
	<?php if(have_posts()): ?>
		<?php while(have_posts()): ?>
		<?php the_post(); ?>
	<div class="contents">
			<div class="pages">
				<div class="productDetails clearfix">
					<div class="singleProduct">
					<div class="breadCrumb"><?php the_breadcrumb(); ?></div><br/>
					<?php the_content(); ?>
					</div>
				</div>
			</div>
	</div>
	<?php endwhile; endif; ?>

<?php get_footer(); ?>


<?php
// page
get_header();
?>
	<!-- Main body Wrap -->
	<?php if(have_posts()): ?>
		<?php while(have_posts()): ?>
		<?php the_post(); ?>
	<div class="contents">
		<?php if(is_home() || is_page('home')): ?>
		<div class="introduction">
			<?php 
				if(has_post_thumbnail()):
					$thumb_img = wp_get_attachment_url(get_post_thumbnail_id());
			?>
			<div class="introImage"><img src="<?= $thumb_img; ?>" alt=""/></div>
				<?php endif; ?>
			<div class="introContent">
				<?php the_content(); ?>
			</div>
		</div>
	<?php else: ?>
			<div class="pages">
				<div class="productDetails clearfix">
					<div class="singleProduct">
					<div class="breadCrumb"><?php the_breadcrumb(); ?></div><br/>
					<?php the_content(); ?>
					</div>
				</div>
			</div>

	<?php endif; ?>

	</div>
	<?php endwhile; endif; ?>

<?php get_footer(); ?>




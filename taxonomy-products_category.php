<?php
// product archive page
get_header();
?>
<div class="contents">
<div class="pages">
<div class="products clearfix">
<?php
	$taxonomy = 'products_category';
	$queried_term = get_query_var($taxonomy);
	$term = get_term_by( 'slug', $queried_term, $taxonomy );
	$termName =  $term->name;
?>
<h2 class="categoryname"><?= $termName ?></h2>
<?php 
	if(have_posts()):
		while(have_posts()):
		the_post();
		$thumb = wp_get_attachment_url(get_post_thumbnail_id());
		 ?>
			<div class="product pull-left"><a href="<?= get_the_permalink(); ?>"><img src="<?= $thumb; ?>" alt="" /></a>
			<a href="<?= get_the_permalink(); ?>" class="prdctNme text-center"><?= get_the_title(); ?></a></div>
<?php
		endwhile;
	endif;
	?>
</div>
</div>



</div>
<?php
get_footer();
?>
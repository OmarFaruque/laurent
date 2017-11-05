<?php
// Product Tag pages
get_header();
?>
<div class="contents">
<div class="pages">
<div class="products clearfix">
<?php
if ( is_tag() ) {
$term_id = get_query_var('tag_id');
$taxonomy = 'post_tag';
$args ='include=' . $term_id;
$terms = get_terms( $taxonomy, $args );
}
?>
<h2 class="categoryname"><?= $terms[0]->name; ?></h2>
<?php 
query_posts(array( 
    'post_type' => 'product',
    'showposts' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'post_tag',
            'terms' => $terms[0]->term_id,
            'field' => 'term_id',
        )
    ) )
);
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
<?php
// products category
get_header();
?>

<div class="contents">
<div class="pages">
<div class="productDetails clearfix">
<div class="singleProduct">
<div class="breadcrumbs breadCrumb" typeof="BreadcrumbList" vocab="http://schema.org/">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>
<?php
if(have_posts()):
     previous_post_link(); 
  while(have_posts()):
    the_post();
    // get_posts in same custom taxonomy
    $postlist_args = array(
       'posts_per_page'  => -1,
       'orderby'         => 'menu_order title',
       'order'           => 'ASC',
       'post_type'       => 'product',
       'taxonomy'        => 'products_category'
    ); 
    $postlist = get_posts( $postlist_args );

    // get ids of posts retrieved from get_posts
    $ids = array();
    foreach ($postlist as $thepost) {
       $ids[] = $thepost->ID;
    }

    // get and echo previous and next post in the same taxonomy        
    $thisindex = array_search($post->ID, $ids);
    $previd = $ids[$thisindex-1];
    $nextid = $ids[$thisindex+1];
    
    $first_key = array_values($ids)[0];
    $last_key = end($ids);
    $current = array_search($post->ID, $ids);
    $total = count($ids);
     ?>
  <ul class="productPagination text-center">
  <li>
    <?php
      if(!empty($first_key)){
        echo '<a rel="first" href="'.get_permalink($first_key).'">First</a>';
      }
    ?>
  </li>   
  <li>
    <?php 
    if ( !empty($previd) ) {
      echo '<a rel="prev" href="' . get_permalink($previd). '">previous</a>';
    }
    ?>
  </li>   
  <li><?= $current; ?> of <?= $total; ?> </li>  
  <li>
    <?php 
      if ( !empty($nextid) ) {
         echo '<a rel="next" href="' . get_permalink($nextid). '">next</a>';
      }
   ?>
  </li>   
  <li><a href="#">
    <?php
      if(!empty($last_key)){
        echo '<a rel="last" href="'.get_permalink($last_key).'">Last</a>';
      }
    ?>
  </a></li>
  </ul>
  
<?php
    if(has_post_thumbnail()):
          $thumb_img = wp_get_attachment_url(get_post_thumbnail_id());
?>
<div class="singleProductImage "><a href="<?= $thumb_img; ?>" class="link" target="_blank"><img src="<?= get_template_directory_uri(); ?>/images/image_icon.gif"/></a><img src="<?= $thumb_img; ?>" class="img-responsive" alt=""/></div>
<?php endif; ?>
<div class="row">
<?php 
// Product Thumg
          $defaultThumb = get_post_thumbnail_id( $post->ID );
          //echo 'post Thumb: ' . $defaultThumb;
          $attachment_ids = $dynamic_featured_image -> get_post_attachment_ids( $post->ID  );
          $attachmentAll = array_push($attachment_ids, $defaultThumb);
          //get thumbnail images
          $fileerattachment_ids = array_filter($attachment_ids);
          foreach($fileerattachment_ids as $singleId):
            $thumbUrl = wp_get_attachment_url($singleId);
?>
  <div class="col-md-4">
    <a class="thumbnail productThumb" href="#" onClick="return false">
      <img src="<?= $thumbUrl; ?>" alt="" style="width:75px;height:55px">
    </a>
  </div>
  <?php endforeach; ?>
</div>


<div class="singleProductDescription">
<?php the_content(); ?><br/>
<?php
if(get_the_tag_list()) {
    echo get_the_tag_list('<ul class="list-inline"><li>','</li> | <li>','</li></ul>');
}
?>
</div>
<?php

  endwhile;
endif;
?>
</div>
</div>
</div>



</div>





<?php 
get_footer();
?>
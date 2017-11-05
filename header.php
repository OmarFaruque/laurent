<?php 
//header file
?>
<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" lang="en-US">
<![endif]-->
<!--[if IE 7]>
<html id="ie7" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html id="ie8" lang="en-US">
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" /> 
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php           
    /*            
    * Print the <title> tag based on what is being viewed.            
    */        
    global $page, $paged;                   
    wp_title( '|', true, 'right' );                   
    // Add the blog name.           
    bloginfo( 'name' );                  
    // Add the blog description for the home/front page.            
    $site_description = get_bloginfo( 'description' );            
    if ( $site_description && ( is_home() || is_front_page() ) )              
      echo " | $site_description";                    
    // Add a page number if necessary:  
    
    if ( $paged >= 2 || $page >= 2 )              
      echo ' | ' . sprintf( __( 'Page %s', 'shape' ), max( $paged, $page ) );         
  ?></title>
<!-- Google Opensans Font -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,400' rel='stylesheet' type='text/css'>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<?php wp_head(); ?>
</head>
<body <?= body_class(); ?>>



<div class="container">
<div class="wrapper">


<!-- Header Start -->
<header class="clearfix">
<h1 class="logo pull-left"><a href="#"><img src="<?= get_option('theme_logo'); ?>" alt="" /></a></h1>
<nav class="pull-right">
<div class="flags text-right"><img src="<?= get_template_directory_uri() ?>/images/french_flag.jpg"/><img src="<?= get_template_directory_uri() ?>/images/english_flag.jpg"/></div>
<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'desktopfooterMenu text-left' ) ); ?>
</nav>
</header>
<!-- Header End -->


<!-- Content Start -->
<section class="contentCntr clearfix">
	<aside class="sidebar pull-left">
		<div class="navIcon text-right"><i class="fa fa-navicon"></i></div>
		<ul class="sidebarMenu">
		<?php
			wp_list_categories( array('taxonomy' => 'products_category', 'title_li' => __( '' )) ); 
		?>
		</ul>
	</aside>
<?php
// all laurent functions 
function enque_script(){
// All Styele file
wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' ); // Bootstrap CSS
wp_enqueue_style('fontAwesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'); //Font Awesome
wp_enqueue_style( 'main_style', get_stylesheet_uri() ); // Main Stylesheet
wp_enqueue_style( 'custom_style', get_template_directory_uri() . '/css/custom_style.css' ); // custom CSS

//javaScript 

wp_enqueue_script( 'jquery', get_template_directory_uri() . 'js/jquery.min.js'); // Bootstrap jquery
wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js'); // bootstrap script 
wp_enqueue_script('app_js', get_template_directory_uri().'/js/app.js');
}

add_action( 'wp_enqueue_scripts', 'enque_script' );


//Register Menu
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'laurent' ),
	'footer_menu' => __( 'Footer Menu', 'laurent' ),
) );
add_theme_support( 'post-thumbnails', array( 'page', 'post', 'product' ) );     




// Custom Post Type Register 
add_action( 'init', 'laurent_product' );
/**
 * Register post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function laurent_product() {
	$labels = array(
		'name'               => _x( 'Products', 'post type general name', 'Greendotbd' ),
		'singular_name'      => _x( 'Product', 'post type singular name', 'Greendotbd' ),
		'menu_name'          => _x( 'Products', 'admin menu', 'Greendotbd' ),
		'name_admin_bar'     => _x( 'Product', 'add new on admin bar', 'Greendotbd' ),
		'add_new'            => _x( 'Add New', 'Product', 'Greendotbd' ),
		'add_new_item'       => __( 'Add New Product', 'Greendotbd' ),
		'new_item'           => __( 'New Product', 'Greendotbd' ),
		'edit_item'          => __( 'Edit Product', 'Greendotbd' ),
		'view_item'          => __( 'View Product', 'Greendotbd' ),
		'all_items'          => __( 'All Products', 'Greendotbd' ),
		'search_items'       => __( 'Search Products', 'Greendotbd' ),
		'parent_item_colon'  => __( 'Parent Products:', 'Greendotbd' ),
		'not_found'          => __( 'No Products found.', 'Greendotbd' ),
		'not_found_in_trash' => __( 'No Products found in Trash.', 'Greendotbd' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'product' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
		'taxonomies' 		 => array('products_category', 'post_tag')
	);

	register_post_type( 'product', $args );
}

function product_create_my_taxonomy() {

     register_taxonomy(
        'products_category',
        'product',
        array(
            'label' => __( 'Product Category' ),
            'rewrite' => array( 'slug' => 'products_category' ),
            'hierarchical' => true,
        )
    );
}

add_action( 'init', 'product_create_my_taxonomy' );

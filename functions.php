<?php
// these set up style links and are used on front-page by wp_head.
  function blog_site_register_styles() {
    
    // Variable to make version dynamic
    // Gets version from declared version on style.css
    $version = wp_get_theme()->get( 'Version' );
    // The array('blog-site-bootstrap') causes bootstrap to be loaded first
    // This is because the style sheet is dependent on bootstrap
    // It is a dependency parameter
    wp_enqueue_style('blog-site-style', get_template_directory_uri() . 
      "/style.css", array('blog-site-bootstrap'), $version, 'all');
    wp_enqueue_style('blog-site-bootstrap', 
      "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
    wp_enqueue_style('blog-site-fontaewsome', 
      "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '15.3.0', 'all');
    
  
  }


  add_action( 'wp_enqueue_scripts', 'blog_site_register_styles');
?>
<?php
  // Function that adds dynamic title tag support by wordpress
  function blog_site_theme_support() {
    add_theme_support('title-tag');
  }

  add_action( 'after_setup_theme', 'blog_site_theme_support' );

  // Function to add dynamic menu
  function blog_site_menus() {

    // set menu location for wordpress
    $locations = array(
      // name of menus displayed on wordpress admin (create menu)
      'primary' => "Desktop Primary Left Sidebar",
      'footer' => "Footer Menu Items"
    );

    register_nav_menus( $locations );
  }

  add_action( 'init', 'blog_site_menus');

// Replace style links on front-page.php  links to wp_head()
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

  // Replace scripts from front-page.php at wp_footer()
  // Set to true to have occur in footer.  Default is false and will have files appear in wp_head.
  function blog_site_register_scripts() {

    $version = wp_get_theme()->get( 'Version' );
    
    wp_enqueue_script( 'blog-site-jquery-slim', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', array(),
      '3.4.1', true );
    wp_enqueue_script( 'blog-site-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(),
      '1.16.0', true );
    wp_enqueue_script( 'blog-site-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(),
      '4.4.1', true );
    wp_enqueue_script( 'blog-site-js-main', get_template_directory_uri(). '/assets/js/main.js', array(),
      $version, true );
  
  }


  add_action( 'wp_enqueue_scripts', 'blog_site_register_scripts');
?>
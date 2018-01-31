<?php 
  // Register Custom Post Types
  add_action('init', 'register_custom_posts_init');
  function register_custom_posts_init() {
    // Register Products
    $products_labels = array(
      'name'               => 'Portfolio',
      'singular_name'      => 'Portfolio',
      'menu_name'          => 'Portfolio'
    );
    $products_args = array(
      'labels'             => $products_labels,
      'public'             => true,
      'capability_type'    => 'post',
      'has_archive'        => true,
      'supports'           => array( 
        'title', 
        'editor', 
        'excerpt', 
        'thumbnail', 
        // 'revisions' 
      )
    );
    register_post_type('portfolio', $products_args);
  }
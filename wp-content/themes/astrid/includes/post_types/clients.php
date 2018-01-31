<?php 
  // Register Custom Post Types
  add_action('init', 'register_custom_posts_init_clients');
  function register_custom_posts_init_clients() {
    // Register Products
    $products_labels = array(
      'name'               => 'Clients',
      'singular_name'      => 'Client',
      'menu_name'          => 'Clients'
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
    register_post_type('clients', $products_args);
  }
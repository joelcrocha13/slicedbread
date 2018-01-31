<?php

  // wp_enqueue_script('jquery');
  // add_action('add_meta_boxes', 'filter_meta_boxes');
  
  function filter_meta_boxes() {
  
      wp_register_script('meta_boxes_filter', get_bloginfo('template_directory').'/js/admin/meta_boxes_filter.js' );
      wp_enqueue_script('meta_boxes_filter');
      
  }
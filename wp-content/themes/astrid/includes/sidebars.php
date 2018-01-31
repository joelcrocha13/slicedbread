<?php

  add_action('widgets_init', 'theme_widgets_init' );  
  function theme_widgets_init() {
  
    $sidebars = array(
      // 'home' => 'Home',
      'footer' => 'Footer',
      'shop-sidebar' => "Shop",
      'product-sidebar' => "Product",
      // "utilities" => utf8_encode("Utilitários"),
    );
  
  	foreach($sidebars as $id => $value) {
      register_sidebar(array(
    		'name' => __($value, 'theme')." ".__('Sidebar', 'theme'),
    		'id' => $id, // 'id' => $id.'-widget-area',
    		'description' => __($value, 'theme')." ".__('Sidebar', 'theme'),
    		//'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    		//'after_widget' => '</li>',
    		'before_widget' => '',
    		'after_widget' => '',
    		'before_title' => '<h3 class="widget-title">',
    		'after_title' => '</h3>',
    	));
  	}

  }


<?php
  
  function dt_page_menu_args($args) {
    $args['show_home']     = false;
    $args['menu_class']   = '';
    return $args;
  }
  add_filter('wp_page_menu_args', 'dt_page_menu_args');
  
  add_action('init', 'inc_custom_nav');
  
  function inc_custom_nav() {
    
    if ( function_exists( 'wp_nav_menu' ) ) {
    	if (function_exists('add_theme_support')) {
    	
    		add_theme_support('nav-menus');
  			register_nav_menus(
  				array(
  					'main-menu' => __('Principal'),
  					'footer-menu' => utf8_encode('Footer'),
            'client-menu' => utf8_encode('Client Area'), 					
            'copyright-menu' => utf8_encode('Copyright'),
            //"utilities-menu" => utf8_encode("Utilitários")
  				)
  			);
    		
    	}
    }
  
  }
  
?>
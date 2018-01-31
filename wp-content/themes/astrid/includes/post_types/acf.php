<?php
  
  // ENABLE OPTIONS PAGE
  if( function_exists('acf_add_options_page') ) {  	
  	acf_add_options_page();
    
    acf_add_options_page(array(
  		'page_title' 	=> 'Theme General Settings',
  		'menu_title'	=> 'Theme Settings',
  		'menu_slug' 	=> 'theme-general-settings',
  		'capability'	=> 'edit_posts',
  		'redirect'		=> false
  	));
    
    acf_add_options_sub_page(array(
  		'page_title' 	=> 'Theme Header Settings',
  		'menu_title'	=> 'Header',
  		'parent_slug'	=> 'theme-general-settings',
  	));
  	
  	acf_add_options_sub_page(array(
  		'page_title' 	=> 'Theme Footer Settings',
  		'menu_title'	=> 'Footer',
  		'parent_slug'	=> 'theme-general-settings',
  	));
    
  }
  
  // ENABLE OPTIONS SUB PAGES
  if( function_exists('acf_add_options_sub_page') ) { 
  	
    $pages = array(
      'Global'
      , 'Social'
    );
    
    if(!empty($pages))
      foreach($pages as $page)
        acf_add_options_sub_page($page);
    
  }
  
  // GOOGLE MAPS API
  add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
  function my_acf_google_map_api( $api ){
  	
  	$api['key'] = 'AIzaSyCq3vP1Vod_0zm9pI-0-Y8wzYgii5udFbA';
  	
  	return $api;
  	
  }
  
  // GOOGLE MAPS API KEY ACF PRO
  add_action('acf/init', 'my_acf_init');
  function my_acf_init() {
  	
  	acf_update_setting('google_api_key', 'AIzaSyCq3vP1Vod_0zm9pI-0-Y8wzYgii5udFbA');
    
  }
  
  
  
  
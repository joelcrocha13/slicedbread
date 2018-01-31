<?php

  // if(function_exists('add_theme_support')) add_theme_support('post-thumbnails');
  
  function is_login_page() {
    return !strncmp($_SERVER['REQUEST_URI'], '/wp-login.php', strlen('/wp-login.php'));
  }
  
  function is_login_page2() {
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
  }
  
  add_action('wp_enqueue_scripts', 'register_theme_scripts');
  function register_theme_scripts() {   

    // DEFAULT
    wp_enqueue_style('css', get_bloginfo('template_url').'/style.css');
    
    // HTML5
    // wp_enqueue_script('html5', get_bloginfo('template_url').'/js/html5.js', '', '', true);
    // wp_enqueue_script('respond', get_bloginfo('template_url').'/js/Respond-master/dest/respond.src.js', '', '', true);

    // JQUERY
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-uniform', get_bloginfo('template_url').'/js/jquery/jquery.uniform.min.js', array('jquery'), '', true);
    wp_enqueue_script('jquery-sequence', get_bloginfo('template_url').'/js/jquery/sequence.jquery-min.js', array('jquery'), '', true);
    wp_enqueue_script('jquery-ui', get_bloginfo('template_url').'/js/jquery/ui/jquery-ui.min.js', array('jquery'), '', true);     
    
    // LESS COMPILE 
    $theme_path = ($_SERVER['HTTP_HOST']=='localhost') ? "" : ABSPATH;
    if(file_exists($theme_path.'lessphp/lessc.inc.php')) {
      include $theme_path.'lessphp/lessc.inc.php';            
      
      $theme_path = ($_SERVER['HTTP_HOST']=='localhost') ? "wp-content/themes/".get_current_theme() : get_template_directory();
      
      $less = new lessc;
      try {       
        $less->checkedCompile("{$theme_path}/less/style.less", "{$theme_path}/css/style.css");
        // $less->checkedCompile("{$theme_path}/less/bootstrap.less", "{$theme_path}/css/bootstrap.css");
      } catch (exception $e) {
        echo "FATAL ERROR: " . $e->getMessage();
      }
      
    }
    // Stylesheets
    // wp_enqueue_style('font-awesome_css', get_template_directory_uri() . '/css/font-awesome.min.css');     

    // BOOTSTRAP              
    wp_enqueue_style('bootstrap', get_bloginfo('template_url').'/css/bootstrap.css');
    wp_enqueue_style('bootstrap-theme', get_bloginfo('template_url').'/css/bootstrap-theme.css');
    wp_enqueue_style('font-awesome', get_bloginfo('template_url').'/css/font-awesome.css'); 
    wp_enqueue_style('less-css', get_bloginfo('template_url').'/css/style.css');    

    wp_enqueue_script('bootstrap.js', get_bloginfo('template_url').'/js/bootstrap/bootstrap.js', '', '', true);
    
    // UI
    // wp_enqueue_style('dropdown', get_bloginfo('template_url').'/js/jquery/ui/themes/base/jquery.ui.all.css');
    // wp_enqueue_script('dropdown', get_bloginfo('template_url').'/js/jquery/ui/jquery.ui.core.js', array('jquery'), '', true);
    // wp_enqueue_script('dropdown', get_bloginfo('template_url').'/js/jquery/ui/jquery.ui.widget.js', array('jquery'), '', true);
    
    // DROPDOWN      
    // wp_enqueue_style('dropdown', get_bloginfo('template_url').'/js/jquery/dropdown/css/dropdown.css');
    // wp_enqueue_style('dropdown-default', get_bloginfo('template_url').'/js/jquery/dropdown/css/themes/default/default.css');
    // wp_enqueue_script('dropdown', get_bloginfo('template_url').'/js/jquery/dropdown/jquery.dropdown.js', array('jquery'), '', true);
    
    // QUERYS
    wp_enqueue_script('querys_common', get_bloginfo('template_url').'/js/querys-common.js', array('jquery'), '', true);
    wp_enqueue_script('querys_home', get_bloginfo('template_url').'/js/querys-home.js', array('jquery'), '', true);
    
    // CAROUSEL 
   //wp_enqueue_style('owl_carousel_css', get_template_directory_uri() . '/js/owl-carousel/owl.carousel.css');
    //wp_enqueue_style('owl_transitions_css', get_template_directory_uri() . '/js/owl-carousel/owl.transitions.css');
    //wp_enqueue_style('owl_theme_css', get_template_directory_uri() . '/js/owl-carousel/owl.theme.default.min.css');
    //wp_enqueue_script('owl-carousel', get_bloginfo('template_url').'/js/owl-carousel/owl.carousel.min.js', '', '', true);
    
    wp_enqueue_style('owl-carousel-min', get_bloginfo('template_url').'/css/owl.carousel.min.css');
    wp_enqueue_style('owl-carousel', get_bloginfo('template_url').'/css/owl.carousel.css');
    wp_enqueue_script('owl.carousel.js', get_bloginfo('template_url').'/js/owl-carousel/owl.carousel.js', '', '', true);
    //wp_enqueue_script('owl.carousel.min.js', get_bloginfo('template_url').'/js/owl-carousel/owl.carousel.min.js', '', '', true);  

    wp_enqueue_script( 'querys-product', get_template_directory_uri() . '/js/querys-product.js', array('jquery'), '', true );
  
  }
  
  

<?php

  /**
   * LAST UPDATE: JOEL ROCHA - 09-03-2015
   */     
  
  add_theme_support('post-thumbnails');
  
  //add_action('init', 'thumbnails_register');  
  function thumbnails_register() {
    
    add_image_size('thumb_slideshow', 950, 315);
    
    add_image_size('thumb_home_posts', 217, 999); //217x113
    
    add_image_size('thumb_page', 300, 999); //300x999
    add_image_size('thumb_listdocs', 100, 999); //100x133
    
  }
  
  function getTimThumbUrl() {
    
    $upload_dir = wp_upload_dir();
    $timthumb_url = $upload_dir['baseurl']."/timthumb.php";
    
    return $timthumb_url;
    
  }
  
  function getThumb($post_id, $w, $h, $default = "default.jpg") {
  
    $template_url = get_bloginfo('template_directory');
    $timthumb_url = getTimThumbUrl();
    
    if(has_post_thumbnail($post_id)) {                             
      $thumb_id = get_post_thumbnail_id($post_id);
      $url = wp_get_attachment_url($thumb_id);
      $thumb_url = "$timthumb_url?src={$url}&amp;a=t";                           
    } else { 
      if(empty($default)) return;
      $default_url = "$template_url/images/default/{$default}"; 
      $thumb_url = "$timthumb_url?src={$default_url}&amp;a=t";    
    }
    
    if($w > 0) $thumb_url .= "&amp;w={$w}";
    if($h > 0) $thumb_url .= "&amp;h={$h}";
    
    return "<img src=\"{$thumb_url}\" alt=\"\" />";
  
  }
  
  function getThumbUrl($post_id, $w, $h, $default = "default.jpg") {
  
    $template_url = get_bloginfo('template_directory');
    $timthumb_url = getTimThumbUrl();
    
    if(has_post_thumbnail()) {                             
      $thumb_id = get_post_thumbnail_id($post_id);
      $url = wp_get_attachment_url($thumb_id);
      $thumb_url = "$timthumb_url?src={$url}&amp;a=t";                           
    } else { 
      if(empty($default)) return;
      $default_url = "$template_url/images/default/{$default}"; 
      $thumb_url = "$timthumb_url?src={$default_url}&amp;a=t";    
    }
    
    if($w > 0) $thumb_url .= "&amp;w={$w}";
    if($h > 0) $thumb_url .= "&amp;h={$h}";
    
    return $thumb_url;
  
  }
  
  function getOriginalThumb($post_id, $default = "default.jpg") {
  
    $template_url = get_bloginfo('template_directory');
    $timthumb_url = getTimThumbUrl();
    
    if(has_post_thumbnail()) {                             
      $thumb_id = get_post_thumbnail_id($post_id);
      $url = wp_get_attachment_url($thumb_id);
      //$thumb_url = "$timthumb_url?src={$url}&amp;a=t";   
      $thumb_url = $url;                         
    } else { 
      if(empty($default)) return;
      $default_url = "$template_url/images/default/{$default}"; 
      $thumb_url = $default_url;
      // $thumb_url = "$timthumb_url?src={$default_url}&amp;a=t";    
    }
    
    //if($w > 0) $thumb_url .= "&amp;w={$w}";
    //if($h > 0) $thumb_url .= "&amp;h={$h}";
    
    return "<img src=\"{$thumb_url}\" alt=\"\" />";
  
  }
  
  function getOriginalThumbUrl($post_id, $default = "default.jpg") {
  
    $template_url = get_bloginfo('template_directory');
    $timthumb_url = getTimThumbUrl();
    
    if(has_post_thumbnail()) {                             
      $thumb_id = get_post_thumbnail_id($post_id);
      $url = wp_get_attachment_url($thumb_id);
      //$thumb_url = "$timthumb_url?src={$url}&amp;a=t";   
      $thumb_url = $url;                         
    } else { 
      if(empty($default)) return;
      $default_url = "$template_url/images/default/{$default}"; 
      //$thumb_url = "$timthumb_url?src={$default_url}&amp;a=t";    
    }
    
    //if($w > 0) $thumb_url .= "&amp;w={$w}";
    //if($h > 0) $thumb_url .= "&amp;h={$h}";
    
    return $thumb_url;
  
  }
  
  function getThumbByUrl($url, $w, $h, $default = "default.jpg") {
  
    $template_url = get_bloginfo('template_directory');
    $timthumb_url = getTimThumbUrl();
  
    if(!empty($url)) {  
      $template_url = get_bloginfo('template_directory');   
      $thumb_url = "$timthumb_url?src={$url}&amp;a=t";
    } else {
      if(empty($default)) return;
      $default_url = "$template_url/images/default/{$default}"; 
      $thumb_url = "$timthumb_url?src={$default_url}&amp;a=t"; 
    }     
    
    if($w > 0) $thumb_url .= "&amp;w={$w}";
    if($h > 0) $thumb_url .= "&amp;h={$h}";                    
    
    return "<img src=\"{$thumb_url}\" alt=\"\" />";
  
  }
  
  function getUrlThumbByUrl($url, $w, $h, $default = "default.jpg") {
  
    $template_url = get_bloginfo('template_directory');
    $timthumb_url = getTimThumbUrl();
  
    if(!empty($url)) {  
      $template_url = get_bloginfo('template_directory');   
      $thumb_url = "$timthumb_url?src={$url}&amp;a=t";
    } else {
      if(empty($default)) return;
      $default_url = "$template_url/images/default/{$default}"; 
      $thumb_url = "$timthumb_url?src={$default_url}&amp;a=t"; 
    }     
    
    if($w > 0) $thumb_url .= "&amp;w={$w}";
    if($h > 0) $thumb_url .= "&amp;h={$h}";                    
    
    return $thumb_url;
  
  }

  function getThumbOriginalByUrl($url, $w, $h, $default = "default.jpg") {
  
    $template_url = get_bloginfo('template_directory');
    $timthumb_url = getTimThumbUrl();
  
    if(!empty($url)) {  
      $template_url = get_bloginfo('template_directory');   
      $thumb_url = "$timthumb_url?src={$url}&a=t";
    } else {
      if(empty($default)) return;
      $default_url = "$template_url/images/default/{$default}"; 
      $thumb_url = "$timthumb_url?src={$default_url}&a=t"; 
    }     
    
    if($w > 0) $thumb_url .= "&amp;w={$w}";
    if($h > 0) $thumb_url .= "&amp;h={$h}";                    
    
    return $thumb_url;
  
  }
  
  function getThumbByUrlRel($url, $w, $h, $w_thumb, $h_thumb) {
  
    $template_url = get_bloginfo('template_directory');
    $timthumb_url = getTimThumbUrl();
    
    $big_url = "$timthumb_url?src={$url}&amp;a=t&amp;w={$w}&amp;h={$h}";                         
    $thumb_url = "$timthumb_url?src={$url}&amp;a=t&amp;w={$w_thumb}&amp;h={$h_thumb}";
    
    return "<img src=\"{$big_url}\" alt=\"\" rel=\"{$thumb_url}\" />";
  
  }
  
  function getThumbDefault($default) {
  
    $template_url = get_bloginfo('template_directory');
    $thumb_url = "$template_url/images/default/{$default}";
    
    return "<img src=\"{$thumb_url}\" alt=\"\" />";
  
  }
  
  function getThumbColorbox($post_id, $w, $h, $default = "default.jpg", $class = "") {
  
    $template_url = get_bloginfo('template_directory');
    $timthumb_url = getTimThumbUrl();
    
    if(has_post_thumbnail()) {                             
      $thumb_id = get_post_thumbnail_id($post_id);
      $url = wp_get_attachment_url($thumb_id);
      $thumb_url = "$timthumb_url?src={$url}&amp;a=t";                           
    } else { 
      if(empty($default)) return;
      $default_url = "$template_url/images/default/{$default}"; 
      $thumb_url = "$timthumb_url?src={$default_url}&amp;a=t";    
    }
    
    if($w > 0) $thumb_url .= "&amp;w={$w}";
    if($h > 0) $thumb_url .= "&amp;h={$h}";
    
    if(has_post_thumbnail()) return "<a href=\"{$url}\" class=\"{$class}\"><img src=\"{$thumb_url}\" alt=\"\" /></a>";
    else return "<img src=\"{$thumb_url}\" alt=\"\" />";
  
  }
  
  function getThumbPrettyPhoto($post_id, $w, $h, $default = "default.jpg", $rel) {
  
    $template_url = get_bloginfo('template_directory');
    $timthumb_url = getTimThumbUrl();
    
    if(has_post_thumbnail()) {                             
      $thumb_id = get_post_thumbnail_id($post_id);
      $url = wp_get_attachment_url($thumb_id);
      $thumb_url = "$timthumb_url?src={$url}&amp;a=t";                           
    } else { 
      if(empty($default)) return;
      $url = "$template_url/images/default/{$default}"; 
      $thumb_url = "$timthumb_url?src={$url}&amp;a=t";    
    }
    
    if($w > 0) $thumb_url .= "&amp;w={$w}";
    if($h > 0) $thumb_url .= "&amp;h={$h}";
    
    return "<a href=\"{$url}\" rel=\"{$rel}\"><img src=\"{$thumb_url}\" alt=\"\" width=\"{$w}\" height=\"{$h}\" /></a>";
  
  }
  
  function getThumbByUrlPrettyPhoto($url, $w, $h, $rel) {
  
    $template_url = get_bloginfo('template_directory');
    $timthumb_url = getTimThumbUrl();
    
    $big_url = "$timthumb_url?src={$url}&amp;a=t&amp;w={$w}&amp;h={$h}";                         
    //$thumb_url = "$timthumb_url?src={$url}&amp;a=t&amp;w={$w_thumb}&amp;h={$h_thumb}";
    
    return "<a href=\"{$url}\" rel=\"{$rel}\"><img src=\"{$big_url}\" alt=\"\" width=\"{$w}\" height=\"{$h}\" /></a>";
  
  }

    function getThumbByUrlTitle($url, $w, $h, $title, $default = "default.jpg") {
  
    $template_url = get_bloginfo('template_directory');
    $timthumb_url = getTimThumbUrl();
  
    if(!empty($url)) {  
      $template_url = get_bloginfo('template_directory');   
      $thumb_url = "$timthumb_url?src={$url}&amp;a=t";
    } else {
      if(empty($default)) return;
      $default_url = "$template_url/images/default/{$default}"; 
      $thumb_url = "$timthumb_url?src={$default_url}&amp;a=t"; 
    }     
    
    if($w > 0) $thumb_url .= "&amp;w={$w}";
    if($h > 0) $thumb_url .= "&amp;h={$h}";                    
    
    return "<img src=\"{$thumb_url}\" alt=\"\" title=\"#{$title}\" />";
  
  }
  
?>
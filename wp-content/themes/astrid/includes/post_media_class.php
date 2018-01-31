<?php

  /**
   * Attach a class to linked images' parent anchors
   * e.g. a img => a.img img
   */
  
  //function attach_class_linked_media_pdf($html, $id, $caption, $title, $align, $url, $size, $alt = '' ){
  function attach_class_linked_media_pdf($html, $id, $caption){
    
    $classes = 'media, pdf, file_pdf'; // separated by spaces, e.g. 'img image-link' 
    
    preg_match_all('#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#', $html, $match);
    $value = $match[0][0];
      
    $path_parts = pathinfo($value);         
    if($path_parts['extension'] == "pdf") {

      // check if there are already classes assigned to the anchor
      if ( preg_match('/<a.*? class=".*?">/', $html) ) {
        $syntax = '/(<a.*? class=".*?)(".*?';
        $syntax .= '>)/';
        $html = preg_replace($syntax, '$1 ' . $classes . '$2', $html);
      } else {
        $html = preg_replace('/(<a.*?)>/', '$1 class="' . $classes . '" >', $html);
      }
      
    }

    return $html;   
    
  }
  add_filter('media_send_to_editor', 'attach_class_linked_media_pdf', 10, 8);

  //function give_linked_images_class($html, $id, $caption, $title = "", $align, $url, $size, $alt = '' ){
  function give_linked_images_class($html, $id, $caption){
    
    $classes = 'img'; // separated by spaces, e.g. 'img image-link'
  
    // check if there are already classes assigned to the anchor
    if ( preg_match('/<a.*? class=".*?">/', $html) ) {
      $syntax = '/(<a.*? class=".*?)(".*?';
      $syntax .= '>)/';
      $html = preg_replace($syntax, '$1 ' . $classes . '$2', $html);
    } else {
      $html = preg_replace('/(<a.*?)>/', '$1 class="' . $classes . '" >', $html);
    }
    
    return $html;
    
  }
  
  //add_filter('image_send_to_editor','give_linked_images_class',10,8);
  //add_filter('file_send_to_editor_url','give_linked_images_class',10,8); 
  
  /*
  // add class if post has thumbnail
  function has_thumb_class($classes) {
  	global $post;
  	if( has_post_thumbnail($post->ID) ) { $classes[] = 'has_thumb'; }
  
  		return $classes;
  }
  add_filter('post_class', 'has_thumb_class');
   */

?>
<?php
  if(!function_exists('theme_achieved_total_rating')) :
  function theme_achieved_total_rating($post_id) {
    
    global $wpdb;

  	$query = "SELECT * FROM $wpdb->comments 
      WHERE comment_approved= '1'
      AND comment_post_ID = '".$post_id."' 
      ORDER BY comment_date DESC LIMIT 0, 5";        
    $comments = $wpdb->get_results($query);
    
    if($comments) {      
      
      $total_comments = count($comments);
      $total_fields = 1;
      $total = 0;
      
      foreach($comments as $comment) {
        $rating = get_comment_meta($comment->comment_ID, 'rating', true);
        $total += ($rating / $total_fields); 
      } 

      $final = $total / $total_comments;
      return round($final);  
           
    }
    
    return false;
    
  }
  endif; // end

  
  
  if(!function_exists('theme_achieved_total_rating_field')) :
  function theme_achieved_total_rating_field($post_id, $field) {
    
    global $wpdb;
  
  	$query = "SELECT * FROM $wpdb->comments 
      WHERE comment_approved= '1'
      AND comment_post_ID = '".$post_id."' 
      ORDER BY comment_date DESC LIMIT 0, 5";        
    $comments = $wpdb->get_results($query);
    
    if($comments) {      
      
      $total_comments = count($comments); // 2
      $total_fields = count($fields_rating); // 5
      $total = 0;
      
      foreach($comments as $comment) {
        $value = get_comment_meta($comment->comment_ID, $field, true);
        $total += $value;          
      } 

      $final = $total / $total_comments;
      return round($final);  
           
    }
    
    return false;
    
  }
  endif; // end
  
  if(!function_exists('theme_last_comment')) :
  function theme_last_comment($post_id) {
    
    global $wpdb;
  
  	$query = "SELECT * FROM $wpdb->comments 
      WHERE comment_approved= '1'
      AND comment_post_ID = '".$post_id."' 
      ORDER BY comment_date DESC LIMIT 0, 1";        
    $comments = $wpdb->get_results($query);
    
    if($comments) {            
      foreach($comments as $comment) {          
        return $comment;
      }     
    }
    
    return false;
    
  }
  endif; // end
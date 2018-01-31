<?php
  
  /* MULTIPLE EXCERPT */
  function theme_excerpt($charlength, $text = "", $end = "...") {  
  
   $excerpt = (empty($text)) ? get_the_excerpt() : $text;  
   $charlength++;  
   
   if(strlen($excerpt) > $charlength) { 
    
     $subex = substr($excerpt, 0, $charlength-5);  
     $exwords = explode(" ",$subex);  
     $excut = -(strlen($exwords[count($exwords)-1])); 
      
     if($excut<0) $output = substr($subex, 0, $excut);  
     else $output = $subex;  
     
     $output .= $end;
     
     $output = theme_custom_excerpt_more($output);  
     
     echo $output; 
       
   } else { echo $excerpt; }  
   
  }
    
  function custom_excerpt($charlength) {  
  
   $excerpt = get_the_excerpt();  
   $charlength++;  
   
   if(strlen($excerpt) > $charlength) { 
    
     $subex = substr($excerpt, 0, $charlength-5);  
     $exwords = explode(" ",$subex);  
     $excut = -(strlen($exwords[count($exwords)-1])); 
      
     if($excut<0) $output = substr($subex, 0, $excut);  
     else $output = $subex;  
     
     $output .= "...";
     
     $output = theme_custom_excerpt_more($output);  
     
     echo $output; 
       
   } else { echo $excerpt; }  
   
  }  
  
  function excerpt_nomore($charlength = -1) {  
  
   $excerpt = get_the_excerpt();  
   $charlength++;  
   
   if(strlen($excerpt) > $charlength AND $charlength > -1) { 
    
     $subex = substr($excerpt, 0, $charlength-5);  
     $exwords = explode(" ", $subex);  
     $excut = -(strlen($exwords[count($exwords)-1])); 
      
     if($excut<0) $output = substr($subex, 0, $excut);  
     else $output = $subex;  
     
     //$output .= "...";
     
     $output = theme_custom_excerpt_nomore($output);  
     
     echo $output; 
       
   } else { echo $excerpt; }  
   
  } 
  
  
  /**
   * Sets the post excerpt length to 40 words.
   *
   * To override this length in a child theme, remove the filter and add your own
   * function tied to the excerpt_length filter hook.
   */
  function theme_excerpt_length( $length ) {
  	return 40;
  }
  add_filter( 'excerpt_length', 'theme_excerpt_length' );
  
  /**
   * Returns a "Continue Reading" link for excerpts
   */
  function theme_continue_reading_link() {
  	//return ' <a href="'. esc_url( get_permalink() ) . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'theme' ) . '</a>';
    //return ' <a href="'.esc_url(get_permalink()).'" class="a_read_more">[+]</a>';
    return "";
  }
  
  function theme_continue_reading_nolink() {
  	//return ' <a href="'. esc_url( get_permalink() ) . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'theme' ) . '</a>';
    return ' <a href="'.esc_url(get_permalink()).'" class="a_read_more"></a>';

  }
  
  /**
   * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and theme_continue_reading_link().
   *
   * To override this in a child theme, remove the filter and add your own
   * function tied to the excerpt_more filter hook.
   */
  function theme_auto_excerpt_more( $more ) {
  	//return ' &hellip;' . theme_continue_reading_link();
  	return '';
  }
  add_filter( 'excerpt_more', 'theme_auto_excerpt_more' );
  
  /**
   * Adds a pretty "Continue Reading" link to custom post excerpts.
   *
   * To override this link in a child theme, remove the filter and add your own
   * function tied to the get_the_excerpt filter hook.
   */
  function theme_custom_excerpt_more($output) {
  	if ( has_excerpt() && ! is_attachment() ) {
  		$output .= theme_continue_reading_link();
  	}
  	return $output;
  }
  add_filter('get_the_excerpt', 'theme_custom_excerpt_more' );
  
  function theme_custom_excerpt_nomore($output) {
  	if ( has_excerpt() && ! is_attachment() ) {
  		$output .= theme_continue_reading_nolink();
  	}
  	return $output;
  }
  

?>
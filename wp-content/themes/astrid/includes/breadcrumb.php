<?php 
  function get_breadcrumb_title($new_title = "") {
    
    global $post, $hgroup_title; // if outside the loop
  
    $ID = get_the_ID();
    
    $title = "";  
    if(!empty($new_title)) {
      $title = $new_title;
    } elseif(empty($hgroup_title)) {
    
      if ( is_page() ) {
      	$title = $post->post_title;
      } elseif ( is_single() ) {
      	$title = get_the_title( $ID );
      
      	$post_type = get_post_type( $ID );
      	$obj = get_post_type_object( $post_type );
      	$archive_title = $obj->labels->singular_name;
      
      	$title = $archive_title;
        // $title .= ":" . "<span> ". $title. "</span>";
      
      } elseif (is_category()) {
      	$title = get_the_title( $ID );
      
      }elseif (is_post_type_archive()) {
      	$post_type = get_post_type( $ID );
      	$obj = get_post_type_object( $post_type );
      	$title = $obj->labels->singular_name;
      
      } else {
      	$title = get_the_title( $ID );
      }
      
    } else {
       $title = $hgroup_title;
    }
    
    return $title;
    
  }
  
  // Add Breadcrumb Navigation
  function get_breadcrumb() {

    $lang = (!empty($_GET['lang'])) ? $_GET['lang'] : "pt";
    $lang = explode('-',$lang);
    $lang = $lang[0];
    $current_lang = ($lang != 'pt') ? "_".$lang : ""; 

  
  	$pid = $post->ID;
    
  	$trail  = '<nav role="navigation" class="breadcrumbs clearfix">';    
    $trail .= '<ul class="crumbs">'; 
    $trail .= '<li><a href="'.get_bloginfo('url').'">'. __('Home > ', 'theme') .'</a></li>';
   
  	if (is_front_page()) { // do nothing
  	} elseif (is_page()) {
    
  		$bcarray = array();
  		$pdata = get_post($pid);
  		$bcarray[] = '<li>'.$pdata->post_title."</li>";
      
    	while ($pdata->post_parent) {
    		$pdata = get_post($pdata->post_parent);
    		$bcarray[] = '<li><a href="'.get_permalink($pdata->ID).'">'.$pdata->post_title.'</a></li>';
    	}
      
    	$bcarray = array_reverse($bcarray);
    
  		foreach ($bcarray AS $listitem) $trail .= $listitem;

  	} elseif(is_archive()){
          $post_type = get_post_type_object( get_post_type(get_the_ID()));
          $name = $post_type->labels->singular_name;
          $title =  theme_get_translate($name, $current_lang); 
          $trail .= (!empty($title)) ? "<li>".$title."</li>" : ""; // ***************************** Acomodações
    

    } elseif (is_category()) {
    
  		$pdata = get_the_category($pid);
  		$data = get_category_parents($pdata[0]->cat_ID, TRUE, ' &raquo; ');
      
  		if(!empty($pdata)) $trail .= "<li>".substr($data, 0, -8)."</li>";
      
    } elseif(is_tax()) { 
      $post_type = get_post_type_object( get_post_type(get_the_ID()));
      $title = $post_type->labels->singular_name;
      $trail .= (!empty($title)) ? "<li>".$title."</li>" : ""; // ***************************** Acomodações
      
      $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
     
      /*$regID = $term->term_id;
      $link = get_term_link($regID, 'tax_region');

      print_r($link);*/

      $title = $term->name;
      $trail .= "<li>: ".$title  ."</li>";  //********************************************************Região


    } elseif (is_single()) {

      $type = get_post_type($pid); //ver se é apartamento ou contactos
      $post_type = get_post_type_object( get_post_type(get_the_ID()));
      $name = $post_type->labels->singular_name;
      $title =  theme_get_translate($name, $current_lang); //traduzir "Acomodações"

      //$post_types = get_post_types();
      //print_r($post_types);

      if ($type == "contacts" || $type == "booking" || $type == "partners" || $type == "search" || $type == "partners_apartments" || $type == "partners_epochs" || $type == "partners_reserves" || $type == "partners_profile") {  
        $trail .= (!empty($title)) ? "<li>".$title."</li>" : ""; // ******************************** Acomodações
      }

      $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
      
      $terms = wp_get_post_terms(get_the_ID(), 'tax_region');
      $subtitle = $terms[0]->name;

      $regID = $terms[0]->term_id;
      $link = get_term_link($regID, 'tax_region'); // get link da regiao

      if ($type != "contacts" && $type != "booking" && $type != "partners" && $type != "search" && $type != "partners_apartments" && $type != "partners_epochs" && $type != "partners_reserves" && $type != "partners_profile") {
        $trail .= '<li><a href="'.$link.'"'.">".$title.": ".$subtitle. '</a></li>'; //********************************************Região
      }
    
      $pdata = get_the_category($pid);
      $adata = get_post($pid);
      
      if(!empty($pdata)){
        $data = get_category_parents($pdata[0]->cat_ID, TRUE, ' &raquo; ');
        $trail .= "<li>".substr($data, 0, -8)."</li>";
      }
      
      if ($type != "contacts" && $type != "booking" && $type != "partners" && $type != "search" && $type != "partners_apartments" && $type != "partners_epochs" && $type != "partners_reserves" && $type != "partners_profile") {
        $trail.= "<li> > ".$adata->post_title."</li>"; //******************************Nome acomodaçao
      }     
    }
    
  	$trail .= '</ul>';
    $trail .= '</nav>';       
    
  	return $trail;
    
  }

  function theme_breadcrumb($separator = "/", $subseparator = ":") {
  
    global $post, $hgroup_title, $hgroup_desc; // if outside the loop
    
    $pid = $post->ID;
    $trail = "<a href=\"/\">". __('Home', 'theme') ."</a>";
    
    
    if(!empty($hgroup_title)) {
      $title = $hgroup_title;
      $trail .= " {$separator} ".$title;
      if(!empty($hgroup_desc)) $trail .= " {$subseparator} ".$hgroup_desc; 
    } else {
      $post_type = get_post_type_object( get_post_type(get_the_ID()));
      $title = $post_type->labels->singular_name;
      if(!empty($title)) {
        $trail .= (!empty($title)) ? $separator." ".$title : ""; // $trail .= (!empty($title)) ? " {$separator} ".$title : "";
      } else {
        $title = post_type_archive_title('', false);
        if(!empty($title)) $trail .= " {$separator} ".$title;
      } 
    }
    
    if (is_front_page()) {
      // do nothing
    } elseif (is_page()) { // POGE
      $bcarray = array();
      $pdata = get_post($pid);
      $bcarray[] = " {$separator} ".$pdata->post_title."\n";
      while ($pdata->post_parent) {
        $pdata = get_post($pdata->post_parent);
        $bcarray[] = " {$separator} <a href=\"".get_permalink($pdata->ID)."\">".$pdata->post_title."</a>";
      }
      $bcarray = array_reverse($bcarray);
      foreach ($bcarray AS $listitem) {
        $trail .= $listitem;
      }
    } elseif (is_single()) {
      $pdata = get_the_category($pid);
      $adata = get_post($pid);
      if(!empty($pdata)){
        $data = get_category_parents($pdata[0]->cat_ID, TRUE, ' {$separator} ');
        // $trail .= " {$separator} ".substr($data,0,-8);
      }
      if ($adata->post_title != $title) {
       // $trail.= "{$subseparator} ".$adata->post_title."\n";
      }
    } elseif (is_category()) { // CATEGORY
      $pdata = get_the_category($pid);
      $data = get_category_parents($pdata[0]->cat_ID, TRUE, ' {$separator} ');
      if(!empty($pdata)){
        $trail .= " {$separator} ".substr($data,0,-8);
      }   
    } elseif(is_tax()) { // TAXONOMY 
      $post_type = get_post_type_object( get_post_type(get_the_ID()));
      $title = $post_type->labels->singular_name;
      $trail .= (!empty($title)) ? " {$separator} ".$title : "";
      
      $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
      
      // Parent
      if($term->parent > 0) {
        $term_parent = get_term_by('id', $term->parent, get_query_var('taxonomy'));
        
        $title = $term_parent->name;
        $trail .= " {$separator} ".$title;
      }
      
      // Current
      $title = $term->name;
      $trail .= " {$separator} ".$title;      
    } elseif(is_archive()) { // ARCHIVE
      $title = post_type_archive_title('', false);
      // $trail .= " {$separator} ".$title;   
    }
    
    $trail .= "";
    
    return $trail;
  
  }
  
  //postTypeCrumbs('post type', 'taxonomy name');
  function postTypeCrumbs($postType, $postTax) {
   
    $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
     $taxonomy = get_taxonomy($term->taxonomy);
     $parents = get_ancestors( $term->term_id, $postTax );
     $parents = array_reverse($parents);
     $archive_link = get_post_type_archive_link( $postType );
     
    echo '<ul class="ax_crumbs">';
     
    if ($taxonomy) {
     echo '<li><a href="' . $archive_link . '" title="' . $taxonomy->labels->name . '">' . $taxonomy->labels->name . '</a> &raquo; </li>';
     }
     
    foreach ( $parents as $parent ) {
     $p = get_term( $parent, $postTax );
     echo '<li><a href="' . get_term_link($p->slug, $postTax) . '" title="' . $p->name . '">' . $p->name . '</a> <span>&raquo;</span> </li>';
     }
     
    if ($term) {
     echo '<li>' . $term->name . '</li>';
     }
     
    echo '</ul>';
   
  }

  /* Taxonomy Breadcrumb */
  function be_taxonomy_breadcrumb() {
    // Get the current term
    $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
     
    // Create a list of all the term's parents
    $parent = $term->parent;
    while ($parent):
      $parents[] = $parent;
      $new_parent = get_term_by( 'id', $parent, get_query_var( 'taxonomy' ));
      $parent = $new_parent->parent;
    endwhile;
    
    if(!empty($parents)):
      $parents = array_reverse($parents);
       
      // For each parent, create a breadcrumb item
      foreach ($parents as $parent):
        $item = get_term_by( 'id', $parent, get_query_var( 'taxonomy' ));
        $url = get_bloginfo('url').'/'.$item->taxonomy.'/'.$item->slug;
        echo '<li><a href="'.$url.'">'.$item->name.'</a></li>';
      endforeach;
    endif;
     
    // Display the current term in the breadcrumb
    echo '<li>'.$term->name.'</li>';
  }


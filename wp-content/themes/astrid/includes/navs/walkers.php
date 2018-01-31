<?php

  /**
   * BOOTSTRAP
   */

  class Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {
       
    function start_lvl(&$output, $depth = 0, $args = array() ) {
        
      //In a child UL, add the 'dropdown-menu' class
      $indent = str_repeat("\t", $depth);
      $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
        
    }
 
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        
      $indent = ( $depth ) ? str_repeat( "\t", $depth ) : ''; 
      
      $li_attributes = '';
      $class_names = $value = '';
  
      $classes = empty( $item->classes ) ? array() : (array) $item->classes;
      
      //Add class and attribute to LI element that contains a submenu UL.
      if (!empty($args->has_children)) {
        $classes[]      = 'dropdown';
        // $li_attributes .= 'data-dropdown="dropdown"';
      }
      
      $classes[] = 'menu-item-' . $item->ID;
      //If we are on the current page, add the active class to that menu item.
      $classes[] = ($item->current) ? 'active' : '';
  
      //Make sure you still add all of the WordPress classes.
      $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));     
      $class_names = ' class="' . esc_attr($class_names) . '"';
  
      $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
      $id = strlen($id) ? ' id="' . esc_attr( $id ) . '"' : '';  
      
      // Change ID
      // SEARCH PAGE SLUG
      if($item->object_id > 0) {
        $post = get_post($item->object_id); 
        $slug = $post->post_name;
      } else if ($item->ID > 0) { 
        $slug = $item->type; 
      }  
      
      $slug = $slug; 
      
      $id = strlen($id) ? '  data-menuanchor="pag-' . $slug . '" id="' . $slug . '"' : '';      
      // END CHANDE ID
  
      $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';
  
      // Add attributes to link element.
      $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
      $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr($item->target) .'"' : '';
      $attributes .= ! empty( $item->xfn ) ? ' rel="'    . esc_attr($item->xfn) .'"' : '';
      $attributes .= ! empty( $item->url ) ? ' href="'   . esc_attr($item->url) .'"' : '';
      $attributes .= (!empty($args->has_children)) ? ' class="dropdown-toggle"' : ''; 
      // $attributes .= ($args->has_children) ? ' data-toggle="dropdown"' : '';
  
      $item_output = "";
      if(!empty($args->before)) $item_output .= $args->before;
      $item_output .= '<a'. $attributes .'>';
      if(!empty($args->link_before)) $item_output .= $args->link_before;
      $item_output .= apply_filters( 'the_title', $item->title, $item->ID );
      if(!empty($args->link_after)) $item_output .= $args->link_after;
      $item_output .= (!empty($args->has_children)) ? ' <b class="caret"></b> ' : ''; 
      $item_output .= '</a>';
      if(!empty($args->after)) $item_output .= $args->after;
  
      $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
 
    //Overwrite display_element function to add has_children attribute. Not needed in >= Wordpress 3.4
    function display_element($element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
        
      if(!$element) return;
      
      $id_field = $this->db_fields['id'];
  
      //display this element
      if ( is_array( $args[0] ) ) $args[0]['has_children'] = ! empty($children_elements[$element->$id_field]);
      else if ( is_object( $args[0] ) ) $args[0]->has_children = ! empty($children_elements[$element->$id_field]);
       
      $cb_args = array_merge( array(&$output, $element, $depth), $args);
      call_user_func_array(array(&$this, 'start_el'), $cb_args);
  
      $id = $element->$id_field;
  
      // descend only when the depth is right and there are childrens for this element
      if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {
  
          foreach( $children_elements[ $id ] as $child ){
  
              if ( !isset($newlevel) ) {
                  $newlevel = true;
                  //start the child delimiter
                  $cb_args = array_merge( array(&$output, $depth), $args);
                  call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
              }
              $this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
          }
              unset( $children_elements[ $id ] );
      }
  
      if ( isset($newlevel) && $newlevel ){
        // end the child delimiter
        $cb_args = array_merge( array(&$output, $depth), $args);
        call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
      }
  
      //end this element
      $cb_args = array_merge( array(&$output, $element, $depth), $args);
      call_user_func_array(array(&$this, 'end_el'), $cb_args);
      
    }
    
  }
  
  /**
   * MOSTRA DESCRIÇÃO DO LINK E IMAGEM DA PAGINA
   */
        
  class walkerImageDescription extends Walker_Nav_Menu {

    /**
     * Start the element output.
     *
     * @param  string $output Passed by reference. Used to append additional content.
     * @param  object $item   Menu item data object.
     * @param  int $depth     Depth of menu item. May be used for padding.
     * @param  array $args    Additional strings.
     * @return void
     */
    static $li_count = 0;
     
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
      
      self::$li_count++;
      
        $classes = empty ( $item->classes ) ? array () : (array) $item->classes;

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item));
        $class_names.= " col-lg-3 col-md-3 col-sm-3 col-xs-6 col-".self::$li_count;
        !empty($class_names) and $class_names = ' class="'. esc_attr( $class_names ) . '"';

        $output .= "<li id='menu-item-$item->ID' $class_names>";
        $attributes  = '';

        !empty($item->attr_title) and $attributes .= ' title="'. esc_attr($item->attr_title) .'"';
        !empty($item->target) and $attributes .= ' target="'. esc_attr($item->target) .'"';
        !empty($item->xfn) and $attributes .= ' rel="'. esc_attr($item->xfn) .'"';
        !empty($item->url) and $attributes .= ' href="'. esc_attr($item->url) .'"';

        $item_post_type = $item->object;
        $item_post_id = $item->object_id;
        
        // get image
        $args = array(
          'post_type' => $item_post_type,
          'p' => $item_post_id,
          'posts_per_page' => 1
        );
        
        $query = new WP_Query($args);
        while($query->have_posts()) { $query->next_post(); $post_id = $query->post->ID;        
          $url = get('images_image', 1, 1, $post_id);         
          //$image = "<div class=\"nav_image\">". getThumbByUrl($url, 217, 113, "default.jpg") ."</div>";
          $image = "<div class=\"nav_image\">". getThumb($post_id, 215, 111, "default.jpg") ."</div>";
        }

        // get description
        $description = (!empty($item->description)) ? '<div class="nav_desc">'.esc_attr( $item->description ).'</div>' : '';

        $title = apply_filters( 'the_title', $item->title, $item->ID );

        $item_output = 
          "<a $attributes class=\"nav_title\">". $image .'</a>'.
          $args->before. 
          "<a $attributes class=\"nav_title\">". $args->link_before. $title .'</a>'. $args->link_after. 
          $description.
          "<a $attributes class=\"nav_more\">". _("Ver mais") .'</a>'. $args->link_after.  
          $args->after;

        // Since $output is called by reference we don't need to return anything.
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
        
        if(self::$li_count == 4) self::$li_count = 0;
        
    }
  }
  
  /**
   * HREF TO HASH SLUG
   */
        
  class walkerHashToSlug extends Walker_Nav_Menu {

    /**
     * Start the element output.
     *
     * @param  string $output Passed by reference. Used to append additional content.
     * @param  object $item   Menu item data object.
     * @param  int $depth     Depth of menu item. May be used for padding.
     * @param  array $args    Additional strings.
     * @return void
     */
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
    
        $classes = empty ( $item->classes ) ? array () : (array) $item->classes;

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item));

        !empty($class_names) and $class_names = ' class="'. esc_attr( $class_names ) . '"';

        $output .= "<li id='menu-item-$item->ID' $class_names>";
        $attributes  = '';

        !empty($item->attr_title) and $attributes .= ' title="'. esc_attr($item->attr_title) .'"';
        !empty($item->target) and $attributes .= ' target="'. esc_attr($item->target) .'"';
        !empty($item->xfn) and $attributes .= ' rel="'. esc_attr($item->xfn) .'"';
        !empty($item->url) and $attributes .= ' href="'. esc_attr($item->url) .'"';

        $item_post_type = $item->object;
        $item_post_id = $item->object_id;

        // get description
        $title = apply_filters( 'the_title', $item->title, $item->ID );

        $item_output = 
          $args->before. 
          "<a $attributes rel=\"page_{$item->ID}\">". $args->link_before. $title .'</a>'. $args->link_after.  
          $args->after;

        // Since $output is called by reference we don't need to return anything.
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
        
    }
  }
?>
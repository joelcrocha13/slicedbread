<?php
  
  add_action('admin_menu', 'myprefix_adjust_the_wp_menu', 999);
  function myprefix_adjust_the_wp_menu() {
    
    //Get user id
    $current_user = wp_get_current_user();
    $user_id = $current_user->ID;
  
    $post_types = array(
      'home'
      // , 'myposttype'
    );
    
    if(!empty($post_types)) {
      foreach($post_types as $post_type) {
        // Get number of posts authored by user
        $args = array(
          'post_type' => $post_type, 
          'author' => $user_id, 
          'fields' => 'ids'
        );
        $count = count(get_posts($args));
      
        //Conditionally remove link:
        if($count >= 1) {
          $page = remove_submenu_page('edit.php?post_type=' . $post_type, 'post-new.php?post_type=' . $post_type);
          
          // unset($submenu['edit.php?post_type=' . $post_type][10]);
        
          // HIDE TOP BUTTON "ADD NEW"
          if (isset($_GET['post_type']) && $_GET['post_type'] == $post_type) {
            echo '<style type="text/css">
              #favorite-actions, .add-new-h2, .tablenav { display:none; }
              .wrap .wp-heading-inline+.page-title-action { display:none; }
            </style>';
          }
          
        }
      }
    }
    
  }
  
  /*register_post_type($post_type, array(
    'capability_type' => $post_type,
    'capabilities' => array(
      'create_posts' => 'do_not_allow', // false < WP 4.5, credit @Ewout
    ),
    'map_meta_cap' => true, // Set to `false`, if users are not allowed to edit/delete existing posts
  ));*/
  
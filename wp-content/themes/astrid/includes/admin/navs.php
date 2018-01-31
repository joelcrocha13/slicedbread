<?php
   
 /* ADD SEPARATOR */    
  add_action('admin_menu', 'wpimpress_add_admin');
  function wpimpress_add_admin() {
  
    global $menu;
    
    $menu[120] = array('', 8, 'separator', '', 'wp-menu-separator');
    $menu[130] = array('', 8, 'separator', '', 'wp-menu-separator');
    $menu[140] = array('', 8, 'separator', '', 'wp-menu-separator');
    
  }
  
  /* CUSTOM MENUS */
  
  function add_menu_admin() {

    //add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
    //add_menu_page("My New Menu", "My New Menu", "edit_posts", "mynewmenu", "displayPage", null, 31);
    
    $field = array('id' => 'document', 'title' => utf8_encode('Documentação'));
    add_menu_page($field['title'], $field['title'], 'manage_options', 'mt_top_level_'.$field['id'], 'mt_top_level_'.$field['id'], '', 103); 
    
    $field = array('id' => 'formation', 'title' => utf8_encode('Formação'));
    add_menu_page($field['title'], $field['title'], 'manage_options', 'mt_top_level_'.$field['id'], 'mt_top_level_'.$field['id'], '', 104); 
    
    $field = array('id' => 'utilities', 'title' => utf8_encode('Utilitários'));
    add_menu_page($field['title'], $field['title'], 'manage_options', 'mt_top_level_'.$field['id'], 'mt_top_level_'.$field['id'], '', 107); 
    
  }
  //add_action('admin_menu', 'add_menu_admin');


  /* REMOVE DEFAULT MENUS */
  
  function remove_menus() {
    global $menu;
  	$restricted = array(
      //__('Dashboard'),
      //__('Posts'), 
      //__('Media'), 
      __('Links'), 
      // __('Comments'),
      //__('Pages'), 
      //__('Appearance'), 
      //__('Tools'), 
      //__('Users'), 
      //__('Settings'),
      //__('Plugins')
    );
    
  	end ($menu);
  	while (prev($menu)){
  		$value = explode(' ',$menu[key($menu)][0]);
  		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
  	}
  }
  add_action('admin_menu', 'remove_menus');
  
  /*
    5 - below Posts
    10 - below Media
    15 - below Links
    20 - below Pages
    25 - below comments
    60 - below first separator
    65 - below Plugins
    70 - below Users
    75 - below Tools
    80 - below Settings
    100 - below second separator
  */

?>
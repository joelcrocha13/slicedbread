<?php

  // add_action( 'admin_menu', 'my_plugin_menu' );
  function my_plugin_menu() {
  	add_options_page( 
  		'My Options',
  		'My Plugin',
  		'manage_options',
  		'my-plugin.php',
  		'my_plugin_page'
  	);
  }
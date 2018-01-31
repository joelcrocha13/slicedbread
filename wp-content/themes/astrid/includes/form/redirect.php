<?php

  add_action('wpcf7_mail_sent', 'ip_wpcf7_mail_sent');
  function ip_wpcf7_mail_sent($wpcf7) {
    
  	$on_sent_ok = $wpcf7->additional_setting('is_redirect', true); 

    // wp_redirect(trim($on_sent_ok[0]));
    // print_r($_REQUEST);
    // var_dump($wpcf7);
	  // die();
     
  	// if(is_array($on_sent_ok) && count($on_sent_ok) > 0) {
    if($on_sent_ok && $_REQUEST['your-firstconsult'] == "Sim") {
  		$redirect = get_permalink(get_option('page_first_appointment'));
      wp_redirect($redirect);
      // wp_redirect(trim($on_sent_ok[0]));
  		exit;
  	} else {
      // wp_redirect('lol');
    }
    
  }
  
  add_filter('wpcf7_validate_select', 'your_validation_filter_func', 10, 2);
  add_filter('wpcf7_validate_select*', 'your_validation_filter_func', 10, 2);
  
  function your_validation_filter_func($result, $tag) {
    
    $type = $tag['type'];   
  	$name = $tag['name']; 
    
    // print_r($tag);
    // [raw_values] => Array ( [0] => Dia...
    
    // $result = array();
    if($_POST['your-appointment'] != "Outro...") {
    	if($name == 'your-day' || $name == 'your-year' || $name == 'your-month' ||
        $name == 'your-hour' || $name == 'your-minute'
      ) {
    		
        $value = $_POST[$name];
        $first_value = $tag['raw_values'][0];
    
    		if($first_value == $value) { // if(!is_int($value) && $value > 0) { // if ( is_not_valid_against_your_validation( $the_value ) ) {
    			$result['valid'] = false;
    			// $result['reason'][$name] = 'Por favor preencha este campo obrigatório.';
    		}
    	}
    }
  
  	return $result;
    
  }
  
?>
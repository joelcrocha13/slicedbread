<?php
  /*
    Element Description: VC Custom
  */
   
  // Element Class 
  class vcLakesCarousel extends WPBakeryShortCode {
    
    public $mapping = 'vc_lakescarousel_mapping';
    public $shortcode = 'vc_lakescarousel';
    public $html = 'vc_lakescarousel_html';
    
    public $name = "VC Lakes Carousel";
    public $code = 'vc_lakescarousel';
    public $desc = "List of Lakes in Carousel";
    public $desc_elemns = "My Custom Elements";
    public $lang = 'cv_elements';
          
    // Element Init
    function __construct() {   
      add_action( 'init', array( $this, $this->mapping) );
      add_shortcode( $this->shortcode, array( $this, $this->html ) );
    }           
     
    // Element Mapping
    public function vc_lakescarousel_mapping() {
         
      // Stop all if VC is not enabled
      if ( !defined( 'WPB_VC_VERSION' ) ) {
        return;
      }   
      
      $name = $this->name;
      $code = $this->code;
      $desc = $this->desc;
      $desc_elemns = $this->desc_elemns;
      $lang = $this->lang;
      
      // Map the block with vc_map()
      vc_map(    
        array(
          'name' => __($name, 'text-domain'),
          'base' => $code,
          'description' => __($desc, $lang), 
          'category' => __($desc_elemns, $lang),   
          'icon' => get_template_directory_uri().'/vc-elements/images/element-icon-wordpress.svg',            
          'params' => array(                       
            array(
              'type' => 'textfield',
              'holder' => 'h3',
              'class' => 'title-class',
              'heading' => __('Title', $lang),
              'param_name' => 'title',
              'value' => __('Default value', $lang),
              // 'description' => __('Box Title', $lang),
              'admin_label' => false,
              'weight' => 0,
              'group' => 'Custom Group',
            ),  
            array(
              'type' => 'textfield',
              'holder' => 'div',
              'class' => 'text-class',
              'heading' => __('Category', $lang),
              'param_name' => 'category',
              'value' => __('Default value', $lang),
              // 'description' => __('Box Text', $lang),
              'admin_label' => false,
              'weight' => 0,
              'group' => 'Custom Group',
            )                   
          )
        )
      );                                 
        
    } 
     
    // Element HTML
    public function vc_lakescarousel_html( $atts ) {
         
      // Params extraction
      extract(
        shortcode_atts(
          array(
            'title'   => '',
            'category' => '',
          ), 
          $atts
        )
      );
      
      echo do_shortcode('[vc_lakes_carousel title="' . $title . '" category="' . $category . '"]');
         
    } 
       
  } // End Element Class
   
  // Element Class Init
  new vcLakesCarousel(); 
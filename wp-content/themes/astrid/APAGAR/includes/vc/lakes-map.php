<?php
  /*
    Element Description: VC Info Box
  */
  
  // Before VC Init
  add_action( 'vc_before_init', 'vc_before_init_actions' );
   
  function vc_before_init_actions() {
       
    //.. Code from other Tutorials ..//
    
    // Require new custom Element
    // require_once( get_template_directory().'/vc-elements/my-first-custom-element.php' ); 
       
  }
   
  // Element Class 
  class vcInfoBox extends WPBakeryShortCode {
    
    public $mapping = 'vc_infobox_mapping';
    public $shortcode = 'vc_infobox';
    public $html = 'vc_infobox_html';
    
    public $name = "VC Map";
    public $code = 'vc_infobox';
    public $desc = "Map With Lakes";
    public $desc_elemns = "My Custom Elements";
    public $lang = 'cv_elements';
          
    // Element Init
    function __construct() {   
      add_action( 'init', array( $this, $this->mapping) );
      add_shortcode( $this->shortcode, array( $this, $this->html ) );
    }           
     
    // Element Mapping
    public function vc_infobox_mapping() {
         
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
          /*'params' => array(                       
            array(
              'type' => 'textfield',
              'holder' => 'h3',
              'class' => 'title-class',
              'heading' => __('Title', $lang),
              'param_name' => 'title',
              'value' => __('Default value', $lang),
              'description' => __('Box Title', $lang),
              'admin_label' => false,
              'weight' => 0,
              'group' => 'Custom Group',
            ),  
            array(
              'type' => 'textarea',
              'holder' => 'div',
              'class' => 'text-class',
              'heading' => __('Text', $lang),
              'param_name' => 'text',
              'value' => __('Default value', $lang),
              'description' => __('Box Text', $lang),
              'admin_label' => false,
              'weight' => 0,
              'group' => 'Custom Group',
            )                   
          )*/
        )
      );                                 
        
    } 
     
     
    // Element HTML
    public function vc_infobox_html( $atts ) {
         
      // Params extraction
      extract(
        shortcode_atts(
          array(
            'title'   => '',
            'text' => '',
          ), 
          $atts
        )
      );
      
      echo do_shortcode('[vc_map]');
         
    } 
       
  } // End Element Class
   
  // Element Class Init
  new vcInfoBox(); 
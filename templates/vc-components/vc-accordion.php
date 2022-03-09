<?php
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
  class  WPBakeryShortCode_terranus_accordion_container extends WPBakeryShortCodesContainer {

    function __construct() {
        add_action( 'init', array( $this, 'create_shortcode' ), 999 );            
        add_shortcode( 'terranus_accordion_container ', array( $this, 'render_shortcode' ) );

    }        

    public function create_shortcode() {
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }        

        // Map blockquote with vc_map()
        //Register "container" content element. It will hold all your inner (child) content elements
        vc_map( array(
            "name" => __("Terranus Accordion Container", "terranus"),
            "base" => "terranus_accordion_container",
            "as_parent" => array('only' => 'terranus_single_accordion'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
            "category" => __( 'Terranus Modules', 'terranus'),     
            "icon" => 'single-image-nav',
            "content_element" => true,
            "show_settings_on_create" => false,
            "is_container" => true,
            "js_view" => 'VcColumnView',

            "params" => array(
            // add params same as with any other content element
             array(
               array(
                "type" => "textfield",
                "heading" => __("Heading of accordion section", "terranus"),
                "param_name" => "heading",
                ),

                "type" => "textfield",
                "heading" => __("Extra class name", "terranus"),
                "param_name" => "el_class",
                "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "terranus")
                ),
                
                
            ),
           
            ) );            

    }

    public function render_shortcode( $atts, $content, $tag ) {
        // Params extraction
            extract(
                shortcode_atts(
                    array(
                        'heading' =>'',
                        'el_class' =>'',

                    ),
                    $atts
                )
            );

            $html = '<section class="'.$el_class.'advisory mx-auto  w-2/3 py-20 md:container ">
      <h3 class="font-sans text-4xl uppercase leading-snug">'.$heading.'</h3>
      <div class="accordion pt-9">'.do_shortcode($content).'</div></section>';
          
            return $html;              

    }

}
new WPBakeryShortCode_terranus_accordion_container();

}
if ( class_exists( 'WPBakeryShortCode' ) ) {

class WPBakeryShortCode_terranus_single_accordion extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, 'create_shortcode' ), 999 );            
        add_shortcode( 'terranus_single_accordion', array( $this, 'render_shortcode' ) );

    }        

    public function create_shortcode() {
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }        

        // Map blockquote with vc_map()
        //Register "container" content element. It will hold all your inner (child) content elements
       vc_map( array(
            "name" => __("Accordion Box", "terranus"),
            "base" => "terranus_single_accordion",
            // "content_element" => true,
            "as_child" => array('only' => 'terranus_accordion_container'), // Use only|except attributes to limit parent (separate multiple values with comma)
            "category" => __( 'Terranus Modules', 'terranus'),  
            "params" => array(
            // add params same as with any other content element
            
                array(
                "type" => "textfield",
                "heading" => __("Title", "terranus"),
                "param_name" => "title",
                "description" => __("Enter title of accordion", "terranus")
                ),

                array(
                "type" => "textarea",
                "heading" => __("description", "terranus"),
                "param_name" => "description",
                "description" => __("Enter description of accordion", "terranus")
                ),

                array(
                "type" => "colorpicker",
                "heading" => __("Accordion color", "terranus"),
                "param_name" => "color",
                "description" => __("Set color of background and border of accordion", "terranus")
                ),
                array(
                "type" => "checkbox",
                "heading" => __("white text after select", "terranus"),
                "param_name" => "white_text",
                "description" => __("if need to change text color for better readability", "terranus")
                ),




            )
            ) );           

    }

    public function render_shortcode( $atts, $content, $tag ) {
         // Params extraction
            extract(
                shortcode_atts(
                     array(
                        'title'   => '',
                        'description'      => '',
                        'color'       => '',
                        'white_text' => '',
                    ),
                    $atts
                )
            );
          

            if(empty($white_text)){
              $white_text = '';
            }else{
              $white_text = 'text-white';
            }

            if(empty($color)){
              $color = '#75B7A0';
            }
            
            $html = '<div after="'.$white_text.'" color="'.$color.'" class="accordion-box">
            <div style=" border-color: '.$color.';"
              class="accordion-title pl-8 pr-5 pt-8 pb-7 border-l-8 flex justify-between hover:bg-gray-100 mb-1.5">
              <h3 class="text-md md:text-xl">'.$title.'</h3>
              <i class="fa-solid fa-angle-down my-auto"></i>
            </div>
            <p class="accordion-content font-sans-text text-sm text-terranus-gray-1 leading-relaxed">'.$description.'</p></div>';

            return $html;            

    }

}
new WPBakeryShortCode_terranus_single_accordion();

}
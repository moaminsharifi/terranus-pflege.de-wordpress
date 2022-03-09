<?php
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
class WPBakeryShortCode_Terranus_Heading extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, 'create_shortcode' ), 999 );            
        add_shortcode( 'terranus_heading', array( $this, 'render_shortcode' ) );

    }        

    public function create_shortcode() {
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }        

        // Map blockquote with vc_map()
        vc_map( array(
            'name'          => __('Heading', 'terranus'),
            'base'          => 'terranus_heading',
            'description'  	=> __( '', 'terranus' ),
            'category' => __( 'Terranus Modules', 'terranus'),                    
            'params' => array(

                array(
                    "type" => "textfield",
                    "holder" => "span",
                    "class" => "",                     
                    "heading" => __( "Heading Content", 'terranus' ),
                    "param_name" => "heading",
                    "value" => __( "Hello", 'terranus' ),
                    "description" => __( "Enter content.", 'terranus' )
                ),    

            ),
        ));             

    }

    public function render_shortcode( $atts, $content, $tag ) {
        $atts = (shortcode_atts(array(
            'heading'   => '',
        ), $atts));

        // 




        //Content 
        $content            = wpb_js_remove_wpautop($content, true);
      
        


        $output = '<h3 class="font-sans text-4xl uppercase leading-snug mb-9">'.$atts['heading'] .'</h3>';

        return $output;                  

    }

}

new WPBakeryShortCode_Terranus_Heading();
}
<?php
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
  class WPBakeryShortCode_Terranus_Image_Nav_Container extends WPBakeryShortCodesContainer {

    function __construct() {
        add_action( 'init', array( $this, 'create_shortcode' ), 999 );            
        add_shortcode( 'terranus_image_nav_container', array( $this, 'render_shortcode' ) );

    }        

    public function create_shortcode() {
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }        

        // Map blockquote with vc_map()
        //Register "container" content element. It will hold all your inner (child) content elements
        vc_map( array(
            "name" => "Image Nav Container",
            "base" => "terranus_image_nav_container",
            "as_parent" => array('only' => 'terranus_single_image_nav'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
            "category" => __( 'Terranus Modules', 'terranus'),     
            "icon" => 'single-image-nav',
            "content_element" => true,
            "show_settings_on_create" => false,
            "is_container" => true,
            "js_view" => 'VcColumnView',

            "params" => array(
            // add params same as with any other content element
                array(
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
                        
                    ),
                    $atts
                )
            );

            $html = '<section class="image-nav pt-12 md:pt-0"> <div class="mx-auto grid w-2/3 grid-cols-1 grid-rows-3 gap-0 md:container md:grid-cols-3 md:grid-rows-1 md:gap-2.5">' . do_shortcode($content) . '</div></section>';

            return $html;              

    }

}
new WPBakeryShortCode_Terranus_Image_Nav_Container();

}
if ( class_exists( 'WPBakeryShortCode' ) ) {

class WPBakeryShortCode_Terranus_Single_Image_Nav extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, 'create_shortcode' ), 999 );            
        add_shortcode( 'terranus_single_image_nav', array( $this, 'render_shortcode' ) );

    }        

    public function create_shortcode() {
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }        

        // Map blockquote with vc_map()
        //Register "container" content element. It will hold all your inner (child) content elements
       vc_map( array(
            "name" => "Image Nav Item",
            "base" => "terranus_single_image_nav",
            "content_element" => true,
            'icon'=>'single-image-nav-icon',
            'admin_enqueue_css' => array( get_template_directory_uri() . '/assets/css/vc.css' ),

            "as_child" => array('only' => 'terranus_image_nav_container'), // Use only|except attributes to limit parent (separate multiple values with comma)
            "category" => __( 'Terranus Modules', 'terranus'),  
            "params" => array(
            // add params same as with any other content element
            
                array(
                "type" => "textfield",
                'admin_label' => false,
                "heading" => __("Title", "terranus"),
                "param_name" => "content",
                "description" => __("Enter title of slide", "terranus")
                ),

                array(
                "type" => "vc_link",
                "heading" => __("Link", "terranus"),
                "param_name" => "link",
                "description" => __("Enter Link of Navigation", "terranus")
                ),
                array(
                "type" => "attach_image",
                "heading" => __("Image", "terranus"),
                "param_name" => "image",
                "description" => __("Set background image", "terranus")
                ),

                array(
                "type" => "colorpicker",
                "heading" => __("Background Color", "terranus"),
                "param_name" => "color",
                "description" => __("Set color of background", "terranus")
                ),



            )
            ) );           

    }

    public function render_shortcode( $atts, $content, $tag ) {
         // Params extraction
            extract(
                shortcode_atts(
                     array(
                         'link'   => '',
                            'image'      => '',
                            'title'       => '',
                            'color' => '',
                    ),
                    $atts
                )
            );
            if(empty($image)){
              $image =  get_template_directory_uri().'/assets/images/vc/image-nav.png';
            }else{
              $image = wp_get_attachment_image_src($image);
            }

            if(empty($link)){
              $link = '#';
            }
            if(false){
              $color = 'style="  background-color: '.$color.'; "';
            }else{
              $color = 'style=" --tw-bg-opacity: 1; background-color: rgb(234 200 161 / var(--tw-bg-opacity)); "';
            }
            
            $html = '
            <div class="single-image-nav even:translate-y-0 md:even:-translate-y-32">
          <div class="relative">
            <img src="'. $image. '" class="z-m10 h-80 w-auto md:w-full" alt="single-nav" />
          </div>
          <a href="'.$link.'">
          <div '.$color.' class="z-50 mx-2.5 -translate-y-8 pt-3 pb-20 text-center">
            <p class="px-6 font-sans text-2xl font-bold uppercase leading-snug text-white">
              '.$title.'
            </p>
          </div>
          </a>
        </div>


            ';

            return $html;            

    }

}
new WPBakeryShortCode_Terranus_Single_Image_Nav();

}

<?php
//Register "container" content element. It will hold all your inner (child) content elements
vc_map(array(
    "name" => __("Image Card Container", "terranus") ,
    "base" => "image_card_container",
    "as_parent" => array(
        'only' => 'image_card_item'
    ), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "show_settings_on_create" => false,
    "is_container" => true,
    "category" => __('Terranus Modules', 'terranus') ,
    "params" => array(
        // add params same as with any other content element
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "terranus") ,
            "param_name" => "el_class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "terranus")
        )
    ) ,
    "js_view" => 'VcColumnView'
));
vc_map(array(
    "name" => __("Image Card Item", "terranus") ,
    "base" => "image_card_item",
    "content_element" => true,
    "as_child" => array(
        'only' => 'image_card_container'
    ) , // Use only|except attributes to limit parent (separate multiple values with comma)
    "params" => array(
        // add params same as with any other content element
        array(
            "type" => "textfield",
            'admin_label' => false,
            "heading" => __("Title", "terranus") ,
            "param_name" => "content",
            "description" => __("Enter title of slide", "terranus")
        ) ,

        array(
            "type" => "vc_link",
            "heading" => __("Link", "terranus") ,
            "param_name" => "link",
            "description" => __("Enter Link of Navigation", "terranus")
        ) ,
        array(
            "type" => "attach_image",
            "heading" => __("Image", "terranus") ,
            "param_name" => "image",
            "description" => __("Set background image", "terranus")
        ) ,

        array(
            "type" => "colorpicker",
            "heading" => __("Background Color", "terranus") ,
            "param_name" => "color",
            "description" => __("Set color of background", "terranus")
        ) ,
    )
));
//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if (class_exists('WPBakeryShortCodesContainer'))
{
    class WPBakeryShortCode_Image_Card_Container extends WPBakeryShortCodesContainer
    {

    }
}
if (class_exists('WPBakeryShortCode'))
{
    class WPBakeryShortCode_Image_Card_Item extends WPBakeryShortCode
    {
    }
}


if(!function_exists('image_card_container_render_handler')){
    function image_card_container_render_handler($atts, $content = null){
        extract(shortcode_atts(array(
            'el_class' => '',)
        , $atts));

        $html = '<section class="image-nav pt-12 md:pt-0">
        <div class="mx-auto w-2/3 md:container">
          <div
            class="grid grid-cols-1 grid-rows-3
            gap-0 md:grid-cols-3 md:grid-rows-1 md:gap-2.5 lg:px-14"
          >' .
          do_shortcode($content) . '</div></div></section>';

        return $html;
    }
    add_shortcode( 'image_card_container' , 'image_card_container_render_handler' );
}
if(!function_exists('image_card_item_render_handler')){

    function image_card_item_render_handler($atts , $content = null){
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
              $image = wp_get_attachment_image_src($image , 'full')[0];
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
            <div class="single-image-nav even:translate-y-0 md:even:-translate-y-32 z-10">
          <div class="relative">
            <img src="'. $image. '" class="z-m10 h-full w-auto md:w-full lg:h-80" alt="'.$content.'" />
          </div>
          <a href="'.$link.'">
          <div '.$color.' class="z-50 mx-2.5 -translate-y-8 pt-3 pb-20 text-center">
            <p class="px-6 font-sans text-2xl font-bold uppercase leading-snug text-white">
              '.$content.'
            </p>
          </div>
          </a>
        </div>


            ';
        return $html;
    
    }
    add_shortcode( 'image_card_item' , 'image_card_item_render_handler' );
}

<?php
//Register "container" content element. It will hold all your inner (child) content elements
vc_map(array(
    "name" => __("Accordion Container", "terranus") ,
    "base" => "accordion_container",
    "as_parent" => array(
        'only' => 'accordion_item'
    ) , // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
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
        ) ,
        array(
            "type" => "textfield",
            "heading" => __("Heading of accordion section", "terranus") ,
            "param_name" => "heading",
        ) ,

    ) ,
    "js_view" => 'VcColumnView'
));
vc_map(array(
    "name" => __("Accordion Item", "terranus") ,
    "base" => "accordion_item",
    "content_element" => true,
    "as_child" => array(
        'only' => 'accordion_container'
    ) , // Use only|except attributes to limit parent (separate multiple values with comma)
    "params" => array(
        // add params same as with any other content element
        array(
            "type" => "textfield",
            "heading" => __("Title", "terranus") ,
            "param_name" => "title",
            "description" => __("Enter title of accordion", "terranus")
        ) ,

        array(
            "type" => "textarea",
            "heading" => __("description", "terranus") ,
            "param_name" => "description",
            "description" => __("Enter description of accordion", "terranus")
        ) ,

        array(
            "type" => "colorpicker",
            "heading" => __("Accordion color", "terranus") ,
            "param_name" => "color",
            "description" => __("Set color of background and border of accordion", "terranus")
        ) ,
        array(
            "type" => "checkbox",
            "heading" => __("white text after select", "terranus") ,
            "param_name" => "white_text",
            "description" => __("if need to change text color for better readability", "terranus")
        ) ,
    )
));
//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if (class_exists('WPBakeryShortCodesContainer'))
{
    class WPBakeryShortCode_Accordion_Container extends WPBakeryShortCodesContainer
    {

    }
}
if (class_exists('WPBakeryShortCode'))
{
    class WPBakeryShortCode_Accordion_Item extends WPBakeryShortCode
    {
    }
}

if (!function_exists('accordion_container_render_handler'))
{
    function accordion_container_render_handler($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'el_class' => '',
            'heading'=>'',
        ) , $atts));

        $html = '<section class="' . $el_class . 'mx-auto w-2/3 py-20 md:container "><div class="xl:px-16">
      <h3 class="font-sans text-4xl uppercase leading-snug">' . $heading . '</h3>
      <div class="accordion pt-9">' . do_shortcode($content) . '</div></div></section>';

        return $html;
    }
    add_shortcode('accordion_container', 'accordion_container_render_handler');
}
if (!function_exists('accordion_item_render_handler'))
{

    function accordion_item_render_handler($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'title' => '',
            'description' => '',
            'color' => '',
            'white_text' => '',
        ) , $atts));
        if (empty($white_text))
        {
            $white_text = '';
        }
        else
        {
            $white_text = 'text-white';
        }

        if (empty($color))
        {
            $color = '#75B7A0';
        }

        $html = '<div after="' . $white_text . '" color="' . $color . '" class="accordion-box">
            <div style=" border-color: ' . $color . ';"
              class="accordion-title pl-8 pr-5 pt-8 pb-7 border-l-8 flex justify-between hover:bg-gray-100 mb-1.5">
              <h3 class="text-md md:text-xl">' . $title . '</h3>
              <i class="fa-solid fa-angle-down my-auto"></i>
            </div>
            <div class="accordion-content font-sans-text text-sm text-terranus-gray-1 leading-relaxed">
            <p>' . $description . '</p>
            </div>
            
            </div>';

        return $html;

    }
    add_shortcode('accordion_item', 'accordion_item_render_handler');
}


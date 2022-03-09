<?php
//Register "container" content element. It will hold all your inner (child) content elements
vc_map(array(
    "name" => __("Info Card Container", "terranus") ,
    "base" => "info_card_container",
    "as_parent" => array(
        'only' => 'info_card_item'
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
        )
    ) ,
    "js_view" => 'VcColumnView'
));
vc_map(array(
    "name" => __("Info Card Item", "terranus") ,
    "base" => "info_card_item",
    "content_element" => true,
    "as_child" => array(
        'only' => 'info_card_container'
    ) , // Use only|except attributes to limit parent (separate multiple values with comma)
    "params" => array(
        // add params same as with any other content element
        array(
            "type" => "textfield",
            'admin_label' => false,
            "heading" => __("Title", "terranus") ,
            "param_name" => "title",
            "description" => __("Enter title of card", "terranus")
        ) ,

        array(
            "type" => "textarea",
            "heading" => __("content of card", "terranus") ,
            "param_name" => "description",
            "description" => __("Enter title of card", "terranus")
        ) ,

        array(
            "type" => "colorpicker",
            "heading" => __("Background Color of main part", "terranus") ,
            "param_name" => "bg_main",
            "description" => __("Set background color of main content", "terranus")
        ) ,
        array(
            "type" => "colorpicker",
            "heading" => __("Background Color of icon part", "terranus") ,
            "param_name" => "bg_icon",
            "description" => __("Set background color of icon", "terranus")
        ) ,

        array(
            "type" => "iconpicker",
            "heading" => __("Icon", "terranus") ,
            "param_name" => "icon",
            "setting" => array(
                'emptyIcon' => false,
                'type' => 'fontawesome'
            ) ,

            "description" => __("Set icon of card", "terranus")
        ) ,

    )
));
//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if (class_exists('WPBakeryShortCodesContainer'))
{
    class WPBakeryShortCode_Info_Card_Container extends WPBakeryShortCodesContainer
    {

    }
}
if (class_exists('WPBakeryShortCode'))
{
    class WPBakeryShortCode_Info_Card_Item extends WPBakeryShortCode
    {
    }
}

if (!function_exists('info_card_container_render_handler'))
{
    function info_card_container_render_handler($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'el_class' => '',
        ) , $atts));

        $html = '<section class="' . $el_class . 'mx-auto w-2/3 space-y-14 pt-20 pb-44 md:w-4/5 2xl:w-3/5">' . do_shortcode($content) . '</section>';

        return $html;
    }
    add_shortcode('info_card_container', 'info_card_container_render_handler');
}
if (!function_exists('info_card_item_render_handler'))
{

    function info_card_item_render_handler($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'title' => '',
            'description' => '',
            'icon' => '',
            'bg_main' => '',
            'bg_icon' => '',
        ) , $atts));

        $bg_main = empty($bg_main)? '--tw-bg-opacity: 0.25; background-color: rgb(234 200 161 / var(--tw-bg-opacity));' : 'background-color: ' . $bg_main . ';';
        $bg_icon = empty($bg_icon)? '--tw-bg-opacity: 1; background-color: rgb(0 115 146 / var(--tw-bg-opacity));' : 'background-color: ' . $bg_icon . ';';
        
        $html = '
           <div class="single-info flex flex-col 
      group
      odd:single-info-odd
      even:single-info-even
       md:odd:flex-row 
       md:even:flex-row-reverse">
        <div style="'.$bg_icon.'"
        class="icon h-32 p-12 lg:h-64 lg:px-22 lg:py-18 flex justify-center items-center">

          <i class="text-white '.$icon.'  h-16 w-16 
              lg:h-24 lg:w-24 "></i>
        </div>
        <div style="'.$bg_main.'"
          class="content w-full md:px-22  bg-opacity-25 px-10 py-10
          ">
          <h3 class="text-terranus-gray-1 z-10 font-sans text-xl font-bold uppercase leading-normal">
            '.$title.'
          </h3>
          <p class="text-terranus-gray-1 mt-8 font-sans-text text-lg leading-snug">
            '.$description.'
          </p>
        </div>
      </div>';
        return $html;

    }
    add_shortcode('info_card_item', 'info_card_item_render_handler');
}


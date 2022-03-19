<?php
vc_map(array(
    "name" => __("Back Quote with Link", "terranus") ,
    "base" => "post_backqoute_with_bg_item",
    "posttypes" => array(
        'only' => 'post'
    ) ,
    "content_element" => true,
    "category" => __('Terranus Modules', 'terranus') ,
    "params" => array(
        // add params same as with any other content element
        array(
            "type" => "textfield",
            'admin_label' => false,
            "heading" => __("Heading", "terranus") ,
            "param_name" => "title",
            "description" => __("Enter Heading", "terranus")
        ) ,

        array(
            "type" => "textarea",
            "heading" => __("content of card", "terranus") ,
            "param_name" => "description",
            "description" => __("Enter title of card", "terranus")
        ) ,
        array(
            "type" => "vc_link",
            "heading" => __("Link", "terranus") ,
            "param_name" => "link",
            "description" => __("Enter Link of Navigation", "terranus")
        ) ,
        array(
            "type" => "checkbox",
            "heading" => __("Make text white", "terranus") ,
            "param_name" => "white_text",
            "description" => __("if need to change text color for better readability", "terranus")
        ) ,
        array(
            "type" => "colorpicker",
            "heading" => __("Border Color", "terranus") ,
            "param_name" => "border_color",
            "description" => __("Set color of left border of Back qoute", "terranus")
        ) ,
        array(
            "type" => "colorpicker",
            "heading" => __("Background Color", "terranus") ,
            "param_name" => "bg_color",
            "description" => __("Set color of background", "terranus")
        ) ,

    ) ,

));

if (class_exists('WPBakeryShortCode'))
{
    class WPBakeryShortCode_Post_Backqoute_With_Bg_Item extends WPBakeryShortCode
    {
    }
}

if (!function_exists('post_backqoute_with_bg_item_render_handler'))
{

    function post_backqoute_with_bg_item_render_handler($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'title' => '',
            'description' => '',
            'white_text' => '',
            'border_color' => '',
            'bg_color'=> '',
            'link'=>'',

        ) , $atts));
        $white_text = empty($white_text) ? '' : 'text-white';
        $border_color = empty($border_color) ? '-tw-border-opacity: 1; border-color: rgb(255 255 255 / var(--tw-border-opacity));' : 'border-color:' . $border_color . ';';
        $bg_color_style = empty($bg_color) ? '--tw-bg-opacity: 1; background-color: rgb(0 115 146 / var(--tw-bg-opacity));' : 'background-color:' . $bg_color . ';';
  
        $html = '<section style="'.$bg_color_style.'">
        <div class="mx-auto w-2/3 py-10 md:container">
        <div style="' . $border_color . '" class="md:border-l-30 2xl:pl-15 2xl:pr-22.5 border-l-4 ' . $white_text . '">
            <h3 class="pt-6 font-sans text-xl font-bold uppercase">' . $title . '</h3>
             <div class="flex flex-col md:flex-row  md:space-x-8">
             <div class="font-sans-text pt-6 pb-14 text-lg">' . $description . '</div>
            <div class="my-auto mb-0 pb-8">
                <a href="'.$link.'" style="' . $border_color . '" class="border-1 border  py-3 px-8 text-lg text-white">
                  mehr
                </a>
            </div>

             </div>
            
        </div>
      </section>';
        return $html;

    }
    add_shortcode('post_backqoute_with_bg_item', 'post_backqoute_with_bg_item_render_handler');
}


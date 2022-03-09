<?php
vc_map(array(
    "name" => __("Back Quote", "terranus") ,
    "base" => "backqoute_item",
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

    ) ,

));

if (class_exists('WPBakeryShortCode'))
{
    class WPBakeryShortCode_Backqoute_Item extends WPBakeryShortCode
    {
    }
}

if (!function_exists('backqoute_item_render_handler'))
{

    function backqoute_item_render_handler($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'title' => '',
            'description' => '',
            'white_text' => '',
            'border_color' => ''

        ) , $atts));
        $white_text = empty($white_text) ? '' : 'text-white';
        $border_color = empty($border_color) ? '-tw-border-opacity: 1; border-color: rgb(255 255 255 / var(--tw-border-opacity));' : 'border-color:' . $border_color . ';';

        $html = '<div style="' . $border_color . '" class="md:border-l-30 border-l-4 px-8 md:px-10 ' . $white_text . '">
            <h3 class="pt-12 font-sans text-4xl font-bold uppercase">' . $title . '</h3>
            <p class="font-sans-text pt-8 pb-14 text-lg">' . $description . '</p></div>';
        return $html;

    }
    add_shortcode('backqoute_item', 'backqoute_item_render_handler');
}


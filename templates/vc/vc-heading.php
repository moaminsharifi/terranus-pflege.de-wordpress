<?php
vc_map(array(
    "name" => __("Heading", "terranus") ,
    "base" => "heading_item",
    "content_element" => true,
    "as_child" => array(
        'only' => ['terranus_container', 'terranus_post_container']
    ) ,
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
            "type" => "checkbox",
            "heading" => __("Make text white", "terranus") ,
            "param_name" => "white_text",
            "description" => __("if need to change text color for better readability", "terranus")
        ) ,

    ) ,

));

if (class_exists('WPBakeryShortCode'))
{
    class WPBakeryShortCode_Heading_Item extends WPBakeryShortCode
    {
    }
}

if (!function_exists('heading_item_render_handler'))
{

    function heading_item_render_handler($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'title' => '',

            'white_text' => '',

        ) , $atts));
        $white_text = empty($white_text) ? 'text-terranus-gray-1' : 'text-white';

        $html = '<h2 class="mb-8 font-sans text-4xl font-bold ' . $white_text . ' md:text-4xl">
            ' . $title . '
          </h2>';
        return $html;

    }
    add_shortcode('heading_item', 'heading_item_render_handler');
}


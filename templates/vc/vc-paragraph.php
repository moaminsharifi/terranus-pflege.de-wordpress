<?php
vc_map(array(
    "name" => __("Paragraph", "terranus") ,
    "base" => "paragraph_item",
    "content_element" => true,
    "as_child" => array(
         'only' => ['terranus_container', 'terranus_post_container']
    ) ,
    "category" => __('Terranus Modules', 'terranus') ,
    "params" => array(
        // add params same as with any other content element
        array(
            "type" => "textarea_html",
            'admin_label' => false,
            "heading" => __("Content", "terranus") ,
            "param_name" => "content",
            "description" => __("Enter Content", "terranus")
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
    class WPBakeryShortCode_Paragraph_Item extends WPBakeryShortCode
    {
    }
}

if (!function_exists('paragraph_item_render_handler'))
{

    function paragraph_item_render_handler($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'content' => '',
            'white_text' => '',

        ) , $atts));
        $white_text = empty($white_text) ? '' : 'text-white';

        $html = '<div class="text-terranus-gray-1 font-sans-text space-y-8 text-lg ' . $white_text . ' ">
            ' . $content . '
          </div>';
        return $html;

    }
    add_shortcode('paragraph_item', 'paragraph_item_render_handler');
}


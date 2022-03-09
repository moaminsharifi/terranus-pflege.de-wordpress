<?php
//Register "container" content element. It will hold all your inner (child) content elements
vc_map(array(
    "name" => __("Terranus Container", "terranus") ,
    "base" => "terranus_container",
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
            "type" => "colorpicker",
            "heading" => __("Background Color", "terranus") ,
            "param_name" => "color",
            "description" => __("Set color of background", "terranus")
        ) ,

    ) ,
    "js_view" => 'VcColumnView'
));

//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if (class_exists('WPBakeryShortCodesContainer'))
{
    class WPBakeryShortCode_Terranus_Container extends WPBakeryShortCodesContainer
    {

    }
}

if (!function_exists('terranus_container_render_handler'))
{
    /**
     * <section class="seminare bg-terranus-secondary-2">
     * <div class="mx-auto w-2/3 py-36 md:container">
     *</div>
     *</section>
     */
    function terranus_container_render_handler($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'el_class' => '',
            'color' => ''
        ) , $atts));
        $bg_color_style = empty($color) ? '--tw-bg-opacity: 1; background-color: rgb(0 115 146 / var(--tw-bg-opacity));' : 'background-color:' . $color . ';';
        $html = '<section style="' . $bg_color_style . '" class="' . $el_class . '" ><div class="mx-auto w-2/3 py-36 md:container">' . do_shortcode($content) . '</div></section>';

        return $html;
    }
    add_shortcode('terranus_container', 'terranus_container_render_handler');
}


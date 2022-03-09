<?php
//Register "container" content element. It will hold all your inner (child) content elements
vc_map(array(
    "name" => __("Slider Container", "terranus") ,
    "base" => "slider_container",
    "as_parent" => array(
        'only' => 'slider_item'
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
    "name" => __("Slider Item", "terranus") ,
    "base" => "slider_item",
    "content_element" => true,
    "as_child" => array(
        'only' => 'slider_container'
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
            "heading" => __("Content", "terranus") ,
            "param_name" => "description",
            "description" => __("Enter Content of slider", "terranus")
        ) ,
        array(
            "type" => "attach_image",
            "heading" => __("Background Image", "terranus") ,
            "param_name" => "image",
            "description" => __("Set background image", "terranus")
        ) ,

        array(
            "type" => "colorpicker",
            "heading" => __("Slider color", "terranus") ,
            "param_name" => "color",
            "description" => __("Set color of background of slider (Better be dark tune)", "terranus")
        )

    )
));
//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if (class_exists('WPBakeryShortCodesContainer'))
{
    class WPBakeryShortCode_Slider_Container extends WPBakeryShortCodesContainer
    {

    }
}
if (class_exists('WPBakeryShortCode'))
{
    class WPBakeryShortCode_Slider_Item extends WPBakeryShortCode
    {
    }
}

if (!function_exists('slider_container_render_handler'))
{
    function slider_container_render_handler($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'el_class' => ''
        ) , $atts));

        $html = ' <section>
        <div class="' . $el_class . 'swiper h-180 relative mb-24 w-full">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper relative mb-12">
            <!-- Slides -->' . do_shortcode($content) . '</div>
          <!-- If we need pagination -->
          <div class="swiper-pagination"></div>
          </div>
      </section>
      ';

        return $html;
    }
    add_shortcode('slider_container', 'slider_container_render_handler');
}
if (!function_exists('slider_item_render_handler'))
{

    function slider_item_render_handler($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'title' => '',
            'description' => '',
            'color' => '',
            'image' => '',

        ) , $atts));

        $bg_color_style = empty($color) ? '--tw-bg-opacity: 1; background-color: rgb(203 213 225 / var(--tw-bg-opacity));' : 'background-color:' . $color . ';';

        $image_url = empty($image) ? get_template_directory_uri() . '/assets/images/vc/default-team.png' : wp_get_attachment_image_src($image, 'full')[0];

        $bg_image_style = 'background-image: url(' . $image_url . ');';
        $html = '<div
              style="' . $bg_image_style . '"
              class="swiper-slide h-180  relative flex w-full bg-slate-300 bg-cover bg-center bg-no-repeat sm:h-full"
            >
              <div
                style="' . $bg_color_style . '"
                class="lg:mb-20 md:h-102 xl:h-102 absolute bottom-0 left-0 h-auto w-full px-10 text-white sm:h-screen md:-bottom-20 md:w-4/5 md:px-32"
              >
                <h2
                  class="py-16 pb-8 text-2xl font-bold uppercase sm:w-4/5 md:py-12 md:text-5xl"
                >
                  ' . $title . '
                </h2>
                <p class="font-sans-text pb-20 text-lg md:pb-8">
                ' . $description . '
                </p>
              </div>
            </div>';

        return $html;

    }
    add_shortcode('slider_item', 'slider_item_render_handler');
}


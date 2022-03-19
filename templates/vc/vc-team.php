<?php
vc_map(array(
    "name" => __("Team", "terranus") ,
    "base" => "team_item",
    "content_element" => true,
    "category" => __('Terranus Modules', 'terranus') ,
    "as_parent" => array(
        'only' => 'terranus_container'
    ) , // Use only|except attributes to limit child shortcodes (separate multiple values with comma)

    "params" => array(
        // add params same as with any other content element
        

         array(
            "type" => "textfield",
            'admin_label' => false,
            "heading" => __("Heading of Team", "terranus") ,
            "param_name" => "title",
           
            "description" => __("Enter Heading", "terranus")
        ) ,
         array(
            "type" => "attach_image",
            "heading" => __("Team Image", "terranus") ,
            "param_name" => "image",
            
        ) ,
         array(
            "type" => "textarea",
            'admin_label' => false,
            "heading" => __("Team Details", "terranus") ,
            "param_name" => "team_details",
            "description" => __("Enter Team Details", "terranus")
        ) ,
         array(
            "type" => "textfield",
            'admin_label' => false,
            "heading" => __("Heading of Contact", "terranus") ,
           
            "param_name" => "title_contact",
        ) ,

         array(
            "type" => "textfield",
            'admin_label' => false,
            "heading" => __("Left Side Details", "terranus") ,
            "param_name" => "left_details",
        ) ,
         array(
            "type" => "textfield",
            'admin_label' => false,
            "heading" => __("Right Side Details", "terranus") ,
            "param_name" => "right_details",
        ) ,
        
        



    ) ,

));

if (class_exists('WPBakeryShortCode'))
{
    class WPBakeryShortCode_Team_Item extends WPBakeryShortCode
    {
    }
}

if (!function_exists('team_item_render_handler'))
{

    function team_item_render_handler($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'title' => '',
            'image'=> '',
            'team_details' => '',
            'title_contact' => '',
            'left_details' => '',
            'right_details' => '',
            

        ) , $atts));
        
        $image_url = empty($image) ? get_template_directory_uri() . '/assets/images/vc/default-slide.png' : wp_get_attachment_image_src($image, 'full')[0];

        $html ='
        <section class="mx-auto w-2/3 md:container">
        <div class="-mt-14">
        <img src="'.$image_url.'" alt="'.$title.'" class="w-full" />
        </div>
        <div class="inner-container mt-32 mb-36 px-4 md:px-16">
          <div
            class="md:border-l-30 border-terranus-tertiary text-terranus-tertiary mb-24 border-l-4 px-8 md:px-14"
          >
            <h3 class="pt-12 font-sans text-4xl font-bold uppercase">'.$title.'</h3>
            <div class="text-terranus-gray-1 pt-8 pb-14 font-sans text-lg">
            '.$team_details.'
            </div>
          </div>

          <div>
            <h3
              class="text-terranus-tertiary mb-7 pt-12 font-sans text-2xl font-bold uppercase lg:text-4xl"
            >
              '.$title_contact.'
            </h3>

            <div class="grid grid-cols-1 gap-40 lg:grid-cols-2">
              <div class="space-y-9">
                <div class="text-terranus-gray-1 font-sans text-lg font-bold">
                  '.$left_details.'
                </div>
               
              </div>

              <div class="space-y-9">
                <div class="text-terranus-gray-1 font-sans text-lg font-bold">
                '.$right_details.'
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

        ';
        return $html;
    }
    add_shortcode('team_item', 'team_item_render_handler');
}


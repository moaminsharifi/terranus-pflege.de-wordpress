<?php
vc_map(array(
    "name" => __("Last Posts", "terranus") ,
    "base" => "last_posts_item",
    "content_element" => true,
    "category" => __('Terranus Modules', 'terranus') ,
    "params" => array(
        // add params same as with any other content element
        

        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "terranus") ,
            "param_name" => "el_class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "terranus")
        ) ,

    ) ,

));

if (class_exists('WPBakeryShortCode'))
{
    class WPBakeryShortCode_Last_Posts_Item extends WPBakeryShortCode
    {
    }
}

if (!function_exists('last_posts_item_render_handler'))
{

    function last_posts_item_render_handler($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'title' => '',
            'description' => '',
            'white_text' => '',
            'border_color' => ''

        ) , $atts));
        // WP_Query arguments
        $args = array();

        // The Query
        $query = new WP_Query($args);
        $html = '';
        // The Loop
        if ($query->have_posts())
        {
            while ($query->have_posts())
            {
                $query->the_post();
                $tags = get_tags();
                $tags_output = '';
                if (count($tags) >= 1)
                {
                    $tags_output = implode(", ", $tags);

                }

                $html .= '<article
                id="' . the_ID() . '"
              class="blog-single
               col-span-2 mt-4 bg-white last:col-span-2 last:last-single-blog lg:col-span-1 xl:last:mx-10 xl:first:ml-10 xl:first:mr-0 xl:ml-0 xl:mr-10"
            >
              <header>
                <img
                  src="' . get_the_post_thumbnail_url(get_the_ID() , 'full') . '"
                  
                  alt="' . get_the_title() . '"
                />
              </header>

              <section class="px-6 pt-4">
                <div class="meta">
                  <span class="text-terranus-gray-1 text-xs leading-loose">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="text-terranus-orange-1 inline h-4 w-4"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"
                      />
                    </svg>
                    ' . $tags_output . '
                  </span>
                </div>
                <div class="content pt-4">
                  <h3 class="text-terranus-orange-1 mb-2 text-xl">
                    ' . get_the_title() . '
                  </h3>
                  <p class="text-terranus-gray-1 text-lg">
                    ' . get_the_excerpt() . '
                  </p>
                </div>
              </section>
              <footer class="px-6 pt-4 pb-8">
                <a
                  href="' . the_permalink() . '"
                  class="text-terranus-orange-1 border-terranus-orange-1 border-1 border py-3 px-8 text-lg lg:float-right"
                >
                  mehr
                </a>
                <div class="lg:clear-both"></div>
              </footer>
            </article>';
            }
        }
        else
        {
            // no posts found
            
        }

        return $html;

    }
    add_shortcode('last_posts_item', 'last_posts_item_render_handler');
}


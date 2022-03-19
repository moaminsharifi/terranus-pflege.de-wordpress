<?php
vc_map([
    "name" => __("Last Posts", "terranus"),
    "base" => "last_posts_with_bg_item",
    "content_element" => true,
    "category" => __("Terranus Modules", "terranus"),
    "params" => [
        // add params same as with any other content element
        [
            "type" => "textfield",
            "admin_label" => false,
            "heading" => __("Heading", "terranus"),
            "param_name" => "title",
            "description" => __("Enter Heading", "terranus"),
        ],

        [
            "type" => "colorpicker",
            "heading" => __("Background Color", "terranus"),
            "param_name" => "bg_color",
            "description" => __("Set color of background", "terranus"),
        ],
    ],
]);

if (class_exists("WPBakeryShortCode")) {
    class WPBakeryShortCode_Last_Posts_With_Bg_Item extends WPBakeryShortCode
    {
    }
}

if (!function_exists("last_posts_with_bg_item_render_handler")) {
    function last_posts_with_bg_item_render_handler($atts, $content = null)
    {
        extract(
            shortcode_atts(
                [
                    "title" => "",
                    "bg_color" => "",
                ],
                $atts
            )
        );

        $bg_color_style = empty($bg_color)
            ? "--tw-bg-opacity: 1; background-color: rgb(210 0 115 / var(--tw-bg-opacity));"
            : "background-color:" . $bg_color . ";";
        $articles = "";
        $count = 3;
        $post_holder = 0;

        // WP_Query arguments
        $args = [
            "nopaging" => false,
            "posts_per_page" => "3",
        ];

        // The Query
        $query = new WP_Query($args);

        if ($query->have_posts()) {
            while ($query->have_posts() || $post_holder < $count) {
                $post_holder++;
                $query->the_post();
                $categories = get_categories();
                $categories_array = [];
                foreach ($categories as $category) {
                  $categories_array[] = $category->name;
                }
                $categories_output = implode(", ",$categories_array);

                
                $articles .=
                    '<article
              
              class="blog-single last:last-single-blog col-span-2 mt-4 bg-white last:col-span-2 lg:col-span-1"
            >
              <header>
                <img
                  src="' .
                    get_the_post_thumbnail_url(get_the_ID(), "full") .
                    '"
                  
                  alt="' .
                    get_the_title() .
                    '"
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
                    ' .
                    $categories_output .
                    '
                  </span>
                </div>
                <div class="content pt-4">
                  <h3 class="text-terranus-orange-1 mb-2 text-xl">
                    ' .
                    get_the_title() .
                    '
                  </h3>
                  <div class="text-terranus-gray-1 text-lg">
                    ' .
                    get_the_excerpt() .
                    '
                  </div>
                </div>
              </section>
              <footer class="px-6 pt-4 pb-8">
                <a
                  href="' .
                    get_the_permalink() .
                    '"
                  class="text-terranus-orange-1 border-terranus-orange-1 border-1 border py-3 px-8 text-lg lg:float-right"
                >
                  mehr
                </a>
                <div class="lg:clear-both"></div>
              </footer>
            </article>';
            }
        } else{
  $articles .= '<h2 class="my-7 font-sans text-xl font-bold uppercase text-white">
              No posts found!
            </h2>';
}

        $html =
            '
        <section  style="' .
            $bg_color_style .
            '" class=" pb-56">
        <div class="pt-26 mx-auto w-2/3 md:container">
        <div class="2xl:px-[4.125rem]">
          <h2 class="font-sans text-xl font-bold uppercase leading-normal text-white md:text-4xl">
           ' .
            $title .
            '
          </h2>
          <div class="blog pt-15 grid grid-cols-2 gap-2 md:grid-cols-2 lg:gap-6">
          ' .
            $articles .
            '
        </div>
        </div>
        </div>
        </section>';
        return $html;
    }
    add_shortcode(
        "last_posts_with_bg_item",
        "last_posts_with_bg_item_render_handler"
    );
}

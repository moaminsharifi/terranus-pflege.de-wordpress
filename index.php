
<? get_header(); ?>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <?php get_template_part( 'templates/site-navbar', 'site-navbar' ); ?>
    <main>
    <?php get_template_part( 'templates/site-navigation-nav', 'site-navigation-nav' ); ?>
    <?php get_template_part( 'templates/content-filter', 'content-filter' ); ?>

     <div class="content">
         <?php
         $articles = "";
        $count = 3;
        $post_holder = 0;

         $articles = '';
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
                $tags = get_tags();
                $tags_array = [];
                foreach ($tags as $tag) {
                  $tags_array[] = $tag->name;
                }
                $tags_output = implode(", ",$tags_array);

                
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
                    $tags_output .
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
        } else {
            // no posts found
            $articles .= '<h2 class="my-7 font-sans text-xl font-bold uppercase text-white">
              No posts found!
            </h2>';
        }
        $html =
            '
        <section class="bg-terranus-green pb-56">
        <div class="pt-26 mx-auto w-2/3 md:container">
        <div class="2xl:px-[4.125rem]">
          <h2 class="font-sans text-xl font-bold uppercase leading-normal text-white md:text-4xl">
           Aktuelles/Wissenswert
          </h2>
          <div class="blog pt-15 grid grid-cols-2 gap-2 md:grid-cols-2 lg:gap-6">
          ' .
            $articles .
            '
        </div>
        </div>
        </div>
        </section>';
        echo $html;
		?>

     </div>

<?php wp_footer(); ?>
<? get_footer(); ?>

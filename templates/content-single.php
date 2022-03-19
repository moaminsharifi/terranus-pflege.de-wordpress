<?php 
$categories = get_categories();
$categories_array = [];
foreach ($categories as $category) {
    $categories_array[] = $category->name;
}
$categories_output = implode(", ",$categories_array);


$tags = get_tags();
$tags_array = [];
foreach ($tags as $tag) {
  $tags_array[] = $tag->name;
}
$tags_output = implode("  ",$tags_array);


?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <section class="single-blog">
    <div class="mx-auto w-2/3 py-36 md:container">
      <div class="blog-heading grid-row-1 mb-8 grid grid-cols-12">
        <?php the_title( '<h1 class="text-terranus-green md:text-blogHeading col-span-8 font-sans text-2xl font-bold uppercase leading-10 md:col-span-10" >', '</h1>' ); ?>

        <div class="col-span-4 flex flex-row space-x-5 md:col-span-2">
          <div class="border-terranus-green bg-terranus-green h-8 w-[5px] border px-[1px]"></div>
          <div class="border-terranus-green h-8 w-[5px] border px-[1px]"></div>
          <div class="border-terranus-green h-8 w-[5px] border px-[1px]"></div>
          <div class="border-terranus-green h-8 w-[5px] border px-[1px]"></div>
        </div>
      </div>
      <div class="single-excerpt text-terranus-gray-1 font-sans-text mb-12 text-xl md:text-lg">
        <?php the_excerpt('<p>', '</p>'); ?>
      </div>
      <hr class="bg-terranus-gray-1 border-t bg-opacity-25" />
      <div
        class="meta flex flex-col items-start justify-start space-y-3 py-5 md:flex-row md:space-y-0 md:space-x-[1.68rem]">
        <div
          class="category-meta border-terranus-gray-1 space-x-2.5 border-b border-opacity-30 pb-4 pr-5 md:border-b-0 md:border-r md:pb-0">
          <svg xmlns="http://www.w3.org/2000/svg" class="text-terranus-orange-1 my-auto inline h-2.5 w-2.5" fill="none"
            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
          </svg>
          <span class="text-terranus-gray-1 text-sm md:text-[10px]"><?php echo $categories_output ?></span>
        </div>
        <div
          class="date-meta border-terranus-gray-1 space-x-2.5 border-b border-opacity-30 pb-4 pr-5 md:border-b-0 md:border-r md:pb-0">
          <svg xmlns="http://www.w3.org/2000/svg" class="text-terranus-orange-1 my-auto inline h-2.5 w-2.5" fill="none"
            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg>
          <span class="text-terranus-gray-1 text-sm md:text-[10px]"><?php echo get_the_date('d.m.y'); ?></span>
        </div>
        <div class="date-meta space-x-2.5 pb-4 pr-5 md:pb-0">
          <svg xmlns="http://www.w3.org/2000/svg" class="text-terranus-orange-1 my-auto inline h-2.5 w-2.5" fill="none"
            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
          </svg>
          <span class="text-terranus-gray-1 text-sm md:text-[10px]">E-Mail</span>
        </div>
      </div>
      <div class="single-image py-10">
        <img src="<?php get_the_post_thumbnail_url(get_the_ID(), "full") ?>" alt="<?php get_the_title() ?>"
          class="h-auto w-full" />
      </div>
    </div>
  </section>
  <?php the_content(); ?>
  <section class="single-blog-tags">
    <div class="py-18 mx-auto w-2/3 md:container">
      <h2 class="text-terranus-gray-1 mb-8 font-sans text-4xl font-bold uppercase">
        TAGS
      </h2>
      <div class="text-terranus-gray-1 font-sans-text space-y-8 text-lg">
        <p>
          <?php echo $tags_output; ?>
        </p>
      </div>
    </div>
  </section>

  <section class="single-blog-author">
    <div class="py-18 mx-auto w-2/3 md:container">
      <div
        class="md:border-l-30 2xl:pl-15 2xl:pr-22.5 border-terranus-secondary-2 text-terranus-gray-1 border-l-4 px-8">
        <h3 class="text-terranus-secondary-2 pt-6 font-sans text-2xl font-bold uppercase md:text-4xl">
          TERRANUS Deutschlandkarte
        </h3>
        <p class="font-sans-text pt-6 pb-14 text-lg">
          Sie haben Fragen oder benötigen einen spezialisierten
          Transaktionsberater? Nehmen Sie Kontakt mit uns auf!
        </p>
        <div class="flex flex-col space-x-0 md:flex-row md:space-x-12">
          <img src="<?php echo get_template_directory_uri() . '/assets/images/consulting.jpg'; ?>"
            alt="Markus Bienentreu" class="h-auto w-full md:h-36 md:w-28" />

          <div class="pt-5">
            <h6 class="font-sans-text text-lg font-bold">
              Markus Bienentreu
            </h6>
            <p class="font-sans-text w-2/3 text-lg">
              Geschäftsführung Fon +49 221 / 93 700 700 Fax +49 221 / 93 700
              777 markus.bienentreu@terranus.de
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php
$articles = '';
$args = [
  "nopaging" => false,
  "posts_per_page" => "4",
];
$query = new WP_Query($args);
if ($query->have_posts()) {
            while ($query->have_posts()){
              $query->the_post();
                $categories = get_categories();
                $categories_array = [];
                foreach ($categories as $category) {
                  $categories_array[] = $category->name;
                }
                $categories_output = implode(", ",$categories_array);
                $post_image = get_the_post_thumbnail_url(get_the_ID(), "full");
                $post_image = empty($post_image) ? get_template_directory_uri() . '/assets/images/vc/default-blog-wide.png' : $post_image;
    
                
                $articles .='
                <article
                class="blog-single last:last-single-blog col-span-2 mt-4 bg-white lg:col-span-1"
              >
                <header>
                  <img src="'.$post_image.'" alt="'. get_the_title() .'" />
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
                      '.$categories_output.'
                    </span>
                  </div>
                  <div class="content pt-4">
                    <h3 class="text-terranus-orange-1 mb-2 text-xl font-bold">
                      '.get_the_title().'
                    </h3>
     
                  </div>
                </section>
                <footer class="px-6 pt-4 pb-8">
                  <a
                    href="'.get_the_permalink().'"
                    class="text-terranus-orange-1 border-terranus-orange-1 border-1 border py-3 px-8 text-lg lg:float-right"
                  >
                    mehr
                  </a>
                  <div class="lg:clear-both"></div>
                </footer>
              </article>
              ';
            }
          }
else{
  $articles .= '<h2 class="my-7 font-sans text-xl font-bold uppercase text-white">
              No posts found!
            </h2>';
}
?>
  <section class="bg-terranus-secondary-3 pb-56">
    <div class="pt-26 mx-auto w-2/3 md:container">
      <div class="2xl:px-[4.125rem]">
        <h2 class="font-sans text-xl font-bold uppercase leading-normal text-white md:text-4xl">
          TOP ARTIKEL
        </h2>
        <div class="blog pt-15 grid grid-cols-2 gap-2 md:grid-cols-2 lg:gap-6">
          <?php echo $articles; ?>
        </div>
      </div>
    </div>
  </section>

  <section class="mx-auto w-2/3 md:container">
    <div class="inner-container mt-44 mb-3 px-4 md:px-16">
      <div>
        <h3 class="text-terranus-green mb-7 font-sans text-2xl font-bold uppercase md:text-4xl lg:text-4xl">
          Ansprechpartner
        </h3>

        <div class="grid grid-cols-1 gap-40 lg:grid-cols-2">
          <div class="space-y-9">
            <div>
              <h6 class="font-sans-text text-lg font-bold">
                Anja Sakwe Nakonji
              </h6>
              <p class="font-sans-text text-lg">
                Geschäftsführung Fon +49 221 / 93 700 700 Fax +49 221 / 93
                700 777 Anja.SakweNakonji@terranus.de
              </p>
            </div>
            <div>
              <h6 class="font-sans-text text-lg font-bold">
                TERRANUS GmbH
              </h6>
              <p class="font-sans-text text-lg">
                Cäcilienkloster 6, D-50676 Köln
              </p>
            </div>
          </div>

          <div class="space-y-9">
            <div>
              <h6 class="font-sans-text text-lg font-bold">
                Markus Bienentreu
              </h6>
              <p class="font-sans-text text-lg">
                Geschäftsführung Fon +49 221 / 93 700 700 Fax +49 221 / 93
                700 777 markus.bienentreu@terranus.de
              </p>
            </div>
            <div>
              <p class="font-sans-text text-lg">
                Aufsichtsratsvorsitzender: Carsten Brinkmann
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-20 pt-3">
        <h3 class="text-terranus-green mb-7 font-sans text-2xl font-bold uppercase md:text-4xl lg:text-4xl">
          Wir sind Mitglied
        </h3>
        <div class="px-12 md:px-20 lg:px-[169px] mx-auto">
              <div class="grid grid-cols-1 gap-4 md:grid-cols-3 lg:gap-[3.75rem]">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/vendor-logo.png" class="w-full  md:h-18.5" alt="Vendor">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/vendor-logo.png" class="w-full  md:h-18.5" alt="Vendor">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/vendor-logo.png" class="w-full  md:h-18.5" alt="Vendor">
              </div>
            </div>
      </div>
    </div>
  </section>
</article>
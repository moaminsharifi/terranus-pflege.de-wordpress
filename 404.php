
<? get_header(); ?>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <?php get_template_part( 'templates/site-navbar', 'site-navbar' ); ?>
    <main>
    <?php get_template_part( 'templates/site-navigation-nav', 'site-navigation-nav' ); ?>
    <?php get_template_part( 'templates/content-filter', 'content-filter' ); ?>

     <div class="content">
         <?php
        
        $html =
            '
        <section class="bg-terranus-green pb-56">
        <div class="pt-26 mx-auto w-2/3 md:container">
        <div class="2xl:px-[4.125rem]">
          <h2 class="font-sans text-xl font-bold uppercase leading-normal text-white md:text-4xl">
          
          </h2>
          <div class="blog pt-15 grid grid-cols-2 gap-2 md:grid-cols-2 lg:gap-6">
          <h2 class="my-7 font-sans text-xl font-bold uppercase text-white">
             Page not Found
            </h2>
        </div>
        </div>
        </div>
        </section>';
        echo $html;
		?>

     </div>

<?php wp_footer(); ?>
<? get_footer(); ?>

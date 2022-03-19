
<? get_header(); ?>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <?php get_template_part( 'templates/site-navbar', 'site-navbar' ); ?>
    <?php


		if ( have_posts() ) {

			// Load posts loop.
			while ( have_posts() ) {
				the_post();
                

                get_template_part( 'templates/content-single', 'single' ); 
				
			}



		}
		
        

    ?>
   



<?php wp_footer(); ?>
<? get_footer(); ?>

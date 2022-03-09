
<? get_header(); ?>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <?php get_template_part( 'templates/site-navbar', 'site-navbar' ); ?>
    <main>
    <?php get_template_part( 'templates/site-navigation-nav', 'site-navigation-nav' ); ?>
    <?php get_template_part( 'templates/content-filter', 'content-filter' ); ?>

     <div class="content">
         <?php
		if ( have_posts() ) {

			// Load posts loop.
			while ( have_posts() ) {
				the_post();
                get_template_part( 'templates/content-summary', 'content-summary' ); 
				
			}



		}
		?>

     </div>

<?php wp_footer(); ?>
<? get_footer(); ?>

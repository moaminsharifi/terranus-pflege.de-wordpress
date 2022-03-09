<?php /* Template Name: Events Archive */ ?>

<? get_header(); ?>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <?php get_template_part( 'templates/site-navbar', 'site-navbar' ); ?>
    <main>
        <?php get_template_part( 'templates/site-navigation-nav', 'site-navigation-nav' ); ?>
        <?php get_template_part( 'templates/event-filter', 'event-filter' ); ?>

        <div class="content">
            

            <?php



		$args = array(
        'post_type'              => array( 'event' ),
        'post_status'            => array( 'publish' ),
        'nopaging'               => false,
        'posts_per_page'         => '20',
        );
        

        // The Query
        $eventQuery = new WP_Query( $args );
        
        // The Loop
        if ( $eventQuery->have_posts() ) {
            while ( $eventQuery->have_posts() ) {
                $eventQuery->the_post();
                get_template_part( 'templates/content-event-summary', 'content-event-summary' );
            }
        } else {
            // no posts found
        }

        // Restore original Post Data
        wp_reset_postdata();
		?>

        </div>

        <?php wp_footer(); ?>
        <? get_footer(); ?>
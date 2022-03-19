<?php /* Template Name: Full Width */ ?>


<? get_header(); ?>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <?php get_template_part( 'templates/site-navbar', 'site-navbar' ); ?>
    <main>



     <div class="content">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();       
            the_content(); // displays whatever you wrote in the wordpress editor
        endwhile; endif; //ends the loop
        ?>

     </div>

<?php wp_footer(); ?>
<? get_footer(); ?>

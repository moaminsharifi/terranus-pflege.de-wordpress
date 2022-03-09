<?php
/**
 * Terranus Theme
 *
 * @link https: //www.elancer-team.de/
 *
 * @package Terranus Theme
 * @subpackage Terranus_Theme
 * @since Terranus Theme 0.1
 */

/**
 * Load theme styles and scripts
 */
function terranus_theme_scripts()
{
    
    // wp_enqueue_style( 'vc-style', get_theme_file_uri( '/assets/css/vc.css' ), array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style('terranus-style', get_theme_file_uri('/assets/css/style.css') , array() , wp_get_theme()->get('Version'));
    wp_enqueue_style('swiper-style', get_theme_file_uri('/assets/css/swiper-bundle.min.css') , array() , '8.0.6');
    

    wp_enqueue_script('jquery-scripts', get_theme_file_uri('/assets/js/jquery.min.js') , array() , "1.9.1", true);
    wp_enqueue_script('swiper-scripts', get_theme_file_uri('/assets/js/swiper-bundle.min.js') , array() , '8.0.6', true);
    wp_enqueue_script('terranus-scripts', get_theme_file_uri('/assets/js/scripts.js') , array() , wp_get_theme()
        ->get('Version') , true);

}
add_action('wp_enqueue_scripts', 'terranus_theme_scripts');
/**
 * Load google font
 */
function wpb_add_google_fonts()
{

    wp_enqueue_style('wpb-google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;700&family=Roboto:ital,wght@0,400;0,700;1,400&display=swap', false);

}

add_action('wp_enqueue_scripts', 'wpb_add_google_fonts');

/**
 * Load Font Awesome
 */
function wpb_add_fontawesome()
{

    wp_enqueue_style('fontawesome-style', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css', array() , '6.0.0');
    wp_enqueue_script('fontawesome-scripts', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js', array() , '6.0.0', true);
}

add_action('wp_enqueue_scripts', 'wpb_add_fontawesome');

/*
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
*/
add_theme_support('title-tag');
// Custom Menu support
function custom_new_menu()
{
    register_nav_menus(array(
        'main-menu' => __('Main Menu') ,
        'footer-menu' => __('Footer Menu')
    ));
}
add_action('init', 'custom_new_menu');

function add_menu_link_class($atts, $item, $args)
{
    if (property_exists($args, 'link_class'))
    {
        $atts['class'] = $args->link_class;
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);

if (defined('WPB_VC_VERSION'))
{
    // with containers
    require_once (get_template_directory() . '/templates/vc/vc-container.php');
    require_once (get_template_directory() . '/templates/vc/vc-image-card.php');
    require_once (get_template_directory() . '/templates/vc/vc-accordion.php');
    require_once (get_template_directory() . '/templates/vc/vc-info-card.php');
    require_once (get_template_directory() . '/templates/vc/vc-slider.php');

    // single
    require_once (get_template_directory() . '/templates/vc/vc-backquote.php');
    require_once (get_template_directory() . '/templates/vc/vc-backquote-with-bg.php');
    require_once (get_template_directory() . '/templates/vc/vc-last-posts-with-bg.php');
    require_once (get_template_directory() . '/templates/vc/vc-team.php');
    
    // require_once (get_template_directory() . '/templates/vc/vc-last-posts.php');

}


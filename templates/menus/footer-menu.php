<?php
$footerMenu = array(
    'theme_location' => 'footer-menu',
    'menu' => '',
    'container' => '',
    'container_class' => false,
    'container_id' => '',
    'menu_class' => 'menu',
    'menu_id' => 'main-menu',
    'echo' => false,
    'fallback_cb' => 'wp_page_menu',
    'before' => '',
    'after' => '',
    'link_before' => '',
    'link_after' => '',
    'depth' => 0,
    'walker' => '',
    'link_class' => 'text-md md:text-2xl lg:text-base',
);
echo strip_tags(wp_nav_menu($footerMenu) , '<a>');

?>

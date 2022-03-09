<?php
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
  "name" => __("Your Gallery", "my-text-domain"),
  "base" => "your_gallery",
  "as_parent" => array('only' => 'single_img'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
  "content_element" => true,
  "show_settings_on_create" => false,
  "is_container" => true,
   "category" => __( 'Terranus Modules', 'terranus'),  
  "params" => array(
  // add params same as with any other content element
  array(
  "type" => "textfield",
  "heading" => __("Extra class name", "my-text-domain"),
  "param_name" => "el_class",
  "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "my-text-domain")
  )
  ),
  "js_view" => 'VcColumnView'
) );
vc_map( array(
  "name" => __("Gallery Image", "my-text-domain"),
  "base" => "single_img",

  "content_element" => true,
  "as_child" => array('only' => 'your_gallery'), // Use only|except attributes to limit parent (separate multiple values with comma)
  "params" => array(
  // add params same as with any other content element
  array(
  "type" => "textfield",
  "heading" => __("Extra class name", "my-text-domain"),
  "param_name" => "el_class",
  "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "my-text-domain")
  )
  )
) );
//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
  class WPBakeryShortCode_Your_Gallery extends WPBakeryShortCodesContainer {
  }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
  class WPBakeryShortCode_Single_Img extends WPBakeryShortCode {
  }
}
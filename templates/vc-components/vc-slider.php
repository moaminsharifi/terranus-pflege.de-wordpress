<?php 
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
  "name" => __("Terranus Slider", "terranus"),
  "base" => "terranus_slider",
  "as_parent" => array('only' => 'terranus_single_slide'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
  "content_element" => true,
  "show_settings_on_create" => false,
  "is_container" => true,
  "params" => array(
  // add params same as with any other content element
    array(
    "type" => "textfield",
    "heading" => __("Extra class name", "terranus"),
    "param_name" => "el_class",
    "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "terranus")
    ),
    array(
    "type" => "colorpicker",
    "heading" => __("Set Default color", "terranus"),
    "param_name" => "bg_color",
    "description" => __("If do you want to change default background color, Use this field.", "terranus")
    )
  ),
  "js_view" => 'VcColumnView'
) );
vc_map( array(
  "name" => __("Terranus Slide", "terranus"),
  "base" => "terranus_single_slide",
  "content_element" => true,
  "as_child" => array('only' => 'terranus_slider'), // Use only|except attributes to limit parent (separate multiple values with comma)
  "params" => array(
  // add params same as with any other content element
    array(
    "type" => "textfield",
    "heading" => __("Title", "terranus"),
    "param_name" => "slide_title",
    "description" => __("Enter title of slide", "terranus")
    ),

    array(
    "type" => "textarea",
    "heading" => __("Description", "terranus"),
    "param_name" => "slide_desc",
    "description" => __("Enter description of slide", "terranus")
    ),

    array(
    "type" => "attach_image",
    "heading" => __("Background Image", "terranus"),
    "param_name" => "slide_image",
    "description" => __("Select Slide Image", "terranus")
    ),
  )
) );
//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
  class WPBakeryShortCode_Terranus_Slider extends WPBakeryShortCodesContainer {
  }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
  class WPBakeryShortCode_Terranus_Single_Slide extends WPBakeryShortCode {
  }
}
// new WPBakeryShortCode_Terranus_Slider();
// new WPBakeryShortCode_Terranus_Single_Slide();
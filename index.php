<?php
/**
* Plugin Name: Slider Carousel
* Description: A slider section
* Version: 1.0
* Author: Mitchy Bs
*/
define( 'MB_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once(MB_PLUGIN_DIR . 'cmb2/init.php');

function mb_add_slider_post_type() {
  $args = array(
  'labels' => array(  'name' => __( 'Slides' ), 'singular_name' => __( 'Slide' ) ),
  'public' => true,
  'supports' => array('title', 'editor', 'revisions', 'thumbnail', 'revisions'),
  'has_archive' => true,
  'hierarchical' => true,
  'taxonomies' => array('sliders'),
  );
  register_post_type( 'slide', $args);
}

add_action( 'init', 'mb_add_slider_post_type' );

function mb_add_slider_taxonomy() {
	// create a new taxonomy
	register_taxonomy(
		'sliders',
		'slide',
		array(
			'label' => __( 'Sliders' ),
			'rewrite' => array( 'slug' => 'sliders' ),
		)
	);
}
add_action( 'init', 'mb_add_slider_taxonomy' );

function getSlider($id = 0, $template = 'slider.php') {
  if(file_exists(get_template_directory() . '/slider/' . $template)) {
    include(get_template_directory() . '/slider/' . $template);
  } elseif(file_exists(MB_PLUGIN_DIR . 'templates/' . $template)) {
    include(MB_PLUGIN_DIR . 'templates/' . $template);
  } else {
    echo 'Error: file does not exists';
  }
}

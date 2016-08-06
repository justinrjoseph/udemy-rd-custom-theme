<?php

function enqueue_assets() {
  wp_enqueue_script('bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'));
  wp_enqueue_style('bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
  wp_enqueue_style('google-font', '//fonts.googleapis.com/css?family=Montserrat:400,700');
  wp_enqueue_style('custom-theme-style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'enqueue_assets');

function setup() {
  register_nav_menus(array(
    'primary' => __('Primary Menu', 'custom-theme')
  ));
  
  add_theme_support('title-tag');
}

add_action('after_setup_theme', 'setup');

function custom_theme_widgets() {
  register_sidebar(array(
    'name'          => __('Sidebar', 'custom-theme'),
    'id'            => 'sidebar-1',
    'description'   => __('Add widgets here to appear in the sidebar.', 'custom-theme'),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>'
  ));
}

add_action('widgets_init', 'custom_theme_widgets');

if ( !function_exists('custom_shortcode') ) {
  function custom_shortcode($attrs, $content = null) {
    return '<div class="col-sm-4">' . $content . '</div>';
  }
}

add_shortcode('one-third', 'custom_shortcode');

// prevents WordPress from auto-converting carriage returns into p tags
//remove_filter('the_content', 'wpautop');

?>
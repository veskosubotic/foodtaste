<?php

function foodtaste_resources(){

  wp_enqueue_style('style', get_stylesheet_uri());

  wp_register_style('flexboxgrid', get_template_directory_uri() . '/css/flexboxgrid.css');

  wp_enqueue_style('flexboxgrid');

  wp_register_style('fancySelect', get_template_directory_uri() . '/css/fancySelect.css');

  wp_enqueue_style('fancySelect');

  wp_register_style('CustomScrollBar', get_template_directory_uri() . '/css/jquery.mCustomScrollbar.css');

  wp_enqueue_style('CustomScrollBar');

  wp_register_style('Slider', get_template_directory_uri() . '/css/slick.css');

  wp_enqueue_style('Slider');

  wp_register_style('SliderTheme', get_template_directory_uri() . '/css/slick-theme.css');

  wp_enqueue_style('SliderTheme');

  wp_enqueue_script( 'jquery-2.0.2', get_template_directory_uri(). '/js/jquery-2.0.2.min.js', array( 'jquery' ), '2.0.2', true );

  wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array( 'jquery' ), '3.1.1', true );

  wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '1.0.0', true );

  wp_enqueue_script( 'fancySelect', get_template_directory_uri() . '/js/fancySelect.js', array( 'jquery' ), '1.0.0', true );

  wp_enqueue_script( 'CustomScrollBar', get_template_directory_uri() . '/js/jquery.mCustomScrollbar.concat.min.js', array( 'jquery' ), '1.0.0', true );

  wp_enqueue_script( 'Slider', get_template_directory_uri() . '/js/slick.js', array( 'jquery' ), '1.0.0', true );

  wp_enqueue_script( 'maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyC7kHlNWnwCQmBr1kZYZ7LbHgXQSpK_XK0&callback=initMap', array( 'jquery' ), '3.1.1', true );

  wp_enqueue_script( 'validate', 'https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js', array( 'jquery' ), '3.1.1', true );

  wp_enqueue_script( 'recaptcha', 'https://www.google.com/recaptcha/api.js', array( 'jquery' ), '3.1.1', true );

}

add_action('wp_enqueue_scripts', 'foodtaste_resources');

// Navigation Menu

register_nav_menus(array(
  'primary' => __('Primary Menu'),
));

// Customize Appearance Options

function foodTaste_customize_register( $wp_customize){

  $wp_customize->add_setting('ft_button_color', array(
    'default' => '#33C243',
    'transport' => 'refresh',
  ));

  $wp_customize->add_setting('ft_nav_link_color', array(
    'default' => '#fff',
    'transport' => 'refresh',
  ));

  $wp_customize->add_setting('ft_nav_link_hover_color', array(
    'default' => '#000',
    'transport' => 'refresh',
  ));

  $wp_customize->add_setting('ft_submit_recipe_color', array(
    'default' => '#000',
    'transport' => 'refresh',
  ));


  $wp_customize->add_section('ft_standard_colors', array(
    'title' => __('Standar Colors', 'FoodTaste'),
    'priority' => 30,
  ));

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ft_button_color_control', array(
    'label' => __('Color', 'FoodTaste'),
    'section' => 'ft_standard_colors',
    'settings' => 'ft_button_color',
  )));

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ft_submit_recipe_color_control', array(
    'label' => __('Submit Recipe Button', 'FoodTaste'),
    'section' => 'ft_standard_colors',
    'settings' => 'ft_submit_recipe_color',
  )));

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ft_nav_link_color_control', array(
    'label' => __('Navigation Link Color', 'FoodTaste'),
    'section' => 'ft_standard_colors',
    'settings' => 'ft_nav_link_color',
  )));

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ft_nav_link_hover_control', array(
    'label' => __('Navigation Link Hover Color', 'FoodTaste'),
    'section' => 'ft_standard_colors',
    'settings' => 'ft_nav_link_hover_color',
  )));
}

add_action('customize_register', 'foodTaste_customize_register');

// Output Customize CSS

function foodTaste_customize_css(){
  ?>
  <style type="text/css">
  button{
    background: <?php echo get_theme_mod('ft_button_color'); ?>;
  }

  .find-recipes-background{
    background: <?php echo get_theme_mod('ft_button_color'); ?>;
  }

  #line-recent-recipes{
    border-top: 2px double <?php echo get_theme_mod('ft_button_color'); ?>;
  }

  input[name="submit-your-recipe"]{
    background: <?php echo get_theme_mod('ft_button_color'); ?>;
  }

  header .fa-user{
    color: <?php echo get_theme_mod('ft_button_color'); ?>;
  }

  .navigation-bar{
    background: <?php echo get_theme_mod('ft_button_color'); ?>;
  }

  #submit-recipe-button:hover{
    background: <?php echo get_theme_mod('ft_button_color'); ?>;
  }

  .searchbox{
    background: <?php echo get_theme_mod('ft_button_color'); ?>;
  }

  .chef-name hr{
    border-top: 2px double <?php echo get_theme_mod('ft_button_color'); ?>;
  }

  .contact hr{
    border-top: 2px double <?php echo get_theme_mod('ft_button_color'); ?>;
  }

  #chefs hr{
    border-top: 2px double <?php echo get_theme_mod('ft_button_color'); ?>;
  }

  #showcase span{
    background: <?php echo get_theme_mod('ft_button_color'); ?>;
  }

  .description2 hr{
    border-top: 2px double <?php echo get_theme_mod('ft_button_color'); ?>;
  }

  .fa-cutlery{
    color: <?php echo get_theme_mod('ft_button_color'); ?>;
  }

  .fa-sign-out{
    color: <?php echo get_theme_mod('ft_button_color'); ?>;
  }

  .focus{
    border-bottom: 2px solid <?php echo get_theme_mod('ft_button_color'); ?>;
  }

  #latest-recipes hr{
    border-top: 2px double <?php echo get_theme_mod('ft_button_color'); ?>;
  }

  #submit-recipe-button{
    background: <?php echo get_theme_mod('ft_submit_recipe_color'); ?>;
  }

  #navbar a {
    color: <?php echo get_theme_mod('ft_nav_link_color'); ?>;
  }

  #navbar a:hover {
    color: <?php echo get_theme_mod('ft_nav_link_hover_color'); ?>;
  }

</style>
<?php
}

add_action('wp_head', 'foodTaste_customize_css');

// FoodTaste Recipe-of-day Content

function ft_recipe_of_day($wp_customize){
  $wp_customize->add_section('ft-recipe-of-day-section', array(
    'title' => 'My Recipes'
  ));

  $wp_customize->add_setting('ft-recipe-of-day-display', array(
    'default' => 'No'
  ));

  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'ft-recipe-of-day-display-control', array(
    'label' => 'Display this section?',
    'section' => 'ft-recipe-of-day-section',
    'settings' => 'ft-recipe-of-day-display',
    'type' => 'select',
    'choices' => array('No' => 'No', 'Yes' => 'Yes')
  )));

  $wp_customize->add_setting('ft-recipe-of-day-headline', array(
    'default' => 'Example Headline Text!'
  ));

  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'ft-recipe-of-day-headline-control', array(
    'label' => 'Headline',
    'section' => 'ft-recipe-of-day-section',
    'settings' => 'ft-recipe-of-day-headline'
  )));

  $wp_customize->add_setting('ft-recipe-of-day-text', array(
    'default' => 'Example paragraph text!'
  ));

  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'ft-recipe-of-day-text-control', array(
    'label' => 'Text',
    'section' => 'ft-recipe-of-day-section',
    'settings' => 'ft-recipe-of-day-text',
    'type' => 'textarea'
  )));

  $wp_customize->add_setting('ft-recipe-of-day-link');

  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'ft-recipe-of-day-link-control', array(
    'label' => 'Link',
    'section' => 'ft-recipe-of-day-section',
    'settings' => 'ft-recipe-of-day-link',
    'type' => 'dropdown-pages'
  )));

  $wp_customize->add_setting('ft-recipe-of-day-image');

  $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'ft-recipe-of-day-image-control', array(
    'label' => 'Image',
    'section' => 'ft-recipe-of-day-section',
    'settings' => 'ft-recipe-of-day-image',
    'width' => '757',
    'height' => '411'

  )));


}
add_action('customize_register', 'ft_recipe_of_day');
?>

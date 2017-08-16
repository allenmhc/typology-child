<?php 

/* 
        This is Typology Child Theme functions file
        You can use it to modify specific features and styling of Gridlove Theme
*/      

add_action( 'after_setup_theme', 'typology_child_theme_setup', 99 );

function typology_child_theme_setup(){
  add_action('wp_enqueue_scripts', 'typology_child_load_scripts');
}

function typology_child_load_scripts() {        
  wp_register_style('typology_child_style', trailingslashit(get_stylesheet_directory_uri()).'style.css', false, TYPOLOGY_THEME_VERSION, 'screen');
  wp_register_style('typology_child_app_style', trailingslashit(get_stylesheet_directory_uri()).'assets/css/app.css', false, TYPOLOGY_THEME_VERSION, 'screen');
  wp_enqueue_style('typology_child_style');
  wp_enqueue_style('typology_child_app_style');
}

/**
 * Get branding
 *
 * Returns HTML of logo or website title based on theme options
 *
 * @param string  $element ID of an element to check
 * @return string HTML
 * @since  1.0
 */

function typology_get_branding() {

  global $typology_h1_used;

  $svg_logo_url = get_stylesheet_directory_uri().'/assets/images/logo.svg';
  $brand = '<img class="typology-logo-child" src="'.esc_url($svg_logo_url).'" alt="'.esc_attr( get_bloginfo( 'name' ) ).'" >';
  $element = is_front_page() && empty( $typology_h1_used ) ? 'h1' : 'span';
  $url = typology_get_option('logo_custom_url') ? typology_get_option('logo_custom_url') : home_url( '/' );

  $output = '<'.$element.' class="site-title h4"><a href="'. esc_url( $url ) .'" rel="home">'.wp_kses_post( $brand ).'</a></'.esc_attr( $element ).'>';

  $typology_h1_used = true;

  return $output;

}

/**
 * Get list of image sizes
 *
 * @return array
 * @since  1.0
 */

function typology_get_image_sizes() {
  $sizes = array(
    'typology-cover' => array( 'title' => esc_html__('Cover', 'typology'), 'w' => 1920, 'h' => 9999, 'crop' => false ),
    'typology-a' => array( 'title' => esc_html__('Layout A', 'typology'), 'w' => 720, 'h' => 9999, 'crop' => false ),
    'typology-b' => array( 'title' => esc_html__( 'Layout B', 'typology' ), 'w' => 580, 'h' => 9999, 'crop' => false ),
    'typology-c' => array( 'title' => esc_html__( 'Layout C', 'typology' ), 'w' => 320, 'h' => 9999, 'crop' => false ),
    'typology-featured-thumb' => array( 'title' => esc_html__( 'Featured Thumbnail', 'typology' ), 'w' => 360, 'h' => 9999, 'crop' => false ),
  );

  $disable_img_sizes = typology_get_option( 'disable_img_sizes' ); 

  if(!empty( $disable_img_sizes )){
    $disable_img_sizes = array_keys( array_filter( $disable_img_sizes ) );
  }

  if(!empty($disable_img_sizes) ){
    foreach($disable_img_sizes as $size_id ){
      unset( $sizes['typology-'.$size_id]);
    }
  }
  $sizes = apply_filters( 'typology_modify_image_sizes', $sizes );
  return $sizes;
}
?>

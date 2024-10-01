<?php
add_theme_support('post-thumbnails');
add_theme_support('custom-logo');
add_theme_support('menus');
register_nav_menu('header-menu', 'Primary');
register_nav_menu('footer-menu', 'Secondary');

function themename_custom_logo_setup(){
  add_theme_support('custom-logo', [
    'header-text' => ['site-title', 'site-description'],
    'flex-height' => true,
    'flex-width' => true,
    'unlink-homepage-logo' => true,
  ]);
}

if (function_exists('acf_add_options_page')) {
  acf_add_options_page(
    array(
      'page_title' => 'Theme General Settings',
      'menu_title' => 'Theme Settings',
      'menu_slug' => 'theme-general-settings',
      'capability' => 'edit_posts',
      'redirect' => false
    )
  );
  acf_add_options_sub_page(
    array(
      'page_title' => 'Theme Header Settings',
      'menu_title' => 'Header',
      'parent_slug' => 'theme-general-settings',
    )
  );

  acf_add_options_sub_page(
    array(
      'page_title' => 'Theme Footer Settings',
      'menu_title' => 'Footer',
      'parent_slug' => 'theme-general-settings',
    )
  );

}

register_post_type('blogs', array(
	'label' => __('Blogs'),
	'singular_label' => __('Blogs'),
	'public' => true,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'rewrite' => false,
	'query_var' => false,
	'taxonomies' => array('post_tag', 'category'),
	'supports' => array('title', 'editor', 'thumbnail', 'custom-fields', 'excerpt')
));
register_post_type('testimonials', array(
	'label' => __('Testimonials'),
	'singular_label' => __('Testimonials'),
	'public' => true,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'rewrite' => false,
	'query_var' => false,
	'taxonomies' => array('post_tag', 'category'),
	'supports' => array('title', 'editor', 'thumbnail', 'custom-fields', 'excerpt')
));

// Register Css File
// function sanfelipe_enqueue_stylesheet()
// {

//   wp_enqueue_style('swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/10.1.0/swiper-bundle.min.css', array(), '1.0.0');
//   wp_enqueue_style('owl-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', array(), '1.0.0');
//   wp_enqueue_style('owl-theme', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css', array());
//   wp_enqueue_style('fontawesome-all', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', array());
//   wp_enqueue_style('fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css', array());
//   wp_enqueue_style('fontawesome-min', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css', array(), '1.0.0');
//   wp_enqueue_style('fontawesome-brand', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/brands.min.css', array(), '1.0.0');
//   wp_enqueue_style('aos', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array());
//   wp_enqueue_style('all', get_stylesheet_directory_uri() . '/assets/style/all.css', array(), '1.0.0');
//   wp_enqueue_style('responsive', get_stylesheet_directory_uri() . '/assets/style/responsive.css', array(), '1.0.0');
// }
// add_action('wp_enqueue_scripts', 'sanfelipe_enqueue_stylesheet');


// //   Register Jq File
// function sanfelipe_enqueue_scripts()
// {
//   wp_enqueue_script('jquery-cdn', 'https://code.jquery.com/jquery-3.7.1.min.js', array(), '3.7.1', true);
//   wp_enqueue_script('swiper-js-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/10.1.0/swiper-bundle.min.js', array(), true);
//   wp_enqueue_script('owl-slider', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array(), true);
//   wp_enqueue_script('aos-fancy-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js', array(), true);
//   wp_enqueue_script('aos', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), true);
//   wp_enqueue_script('custom_js', get_template_directory_uri() . '/assets/js/all.js', array('jquery-cdn'), true);

// }
// add_action('wp_enqueue_scripts', 'sanfelipe_enqueue_scripts');

add_action( 'woocommerce_single_product_summary', 'custom_offer_divs', 8 );
function custom_offer_divs() {
    echo '
      <div class="offers-holder">
        <div class="offer-col">
          <div class="offer-icon"></div>
          <span>Free Shipping</span>
        </div>
        <div class="offer-col">
          <div class="offer-icon second"></div>
          <span>No Sales Tex</span>
        </div>
      </div>
    ';
}

add_action( 'woocommerce_single_product_summary', 'protect_divs', 8 );
function protect_divs() {
    echo '
      <div class="protect-holder">
        <div class="protect-col">
          <div class="protect-icon"></div>
          <span>Protect Your Product</span>
        </div>
        <div class="protect-col">
          <select>
            <option>Standard Warrenty</option>
          </select>
        </div>
      </div>
    ';
}

add_action( 'woocommerce_single_product_summary', 'custom_product_description', 20 );
function custom_product_description() {
    global $product;

    echo '<div class="custom-product-description">';
    echo '<h3>Product Description</h3>';
    echo '<div class="description">' . $product->get_description() . '</div>';
    echo '</div>';
}


// Woocommerce support

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
   add_theme_support( 'woocommerce' );
}    

add_theme_support( 'wc-product-gallery-slider' );

// // add to cart woocommerce
function add_product_to_cart() {
  if (isset($_POST['product_id'])) {
      $product_id = sanitize_text_field($_POST['product_id']);
      WC()->cart->add_to_cart($product_id);
      die();
  }
}
add_action('wp_ajax_add_product_to_cart', 'add_product_to_cart');
// add_action('wp_ajax_nopriv_add_product_to_cart', 'add_product_to_cart');
// 

add_action('template_redirect', 'redirect_empty_cart_to_custom_message');

function redirect_empty_cart_to_custom_message() {
    if (is_page('checkout') && WC()->cart->is_empty()) {
        wp_redirect(home_url('/notice/'));
        exit;
    }
}
<?php get_header(); /* Template Name: Home */ ?>
    <main id="main">
        <section class="slider-section">
            <div class="container relative">
                <h1 class="wow bounceInLeft"><?php bloginfo('name'); ?></h1>
                <div class="slick-slider relative">
                    
                    <?php $args = array( 'taxonomy' => 'product', 'product_cat' => 'headphones' ); $the_query = new WP_Query( $args ); ?>
                    <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>


                    <div class="slick-slide">
                        <div class="img-holder relative wow bounceInUp">
                            <h2 class="text-center"><?php the_title(); ?></h2>
                            <?php $home_bg_img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
                            <img src="<?php echo $home_bg_img[0]; ?>" alt="HeadPhone" />
                        </div>
                        <div class="slide-caption wow bounceInLeft">
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>" class="btn-primary">Show Now <img src="<?php bloginfo('template_url'); ?>/images/arrow-icon.png" alt="->" /></a>
                        </div>
                    </div>
                    <?php wp_reset_postdata(); endwhile; endif;  ?>
                </div>
                <div class="circle-holder wow bounceInDown">
                    <div id="circle" data-text="<?php $tagline = get_bloginfo('description'); echo $tagline; ?>"></div>
                    <img src="<?php bloginfo('template_url'); ?>/images/down-arrow.svg" alt="Go Down" class="bounce-arrow" />
                </div>
                <div class="socials wow bounceInDown">
                    <strong>Follow Us On</strong>
                    <ul class="list-none">
                        <?php if( have_rows('social_icons', 'options') ):  while ( have_rows('social_icons', 'options') ) : the_row(); ?>
                        <li>
                            <a href="<?php the_sub_field('social_link', 'options'); ?>">
                                <img src="<?php the_sub_field('icon_image', 'options'); ?>" alt="#" />
                            </a>
                        </li>
                        <?php endwhile; endif; ?>
                    </ul>
                </div>
            </div>
        </section>
        <section class="latest">
            <div class="container relative">
                <h2 class="section-heading">Shop Now</h2>
                <header class="header flex v-end">
                    <h2><?php the_field('latest_heading'); ?></h2>
                    <a href="<?php bloginfo('url'); ?>/shop" class="btn-primary black ml-auto large">View All <img src="<?php bloginfo('template_url'); ?>/images/arrow-icon.png" alt="->" /></a>
                </header>
                <div class="products-slider">
                <?php
$args = array(
    'post_type' => 'product',
    'posts_per_page' => -1,
    'order' => 'DSC'
);
$the_query = new WP_Query($args);
?>
<?php if ($the_query->have_posts()) : ?>
    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <div class="slick-slide">
            <div class="img-holder relative">
                <?php the_post_thumbnail('full'); ?>
                <div class="btns">
                    <a href="<?php the_permalink(); ?>" class="quick-view"><img src="<?php bloginfo('template_url'); ?>/images/eye.png" alt="View" /></a>
                    <?php
                    // Add to Cart URL
                    $product_id = get_the_ID();
                    $add_to_cart_url = esc_url(apply_filters('add_to_cart_url', '?add-to-cart=' . $product_id));
                    ?>
                    <a href="<?php the_permalink(); ?><?php echo $add_to_cart_url; ?>" class="cart-icon"><img src="<?php bloginfo('template_url'); ?>/images/bag.png" alt="Buy Now" /></a>
                </div>
            </div>
            <div class="product-info">
                <strong><?php the_title(); ?></strong>
                <?php
                global $product;
                $price = $product->get_price_html();
                ?>
                <span class="price"><?php echo $price; ?></span>
            </div>
        </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>
                </div>
            </div>
        </section>
        <section class="collection">
            <div class="container flex">
            <?php
$args = array(
    'post_type' => 'product',
    'posts_per_page' => 1,
    'tax_query' => array(
        array(
            'taxonomy' => 'product_cat',
            'field'    => 'slug',
            'terms'    => 'home-decor',
        ),
    ),
    'orderby' => 'date',
    'order' => 'DESC'
);

$latest_product_query = new WP_Query( $args );

if ( $latest_product_query->have_posts() ) {
    while ( $latest_product_query->have_posts() ) {
        $latest_product_query->the_post();
        if ( has_post_thumbnail() ) {
            $featured_img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
?>
<div class="text">
                    <h2><?php the_title(); ?></h2>
                    <ul class="list-none tabset">
                        <li class="active">
                            <a href="#tab1">
                                <strong>Timeless Elegance</strong>
                                <p>Elevate your table with a 330ml Retro Glass Jug, blending classic design and durable hardened glass.</p>
                            </a>
                        </li>
                        <li>
                            <a href="#tab1">
                                <strong>Durable Glass</strong>
                                <p>Elevate your table with a 330ml Retro Glass Jug, blending classic design and durable hardened glass.</p>
                            </a>
                        </li>
                        <li>
                            <a href="#tab1">
                                <strong>Versatile Charm</strong>
                                <p>Elevate your table with a 330ml Retro Glass Jug, blending classic design and durable hardened glass.</p>
                            </a>
                        </li>
                    </ul>
                    <a href="<?php the_permalink(); ?>" class="btn-primary">Shop Now <img src="<?php bloginfo('template_url'); ?>/images/arrow-icon.png" alt="->" /></a>
                </div>
                <div class="tab-content">
                    <div id="tab1" class="tab active">
                        <img src="<?php echo esc_url( $featured_img_url ); ?>" alt="#" />
                    </div>
                    <!-- <div id="tab2" class="tab">
                        <img src="<?php bloginfo('template_url'); ?>/images/img1.png" alt="#" />
                    </div>
                    <div id="tab3" class="tab">
                        <img src="<?php bloginfo('template_url'); ?>/images/img1.png" alt="#" />
                    </div> -->
                </div>
            
<?php
        }
    }
} else {
    // No posts found
}
wp_reset_postdata();
?>
                
            </div>
        </section>
        <section class="categories relative">
            <div class="container relative">
                <h2 class="section-heading">Categories</h2>
                <div class="products-slider categories">
    <?php
$product_categories = get_terms(array(
    'taxonomy'   => 'product_cat',
    'hide_empty' => false,
    'exclude'    => array(
        get_option('default_product_cat'), // Excluding Uncategorized category
        '21',    // Replace 'headphones_category_id_here' with the actual ID of the headphones category
    ),
));

    foreach ($product_categories as $category) {
        $category_image_id = get_term_meta($category->term_id, 'thumbnail_id', true);
        $category_image = wp_get_attachment_url($category_image_id);
        ?>
        <div class="slick-slide">
            <div class="img-holder relative">
                <img src="<?php echo esc_url($category_image); ?>" alt="<?php echo esc_attr($category->name); ?>" />
                <div class="caption">
                    <strong><?php echo esc_html($category->name); ?></strong>
                    <a href="<?php echo esc_url(get_term_link($category)); ?>" class="btn-primary filled">Shop Now</a>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>

            </div>
        </section>
        <section class="reviews relative">
            <div class="container">
                <header class="header">
                    <h2><?php the_field('testimonial_heading'); ?></h2>
                </header>
                <div class="reviews-slider">
                    <?php $args = array( 'post_type' => 'testimonials', 'posts_per_page' => 4, 'order' => 'ASC' ); $the_query = new WP_Query( $args ); ?>
                    <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="slick-slide">
                        <img src="<?php the_field('starts'); ?>" alt="Stars" />
                        <strong><?php the_title(); ?></strong>
                        <?php the_content(); ?>
                        <div class="author">
                            <span class="name">~ <?php the_field('author'); ?></span>
                            <span class="date"><?php echo get_the_date('F j, Y'); ?></span>
                        </div>
                    </div>
                    <?php wp_reset_postdata(); endwhile; endif;  ?>
                </div>
            </div>
        </section>
        <section class="social-posts">
            <div class="container">
                <header class="header text-center">
                    <h2>Stay in the loop</h2>
                    <ul class="social-icons list-none flex v-center h-center">
                    <?php if( have_rows('social_icons', 'options') ):  while ( have_rows('social_icons', 'options') ) : the_row(); ?>
                        <li>
                            <a href="<?php the_sub_field('social_link', 'options'); ?>">
                                <img src="<?php the_sub_field('icon_image', 'options'); ?>" alt="#" />
                            </a>
                        </li>
                        <?php endwhile; endif; ?>
                    </ul>
                </header>
            </div>
            <div class="insta-posts">
                <img src="<?php bloginfo('template_url'); ?>/images/insta-posts.png" alt="#" class="img-responsive" />
            </div>
        </section>
    </main>
<?php get_footer(); ?>
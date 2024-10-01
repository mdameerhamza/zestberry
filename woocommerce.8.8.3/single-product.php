<?php get_header(); ?>
<main id="main">
    <section class="banner">
        <div class="container">
            <h1 class="small"><?php the_title(); ?></h1>
        </div>
    </section>
    <!-- <div class="details-holder">
            <div class="container">
                <?php the_content(); ?>
            </div>
        </div> -->
    <div class="product-details">
        <div class="container">
            <div class="two-columns">
                <div class="gallery">
                    <div class="large-image">
                        <div class="product-image-slider relative">

                            <?php
// Get the product ID
$product_id = get_the_ID();

// Get the product gallery images
$gallery_images = get_post_meta($product_id, '_product_image_gallery', true);
$gallery_images = explode(',', $gallery_images);

// Display gallery images
if ($gallery_images) {
    foreach ($gallery_images as $gallery_image_id) {
        ?>
                            <div class="slick-slide">
                                <?php echo wp_get_attachment_image($gallery_image_id, 'full'); ?>
                            </div>

                            <?php
    }
}
?> </div>
                    </div>
                    <div class="slider-thumnbnails relative">
                        <?php
// Get the product ID
$product_id = get_the_ID();

// Get the product gallery images
$gallery_images = get_post_meta($product_id, '_product_image_gallery', true);
$gallery_images = explode(',', $gallery_images);

// Display gallery images
if ($gallery_images) {
    foreach ($gallery_images as $gallery_image_id) {
        ?>
                        <div class="slick-slide">
                            <?php echo wp_get_attachment_image($gallery_image_id, 'full'); ?>
                        </div>

                        <?php
    }
}
?>
                    </div>
                </div>
                <div class="detail-col">
                <?php
// Ensure WooCommerce is active
if ( class_exists( 'WooCommerce' ) ) {
    // Get the product ID
    global $product;
    $product_id = $product->get_id();

    // Output the quantity input field
    woocommerce_quantity_input( array(
        'min_value'   => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
        'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
        'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1, // Default quantity is 1
    ) );
}
?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>
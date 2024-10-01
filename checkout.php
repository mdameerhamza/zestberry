<?php
/*
Template Name: Checkout
*/
get_header();
?>
<main id="main">
    <div class="container">
        <?php echo do_shortcode('[woocommerce_checkout]'); ?>
    </div>
</main>
<?php get_footer(); ?>
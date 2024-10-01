<?php
/* Template Name: Notice */
get_header();
?>
<main id="main">
	<div class="container notice">
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
		<img src="<?php echo $image[0]; ?>" alt="#">
		<?php the_content(); ?>
	</div>
</main>
<?php get_footer(); ?>
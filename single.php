<?php get_header(); ?>
    <main id="main">
        <section class="banner">
            <h1><?php the_title(); ?></h1>
        </section>
        <div class="details-holder">
            <div class="container">
                <?php the_content(); ?>
            </div>
        </div>
    </main>
<?php get_footer(); ?>
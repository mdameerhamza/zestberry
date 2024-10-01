<?php get_header(); /* Template Name: Blogs */ ?>
    <main id="main">
        <section class="banner">
            <h1 class="uppercase"><?php the_title(); ?></h1>
        </section>
        <section class="blogs">
            <div class="container">
                <header class="header flex v-center">
                    <h3>View Latest Blogs</h3>
                    <ul class="list-none flex v-center ml-auto">
                        <li class="list-view">
                            <img src="<?php bloginfo('template_url'); ?>/images/list-view.png" alt="List" />
                            <strong>List</strong>
                        </li>
                        <li class="month-view">
                            <img src="<?php bloginfo('template_url'); ?>/images/grid-view.png" alt="Months" />
                            <strong>Months</strong>
                        </li>
                    </ul>
                </header>
                <ul class="blogs-list list-none">
                    <?php $counter = 1; $args = array( 'post_type' => 'blogs', 'posts_per_page' => -1, 'order' => 'ASC' ); $the_query = new WP_Query( $args ); ?>
                    <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <li class="flex v-center">
                            <span class="number">
                                <em class="post-date"><?php echo get_the_date('F'); ?></em>
                                <em class="counter-holder">
                                    <?php
                                        $counter = sprintf("%02d", $counter);
                                        echo $counter;
                                    ?>
                                </em>
                            </span>
                            <div class="img-holder">
                                <?php the_post_thumbnail('full'); ?>    
                            </div>
                            <div class="text">
                                <h2><?php the_title(); ?></h2>
                                <address><?php the_field('address'); ?></address>
                                <span class="timer"><?php the_field('time'); ?></span>
                                <?php the_excerpt(); ?>
                                <div class="btn-holder">
                                    <a href="<?php the_permalink(); ?>">View Latest Blogs <img src="<?php bloginfo('template_url'); ?>/images/right-arrow.png" alt="->" /></a>
                                </div>
                            </div>
                        </li>
                    <?php $counter++; wp_reset_postdata(); endwhile; endif;  ?>
                </ul>
            </div>
        </section>
    </main>
<?php get_footer(); ?>
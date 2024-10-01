<footer id="footer">
            <div class="container">
                <div class="subscribe-form">
                    <h2>Subscribe Newsletter</h2>
                    <form>
                        <input type="text" placeholder="Search" />
                        <input type="submit" value="Search" />
                    </form>
                </div>
                <div class="footer-bottom flex v-center">
                    <a href="<?php bloginfo('url'); ?>" class="footer-logo"><img src="<?php the_field('logo', 'options'); ?>" alt="<?php bloginfo('name'); ?>" /></a>
                    <?php
                        wp_nav_menu(array(
                            'theme_location' => 'header-menu',
                            'menu_id' => 'menu',
                            'order' => 'ASC',
                            'menu_class' => 'quick-links list-none flex v-center h-center'
                        ));
                    ?>
                    <ul class="social-icons list-none flex v-center h-center">
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
            <div class="copyrights">
                <div class="container">
                    <p><?php the_field('copyright_text', 'options'); ?></p>
                </div>
            </div>
        </footer>
    </div>

    <script src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/slick.1.4.1.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/wow.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/custom.js"></script>
</body>
</html>
<?php wp_footer(); ?>
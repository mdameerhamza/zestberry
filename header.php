<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php the_field('favicon', 'options'); ?>">
    <title><?php bloginfo('name'); ?></title>
    <link href="<?php bloginfo('template_url'); ?>/css/slick.css" media="all" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/css/animate.min.css" media="all" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/css/all.css" media="all" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/css/woocommerce.css" media="all" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/css/responsive.css" media="all" rel="stylesheet">
</head>
<body <?php body_class(); ?>>
    <div id="wrapper">
        <header id="header">
            <div class="container flex v-center wow bounceInLeft">
                <a href="<?php bloginfo('url'); ?>" class="logo">
                    <img src="<?php the_field('logo', 'options'); ?>" alt="<?php bloginfo('name'); ?>" />
                </a>
                <nav id="nav" class="flex flex-1 h-center">
                    <?php
                        wp_nav_menu(array(
                            'theme_location' => 'header-menu',
                            'menu_id' => 'menu',
                            'order' => 'ASC',
                            'menu_class' => 'list-none flex'
                        ));
                    ?>
                </nav>
                <ul class="list-none user-links flex ml-auto">
                    <li>
						<form role="search" id="searchform" method="get" action="<?php echo home_url('/'); ?>">
							<input type="text" name="s" value="<?php the_search_query(); ?>" placeholder="Search here...">
					</form>
                        <a href="#." class="search-opener">
                            <img src="<?php bloginfo('template_url'); ?>/images/search-icon.svg" alt="Search" />
                        </a>
                    </li>
                    <li class="show-mobile">
                        <a href="<?php bloginfo('url'); ?>/cart">
                            <img src="<?php bloginfo('template_url'); ?>/images/cart-icon.svg" alt="Cart" />
                        </a>
                    </li>
                    <li class="hide-desktop menu-opener">
                        <a href="#.">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php bloginfo('url'); ?>/my-account">
                            <img src="<?php bloginfo('template_url'); ?>/images/user-icon.svg" alt="Profile" />
                        </a>
                    </li>
                </ul>
            </div>
        </header>
<?php wp_head(); ?>
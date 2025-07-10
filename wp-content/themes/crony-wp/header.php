<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <?php
        /*
         * Print the <title> tag based on what is being viewed.
         */
        global $page, $paged;
    ?>
    <title>
        <?php wp_title( '' );
    
        // Add the blog name.
        //bloginfo( 'name' );
    
        // Add the blog description for the home/front page.
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) )
            echo " | $site_description";
    
        // Add a page number if necessary:
        if ( $paged >= 2 || $page >= 2 )
            echo ' | ' . sprintf( __( 'Page %s', 'eventsmore' ), max( $paged, $page ) );  ?>
    </title>
    <?php wp_head(); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/slick.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/slick-theme.css" />
    <!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/product-slider.css" /> -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/swiper.min.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
</head>
<body>
    <header>
        <div class="top-bar border-bottom">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="left">
                        <ul class="d-flex gap-2 align-items-center">
                            <li>
                                <span class="d-flex align-items-center">
                                    <i class="fa-light fa-phone-volume"></i>
                                    Call: <a href="tel:<?php echo get_field('phone_number', 'option'); ?>"><?php echo get_field('phone_number', 'option'); ?></a>
                                </span>
                            </li>
                            <li>
                                <span class="d-flex align-items-center">
                                    <i class="fa-light fa-envelope"></i>
                                    Email: <a href="mailto:<?php echo get_field('email_address', 'option'); ?>"><?php echo get_field('email_address', 'option'); ?></a>
                                </span>
                            </li>
                        </ul>
                    </div>
                    <div class="right">
                        <div class="social-icons">
                            <?php if(have_rows('social_media_url', 'option')): ?>
                                <?php while(have_rows('social_media_url', 'option')): the_row(); ?>
                                    <a href="<?php echo get_sub_field('facebook_url', 'option'); ?>" class="icon">
                                        <i class="fa <?php echo get_sub_field('social_icon', 'option'); ?>"></i>
                                    </a>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar end -->
        <nav class="navbar navbar-expand-lg" id="navbar_top">
            <div class="container">
                <a class="navbar-brand" href="<?php echo site_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo-desktop.png" alt="sudhafashion" class="desktop-view" />
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo-mobile.png" alt="sudhafashion" class="mobile-view">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <!-- <ul class="navbar-nav mx-auto">
                        <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Products</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="product-listing.html">Product Listing</a></li>
                                <li><a class="dropdown-item" href="product-details.html">Product Details</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Blog</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="blog.html">Blog Listing</a></li>
                                <li><a class="dropdown-item" href="blog-details.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                    </ul> -->
                    <?php
                        wp_nav_menu( array(
                            'theme_location'    => 'desktop_menu',
                            'container'     => '',
                            'menu_id' => false,
                            'menu_class'        => 'navbar-nav mx-auto', 
                            'echo'          => true,
                            'items_wrap'        => '<ul class="%2$s">%3$s</ul>',
                            'depth'         => 10,
                            'walker'        => new desktop_nav_menu
                        ) );
                    ?>
                </div>
                <div class="icon-menu">
                    <ul class="d-flex align-items-center gap-4">
                        <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
                            <div class="input-group search">
                                <input type="text" class="form-control rounded-5" id="searchInput" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php esc_attr_e( 'Search &hellip;', 'shape' ); ?>" aria-describedby="button-addon2">
                            </div>
                        </form>
                        <!-- <li>
                            <a href="#">
                                <i class="fa-light fa-heart"></i>
                            </a>
                        </li> -->
                        <li>
                            <a href="<?php echo get_page_link(66) ?>">
                                <i class="fa-light fa-user"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo get_page_link(64) ?>">
                                <i class="fa-light fa-cart-shopping"></i>
                                <span class="badge position-absolute translate-middle badge rounded-pill bg-danger">
                                    <?php echo WC()->cart->get_cart_contents_count(); ?>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
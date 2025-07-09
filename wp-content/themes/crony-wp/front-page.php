<?php

/*
 * Theme Home Page
 */
GLOBAL $post;
$home_id = $post->ID;
get_header();
?>    
    <section class="banner-section">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php if(have_rows('theme_slider','option')): ?>
                    <?php $sliderCount = 0; ?>
                    <?php while(have_rows('theme_slider','option')): the_row(); ?>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $sliderCount; ?>" class="<?php echo ($sliderCount == 0 ? 'active' : ''); ?>" aria-current="<?php echo ($sliderCount == 0 ? 'true' : ''); ?>" aria-label="Slide <?php echo $sliderCount; ?>"></button>
                       <?php $sliderCount++; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="carousel-inner">
                <?php if(have_rows('theme_slider','option')): ?>
                    <?php $sliderCount = 1; ?>
                    <?php while(have_rows('theme_slider','option')): the_row(); ?>
                        <div class="carousel-item <?php echo ($sliderCount == 1 ? 'active' : ''); ?>">
                            <img src="<?php echo get_sub_field('desktop_slider_image', 'option'); ?>" class="d-block w-100 desktop-view" alt="...">
                            <img src="<?php echo get_sub_field('mobile_slider_image', 'option'); ?>" class="d-block w-100 mobile-view" alt="...">
                        </div>
                        <?php $sliderCount++; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <!-- Banner end -->
    <section class="fluid-block features py-5">
        <div class="container">
            <div class="row">
                <?php if(have_rows('all_features')): ?>
                    <?php while(have_rows('all_features')): the_row(); ?>
                        <div class="col-lg-3 col-md-6 col-6">
                            <div class="d-flex align-items-center gap-3">
                                <div class="left">
                                    <!-- <div class="icon">
                                        <i class="fa <?php echo get_sub_field('feature_icon'); ?>"></i>
                                    </div> -->
                                    <div class="img-icon"><img src="<?php echo get_sub_field('feature_icon'); ?>"></div>
                                </div>
                                <div class="right">
                                    <div class="title"><?php echo get_sub_field('feature_title'); ?></div>
                                    <small><?php echo get_sub_field('feature_texts'); ?></small>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- Feature end -->
    <!-- Top Selling Products Section -->
    <section class="fluid-block top-selling-products">
        <div class="container">
            <div class="title-div text-center mb-4">
                <h2 class="fw-bold display-5 mb-0"><?php echo get_field('product_title'); ?></h2>
                <p class="text-muted mb-2"><?php echo get_field('product_subtitle'); ?></p>
            </div>
            <div class="col-lg-10 mx-auto">
                <div class="row g-5">

                    <?php if(have_rows('all_products')): ?>
                        <?php while(have_rows('all_products')): the_row(); ?>
                            <?php $select_products = get_sub_field('select_product'); ?>
                            <?php $product = wc_get_product($select_products->ID);  ?>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="card square-img border-0 rounded-5 overflow-hidden position-relative shadow">
                                    <div class="caption">
                                        <a href="<?php echo get_the_permalink($select_products->ID); ?>" class="card-title fs-3 fw-bold mb-2"><?php echo $select_products->post_title; ?></a>
                                        <div class="price">
                                            <!-- <?php echo get_woocommerce_currency_symbol(). ' ' .get_post_meta($select_products->ID, '_price', true); ?> -->
                                            <?php echo $product->get_price_html(); ?>
                                        </div>
                                        <a href="<?php echo get_the_permalink($select_products->ID); ?>" class="d-flex align-items-center gap-2 btn btn-primary mt-4">Shop Now <i class="bi bi-chevron-right"></i></a>
                                    </div>
                                    <img src="<?php echo get_the_post_thumbnail_url($select_products->ID); ?>" alt="Product Image" class="card-img-top">
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Top Selling Products Section -->
    <section class="fluid-block about-section py-0 eye-catchy-bg">
        <div class="container">
            <div class="row g-5 ">
                <div class="col-lg-6">
                    <div class="about-content">
                        <div class="title-div">
                            <h2 class="fw-bold mb-0 text-uppercase"><?php echo get_field('about_title'); ?></h2>
                            <p class="text-muted mb-2 fs-5"><?php echo get_field('about_subtitle'); ?></p>
                        </div>
                        <div class="text-muted mb-4"><?php echo get_field('about_texts'); ?></div>
                        <a href="<?php echo get_page_link(121); ?>" class="btn btn-primary mt-3">Read More <i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 position-relative">
                    <div class="about-image about-image-bottom">
                        <img src="<?php echo get_field('about_image'); ?>" alt="About Crony Medi Lite" class="img-fluid rounded-5">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section -->
    <section class="why-choose-us">
        <div class="container">
            <div class="title-div text-center mb-4">
                <h2 class="fw-bold mb-0 text-uppercase"><?php echo get_field('why_us_title'); ?></h2>
                <p class="text-muted mb-2 fs-5"><?php echo get_field('why_us_subtitle'); ?></p>
            </div>
            <div class="col-lg-10 mx-auto">
                <div class="row">
                    <?php if(have_rows('why_us_reasons')): ?>
                        <?php while(have_rows('why_us_reasons')): the_row(); ?>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="feature col p-4 rounded-4">
                                    <!-- <div class="feature-icon d-inline-flex align-items-center text-bg-primary bg-gradient fs-2 mb-3">
                                        <i class="fa <?php echo get_sub_field('why_us_icon'); ?>"></i>
                                    </div> -->
                                    <div class="img-icon"><img src="<?php echo get_sub_field('why_us_icon'); ?>"></div>
                                    <h3 class="text-body-emphasis"><?php echo get_sub_field('why_us_title'); ?></h3>
                                    <p><?php echo get_sub_field('why_us_texts'); ?></p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- End -->
    <section class="hero-section py-5 pb-0">
        <div class="container">
            <div class="hero-banner position-relative rounded-5 overflow-hidden d-flex align-items-center">
                <div class="hero-content position-absolute top-50 start-0 translate-middle-y">
                    <h1 class="display-4 fw-bold text-white mb-3">LOREM IPSUM<br>DOLOR SIT AMET</h1>
                    <p class="lead text-white-50 mb-4">AT VERO EOS ET ACCUSAMUS ET IUSTO ODIO<br>DIGNISSIMOS DUCIMUS QUI
                        BLANDITIIS</p>
                    <a href="#" class="btn btn-primary">SHOP NOW</a>
                </div>
            </div>
            <div class="hero-logos brand-carousel border-bottom py-4 pb-3">
                <?php $image_carousel = get_field('image_carousel'); ?>
                <?php if($image_carousel): ?>
                    <?php foreach($image_carousel as $image): ?>
                        <img src="<?php echo $image['url']; ?>" alt="Chicago" height="40">
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
    <section class="fluid-block blog">
        <div class="container">
            <div class="title-div text-center">
                <h2 class="text-uppercase mb-0 fw-bold">Latest Blog Posts</h2>
                <small>latest blog posts</small>
            </div>
            <div class="row g-5 blog-carousel">
                <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 4,
                        'order' => 'DESC',
                        'orderby' => 'date',
                        'post_status' => 'publish'
                    );
                    $postData = new WP_Query($args);
                    if($postData->have_posts()):
                        while($postData->have_posts()):
                            $postData->the_post();
                ?>
                        <div class="col-lg-3 col-md-6">
                            <a href="<?php the_permalink(); ?>" class="card border-0 rounded-4 overflow-hidden shadow-lg">
                                <div class="card-img">
                                    <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>" alt="" class="img-fluid rounded-4">
                                </div>
                                <div class="card-body p-3">
                                    <div class="info">
                                        <p><?php the_title(); ?></p>
                                        <div class="date mt-3 d-flex align-items-center gap-2"><i class="fa-light fa-calendar"></i> <?php the_date('F j, Y'); ?></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                <?php
                        endwhile;
                    endif;
                    // wp_reset_postdata();
                ?>
            </div>
            <div class="text-center mt-4">
                <a href="<?php echo get_page_link(123); ?>" class="btn btn-primary">View All</a>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
    <section class="testimonial-section" style="background: linear-gradient(to bottom, #f7f7f7 0%, #fff 100%);">
        <div class="container">
            <div class="title-div text-center">
                <h2 class="mb-0 fw-bold">What Our Clients’ Say</h2>
                <small>Damet consectetur tempor</small>
            </div>
            <div class="testimonial-slider mx-auto" style="max-width:700px;">

                <?php if(have_rows('all_testimonials','option')): ?>
                    <?php while(have_rows('all_testimonials','option')): the_row(); ?>
                        <div>
                            <div class="testimonial-card text-center p-5" style="background:#fff;border-radius:32px;box-shadow:0 8px 32px rgba(40,116,108,0.07);">
                                <div style="font-size:4rem;color:#eaf3f2;line-height:1;margin-bottom:-1.5rem;">&#10077;</div>
                                <div class="testimonial-text mb-4" style="font-size:1.25rem;color:#222;">
                                    <?php echo get_sub_field('enter_feedback_texts', 'option'); ?>
                                </div>
                                <div class="d-flex align-items-center justify-content-center gap-2 mt-3">
                                    <span style="display:inline-flex;align-items:center;justify-content:center;width:38px;height:38px;background:#eaf3f2;border-radius:50%;">
                                        <i class="fa-solid fa-user" style="font-size:1.3rem;color:#b0b0b0;"></i>
                                    </span>
                                    <span class="fw-bold" style="font-size:1.08rem;"><?php echo get_sub_field('name', 'option'); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                
            </div>
        </div>
    </section>
<?php get_footer(); ?>
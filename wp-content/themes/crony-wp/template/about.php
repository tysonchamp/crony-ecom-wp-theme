<?php
/*
 *Template Name: About Us
 */
GLOBAL $post;
get_header('inner');

?>
    <?php $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' ); ?>
    
    <section class="fluid-block inner-banner text-center py-5">
        <div class="container">
            <h1 class="fw-bold display-5"><?php the_title(); ?></h1>
            <div class="col-lg-6 mx-auto">
                <small class="fs-5 text-muted d-block"><?php echo get_field('subtitle'); ?></small>
                    <!-- <a href="#" class="btn btn-primary mt-4">Got to Shop</a> -->
                    
            </div>
        </div>
    </section>
    <section class="fluid-block about-main border-bottom py-5">
        <div class="container">
            <div class="row clearfix align-items-center">
                <!--Content Column-->
                <div class="content-column col-md-6 col-sm-12 col-xs-12 mt-5">
                    <div class="inner-column">
                        <div class="title-div">
                            <h2 class="text-dark fw-bold"><?php echo get_field('about_title'); ?></h2>
                        </div>
                        <div class="text">
                            <?php echo get_field('about_texts'); ?>
                        </div>
                    </div>
                </div>
                <!--Image Column-->
                <div class="image-column col-md-6 col-sm-12 col-xs-12">
                    <div class="inner-column" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image">
                            <img src="<?php echo $featured_image[0] ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix g-5">
                <?php if(have_rows('content_section')): ?>
                    <?php while(have_rows('content_section')): the_row(); ?>
                        <div class="col-lg-4 content-column">
                            <div class="card rounded-5">
                                <div class="card-body p-5 text mb-0">
                                    <h4 class="card-title fw-bold mb-4 text-dark fs-3"><?php echo get_sub_field('content_title'); ?></h4>
                                    <?php echo get_sub_field('content_texts'); ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
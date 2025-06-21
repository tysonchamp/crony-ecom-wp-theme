<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage clean blog
 * 
 */
global $post;

get_header();
?>
    <?php $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' ); ?>

    <section class="fluid-block inner-banner text-center py-5">
        <div class="container">
            <h1 class="fw-bold display-5"><?php the_title(); ?></h1>
            <!-- <div class="col-lg-6 mx-auto">
                <small class="fs-5 text-muted">Lorem ipsum dolor sit amet consectetur adipiscing elit sed <br>do eiusmod
                    tempor incididunt ut labore</small>
            </div> -->
        </div>
    </section>
    <section class="main-content blog py-5">
        <div class="container">
            <div class="row col-lg-11 mx-auto">
                <div class="col-lg-12 col-md-12">
                    <div class="blog-section-wrap blog-details">
                        <div class="blog-item">
                            <?php if(have_posts()): ?>
                                <?php while(have_posts()): the_post(); ?>
                                    <?php if(has_post_thumbnail()): ?>
                                        <div class="blog-image"><a href="#"><img src="<?php echo $featured_image[0]; ?>" alt=""></a></div>
                                    <?php endif; ?>
                                    <div class="blog-content">
                                        <h3><a href="#"><?php the_title(); ?></a></h3>
                                        <div class="blog-info">
                                            <ul>
                                                <!-- <li><strong>John Doe,</strong></li> -->
                                                <!-- <li><?php the_date('F j, Y'); ?></li> -->
                                            </ul>
                                        </div>
                                        <?php the_content(); ?>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>

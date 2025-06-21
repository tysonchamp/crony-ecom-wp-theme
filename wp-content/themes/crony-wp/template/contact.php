<?php
/*
 *Template Name: Contact Us
 */
GLOBAL $post;
get_header('inner');

?>

    <?php $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' ); ?>
    
    <section class="fluid-block inner-banner text-center py-5">
        <div class="container">
            <h1 class="fw-bold display-5"><?php the_title(); ?></h1>
            <!-- <div class="col-lg-6 mx-auto">
                <small class="fs-5 text-muted">Lorem ipsum dolor sit amet consectetur adipiscing elit sed <br>do eiusmod tempor incididunt ut labore</small>
            </div> -->
        </div>
    </section>
    <section class="fluid-block contact-block">
        <div class="container">
            <div class="row col-lg-10 mx-auto">
                <div class="col-lg-6">
                    <div class="caption">
                        <div class="title-div mb-5">
                            <h2 class="fw-bold display-5 mb-0 fs-2">Contact Details</h2>
                        </div>
                        <!-- <p class="fs-4">Akshya Nagar 1st Block 1st Cross, Rammurthy nagar, Bangalore-560016.</p> -->
                        <p class="fs-5 mb-4"><?php echo get_field('address', 'option'); ?></p>
                        <div class="contact-item d-flex align-items-center mb-3">
                            <div class="icon"><i class="bi bi-telephone"></i></div>
                            <a href="tel:<?php echo get_field('phone_number', 'option'); ?>"><?php echo get_field('phone_number', 'option'); ?></a>
                        </div>
                        <div class="contact-item d-flex align-items-center">
                            <div class="icon"><i class="bi bi-envelope"></i></div>
                            <a href="mailto:<?php echo get_field('email_address', 'option'); ?>"><?php echo get_field('email_address', 'option'); ?></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form class="contact-form">
                        <div class="title-div mb-5">
                            <h2 class="fw-bold display-5 mb-0 fs-2">Get a free quote</h2>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" id="floatingPhone" placeholder="Phone Number">
                            <label for="floatingPhone">Phone</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Comments</label>
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
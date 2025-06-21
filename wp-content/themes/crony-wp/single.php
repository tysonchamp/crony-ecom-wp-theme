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
                <div class="col-lg-8 col-md-12">
                    <div class="blog-section-wrap blog-details">
                        <div class="blog-item">
                            <?php if(have_posts()): ?>
                                <?php while(have_posts()): the_post(); ?>
                                    <div class="blog-image"><a href="#"><img src="<?php echo $featured_image[0]; ?>" alt=""></a></div>
                                    <div class="blog-content">
                                        <h3><a href="#"><?php the_title(); ?></a></h3>
                                        <div class="blog-info">
                                            <ul>
                                                <!-- <li><strong>John Doe,</strong></li> -->
                                                <li><?php the_date('F j, Y'); ?></li>
                                            </ul>
                                        </div>
                                        <?php the_content(); ?>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="right-panel">
                        <div class="search-box">
                            <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php esc_attr_e( 'Search &hellip;', 'shape' ); ?>" aria-label="Search here" aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="search"><i class="bi bi-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="post-box">
                            <h4>Popular Posts</h4>
                            <div class="post-item-wrap">
                                <?php
                                    $args = array(
                                        'post_type' => 'post',
                                        'posts_per_page' => 3,
                                        'order' => 'DESC',
                                        'orderby' => 'date',
                                        'post_status' => 'publish'
                                    );
                                    $the_query = new WP_Query( $args );
                                    if ( $the_query->have_posts() ) {
                                        while ( $the_query->have_posts() ) {
                                            $the_query->the_post();
                                            ?>
                                                <div class="post-item">
                                                    <ul>
                                                        <li>
                                                            <div class="img-wrap"><a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt=""></a></div>
                                                        </li>
                                                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                                    </ul>
                                                </div>
                                            <?php
                                        }
                                    }
                                ?>
                                <!-- <a href="#" class="more-btn">Show more <ion-icon name="arrow-forward-outline"></ion-icon></a> -->
                            </div>
                        </div>
                        <!-- Post Box End -->
                        <div class="post-box">
                            <h4>Category</h4>
                            <div class="category-wrap">
                            <?php
                                $categories = get_categories( array(
                                    'orderby' => 'name',
                                    'order'   => 'ASC'
                                ) );

                                echo '<ul>';

                                foreach( $categories as $category ) {
                                    $category_link = sprintf( 
                                        '<a href="%1$s" alt="%2$s">%3$s</a>',
                                        esc_url( get_category_link( $category->term_id ) ),
                                        esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
                                        esc_html( $category->name )
                                    );

                                    echo '<li>' . sprintf( esc_html__( '%s', 'textdomain' ), $category_link ) . '</li> ';
                                } 

                                echo '</ul>';
                            ?>
                            </div>
                        </div>

                        <!-- <div class="post-box social-box">
                            <h4>follow us</h4>
                            <ul class="social">
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>

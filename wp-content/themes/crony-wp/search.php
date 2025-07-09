<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Shape
 * @since Shape 1.0
 */
 
get_header(); ?>
    
    <section class="fluid-block inner-banner text-center py-5">
        <div class="container">
            <h1 class="fw-bold display-5">Search: <?php echo get_search_query(); ?> </h1>
            <!-- <div class="col-lg-6 mx-auto">
                <small class="fs-5 text-muted">Lorem ipsum dolor sit amet consectetur adipiscing elit sed <br>do eiusmod
                    tempor incididunt ut labore</small>
            </div> -->
        </div>
    </section>
    <section class="main-content blog pt-5">
        <div class="container">
            <div class="row col-lg-11 mx-auto">
                <div class="col-lg-8 col-md-12">
                    <div class="blog-section-wrap">
                        <div class="blog-tittle">
                            <ul>
                                <li>
                                    <h2>Search: <?php echo get_search_query(); ?></h2>
                                    <!-- <small>Showing - 5 of 30 Pages</small> -->
                                </li>
                                <li>
                                    <!-- <a href="#" class="more-btn">Show All <i class="bi bi-chevron-right"></i></a> -->
                                </li>
                            </ul>
                        </div>
                        <!-- Tittle End -->
                        <div class="blog-item-wrap listing">
                            <!--  -->
                            <?php if(have_posts()): ?>
                                <?php while(have_posts()): the_post(); ?>
                                    <!--  -->
                                    <div class="blog-item">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="blog-image"><a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>"></a></div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="blog-content">
                                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                    <div class="blog-info">
                                                        <ul>
                                                            <!-- <li><strong><?php the_author(); ?></strong></li> -->
                                                            <!-- <li><?php the_date('F j, Y'); ?></li> -->
                                                        </ul>
                                                    </div>
                                                    <div class="limit" data-max-characters="142">
                                                        <?php the_excerpt(); ?>
                                                    </div>
                                                    <a href="<?php the_permalink(); ?>" class="more-btn">Read more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!---->
                                <?php endwhile; ?>
                            <?php endif; ?>
                            <!---->
                            <div class="clearfix"></div>
                            <!-- <nav aria-label="...">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#"><i class="bi bi-caret-left-fill"></i></a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item" aria-current="page">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><i class="bi bi-caret-right-fill"></i></a>
                                    </li>
                                </ul>
                            </nav> -->
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

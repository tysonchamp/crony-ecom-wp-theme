
    <!-- Testimonial Section End -->
    <section class="fluid-block newsletter py-0">
        <div class="container">
            <div class="row align-items-center py-5">
                <div class="col-lg-4 col-md-5 mb-3 mb-md-0">
                    <h2 class="fw-bold mb-1">Get the biggest deals</h2>
                    <div class="text-muted">By Subscribe the newsletter</div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <form class="newsletter-form d-flex align-items-center justify-content-lg-start justify-content-center">
                        <div class="newsletter-input-wrap">
                            <div style="display:flex;align-items:center;background:#fff;border:1.5px solid #dbe8e6;border-radius:18px;padding:0;overflow:hidden;">
                                <input type="email" class="form-control border-0 shadow-none" placeholder="Enter your email">
                                <button type="submit" class="btn fw-bold d-flex align-items-center justify-content-center gap-2">
                                    Subscribe <i class="fa-solid fa-paper-plane-top me-1"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Newsletter Section End -->

    <footer>
        <a href="https://wa.me/919876543210" class="floating-icon whatsapp-float" target="_blank" aria-label="Chat on WhatsApp">
            <i class="fa-brands fa-whatsapp" style="font-size:36px;color:#fff;"></i>
        </a>
        <div class="footer-top">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-3">
                        <div class="link-wrap">
                            <h5>Contact Us</h5>
                            <p><strong>Crony Medi Lite</strong><br>
                            No.4/578, 1st Floor Vinayakapuram 5th Cross Bagalur Road, Hosur</p>
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-envelope"></i><a href="mailto:<?php echo get_field('email_address', 'option'); ?>"><?php echo get_field('email_address', 'option'); ?></a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-telephone"></i><a href="tel:<?php echo get_field('phone_number', 'option'); ?>"><?php echo get_field('phone_number', 'option'); ?></a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-chat-right-text"></i>
                                    <a href="#" id="chatWithUsBtn">Chat with Us</a>
                                </li>
                            </ul>
                            <!-- Chat Box HTML (hidden by default) -->
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="link-wrap">
                            <h5>Useful links</h5>
                            <!-- <ul>
                                <li><a href="#">Delivery Information</a></li>
                                <li><a href="#">International Shipping</a></li>
                                <li><a href="#">Payment Options</a></li>
                                <li><a href="#">Track your Order</a></li>
                                <li><a href="#">Returns</a></li>
                                <li><a href="#">Find a Store</a></li>
                            </ul> -->
                            <?php
                                wp_nav_menu( array(
                                    'theme_location'    => 'footer_menu',
                                    'container'     => '',
                                    'menu_id' => false,
                                    'menu_class'        => '', 
                                    'echo'          => true,
                                    'items_wrap'        => '<ul class="%2$s">%3$s</ul>',
                                    'depth'         => 10,
                                    'walker'        => new footer_nav_menu
                                ) );
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="link-wrap">
                            <h5>Information</h5>
                            <?php
                                wp_nav_menu( array(
                                    'theme_location'    => 'footer_menu1',
                                    'container'     => '',
                                    'menu_id' => false,
                                    'menu_class'        => '', 
                                    'echo'          => true,
                                    'items_wrap'        => '<ul class="%2$s">%3$s</ul>',
                                    'depth'         => 10,
                                    'walker'        => new footer_nav_menu
                                ) );
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="link-wrap">
                            <h5>Follow Us On</h5>
                            <ul>
                                <?php if(have_rows('social_media_url', 'option')): ?>
                                    <?php while(have_rows('social_media_url', 'option')): the_row(); ?>
                                        <li class="d-flex align-items-center">
                                            <i class="fa <?php echo get_sub_field('social_icon', 'option'); ?>"></i>
                                            <a href="<?php echo get_sub_field('facebook_url', 'option'); ?>">
                                                <?php echo get_sub_field('menu_title', 'option'); ?>
                                            </a>
                                        </li>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer top end -->
        <div class="footer-bottom">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="payments">
                        <ul class="d-flex align-items-center">
                            <li><a href="#">
                                    <svg height="46px" width="46px" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g id="形状_1_3_" style="enable-background:new    ;">
                                            <g id="形状_1">
                                                <g>
                                                    <path d="M211.328,184.445l-23.465,144.208h37.542l23.468-144.208     H211.328z M156.276,184.445l-35.794,99.185l-4.234-21.358l0.003,0.007l-0.933-4.787c-4.332-9.336-14.365-27.08-33.31-42.223     c-5.601-4.476-11.247-8.296-16.705-11.559l32.531,124.943h39.116l59.733-144.208H156.276z M302.797,224.48     c0-16.304,36.563-14.209,52.629-5.356l5.357-30.972c0,0-16.534-6.288-33.768-6.288c-18.632,0-62.875,8.148-62.875,47.739     c0,37.26,51.928,37.723,51.928,57.285c0,19.562-46.574,16.066-61.944,3.726l-5.586,32.373c0,0,16.763,8.148,42.382,8.148     c25.616,0,64.272-13.271,64.272-49.37C355.192,244.272,302.797,240.78,302.797,224.48z M455.997,184.445h-30.185     c-13.938,0-17.332,10.747-17.332,10.747l-55.988,133.461h39.131l7.828-21.419h47.728l4.403,21.419h34.472L455.997,184.445z      M410.27,277.641l19.728-53.966l11.098,53.966H410.27z" style="fill-rule:evenodd;clip-rule:evenodd;fill:#005BAC;" />
                                                </g>
                                            </g>
                                        </g>
                                        <g id="形状_1_2_" style="enable-background:new    ;">
                                            <g id="形状_1_1_">
                                                <g>
                                                    <path d="M104.132,198.022c0,0-1.554-13.015-18.144-13.015H25.715     l-0.706,2.446c0,0,28.972,5.906,56.767,28.033c26.562,21.148,35.227,47.51,35.227,47.51L104.132,198.022z" style="fill-rule:evenodd;clip-rule:evenodd;fill:#F6AC1D;" />
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </a></li>
                            <li><a href="#">
                                    <svg enable-background="new 0 0 64 64" height="46px" id="Layer_1" version="1.1" viewBox="0 0 64 64" width="46px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g>
                                            <g>
                                                <g>
                                                    <path d="M63.5,32c0,10.4-8.4,18.9-18.9,18.9c-10.4,0-18.9-8.5-18.9-18.9v0c0-10.4,8.4-18.9,18.8-18.9     C55.1,13.1,63.5,21.6,63.5,32C63.5,32,63.5,32,63.5,32z" fill="#FFB600" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path d="M44.6,13.1c10.4,0,18.9,8.5,18.9,18.9c0,0,0,0,0,0c0,10.4-8.4,18.9-18.9,18.9c-10.4,0-18.9-8.5-18.9-18.9     " fill="#F7981D" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path d="M44.6,13.1c10.4,0,18.9,8.5,18.9,18.9c0,0,0,0,0,0c0,10.4-8.4,18.9-18.9,18.9" fill="#FF8500" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path d="M19.2,13.1C8.9,13.2,0.5,21.6,0.5,32c0,10.4,8.4,18.9,18.9,18.9c4.9,0,9.3-1.9,12.7-4.9l0,0h0     c0.7-0.6,1.3-1.3,1.9-2h-3.9c-0.5-0.6-1-1.3-1.4-1.9h6.7c0.4-0.6,0.8-1.3,1.1-2h-8.9c-0.3-0.6-0.6-1.3-0.8-2h10.4     c0.6-1.9,1-3.9,1-6c0-1.4-0.2-2.7-0.4-4H26.2c0.1-0.7,0.3-1.3,0.5-2h10.4c-0.2-0.7-0.5-1.4-0.8-2h-8.8c0.3-0.7,0.7-1.3,1.1-2h6.7     c-0.4-0.7-0.9-1.4-1.5-2h-3.7c0.6-0.7,1.2-1.3,1.9-1.9c-3.3-3.1-7.8-4.9-12.7-4.9C19.3,13.1,19.3,13.1,19.2,13.1z" fill="#FF5050" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path d="M0.5,32c0,10.4,8.4,18.9,18.9,18.9c4.9,0,9.3-1.9,12.7-4.9l0,0h0c0.7-0.6,1.3-1.3,1.9-2h-3.9     c-0.5-0.6-1-1.3-1.4-1.9h6.7c0.4-0.6,0.8-1.3,1.1-2h-8.9c-0.3-0.6-0.6-1.3-0.8-2h10.4c0.6-1.9,1-3.9,1-6c0-1.4-0.2-2.7-0.4-4     H26.2c0.1-0.7,0.3-1.3,0.5-2h10.4c-0.2-0.7-0.5-1.4-0.8-2h-8.8c0.3-0.7,0.7-1.3,1.1-2h6.7c-0.4-0.7-0.9-1.4-1.5-2h-3.7     c0.6-0.7,1.2-1.3,1.9-1.9c-3.3-3.1-7.8-4.9-12.7-4.9c0,0-0.1,0-0.1,0" fill="#E52836" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path d="M19.4,50.9c4.9,0,9.3-1.9,12.7-4.9l0,0h0c0.7-0.6,1.3-1.3,1.9-2h-3.9c-0.5-0.6-1-1.3-1.4-1.9h6.7     c0.4-0.6,0.8-1.3,1.1-2h-8.9c-0.3-0.6-0.6-1.3-0.8-2h10.4c0.6-1.9,1-3.9,1-6c0-1.4-0.2-2.7-0.4-4H26.2c0.1-0.7,0.3-1.3,0.5-2     h10.4c-0.2-0.7-0.5-1.4-0.8-2h-8.8c0.3-0.7,0.7-1.3,1.1-2h6.7c-0.4-0.7-0.9-1.4-1.5-2h-3.7c0.6-0.7,1.2-1.3,1.9-1.9     c-3.3-3.1-7.8-4.9-12.7-4.9c0,0-0.1,0-0.1,0" fill="#CB2026" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <g>
                                                        <path d="M26.1,36.8l0.3-1.7c-0.1,0-0.3,0.1-0.5,0.1c-0.7,0-0.8-0.4-0.7-0.6l0.6-3.5h1.1l0.3-1.9h-1l0.2-1.2h-2      c0,0-1.2,6.6-1.2,7.4c0,1.2,0.7,1.7,1.6,1.7C25.4,37.1,25.9,36.9,26.1,36.8z" fill="#FFFFFF" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M26.8,33.6c0,2.8,1.9,3.5,3.5,3.5c1.5,0,2.1-0.3,2.1-0.3l0.4-1.9c0,0-1.1,0.5-2.1,0.5      c-2.2,0-1.8-1.6-1.8-1.6h4.1c0,0,0.3-1.3,0.3-1.8c0-1.3-0.7-2.9-2.9-2.9C28.3,28.9,26.8,31.1,26.8,33.6z M30.3,30.7      c1.1,0,0.9,1.3,0.9,1.4H29C29,32,29.2,30.7,30.3,30.7z" fill="#FFFFFF" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M43,36.8l0.4-2.2c0,0-1,0.5-1.7,0.5c-1.4,0-2-1.1-2-2.3c0-2.4,1.2-3.7,2.6-3.7c1,0,1.8,0.6,1.8,0.6      l0.3-2.1c0,0-1.2-0.5-2.3-0.5c-2.3,0-4.6,2-4.6,5.8c0,2.5,1.2,4.2,3.6,4.2C41.9,37.1,43,36.8,43,36.8z" fill="#FFFFFF" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M15.1,28.9c-1.4,0-2.4,0.4-2.4,0.4l-0.3,1.7c0,0,0.9-0.4,2.2-0.4c0.7,0,1.3,0.1,1.3,0.7      c0,0.4-0.1,0.5-0.1,0.5s-0.6,0-0.9,0c-1.7,0-3.6,0.7-3.6,3c0,1.8,1.2,2.2,1.9,2.2c1.4,0,2-0.9,2.1-0.9l-0.1,0.8h1.8l0.8-5.5      C17.8,29,15.8,28.9,15.1,28.9z M15.5,33.4c0,0.3-0.2,1.9-1.4,1.9c-0.6,0-0.8-0.5-0.8-0.8c0-0.5,0.3-1.2,1.8-1.2      C15.4,33.4,15.5,33.4,15.5,33.4z" fill="#FFFFFF" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M19.7,37c0.5,0,3,0.1,3-2.6c0-2.5-2.4-2-2.4-3c0-0.5,0.4-0.7,1.1-0.7c0.3,0,1.4,0.1,1.4,0.1l0.3-1.8      c0,0-0.7-0.2-1.9-0.2c-1.5,0-3,0.6-3,2.6c0,2.3,2.5,2.1,2.5,3c0,0.6-0.7,0.7-1.2,0.7c-0.9,0-1.8-0.3-1.8-0.3l-0.3,1.8      C17.5,36.8,18,37,19.7,37z" fill="#FFFFFF" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M59.6,27.3L59.2,30c0,0-0.8-1-1.9-1c-1.8,0-3.4,2.2-3.4,4.8c0,1.6,0.8,3.3,2.5,3.3      c1.2,0,1.9-0.8,1.9-0.8l-0.1,0.7h2l1.5-9.6L59.6,27.3z M58.7,32.6c0,1.1-0.5,2.5-1.6,2.5c-0.7,0-1.1-0.6-1.1-1.6      c0-1.6,0.7-2.6,1.6-2.6C58.3,30.9,58.7,31.4,58.7,32.6z" fill="#FFFFFF" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M4.2,36.9l1.2-7.2l0.2,7.2H7l2.6-7.2l-1.1,7.2h2.1l1.6-9.6H8.9l-2,5.9l-0.1-5.9H3.9l-1.6,9.6H4.2z" fill="#FFFFFF" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M35.2,36.9c0.6-3.3,0.7-6,2.1-5.5c0.2-1.3,0.5-1.8,0.7-2.3c0,0-0.1,0-0.4,0c-0.9,0-1.6,1.2-1.6,1.2      l0.2-1.1h-1.9l-1.3,7.8H35.2z" fill="#FFFFFF" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M47.6,28.9c-1.4,0-2.4,0.4-2.4,0.4l-0.3,1.7c0,0,0.9-0.4,2.2-0.4c0.7,0,1.3,0.1,1.3,0.7      c0,0.4-0.1,0.5-0.1,0.5s-0.6,0-0.9,0c-1.7,0-3.6,0.7-3.6,3c0,1.8,1.2,2.2,1.9,2.2c1.4,0,2-0.9,2.1-0.9l-0.1,0.8h1.8l0.8-5.5      C50.4,29,48.3,28.9,47.6,28.9z M48.1,33.4c0,0.3-0.2,1.9-1.4,1.9c-0.6,0-0.8-0.5-0.8-0.8c0-0.5,0.3-1.2,1.8-1.2      C48,33.4,48,33.4,48.1,33.4z" fill="#FFFFFF" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M52,36.9c0.6-3.3,0.7-6,2.1-5.5c0.2-1.3,0.5-1.8,0.7-2.3c0,0-0.1,0-0.4,0c-0.9,0-1.6,1.2-1.6,1.2      l0.2-1.1h-1.9l-1.3,7.8H52z" fill="#FFFFFF" />
                                                    </g>
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <g>
                                                        <path d="M23,35.4c0,1.2,0.7,1.7,1.6,1.7c0.7,0,1.3-0.2,1.5-0.3l0.3-1.7c-0.1,0-0.3,0.1-0.5,0.1      c-0.7,0-0.8-0.4-0.7-0.6l0.6-3.5h1.1l0.3-1.9h-1l0.2-1.2" fill="#DCE5E5" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M27.8,33.6c0,2.8,0.9,3.5,2.5,3.5c1.5,0,2.1-0.3,2.1-0.3l0.4-1.9c0,0-1.1,0.5-2.1,0.5      c-2.2,0-1.8-1.6-1.8-1.6h4.1c0,0,0.3-1.3,0.3-1.8c0-1.3-0.7-2.9-2.9-2.9C28.3,28.9,27.8,31.1,27.8,33.6z M30.3,30.7      c1.1,0,1.3,1.3,1.3,1.4H29C29,32,29.2,30.7,30.3,30.7z" fill="#DCE5E5" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M43,36.8l0.4-2.2c0,0-1,0.5-1.7,0.5c-1.4,0-2-1.1-2-2.3c0-2.4,1.2-3.7,2.6-3.7c1,0,1.8,0.6,1.8,0.6      l0.3-2.1c0,0-1.2-0.5-2.3-0.5c-2.3,0-3.6,2-3.6,5.8c0,2.5,0.2,4.2,2.6,4.2C41.9,37.1,43,36.8,43,36.8z" fill="#DCE5E5" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M12.4,31.1c0,0,0.9-0.4,2.2-0.4c0.7,0,1.3,0.1,1.3,0.7c0,0.4-0.1,0.5-0.1,0.5s-0.6,0-0.9,0      c-1.7,0-3.6,0.7-3.6,3c0,1.8,1.2,2.2,1.9,2.2c1.4,0,2-0.9,2.1-0.9l-0.1,0.8h1.8l0.8-5.5c0-2.3-2-2.4-2.8-2.4 M16.5,33.4      c0,0.3-1.2,1.9-2.4,1.9c-0.6,0-0.8-0.5-0.8-0.8c0-0.5,0.3-1.2,1.8-1.2C15.4,33.4,16.5,33.4,16.5,33.4z" fill="#DCE5E5" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M17.5,36.8c0,0,0.6,0.2,2.3,0.2c0.5,0,3,0.1,3-2.6c0-2.5-2.4-2-2.4-3c0-0.5,0.4-0.7,1.1-0.7      c0.3,0,1.4,0.1,1.4,0.1l0.3-1.8c0,0-0.7-0.2-1.9-0.2c-1.5,0-2,0.6-2,2.6c0,2.3,1.5,2.1,1.5,3c0,0.6-0.7,0.7-1.2,0.7" fill="#DCE5E5" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M59.2,30c0,0-0.8-1-1.9-1c-1.8,0-2.4,2.2-2.4,4.8c0,1.6-0.2,3.3,1.5,3.3c1.2,0,1.9-0.8,1.9-0.8l-0.1,0.7      h2l1.5-9.6 M59.1,32.6c0,1.1-0.9,2.5-2,2.5c-0.7,0-1.1-0.6-1.1-1.6c0-1.6,0.7-2.6,1.6-2.6C58.3,30.9,59.1,31.4,59.1,32.6z" fill="#DCE5E5" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M4.2,36.9l1.2-7.2l0.2,7.2H7l2.6-7.2l-1.1,7.2h2.1l1.6-9.6H9.7l-2.8,5.9l-0.1-5.9H5.7l-3.4,9.6H4.2z" fill="#DCE5E5" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M33.1,36.9h2.1c0.6-3.3,0.7-6,2.1-5.5c0.2-1.3,0.5-1.8,0.7-2.3c0,0-0.1,0-0.4,0c-0.9,0-1.6,1.2-1.6,1.2      l0.2-1.1" fill="#DCE5E5" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M44.9,31.1c0,0,0.9-0.4,2.2-0.4c0.7,0,1.3,0.1,1.3,0.7c0,0.4-0.1,0.5-0.1,0.5s-0.6,0-0.9,0      c-1.7,0-3.6,0.7-3.6,3c0,1.8,1.2,2.2,1.9,2.2c1.4,0,2-0.9,2.1-0.9l-0.1,0.8h1.8l0.8-5.5c0-2.3-2-2.4-2.8-2.4 M49,33.4      c0,0.3-1.2,1.9-2.4,1.9c-0.6,0-0.8-0.5-0.8-0.8c0-0.5,0.3-1.2,1.8-1.2C48,33.4,49,33.4,49,33.4z" fill="#DCE5E5" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M49.9,36.9H52c0.6-3.3,0.7-6,2.1-5.5c0.2-1.3,0.5-1.8,0.7-2.3c0,0-0.1,0-0.4,0c-0.9,0-1.6,1.2-1.6,1.2      l0.2-1.1" fill="#DCE5E5" />
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </a></li>
                            <li><a href="#">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/razorpay-icon.png" height="40">
                                </a></li>
                        </ul>
                    </div>
                    <div class="copyright">© 2025 Crony Medi lite. All Rights Reserved</div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Loader -->
    <!-- <div id="pageLoader" class="logo-bar-loader">
        <div class="loader-content">
            <img src="images/loader-logo.png" alt="Crony Midi Lite" class="loader-logo" />
            <div class="loader-bar-wrap">
                <div class="loader-bar"></div>
            </div>
        </div>
    </div> -->
    <!------------------ Scripts Import -------------------------->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/slider.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/customize.js"></script>
    <!-- catagory-slider -->
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/slick.min.js"></script>
    <script>
    $('.stars a').on('click', function(e) {
      e.preventDefault();
      $('.stars a').removeClass('active');
      $(this).addClass('active');
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('.catagory-slider').slick({
            dots: true,
            arrows: false,
            infinite: true,
            speed: 300,
            margin: 10,
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                }
            ]
        });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('.catagory-slider-2').slick({
            dots: false,
            arrows: false,
            infinite: true,
            speed: 200,
            margin: 10,
            slidesToShow: 5,
            slidesToScroll: 5,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                }
            ]
        });
    });
    </script>
    <!-- Search Input Animation -->
    <script>
    const placeholders = [
        "What you are looking for?",
        "Search for products",
        "Find your favorite items",
        "Explore our collection",
        "Search for anything",
    ];
    let phIndex = 0;
    const input = document.getElementById('searchInput');

    // Create animated placeholder div
    let animDiv = document.createElement('div');
    animDiv.className = 'animated-placeholder';
    document.body.appendChild(animDiv);

    function positionAnimDiv() {
        const rect = input.getBoundingClientRect();
        animDiv.style.left = (rect.left + window.scrollX) + 'px';
        animDiv.style.top = (rect.top + window.scrollY) + 'px';
        animDiv.style.width = rect.width + 'px';
        animDiv.style.height = rect.height + 'px';
        animDiv.style.lineHeight = window.getComputedStyle(input).lineHeight || rect.height + 'px';
        animDiv.style.fontSize = window.getComputedStyle(input).fontSize;
        animDiv.style.fontFamily = window.getComputedStyle(input).fontFamily;
        animDiv.style.paddingLeft = window.getComputedStyle(input).paddingLeft;
    }
    positionAnimDiv();
    window.addEventListener('resize', positionAnimDiv);
    window.addEventListener('scroll', positionAnimDiv);

    function typePlaceholder(text, i = 0) {
        animDiv.textContent = text.slice(0, i);
        input.setAttribute('placeholder', animDiv.textContent);
        if (i <= text.length) {
            setTimeout(() => typePlaceholder(text, i + 1), 60);
        } else {
            setTimeout(() => erasePlaceholder(text), 1200);
        }
    }

    function erasePlaceholder(text, i = text.length) {
        animDiv.textContent = text.slice(0, i);
        input.setAttribute('placeholder', animDiv.textContent);
        if (i > 0) {
            setTimeout(() => erasePlaceholder(text, i - 1), 30);
        } else {
            phIndex = (phIndex + 1) % placeholders.length;
            setTimeout(() => typePlaceholder(placeholders[phIndex]), 300);
        }
    }

    // Initialize
    typePlaceholder(placeholders[phIndex]);

    // Hide animation on focus
    input.addEventListener('focus', () => animDiv.style.opacity = '0');
    input.addEventListener('blur', () => animDiv.style.opacity = '1');
    </script>
    <!-- Chat Box -->
    <script>
    document.getElementById('chatWithUsBtn').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('customChatBox').style.display = 'block';
    });
    document.querySelector('.close-chatbox').addEventListener('click', function() {
        document.getElementById('customChatBox').style.display = 'none';
    });
    </script>
    <!-- Loader Script -->
    <script>
    window.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            const loader = document.getElementById('pageLoader');
            if (loader) {
                loader.style.opacity = '0';
                setTimeout(() => loader.remove(), 400);
            }
        }, 4000);
    });
    </script>
    <!-- Offer Count Down -->
    <script>
    // Set your offer end date/time here (YYYY-MM-DDTHH:MM:SS)
    const offerEnd = new Date('2025-12-31T23:59:59').getTime();

    function updateCountdown() {
        const now = new Date().getTime();
        let distance = offerEnd - now;

        if (distance < 0) distance = 0;

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById('days').textContent = String(days).padStart(2, '0');
        document.getElementById('hours').textContent = String(hours).padStart(2, '0');
        document.getElementById('minutes').textContent = String(minutes).padStart(2, '0');
        document.getElementById('seconds').textContent = String(seconds).padStart(2, '0');
    }

    // Animate on change (optional, for a smooth effect)
    function animateChange(id, newValue) {
        const el = document.getElementById(id);
        if (el.textContent !== newValue) {
            el.classList.add('count-animate');
            setTimeout(() => el.classList.remove('count-animate'), 300);
        }
        el.textContent = newValue;
    }

    // Optional: Add this CSS for a simple pop animation
    const style = document.createElement('style');
    style.innerHTML = `
    .count-animate {
        animation: pop 0.3s;
    }
    @keyframes pop {
        0% { transform: scale(1); }
        50% { transform: scale(1.25); }
        100% { transform: scale(1); }
    }
    `;
    document.head.appendChild(style);

    // Use animation in updateCountdown
    function updateCountdownAnimated() {
        const now = new Date().getTime();
        let distance = offerEnd - now;

        if (distance < 0) distance = 0;

        const days = String(Math.floor(distance / (1000 * 60 * 60 * 24))).padStart(2, '0');
        const hours = String(Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))).padStart(2, '0');
        const minutes = String(Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))).padStart(2, '0');
        const seconds = String(Math.floor((distance % (1000 * 60)) / 1000)).padStart(2, '0');

        animateChange('days', days);
        animateChange('hours', hours);
        animateChange('minutes', minutes);
        animateChange('seconds', seconds);
    }

    updateCountdownAnimated();
    setInterval(updateCountdownAnimated, 1000);
    </script>
    <!-- Blog Carousel In Mobile -->
    <script>
    $(document).ready(function() {
        function initBlogCarousel() {
            if ($(window).width() < 767) {
                if (!$('.blog-carousel').hasClass('slick-initialized')) {
                    $('.blog-carousel').slick({
                        dots: true,
                        arrows: false,
                        infinite: true,
                        speed: 300,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    });
                }
            } else {
                if ($('.blog-carousel').hasClass('slick-initialized')) {
                    $('.blog-carousel').slick('unslick');
                }
            }
        }
        initBlogCarousel();
        $(window).on('resize', function() {
            initBlogCarousel();
        });
    });
    </script>
    <!-- Brand Carousel -->
    <script>
    $(document).ready(function() {
        $('.brand-carousel').slick({
            slidesToShow: 6,
            slidesToScroll: 2,
            autoplay: true,
            autoplaySpeed: 1500,
            arrows: false,
            dots: false,
            infinite: true,
            pauseOnHover: false,
            responsive: [{
                    breakpoint: 1200,
                    settings: { slidesToShow: 4 }
                },
                {
                    breakpoint: 992,
                    settings: { slidesToShow: 3 }
                },
                {
                    breakpoint: 768,
                    settings: { slidesToShow: 2 }
                },
                {
                    breakpoint: 480,
                    settings: { slidesToShow: 1 }
                }
            ]
        });
    });
    </script>
    <!-- Slick slider init for testimonial -->
    <script>
    $(document).ready(function() {
        $('.testimonial-slider').slick({
            dots: true,
            arrows: true,
            infinite: true,
            speed: 400,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: '<button type="button" class="slick-prev"></button>',
            nextArrow: '<button type="button" class="slick-next"></button>',
            adaptiveHeight: true
        });
    });
    </script>
    <?php wp_footer(); ?>
</body>
</html>
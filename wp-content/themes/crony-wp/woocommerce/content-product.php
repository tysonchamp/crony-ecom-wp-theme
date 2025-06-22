<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div class="col-lg-3 col-md-3 col-6">
	<div class="card border-0 rounded-4 shadow-lg">
		<a href="<?php the_permalink(); ?>" class="card-img">
			<img src="<?php echo esc_url( $product->get_image_id() ? wp_get_attachment_image_url( $product->get_image_id(), 'full' ) : wc_placeholder_img_src() ); ?>" alt="" class="img-fluid square-img">
		</a>
		<div class="card-body p-4">
			<div class="info">
				<a href="<?php the_permalink(); ?>" class="fs-5">
					<?php the_title(); ?>
				</a>
			</div>
			<div class="price d-flex align-items-center">
				<div class="left d-flex align-items-center gap-2">
					<!-- <strong class="fs-4">₹1999</strong>
					<span class="text-decoration-line-through text-muted">₹2499</span> -->
					<?php echo $product->get_price_html(); ?>
				</div>
				<div class="right">
					<span class="text-success">
						<span>
							<i class="bi bi-star-fill"></i>
							<?php echo $product->get_average_rating(); ?>
						</span>
						(<?php echo $product->get_review_count(); ?>)
					</span>
				</div>
			</div>
			<a href="<?php the_permalink(); ?>" class="btn btn-primary mt-3">Add to Cart</a>
		</div>
	</div>
</div>

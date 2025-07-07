<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.8.0
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$image_src = wp_get_attachment_image_src($post_thumbnail_id, 'full');
$wrapper_classes   = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ( $post_thumbnail_id ? 'with-images' : 'without-images' ),
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	)
);

$attachment_ids = $product->get_gallery_image_ids();
?>
<div class="product-slider">
	<div class="product-images-wrapper">
		<div class="preview-image-wrapper">
			<img src="<?php echo esc_url($image_src[0]) ?>" class="preview-image" alt="Product Image" />
			<div class="arrows hide-for-desktop">
				<div class="next">
					<img src="<?php echo get_template_directory_uri(  ) ?>/images/icon-next.svg" alt="Next Icon" />
				</div>
				<div class="prev">
					<img src="<?php echo get_template_directory_uri(  ) ?>/images/icon-previous.svg" alt="Previous Icon" />
				</div>
			</div>
			<div class="count">
				<p>
					<span class="current"></span> of
					<span class="total"></span>
				</p>
			</div>
		</div>

		<div class="thumbs-wrapper hide-for-mobile">
			<?php if ( $attachment_ids && $product->get_image_id() ): ?>
				<?php $imgCounter = 1; ?>
				<?php foreach ( $attachment_ids as $attachment_id ): ?>
					<div class="thumb-image <?php echo $imgCounter == 1 ? 'active' : '' ?>">
						<img src="<?php echo wp_get_attachment_image_src($attachment_id, 'full')[0] ?>" alt="Product Thumb Image" />
					</div>
				<?php $imgCounter++; ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</div>

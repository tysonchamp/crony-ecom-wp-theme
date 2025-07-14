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
<div class="product-carousel">
	<div class="main-slider slider-for">
		<?php 
			$featured_video = get_field('featured_video');
			// extract the video id from the url
			$video_id = explode('v=', $featured_video);
			$video_id = end($video_id);
		?>
		<?php if ( $attachment_ids && $product->get_image_id() ): ?>
			<?php $imgCounter = 1; ?>
			<?php foreach ( $attachment_ids as $attachment_id ): ?>
				<div class="slider-item">
					<img src="<?php echo wp_get_attachment_image_src($attachment_id, 'full')[0] ?>" alt="Product Thumb Image" />
				</div>
			<?php $imgCounter++; ?>
			<?php endforeach; ?>
		<?php endif; ?>
		<?php if(!empty($video_id)): ?>
			<div class="thumb-item">
				<iframe src="https://www.youtube.com/embed/<?php echo esc_attr( $video_id ); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
			</div>
		<?php endif; ?>
	</div>
	<div class="thumbnail-slider slider-nav">
		<?php if ( $attachment_ids && $product->get_image_id() ): ?>
			<?php $imgCounter = 1; ?>
			<?php foreach ( $attachment_ids as $attachment_id ): ?>
				<div class="thumb-item">
					<img src="<?php echo wp_get_attachment_image_src($attachment_id, 'full')[0] ?>" alt="Product Thumb Image" />
				</div>
			<?php $imgCounter++; ?>
			<?php endforeach; ?>
		<?php endif; ?>
		<?php $video_thumbnail = get_field('video_thumbnail'); ?>
		<?php if ( $video_thumbnail ): ?>
			<div class="thumb-item video-thumbnail">
				<img src="<?php echo $video_thumbnail; ?>">
			</div>
		<?php endif; ?>
	</div>
</div>

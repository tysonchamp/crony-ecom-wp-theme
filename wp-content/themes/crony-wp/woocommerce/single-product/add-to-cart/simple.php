<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

echo wc_get_stock_html( $product ); // WPCS: XSS ok.

if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>
	<div class="block highlight-block">
		<h5 class="block-title">Why you'll love it?</h5>
		<ul class="bullet play_i">
			<li>At vero eos et accusamus</li>
			<li>Dignissimos ducimus qui blanditiis</li>
			<li>Praesentium voluptatum deleniti atque</li>
		</ul>
	</div>
	<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
		<div class="d-flex mt15 s_form">
			<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

			<?php
			do_action( 'woocommerce_before_add_to_cart_quantity' );

			woocommerce_quantity_input(
				array(
					'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
					'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
					'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
				)
			);

			do_action( 'woocommerce_after_add_to_cart_quantity' );
			?>

			<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="btn btn-primary single_add_to_cart_button button alt<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

			<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

		</div>
	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
	
	<div class="block coupone">
		<h5 class="small-title icon offer"><?php echo get_field('offer_box_title'); ?></h5>
		<div class="owl-carousel" id="coupone_slider">
			<?php if(have_rows('offers_boxes')): ?>
				<?php while(have_rows('offers_boxes')): the_row(); ?>
					<div class="item">
						<div class="card text-bg-light mb-3">
							<div class="card-header"><i class="bi bi-award"></i> <?php echo get_sub_field('offer_title'); ?></div>
							<div class="card-body">
								<p class="card-text"><?php echo get_sub_field('offer_texts'); ?></p>
								<!-- <a href="#">See more</a> -->
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
	<div class="block features">
		<div class="d-flex">
			<?php if(have_rows('all_features')): ?>
				<?php while(have_rows('all_features')): the_row(); ?>
					<div class="feature-item">
						<img src="<?php echo get_sub_field('feature_icon'); ?>" alt="">
						<h6><strong><?php echo get_sub_field('feature_title'); ?></strong> <br><?php echo get_sub_field('feature_texts'); ?></h6>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>

	<div class="accordion" id="accordionPanelsStayOpenExample">
		<div class="accordion-item">
			<h2 class="accordion-header">
				<button class="accordion-button" type="button" data-bs-toggle="collapse"
					data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
					aria-controls="panelsStayOpen-collapseOne">
					Check Delivery
				</button>
			</h2>
			<div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
				<div class="accordion-body">
					<div class="block delivery">
						<div class="card">
							<div class="card-body">
								<input type="text" class="form-control"
									placeholder="Enter PIN Code">
								<ul class="iconic_list">
									<li><i class="bi bi-box-seam"></i> <strong>Express
											delivery</strong> might be available</li>
									<li><i class="bi bi-credit-card"></i> <strong>Pay on delivery
											delivery</strong> might be available</li>
									<li><i class="bi bi-arrow-left-right"></i> <strong>Hassle free
											7, 15 and 30 days</strong> Return & Exchange might be
										available</li>
									<li><i class="bi bi-emoji-smile"></i> <strong>Try & Buy</strong>
										might be available</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="accordion-item">
			<h2 class="accordion-header">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
					data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
					aria-controls="panelsStayOpen-collapseTwo">
					Product Details
				</button>
			</h2>
			<div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
				<div class="accordion-body">
					<div class="block p-details">
					<?php do_action( 'woocommerce_product_meta_start' ); ?>

					<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

						<span class="sku_wrapper"><?php esc_html_e( 'SKU:', 'woocommerce' ); ?> <span class="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></span>

					<?php endif; ?>

					<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</span>' ); ?>

					<?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'woocommerce' ) . ' ', '</span>' ); ?>

					<?php do_action( 'woocommerce_product_meta_end' ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>

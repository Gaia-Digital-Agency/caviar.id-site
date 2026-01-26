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
 * @see     https://docs.woocommerce.com/document/template-structure/
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
<li <?php wc_product_class( 'lg:col-span-4 col-span-12 text-center mb-5 !w-full', $product ); ?>>
    <div class="inner px-lg-5">
        <div class="product-image text-center pt-2 pb-5">
            <a href="<?= get_permalink($product->get_id()) ?>">
                <?= $product->get_image('woocommerce_thumbnail', array('class' => 'img-fluid mx-auto')) ?>
            </a>
        </div>
        <div class="product-name mb-3">
            <p class="mb-0 text-2xl lh-1 fw-bold">
                <?= $product->get_name();?>
            </p>
        </div>
        <!-- <div class="product-notes mb-2">
            <p class="font-subtheme text-themecolor mb-0 text-lg lh-1">
                <?= get_field( 'status_stock', $product->get_id() ) ?>
            </p>
        </div> -->
        <div class="product-price mb-6">
            <!-- <p class="text-lg">
                <?php var_dump(renderPriceMinMaxHTML($product->get_id())) ?>
                <?= $product->get_price_html(); ?>
            </p> -->

            <?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
        </div>
        <div class="product-button">
            <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
            <!-- <a class="bg-white px-8 py-2 text-black text-decoration-none text-black hover-color-black" href="<?= get_permalink($product->get_id()) ?>">
                BUY NOW
            </a> -->
        </div>
    </div>
</li>
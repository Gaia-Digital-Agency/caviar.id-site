<?php
// Woocommerce Customization

function caviar_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'caviar_add_woocommerce_support' );


// Modify default behavior WooCommerce for archive page

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

function add_custom_description_before_shop_loop() {
    $shopId = get_option( 'woocommerce_shop_page_id' );

//     echo '<div class="container py-5"><div class="row"><div class="col-12 text-center text-2xl">';
//     echo get_field('intro_text', $shopId);
//     echo '</div></div></div>';
}

add_action( 'woocommerce_before_shop_loop', 'add_custom_description_before_shop_loop' );

// ------

// Move Description Tab to right side

// remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );

// function woocommerce_custom_description_product(){
// 	wc_get_template_part('single-product/product', 'description');
// }

// add_action( 'woocommerce_single_product_summary', 'woocommerce_custom_description_product', 15 );


// Add delivery notes to single product

function woocommerce_custom_delivery_notes_product() {
	wc_get_template_part('single-product/product', 'delivery-notes');
}
add_action( 'woocommerce_single_product_summary', 'woocommerce_custom_delivery_notes_product', 7);

// Disable Breadcrumbs

// remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

// Add Label to quantity form single product

function woocommerce_custom_label_quantity() {
	echo '<p class="text-themecolor fw-bold mb-2">QUANTITY</p>';
}

add_action('woocommerce_before_add_to_cart_quantity', 'woocommerce_custom_label_quantity', 10);

// Remove Meta from single product (Displaying sku and category)
// remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

// Remove sidebar
// remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

// Remove page title for each woocommerce page
// add_filter( 'woocommerce_show_page_title', '__return_false' );


// Add Header Image on shop page

function woocommerce_custom_archive_page_image_header() {
	$pageId = get_option( 'woocommerce_shop_page_id' );

	if(get_field('heading_text', $pageId) && get_field('heading_image', $pageId) ) {
		get_template_part('template-parts/content', 'header', array('id' => $pageId));
	}
}

add_action( 'woocommerce_before_shop_loop', 'woocommerce_custom_archive_page_image_header', 5 );

// if(is_checkout()){
// 	apply_filters('woocommerce_form_field_select2-search__field', )
// }


function wcProductResults($data){
    global $woocommerce;
    
	$productsResults = [];

	if(is_int($data)) {
		$product = wc_get_product( $data );
	} else {
		$product = $data;
	}

	// var_dump($product);
    
    if( $product->is_type('variable') ) {
		var_dump($product->get_variation_regular_price());
        // Min variation price
        $regularPriceMin = $product->get_variation_regular_price(); // Min regular price
        $salePriceMin    = $product->get_variation_sale_price(); // Min sale price
        $priceMin        = $product->get_variation_price(); // Min price
    
        // Max variation price
        $regularPriceMax = $product->get_variation_regular_price('max'); // Max regular price
        $salePriceMax    = $product->get_variation_sale_price('max'); // Max sale price
        $priceMax        = $product->get_variation_price('max'); // Max price
    
        // Multi dimensional array of all variations prices 
        $variationsPrices = $product->get_variation_prices(); 
        
        $regularPrice = $salePrice = $price = '';
        $variationPrice = [
            'min' => $product->get_variation_price(),
            'max' => $product->get_variation_price('max')
        ];
    } 
    // Other product types
    else {
        $regularPrice   = $product->get_regular_price();
        $salePrice      = $product->get_sale_price();
        $price          = $product->get_price(); 
        $variationPrice = ['min' => '', 'max' => ''];
    }
    
    array_push( $productsResults , [
       'title'          => get_the_title(),
       'productId'      => get_the_id(),
       'permalink'      => get_the_permalink(),
       'thumbnail'      => get_the_post_thumbnail(),
       'excerpt'        => get_the_excerpt(),
       'regularPrice'   => $regularPrice,
       'price'          => $price,
       'salePrice'      => $salePrice,
       'category'       => $product_cat->name,
       'variationPrice' => $variationPrice,
    ]);
    
    return $productsResults;
}


function renderPriceMinMaxHTML($product) {
	$res = wcProductResults($product);
	var_dump($res);

	var_dump($res['price']);
	var_dump($res['variationPrice']);
}


// End of Woocommerce Customization


// function woocommerce_taxonomy_archive_description() {
//         if ( is_product_taxonomy() && 0 === absint( get_query_var( 'paged' ) ) ) {
//                 $term = get_queried_object();

//                 if ( $term ) {
//                         /**
//                          * Filters the archive's raw description on taxonomy archives.
//                          *
//                          * @since 6.7.0
//                          *
//                          * @param string  $term_description Raw description text.
//                          * @param WP_Term $term             Term object for this taxonomy archive.
//                          */
//                         $term_description = apply_filters( 'woocommerce_taxonomy_archive_description_raw', $term->description, $term );

//                         if ( ! empty( $term_description ) ) {
//                                 echo '<div class="term-description container">' . wc_format_content( wp_kses_post( $term_description ) ) . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotE>                                }
//                 }
//             }
//         }
// }


remove_action('woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10);


function addCustomDesc() {

    if ( is_product_taxonomy() && 0 === absint( get_query_var( 'paged' ) ) ) {
		$term = get_queried_object();

		if ( $term ) {
			/**
			 * Filters the archive's raw description on taxonomy archives.
			 *
			 * @since 6.7.0
			 *
			 * @param string  $term_description Raw description text.
			 * @param WP_Term $term             Term object for this taxonomy archive.
			 */
			$term_description = apply_filters( 'woocommerce_taxonomy_archive_description_raw', $term->description, $term );

			if ( ! empty( $term_description ) ) {
				echo '<div class="term-description container">' . wc_format_content( wp_kses_post( $term_description ) ) . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}
	}

}
add_action('woocommerce_archive_description', 'addCustomDesc', 10);
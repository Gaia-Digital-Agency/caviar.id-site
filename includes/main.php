<?php


if ( ! function_exists( 'caviar_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Caviar 1.0
	 *
	 * @return void
	 */
	function caviar_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

	}

endif;

add_action( 'after_setup_theme', 'caviar_support' );

function caviar_styles() {
	// Register theme stylesheet.
	wp_register_style(
		'caviar-theme',
		get_template_directory_uri() . '/style.css',
		array()
	);

	wp_register_style(
		'global-css',
		get_template_directory_uri() . '/assets/css/global.css',
		array(),
		null
	);

	wp_register_script(
		'jQuery',
		'https://code.jquery.com/jquery-3.6.3.min.js',
		array(),
		false,
		true
	);
	
	wp_register_script(
		'owl-carousel',
		'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js',
		array(),
		false,
		true
	);
	
	wp_register_script(
		'global-js',
		get_template_directory_uri() . '/assets/js/global.js',
		array(),
		false,
		true
	);

	// Enqueue theme stylesheet.
	wp_enqueue_script('jQuery');
	wp_enqueue_script('owl-carousel');
	wp_enqueue_script('global-js');
	wp_enqueue_style( 'caviar-theme' );
	wp_enqueue_style( 'global-css' );

}

add_action( 'wp_enqueue_scripts', 'caviar_styles' );



// Adding title automatically

function theme_slug_setup() {
	add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'theme_slug_setup' );


function mytheme_customize_register( $wp_customize ) {
    // Add a section for the logo
    $wp_customize->add_section( 'mytheme_logo_section', array(
        'title'       => __( 'Logo', 'mytheme' ),
        'priority'    => 30,
        'description' => __( 'Upload a logo for your site', 'mytheme' ),
    ) );

    // Add a setting for the logo
    $wp_customize->add_setting( 'mytheme_logo', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    // Add the control to upload the logo
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'mytheme_logo', array(
        'label'    => __( 'Logo', 'mytheme' ),
        'section'  => 'mytheme_logo_section',
        'settings' => 'mytheme_logo',
    ) ) );
}
add_action( 'customize_register', 'mytheme_customize_register' );



function testFunc() {
	global $wp;

	echo '<script id="url-json" type="application/json">{"url": "'. $wp->request .'"}</script>';
	// var_dump($wp->request);
}

add_action('wp_footer', 'testFunc');

/**
 * Enqueue script and styles
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('app', assets_url('/dist/app.css'), [], null);
    wp_enqueue_script('app', assets_url('/dist/app.js'), ['jquery'], null, true);

    // Register script for blocks
    // If needed, separate the script per block
});


function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	$mimes['webp'] = 'image/webp';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );


function add_webp_to_allowed_filetypes($file_types) {
    $file_types['webp'] = 'image/webp';
    return $file_types;
}
add_filter('wp_check_filetype_and_ext', 'add_webp_to_allowed_filetypes', 10, 4);


add_action('acf/save_post', function ($post_id) {
    // Check if the current post type is 'category'
    if (strpos($post_id, 'term_') !== 0) {
        return;
    }

    // Get the term ID from $post_id
    $term_id = str_replace('term_', '', $post_id);

    // Check if the "Primary" field is set to true
    $is_primary = get_field('primary', 'term_' . $term_id);

    if ($is_primary) {
        // Get all categories
        $categories = get_terms([
            'taxonomy'   => 'product_cat',
            'hide_empty' => false,
        ]);

        foreach ($categories as $category) {
            // Skip the current category
            if ($category->term_id == $term_id) {
                continue;
            }

            // Check if the category has "Primary" set to true
            $category_primary = get_field('primary', 'term_' . $category->term_id);

            if ($category_primary) {
                // Set it to false
                update_field('primary', false, 'term_' . $category->term_id);
            }
        }
    }
});

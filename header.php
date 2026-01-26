<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TD5J53MK');
	
	document.addEventListener('DOMContentLoaded', function() {
		const hamburger = document.querySelectorAll('.hamburger');
		const menuMobile = document.querySelector('.menu-mobile');

		hamburger.forEach(btn => {
			btn.addEventListener('click', () => {
				menuMobile.classList.toggle('is-active');
				btn.classList.toggle('open');
			});
		});
	});
	</script>
<!-- End Google Tag Manager -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?= get_template_directory_uri() . '/assets/css/home.css' ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <title>Homepage</title> -->
    <?php wp_head() ?>
</head>
<body class="bg-black">
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TD5J53MK"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="menu-mobile fixed inset-0 bg-black lg:hidden translate-x-full transition-transform duration-300 z-[100]">

    <div class="nav">
        <div class="container py-2 px-5 relative">
            <div class="col-6">
                <div class="image-logo">
                    <a href="/" alt="Caviar Indonesia" aria-label="caviar.id">
                    <?php
                    $logo = get_theme_mod( 'mytheme_logo' );
                    if ( $logo ) : ?>
                        <img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>" width="160" height="60" style="object-fit: cover;" />
                    <?php else : ?>
                        <h1><?php bloginfo( 'name' ); ?></h1>
                    <?php endif; ?>
                    </a>
                </div>
            </div>
            <div class="flex lg:hidden justify-end items-center hamburger-wrapper absolute top-1/2 -translate-y-1/2">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <!-- <span></span> -->
                </div>
            </div>
            <div class="shopping-bag absolute right-0 top-1/2 -translate-y-1/2">
                <div class="inner-cart relative">
                    <?php if(count(WC()->cart->get_cart())) : ?>
                    <div class="cart-count absolute p-1 px-2 leading-none rounded-full"><?= count(WC()->cart->get_cart()) ?></div>
                    <?php endif ?>
                    <a href="/cart" alt="Cart" aria-label="Cart"><i class="fa fa-shopping-bag text-3xl" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="container menu-link py-5 px-5">
        <div class="grid grid-cols-12">
            <div class="col-span-12">
                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                    Brand
                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <?php foreach(get_terms(array('taxonomy' => 'product_cat', 'hide_empty' => false)) as $brand) : ?>
                            <li>
                                <a href="<?= get_category_link($brand->term_id) ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><?= $brand->name ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-span-12">
                <a href="/shop" class="py-1 subtheme-font font-bold" aria-label="Shop">Shop</a>
            </div>
            <div class="col-span-12">
                <a href="/news-event" class="py-1 subtheme-font font-bold" aria-label="News & Event">Event &amp; News</a>
            </div>
            <div class="col-span-12">
                <a href="/contact" class="py-1 subtheme-font font-bold" aria-label="Contact">Contact</a>
            </div>
        </div>
    </div>

</div>
<style>
	/* Mobile Menu Header */
	.menu-mobile {
		transform: translateX(100%);
		transition: transform 0.3s ease-in-out;
		display: none;
	}
	.menu-mobile.is-active {
		display: block;
		transform: translateX(0);
	}
	.hamburger-wrapper {
		right: 20px;
		cursor: pointer;
		z-index: 101;
	}
	.hamburger span {
		display: block;
		width: 25px;
		height: 3px;
		background: white;
		margin: 5px 0;
	}
	/* Style Hover */
	.nav-link-btn, 
	.nav-link-btn p, 
	.footer-link,
	.footer-link span,
	.social-media a i, 
	.inner-cart a i {
		text-decoration: none
		transition: 0.3s;
		color: white !important;
	}
	nav .nav-link .nav-link-btn::before {
		display: none !important;
	}
	.nav-link-btn, .nav-link-btn p, .nav-link-btn svg path {
		transition: color 0.3s ease, stroke 0.3s ease;
	}
	/* Hover */
	.nav-link-btn:hover, 
	.nav-link-btn:hover p, 
	.footer-link:hover,
	.footer-link:hover span,
	.social-media a:hover i, 
	.inner-cart a:hover i {
		color: #9c6b0b !important;
		text-decoration: none !important;
	}
	/* Dropdown Hover */
	.nav-link-btn:hover svg path {
		stroke: #9c6b0b !important;
		transition: 0.3s;
	}
	.nav-link-btn:hover svg {
		fill: #9c6b0b !important; 
	}
</style>
    <header class="fixed py-4 left-0 right-0 top-0 bg-black w-full" style="z-index: 99">
        <nav class="container relative link-wrapper">
            <ul class="hidden lg:flex px-0 text-center items-center justify-between">
                <div class="inner">
                    <li class="col"><a class="text-decoration-none nav-link-btn" href="/" aria-label="Russian Caviar House Logo">
                    <?php
                    $logo = get_theme_mod( 'mytheme_logo' );
                    if ( $logo ) : ?>
                        <img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>" height="50" style="object-fit: cover; width: 100%; height: 50px; margin-bottom: -12px;" />
                    <?php else : ?>
                        <h1><?php bloginfo( 'name' ); ?></h1>
                    <?php endif; ?>
                    </a></li>
                </div>
                <div class="inner flex items-center justify-end flex-grow pl-5">
                    <li class="nav-link px-4">
                        <a id="dropdownDefaultButton_header" data-dropdown-toggle="dropdown_header" class="text-white text-center text-decoration-none nav-link-btn cursor-pointer" type="button">
                            <p class="text-lg inline-block">BRAND</p>
                            <svg class="w-2.5 h-2.5 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </a>
                        <div id="dropdown_header" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 pl-0 text-sm text-gray-700 dark:text-gray-200 bg-themecolor text-left" aria-labelledby="dropdownDefaultButton_header">
                                <?php foreach(get_terms(array('taxonomy' => 'product_cat', 'hide_empty' => false, 'exclude' => 16)) as $brand) : ?>
                                    <li class="text-left">
                                        <a href="<?= get_category_link($brand->term_id) ?>" class="block px-4 py-2 text-decoration-none hover:bg-[#d7971a]"><?= $brand->name ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-link px-4">
                        <a id="dropdownDefaultButton_type" data-dropdown-toggle="dropdown_type" class="text-white text-center text-decoration-none nav-link-btn cursor-pointer" type="button">
                            <p class="text-lg inline-block">TYPE</p>
                            <svg class="w-2.5 h-2.5 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </a>
                        <div id="dropdown_type" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 pl-0 text-sm text-gray-700 dark:text-gray-200 bg-themecolor text-left" aria-labelledby="dropdownDefaultButton_type">
                                <?php foreach(get_terms(array('taxonomy' => 'product_tag', 'hide_empty' => false)) as $brand) : ?>
                                    <li class="text-left">
                                        <a href="<?= get_category_link($brand->term_id) ?>" class="block px-4 py-2 text-decoration-none hover:bg-[#d7971a]"><?= $brand->name ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-link pl-4 pr-8"><a class="text-decoration-none nav-link-btn" href="/contact" aria-label="Contact"><p class="text-lg inline-block">CONTACT</p></a></li>
                    <li class="nav-link px-4">
                        <div class="shopping-bag hidden lg:block">
                            <div class="inner-cart relative">
                                <?php if(count(WC()->cart->get_cart())) : ?>
                                <div class="cart-count absolute p-1 px-2 leading-none rounded-full"><?= count(WC()->cart->get_cart()) ?></div>
                                <?php endif ?>
                                <a href="/cart" aria-label="Cart" alt="Check your cart"><i class="fa fa-shopping-bag text-2xl" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-link px-4">
                        <div class="social-media">
                            <a class="text-decoration-none text-2xl" target="_blank" rel="noopener noreferrer" href="#" aria-label="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </div>
                    </li>
                    <li class="nav-link px-4">
                        <div class="social-media">
                            <a class="text-decoration-none text-2xl" target="_blank" rel="noopener noreferrer" href="#" aria-label="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        </div>
                    </li>
                </div>
            </ul>
            <!-- <div class="col-6 hidden lg:block">
                <div class="image-logo">
                    <a href="/" aria-label="Aquatir Logo">
                        <img src="/wp-content/uploads/2024/11/logo-caviar.png" alt="Russia Caviar House in Bali Indonesia" width="160" height="60" class="img-fluid">
                    </a>
                </div>
            </div> -->
            <div class="flex lg:hidden justify-end items-center hamburger-wrapper absolute top-1/2 -translate-y-1/2">
                <div id="mobile-nav-overlay" class="fixed inset-0 bg-black z-[10000] hidden flex-col transition-all duration-300">
    <div class="flex justify-between items-center p-5 border-b border-gray-900">
        <span class="text-[#9c6b0b] font-bold uppercase tracking-widest">Menu</span>
        <button id="close-mobile-menu" class="text-white text-4xl">&times;</button>
    </div>
    <div class="flex flex-col p-6 gap-5 overflow-y-auto">
        <a href="/shop" class="text-white text-lg font-semibold border-b border-gray-900 pb-3">SHOP</a>
        <a href="/news-event" class="text-white text-lg font-semibold border-b border-gray-900 pb-3">EVENT & NEWS</a>
        <a href="/contact" class="text-white text-lg font-semibold border-b border-gray-900 pb-3">CONTACT</a>
        
        <div class="mt-4">
            <p class="text-gray-500 text-xs uppercase mb-4 tracking-widest">Product Brands</p>
            <div class="flex flex-col gap-3">
                <?php foreach(get_terms(array('taxonomy' => 'product_cat', 'hide_empty' => false)) as $brand) : ?>
                    <a href="<?= get_category_link($brand->term_id) ?>" class="text-gray-300"><?= $brand->name ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<header class="lg:hidden fixed top-0 left-0 right-0 bg-black z-[1000] border-b border-gray-900 h-16 flex items-center">
    <div class="container mx-auto px-4 flex justify-between items-center">
        
        <div class="flex-shrink-0">
            <a href="/">
                <?php 
                $logo = get_theme_mod( 'mytheme_logo' );
                if ( $logo ) : ?>
                    <img src="<?= esc_url( $logo ); ?>" alt="Logo" class="h-7 w-auto object-contain" />
                <?php else : ?>
                    <span class="text-[#9c6b0b] font-bold text-sm uppercase">Caviar Indonesia</span>
                <?php endif; ?>
            </a>
        </div>

        <div class="flex items-center space-x-6">
            <div class="relative">
                <a href="/cart" class="text-white">
                    <i class="fa fa-shopping-bag text-xl"></i>
                    <?php if(count(WC()->cart->get_cart())) : ?>
                        <span class="absolute -top-2 -right-2 bg-red-600 text-white text-[9px] px-1.5 py-0.5 rounded-full font-bold">
                            <?= count(WC()->cart->get_cart()) ?>
                        </span>
                    <?php endif ?>
                </a>
            </div>

            <button id="open-mobile-menu" class="flex flex-col justify-center items-end gap-1 w-7 focus:outline-none">
                <span class="w-7 h-0.5 bg-white"></span>
                <span class="w-5 h-0.5 bg-[#9c6b0b]"></span>
                <span class="w-7 h-0.5 bg-white"></span>
            </button>
        </div>

    </div>
</header>

<div class="lg:hidden h-16"></div>
            </div>
        </nav>
    </header>

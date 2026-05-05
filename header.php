<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="preload" as="image" href="https://caviar.id/wp-content/uploads/2026/01/top-aquatir-caviar-indonesia.webp" fetchpriority="high">
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
	
	document.addEventListener('DOMContentLoaded', function() {
		const overlay = document.getElementById('caviar-mobile-overlay');
		const btnOpen = document.getElementById('caviar-open-menu');
		const btnClose = document.getElementById('caviar-close-menu');
		function closeMenu() {
			overlay.classList.remove('is-open');
			document.body.classList.remove('menu-open');
		}
		if (btnOpen && overlay) {
			btnOpen.addEventListener('click', function(e) {
				e.preventDefault();
				e.stopPropagation();
				overlay.classList.add('is-open');
				document.body.classList.add('menu-open');
			});
		}
		if (btnClose && overlay) {
			btnClose.addEventListener('click', function(e) {
				e.preventDefault();
				closeMenu();
			});
		}
		document.addEventListener('click', function(event) {
			const isOpen = overlay.classList.contains('is-open');
			const menuContent = overlay.querySelector('.m-overlay-content');
			const overlayTop = overlay.querySelector('.m-overlay-top');
			if (isOpen) {
				const isClickInsideMenu = menuContent.contains(event.target) || overlayTop.contains(event.target);
				const isClickOnOpenBtn = btnOpen.contains(event.target);
				if (!isClickInsideMenu && !isClickOnOpenBtn) {
					closeMenu();
				}
			}
		});
		const links = overlay.querySelectorAll('a');
		links.forEach(link => {
			link.addEventListener('click', () => {
				closeMenu();
			});
		});
		const allDetails = document.querySelectorAll('.m-details');
		allDetails.forEach((targetDetail) => {
			const summary = targetDetail.querySelector('summary');
			summary.addEventListener('click', (e) => {
				if (!targetDetail.hasAttribute('open')) {
					allDetails.forEach((detail) => {
						if (detail !== targetDetail && detail.hasAttribute('open')) {
							detail.removeAttribute('open');
						}
					});
				}
			});
		});
	});
	document.addEventListener('DOMContentLoaded', function() {
		const currentUrl = window.location.href.replace(/\/$/, "");
		const applyGold = (el) => {
			if (!el) return;
			el.classList.add('active-nav');
			const p = el.querySelector('p');
			if (p) p.style.setProperty('color', '#9c6b0b', 'important');
			const icon = el.querySelector('i');
			if (icon) icon.style.setProperty('color', '#9c6b0b', 'important');
			const svg = el.querySelector('svg');
			if (svg) svg.style.setProperty('stroke', '#9c6b0b', 'important');
		};
		const subMenuLinks = document.querySelectorAll('#dropdown_header a, #dropdown_type a, .m-submenu a');
		subMenuLinks.forEach(link => {
			if (currentUrl === link.href.replace(/\/$/, "")) {
				link.classList.add('active-sub-menu');
				link.style.setProperty('background-color', '#9c6b0b', 'important');
				link.style.setProperty('color', '#ffffff', 'important');
				if (link.closest('#dropdown_header')) {
					applyGold(document.getElementById('dropdownDefaultButton_header'));
				} else if (link.closest('#dropdown_type')) {
					applyGold(document.getElementById('dropdownDefaultButton_type'));
				}
				const parentDetails = link.closest('details');
				if (parentDetails) {
					parentDetails.setAttribute('open', '');
					const summary = parentDetails.querySelector('summary');
					applyGold(summary);
				}
			}
		});
		if (window.location.pathname.includes('/contact')) {
			applyGold(document.querySelector('.nav-link-btn[href*="contact"]'));
			applyGold(document.querySelector('.m-single-link[href*="contact"]'));
		}
		if (window.location.pathname.includes('/cart')) {
			const cartLinks = document.querySelectorAll('.inner-cart a, .m-icon-link[href*="/cart"]');
			cartLinks.forEach(link => applyGold(link));
		}
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
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <title>Homepage</title> -->
    <?php wp_head() ?>
</head>

<style>
    .m-single-link {
        margin-bottom: 20px;
    }
	.m-details summary:focus {
		outline: none;
	}
	.m-submenu a.active-sub-menu {
		background-color: var(--theme-color) !important;
		color: #ffffff !important;
		padding: 5px 10px;
		border-radius: 4px;
		margin-left: -5px;
	}
	.active-nav svg,
	.active-nav svg path {
		stroke: var(--theme-color) !important;
		fill: var(--theme-color) !important;
		transition: all 0.3s ease;
	}
	.active-nav p, 
	.active-nav i,
	.active-nav {
		color: var(--theme-color) !important;
	}
	.active-nav i.fa-shopping-bag,
	.active-nav i,
	a.active-nav i {
		color: var(--theme-color) !important;
	}
	#dropdown_header ul li a.active-sub-menu, 
	#dropdown_type ul li a.active-sub-menu,
	.m-submenu a.active-sub-menu {
		background-color: var(--theme-color) !important;
		color: #ffffff !important;
	}
	#dropdown_header, 
	#dropdown_type {
		display: block !important;
		visibility: hidden;
		opacity: 0;
		transform: translateY(-10px); 
		clip-path: inset(0 0 100% 0);
		transition: 
			transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), 
			opacity 0.3s ease, 
			clip-path 0.4s cubic-bezier(0.16, 1, 0.3, 1),
			visibility 0.4s;
		pointer-events: none;
		z-index: 50;
	}
	#dropdown_header:not(.hidden), 
	#dropdown_type:not(.hidden) {
		visibility: visible;
		opacity: 1;
		transform: translateY(0);
		clip-path: inset(0 0 0% 0);
		pointer-events: auto;
	}
	#dropdown_header, #dropdown_type {
		background-color: #000 !important;
		border: 1px solid var(--theme-color) !important;
		border-radius: 4px;
		margin-top: 15px;
	}
	#dropdown_header {
		background-color: black !important;
		border: 1px solid var(--theme-color) !important;
		border-radius: 4px !important;
		overflow: hidden !important;
		padding: 0 !important;
	}
	#dropdown_header ul li a, 
	#dropdown_header ul li {
		color: var(--theme-color) !important;
		background-color: black !important;
		text-decoration: none !important;
		display: block !important;
		transition: all 0.3s ease-in-out;
	}
	#dropdown_header ul li:hover,
	#dropdown_header ul li:hover a {
		background-color: var(--theme-color) !important;
		color: white !important;
	}
	#dropdown_header:hover {
		border-color: var(--theme-color) !important;
	}
	#dropdown_header ul.bg-themecolor {
		background-color: transparent !important;
	}
	#dropdown_type {
		background-color: black !important;
		border: 1px solid var(--theme-color) !important;
		border-radius: 4px !important;
		overflow: hidden !important;
		padding: 0 !important;
	}
	#dropdown_type ul li a, 
	#dropdown_type ul li {
		color: var(--theme-color) !important;
		background-color: black !important;
		text-decoration: none !important;
		display: block !important;
		transition: all 0.3s ease-in-out;
	}
	#dropdown_type ul li:hover,
	#dropdown_type ul li:hover a {
		background-color: var(--theme-color) !important;
		color: white !important;
	}
	#dropdown_header:hover {
		border-color: var(--theme-color) !important;
	}
	#dropdown_tpye ul.bg-themecolor {
		background-color: transparent !important;
	}
	#dropdown_type ul.bg-themecolor {
		background-color: transparent !important;
	}
@media (max-width: 1024px) {
    header.fixed.py-4.left-0.right-0.top-0.bg-black.w-full {
        display: none !important;
    }
}
@media (min-width: 1025px) {
    .caviar-mobile-header {
        display: none !important;
    }
    #caviar-mobile-overlay,
    .caviar-m-overlay {
        display: none !important;
    }
}
@media (max-width: 1024px) {
	.m-close-btn:active {
		color: var(--theme-color) !important;
	}
	.m-close-btn {
		transition: color 0.3s ease;
		outline: none;
	}
	.m-details[open] summary i {
		color: var(--theme-color) !important;
	}
	.m-details summary:active i {
		color: var(--theme-color) !important;
	}
	.m-details summary i {
		transition: transform 0.4s ease, color 0.3s ease;
	}
	.m-overlay-top .m-brand-text {
		color: #ffffff; 
		text-decoration: none !important;
		transition: color 0.3s ease;
	}
	.m-overlay-top .m-brand-text:active {
		color: var(--theme-color) !important;
	}
	.m-logo:active .m-brand-text {
		color: var(--theme-color) !important;
	}
	.m-icon-link:active i {
		color: var(--theme-color) !important;
	}
	.m-hamburger-btn:active span {
		background-color: var(--theme-color) !important;
	}
	.m-brand-text, 
	.m-icon-link i, 
	.m-hamburger-btn span {
		transition: color 0.3s ease, background-color 0.3s ease;
	}
	.m-details[open] summary {
		color: var(--theme-color) !important;
	}
	.m-single-link:active {
		color: var(--theme-color) !important;
	}
	.m-single-link:focus {
		color: var(--theme-color) !important;
		outline: none;
	}
	.m-details summary, 
	.m-single-link {
		transition: color 0.3s ease;
	}
	.m-submenu a {
		color: var(--theme-color) !important;
		opacity: 0.8;
		transition: opacity 0.3s;
	}
	.m-submenu a:hover {
		opacity: 1;
		background: var(--theme-color) !important;
		color: #fff !important;
	}
	.m-socials a i:hover {
		color: var(--theme-color) !important;
	}
	.m-details summary::-webkit-details-marker { display: none; }
	.m-details summary { list-style: none; cursor: pointer; }
	.m-details {
		border-bottom: 1px solid #111;
	}
	.m-content-wrapper {
		display: grid;
		grid-template-rows: 0fr;
		transition: grid-template-rows 0.5s cubic-bezier(0.4, 0, 0.2, 1);
	}
	.m-details[open] .m-content-wrapper {
		grid-template-rows: 1fr;
	}
	.m-submenu {
		min-height: 0;
		overflow: hidden;
		display: flex;
		flex-direction: column;
		gap: 15px;
		padding-left: 15px;
		opacity: 0;
		transform: translateY(-10px);
		transition: opacity 0.3s ease, transform 0.3s ease;
	}
	.m-details[open] .m-submenu {
		opacity: 1;
		transform: translateY(0);
		padding-bottom: 25px;
	}
	.m-details summary i {
		transition: transform 0.4s ease;
	}
	.m-details[open] summary i {
		transform: rotate(180deg);
	}
	.caviar-m-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: auto;
		max-height: 100vh;
        background: #000;
        z-index: 10000;
        display: flex;
        flex-direction: column;
        transform: translateY(-100%);
        opacity: 0;
        visibility: hidden;
        transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1), 
                    opacity 0.4s ease, 
                    visibility 0.6s;
        pointer-events: none;
		padding-bottom: 30px; 
        box-shadow: 0 10px 30px rgba(0,0,0,0.5);
    }
    .caviar-m-overlay.is-open {
        transform: translateY(0);
        opacity: 1;
        visibility: visible;
        pointer-events: auto;
    }
    body.menu-open {
        overflow: hidden;
    }
    .m-overlay-top {
        height: 70px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 20px;
        border-bottom: 1px solid #1a1a1a;
        box-sizing: border-box;
    }
    .m-top-actions {
        display: flex;
        align-items: center;
        gap: 20px;
    }
    .m-top-actions .m-icon-link {
        color: #fff;
        text-decoration: none;
        font-size: 20px;
        position: relative;
        display: flex;
        align-items: center;
    }
	.m-top-actions .m-icon-link i {
        font-size: 22px !important;
        width: 22px;
        height: 22px;
    }
    .m-close-btn {
        background: none;
        border: none;
        color: #fff;
        font-size: 35px;
        cursor: pointer;
        padding: 0;
        line-height: 1;
    }
    .m-cart-badge {
        position: absolute;
        top: -8px;
        right: -10px;
        background: var(--theme-color);
        color: white;
        font-size: 10px;
        padding: 2px 6px;
        border-radius: 50%;
    }
	.m-logo {
        text-decoration: none !important;
        outline: none;
        display: flex;
        align-items: center;
    }
    .m-brand-text {
        text-decoration: none !important;
        color: #ffffff;
        font-weight: 700;
        font-size: 18px;
        letter-spacing: 1px;
        display: inline-block;
    }
    .m-logo:hover, 
    .m-logo:focus, 
    .m-brand-text:hover {
        text-decoration: none !important;
    }
    body { padding-top: 70px !important; }
    .caviar-mobile-header {
        position: fixed;
        top: 0; left: 0; width: 100%;
        height: 70px;
        background: #000;
        z-index: 9998;
        border-bottom: 1px solid #1a1a1a;
        display: flex;
        align-items: center;
    }
    .m-nav-container {
        width: 100%;
        padding: 0 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .m-logo img { height: 35px; width: auto; }
    .m-brand-text { color: #fff; font-weight: bold; letter-spacing: 2px; }
    .m-action-group { display: flex; align-items: center; gap: 20px; }
    .m-icon-link { color: #fff; font-size: 22px; position: relative; text-decoration: none; }
    .m-cart-badge {
        position: absolute;
        top: -8px; right: -10px;
        background: var(--theme-color);
        color: white;
        font-size: 10px;
        padding: 2px 6px;
        border-radius: 50%;
        font-family: Arial, sans-serif;
    }
    .m-hamburger-btn {
        background: none; border: none;
        display: flex; flex-direction: column; gap: 6px;
        cursor: pointer; padding: 0; align-items: flex-end;
    }
    .m-hamburger-btn span { display: block; width: 28px; height: 2px; background: #fff; }
    /* Overlay Styling */
    .m-overlay-top {
        display: flex; justify-content: space-between; align-items: center;
        padding: 20px; border-bottom: 1px solid #1a1a1a;
    }
    
    .m-overlay-logo { height: 30px; }
    .m-close-btn { background: none; border: none; color: #fff; font-size: 40px; cursor: pointer; }

    .m-overlay-content {
        flex-grow: 0;
        padding: 20px 25px;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        overflow-y: visible;
    }
	.m-overlay-footer {
        margin-top: 5px;
    }
    /* Menu & Dropdown */
    .m-details { margin-bottom: 20px; border-bottom: 1px solid #111; }
    .m-details summary {
        color: #fff; font-size: 22px; font-weight: bold;
        list-style: none; padding-bottom: 15px;
        display: flex; justify-content: space-between; align-items: center;
    }
    .m-submenu { 
        display: flex; flex-direction: column; 
        gap: 15px; padding: 10px 0 25px 15px; 
    }
    .m-submenu a { color: #888; text-decoration: none; font-size: 18px; }

    .m-single-link {
        color: #fff; font-size: 22px; font-weight: bold;
        text-decoration: none; display: block;
        padding-bottom: 15px; border-bottom: 1px solid #111;
    }

    /* Footer Overlay */
    .m-socials { display: flex; gap: 20px; margin-bottom: 0px; }
    .m-socials a { color: #fff; font-size: 28px; }
    .m-socials a:hover { color: var(--theme-color); }
    .m-copyright { color: #444; font-size: 12px; }
}
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
		text-decoration: none;
		transition: all 0.3s ease-in-out;
		color: white !important;
	}
	nav .nav-link .nav-link-btn::before {
		display: none !important;
	}
	.nav-link-btn, .nav-link-btn p, .nav-link-btn svg path {
		transition: color 0.3s ease, stroke 0.3s ease;
	}
	/* Hover */
    .nav-link-btn svg {
        stroke: currentColor; 
        transition: transform 0.3s ease, stroke 0.3s ease;
    }
    .nav-link:hover .nav-link-btn,
    .nav-link:hover .nav-link-btn p {
        color: var(--theme-color) !important;
    }

    .nav-link:hover .nav-link-btn svg {
        stroke: var(--theme-color) !important;
        transform: rotate(180deg);
    }
    .active-nav, 
    .active-nav p,
    .active-nav svg {
        color: var(--theme-color) !important;
        stroke: var(--theme-color) !important;
    }
    .nav-link:hover .nav-link-btn svg path,
    .active-nav svg path {
        stroke: var(--theme-color) !important;
    }
    .nav-link:hover .nav-link-btn,
    .nav-link:hover .nav-link-btn p,
    .nav-link:hover .nav-link-btn svg {
        color: var(--theme-color) !important;
        stroke: var(--theme-color) !important;
    }
    .nav-link:hover .nav-link-btn svg {
        transform: rotate(180deg);
        fill: none !important;
    }
    #dropdown_header, 
    #dropdown_type {
        margin-top: 0 !important;
        top: 100%;
    }
    .nav-link {
        display: flex;
        align-items: center;
        height: 100%;
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .nav-link:hover #dropdown_header, 
    .nav-link:hover #dropdown_type {
        visibility: visible;
        opacity: 1;
        transform: translateY(0);
        clip-path: inset(0 0 0% 0);
        pointer-events: auto;
    }
    .nav-link:hover .nav-link-btn svg {
        transform: rotate(180deg);
        transition: transform 0.3s ease;
    }
    .nav-link-btn svg {
        transition: transform 0.3s ease;
    }
    .nav-link {
        position: relative;
        padding-bottom: 20px;
        margin-bottom: -20px;
    }
	.nav-link-btn:hover, 
	.nav-link-btn:hover p, 
	.footer-link:hover,
	.footer-link:hover span,
	.social-media a:hover i, 
	.inner-cart a:hover i {
		color: var(--theme-color) !important;
		text-decoration: none !important;
	}
	/* Dropdown Hover */
	.nav-link-btn:hover svg path {
		stroke: var(--theme-color) !important;
		transition: 0.3s;
	}
	.nav-link-btn:hover svg {
		fill: var(--theme-color) !important; 
	}
	.site-title:hover {
		color: white !important;
	}
</style>

<body class="bg-black">
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TD5J53MK"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!-- DESKTOP HEADER -->

    <header class="fixed py-4 left-0 right-0 top-0 bg-black w-full" style="z-index: 99">
        <nav class="container relative link-wrapper">
            <ul class="hidden lg:flex px-0 text-center items-center justify-between">
                <div class="inner">
                    <li class="col"><a class="text-decoration-none nav-link-btn" href="/" aria-label="Caviar Indonesia">
                    <?php
                    $logo = get_theme_mod( 'mytheme_logo' );
                    if ( $logo ) : ?>
                        <img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>" height="50" style="object-fit: cover; width: 100%; height: 50px; margin-bottom: -12px;" />
                    <?php else : ?>
                        <p style="font-size: 32px; font-weight: bold; color: #ffffff !important; cursor: default; pointer-events: none; margin: 0;"> <?php bloginfo( 'name' ); ?> </p>
                    <?php endif; ?>
                    </a></li>
                </div>
                <div class="inner flex items-center justify-end flex-grow pl-5">
                    <li class="nav-link px-4">
                        <a id="dropdownDefaultButton_type" data-dropdown-toggle="dropdown_type" class="text-white text-center text-decoration-none nav-link-btn cursor-pointer" type="button">
                            <p class="text-lg inline-block">Caviar</p>
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
                    <li class="nav-link px-4">
                        <a id="dropdownDefaultButton_header" data-dropdown-toggle="dropdown_header" class="text-white text-center text-decoration-none nav-link-btn cursor-pointer" type="button">
                            <p class="text-lg inline-block">Labels</p>
                            <svg class="w-2.5 h-2.5 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </a>
                        <div id="dropdown_header" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 pl-0 text-sm text-gray-700 dark:text-gray-200 bg-themecolor text-left" aria-labelledby="dropdownDefaultButton_header">
                                <?php foreach(get_terms(array('taxonomy' => 'product_cat', 'hide_empty' => false, 'exclude' => 16, 'orderby'    => 'name', 'order' => 'ASC')) as $brand) : ?>
                                    <li class="text-left">
                                        <a href="<?= get_category_link($brand->term_id) ?>" class="block px-4 py-2 text-decoration-none hover:bg-[#d7971a]"><?= $brand->name ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-link pl-4 pr-8"><a class="text-decoration-none nav-link-btn" href="/" aria-label="Accessories"><p class="text-lg inline-block">Accessories</p></a></li>
                    <li class="nav-link pl-4 pr-8"><a class="text-decoration-none nav-link-btn" href="/contact" aria-label="Contact"><p class="text-lg inline-block">Contact</p></a></li>
                    <li class="nav-link px-4">
                        <div class="shopping-bag hidden lg:block">
                            <div class="inner-cart relative">
                                <?php if(count(WC()->cart->get_cart())) : ?>
                                <div class="cart-count absolute p-1 px-2 leading-none rounded-full"><?= count(WC()->cart->get_cart()) ?></div>
                                <?php endif ?>
                                <a href="/cart/" aria-label="Cart" alt="Check your cart"><i class="fa fa-shopping-bag text-2xl" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-link px-4">
                        <div class="social-media">
<!--                             <a class="text-decoration-none text-2xl" target="_blank" rel="noopener noreferrer" href="#" aria-label="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a> -->
                        </div>
                    </li>
                    <li class="nav-link px-4">
                        <div class="social-media">
<!--                             <a class="text-decoration-none text-2xl" target="_blank" rel="noopener noreferrer" href="#" aria-label="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a> -->
                        </div>
                    </li>
                </div>
            </ul>
        </nav>
    </header>

    <!-- MOBILE HEADER -->

	<div class="caviar-mobile-header lg:hidden">
        <div class="m-nav-container">
            <a href="/" class="m-logo">
                <?php 
                $logo = get_theme_mod( 'mytheme_logo' );
                if ( $logo ) : ?>
                    <img src="<?= esc_url( $logo ); ?>" alt="Caviar Indonesia">
                <?php else : ?>
                    <p style="font-size: 32px; font-weight: bold; color: #ffffff !important; cursor: default; pointer-events: none; margin: 0;"> <?php bloginfo( 'name' ); ?> </p>
                <?php endif; ?>
            </a>

            <div class="m-action-group">
                <a href="/cart" class="m-icon-link" aria-label="View Shopping Cart">
                    <i class="fa fa-shopping-bag"></i>
                    <?php if(WC()->cart->get_cart_contents_count() > 0) : ?>
                        <span class="m-cart-badge"><?= WC()->cart->get_cart_contents_count() ?></span>
                    <?php endif; ?>
                </a>
                <button id="caviar-open-menu" class="m-hamburger-btn" aria-label="Open Navigation Menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </div>

    <div id="caviar-mobile-overlay" class="caviar-m-overlay">
        <div class="m-overlay-top">
            <a href="/" class="m-brand-text">
                <p style="font-size: 32px; font-weight: bold; color: #ffffff !important; cursor: default; pointer-events: none; margin: 0;"> <?php bloginfo( 'name' ); ?> </p>
            </a>
            <div class="m-top-actions">
                <a href="/cart/" class="m-icon-link" aria-label="View Shopping Cart">
                    <i class="fa fa-shopping-bag"></i>
                    <?php if(WC()->cart->get_cart_contents_count() > 0) : ?>
                        <p style="font-size: 32px; font-weight: bold; color: #ffffff !important; cursor: default; pointer-events: none; margin: 0;"> <?php bloginfo( 'name' ); ?> </p>
                    <?php endif; ?>
                </a>
                <button id="caviar-close-menu" class="m-close-btn">&times;</button>
            </div>
        </div>

        <div class="m-overlay-content">
            <div class="m-menu-list">
                <details class="m-details">
                    <summary>Caviar <i class="fa fa-chevron-down"></i></summary>
                    <div class="m-content-wrapper">
                        <div class="m-submenu">
                            <?php foreach(get_terms(array('taxonomy' => 'product_tag', 'hide_empty' => false)) as $tag) : ?>
                                <a href="<?= get_category_link($tag->term_id) ?>"><?= $tag->name ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </details>
                <details class="m-details">
                    <summary>Labels <i class="fa fa-chevron-down"></i></summary>
                    <div class="m-content-wrapper"> <div class="m-submenu">
                        <?php foreach(get_terms(array('taxonomy' => 'product_cat', 'hide_empty' => false, 'exclude' => 16)) as $brand) : ?>
                            <a href="<?= get_category_link($brand->term_id) ?>"><?= $brand->name ?></a>
                        <?php endforeach; ?>
                        </div>
                    </div>
                </details>
                <a href="/" class="m-single-link">Accessories</a>
                <a href="/contact" class="m-single-link">Contact</a>
            </div>

    <!--         <div class="m-overlay-footer">
                <div class="m-socials">
                    <a href="#" aria-label="Instagram"><i class="fa fa-instagram"></i></a>
                    <a href="#" aria-label="Facebook"><i class="fa fa-facebook"></i></a>
                </div>
            </div> -->
        </div>
    </div>
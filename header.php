<!DOCTYPE html>
<html lang="en">
<head>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-TD5J53MK');</script>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= get_template_directory_uri() . '/assets/css/home.css' ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <?php wp_head() ?>

    <style>
        /* Base Styles */
        .nav-link-btn, .inner-cart a i {
            transition: 0.3s;
            color: white !important;
            text-decoration: none;
        }
        .nav-link-btn:hover, .inner-cart a i:hover {
            color: #9c6b0b !important;
        }
        /* Dropdown Desktop */
        .dropdown-menu-custom {
            display: none;
            position: absolute;
            background-color: #000;
            border: 1px solid #1a1a1a;
            min-width: 180px;
            z-index: 1000;
            top: 100%;
        }
        .nav-link:hover .dropdown-menu-custom {
            display: block;
        }
    </style>
</head>
<body class="bg-black">
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TD5J53MK" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

    <div id="mobile-nav-overlay" class="fixed inset-0 bg-black z-[10001] hidden flex-col transition-all duration-300">
        <div class="flex justify-between items-center p-5 border-b border-gray-900">
            <span class="text-[#9c6b0b] font-bold uppercase tracking-widest">Menu</span>
            <button id="close-mobile-menu" class="text-white text-4xl focus:outline-none">&times;</button>
        </div>
        <div class="flex flex-col p-6 gap-6 overflow-y-auto">
            <a href="/shop" class="text-white text-xl font-bold border-b border-gray-800 pb-3">SHOP</a>
            <a href="/news-event" class="text-white text-xl font-bold border-b border-gray-800 pb-3">EVENT & NEWS</a>
            <a href="/contact" class="text-white text-xl font-bold border-b border-gray-800 pb-3">CONTACT</a>
            <div class="mt-4">
                <p class="text-gray-500 text-xs uppercase mb-4 tracking-widest">Our Brands</p>
                <div class="grid grid-cols-1 gap-4">
                    <?php foreach(get_terms(array('taxonomy' => 'product_cat', 'hide_empty' => false)) as $brand) : ?>
                        <a href="<?= get_category_link($brand->term_id) ?>" class="text-gray-300 text-lg"><?= $brand->name ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <header class="hidden lg:block fixed top-0 left-0 right-0 bg-black z-[100] border-b border-gray-900 py-4">
        <nav class="container mx-auto flex items-center justify-between px-4">
            <div class="logo">
                <a href="/">
                    <?php $logo = get_theme_mod( 'mytheme_logo' ); ?>
                    <img src="<?= $logo ? esc_url($logo) : ''; ?>" alt="Logo" style="height: 50px; width: auto;">
                </a>
            </div>
            <ul class="flex items-center space-x-10">
                <li class="nav-link relative py-2">
                    <a class="nav-link-btn cursor-pointer uppercase font-medium tracking-wide">Brand <i class="fa fa-angle-down ml-1"></i></a>
                    <div class="dropdown-menu-custom shadow-2xl">
                        <?php foreach(get_terms(array('taxonomy' => 'product_cat', 'hide_empty' => false)) as $brand) : ?>
                            <a href="<?= get_category_link($brand->term_id) ?>" class="block py-3 px-4 text-white hover:bg-[#9c6b0b] transition text-sm"><?= $brand->name ?></a>
                        <?php endforeach; ?>
                    </div>
                </li>
                <li><a href="/shop" class="nav-link-btn uppercase font-medium tracking-wide">Shop</a></li>
                <li><a href="/news-event" class="nav-link-btn uppercase font-medium tracking-wide">News</a></li>
                <li><a href="/contact" class="nav-link-btn uppercase font-medium tracking-wide">Contact</a></li>
                <li class="relative pl-4">
                    <a href="/cart" class="inner-cart"><i class="fa fa-shopping-bag text-2xl"></i></a>
                    <?php if(count(WC()->cart->get_cart())) : ?>
                        <span class="absolute -top-2 -right-2 bg-red-600 text-white text-[10px] px-1.5 py-0.5 rounded-full font-bold"><?= count(WC()->cart->get_cart()) ?></span>
                    <?php endif; ?>
                </li>
            </ul>
        </nav>
    </header>

    <header class="lg:hidden fixed top-0 left-0 right-0 bg-black z-[1000] border-b border-gray-900 h-16 flex items-center">
        <div class="container mx-auto px-4 flex justify-between items-center w-full">
            <div class="flex-shrink-0">
                <a href="/">
                    <img src="<?= esc_url($logo); ?>" alt="Logo" class="h-7 w-auto object-contain" />
                </a>
            </div>
            <div class="flex items-center space-x-6">
                <div class="relative">
                    <a href="/cart" class="text-white"><i class="fa fa-shopping-bag text-xl"></i></a>
                    <?php if(count(WC()->cart->get_cart())) : ?>
                        <span class="absolute -top-2 -right-2 bg-red-600 text-white text-[9px] px-1.5 py-0.5 rounded-full font-bold"><?= count(WC()->cart->get_cart()) ?></span>
                    <?php endif ?>
                </div>
                <button id="open-mobile-menu" class="flex flex-col justify-center items-end gap-1.5 w-7 focus:outline-none">
                    <span class="w-7 h-0.5 bg-white"></span>
                    <span class="w-5 h-0.5 bg-[#9c6b0b]"></span>
                    <span class="w-7 h-0.5 bg-white"></span>
                </button>
            </div>
        </div>
    </header>

    <div class="h-16 lg:h-24"></div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const btnOpen = document.getElementById('open-mobile-menu');
        const btnClose = document.getElementById('close-mobile-menu');
        const overlay = document.getElementById('mobile-nav-overlay');

        if(btnOpen && btnClose && overlay) {
            btnOpen.addEventListener('click', () => {
                overlay.classList.remove('hidden');
                overlay.classList.add('flex');
                document.body.style.overflow = 'hidden'; // Lock scroll
            });
            btnClose.addEventListener('click', () => {
                overlay.classList.add('hidden');
                overlay.classList.remove('flex');
                document.body.style.overflow = ''; // Unlock scroll
            });
        }
    });
    </script>
<?php 

    $categories = get_terms([
        'taxonomy'   => 'product_cat',
        'hide_empty' => false
    ]);

    $categoryPrimary = get_terms([
        'taxonomy' => 'product_cat',
        'hide_empty' => false,
        'meta_query' => array(
            array(
                'key' => 'primary',
                'value' => '1',
                'compare' => '='
            )
        )
    ]);

?>

<script>
jQuery(document).ready(function($) {
    var $carousel = $('#brand-carousel');
    function initOwl() {
        if (window.innerWidth <= 1023) {
            if (!$carousel.hasClass('owl-loaded')) {
                $carousel.addClass('owl-carousel owl-theme'); 
                $carousel.owlCarousel({
                    loop: true,
                    margin: 15,
                    nav: false,
                    dots: true,
                    autoplay: true,
                    autoplayTimeout: 4000,
                    items: 1,
                    responsive: {
                        0: { items: 1.2 },
                        640: { items: 2.2 }
                    }
                });
            }
        } else {
            if ($carousel.hasClass('owl-loaded')) {
                $carousel.trigger('destroy.owl.carousel');
                $carousel.removeClass('owl-loaded owl-drag owl-carousel owl-theme');
            }
        }
    }
    $(window).on('load resize', function() {
        initOwl();
    });
    initOwl(); 
});
</script>

<style>
.container.py-24 .image-wrapper {
    position: relative;
    overflow: hidden;
}
.container.py-24 .image-wrapper .title-wrapper {
    position: absolute;
    bottom: 0; 
    left: 0; 
    right: 0;
    width: 100%;
    padding: 80px 20px 30px;
    background: linear-gradient(to top, 
        rgba(0, 0, 0, 0.95) 0%, 
        rgba(0, 0, 0, 0.7) 50%, 
        rgba(0, 0, 0, 0) 100%);
    transform: translateY(100%);
    opacity: 0;
    transition: all 0.4s ease-in-out !important;
    z-index: 2;
    pointer-events: none;
}
.container.py-24 .image-wrapper:hover .title-wrapper,
.container.py-24 .image-wrapper:active .title-wrapper {
    transform: translateY(0);
    opacity: 1;
}
.container.py-24 .title-wrapper p {
    margin: 0;
    color: var(--theme-color) !important;
    font-weight: bold !important;
    text-align: left;
}
@media (max-width: 1023px) {
    .custom-carousel-container {
        display: flex;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        scroll-behavior: smooth;
        gap: 15px;
        padding-bottom: 20px;
        -webkit-overflow-scrolling: touch;
    }
    .custom-carousel-container::-webkit-scrollbar { display: none; }
    .custom-carousel-container .item {
        flex: 0 0 85%;
        scroll-snap-align: center;
    }
}
@media (min-width: 1024px) {
    .custom-carousel-container {
        display: grid;
        grid-template-columns: repeat(12, minmax(0, 1fr));
        gap: 2rem;
    }
    .primary-item { grid-column: span 6; grid-row: span 6; }
    .secondary-item { grid-column: span 3; grid-row: span 3; }
}
/* Home Link Hover Product */
/* Text Hide */
.container.py-24 .image-wrapper {
    position: relative;
    overflow: hidden;
}
/* Normal State */
.container.py-24 .title-wrapper {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    width: 100%;
    padding: 80px 20px 30px;
    background: linear-gradient(to top, 
        rgba(0, 0, 0, 0.95) 0%, 
        rgba(0, 0, 0, 0.7) 50%, 
        rgba(0, 0, 0, 0) 100%);
    transform: translateY(100%);
    opacity: 0;
    transition: all 0.4s ease-in-out !important;
    z-index: 2;
}
/* State Hover */
.container.py-24 .image-wrapper:hover .title-wrapper {
    transform: translateY(0);
    opacity: 1;
}
/* Text */
.container.py-24 .title-wrapper p {
    margin: 0;
    color: var(--theme-color) !important;
    font-weight: bold !important;
    text-align: left;
}
</style>
<div class="container py-24">
    <div class="grid-title mb-8">
        <h2 class="text-3xl font-medium text-center">Best <span class="text-themecolor">Caviar Brands</span> to Try</h2>
        <p class="fw-light text-center px-4 lg:px-56">Our best caviar brands offer a refined taste of luxury. combining exceptional quality, rich flavor, and meticulous craftsmanship for an unparalleled culinary experience</p>
    </div>

    <div class="custom-carousel-container">
        <div class="item primary-item">
            <div class="image-wrapper pt-[100%] w-full relative">
                <?php
                $thumbnail_id = get_term_meta( $categoryPrimary[0]->term_id, 'thumbnail_id', true ); 
                $image = wp_get_attachment_url( $thumbnail_id ); 
                ?>
                <a href="<?= get_category_link($categoryPrimary[0]->term_id) ?>">
                    <img src="<?= $image ?>" alt="<?= $categoryPrimary[0]->name ?>" class="w-full h-full absolute inset-0 object-cover">
                    <div class="title-wrapper">
                        <p><?= $categoryPrimary[0]->name ?></p>
                    </div>
                </a>
            </div>
        </div>

        <?php $counter = 0; ?>
        <?php foreach($categories as $index => $cat) : ?>
            <?php if(!get_field('primary', $cat) && $counter <= 7 ) : ?>
            <div class="item secondary-item">
                <div class="image-wrapper pt-[100%] w-full relative">
                    <a href="<?= get_category_link($cat->term_id) ?>">
                        <?php
                        $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true ); 
                        $image = wp_get_attachment_url( $thumbnail_id ); 
                        if($image) : ?>
                            <img src="<?= $image ?>" alt="<?= $cat->name ?>" class="w-full h-full absolute inset-0 object-cover">
                        <?php else : ?>
                            <div class="w-full h-full absolute inset-0" style="background-color: #c8934d;"></div>
                        <?php endif; ?>
                        <div class="title-wrapper">
                            <p><?= $cat->name ?></p>
                        </div>
                    </a>
                </div>
            </div>
            <?php $counter++; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>
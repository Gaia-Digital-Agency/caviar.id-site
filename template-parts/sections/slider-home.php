<?php

$tags = get_terms([
    'taxonomy'   => 'product_tag',
    'hide_empty' => false,
]);

?>

<style>
/* Home High End Caviar Link */
/* Image Wrapper */
.slider-home .image-wrapper {
    position: relative;
    overflow: hidden;
    display: block;
}
/* Normal State */
.slider-home .image-wrapper a .title-wrapper {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    width: 100%;
    padding: 100px 20px 30px; 
    background: linear-gradient(to top, 
        rgba(0, 0, 0, 0.95) 0%, 
        rgba(0, 0, 0, 0.7) 50%, 
        rgba(0, 0, 0, 0) 100%);
    transform: translateY(100%);
    opacity: 0;
    transition: all 0.4s ease-in-out !important;
    z-index: 10;
}
/* Hover State */
.slider-home .image-wrapper:hover a .title-wrapper {
    transform: translateY(0);
    opacity: 1;
}
/* Text */
.slider-home .image-wrapper a .title-wrapper p,
.slider-home .image-wrapper a .title-wrapper span {
    margin: 0;
    color: var(--theme-color) !important;
    font-weight: bold !important;
    text-shadow: 1px 1px 4px rgba(0,0,0,0.5);
}
</style>

<div class="container pb-24 relative">
    <div class="slider-title mb-8">
        <h2 class="text-3xl fw-medium text-center">High-End <span class="text-themecolor">Caviar Type</span></h2>
        <p class="fw-light text-center">Experience the subtle elegance of our finest caviar selections. Each variety, from the smooth richness of Beluga to the delicate notes of Siberian Sturgeon, is thoughtfully curated to bring a touch of refinement to your dining moments. Let every taste be a gentle indulgence.</p>
    </div>
    <div class="swiper slider-home">
        <div class="swiper-wrapper">
            <?php foreach($tags as $tag) : ?>
                <div class="swiper-slide">
                    <div class="inner">
                        <div class="image-wrapper relative pt-[100%]">
                            <a href="<?= get_category_link($tag->term_id) ?>">
                                <?php if(get_field('image', $tag)) : ?>
                                    <img src="<?= get_field('image', $tag)['url'] ?>" class="absolute inset-0 w-full h-full object-cover" alt="<?= $img['alt'] ? $img['alt'] : $tag->name ?>">
                                <?php else : ?>
                                    <div class="w-full h-full absolute inset-0" style="background-color: #c8934d;"></div>
                                <?php endif; ?>
                                <div class="title-wrapper absolute bottom-4 right-4">
                                    <p class="text-white text-xl"><?= $tag->name ?></p>
                                </div>
                            </a>
                        </div>  
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<!--     <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div> -->
</div>
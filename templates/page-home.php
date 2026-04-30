<?php
/**
 * Template Name: Home Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Caviar
 */


 get_header();
 ?>

<style>
    .price-wrapper *{
        color: white;
    }
    /* Normal State Button */
    .button-wrapper a {
        color: white !important;
        transition: all 0.3s ease-in-out !important;
        display: inline-block;
    }
    /* State Hover Button */
    .button-wrapper a:hover {
        background-color: white !important;
        color: var(--theme-color) !important;
        text-decoration: none !important;
    }
</style>
<main class="padding-header-avoid-nav">

    <div class="container position-relative observe-animate"  style="
        background-image: url('https://caviar.id/wp-content/uploads/2026/01/top-aquatir-caviar-indonesia.webp');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 500px;
        padding: 40px 40px;
    " data-no-lazy="1">
        <div class="grid grid-cols-12 items-center gx-4">
            <?php if(get_field('header_section')) : ?>
                <div class="lg:col-span-8 col-span-12">
                    <div class="subheading-wrapper">
                        <?= get_field('header_section')['subheading'] ?>
                    </div>
                    <div class="heading-wrapper mb-6">
                        <?= get_field('header_section')['heading'] ?>
                    </div>
                    <div class="button-wrapper">
                        <a class="px-4 py-2 rounded bg-themecolor text-decoration-none text-white" aria-label="Shop Now" href="<?= get_field('header_section')['cta']['url'] ?>"><?= get_field('header_section')['cta']['text'] ?></a>
                    </div>
                </div>
                <div class="lg:col-span-4 col-span-12">
                    <?php if(get_field('header_section')['image']) : ?>
                    <div class="image-wrapper mb-4">
                        <img src="<?= get_field('header_section')['image']['url'] ?>" class="img-fluid" alt="">
                    </div>
                    <?php endif; ?>
                    <?php if(get_field('header_section')['image_subtitle']) : ?>
                    <div class="subtitle text-center">
                        <p class="text-themecolor fs-4 fw-bolder"><?= get_field('header_section')['image_subtitle'] ?></p>
                    </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php get_template_part('template-parts/sections/grid-home') ?>
    <?php get_template_part('template-parts/sections/slider-home') ?>

</main>
<?php

get_footer();
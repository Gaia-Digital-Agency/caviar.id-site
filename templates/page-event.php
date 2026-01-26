<?php

/**
 * Template Name: Event Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AquatirCaviar
 */


 get_header();

?>

<style>
    .image-event {
        object-fit: cover;
    }

    .date-wrapper { 
        text-align: center;
    }

    .description-wrapper {
        padding-top: 1.25rem;
    }

    .event-outer-wrapper:not(:last-child) {
        margin-bottom: 1rem;
    }

    @media(min-width: 768px) {
        .image-event {
            height: 225px;
        }

        .event-wrapper {
            border-bottom: 1px solid #dee2e6;
            border-top: 1px solid #dee2e6;
        }

        .date-wrapper {
            text-align: right;
        }

        .description-wrapper {
            padding-top: 0;
        }
    }

    @media(max-width: 767px) {
        .px-xs-0 {
            padding-left: 0;
            padding-right: 0;
        }
    }
</style>

<main class="padding-header-avoid-nav">

    <?php get_template_part('template-parts/content', 'header') ?>


    <div class="container py-5">
        <!-- <div class="row gx-5 gy-5 justify-content-center align-items-stretch"> -->
    <?php
    
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
        );

        $loop = new WP_Query($args);
        if($loop->have_posts()) :
            while($loop->have_posts()) :
                $loop->the_post();
    ?>

            <!-- <div class="col-lg-6 col-12">
                <div class="inner-container bg-white p-4 rounded">
                    <a href="<?= get_the_permalink() ?>" class="text-decoration-none">
                        <div class="heading-image mb-3">
                            <?= wp_get_attachment_image(get_field('heading_image', get_the_id()), array(600, 500), false, array('class' => 'img-fluid w-100')) ?>
                        </div>
                        <div class="title mb-5 text-center px-4">
                            <p class="text-black fs-5"><?= get_the_title() ?></p>
                        </div>
                        <div class="read-more text-center">
                            <p class="text-black borderline-bottom">READ MORE</p>
                        </div>
                    </a>
                </div>
            </div> -->

            <a href="<?= get_the_permalink() ?>" class="text-decoration-none event-outer-wrapper">
                <div class="row align-items-center event-wrapper">
                        <div class="col-12 d-md-none border-bottom"></div>
                        <div class="col-md-3 col-12 text-uppercase date-wrapper py-3 py-md-3">
                            <?= get_field('event_date') ?? '' ?>
                        </div>
                        <div class="col-md-3 col-12 image-event-wrapper px-xs-0 text-center">
                            <!-- <img class="img-fluid image-event" src="w" alt="Aperitif Events"> -->
                            <?= wp_get_attachment_image(get_field('heading_image', get_the_id()), 'full', false, array('class' => 'img-fluid image-event')) ?>
                        </div>
                        <div class="col-12 d-md-none border-top"></div>
                        <div class="col-md-6 col-12 description-wrapper text-white">
                            <h2 class="fs-2 mb-2 text-white"><?= get_the_title() ?></h2>
                            <?= get_field('intro_text') ?? '' ?>
                        </div>
                    </div>
                </a>

    <?php
            endwhile;
        endif;
    ?>
        <!-- </div> -->
    </div>

</main>

<?php

get_footer();


<?php

/**
 * Template Name: Contact Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AquatirCaviar
 */


 get_header();

?>

<style>

.wpcf7-form-control, .wpcf7-form-control:focus-visible, .wpcf7-form-control:focus {
    background-color: transparent;
    border: 0;
    border-bottom: 1px solid white;
    outline: none;
    width: 100%;
}


.wpcf7-form-control::placeholder {
    color: white;
}

</style>

<main class="padding-header-avoid-nav">

    <div class="container mb-10">
        <div class="row">
            <div class="col-12">
                <div class="heading text-center">
                    <h2 class="fs-1 borderline-bottom fw-bold"><?= get_field('heading') ? get_field('heading') : "GET IN TOUCH" ?></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row gx-10">
            <div class="col-lg-6 offset-lg-3 col-12">
                <?= get_field('contact_form') ? do_shortcode(get_field('contact_form')) : do_shortcode('[contact-form-7 id="111" title="Contact form 1"]') ?>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if(get_field('google_maps')) : ?>
                    <?= get_field('google_maps') ?>
                <?php else: ?>
                    <div style="max-width:100%;overflow:hidden;color:red;width:1280px;height:500px;" class="prevent-scroll">
                        <div id="g-mapdisplay" style="height:100%; width:100%;max-width:100%;">
                            <iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Jalan+Raya+Mas+Ubud,+Bali,+Indonesia&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
                        </div>
                        <style>
                            #g-mapdisplay img.text-marker{
                                max-width:none!important;
                                background:none!important;
                            }
                            img{
                                max-width:none;
                            }
                        </style>
                    </div> 
                <?php endif; ?>
            </div>
        </div>
    </div>

</main>

<?php

get_footer();
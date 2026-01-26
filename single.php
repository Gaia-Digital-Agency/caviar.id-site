<?php

get_header();

?>


<main class="padding-header-avoid-nav">
    <div class="heading-image mb-5" style="height: 400px;">
        <?= wp_get_attachment_image(get_field('heading_image'), 'full', false, array('class' => 'img-fluid w-100', 'style' => 'height: 400px;')) ?>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center"><?php the_title() ?></h1>
                <?php the_content() ?>
            </div>
        </div>
    </div>
</main>

<?php

get_footer();
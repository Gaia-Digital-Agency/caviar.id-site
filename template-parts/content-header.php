<?php

if($args['id']) {
    $pageId = $args['id'];
} else {
    $pageId = get_the_ID();
}

?>

<div class="outer-wrapper page-heading page-heading-<?= $pageId ?> position-relative" id="page-heading-<?= $pageId ?>" style="background-image: url(<?= wp_get_attachment_image_url(get_field('heading_image', $pageId), 'full') ?>); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="heading text-3xl">
                    <?= get_field('heading_text', $pageId) ?>
                </div>
            </div>
        </div>
    </div>
</div>
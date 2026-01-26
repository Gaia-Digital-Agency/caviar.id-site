<?php 

global $product;
$gallery = $product->get_gallery_image_ids();
$mainImage = $product->get_image_id();

?>
<div class="col-lg-5 col-12 mb-5 mb-lg-0">
    <div class="large-image mb-5" id="large-image">
        <img src="<?= wp_get_attachment_image_url($mainImage, 'full') ?>" alt="" class="img-fluid w-100">
    </div>
    <div class="owl-carousel image-gallery-carousel">
        <?php if($mainImage) : ?>
            <div class="item" >
                <img class="img-fluid active" src="<?= wp_get_attachment_image_url($mainImage) ?>" alt="" data-url="<?= wp_get_attachment_image_url($mainImage, 'full') ?>">
            </div>
        <?php endif ?>
        <?php if(!empty($gallery)) : ?>
            <?php foreach($gallery as $image) : ?>
                <div class="item">
                    <img class="img-fluid" src="<?= wp_get_attachment_image_url($image) ?>" alt="" data-url="<?= wp_get_attachment_image_url($image, 'full') ?>">
                </div>
            <?php endforeach ?>
        <?php endif ?>
    </div>
</div>
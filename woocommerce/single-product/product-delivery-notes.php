<?php global $product ?>
<?php if(get_field('delivery_notes', $product->get_id())) : ?>
<div class="delivery-notes">
    <p class="" style="color: #727272;"><?= get_field('delivery_notes', $product->get_id()) ?></p>
</div>
<?php endif ?>
<?php 

get_header();
if ( have_posts() ) :
    while ( have_posts() ) :
        the_post(); ?>

        <main class="padding-header-avoid-nav woocommerce">
            <div class="container">
                <div class="row">
                    <div class="col-12 mb-5">
                        <div class="heading-page text-center">
                            <h1 class="text-uppercase"><?= get_the_title() ?></h1>
                        </div>
                    </div>
                    <?php the_content(); ?>
                </div>
            </div>
        </main>
        <?php
    endwhile;
endif;

get_footer();
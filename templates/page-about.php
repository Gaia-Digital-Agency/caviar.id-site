<?php
/**
 * Template Name: About Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Caviar
 */


 get_header();
 ?>

<style>
    main * {
        color: black;
    }
    .image-content img {
        object-fit: cover;
    }
    .item .testimony-box {
        padding-top: 50px;
        padding-left: 40px;
        position: relative
    }

    .item .testimony-icon {
        top: 50%;
        right: -50px;
        transform: translateY(-50%);
    }
    .image-content, .image-content img {
        height: 100%;
    }
</style>

<main class="bg-white padding-header-avoid-nav">
    <div class="heading-page text-center">
        <h1>Caviar.id</h1>
    </div>
    <?php if(have_rows('about_section')) : $i = 0; ?>
        <?php while(have_rows('about_section')) : ?>
            <?php
            the_row();
            switch (get_sub_field('section_options')){
                case 'text_with_image': $i++; ?>

                    <div class="container my-lg-5 py-5">
                        <div class="row gx-5 align-items-stretch">
                            <div class="col-lg-6 col-12<?= $i % 2 == 0 ? " order-lg-1" : '' ?>">
                                <div class="image-content">
                                    <?= wp_get_attachment_image( get_sub_field('text_with_image')['image'], 'full', false, array('class' => 'img-fluid w-100') ) ?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="heading-count mb-3">
                                    <!--p class="text-themecolor fs-4 fw-bold">
                                        <?= strlen((string) $i) == 1 ? '0'.(string) $i : $i ?>
                                    </p-->
                                </div>
                                <div class="heading mb-5">
                                    <p class="fw-bold fs-4"><?= get_sub_field('text_with_image')['heading'] ?></p>
                                </div>
                                <div class="content fs-5">
                                    <?= get_sub_field('text_with_image')['text'] ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    break;

                case 'icon': ?>
                    
                    <div class="container py-5">
                        <div class="row gx-5">
                            <?php while(have_rows('icons')) : the_row(); ?>
                                <div class="col-lg-4 col-12">
                                    <div class="icon-wrapper mb-3 text-center">
                                        <?= get_sub_field('icon') ?>
                                    </div>
                                    <div class="text-wrapper text-center">
                                        <p class="text-secondary fs-4 fw-bold"><?= get_sub_field('text') ?></p>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>

                    <?php
                    break;

                case 'testimony': ?>

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8">
                                <div class="testimony-carousel">
                                    <div class="item">
                                        <div class="testimony-box p-5">
                                            <div class="quot-mark position-absolute start-0 top-0">
                                                <img class="img-fluid" src="https://www.russiancaviarhouse.id/wp-content/uploads/2023/03/testimonials-img-2-2.png" alt="">
                                            </div>
                                            <div class="testimony-text mb-5 position-relative">
                                                <?= get_sub_field('testimony')['text'] ?>
                                                <div class="testimony-icon position-absolute">
                                                    <img class="img-fluid" src="https://www.russiancaviarhouse.id/wp-content/uploads/2023/03/m-80x80-1.png" alt="">
                                                </div>
                                            </div>
                                            <div class="testimony-name">
                                                <div class="name">
                                                    <p class="mb-0"><?= get_sub_field('testimony')['name'] ?></p>
                                                </div>
                                                <div class="position">
                                                    <p class="text-themecolor font-subtheme fs-4 lh-1"><?= get_sub_field('testimony')['position'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                break;
            }
            
            ?>
        <?php endwhile; ?>
    <?php else : ?>
    <div class="container my-lg-5 py-5">
        <div class="row gx-5 align-items-stretch">
            <div class="col-lg-6 col-12">
                <div class="image-content">
                    <img class="img-fluid w-100" src="https://www.russiancaviarhouse.id/wp-content/uploads/2023/04/caviar-nature-ecology.jpg" alt="Caviar - Nature and Ecology">
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="heading-count mb-3">
                    <p class="text-themecolor fs-4 fw-bold">
                        01
                    </p>
                </div>
                <div class="heading mb-5">
                    <p class="fw-bold fs-4">Nature &amp; Ecology</p>
                </div>
                <div class="content">
                    <p class="fs-5">Dive into the world of Aquatir, where our expert team is dedicated to bringing you the finest caviar in Indonesia. We are constantly expanding our production capacity and increasing our product range to satisfy your cravings for the ultimate luxury delicacy. Our commitment to safety and quality management ensures that every bite is a taste of perfection. <br><br>At Aquatir, we are not just about providing exceptional caviar, we also take pride in our efforts to preserve the natural habitat of sturgeon fish through our natural restocking projects; we actively participate in scientific and cultural endeavors related to sturgeon breeding in Moldova, the European Community and the Customs Union. We do this to develop new sales markets and to sustainably bring our passion for quality caviar to Bali and beyond. Choose Aquatir and savor the taste of sustainable excellence in every bite. </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-lg-5 py-5">
        <div class="row gx-5 align-items-stretch">
            <div class="col-lg-6 col-12">
                <div class="heading-count mb-3">
                    <p class="text-themecolor fs-4 fw-bold">
                        02
                    </p>
                </div>
                <div class="heading mb-5">
                    <p class="fw-bold fs-4">Premium Caviar</p>
                </div>
                <div class="content">
                    <p class="fs-5">At Aquatir, we take pride in our meticulous process of crafting premium caviar for Bali's discerning market. First, the fish roes are thoroughly washed in clean, chilled water to remove burst eggs or fragments. The eggs are then quickly drained and sorted by size and color before being salted and carefully weighed. Next, our cans of caviar undergo a final inspection and labelling before being placed in a special refrigerated unit that maintains their required temperature. Finally, the caviar is delicately packed into the hermetically sealed glass or lacquered metal cans using a vacuum seaming machine, ensuring its freshness and premium quality. At Aquatir, we're passionate about delivering the finest caviar to our customers in Bali and we take pride in every step of our craft. </p>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="image-content">
                    <img class="img-fluid w-100" src="https://www.russiancaviarhouse.id/wp-content/uploads/2023/03/0.jpg" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="container my-lg-5 py-5">
        <div class="row gx-5 align-items-stretch">
            <div class="col-lg-6 col-12">
                <div class="image-content">
                    <img class="img-fluid w-100" src="https://www.russiancaviarhouse.id/wp-content/uploads/2023/03/9222.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="heading-count mb-3">
                    <p class="text-themecolor fs-4 fw-bold">
                        03
                    </p>
                </div>
                <div class="heading mb-5">
                    <p class="fw-bold fs-4">Constant Control </p>
                </div>
                <div class="content">
                    <p class="fs-5">At Aquatir, we're committed to producing high-quality, safe products that meet the demands of Bali's market. To achieve this, we invest in the latest scientific advancements and implement rigorous veterinary, sanitary and laboratory controls for every batch of raw material, containers and finished products. With our accredited laboratory and state-of-the-art equipment, we can conduct various types of research, including physicochemical and microbiological testing using traditional methods according to GOSTs. This allows us to continuously improve our internal production control and confirm the quality of our products, giving our customers in Bali the assurances they need.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row gx-5">
            <div class="col-lg-4 col-12">
                <div class="icon-wrapper mb-3 text-center">
                    <i class="dfd-icon-dinner dfd_icon_set-icon-dinner" style="font-size: 60px; color: #333;"></i>
                </div>
                <div class="text-wrapper text-center">
                    <p class="text-secondary fs-4 fw-bold">CLASSICAL TECHNOLOGY</p>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="icon-wrapper mb-3 text-center">
                    <i class="dfd-icon-compass dfd_icon_set-icon-compass" style="font-size: 60px; color: #333;"></i>
                </div>
                <div class="text-wrapper text-center">
                    <p class="text-secondary fs-4 fw-bold">YEAR-ROUND FRESH CAVIAR</p>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="icon-wrapper mb-3 text-center">
                    <i class="dfd-icon-hand_leafs dfd_icon_set-icon-hand_leafs" style="font-size: 60px; color: #333;"></i>
                </div>
                <div class="text-wrapper text-center">
                    <p class="text-secondary fs-4 fw-bold">ECOLOGICAL AND QUALITY</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container my-lg-5 py-5">
        <div class="row gx-5 align-items-stretch">
            <div class="col-lg-6 col-12">
                <div class="heading-count mb-3">
                    <p class="text-themecolor fs-4 fw-bold">
                        04
                    </p>
                </div>
                <div class="heading mb-5">
                    <p class="fw-bold fs-4">Humane Method</p>
                </div>
                <div class="content">
                    <p class="fs-5">Aquatir takes pride in producing premium-quality black caviar without preservatives, antibiotics or GMOs. We vary the salt content of our caviar from 2.5 to 5%, depending on our consumers’ preference, and we use classical and traditional caviar craftsmanship to ensure that our caviar meets the highest quality standards. <br><br>We also employ a respectful attitude towards our fish and processing methods to preserve the unique combination of taste and beneficial qualities inherent in wild fish caviar. Aquatir's qualified specialists are devoted to their craft, constantly studying and developing new trends in aquaculture. Using humane methods, we extract caviar at its most optimal stage of maturity, ensuring that it is enriched with nutrients and that all micronutrients are preserved. </p>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="image-content">
                    <img class="img-fluid w-100" src="https://caviar.id/wp-content/uploads/2023/03/Found_20756608_23640420-scaled-e1597271924640.jpg" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="container my-lg-5 py-5">
        <div class="row gx-5 align-items-stretch">
            <div class="col-lg-6 col-12">
                <div class="image-content">
                    <img class="img-fluid w-100" src="https://caviar.id/wp-content/uploads/2023/03/bg-row-img-9-2x-scaled-1.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="heading-count mb-3">
                    <p class="text-themecolor fs-4 fw-bold">
                        05
                    </p>
                </div>
                <div class="heading mb-5">
                    <p class="fw-bold fs-4">Automations and Quality</p>
                </div>
                <div class="content">
                    <p class="fs-5">We take pride in being a modern sturgeon breeding enterprise that uses the latest technologies and practices to create a perfectly eco-friendly environment. We ensure that our high-quality products meet international standards, delivering our customers only the best.<br><br>To ensure the health and productivity of our sturgeon fish, we provide them with only the highest quality feed, which contains essential micronutrients and vitamins, free from hormones, antibiotics or GMOs. This approach guarantees the purity and naturalness of our products while supporting the sustainable growth of our fish. </p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container my-lg-5 py-5">
        <div class="row gx-5 align-items-stretch">
            <div class="col-lg-6 col-12">
                <div class="heading-count mb-3">
                    <p class="text-themecolor fs-4 fw-bold">
                        06
                    </p>
                </div>
                <div class="heading mb-5">
                    <p class="fw-bold fs-4">Treat Each Fish</p>
                </div>
                <div class="content">
                    <p class="fs-5">At Aquatir, we pride ourselves on using the latest advancements in recirculating aquaculture systems (RAS) for sturgeon fish breeding. Our modern equipment and innovative technology allow for a closed water circuit, maintaining optimal oxygen levels, temperature and the other necessary parameters. This ensures that our products meet international standards while being environmentally friendly. <br><br>We prioritize the health and well-being of our fish, providing them with high-quality feed and carefully monitoring their condition with regular check-ups and tests. Our RAS technology has numerous advantages: high productivity, water conservation and the ability to produce all year-round. We are committed to providing a humane and responsible approach to sturgeon fish breeding, ensuring our fish are growing healthily, and producing premium-quality products. </p>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="image-content">
                    <img class="img-fluid w-100" src="https://caviar.id/wp-content/uploads/2023/03/Found_38669504_22771612-1.jpg" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="testimony-carousel">
                    <div class="item">
                        <div class="testimony-box p-5">
                            <div class="quot-mark position-absolute start-0 top-0">
                                <img class="img-fluid" src="https://caviar.id/wp-content/uploads/2023/03/testimonials-img-2-2.png" alt="">
                            </div>
                            <div class="testimony-text mb-5 position-relative">
                                <p class="mb-0">I have bought an amazing gift for my Dad' birthday. Even could not imagine i will find something such well presented, truly Russian sturgeon and delicious all along.<br /> Many thanks.</p>
                                <div class="testimony-icon position-absolute">
                                    <img class="img-fluid" src="https://caviar.id/wp-content/uploads/2023/03/m-80x80-1.png" alt="">
                                </div>
                            </div>
                            <div class="testimony-name">
                                <div class="name">
                                    <p class="mb-0">Herman F.</p>
                                </div>
                                <div class="position">
                                    <p class="text-themecolor font-subtheme fs-4 lh-1">Caviar Buyer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-lg-5 py-5">
        <div class="row gx-5 align-items-stretch">
            <div class="col-lg-6 col-12">
                <div class="image-content">
                    <img class="img-fluid w-100" src="https://caviar.id/wp-content/uploads/2023/03/Aquatir_052013_002-scaled-e1597273252925.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="heading-count mb-3">
                    <p class="text-themecolor fs-4 fw-bold">
                        07
                    </p>
                </div>
                <div class="heading mb-5">
                    <p class="fw-bold fs-4">From Eggs to Fries</p>
                </div>
                <div class="content">
                    <p class="fs-5">We take pride in having a full technological cycle of fish breeding - from eggs to adult fish that produce eggs. We raise our fries with utmost care and love in an ecologically clean environment, under the constant supervision of our highly qualified specialists. The fries are raised in immaculate water from artesian wells that have undergone additional filtration, ensuring the health and safety of our fish. <br><br>
In addition to producing high-quality caviar and replenishing our brood stock, we also prioritize the preservation of viable fish stock. With the supervision of international specialists and the Institute of Zoology of the Republic of Moldova, Aquatir has stocked over fifty-thousand Russian sturgeon fries into the Dniester River, contributing to restoring natural populations. Our commitment to the environment and sustainability sets us apart, making Aquatir the ideal choice for those who value ethical and responsible fish breeding practices. </p>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</main>
<?php

get_footer();
<?php
/**
 * Template Name: FAQ Page
 *
 * @package Caviar
 */

get_header();
?>

<style>
    .faq-container h2.faq-category-title:first-of-type {
        padding-top: 24px !important;
    }
    .faq-container {
        background-color: #000; 
        color: #fff; 
    }
    .faq-category-title { 
        color: var(--theme-color); 
        font-weight: 700; 
        margin-top: 50px; 
        margin-bottom: 20px; 
        text-transform: uppercase; 
        letter-spacing: 1px; 
    }
    .faq-wrapper { 
        border-top: 1px solid rgba(255,255,255,0.1); 
    }
    .faq-item {
        border-bottom: 1px solid rgba(255,255,255,0.1); 
    }
    .faq-question { 
        cursor: pointer; 
        padding: 20px 0; 
        display: flex; 
        align-items: center; 
        gap: 15px; 
        color: var(--theme-color); 
        transition: all 0.3s ease; 
        font-weight: 400; 
    }
    .faq-question i {
        font-size: 12px; 
        transition: transform 0.3s ease;
    }
    .faq-question.active {
        font-weight: 700;
    }
    .faq-question.active i {
        transform: rotate(180deg);
    }
    .faq-answer {
        max-height: 0; 
        overflow: hidden; 
        transition: max-height 0.4s ease;
    }
    .faq-answer-content {
        padding: 0 0 25px 30px; 
        color: #ffffff; 
        line-height: 1.6; 
        opacity: 0; 
        transition: opacity 0.3s ease;
    }
    .faq-question.active + .faq-answer {
        max-height: 800px;
    }
    .faq-question.active + .faq-answer .faq-answer-content {
        opacity: 1;
    }
    .faq-answer-content a {
        color: var(--theme-color); 
        text-decoration: underline;
    }
</style>

<main class="faq-container padding-header-avoid-nav">
    <div class="container py-12">
        <h1 class="text-center text-3xl font-bold mb-10">Frequently Asked Questions</h1>

        <div class="max-w-4xl mx-auto">
            <?php if( have_rows('faq_sections') ) : ?>
                <?php while( have_rows('faq_sections') ) : the_row(); ?>
                    
                    <h2 class="faq-category-title text-xl text-center"><?php the_sub_field('category_title'); ?></h2>
                    
                    <div class="faq-wrapper">
                        <?php if( have_rows('items') ) : ?>
                            <?php while( have_rows('items') ) : the_row(); ?>
                                <div class="faq-item">
                                    <div class="faq-question">
                                        <i class="fa fa-chevron-down"></i>
                                        <span class="text-themecolor"><?php the_sub_field('question'); ?></span>
                                    </div>
                                    <div class="faq-answer">
                                        <div class="faq-answer-content">
                                            <?php the_sub_field('answer'); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>

                <?php endwhile; ?>
            <?php else : ?>
                <p class="text-center opacity-50">Please fill in the FAQ content via the page editor.</p>
            <?php endif; ?>
        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const questions = document.querySelectorAll('.faq-question');
    questions.forEach(q => {
        q.addEventListener('click', () => {
            const wasActive = q.classList.contains('active');
            questions.forEach(item => item.classList.remove('active'));
            if (!wasActive) q.classList.add('active');
        });
    });
});
</script>

<?php get_footer(); ?>
<?php
/**
 * Template Name: Blog Page
 *
 * @package Caviar
 */

get_header();
?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const blogCards = document.querySelectorAll('.blog-card');

    blogCards.forEach(card => {
        const title = card.querySelector('.blog-content h2');
        const excerpt = card.querySelector('.blog-excerpt');
        
        if (title && excerpt) {
            const lineHeight = parseFloat(window.getComputedStyle(title).lineHeight);
            const titleHeight = title.offsetHeight;
            const rowCount = Math.round(titleHeight / lineHeight);
            if (rowCount >= 3) {
                excerpt.style.webkitLineClamp = "1";
            } else {
                excerpt.style.webkitLineClamp = "2";
            }
        }
    });
    window.addEventListener('resize', () => {
    });
});
</script>

<style>
    .pagination-wrapper {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 50px;
    }
    .pagination-wrapper .page-numbers {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 40px;
        height: 40px;
        padding: 0 10px;
        border: 1px solid rgba(156, 107, 11, 0.3);
        color: #fff;
        text-decoration: none;
        font-size: 14px;
        transition: all 0.3s ease;
    }
    .pagination-wrapper .page-numbers.current {
        background-color: #9c6b0b;
        border-color: #9c6b0b;
        color: #fff;
        font-weight: bold;
    }
    .pagination-wrapper .page-numbers:hover:not(.current) {
        background-color: rgba(156, 107, 11, 0.1);
        border-color: #9c6b0b;
        color: #9c6b0b;
    }
    .pagination-wrapper .next, 
    .pagination-wrapper .prev {
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .blog-container {
        background-color: #000;
        color: #fff;
    }
    .blog-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 40px 30px;
        padding-bottom: 60px;
    }
    .blog-card {
        display: flex;
        flex-direction: column;
        transition: transform 0.3s ease;
    }
    .blog-card:hover .blog-content h2,
    .blog-card:hover .blog-excerpt {
        opacity: 0.7;
    }
    .blog-thumbnail {
        width: 100%;
        aspect-ratio: 16 / 10;
        overflow: hidden;
        margin-bottom: 20px;
        background-color: #1a1a1a;
    }
    .blog-thumbnail img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .blog-content h2 {
        font-size: 20px;
        font-weight: 700;
        line-height: 1.4;
        margin-bottom: 12px;
        color: #fff;
    }
    .blog-card a {
        text-decoration: none;
    }
    .blog-excerpt {
        font-size: 14px;
        color: #ccc;
        line-height: 1.6;
        margin-bottom: 15px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .read-more {
        color: var(--theme-color) !important;
        font-size: 14px;
        font-weight: 600;
        text-transform: capitalize;
        position: relative;
        display: inline-block;
        padding-bottom: 2px;
        transition: color 0.3s ease;
    }
    .read-more::after {
        content: "";
        position: absolute;
        width: 100%;
        height: 2px;
        bottom: 0;
        left: 0;
        background-color: #9c6b0b;
        visibility: hidden;
        transform: scaleX(0);
        transform-origin: bottom left;
        transition: all 0.3s ease-in-out;
    }
    .read-more:hover::after {
        visibility: visible;
        transform: scaleX(1);
    }
    .read-more:hover {
        color: var(--theme-color) !important;
        text-decoration: none !important;
    }
    .blog-content h2 {
        font-size: 20px;
        font-weight: 700;
        line-height: 1.4;
        margin-bottom: 12px;
        color: #fff;
        transition: opacity 0.3s ease;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .blog-excerpt {
        font-size: 14px;
        color: #ccc;
        line-height: 1.6;
        margin-bottom: 15px;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        transition: opacity 0.3s ease;
        -webkit-line-clamp: 2; 
    }
</style>

<main class="blog-container padding-header-avoid-nav">
    <div class="container py-12">
        <h1 class="text-center text-3xl font-bold mb-12">Blog</h1>

        <div class="blog-grid">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 9,
                'paged' => $paged
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); ?>
                    
                    <article class="blog-card">
                        <a href="<?php the_permalink(); ?>" class="blog-thumbnail">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium_large'); ?>
                            <?php else : ?>
                                <img src="<?= get_template_directory_uri() . '/assets/images/placeholder.jpg' ?>" alt="Caviar Indonesia">
                            <?php endif; ?>
                        </a>

                        <div class="blog-content">
                            <a href="<?php the_permalink(); ?>">
                                <h2><?php the_title(); ?></h2>
                            </a>
                            
                            <div class="blog-excerpt">
                                <?php
                                if (has_excerpt()) {
                                    echo get_the_excerpt();
                                } else {
                                    echo wp_trim_words(get_the_content(), 15, '...');
                                }
                                ?>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="read-more">Read More »</a>
                        </div>
                    </article>

                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <p class="text-center opacity-50">No blog posts found.</p>
            <?php endif; ?>
        </div>

        <div class="pagination-wrapper">
            <?php 
            echo paginate_links(array(
                'total'        => $query->max_num_pages,
                'current'      => $paged,
                'format'       => '?paged=%#%',
                'show_all'     => false,
                'type'         => 'plain',
                'prev_next'    => true,
                'prev_text'    => __('« PREV'),
                'next_text'    => __('NEXT »'),
            ));
            ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
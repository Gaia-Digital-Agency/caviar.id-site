<?php
/**
 * The template for displaying all single posts
 *
 * @package Caviar
 */

get_header();
?>

<style>
    .single-post-container {
        background-color: #000;
        color: #fff;
    }
    .post-header {
        max-width: 800px;
        margin: 0 auto;
        padding: 60px 20px 30px;
    }
    .post-header h1 {
        font-size: 36px;
        font-weight: 700;
        line-height: 1.2;
    }
    .post-featured-image {
        max-width: 1000px;
        margin: 0 auto 50px;
        padding: 0 20px;
    }
    .post-featured-image img {
        width: 100%;
        height: auto;
        display: block;
    }
    .post-entry-content {
        max-width: 800px;
        margin: 0 auto;
        padding: 0 20px;
        line-height: 1.8;
        font-size: 16px;
    }
    .post-nav-divider {
        max-width: 800px;
        margin: 60px auto 0;
        border-top: 1px solid rgba(255,255,255,0.1);
    }
    .post-navigation-div {
        max-width: 800px;
        margin: 0 auto;
        padding: 40px 20px 100px;
        display: flex;
        justify-content: space-between;
        gap: 30px;
    }
    .nav-box {
        flex: 1;
        display: flex;
        align-items: center;
        gap: 15px;
        text-decoration: none !important;
    }
    .nav-box.next {
        text-align: right;
        justify-content: flex-end;
    }
    .nav-label {
        display: inline-block;
        color: #9c6b0b;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 5px;
        position: relative;
        padding-bottom: 2px;
    }
    .nav-label::after {
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
    .nav-box:hover .nav-label::after {
        visibility: visible;
        transform: scaleX(1);
    }
    .nav-title {
        display: block;
        color: #fff;
        font-size: 16px;
        font-weight: 600;
        line-height: 1.4;
    }
    .nav-title::after {
        display: none !important;
    }
    .nav-box:hover .nav-title::after {
        visibility: visible;
        transform: scaleX(1);
    }
    .nav-icon { color: #9c6b0b; font-size: 18px; }
</style>

<main class="single-post-container padding-header-avoid-nav">
    <?php while ( have_posts() ) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
        <header class="post-header">
            <h1><?php the_title(); ?></h1>
        </header>

        <?php if ( has_post_thumbnail() ) : ?>
            <div class="post-featured-image">
                <?php the_post_thumbnail('full'); ?>
            </div>
        <?php endif; ?>

        <div class="post-entry-content">
            <?php the_content(); ?>
        </div>

        <div class="post-nav-divider"></div>
        <div class="post-navigation-div">
            <?php
            $prev_post = get_previous_post();
            $next_post = get_next_post();
            ?>

            <div class="nav-wrapper-half">
                <?php if (!empty($prev_post)) : ?>
                    <a href="<?php echo get_permalink($prev_post->ID); ?>" class="nav-box prev">
                        <i class="fa fa-chevron-left nav-icon"></i>
                        <div class="nav-text">
                            <span class="nav-label">Previous</span>
                            <span class="nav-title"><?php echo get_the_title($prev_post->ID); ?></span>
                        </div>
                    </a>
                <?php endif; ?>
            </div>

            <div class="nav-wrapper-half">
                <?php if (!empty($next_post)) : ?>
                    <a href="<?php echo get_permalink($next_post->ID); ?>" class="nav-box next">
                        <div class="nav-text">
                            <span class="nav-label">Next</span>
                            <span class="nav-title"><?php echo get_the_title($next_post->ID); ?></span>
                        </div>
                        <i class="fa fa-chevron-right nav-icon"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>

    </article>

    <?php endwhile; ?>
</main>

<?php
get_footer();
<?php
/**
 * The template for displaying 404 pages (not found) for Caviar ID
 *
 * @package Caviar
 */

get_header(); 
?>

<main class="error-404-wrapper padding-header-avoid-nav">
    <div class="container">
        
        <h1 class="error-title">
            Oops! That page can’t be found.
        </h1>
        
        <p class="error-text">
            It looks like nothing was found at this location. Maybe try one of the navigation links or contact our support directly.
        </p>
        
        <div class="contact-404">
            <a href="mailto:orders@caviar.id" class="contact-link" aria-label="Email support">
                <svg width="22" height="22" viewBox="0 0 36 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M33 0.5H3C2.33696 0.5 1.70107 0.763392 1.23223 1.23223C0.763392 1.70107 0.5 2.33696 0.5 3V23C0.5 23.663 0.763392 24.2989 1.23223 24.7678C1.70107 25.2366 2.33696 25.5 3 25.5H33C33.663 25.5 34.2989 25.2366 34.7678 24.7678C35.2366 24.2989 35.5 23.663 35.5 23V3C35.5 2.33696 35.2366 1.70107 34.7678 1.23223C34.2989 0.763392 33.663 0.5 33 0.5ZM30.25 3L18 11.475L5.75 3H30.25ZM3 23V4.1375L17.2875 14.025C17.4967 14.1702 17.7453 14.2479 18 14.2479C18.2547 14.2479 18.5033 14.1702 18.7125 14.025L33 4.1375V23H3Z" fill="currentColor"/>
                </svg>
                <span>orders@caviar.id</span>
            </a>
            
            <span class="separator">|</span>
            
            <a href="tel:+6281138209698" class="contact-link" aria-label="Call support">
                <svg width="20" height="20" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M160.2 25C152.3 6.1 131.7-3.9 112.1 1.4l-5.5 1.5c-64.6 17.6-119.8 80.2-103.7 156.4 37.1 175 174.8 312.7 349.8 349.8 76.3 16.2 138.8-39.1 156.4-103.7l1.5-5.5c5.4-19.7-4.7-40.3-23.5-48.1l-97.3-40.5c-16.5-6.9-35.6-2.1-47 11.8l-38.6 47.2C233.9 335.4 177.3 277 144.8 205.3L189 169.3c13.9-11.3 18.6-30.4 11.8-47L160.2 25z" fill="currentColor"/>
                </svg>
                <span>+62 811 3820 9698</span>
            </a>
        </div>

    </div>
</main>

<style>
    .error-404-wrapper {
        padding: 150px 20px;
        text-align: center;
        background-color: #000000;
        min-height: 60vh;
        display: flex;
        align-items: center;
        font-family: 'Poppins', sans-serif;
    }
    .error-title {
        color: var(--theme-color) !important;
        font-weight: 700;
        font-size: 42px;
        margin-bottom: 20px;
        letter-spacing: 2px;
    }
    .error-text {
        color: #ffffff !important;
        font-size: 18px;
        margin-bottom: 30px;
        line-height: 1.6;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }
    .contact-404 {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 25px;
        flex-wrap: wrap;
    }
    .error-404-wrapper .contact-link {
        text-decoration: none !important;
        color: #ffffff !important; 
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 16px;
        transition: all 0.3s ease-in-out !important; 
    }
    .error-404-wrapper .contact-link span,
    .error-404-wrapper .contact-link svg,
    .error-404-wrapper .contact-link svg path {
        color: inherit !important;
        fill: currentColor !important;
        transition: inherit !important; 
    }
    .error-404-wrapper .contact-link:hover {
        color: var(--theme-color) !important;
    }
    .separator {
        color: #ffffff !important;
        opacity: 0.3;
    }
    @media (max-width: 768px) {
        .error-404-wrapper { padding: 100px 20px; }
        .error-title { font-size: 32px; }
        .error-text { font-size: 16px; }
        .contact-404 { flex-direction: column; gap: 15px; }
        .separator { display: none; }
    }
</style>

<?php
get_footer();
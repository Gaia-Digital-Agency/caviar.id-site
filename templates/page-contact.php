<?php

/**
 * Template Name: Contact Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Caviar
 */


 get_header();

?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const nameInput = document.querySelector('input[name="your-name"]');
    
    if (nameInput) {
        nameInput.addEventListener('input', function() {
            this.value = this.value.replace(/[^a-zA-Z\s]/g, '');
        });
    }
});
document.addEventListener('DOMContentLoaded', function() {
    const inputs = document.querySelectorAll('.wpcf7-form-control');
    function checkInput(el) {
        const parent = el.closest('.form-group');
        if (!parent) return;
        if (el.value.trim() !== "") {
            parent.classList.add('is-filled');
        } else {
            parent.classList.remove('is-filled');
        }
    }
    inputs.forEach(input => {
        checkInput(input);
        input.addEventListener('input', () => checkInput(input));
        input.addEventListener('blur', () => checkInput(input));
    });
});
</script>
<style>
span.wpcf7-not-valid-tip {
    position: absolute !important;
    top: 150% !important;
    left: 5px !important;
    font-size: 11px !important;
    color: #ff0000 !important;
    display: block !important;
    z-index: 1;
}
.form-group .wpcf7-form-control,
.form-group input.wpcf7-text,
.form-group input.wpcf7-email,
.form-group textarea.wpcf7-textarea {
    padding-left: 16px !important;
    padding-right: 16px !important;
}
.floating-label {
    left: 16px !important;
}
.form-group:has(textarea) .floating-label {
    top: 4px !important;
    transform: none !important;
}
.form-group:has(textarea):focus-within .floating-label,
.form-group textarea:not(:placeholder-shown) ~ .floating-label {
    top: -20px !important;
    left: 10px !important;
    padding: 0 4px !important; 
    transform: translateY(0) scale(0.8);
    color: var(--theme-color) !important;
}
textarea.wpcf7-form-control {
    padding-top: 12px !important;
    min-height: 150px; 
}
.form-group {
    position: relative;
    margin-top: 25px !important;
    margin-bottom: 20px !important;
}
.form-group:focus-within .floating-label,
.form-group.is-filled .floating-label,
.form-group .wpcf7-form-control:not(:placeholder-shown) ~ .floating-label {
    top: -20px !important;
	left: 10px !important;
	font-size: 0.8rem !important;
	transform: translateY(0) scale(0.85);
    font-size: 0.75rem !important;
    color: var(--theme-color) !important;
    font-weight: bold;
	padding: 0 5px !important;
}
.floating-label {
    position: absolute;
    left: 16px !important;
    top: 50% !important; 
	transform: translateY(-50%);
    color: rgba(255, 255, 255, 0.7);
    pointer-events: none;
    transition: all 0.3s ease;
    z-index: 10;
}
.wpcf7-form-control {
	background-color: transparent !important;
    padding-top: 5px !important;
    padding-bottom: 10px !important;
    line-height: 1.5 !important;
	border: 1px solid rgba(184, 134, 11, 0.5) !important;
    border-radius: 4px !important;
	background-color: transparent !important;
    outline: none !important;
    width: 100% !important;
    padding: 10px 0 !important;
}
.wpcf7-form-control::placeholder {
    color: transparent !important;
}
.wpcf7-spinner {
    display: none !important;
}
.wpcf7-response-output {
    margin: 16px 0 16px 0 !important;
    padding: 10px !important;
	border: none !important;
    color: var(--theme-color) !important;
    font-size: 0.9rem;
    text-align: center;
    transition: all 0.3s ease;
}
.wpcf7-form.submitting .wpcf7-response-output {
    display: block !important;
}
.wpcf7-form.submitting .wpcf7-response-output::before {
    content: "Sending your message, please wait..." !important;
    color: var(--theme-color) !important;
}
.wpcf7-form.sent .wpcf7-response-output {
	color: var(--theme-color) !important;
}
.wpcf7-form.failed .wpcf7-response-output,
.wpcf7-form.validation-failed .wpcf7-response-output,
.wpcf7-form.aborted .wpcf7-response-output {
    color: var(--theme-color) !important;
	border: none !important;
}
input.wpcf7-submit[type="submit"] {
	margin-top: 0px !important;
	border-radius: 4px !important;
	border: 2px solid var(--theme-color) !important; 
    border-radius: 4px !important;
	transition: all 0.3s ease-in-out !important;
	text-transform: uppercase !important;
	letter-spacing: 1.5px !important;
	font-size: 16px !important;
}
input.wpcf7-submit[type="submit"]:hover {
    background-color: transparent !important;
    color: var(--theme-color) !important;
    border: 2px solid var(--theme-color) !important;
}
.intouch {
	font-size: 32px !important;	
	margin-top: 24px !important;
	margin-bottom: 24px !important;
}
.wpcf7-form-control::placeholder {
    color: rgba(255, 255, 255, 0.7) !important;
}
.wpcf7-submit {
    background-color: var(--theme-color) !important;
    border: none !important;
    color: white !important;
    cursor: pointer;
    margin-top: 20px;
    padding: 12px 30px !important;
}
.maps {
	margin-bottom: 96px !important;	
	margin-top: 40px !important;
}
@media (min-width: 1025px) {
	.form {
		padding-left: 220px !important;
		padding-right: 220px !important;
	}
}
</style>

<main class="padding-header-avoid-nav">

    <div class="container mb-10">
        <div class="row">
            <div class="col-12">
                <div class="heading text-center">
                    <h1 class="intouch fw-bold"><?= get_field('heading') ? get_field('heading') : "Get In Touch" ?></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="form container">
        <div class="row gx-10">
            <div class="col-lg-6 offset-lg-3 col-12">
                <?php 
					$contact_form = get_field('contact') ? get_field('contact') : '[contact-form-7 id="c343ed0" title="Contact"]';
					echo do_shortcode($contact_form); 
				?>
            </div>
        </div>
    </div>

    <div class="maps container">
		<div class="row">
			<div class="col-12">
				<?php if(get_field('google_maps')) : ?>
					<?= get_field('google_maps') ?>
				<?php else: ?>
					<div style="max-width:100%;overflow:hidden;width:1280px;height:500px;" class="prevent-scroll">
						<div id="g-mapdisplay" style="height:100%; width:100%;max-width:100%;">
							<iframe 
								style="height:100%;width:100%;border:0;" 
								frameborder="0" 
								src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3945.7483660309174!2d115.2755513!3d-8.5238212!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd23f929f7662e5%3A0x7af256bfb8ade636!2sJl.%20Raya%20Mas%2C%20Mas%2C%20Kec.%20Ubud%2C%20Kabupaten%20Gianyar%2C%20Bali!5e0!3m2!1sid!2sid!4v1706412345678!5m2!1sid!2sid" 
								allowfullscreen="" 
								loading="lazy">
							</iframe>
						</div>
					</div> 
				<?php endif; ?>
			</div>
		</div>
	</div>

</main>

<?php

get_footer();
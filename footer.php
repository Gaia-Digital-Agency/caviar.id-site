<?php get_template_part('template-parts/content', 'feed') ?>
<style>
    /* Hover Transition */
    .footer-link, .footer-link:hover {
        text-decoration: none !important;
        color: white !important;
        transition: 0.3s;
    }
	.footer-link i, 
    .footer-link span {
        transition: color 0.3s ease-in-out !important;
        text-decoration: none !important;
    }
    /* Hover Color */
    .footer-link:hover, 
    .footer-link:hover i, 
    .footer-link:hover span {
        color: #9c6b0b !important;
    }
	.info {
		display: block !important;
		margin-left: auto !important;
		width: fit-content !important;
	}
</style>
<footer>
    <div class="container py-12 relative">
        <div class="grid grid-cols-12 gap-8">
            <div class="md:col-span-4 col-span-12">
                <div class="heading">
                    <p class="text-themecolor fw-bold">CONTACT</p>
                </div>
                <div class="content">
                    <a href="tel:+628123894471" class="footer-link flex items-center mb-3" aria-label="Phone">
                        <i class="fa fa-phone text-center" aria-hidden="true" style="width: 20px; margin-right: 12px;"></i>
                        <span class="hover:text-themecolor">+62 8123894471</span>
                    </a>
                    <a href="mailto:info@caviar.id" class="footer-link flex items-center mb-3" aria-label="Email">
                        <i class="fa fa-envelope text-center" aria-hidden="true" style="width: 20px; margin-right: 12px;"></i>
                        <span class="group-hover:text-themecolor transition-colors">info@caviar.id</span>
                    </a>
                    
                    <div class="social-media-wrapper flex flex-row items-center">
                        <a class="footer-link flex items-center mb-3" target="_blank" rel="noopener noreferrer" href="#" aria-label="Instagram" style="margin-right: 10px;">
                            <i class="fa fa-instagram" aria-hidden="true" style="width: 20px; text-align: center; font-size: 18px;"></i>
                        </a> 
                        <a class="footer-link flex items-center mb-3" target="_blank" rel="noopener noreferrer" href="#" aria-label="Facebook">
                            <i class="fa fa-facebook" aria-hidden="true" style="width: 20px; text-align: center; font-size: 18px;"></i>
                        </a>
                        </div>
                </div>
            </div>

            <div class="md:col-span-4 col-span-12">
                <div class="heading">
                    <p class="text-themecolor fw-bold">FIND US</p>
                </div>
                <div class="content">
                    <p class="text-white">Our official branch at Bali:</p>
                    <a href="#" target="_blank" class="footer-link flex items-center mb-3" aria-label="Location">
                        <i class="fa fa-map-marker text-center" aria-hidden="true" style="width: 20px; margin-right: 12px; margin-top: 4px; font-size: 18px;"></i>
                        <span>Jln. Raya Mas, Ubud, Bali, Indonesia 80571</span>
                    </a>
                </div>
            </div>

            <div class="md:col-span-4 col-span-12">
				<div class="info">
					<div class="heading">
						<p class="text-themecolor fw-bold">INFORMATION</p>
					</div>
					<div class="content flex flex-col">
						<a class="footer-link mb-3" href="/faq">FAQ</a>
						<a class="footer-link mb-3" href="/shipping-return">SHIPPING AND RETURN</a>
						<a class="footer-link mb-3" href="/terms-condition">TERMS AND CONDITION</a>
						<a class="footer-link mb-3" href="#">PAYMENT AND SECURITIES</a>
					</div>
				</div>
			</div>
        </div>
		<div class="pt-8 text-center">
            <p class="text-white opacity-50 text-sm">
                © <?php echo date("Y"); ?> Caviar ID. All Rights Reserved
            </p>
        </div>
    </div>
</footer>
    <?php wp_footer() ?>
</body>
</html>
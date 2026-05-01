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
        color: var(--theme-color) !important;
    }
	@media only screen and (min-width: 1024px) {
	  .info {
		display: block !important;
		margin-left: auto !important;
		width: fit-content !important;
		}
	}
	@media (max-width: 412px) {
        .m-address {
            line-height: 1.4 !important;
            word-break: break-word;
            padding-right: 50px;
        }
        
        .footer-link {
            display: block !important;
        }
    }
    
    /* Floating WhatsApp Styling */
    .caviar-float-wa {
        position: fixed;
        bottom: 25px;
        right: 25px;
        z-index: 9999;
        width: 60px;
        height: 60px;
        background-color: #25D366;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        transition: transform 0.3s ease, background-color 0.3s ease;
        text-decoration: none !important;
    }
    .caviar-float-wa i {
        color: white;
        font-size: 35px;
    }
    .caviar-float-wa:hover {
        background-color: #128c7e;
        text-decoration: none;
    }
    @media only screen and (min-width: 1024px) {
      .info {
        display: block !important;
        margin-left: auto !important;
        width: fit-content !important;
        }
    }
    @media (max-width: 412px) {
        .m-address {
            line-height: 1.4 !important;
            word-break: break-word;
            padding-right: 50px;
        }
        .footer-link {
            display: block !important;
        }
        .caviar-float-wa {
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
        }
        .caviar-float-wa i {
            font-size: 28px;
        }
    }
</style>

<!-- WhatsApp Floating Button -->
 <a href="https://wa.me/6281138209698?text=Hello, I'm enquiring through Caviar website..." class="caviar-float-wa" target="_blank" rel="noopener noreferrer" aria-label="Chat with us on WhatsApp">
    <i class="fa fa-whatsapp"></i>
</a>

<footer>
    <div class="container py-12 relative">
        <div class="grid grid-cols-12 gap-8">
            <div class="md:col-span-4 col-span-12">
                <div class="heading">
                    <p class="text-themecolor fw-bold">CONTACT</p>
                </div>
                <div class="content">
                    <a href="tel:+6281138209698" class="footer-link flex items-center mb-3" aria-label="Phone">
                        <i class="fa fa-phone text-center" aria-hidden="true" style="width: 20px; margin-right: 12px;"></i>
                        <span class="hover:text-themecolor">+62 81138209698</span>
                    </a>
                    <a href="mailto:orders@caviar.id" class="footer-link flex items-center mb-3" aria-label="Email">
                        <i class="fa fa-envelope text-center" aria-hidden="true" style="width: 20px; margin-right: 12px;"></i>
                        <span class="group-hover:text-themecolor transition-colors">orders@caviar.id</span>
                    </a>
                    
<!--                     <div class="social-media-wrapper flex flex-row items-center">
                        <a class="footer-link flex items-center mb-3" target="_blank" rel="noopener noreferrer" href="#" aria-label="Instagram" style="margin-right: 10px;">
                            <i class="fa fa-instagram" aria-hidden="true" style="width: 20px; text-align: center; font-size: 18px;"></i>
                        </a> 
                        <a class="footer-link flex items-center mb-3" target="_blank" rel="noopener noreferrer" href="#" aria-label="Facebook">
                            <i class="fa fa-facebook" aria-hidden="true" style="width: 20px; text-align: center; font-size: 18px;"></i>
                        </a>
                        </div> -->
                </div>
            </div>

            <div class="md:col-span-4 col-span-12">
                <div class="heading">
                    <p class="text-themecolor fw-bold">FIND US</p>
                </div>
                <div class="content">
                    <p class="text-white">Our official branch at Bali:</p>
                    <a href="https://maps.app.goo.gl/qiQtgbjPze1zdarC8" target="_blank" class="footer-link mb-3" aria-label="Location" style="display: block; text-decoration: none;">
						<div style="display: flex; align-items: flex-start;">
							<div style="flex-shrink: 0; width: 20px; margin-right: 12px; padding-top: 4px;">
								<i class="fa fa-map-marker text-center" aria-hidden="true" style="font-size: 18px; display: block;"></i>
							</div>
							<div style="flex-grow: 1;">
								<span class="m-address" style="display: block; line-height: 1.5; font-size: 16px;">
									Jln. Raya Mas, Ubud, Bali, Indonesia 80571
								</span>
							</div>
						</div>
					</a>
                </div>
            </div>

            <div class="md:col-span-4 col-span-12">
				<div class="info">
					<div class="heading">
						<p class="text-themecolor fw-bold">INFORMATION</p>
					</div>
					<div class="content flex flex-col">
						<a class="footer-link mb-3" href="/faq/">FAQ</a>
						<a class="footer-link mb-3" href="/blog/">Blog</a>
						<a class="footer-link mb-3" href="/shipping-return-policy/">Shipping and Return</a>
						<a class="footer-link mb-3" href="/terms-and-condition/">Terms and Condition</a>
						<a class="footer-link mb-3" href="/payment-securities/">Payment and Securities</a>
						<a class="footer-link mb-3" href="/privacy-policy/">Privacy Policy</a>
					</div>
				</div>
			</div>
        </div>
		<div class="pt-8 text-center">
            <p class="text-white opacity-50 text-sm">
                © <?php echo date("Y"); ?> Caviar ID. All Rights Reserved. Developed by <a href="https://gaiada.com" target="_blank" rel="noopener noreferrer" class="footer-link" aria-label="Gaia Digital Agency">Gaia Digital Agency</a>.
            </p>
        </div>
    </div>
</footer>
    <?php wp_footer() ?>
</body>
</html>
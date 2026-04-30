<?php
/**
 * Caviar functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Caviar
 * @since Caviar 1.0
 */

include_once "includes/main.php";
include_once "includes/woocommerce.php";
include_once "includes/template-tags.php";

function caviar_custom_select_script() {
    $custom_css = "
		@media (max-width: 767px) {
			html body .variations td.value {
				padding-right: 20px !important;
				width: auto !important;
			}
			html body .variations td.value .caviar-select-wrapper {
				width: 200px !important;
				min-width: 200px !important;
				max-width: 200px !important;
				display: block !important;
				margin: 0 !important;
			}
			html body .caviar-select-wrapper .caviar-trigger {
				width: 100% !important;
				min-width: 100% !important;
				max-width: 100% !important;
				box-sizing: border-box !important;
				padding: 0 15px !important;
			}
			html body .caviar-select-wrapper .caviar-options-container {
				width: 100% !important;
				min-width: 100% !important;
				max-width: 100% !important;
				left: 0 !important;
				box-sizing: border-box !important;
			}
		}
        .caviar-hidden-select { display: none !important; }
        .caviar-select-wrapper { 
            position: relative; 
            display: inline-block; 
            font-family: inherit; 
            vertical-align: middle;
			margin-right: 16px;
        }
        .caviar-trigger { 
            background: transparent; 
            color: #ffffff !important; 
            border: 1px solid #9c6b0b; 
            padding: 8px 16px;
            border-radius: 6px; 
            cursor: pointer; 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            min-width: 256px;
			height: 40px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }
        .caviar-trigger:after { 
            content: ''; 
            width: 0; height: 0; 
            margin-left: 15px;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 5px solid #9c6b0b;
            transition: transform 0.3s ease;
        }

        .caviar-select-wrapper.open .caviar-trigger:after { 
            transform: rotate(180deg); 
        }
        .caviar-options-container { 
            position: absolute; 
            top: 100%; 
            left: 0; 
            right: 0; 
            background: #000000;
            border: 1px solid #9c6b0b; 
            border-top: none;
            border-radius: 0 0 6px 6px; 
            z-index: 99999; 
            opacity: 0;
			visibility: hidden;
			transform-origin: top;
			transform: scaleY(0);
			transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.2s ease;
			
			transition: transform 0.25s cubic-bezier(0.4, 0, 1, 1), 
                opacity 0.2s ease, 
                visibility 0s linear 0.25s;
        }
        .caviar-select-wrapper.open .caviar-options-container { 
            opacity: 1; 
            visibility: visible; 
			transform: scaleY(1);
			
			transition: transform 0.35s cubic-bezier(0, 0, 0.2, 1), 
                opacity 0.3s ease, 
                visibility 0s linear 0s;
        }
        .caviar-option { 
            color: #9c6b0b !important;
			padding: 8px 16px;
			border-radius: 4px;
			transition: opacity 0.2s ease;
        }
        .caviar-option:hover { 
            background-color: #9c6b0b; 
            color: #ffffff !important; 
			border-radius: 4px;
        }
        .caviar-option.selected { 
            background-color: #9c6b0b !important;
			color: #ffffff !important;
			border-radius: 4px;
        }
		.caviar-select-wrapper:not(.open) .caviar-option {
			opacity: 0;
		}
    ";

    $custom_js = "
        document.addEventListener('DOMContentLoaded', function() {
			const originalSelect = document.getElementById('size');
			if (!originalSelect) return;

			const wrapper = document.createElement('div');
			wrapper.className = 'caviar-select-wrapper';

			const trigger = document.createElement('div');
			trigger.className = 'caviar-trigger';
			trigger.textContent = originalSelect.options[originalSelect.selectedIndex].text;

			const optionsContainer = document.createElement('div');
			optionsContainer.className = 'caviar-options-container';

			function syncCaviarDisplay() {
				trigger.textContent = originalSelect.options[originalSelect.selectedIndex].text;
				optionsContainer.querySelectorAll('.caviar-option').forEach(el => {
					el.classList.toggle('selected', el.dataset.value === originalSelect.value);
				});
			}

			Array.from(originalSelect.options).forEach((opt, index) => {
				const customOpt = document.createElement('div');
				customOpt.className = 'caviar-option';
				if (index === originalSelect.selectedIndex) customOpt.classList.add('selected');
				customOpt.textContent = opt.text;
				customOpt.dataset.value = opt.value;

				customOpt.addEventListener('click', function(e) {
					e.stopPropagation();
					originalSelect.value = this.dataset.value;
					syncCaviarDisplay();
					wrapper.classList.remove('open');
					originalSelect.dispatchEvent(new Event('change', { bubbles: true }));
				});
				optionsContainer.appendChild(customOpt);
			});

			wrapper.appendChild(trigger);
			wrapper.appendChild(optionsContainer);
			originalSelect.parentNode.insertBefore(wrapper, originalSelect);
			originalSelect.classList.add('caviar-hidden-select');

			originalSelect.addEventListener('change', function() {
				syncCaviarDisplay();
			});

			jQuery(originalSelect).closest('.variations_form').on('reset_data', function() {
				setTimeout(syncCaviarDisplay, 10);
			});

			trigger.addEventListener('click', (e) => { e.stopPropagation(); wrapper.classList.toggle('open'); });
			document.addEventListener('click', () => wrapper.classList.remove('open'));
		});
    ";

    wp_register_style('caviar-style', false);
    wp_enqueue_style('caviar-style');
    wp_add_inline_style('caviar-style', $custom_css);

    wp_register_script('caviar-script', false);
    wp_enqueue_script('caviar-script');
    wp_add_inline_script('caviar-script', $custom_js);
}
add_action('wp_enqueue_scripts', 'caviar_custom_select_script');

// Quantity Button
function caviar_product_qty() {
    $custom_css = "
		@media (max-width: 767px) {
			.quantity {
				margin-bottom: 8px !important;
			}
		}
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; }
        input[type=number] { -moz-appearance: textfield; }

        .quantity { 
            display: flex !important; 
            align-items: stretch;
            gap: 0 !important;
        }

		.qty-btn:disabled {
            cursor: not-allowed;
        }

        .qty-btn { 
            width: 40px; 
            background: transparent; 
            border: 1px solid #9c6b0b; 
            color: #ffffff; 
            cursor: pointer; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            font-size: 18px; 
            transition: all 0.3s;
            padding: 0;
        }
        .qty-btn.minus {
            border-radius: 4px 0 0 4px;
        }
        .qty-btn.plus {
            border-radius: 0 4px 4px 0;
            border-left: none;
        }
        .qty-btn:hover:not(:disabled) { background: #9c6b0b; color: #000; }

        .quantity input.qty { 
            width: 50px !important; 
            height: auto !important; 
            border: 1px solid #9c6b0b !important; 
            border-left: none !important;
            background: transparent !important; 
            color: #ffffff !important; 
            text-align: center !important; 
            margin: 0 !important; 
            border-radius: 0 !important;
        }

        .qty-btn, .quantity input.qty, .single_add_to_cart_button {
            height: 45px !important;
            box-sizing: border-box;
        }

        @media only screen and (max-width: 1024px) {
            .product-image img { max-width: 65% !important; margin: 0 auto !important; display: block !important; }
        }

        .reset_variations { display: none !important; }
        table.variations th.label { padding-top: 15px !important; vertical-align: top; }
    ";
    
    $custom_js = "
        document.addEventListener('DOMContentLoaded', function() {
            const qtyContainer = document.querySelector('.quantity');
            if (qtyContainer) {
                const qtyInput = qtyContainer.querySelector('input.qty');
                
                if (!qtyContainer.querySelector('.qty-btn')) {
                    const btnMinus = document.createElement('button');
                    btnMinus.type = 'button'; 
                    btnMinus.className = 'qty-btn minus'; 
                    btnMinus.textContent = '-';

                    const btnPlus = document.createElement('button');
                    btnPlus.type = 'button'; 
                    btnPlus.className = 'qty-btn plus'; 
                    btnPlus.textContent = '+';

                    qtyContainer.insertBefore(btnMinus, qtyInput);
                    qtyContainer.appendChild(btnPlus);

                    function updateButtonState() {
                        let val = parseInt(qtyInput.value) || 1;
                        let min = parseInt(qtyInput.min) || 1;
                        let max = parseInt(qtyInput.max) || 99;

                        btnMinus.disabled = (val <= min);
                        btnPlus.disabled = (val >= max);
                    }

                    qtyInput.addEventListener('keydown', function(e) {
                        if (e.key === 'Backspace' || e.key === 'Delete') {
                            e.preventDefault();
                        }
                    });

                    qtyInput.addEventListener('input', function() {
                        if (this.value === '' || this.value < 1) {
                            this.value = 1;
                        }
                        updateButtonState();
                    });

                    btnMinus.addEventListener('click', () => {
                        let val = parseInt(qtyInput.value) || 1;
                        if (val > (parseInt(qtyInput.min) || 1)) {
                            qtyInput.value = val - 1;
                            qtyInput.dispatchEvent(new Event('change', { bubbles: true }));
                        }
                        updateButtonState();
                    });

                    btnPlus.addEventListener('click', () => {
                        let val = parseInt(qtyInput.value) || 1;
                        if (val < (parseInt(qtyInput.max) || 99)) {
                            qtyInput.value = val + 1;
                            qtyInput.dispatchEvent(new Event('change', { bubbles: true }));
                        }
                        updateButtonState();
                    });

                    updateButtonState();
                    qtyInput.addEventListener('change', updateButtonState);
                }
            }
        });
    ";

    wp_register_style('caviar-qty-style', false);
    wp_enqueue_style('caviar-qty-style');
    wp_add_inline_style('caviar-qty-style', $custom_css);

    wp_register_script('caviar-qty-script', false);
    wp_enqueue_script('caviar-qty-script');
    wp_add_inline_script('caviar-qty-script', $custom_js);
}
add_action('wp_enqueue_scripts', 'caviar_product_qty');

// Checkout Page Select Country and Province
function caviar_combined_checkout_selects() {
    $custom_css = "
        .country-hidden, .province-hidden { display: none !important; }
        .caviar-custom-wrapper { 
            position: relative; 
            display: block; 
            width: 100%;
            z-index: 99;
        }
        .caviar-custom-trigger { 
            background: transparent; 
            color: #000000 !important; 
            border: 1px solid rgba(184, 134, 11, 0.5); 
            padding: 22px 15px 6px 10px !important; 
            border-radius: 4px; 
            cursor: pointer; 
            display: flex; 
            justify-content: flex-start; 
            align-items: center; 
            height: 50px !important;
            font-size: 16px;
            text-align: left;
        }
        .caviar-custom-options { 
            position: absolute; 
            top: 100%; left: 0; right: 0; 
            background: #000000;
            border: 1px solid #9c6b0b; 
            border-radius: 0 0 4px 4px; 
            z-index: 999999; 
            opacity: 0;
            visibility: hidden;
            transform: scaleY(0);
            transform-origin: top;
            max-height: 250px;
            overflow-y: auto !important;
			-webkit-overflow-scrolling: touch;
            transition: all 0.2s ease;
			pointer-events: none;
        }
        .caviar-custom-wrapper.open .caviar-custom-options { 
            opacity: 1; 
			visibility: visible; 
			transform: scaleY(1);
			pointer-events: auto;
        }
        .caviar-custom-item { 
            color: #9c6b0b !important;
            padding: 12px 16px;
            cursor: pointer;
			padding: 18px 16px !important;
        }
        .caviar-custom-item:hover, .caviar-custom-item.selected { 
            background-color: #9c6b0b !important; 
            color: #ffffff !important; 
        }
		
    ";

   $custom_js = "
    (function($) {
        function buildDropdowns() {
            const targets = $('select#shipping-country, select#billing-country, select#shipping-state, select#billing-state, select.wc-block-components-select__select');

            targets.each(function() {
                const el = $(this);
                if (el.find('option').length <= 1 && !el.find('option').val()) return;
                if (el.prev('.caviar-custom-wrapper').length > 0) return;

                const wrapper = $('<div class=\"caviar-custom-wrapper\"></div>');
                const trigger = $('<div class=\"caviar-custom-trigger\"></div>');
                const options = $('<div class=\"caviar-custom-options\"></div>');
				
				options.on('wheel', function(e) {
					e.stopPropagation();
				});

                function sync() {
                    trigger.text(el.find('option:selected').text() || 'Select...');
                    options.find('.caviar-custom-item').each(function() {
                        $(this).toggleClass('selected', $(this).attr('data-value') === el.val());
                    });
                }

                el.find('option').each(function() {
                    const item = $('<div class=\"caviar-custom-item\"></div>')
                        .text($(this).text())
                        .attr('data-value', $(this).val());
                    
                    item.on('click', function(e) {
                        e.stopPropagation();
                        el.val($(this).attr('data-value')).trigger('change');
                        
                        if (el[0]) {
                            el[0].dispatchEvent(new Event('change', { bubbles: true }));
                            el[0].dispatchEvent(new Event('input', { bubbles: true }));
                        }
                        
                        wrapper.removeClass('open');
                    });
                    options.append(item);
                });

                wrapper.append(trigger).append(options);
                el.before(wrapper).addClass(el.is('[id*=\"state\"]') ? 'province-hidden' : 'country-hidden');

                trigger.on('click', function(e) {
                    e.stopPropagation();
                    $('.caviar-custom-wrapper').not(wrapper).removeClass('open');
                    wrapper.toggleClass('open');
                });

                el.on('change', sync);
                sync();
            });
        }

        const observer = new MutationObserver(() => {
            buildDropdowns();
        });
        $(document).ready(function() {
            buildDropdowns();
            observer.observe(document.body, { childList: true, subtree: true });
        });
        $(document.body).on('updated_checkout country_to_state_changed updated_shipping_method', buildDropdowns);
        $(document).on('click', function() { $('.caviar-custom-wrapper').removeClass('open'); });

    })(jQuery);
    ";

    wp_add_inline_style('wp-block-library', $custom_css);
    wp_add_inline_script('jquery', $custom_js);
}
add_action('wp_enqueue_scripts', 'caviar_combined_checkout_selects', 999);

// Additional Class Order-Received Page
add_action('wp_footer', function() {
    if ( is_wc_endpoint_url('order-received') || is_order_received_page() ) {
        ?>
        <script type="text/javascript">
            (function() {
                document.body.classList.add('woocommerce-typage');
                var targetElement = document.querySelector('.padding-header-avoid-nav .woocommerce');
                if (targetElement) {
                    targetElement.classList.add('no-padding-ty');
                    console.log('Class no-padding-ty successfull added');
                }
            })();
        </script>
        <?php
    }
}, 999);

// Hide Locations Message
add_filter( 'woocommerce_add_message', 'mota_hide_shipping_zone_message' );
function mota_hide_shipping_zone_message( $message ) {
    $target_message = 'Customer matched zone "Locations not covered by your other zones"';
    
    if ( strpos( $message, $target_message ) !== false ) {
        return false;
    }
    return $message;
}

// Additional Class My Acoount
add_action('wp_footer', function() {
    if ( is_account_page() ) {
        ?>
        <script type="text/javascript">
            (function() {
                document.body.classList.add('woocommerce-myaccount-custom');
                var accountContent = document.querySelector('.padding-header-avoid-nav .woocommerce');
                if (accountContent) {
                    accountContent.classList.add('no-padding-myaccount');
                    console.log('Class no-padding-myaccount berhasil ditambahkan ke halaman My Account');
                }
            })();
        </script>
        <?php
    }
}, 999);


add_filter( 'wpseo_exclude_from_sitemap_by_post_ids', function( $excluded ) {
    return $excluded;
});
add_filter( 'wpseo_exclude_from_sitemap_by_post_ids', function( $excluded ) {
    $shop_page_id = get_option( 'woocommerce_shop_page_id' );
    $excluded[] = $shop_page_id;
    return $excluded;
});
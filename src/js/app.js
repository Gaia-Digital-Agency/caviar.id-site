import Swiper, {Navigation} from "swiper"

import 'flowbite';

(() => {
    const grids = document.querySelectorAll('.dynamic-grid');
    if(grids.length == 0) return false;

    grids.forEach(grid => {
        const gap = parseFloat(getComputedStyle(grid).gap) || 0; // Get the gap size (assumes uniform row/col gaps)
        const totalGap = gap * (12 - 1); // Total gap width for 12 columns
        const availableWidth = grid.offsetWidth - totalGap; // Subtract gaps from total width
        const size = availableWidth / 12; // Calculate size per grid unit
        grid.style.gridTemplateRows = `repeat(0, ${size}px)`; // Apply calculated size to rows
    });
})();

(() => {
    new Swiper('.slider-home', {
        slidesPerView: 1,
        spaceBetween: 10,
        loop: true,
        modules: [Navigation],
        breakpoints: {
            1024: {
                slidesPerView: 4,
                spaceBetween: 32
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 16
            }
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    })
})()
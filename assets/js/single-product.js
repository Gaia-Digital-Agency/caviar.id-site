$(document).ready(function(){
    $('.image-gallery-carousel').owlCarousel({
        item: 3,
        margin: 10,
        navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
        nav: true,
        dots: false
    })


    $('.image-gallery-carousel .item').click(function(){
        if(!$(this).find('img').hasClass('active')) {
            $('.image-gallery-carousel .item img').removeClass('active')
            $(this).find('img').addClass('active')
            $('#large-image img').attr('src', $(this).find('img').data('url'))
        }
    })

})
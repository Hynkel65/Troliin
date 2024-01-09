/* slider SCRIPT ---------------------------------*/
document.addEventListener('DOMContentLoaded', function () {
    var mySwiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 25,
        loop: true,
        centerSlide: 'true',
        fade: 'true',
        gragCursor: 'true',
//        autoplay: {
//            delay: 2500,
//            disableOnInteraction: false,
//          },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            dynamicBullets: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            1024: {
                slidesPerView: 2,
            },
            1440: {
                slidesPerView: 3,
            },
        }
    });
});
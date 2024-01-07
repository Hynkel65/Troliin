/* slider SCRIPT ---------------------------------*/
document.addEventListener('DOMContentLoaded', function () {
    var mySwiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 25,
        loop: true,
        centerSlide: 'true',
        fade: 'true',
        gragCursor: 'true',
        //autoplay: {
        //    delay: 2500,
        //    disableOnInteraction: false,
        //  },
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

/* burger SCRIPT ---------------------------------*/
document.addEventListener('DOMContentLoaded', function () {
    const burgerMenu = document.querySelector('.burger-menu');
    const links = document.querySelector('.links');

    burgerMenu.addEventListener('click', function () {
        links.style.display = (getComputedStyle(links).display === 'flex') ? 'none' : 'flex';
    });

    window.addEventListener('resize', function () {
        links.style.display = (window.innerWidth <= 767) ? 'none' : 'flex';
    });
});
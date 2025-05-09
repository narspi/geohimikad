import Swiper from "swiper";
import { Navigation } from 'swiper/modules';

document.addEventListener('DOMContentLoaded',()=>{
    const services = document.querySelector('.services');
    const certificatesSlider = document.querySelector('.certificates__slider');
    const reviewsSlider = document.querySelector('.reviews__slider');

    if (services) {
        services.addEventListener('click', (event) => {
            const target = event.target;
            if (target.closest('.services__elem-title')) {
                const titleElem = target.closest('.services__elem-title');
                const parent = target.closest('.services__elem')
                const elemDropdown = parent.querySelector('.services__elem-drop');
                elemDropdown.classList.toggle('active');
                titleElem.classList.toggle('active');
            }
        })
    }

    if (certificatesSlider) {
        new Swiper(certificatesSlider, {
            modules: [Navigation],
            slidesPerView: 'auto',
            spaceBetween: 24,
            navigation: {
                nextEl: '.certificates__slider-next',
                prevEl: '.certificates__slider-prev',
            },
        })
    }

    if (reviewsSlider) {
        new Swiper(reviewsSlider, {
            modules: [Navigation],
            slidesPerView: 'auto',
            spaceBetween: 24,
            navigation: {
                nextEl: '.reviews__btn-next',
                prevEl: '.reviews__btn-prev',
            },
        })
    }
});
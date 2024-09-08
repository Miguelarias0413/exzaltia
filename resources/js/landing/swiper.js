import Swiper from "swiper";
import { Navigation, Pagination } from "swiper/modules";
// import Swiper and modules styles
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

function Main() {
    // core version + navigation, pagination modules:

    // init Swiper:
    const swiperCarruselPortadas = new Swiper("#swiperCarruselPortadas", {
        // Optional parameters
        direction: "horizontal",
        loop: true,

        autoplay: {
            delay: 5000,
        },

        // If we need pagination
        pagination: {
            el: ".swiper-pagination",
        },

        // Navigation arrows
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },

        // And if we need scrollbar
        scrollbar: {
            el: ".swiper-scrollbar",
        },
    });

    const nextSlideButton = document.querySelector(".swiper-button-next");
    const prevSlideButton = document.querySelector(".swiper-button-prev");
    nextSlideButton.addEventListener("click", () => {
        swiperCarruselPortadas.slideNext();
    });
    prevSlideButton.addEventListener("click", () => {
        swiperCarruselPortadas.slidePrev();
    });


    setInterval(()=>{
        swiperCarruselPortadas.slideNext();
    },5500)

}

addEventListener("DOMContentLoaded", Main);

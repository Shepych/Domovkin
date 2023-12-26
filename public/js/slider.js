// const swiper = new Swiper('.swiper', {
//     // Optional parameters
//     loop: true,
//     zoom: true,
//     centeredSlides: true,
//     // If we need pagination
//     pagination: {
//       el: '.swiper-pagination',
//       clickable: true,
//     },
//     slidesPerView: 1,
//
//     // Navigation arrows
//     navigation: {
//       nextEl: '.swiper-button-next',
//       prevEl: '.swiper-button-prev',
//     },
//
//     // And if we need scrollbar
//     scrollbar: {
//       el: '.swiper-scrollbar',
//     },
//   });


let swiper = new Swiper(".swiper2", {
    // loop: true,
    spaceBetween: 40,
    slidesPerView: 1,
    freeMode: true,
    pagination: false,
    autoResize: false,
    breakpoints: {
        // when window width is >= 320px
        100: {
          slidesPerView: 2,
          spaceBetween: 30
        },
        // when window width is >= 480px
        480: {
          slidesPerView: 3,
          spaceBetween: 40
        },
        // when window width is >= 640px
        640: {
          slidesPerView: 4,
          spaceBetween: 40
        }
      }
});
let swiper2 = new Swiper(".swiper", {
    // loop: true,
    spaceBetween: 0,
    thumbs: {
        swiper: swiper,
    },
    pagination: false,
});

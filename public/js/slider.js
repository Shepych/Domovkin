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
    loop: true,
    spaceBetween: 20,
    slidesPerView: 5,
    freeMode: true,
    watchSlidesProgress: true,
    pagination: false
});
let swiper2 = new Swiper(".swiper", {
    loop: true,
    spaceBetween: 0,
    thumbs: {
        swiper: swiper,
    },
    pagination: false
});

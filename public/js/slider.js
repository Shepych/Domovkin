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
let swiper3 = new Swiper(".swiper3", {
  // loop: true,
  spaceBetween: 40,
  slidesPerView: 1,
  freeMode: true,
  pagination: false,
  autoResize: false,
  breakpoints: {
      100: {
        slidesPerView: 2,
        spaceBetween: 20
      },
      480: {
        slidesPerView: 3,
        spaceBetween: 20
      },
      860: {
        slidesPerView: 5,
        spaceBetween: 40
      }
    }
});

let swiper = new Swiper(".swiper", {
  // loop: true,
  spaceBetween: 0,
  thumbs: {
      swiper: swiper3,
  },
  pagination: false,
});



let swiper2 = new Swiper(".swiper2", {
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
        spaceBetween: 20
      },
      // when window width is >= 480px
      480: {
        slidesPerView: 3,
        spaceBetween: 20
      },
      // when window width is >= 640px
      860: {
        slidesPerView: 5,
        spaceBetween: 40
      }
    }
});

swiper2.on('click', function(e) {
  const clickedIndex = swiper2.clickedIndex;
  swiper.slideTo(clickedIndex);
});

// Синхронизация второго Swiper для миниатюр с основным Swiper
swiper3.on('click', function(e) {
  const clickedIndex = swiper3.clickedIndex;
  swiper.slideTo(clickedIndex);
});

// Синхронизация основного Swiper с обоими Swiper для миниатюр
swiper.on('slideChange', function() {
  let currentIndex = swiper.activeIndex;
  swiper3.slideTo(currentIndex);
  swiper3.slideTo(currentIndex);
});

window.addEventListener('load', function() {
  setTimeout(function() {
      document.getElementById('delayed-block').classList.remove('hidden');
      document.getElementById('delayed-block2').classList.remove('hidden');
  }, 300); // 1000 миллисекунд = 1 секунда
});


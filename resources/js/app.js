import './bootstrap';
import Swal from '../../public/js/sweetalert/src/sweetalert2';
import 'animate.css';

let timers = [];

$('#application__call').on('click', function() {
  Swal.fire({
    html:
        '<h2 class="swal2-title" id="swal2-title" style="display: block;margin-bottom:20px;margin-top:10px;font-family: Euclid;">Обратный звонок</h2>' +
        // '<h2 style="font-family: Euclid;margin-bottom:20px;margin-top:10px">Обратный звонок</h2>' +
        '<form class="flex ajax__form" style="flex-direction:column;padding-bottom:16px" action="' + backCallRoute + '" method="post">' +
        csrf +    
        '<input name="name" placeholder="Как к вам обращаться" style="font-family: Euclid;width:calc(100% - 10px);margin-top:10px;margin-bottom:26px;background-color:#F8F8F8" id="swal-input1" type="text" class="animate__animated swal2-input">' +
            '<input name="phone" placeholder="Телефон" style="font-family: Euclid;width:calc(100% - 10px);margin-top:0;margin-bottom:26px;background-color:#F8F8F8" id="swal-input-phone" class="animate__animated swal2-input">' +
            '<textarea name="comment" style="font-family: Euclid; width:calc(100% - 10px);resize:none;margin-bottom:25px;margin-top:0;background-color:#F8F8F8" placeholder="Опишите вашу ситуацию, проблему или вопрос" class="swal2-textarea"></textarea>' +
            '<input type="submit" class="button button__sweet" value="Отправить заявку">' +
        '</form>',
    showConfirmButton: false,
  });

  $(document).ready(function() {
    $('#swal-input-phone').inputmask("+7 (999) 999-99-99");
  });
})

$('.ajax__wrap').on('submit', '.ajax__form', function (event) {
  clearAllTimers();

  event.preventDefault()
  // Если валидация не проходит - то анимируем, иначе - аякс
  let name = $("#swal-input1")
  let phone = $("#swal-input-phone")

  if(name.val().length < 3 || phone.val().length < 1) {
    if(name.val().length < 3) {
        name.css('border', '1px solid red')
        name.addClass("animate__shakeX");

        timers.push(setTimeout(function() {
          name.removeClass("animate__shakeX");
          name.css('border', '1px solid #d9d9d9')
        }, 1000));
    } 
    if(phone.val().length < 1) {
        phone.css('border', '1px solid red')
        phone.addClass("animate__shakeX");

        timers.push(setTimeout(function() {
          phone.removeClass("animate__shakeX");
          phone.css('border', '1px solid #d9d9d9')
        }, 1000));
    }
  } else {
  
      $.ajax({
          type: $(this).attr('method'),
          url: $(this).attr('action'),
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function (result) {
              Swal.fire({
                  icon: 'success',
                  title: 'Заявка отправлена',
                  html: '<div style="margin-bottom:10px"><p style="text-align:center;font-size:20px">Ожидайте, наш специалист скоро свяжется с вами</p></div>',
                  showConfirmButton: false
              })
          }
      })
  }
});

function clearAllTimers() {
  timers.forEach(function(timer) {
      clearTimeout(timer);
  });
}

// Галерея для портфолио
import PhotoSwipeLightbox from 'photoswipe/lightbox';
import 'photoswipe/style.css';

const lightbox = new PhotoSwipeLightbox({
  gallery: '#my-gallery',
  children: 'a',
  pswpModule: () => import('photoswipe')
});
lightbox.init();

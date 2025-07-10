
document.addEventListener("DOMContentLoaded", function () {
  window.addEventListener('scroll', function () {
    if (window.scrollY > 150) {
      document.getElementById('navbar_top').classList.add('fixed-top');
      // add padding top to show content behind navbar
      navbar_height = document.querySelector('.navbar').offsetHeight;
      document.body.style.paddingTop = navbar_height + 'px';
    } else {
      document.getElementById('navbar_top').classList.remove('fixed-top');
      // remove padding top from body
      document.body.style.paddingTop = '0';
    }
  });
});
// Navbar Sticky End

//===========//

$(document).ready(function () {
  // jQuery code

  //////////////////////// Prevent closing from click inside dropdown
  $(document).on('click', '.dropdown-menu', function (e) {
    e.stopPropagation();
  });

  // make it as accordion for smaller screens
  if ($(window).width() < 992) {
    $('.dropdown-menu a').click(function (e) {
      e.preventDefault();
      if ($(this).next('.submenu').length) {
        $(this).next('.submenu').toggle();
      }
      $('.dropdown').on('hide.bs.dropdown', function () {
        $(this).find('.submenu').hide();
      })
    });
  }

});

$('.dropdown').on('show.bs.dropdown', function (e) {
  $(this).find('.dropdown-menu').first().stop(true, true).slideDown(100);
});

$('.dropdown').on('hide.bs.dropdown', function (e) {
  $(this).find('.dropdown-menu').first().stop(true, true).slideUp(100);
});






$(document).ready(function () {
  "use strict";

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    if (all) {
      $(el).each(function () {
        $(this).on(type, listener);
      });
    } else {
      $(el).on(type, listener);
    }
  };

  /**
   * Easy on scroll event listener 
   */
  const onscroll = (el, listener) => {
    $(el).on('scroll', listener);
  };

  /**
   * Sidebar toggle
   */
  $('.toggle-sidebar-btn').click(function (e) {
    $('body').toggleClass('toggle-sidebar');
  });

  /**
   * Search bar toggle
   */
  $('.search-bar-toggle').click(function (e) {
    $('.search-bar').toggleClass('search-bar-show');
  });

  /**
   * Navbar links active state on scroll
   */
  const navbarlinksActive = () => {
    let position = $(window).scrollTop() + 200;
    $('#navbar .scrollto').each(function () {
      let navbarlink = $(this);
      if (!navbarlink.attr('href')) return;
      let section = $(navbarlink.attr('href'));
      if (!section.length) return;
      if (position >= section.offset().top && position <= (section.offset().top + section.outerHeight())) {
        navbarlink.addClass('active');
      } else {
        navbarlink.removeClass('active');
      }
    });
  };
  $(window).on('load scroll', navbarlinksActive);

  /**
   * Toggle .header-scrolled class to #header when page is scrolled
   */
  let selectHeader = $('#header');
  if (selectHeader.length) {
    $(window).on('load scroll', function () {
      if ($(window).scrollTop() > 100) {
        selectHeader.addClass('header-scrolled');
      } else {
        selectHeader.removeClass('header-scrolled');
      }
    });
  }

  /**
   * Back to top button
   */
  let backtotop = $('.back-to-top');
  if (backtotop.length) {
    $(window).on('load scroll', function () {
      if ($(window).scrollTop() > 100) {
        backtotop.addClass('active');
      } else {
        backtotop.removeClass('active');
      }
    });
  }

  /**
   * Initiate tooltips
   */
  $('[data-bs-toggle="tooltip"]').tooltip();


  /**
   * Logout button
   */
  $('.logout').click(function (e) {
    e.preventDefault();

    Swal.fire({
      title: "Are you sure?",
      text: "You will be logged out!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, logout"
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          icon: 'success',
          title: 'See you again!',
          showConfirmButton: false,
          timer: 1000
        }).then(function () {
          window.location.href = "assets/components/includes/logout.php";
        })
      }
    });

  });
});

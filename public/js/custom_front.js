(function($) {
  "use strict"; // Start of use strict

  // Smooth scrolling using jQuery easing
  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: (target.offset().top - 70)
        }, 1000, "easeInOutExpo");
        return false;
      }
    }
  });

  // Closes responsive menu when a scroll trigger link is clicked
  $('.js-scroll-trigger').click(function() {
    $('.navbar-collapse').collapse('hide');
  });

  // Activate scrollspy to add active class to navbar items on scroll
  $('body').scrollspy({
    target: '#mainNav',
    offset: 100
  });

             $(".closebtnf").click(function(){
  $(".toptext").hide();
});

  // Collapse Navbar
  var navbarCollapse = function() {
    if ($("#mainNav").offset().top > 100) {
      $("#mainNav").addClass("navbar-shrink");
    } else {
      $("#mainNav").removeClass("navbar-shrink");
    }
  };
  // Collapse now if page is not at top
  navbarCollapse();
  // Collapse the navbar when page is scrolled
  $(window).scroll(navbarCollapse);

  $(document).on('.form-control.is-invalid' , 'click' , function() {
    $(this).removeClass('is-invalid');
  });
  
  if($('.validation.alert').length > 0) {
    setTimeout(function() {
      $('.validation.alert').fadeOut('slow');
    },5000);
  }

  if($('.alert.alert-success').length > 0) {
    setTimeout(function() {
      $('.alert.alert-success').fadeOut('slow');
    },5000);
  }

  $('#school_name').chosen().change(function(){
        var schoolId = $(this).val();
        if(schoolId == '0') {
          $('.school_details').show();
          $('.school_details input').each(function() {
            $(this).attr('required', true);
          });
        } else {
          $('.school_details').hide();
          $('.school_details input').each(function() {
            $(this).removeAttr("required");
          });
        }
    });

    $('input.form-control').keyup(function(){
      if($(this).val() ==' ' || !$(this).val()) {
        $(this).val('');
      }
    });
    $('#email').keyup(function(){
      if($(this).val() ==' ' || !$(this).val()) {
        $(this).val('');
      }
    });

})(jQuery); // End of use strict

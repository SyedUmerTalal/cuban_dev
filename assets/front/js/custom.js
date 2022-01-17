// global js start
var lazyLoadInstance = new LazyLoad({
    elements_selector: ".lazy"
    // ... more custom settings?
});
     var wow = new WOW(
  {
    boxClass:     'wow',      // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset:       0,          // distance to the element when triggering the animation (default is 0)
    mobile:       true,       // trigger animations on mobile devices (default is true)
    live:         true,       // act on asynchronously loaded content (default is true)
    callback:     function(box) {
      // the callback is fired every time an animation is started
      // the argument that is passed in is the DOM node being animated
    },
    scrollContainer: null // optional scroll container selector, otherwise use window
  }
);
wow.init();
$( document ).ready(function() {
    $('.nav-open').click(function() {
        $('.nav-bar').toggleClass('active');
         $('body').toggleClass('active');
    });
    $(".scrolltop").click(function(){
    $(window).scrollTop(0);
    });
    $(window).scroll(function() {
        var scroll_top = $(window).scrollTop();
        if (scroll_top > 100) {
           
            $('button.scrolltop').addClass('active');
        } else {
            
            $('button.scrolltop').removeClass('active');
        }
    });
   $('.banner .slider').slick({
     dots: false,
     arrows: false,
     infinite: true,
     speed: 2000,
      fade: true,
      autoplay: true,
     slidesToShow: 1,
     adaptiveHeight: true,
      fade: true
   });
    if ($('.slick-slide').hasClass('slick-active')) {
    $('.slick-slide div.wow').addClass('animated fadeInDown');
  } else {
    $('.slick-slide div.wow').removeClass('animated fadeInDown');
  }
    $(".banner .slider").on("beforeChange", function() {
    
    $('.slick-slide div.wow').removeClass('animated fadeInDown').hide();
    setTimeout(() => {    
      $('.slick-slide div.wow').addClass('animated fadeInDown').show();
      
    }, 500);

  })
    $('.testimonials .slider').slick({
      dots: false,
      arrows: true,
      infinite: true,
      speed: 2000,
      autoplay: true,
      slidesToShow:1,
      adaptiveHeight: true,
    });         
    $('.gallery .slider').slick({
      dots: false,
      arrows: true,
      infinite: true,
      speed: 2000,
      autoplay: true,
      slidesToShow:5,
      adaptiveHeight: true,
      responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          arrows: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          arrows: false,
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
        }
      }
    ]
    });  
    $('#offer .slider').slick({
      dots: false,
      arrows: true,
      infinite: true,
      speed: 2000,
      autoplay: true,
      slidesToShow:3,
      adaptiveHeight: true,
      responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          infinite: true,
          arrows: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
        }
      }
    ]
    });
    $('.productslider').slick({
      dots: true,
      arrows: false,
        infinite: true,
      speed: 300,
      autoplay: true,
      slidesToShow: 1,
       customPaging: function(slick,index) {
                    var targetImage = slick.$slides.eq(index).find('img').attr('src');
                    return '<img src=" ' + targetImage + ' "/>';
                }
    });
        function wcqib_refresh_quantity_increments() {
        jQuery("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").each(function(a, b) {
            var c = jQuery(b);
            c.addClass("buttons_added"), c.children().first().before('<input type="button" value="-" class="minus" />'), c.children().last().after('<input type="button" value="+" class="plus" />')
        })
    }
    String.prototype.getDecimals || (String.prototype.getDecimals = function() {
        var a = this,
            b = ("" + a).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
        return b ? Math.max(0, (b[1] ? b[1].length : 0) - (b[2] ? +b[2] : 0)) : 0
    }), jQuery(document).ready(function() {
        wcqib_refresh_quantity_increments()
    }), jQuery(document).on("updated_wc_div", function() {
        wcqib_refresh_quantity_increments()
    }), jQuery(document).on("click", ".plus, .minus", function() {
        var a = jQuery(this).closest(".quantity").find(".qty"),
            b = parseFloat(a.val()),
            c = parseFloat(a.attr("max")),
            d = parseFloat(a.attr("min")),
            e = a.attr("step");
        b && "" !== b && "NaN" !== b || (b = 0), "" !== c && "NaN" !== c || (c = ""), "" !== d && "NaN" !== d || (d = 0), "any" !== e && "" !== e && void 0 !== e && "NaN" !== parseFloat(e) || (e = 1), jQuery(this).is(".plus") ? c && b >= c ? a.val(c) : a.val((b + parseFloat(e)).toFixed(e.getDecimals())) : d && b <= d ? a.val(d) : b > 0 && a.val((b - parseFloat(e)).toFixed(e.getDecimals())), a.trigger("change")
    });
     // Add minus icon for collapse element which is open by default
      $('.light-zoom').zoom();
       $('#login-form-link').click(function(e) {
    $("#login-form").delay(100).fadeIn(100);
    $("#register-form").fadeOut(100);
    $('#register-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });
  $('#register-form-link').click(function(e) {
    $("#register-form").delay(100).fadeIn(100);
    $("#login-form").fadeOut(100);
    $('#login-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });
});
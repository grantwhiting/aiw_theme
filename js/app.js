// Imports
import $ from "jquery";
// import 'owl.carousel/dist/assets/owl.carousel.css';
// import 'owl.carousel/dist/assets/owl.theme.default.css';
import 'owl.carousel';

"use strict";

$(function() {


  // Fade in body
  $("#mainHTML").fadeIn("medium");


  // Modal
  $(".modal-fade-screen, .modal-close").on("click", function() {
    $(".modal-state:checked").prop("checked", false).change();
  });

  $(".modal-inner").on("click", function(e) {
    e.stopPropagation();
  });

  $(".destroy-owl").each(function() {
    // destroy owl carousel
    $(this).click(function() {
      $('.owl-carousel').owlCarousel('destroy');
    });
  });

  // Parallax windows
  if ($("#js-parallax-window").length) {
    parallax();
  }

  $(window).scroll(function(e) {
    if ($("#js-parallax-window").length) {
      parallax();
    }
  });

  function parallax() {
    if( $("#js-parallax-window").length > 0 ) {
      var plxBackground = $("#js-parallax-background");
      var plxWindow = $("#js-parallax-window");

      var plxWindowTopToPageTop = $(plxWindow).offset().top;
      var windowTopToPageTop = $(window).scrollTop();
      var plxWindowTopToWindowTop = plxWindowTopToPageTop - windowTopToPageTop;

      var plxBackgroundTopToPageTop = $(plxBackground).offset().top;
      var windowInnerHeight = window.innerHeight;
      var plxBackgroundTopToWindowTop = plxBackgroundTopToPageTop - windowTopToPageTop;
      var plxBackgroundTopToWindowBottom = windowInnerHeight - plxBackgroundTopToWindowTop;
      var plxSpeed = 0.35;

      plxBackground.css('top', - (plxWindowTopToWindowTop * plxSpeed) + 'px');
    }
  }

  // Owl carousel
  $(".trigger-owl").each(function() {
    $(this).click(function() {
      $('.owl-carousel').owlCarousel({
          autoHeight: true,
          loop: true,
          margin: 10,
          nav: true,
          animateOut: 'fadeOut',
          items: 1
      });
    });
  });

  if ($(".owl-carousel-header").length > 0) {
    $(".owl-carousel").owlCarousel({
      loop: true,
      autoplay: true,
      items: 1,
      animateOut: 'fadeOut',
      dots: false,
      nav: false,
      autoplayHoverPause: false
    });
  }

  // JS Grid display
  $(function() {
    var $jsGrid = $(".js-grid");

    if ($jsGrid.length > 0) {
      $jsGrid.each(function() {
        var $that = $(this);
        var $moreButton = $that.find(".show-more-button");
        var $jsGridItem = $that.find(".js-grid-item");
        $jsGridItem.hide();
        $jsGridItem.slice(0, 4).show();

        if ($jsGridItem.length > 4) {
          $moreButton.css("display", "block");

          $moreButton.click(function() {
            var $btn = $(this);
            $that.find(".js-grid-item:hidden").slice(0, 4).fadeIn();
            if ($that.find(".js-grid-item:hidden").length === 0) {
              $btn.fadeOut();
            }
          });
        }
      });
    }
  });

  // set image height to equal container
  function imageAutoHeight() {
    var $autoHeightImage = $(".auto-height-image");

    $autoHeightImage.each(function() {
      var $container = $(this).parent();
      var containerHeight = $container.innerHeight();
      $(this).css({
        height: containerHeight
      })
    });
  } imageAutoHeight();


  // Activate mobile nav hamburger
  $(".hamburger").click(function() {
    $(this).toggleClass("is-active");
    $(".mobile-nav").toggleClass("is-open");
  });

  // Select section
  $(".select-section > div > button").each(function() {
    $(this).click(function() {
      $(this).addClass("active").siblings().removeClass("active");
    });
  });

  $("#showJobs").click(function() {
    $("#allJobs").addClass("active");
    $("#allImages").removeClass("active");
  });

  $("#showImages").click(function() {
    $("#allImages").addClass("active");
    $("#allJobs").removeClass("active");
  });


  // Scroll events //
  $(window).scroll(function() {
    stickyNav();
    fadeIn();
  });

  // Scroll sticky nav
  function stickyNav() {
    var scrollTop = $(window).scrollTop();

    if (scrollTop > 100) {
      $(".main-nav").addClass("sticky-nav");
    } else {
      $(".main-nav").removeClass("sticky-nav");
    }
  }

  // Fade in section
  var $fadeIn = $(".fade-in");
  $fadeIn.addClass('js-fade-element-hide');

  function fadeIn() {
    if( $fadeIn.length > 0 ) {
      $fadeIn.each(function() {
        var $that = $(this);
        var elementTopToPageTop = $that.offset().top;
        var windowTopToPageTop = $(window).scrollTop();
        var windowInnerHeight = window.innerHeight;
        var elementTopToWindowTop = elementTopToPageTop - windowTopToPageTop;
        var elementTopToWindowBottom = windowInnerHeight - elementTopToWindowTop;
        var distanceFromBottomToAppear = 100;

        if(elementTopToWindowBottom > distanceFromBottomToAppear) {
          $that.addClass('js-fade-element-show');
        }
        else if(elementTopToWindowBottom < 0) {
          $that.removeClass('js-fade-element-show');
          $that.addClass('js-fade-element-hide');
        }
      });
    }
  } fadeIn();

  // Image gallery
  $('.sortable-grid > li.' + $(this).attr('rel')).show();

  $('.image-gallery__tags').find('input:radio').on('click', function () {
      if($('.image-gallery__tags').find('input:radio:checked').length > 0){
        $('.sortable-grid > li').hide();
        $('.image-gallery__tags').find('input:checked').each(function () {
            $('.sortable-grid > li.' + $(this).attr('rel')).not('.hidden').fadeIn("medium");
        });
      } else {
          $('.sortable-grid > li').not('.hidden').fadeIn("medium");
      }
  });


  // deffer load images
  $(function() {
    var $showMoreBtn = $('.show-more-button'),
        $loadMoreImgs = $('#showImages');

    function loadImg() {
      var $img = $('.grid-image');
      if ($img) {
        $img.each(function() {
          if (window.getComputedStyle(this.parentElement).display !== 'none') {
            this.src = this.dataset.src;
          }
        });
      };
    } loadImg();

    if ($showMoreBtn) {
      $showMoreBtn.click(function() {
        loadImg();
      });
    }

    if ($loadMoreImgs) {
      loadImg();
    }
  });
});
$(document).ready(function () {
    // Init header slider
    $('.header-slider').slick({
        vertical: true,
        autoplay: true,
        infinite: false,
        accessibility: false
    });

    // Animate avatar vector
    var i = 1;
    setInterval(function () {
        i = i == 2 ? i = 0 : i+1;
        animateAvatar();
    }, 7500);

    function animateAvatar() {
        $('.avatar-group .persone').removeClass('active');
        $('.avatar-group .persone' + i).addClass('active');
    }

    // Fix Vector Postion On Mobile
    function fixVectorPosition() {
        if ($(window).width() < 480) {
            var startSectionHeight = $('.start-side').height();
            console.log($('.start-side').height());
            $('.main-vector').height(startSectionHeight * 1.5).css('padding-top', '15px');
        }
    }
    fixVectorPosition();

    // Handle scroll down
    $('#scrollDownControl').on('click', function () {
        $('html, body').animate({
            scrollTop: $('.jobs-category').offset().top
        }, 800);
    });

    // init jobs category slider
    $('.jobs-category-slider').slick({
        autoplay: true,
        infinite: true,
        slidesToShow: 3,
        dots: true,
        arrows: false,
        accessibility: false,
        responsive: [
            {
              breakpoint: 1231,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                
              }
            },
            {
              breakpoint: 1230,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 767,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
          ]
    });

    // avatar group slider
    $('.avatar-group-slider').slick({
        autoplay: true,
        infinite: true,
        slidesToShow: 1,
        arrows: false,
        accessibility: false,
    });

    // init nicescroll plugin for latest jobs
    $('.latest-jobs-container').niceScroll({
        cursorcolor: '#E28F25',
        cursorwidth: '6px',
        cursorborder: 0,
        cursorborderradius: 0,
        autohidemode: false,
        background: '#C9C6D9',
        grabcursorenabled: 'grab',
        cursordragontouch: true,
        emulatetouch: true,
        touchbehavior: true,
        preventmultitouchscrolling: false
    });

    // Animate why us vector
    var vectorAnimated = false;
    $(window).on('scroll', function () {
        if ($('.why-us').offset().top <= $('html, body').scrollTop()) {
            if(!vectorAnimated) $('.why-us .features-vector').addClass('start');
            vectorAnimated = true;
        } else {
            if(vectorAnimated) $('.why-us .features-vector').removeClass('start');
            vectorAnimated = false;
        }
    });


});
$(document).ready(function () {
    $(document).on('change', '.tab-checked', function () {
        var id = $(this).attr('value');
        $('.tab-content-active').removeClass('tab-content-active').addClass('tab-content-hidden');
        $('#'+id).addClass('tab-content-active');
        return false;
    });

    /*$('.slider').slick({
    	infinite: true,
  		slidesToShow: 3,
  		slidesToScroll: 1,
  		autoplay: true,
  		autoplaySpeed: 3000

    });

    $('.slider-float').slick({
    	infinite: true,
  		slidesToShow: 5,
  		slidesToScroll: 1,
  		autoplay: true,
  		autoplaySpeed: 2000

    });*/

    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });

    $('.questions').each(function () {
        var colors = ['green', 'pink', 'orange', 'Tan2', 'RosyBrown', 'Sienna2', 'MediumOrchid', 'Tomato', 'SandyBrown', 'DarkOrange', 'SeaGreen', 'DarkSlateGray', 'SlateGrey', 'MidnightBlue', 'CornflowerBlue', 'SlateBlue', 'RoyalBlue', 'SteelBlue'];
        var rand = Math.floor(Math.random() * colors.length);
        $(this).css('border', '2px solid ' + colors[rand]);
    });

});



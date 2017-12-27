$(document).ready(function () {
    $(document).on('change', '.tab-checked', function () {
        var id = $(this).attr('value');
        $('.tab-content-active').removeClass('tab-content-active').addClass('tab-content-hidden');
        $('#' + id).addClass('tab-content-active');
        return false;
    });

    /*$('.slider').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,

    });

    $('.slider-float').slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,

    });*/

    $('.inline-block-questions').each(function () {
        var colors = ['green', 'pink', 'orange', 'Tan2', 'RosyBrown', 'Sienna2', 'MediumOrchid', 'Tomato', 'SandyBrown', 'DarkOrange', 'SeaGreen', 'DarkSlateGray', 'SlateGrey', 'MidnightBlue', 'CornflowerBlue', 'SlateBlue', 'RoyalBlue', 'SteelBlue'];
        var rand = Math.floor(Math.random() * colors.length);
        $(this).css('border', '2px solid ' + colors[rand]);
    });

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $(window).scroll(function () {
        var elem = $('.category-block');
        if ($(this).scrollTop() > 300) {
            elem.addClass('fixed-category-block');
        } else {
            elem.removeClass('fixed-category-block');
        }
    });
    $(window).scroll(function () {
        var elem = $('.category-block-full');
        if ($(this).scrollTop() > 100) {
            elem.addClass('fixed-category-block');
        } else {
            elem.removeClass('fixed-category-block');
        }
    });

    $('.scrollup').click(function () {
        $("html, body").animate({scrollTop: 0}, 600);
        return false;
    });

    $(".block-comments-show").on("click", function () {
        var elem = $(this).siblings();
        var textarea = elem.find('textarea');
        textarea[0].selectionStart = textarea.val().length;
        if (elem.css('display') === 'none'){
            elem.toggle('fast', function () {
                textarea.focus();
            });
        }

        return false;
    });

    $(document).on('mouseup', function (e) {
        var container = $(".block-comments-hide");
        if (container.has(e.target).length === 0){
            container.hide();
        }
    });

    /*$("#select").select2({
        placeholder: "Уровень образования",
        allowClear: true
    });*/

    $('#nav-icon').click(function () {
        $(this).toggleClass('open');
    });

});


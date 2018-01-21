$(document).ready(function () {
    /*$("#select").select2({
        placeholder: "Уровень образования",
        allowClear: true
    });*/

    $(document).on('change', '.tab-checked', function () {
        var id = $(this).attr('value');
        $('.tab-content-active').removeClass('tab-content-active').addClass('tab-content-hidden');
        $('#' + id).addClass('tab-content-active');
        return false;
    });
    /*скрываем-показываем поля на 1 вкладке*/
    $(".cat-first").hide();
    $("#main").show();
    $("a.main-link, a.education-link, a.work-link, a.skill-link, a.about-link").on("click", function () {
        var id = $(this).attr('href');
        $(".cat-first").hide();
        $(id).slideToggle();
    });
    $('#change-password-link').click( function(event){ // лoвим клик пo ссылки с id="go"
        event.preventDefault(); // выключaем стaндaртную рoль элементa
        $('#overlay').fadeIn(400, // снaчaлa плaвнo пoкaзывaем темную пoдлoжку
            function(){ // пoсле выпoлнения предъидущей aнимaции
                $('#modal_form')
                    .css('display', 'block') // убирaем у мoдaльнoгo oкнa display: none;
                    .animate({opacity: 1, top: '50%'}, 200); // плaвнo прибaвляем прoзрaчнoсть oднoвременнo сo съезжaнием вниз
            });
    });
    /* Зaкрытие мoдaльнoгo oкнa, тут делaем тo же сaмoе нo в oбрaтнoм пoрядке */
    $('#modal_close, #overlay').click( function(){ // лoвим клик пo крестику или пoдлoжке
        $('#modal_form')
            .animate({opacity: 0, top: '45%'}, 200,  // плaвнo меняем прoзрaчнoсть нa 0 и oднoвременнo двигaем oкнo вверх
                function(){ // пoсле aнимaции
                    $(this).css('display', 'none'); // делaем ему display: none;
                    $('#overlay').fadeOut(400); // скрывaем пoдлoжку
                }
            );
    });
    $(".menu-main a").on("click", function () {
        $(".menu-main a").removeClass('current');
        $(this).parent().children(" a ").addClass('current');
    })
    /*добавляем поле Навык при клике на кнопку + */
    $('#add-skill').on("click", function() {
        $('<input type="text" class="form-control skill-input" name="skill[]" placeholder="Навык :"/>').fadeIn('slow').appendTo('.skill');
    });
    $('#del-skill').on("click", function() {
        var i = $('.skill-input').length;
        if (i > 1) {$('.skill-input:last').remove();}
    });
    /*добавляем поля Образования при клике на кнопку + */

    /*скрываем-показываем поля на 2 вкладке*/
    $(".cat-second").hide()
    $("#category_1").show();
    $("a.category_1, a.category_n").on("click", function () {
        var id = $(this).attr('href');
        $(".cat-second").hide();
        $(id).slideToggle();
    });
    /*скрываем-показываем поля на 3 вкладке*/
    $(".cat-third").hide()
    $("#category_1_1").show();
    $("a.category_1_1, a.category_n_n").on("click", function () {
        var id = $(this).attr('href');
        $(".cat-third").hide();
        $(id).slideToggle();
    });
    /*скрываем-показываем поля на 4 вкладке*/
    $(".cat-fourth").hide()
    $("#category_1_1_1").show();
    $("a.category_1_1_1, a.category_n_n_n").on("click", function () {
        var id = $(this).attr('href');
        $(".cat-fourth").hide();
        $(id).slideToggle();
    });
    /*скрываем-показываем поля на 5 вкладке*/
    $(".cat-fifth").hide()
    $("#category_1_1_1_1").show();
    $("a.category_1_1_1_1, a.category_n_n_n_n").on("click", function () {
        var id = $(this).attr('href');
        $(".cat-fifth").hide();
        $(id).slideToggle();
    });
    /*скрываем-показываем поля на 6 вкладке*/
    $(".cat-sixth").hide()
    $("#category_1_1_1_1_1").show();
    $("a.category_1_1_1_1_1, a.category_n_n_n_n_n").on("click", function () {
        var id = $(this).attr('href');
        $(".cat-sixth").hide();
        $(id).slideToggle();
    });
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });
});
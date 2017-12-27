$(document).ready(function () {
    var token = yii.getCsrfToken();
    var param = yii.getCsrfParam();

    $('.post-like, .post-dislike').on('click', function () {
        var elem = $(this);
        var countElemSelector = '#likes-count' + elem.data('id');

        var data = {
            id: elem.data('id'),
            like: elem.data('like'),
            active: elem.hasClass('like-active')
        };
        data[param] = token;
        $.post(elem.attr('href'), data, function (response) {
            response = JSON.parse(response);
            $(countElemSelector).text(response.value);
            likeClassRevert(elem);
        });

        return false;
    });

    function likeClassRevert(elem) {
        if(elem.hasClass('like-active')){
            elem.removeClass('like-active');
        }else {
            elem.addClass('like-active');
            if(elem.attr('id').indexOf('dislike') === 0){
                $('#like' + elem.data('id')).removeClass('like-active');
            }else {
                $('#dislike' + elem.data('id')).removeClass('like-active');
            }
        }
    }

    $('.user-favourite').on('click', function () {
        var elem = $(this);
        var activeClass = 'info-active';
        var data = {
            active: elem.hasClass(activeClass)
        };
        data[param] = token;
        $.post(elem.attr('href'), data, function (response) {
            var result = JSON.parse(response);

            if(result.success === true){
                if(result.action === 'save'){
                    elem.addClass(activeClass);
                }else if(result.action === 'delete'){
                    elem.removeClass(activeClass);
                }
                elem.find('span').text(result.count)
            }
        });

        return false;
    });
});

$(document).ready(function () {
    var token = yii.getCsrfToken();
    var param = yii.getCsrfParam();

    $('.post-like, .post-dislike').on('click', function () {
        var elem = $(this);
        var countElemSelector = '#likes-count' + elem.data('id');
        console.log(countElemSelector);
        var data = {
            id: elem.data('id')
        };
        data[param] = token;
        $.post(elem.attr('href'), data, function (response) {
            response = JSON.parse(response);
            $(countElemSelector).text(response.value);
            console.log(response);
        });

        return false;
    })
});

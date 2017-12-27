$(document).ready(function () {
    $('.block-comments-hide').on('submit', function () {
        var elem = $(this);
        var text = elem.find('textarea').val().split(',');
        text.shift();
        text = text.join(',');
        var data = {
            text: text,
            post_id: $('input[name=post_id]').val(),
            parent_id: elem.find('input[name=parent_id]').val()
        };

        $.post(elem.attr('action'), data, function (response) {
            result = JSON.parse(response);
            if(result.result === true){
                elem.parent().next().after(result.html);
                //elem.find('textarea').val(clearTextarea(elem.find('textarea')));
                elem.hide();
            }
             console.log();
        });

        return false;
    });

    function clearTextarea(elem) {
        var text = elem.val().slice(',')[0];
        console.log(text);
        return text + ', ';
    }
});
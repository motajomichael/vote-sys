$(document).ready(function () {
    function wait(func, time) {
        window.setTimeout(function () {
            func.call();
        }, time);
    }

    function changeFigureText(newpos) {
        $('div.sub-head').text(newpos);
    }

    function Voted(target) {
        return target.parents('fieldset').find('input[type=radio]').is(':checked') ? true : false;
    }
    var Btn = Array,
        Finish = $('#finish'),
        notifications = {
            obj: $('#fixedNotification'),
            message: function (message) {
                this.obj.addClass('shown').text(message);
                wait(function () {
                    notifications.obj.toggleClass('shown');
                }, 5000);
            }
        };

    Btn['startVote'] = $('.start-vote');
    Btn['next'] = $('.next');
    Btn['position-caption'] = $('.form-head');

    Btn['startVote'].on('click', function () {
        target = $(this);
        target.addClass('hidden');
        wait(function () {
            target.hide();
            $('#vote').show();
        }, 300);
    });

    Btn['next'].on('click', function (e) {
        e.preventDefault();
        var target = $(this);
        if (Voted(target)) {
            activeFieldset = $('.active');
            activeFieldset.addClass('opaque').slideUp();
            wait(function () {
                activeFieldset.removeClass('active').next().addClass('active');
                changeFigureText($('.active').attr('id'));
                $('.active').addClass('opened');
//                $('html,body').animate({
//                    scrollTop: "+=" + 400
//                }, 300);
            }, 400);
        } else {
            notifications.message('Please choose a candidate then click next');
        };
    });

    Btn['next'].last().click(function () {
        var completed;
        $('.hiddenCheck').each(function () {
            if ($(this).val() == '') completed = false, notifications.message('Please vote in all positions');
            else completed = true;
            console.log($(this).val());
        });
        if (completed) Finish.show();
    });

    Btn['position-caption'].click(function () {
        $(this).parent().toggleClass('opened active');
        $(this).parent().siblings().removeClass('opened active');
        changeFigureText($(this).text());
    });

    $('.candidates label').click(function (e) {
        e.stopImmediatePropagation();
        console.log('click');
        $(this).parents('fieldset').find('.hiddenCheck').val('true');
    });
});
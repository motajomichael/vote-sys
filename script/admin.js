$(document).ready(function () {
    var dashboard = $('.dashboard'),
        choosePhoto = $('.file');
    var adminTools = {
            obj: $('.dashboard ul li'),
            switchView: function (view) {
                $('#' + view).fadeIn().siblings('.views').fadeOut();
            },
            addCandPost: {
                form: $('[name=addCandidte]'),
                showPhoto: function (input, target) {
                    var Reader = new FileReader();
                    if (input.files && input.files[0]) {
                        Reader.readAsDataURL(input.files[0]);
                    } else console.log('files is empty');
                    Reader.onloadend = function () {
                        $("<img>", {
                            class: 'photo',
                            src: Reader.result
                        }).appendTo(target);
                    }
                }
            }
        },
        notifications = {
            obj: $('#fixedNotification'),
            message: function (message) {
                this.obj.addClass('shown').text(message);
                wait(function () {
                    notifications.obj.toggleClass('shown');
                }, 5000);
            }
        };
    adminTools.obj.on('click', function () {
        $(this).addClass('active').siblings().removeClass('active');
        adminTools.switchView($(this).data('view'));
        console.log($(this).data('view'));
    });
    adminTools.obj.filter(':eq(1)').trigger('click');
    $(document).scroll(function () {
        if ($(this).scrollTop() > 200) dashboard.addClass('fixed');
        else dashboard.removeClass('fixed');
    });

    choosePhoto.click(function (e) {
        e.preventDefault();
        $('input[type=file]').trigger('click');
    });
    $('input[type=file]').change(function () {
        adminTools.addCandPost.showPhoto(this, $(this).parent());
    });
    $('.addPost').click(function (e) {
        e.preventDefault();
        addCandPostAjax();
    });
    $('.delCand').click(function (e) {
        e.preventDefault();
        handleCandidateDelete();
    });

    function addCandPostAjax(btn) {
        var formData = {
            nposition: $('[name=nposition]').val()
        };
        $.ajax({
            url: '../php/other/candpost.php',
            data: formData,
            type: 'post',
            success: function (evtResults) {
                notifications.message(evtResults);
            },
            error: function () {
                notifications.message('There is a problem with the system at the moment');
            }
        })
    }

    function handleCandidateDelete() {
        var formData = {
            position: $('[name=delposition]').val(),
            delcandidate: $('[name=delcandidate]').val()
        };
        $.ajax({
            url: '../php/other/candpost.php',
            data: formData,
            type: 'post',
            success: function (evtResults) {
                notifications.message(evtResults);
            },
            error: function () {
                notifications.message('There is a problem with the system at the moment');
            }
        })
    }
});
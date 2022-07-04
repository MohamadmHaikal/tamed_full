"use strict";
// Verification Code Inputs
$('.digit-group').find('input').each(function () {
    $(this).attr('maxlength', 1);
    $(this).on('keyup', function (e) {
        var parent = $($(this).parent());
        if (e.keyCode === 8 || e.keyCode === 37) {
            var prev = parent.find('input#' + $(this).data('previous'));
            if (prev.length) {
                $(prev).select();
            }
        } else if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {
            var next = parent.find('input#' + $(this).data('next'));
            if (next.length) {
                $(next).select();
            } else {
                if (parent.data('autosubmit')) {
                    parent.submit();
                }
            }
        }
    });
});
// Form hide and show
$("#getCodeButton").on('click', function () {

    var mobile = document.getElementById("mobile").value;
    var password = document.getElementById("password").value;
    let _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: "/auth/check",
        type: "post",
        dataType: "json",
        data: {
            _token: _token,
            mobile: mobile,
            password: password,
        },
        success: function (data) {

            document.getElementById("alert").innerHTML = data['message'].substring(0, data['message']
                .length);

            $('.toast').toast('show');
            if (data['status'] == 1) {
                document.getElementById("codeNote").innerText = window.translate.auth;
                document.getElementById("codeNote").innerText = '(' + data['mobile'].substring(7, 12) + '****)';
                $(".form-1").removeClass("fadeInLeft show");
                $(".form-1").hide();
                $(".form-2").addClass("fadeInRight show");
                document.getElementById("phone").value = data['mobile'];
                $(".login-three-inputs").hide();
                $(".title1").remove();
                $("#getCodeButton").remove();
                $('.checkButton').append('<a class="text-white btn " id="CodeSubmit" style=" background-color:#0298a7; width: 50%; height: 100%;  border-radius: 25px;" href="javascript:void(0);">' + window.translate.continue + '</a>');
                $("#newAccount").hide();
                $(".soonImg").hide();
                document.getElementById("underCheck").innerHTML = '<a id="resendCode" style="color:#0298a7;" href="javascript:void(0);">إعادة إرسال الرمز</a>';
                $("#CodeSubmit").on('click', function () {
                    var mobile = document.getElementById("mobile").value;
                    var data = $(".digit-group").serializeArray().reverse();
                    var code = '';
                    $.each(data, function (i, field) {
                        code = code + '' + field.value;
                    });
                    console.log(code);

                    let _token = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: "/auth/checkCode",
                        type: "post",
                        dataType: "json",
                        data: {
                            _token: _token,
                            IdCard: mobile,
                            code: code,

                        },
                        success: function (data) {

                            document.getElementById("alert").innerHTML = data['message'].substring(0, data['message']
                                .length);

                            $('.toast').toast('show');
                            if (data['status'] == '1') {
                                $.ajax({
                                    url: "/auth/login",
                                    type: "post",
                                    dataType: "json",
                                    data: {
                                        _token: _token,
                                        id: data['user'],

                                    },
                                    success: function (data) {



                                        setTimeout(function () {
                                            window.location.reload();
                                        }, 1300);



                                    },

                                });
                            }




                        },



                    });



                });
            }
            if (data['reload']) {
                setTimeout(function () {
                    window.location.reload();
                }, 1300);

            }

        },


    });



});
function CheckPassword(inputtxt) {
    var passw = /^[A-Za-z]\w{7,14}$/;
    if (inputtxt.match(passw)) {

        return true;
    }
    else {

        return false;
    }
}

$("#getCodeSign").on('click', function () {

    var IdCard = document.getElementById("IdCard").value;
    var password = document.getElementById("password").value;
    var name = document.getElementById("name").value;
    var passwordConfirm = document.getElementById("passwordConfirm").value;
    var mobile = document.getElementById("mobile").value;

    if (IdCard.length == 0 || IdCard.length != 10) {
        document.getElementById("alert").innerHTML =
            '<div style="position:fixed; bottom: 15px; right: 0;z-index: 9999; margin-left: 20px; margin-right: 20px;"> <div class="toast toast-danger fade hide" role="alert" data-delay="2000" aria-live="assertive"  aria-atomic="true"><div class="toast-header-danger"> <strong class="mr-auto pr-3 pl-3" id="mr-auto">' +
            window.translate.systemMessages +
            '</strong><button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button></div> <div class="toast-body" id="toast-body">رقم الهوية / الاقامة يجب ان يكون من 10 خانات او ارقام</div></div></div>';
        $('.toast').toast('show');


    }
    else if (password != '' && passwordConfirm != password) {
        document.getElementById("alert").innerHTML =
            '<div style="position:fixed; bottom: 15px; right: 0;z-index: 9999; margin-left: 20px; margin-right: 20px;"> <div class="toast toast-danger fade hide" role="alert" data-delay="2000" aria-live="assertive"  aria-atomic="true"><div class="toast-header-danger"> <strong class="mr-auto pr-3 pl-3" id="mr-auto">' +
            window.translate.systemMessages +
            '</strong><button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button></div> <div class="toast-body" id="toast-body">   كلمة المرور و تأكيد كلمة المرور غير متطابقين</div></div></div>';
        $('.toast').toast('show');

    }
    else if (CheckPassword(password)) {
        document.getElementById("alert").innerHTML =
            '<div style="position:fixed; bottom: 15px; right: 0;z-index: 9999; margin-left: 20px; margin-right: 20px;"> <div class="toast toast-danger fade hide" role="alert" data-delay="2000" aria-live="assertive"  aria-atomic="true"><div class="toast-header-danger"> <strong class="mr-auto pr-3 pl-3" id="mr-auto">' +
            window.translate.systemMessages +
            '</strong><button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button></div> <div class="toast-body" id="toast-body">كلمة المرور يجب ان تكون احرف وارقام</div></div></div>';
        $('.toast').toast('show');

    }
    else if (mobile.substring(0, 3) != '966') {
        document.getElementById("alert").innerHTML =
            '<div style="position:fixed; bottom: 15px; right: 0;z-index: 9999; margin-left: 20px; margin-right: 20px;"> <div class="toast toast-danger fade hide" role="alert" data-delay="2000" aria-live="assertive"  aria-atomic="true"><div class="toast-header-danger"> <strong class="mr-auto pr-3 pl-3" id="mr-auto">' +
            window.translate.systemMessages +
            '</strong><button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button></div> <div class="toast-body" id="toast-body">رقم الجوال يجب ان يبدأ ب 966 </div></div></div>';
        $('.toast').toast('show');

    }
    else {
        let _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "/auth/signUp",
            type: "post",
            dataType: "json",
            data: {
                _token: _token,
                IdCard: IdCard,
                mobile: mobile,
                name: name,
                password: password,

            },
            success: function (data) {

                document.getElementById("alert").innerHTML = data['message'].substring(0, data['message']
                    .length);

                $('.toast').toast('show');
                if (data['status'] == 1) {
                    document.getElementById("codeNote").innerText = window.translate.auth;
                    document.getElementById("codeNote").innerText = '(' + data['mobile'].substring(7, 12) + '****)';
                    $(".form-1").removeClass("fadeInLeft show");
                    $(".form-1").hide();
                    $(".form-2").addClass("fadeInRight show");
                    document.getElementById("phone").value = data['mobile'];
                    $(".login-three-inputs").hide();
                    $(".title1").remove();
                    $("#getCodeSign").remove();
                    $('.checkButton').append('<a class="text-white btn " id="CodeSubmit" style=" background-color:#0298a7; width: 50%; height: 100%;  border-radius: 25px;" href="javascript:void(0);">' + window.translate.continue + '</a>');
                    $("#newAccount").hide();
                    $(".soonImg").hide();
                    document.getElementById("underCheck").innerHTML = '<a id="resendCode" style="color:#0298a7;" href="javascript:void(0);">إعادة إرسال الرمز</a>';
                    $("#CodeSubmit").on('click', function () {
                        var IdCard = document.getElementById("IdCard").value;
                        var data = $(".digit-group").serializeArray().reverse();
                        var code = '';
                        $.each(data, function (i, field) {
                            code = code + '' + field.value;
                        });
                        console.log(code);

                        let _token = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            url: "/auth/checkCode",
                            type: "post",
                            dataType: "json",
                            data: {
                                _token: _token,
                                IdCard: IdCard,
                                code: code,

                            },
                            success: function (data) {


                                if (data['status'] == '1') {
                                    $.ajax({
                                        url: "/auth/login",
                                        type: "post",
                                        dataType: "json",
                                        data: {
                                            _token: _token,
                                            id: data['user']

                                        },
                                        success: function (data) {


                                            document.getElementById("alert").innerHTML =
                                                '<div style="position:fixed; bottom: 15px; right: 0;z-index: 9999; margin-left: 20px; margin-right: 20px;"> <div class="toast toast-success fade hide" role="alert" data-delay="2000" aria-live="assertive"  aria-atomic="true"><div class="toast-header-success"> <strong class="mr-auto pr-3 pl-3" id="mr-auto">' +
                                                window.translate.systemMessages +
                                                '</strong><button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button></div> <div class="toast-body" id="toast-body">' +
                                                window.translate.successfully + '</div></div></div>';
                                            $('.toast').toast('show');
                                            setTimeout(function () {
                                                window.location.reload();
                                            }, 1300);



                                        },



                                    });
                                }


                            },

                        });



                    });
                }
                if (data['reload']) {
                    setTimeout(function () {
                        window.location.reload();
                    }, 1300);

                }

            },


        });
    }


});


$("#getResetCode").on('click', function () {

    var IdCard = document.getElementById("IdCard").value;
    if (IdCard.length == 0 || IdCard.length != 10) {
        document.getElementById("alert").innerHTML =
            '<div style="position:fixed; bottom: 15px; right: 0;z-index: 9999; margin-left: 20px; margin-right: 20px;"> <div class="toast toast-danger fade hide" role="alert" data-delay="2000" aria-live="assertive"  aria-atomic="true"><div class="toast-header-danger"> <strong class="mr-auto pr-3 pl-3" id="mr-auto">' +
            window.translate.systemMessages +
            '</strong><button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button></div> <div class="toast-body" id="toast-body">رقم الهوية / الاقامة يجب ان يكون من 10 خانات او ارقام</div></div></div>';
        $('.toast').toast('show');


    }

    else {
        let _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "/auth/checkCardToReset",
            type: "post",
            dataType: "json",
            data: {
                _token: _token,
                IdCard: IdCard,
            },
            success: function (data) {

                document.getElementById("alert").innerHTML = data['message'].substring(0, data['message']
                    .length);

                $('.toast').toast('show');
                if (data['status'] == 1) {
                    document.getElementById("codeNote").innerText = window.translate.auth;
                    document.getElementById("codeNote").innerText = '(' + data['mobile'].substring(7, 12) + '****)';
                    $(".form-1").removeClass("fadeInLeft show");
                    $(".form-1").hide();
                    $(".form-2").addClass("fadeInRight show");
                    document.getElementById("phone").value = data['mobile'];
                    $(".login-three-inputs").hide();
                    $(".title1").remove();
                    $("#getResetCode").remove();
                    $('.checkButton').append('<a class="text-white btn " id="CodeSubmit" style=" background-color:#0298a7; width: 50%; height: 100%;  border-radius: 25px;" href="javascript:void(0);">' + window.translate.continue + '</a>');
                    $("#newAccount").hide();
                    $(".soonImg").hide();
                    document.getElementById("underCheck").innerHTML = '<a id="resendCode" style="color:#0298a7;" href="javascript:void(0);">إعادة إرسال الرمز</a>';
                    $("#CodeSubmit").on('click', function () {
                        var IdCard = document.getElementById("IdCard").value;
                        var data = $(".digit-group").serializeArray().reverse();
                        var code = '';
                        $.each(data, function (i, field) {
                            code = code + '' + field.value;
                        });
                        console.log(code);

                        let _token = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            url: "/auth/checkCode",
                            type: "post",
                            dataType: "json",
                            data: {
                                _token: _token,
                                IdCard: IdCard,
                                code: code,

                            },
                            success: function (data) {

                                if (data['status'] == '1') {
                                    document.getElementById("alert").innerHTML = data['message'].substring(0, data['message']
                                        .length);

                                    $('.toast').toast('show');
                                    $(".form-2").removeClass("fadeInRight show");
                                    $('.password').append('  <div class="login-three-inputs mt-4"> <input type="password" placeholder="كلمة المرورالجديدة" id="password">  </div>  <div class="login-three-inputs mt-4"><input type="password" placeholder="تأكيد كلمة المرور الجديدة " id="passwordConfirm"> </div>');
                                    document.getElementById("underCheck").innerHTML = '';
                                    $("#CodeSubmit").remove();
                                    $('.checkButton').append('<a class="text-white btn " id="resetPassword" style=" background-color:#0298a7; width: 50%; height: 100%;  border-radius: 25px;" href="javascript:void(0);">' + window.translate.continue + '</a>');


                                    $("#resetPassword").on('click', function () {
                                        var password = document.getElementById("password").value;
                                        var passwordConfirm = document.getElementById("passwordConfirm").value;
                                        if (password == '') {

                                            document.getElementById("alert").innerHTML =
                                                '<div style="position:fixed; bottom: 15px; right: 0;z-index: 9999; margin-left: 20px; margin-right: 20px;"> <div class="toast toast-danger fade hide" role="alert" data-delay="2000" aria-live="assertive"  aria-atomic="true"><div class="toast-header-danger"> <strong class="mr-auto pr-3 pl-3" id="mr-auto">' +
                                                window.translate.systemMessages +
                                                '</strong><button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button></div> <div class="toast-body" id="toast-body">   كلمة المرور مطلوبة </div></div></div>';
                                            $('.toast').toast('show');
                                        }
                                        else if (passwordConfirm == '') {
                                            document.getElementById("alert").innerHTML =
                                                '<div style="position:fixed; bottom: 15px; right: 0;z-index: 9999; margin-left: 20px; margin-right: 20px;"> <div class="toast toast-danger fade hide" role="alert" data-delay="2000" aria-live="assertive"  aria-atomic="true"><div class="toast-header-danger"> <strong class="mr-auto pr-3 pl-3" id="mr-auto">' +
                                                window.translate.systemMessages +
                                                '</strong><button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button></div> <div class="toast-body" id="toast-body">    تأكيد كلمة المرور مطلوبة </div></div></div>';
                                            $('.toast').toast('show');
                                        } else if (password != '' && passwordConfirm != password) {
                                            document.getElementById("alert").innerHTML =
                                                '<div style="position:fixed; bottom: 15px; right: 0;z-index: 9999; margin-left: 20px; margin-right: 20px;"> <div class="toast toast-danger fade hide" role="alert" data-delay="2000" aria-live="assertive"  aria-atomic="true"><div class="toast-header-danger"> <strong class="mr-auto pr-3 pl-3" id="mr-auto">' +
                                                window.translate.systemMessages +
                                                '</strong><button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button></div> <div class="toast-body" id="toast-body">   كلمة المرور و تأكيد كلمة المرور غير متطابقين</div></div></div>';
                                            $('.toast').toast('show');

                                        }
                                        else {
                                            $.ajax({
                                                url: "/auth/reset-password",
                                                type: "post",
                                                dataType: "json",
                                                data: {
                                                    _token: _token,
                                                    IdCard: IdCard,
                                                    password: password
                                                },
                                                success: function (data) {
                                                    document.getElementById("alert").innerHTML = data['message'].substring(0, data['message']
                                                        .length);

                                                    $('.toast').toast('show');
                                                    setTimeout(function () {
                                                        window.location.replace("/auth/login");
                                                    }, 1300);
                                                }
                                            });
                                        }

                                    });



                                }


                            },

                        });



                    });
                }
                if (data['reload']) {
                    setTimeout(function () {
                        window.location.reload();
                    }, 1300);

                }

            },


        });
    }


});
$("#changeEmailAddress").on('click', function () {
    $(".form-2").removeClass("fadeInRight show");
    $(".form-2").hide();
    $(".form-1").addClass("fadeInLeft show");
});
// Captcha
function Captcha() {
    var alpha = new Array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
        '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    var i;
    for (i = 0; i < 6; i++) {
        var a = alpha[Math.floor(Math.random() * alpha.length)];
        var b = alpha[Math.floor(Math.random() * alpha.length)];
        var c = alpha[Math.floor(Math.random() * alpha.length)];
        var d = alpha[Math.floor(Math.random() * alpha.length)];
        var e = alpha[Math.floor(Math.random() * alpha.length)];
        var f = alpha[Math.floor(Math.random() * alpha.length)];
        var g = alpha[Math.floor(Math.random() * alpha.length)];
    }
    var code = a + ' ' + b + ' ' + ' ' + c + ' ' + d + ' ' + e + ' ' + f + ' ' + g;
    document.getElementById("mainCaptcha").innerHTML = code;
    document.getElementById("mainCaptcha").value = code;
    removeCaptcha();
}

function ValidCaptcha() {
    var string1 = removeSpaces(document.getElementById('mainCaptcha').value);
    var string2 = removeSpaces(document.getElementById('txtInputCaptcha').value);
    if (string1 == string2) {
        // return true;
        $("#Button1").hide();
        $("#checkMark").show();
        $("#checkMark").addClass("fadeInUp");
        $("#txtInputCaptcha").removeClass("error");
    } else {
        $("#checkMark").hide();
        $("#checkMark").removeClass("fadeInUp");
        $("#Button1").show();
        $("#txtInputCaptcha").addClass("error");
    }
}

function removeCaptcha() {
    $("#checkMark").hide();
    $("#checkMark").removeClass("fadeInUp");
    $("#Button1").show();
}

function removeSpaces(string) {
    return string.split(' ').join('');
}
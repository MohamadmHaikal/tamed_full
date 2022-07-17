
function Create(element) {
    let base = this;
    $(document).on('click', '#createItem', function (ev) {
        ev.preventDefault();
        let form = $(this).closest("form")
        let data = [];
        //   $('.checkout-form', container).each(function () {
        data = data.concat(form.serializeArray());
        //   });
        data.push({
            name: '_token',
            value: $('meta[name="csrf-token"]').attr('content')
        });
        element.disabled = true;

        $.post(form.attr('action'), data, function (respon) {

            if (typeof respon === 'object') {

                if (respon.force_redirect) {
                    window.location.href = respon.force_redirect;
                } else {

                    document.getElementById("alert").innerHTML = respon.message.substring(0, respon.message
                        .length);

                    $('.toast').toast('show');


                    //   if ($('.form-message', form).length) {
                    //       $('.form-message', form).html(respon.message);
                    //   } else {
                    //       base.alert(respon);
                    //   }

                    form.trigger('hh_form_action_complete', [respon]);

                    if (form.hasClass('.has-reset')) {
                        form.get(0).reset();
                    }
                    if (respon.redirect) {
                        setTimeout(function () {
                            window.location.href = respon.redirect;
                        }, 1000);
                    }

                    if (respon.reload) {
                        setTimeout(function () {
                            window.location.reload();
                        }, 1000);
                    }
                }
                if (respon.need_login) {
                    $('a[data-target="#hh-login-modal"]', 'body').trigger('click');
                }

                if (respon.redirect) {
                    window.location.href = respon.redirect;
                }
                if (respon.redirect_form) {
                    $('body').append(respon.redirect_form);
                }
                if (respon.form_id) {
                    $(respon.form_id).find("script").each(function () {
                        eval($(this).text());
                    });
                }
            }

        }, 'json');

    });
}

function Delete(element) {

    let base = this;
    $(document).on('click', '.hh-link-action', function (ev) {



        let t = $(this),
            parent = t.closest(t.data('parent')),
            hasLoading = t.data('page-loading');


        ev.preventDefault();

        let dataConfirm = t.data('confirm');
        if (dataConfirm == 'yes') {

            swal({
                title: t.data('confirm-title'),
                text: t.data('confirm-question'),
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Confirm',
                padding: '2em'
            }).then(function (result) {
                if (result.value) {
                    let data = JSON.parse(t.attr('data-params'));
                    data['_token'] = $('meta[name="csrf-token"]').attr('content');
                    $.post(t.attr('data-action'), data, function (respon) {


                        if (typeof respon == 'object') {
                            document.getElementById("alert").innerHTML = respon.message.substring(0, respon.message
                                .length);

                            $('.toast').toast('show');

                            if (respon.redirect) {
                                setTimeout(function () {
                                    window.location.href = respon.redirect;
                                }, 1500);
                            }

                            if (respon.reload) {
                                setTimeout(function () {
                                    window.location.reload();
                                }, 1000);
                            }
                        }
                    }, 'json');

                }
            });
        } else {

            ev.preventDefault();
            let data = JSON.parse(t.attr('data-params'));
            if (typeof data == 'object') {

                data['_token'] = $('meta[name="csrf-token"]').attr('content');
                data['type'] = t.data('type')
                $.post(t.attr('data-action'), data, function (respon) {

                    if (typeof respon == 'object') {

                        if (respon.action) {
                            $("#form-Item").attr("action", respon.action);
                        }

                        if (respon.action) {
                            $("#model").attr("value", respon.model);
                        }

                        if (respon.title) {
                            $(".modal-title").text(respon.title);
                            $("#type").text(respon.type);
                        }
                        var valueR = '';
                        $.each(respon.arrayItem, function (key, value) {
                            console.log(value);
                            if (respon.type == 'Show') {
                                valueR += `<div class="form-group">
                                <label>${window.translations.nameOfItem}</label>
                                <input type="${value.columnType}" class="form-control" disabled
                                 value="${value.ValueColumn}" name=" ${value.columnName}" 
                                 id="${value.columnName}">
                                   </div>`
                                $(".md-button").css("display", "none");
                            } else {
                                if (value.columnType == 'select') {

                                    valueR += `<select class="form-control form-control-sm" name="${value.columnName}">`
                                    $.each(value.options, function (key, option) {
                                        if (option.name == value.ValueColumn) {
                                            valueR += ` <option value="${option.id}" selected  >${option.name}</option>`
                                        } else {
                                            valueR += ` <option value="${option.id}"  >${option.name}</option>`
                                        }

                                    });
                                    `</select>`
                                } else {

                                    valueR += `<div class="form-group">
                                            <label>${window.translations.nameOfItem}</label>
                                            <input type="${value.columnType}" class="form-control"
                                             value="${value.ValueColumn}" name=" ${value.columnName}" 
                                             id="${value.columnName}">
                                             <input type="hidden" class="form-control"
                                             value="${value.IDColumn}" name="id" >
                                                 </div>`
                                }

                                $(".md-button").css("display", "block");
                            }
                        });
                        $('#widget-content-area').empty().append(valueR)

                        $('#Create').modal('show');

                        // base.alert(respon);
                        t.trigger('hh_link_action_completed', [respon]);

                        if (respon.redirect) {
                            setTimeout(function () {
                                window.location.href = respon.redirect;
                            }, 1500);
                        }

                        if ($(parent).length) {
                            $(parent).removeClass('is-doing');
                            if (t.attr('data-is-delete') == 'true') {
                                $(parent).addClass('is-deleted');
                                $(parent).one(whichTransitionEvent(), function () {
                                    $(parent).hide();
                                });
                            }
                        }
                        if (respon.reload) {
                            window.location.reload();
                        }
                    }
                    if (hasLoading && typeof hasLoading !== 'undefined') {
                        $('.hh-loading.page-loading').hide();
                    }
                }, 'json');

            } else {
                alert('Have a error when parse the data');
            }
        }

    });
}

$('.confirmDelete').on('click', function () {
    var id = $(this).data('id');
    var action = $(this).data('action');
    console.log(id);
    swal({
        title: window.translation.deletemodal1,
        text: window.translation.deletemodal2,
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: window.translation.cancle,
        confirmButtonText: window.translation.confirm,
        padding: '2em'
    }).then(function (result) {

        if (result.value) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: action + id,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if (data['status'] == '1') {
                        swal(
                            window.translation.deleted,
                            window.translation.success,
                            'success'
                        )
                    }
                    if (data['reload']) {
                        setTimeout(function () {
                            window.location.reload();
                        }, 1000);

                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });

        }
    })
});
$('.changestatus').on('click', function () {
    var id = $(this).data('id');
    var status = $(this).data('status');
    var action = $(this).data('action');
    var fd = new FormData();
    fd.append('status', status);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: action + id,
        cache: false,
        data: fd,
        contentType: false,
        processData: false,
        success: (data) => {
            if (data['status'] == '1') {
                document.getElementById("alert").innerHTML = data['message'].substring(0, data['message']
                    .length);
                $('.toast').toast('show');
            }
            if (data['reload']) {
                setTimeout(function () {
                    window.location.reload();
                }, 1000);

            }
        },
        error: function (data) {
            console.log(data);
        }
    });
});
$(".show-user").click(function () {
    var id = $(this).data('id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: "/users/show/" + id,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            console.log(window.translation);
            const element = document.getElementById("exampleModal");
            console.log(data);
            if (element != null) { element.remove(); }
            if (data['role'] == 'Customer') {
                $("body").append(' <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document">   <div class="modal-content">   <div class="modal-header">  <h5 class="modal-title" id="exampleModalLabel">' + window.translation.userInfo + '</h5>  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="las la-times"></i> </button> </div><div class="modal-body"><div class="row"> <div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.userName + '</label><input type="text" name="project_name"  class="form-control mb-4" value="' + data['name'] + '"disabled> </div></div><div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.phone + '</label><input type="text" name="project_name" class="form-control mb-4" value="' + data['phone'] + '" disabled=""> </div></div></div><div class="row"> <div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.email + '</label><input type="text" name="project_name"  class="form-control mb-4" value="' + data['email'] + '"disabled> </div></div></div></div></div></div></div>');
            } else {
                $("body").append(' <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document">   <div class="modal-content">   <div class="modal-header">  <h5 class="modal-title" id="exampleModalLabel">' + window.translation.userInfo + '</h5>  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="las la-times"></i> </button> </div><div class="modal-body"><div class="row"> <div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.userName + '</label><input type="text" name="project_name"  class="form-control mb-4" value="' + data['name'] + '"disabled> </div></div><div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.phone + '</label><input type="text" name="project_name" class="form-control mb-4" value="' + data['phone'] + '" disabled=""> </div></div></div><div class="row"> <div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.email + '</label><input type="text" name="project_name"  class="form-control mb-4" value="' + data['email'] + '"disabled> </div></div><div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.UserType + '</label><input type="text" name="project_name" class="form-control mb-4" value="' + data['userType'] + '" disabled=""> </div></div></div><div class="row"> <div class="col-md-6"><div class="form-group"><label class="fieldlabels">' + window.translation.nameactivities + '</label> <input id="basicExample" name="start_date"class="form-control flatpickr flatpickr-input active basicExample"type="text" value="' + data['userActivity'] + '"disabled> </div> </div> </div></div></div></div></div>');


            }
            $('#exampleModal').modal('show');
        },
        error: function (data) {
            console.log(data);
        }
    });


});

$(".edit-user").click(function () {
    var id = $(this).data('id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: "/users/show/" + id,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            const element = document.getElementById("editModal");
            if (element != null) { element.remove(); }
            if (data['role'] == 'Customer') {
                $("body").append(' <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document">   <div class="modal-content">   <div class="modal-header">  <h5 class="modal-title" id="exampleModalLabel">' + window.translation.userInfo + '</h5>  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="las la-times"></i> </button> </div><div class="modal-body"><div class="row"> <div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.userName + '</label><input type="text" id="user_name"  class="form-control mb-4" value="' + data['name'] + '"> </div></div><div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.phone + '</label><input type="text" id="user_phone" class="form-control mb-4" value="' + data['phone'] + '" > </div></div></div><div class="row"> <div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.email + '</label><input type="text" id="user_email"  class="form-control mb-4" value="' + data['email'] + '"> </div></div>' +
                    '<div class="col-md-6"><div class="form-group"><label class="fieldlabels">' + window.translation.fstatus + '</label> <select class="form-control"  id="status"> </select> '
                    + '</div></div></div>'
                    + ' <div class="modal-footer"><button type="button" id="edit_user" class="btn btn-primary">' + window.translation.save + '</button> </div></div></div></div>');

            }
            else {
                $("body").append(' <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document">   <div class="modal-content">   <div class="modal-header">  <h5 class="modal-title" id="exampleModalLabel">' + window.translation.userInfo + '</h5>  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="las la-times"></i> </button> </div><div class="modal-body"><div class="row"> <div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.userName + '</label><input type="text" id="user_name"  class="form-control mb-4" value="' + data['name'] + '"> </div></div><div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.phone + '</label><input type="text" id="user_phone" class="form-control mb-4" value="' + data['phone'] + '" > </div></div></div><div class="row"> <div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.email + '</label><input type="text" id="user_email"  class="form-control mb-4" value="' + data['email'] + '"> </div></div><div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.UserType + '</label>' +
                    '<select class="form-control" name="facility_type" id="facility_type">  </select>'
                    + '</div></div></div><div class="row"> <div class="col-md-6"><div class="form-group"><label class="fieldlabels">' + window.translation.nameactivities + '</label> ' +
                    '<select class="form-control"  id="Activities_type">  </select>'
                    + '</div> </div>' +
                    '<div class="col-md-6"><div class="form-group"><label class="fieldlabels">' + window.translation.fstatus + '</label> <select class="form-control"  id="status"> </select></div> </div> '
                    + ' </div></div><div class="modal-footer"><button type="button" id="edit_user" class="btn btn-primary">' + window.translation.save + '</button> </div></div></div></div>');


            }
            var options_str = "", options_str2 = "", options_str3 = "";
            if (data['status'] == "active") {
                options_str3 += '<option value="active" selected>' + window.translation.active + '</option> <option value="InActive">' + window.translation.Inactive + '</option>';

            }
            else {
                options_str3 += '<option value="active" >' + window.translation.active + '</option> <option value="InActive" selected>' + window.translation.Inactive + '</option>';

            }
            for (let index = 0; index < data['allType'].length; index++) {
                if (data['allType'][index]['name'] == data['userType']) {
                    options_str += '<option value="' + data['allType'][index]['id'] + '" selected>' + data['allType'][index]['name'] + '</option>';

                }
                else {
                    options_str += '<option value="' + data['allType'][index]['id'] + '" >' + data['allType'][index]['name'] + '</option>';

                }

            }

            for (let index = 0; index < data['allActivity'].length; index++) {
                if (data['allActivity'][index]['name'] == data['userActivity']) {
                    options_str2 += '<option value="' + data['allActivity'][index]['id'] + '" selected>' + data['allActivity'][index]['name'] + '</option>';

                }
                else {
                    options_str2 += '<option value="' + data['allActivity'][index]['id'] + '" >' + data['allActivity'][index]['name'] + '</option>';

                }

            }
            if (data['role'] != 'Customer') {
                $('#facility_type').change(function () {
                    document.getElementById('Activities_type').innerHTML = '';
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: 'GET',
                        url: "/activity/" + this.value,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: (data) => {
                            var options_str = "<option> </option>";
                            for (let index = 0; index < data.length; index++) {


                                options_str += '<option value="' + data[index]['id'] + '">' + data[index]['name'] + '</option>';




                            }
                            document.getElementById("Activities_type").innerHTML = options_str;

                        },
                        error: function (data) {
                            console.log(data);
                        }
                    });
                });

                document.getElementById('facility_type').innerHTML = options_str;
                document.getElementById('Activities_type').innerHTML = options_str2;
            }
            document.getElementById('status').innerHTML = options_str3;
            $('#editModal').modal('show');
            $("#edit_user").click(function () {
                //console.log(111111);
                var fd = new FormData();
                fd.append('name', $("#user_name").val());
                fd.append('phone', $("#user_phone").val());
                fd.append('email', $("#user_email").val());
                if (data['role'] != 'Customer') {
                    fd.append('activitie_id', $("#Activities_type").val());
                }
                fd.append('status', $("#status").val());
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "/users/edit/" + id,
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        if (data['status'] == '1') {
                            document.getElementById("alert").innerHTML = data['message'].substring(0, data['message']
                                .length);
                            $('.toast').toast('show');
                        }
                        if (data['reload']) {
                            setTimeout(function () {
                                window.location.reload();
                            }, 1000);

                        }

                    },
                    error: function (data) {
                        console.log(data);
                    }
                });


            });

        },
        error: function (data) {
            console.log(data);
        }
    });


});

$('#facility_type_c').change(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: "/activity/" + this.value,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            var options_str = "<option> </option>";
            for (let index = 0; index < data.length; index++) {


                options_str += '<option value="' + data[index]['id'] + '">' + data[index]['name'] + '</option>';




            }
            document.getElementById("Activities_type_c").innerHTML = options_str;

        },
        error: function (data) {
            console.log(data);
        }
    });
});

$("#create_user").click(function () {

    var fd = new FormData();
    fd.append('name', $("#user-name").val());
    fd.append('phone', $("#user-phone").val());
    fd.append('email', $("#user-email").val());
    fd.append('activitie_id', $("#Activities_type_c").val());

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: "/users/create",
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            if (data['status'] == '1') {
                document.getElementById("alert").innerHTML = data['message'].substring(0, data['message']
                    .length);
                $('.toast').toast('show');
            }
            if (data['reload']) {
                setTimeout(function () {
                    window.location.reload();
                }, 1000);

            }

        },
        error: function (data) {
            console.log(data);
        }
    });

});

$(".QuotesDetails").click(function () {
    var id = $(this).data('id');
    console.log(id);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: "/Quotes/show/" + id,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            console.log(data);
            const element = document.getElementById("quotesDetails");
            console.log(data);
            if (element != null) { element.remove(); }
            $("body").append(' <div class="modal fade" id="quotesDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document">   <div class="modal-content">   <div class="modal-header">  <h5 class="modal-title" id="exampleModalLabel">' + window.translation.QuotesDetails + '</h5>  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="las la-times"></i> </button> </div><div class="modal-body text-center">' +
                '<p>مقدم الطلب : ' + data.user['name'] + ' </p>'
                + '<a href="/profile/' + data.user['id'] + '/details"><button class="btn btn-outline-dark btn-rounded mt-2" style="padding:7px;">مشاهدة الملف الشخصي</button></a>'
                + '<div class="text-left mt-3 mr-2">'
                + '<p class="text-left mt-3">العنوان الرئيسي : ' + data.user['address'] + ' </p>'
                + '<p class="text-left mt-3">التصنيف : لا يوجد </p>'
                + '<p class="text-left mt-3">عدد المشاريع : (' + data.user['project'] + ') مشروع منجز </p>'
                + '<p class="text-left mt-3">عدد العملاء: ' + data.user['customer'] + ' عميل  </p>'
                + '</div>'
                + '<p style="color:gray;">المشروع المقدم إليه</p>'
                + '<p style="color:blue;">' + data['name'] + ' </p>'
                + ' <div class="col-md-12"> <div class="form-group text-center"><label for="aboutBio">ملاحظات</label> <textarea id="aboutBio" class="form-control" name="description" rows="5" disabled>' + data['note'] + '</textarea><a href="/images/' + data['file'] + '" download><button class="btn btn-outline-primary btn-rounded qoutes-file-download mt-3" style="padding:7px;">تحميل ملف عرض السعر</button></a> </div></div>'
                + '</div><div class="modal-footer" style="display: initial;"></div></div></div></div></div>');
            if (data['status'] == 'new' && data['owner'] == false) {
                $(".modal-footer").html('<div class="row text-center"> <div class="col-md-6"><button type="button" data-action="waiting"  class="btn  btn-success btn-rounded quotes-action">' + window.translation.Accepttheoffer + '</button></div><div class="col-md-6"><button type="button" data-action="rejected"  class="btn btn-danger btn-rounded quotes-action">' + window.translation.offerrejected + '</button></div></div> ');

            }
            if (data['status'] == 'new' && data['owner'] == true) {
                $(".modal-footer").html('<div class="row text-center"> <div class="col-md-6"><button type="button" data-action="waiting"  class="btn  btn-warning btn-rounded">' + window.translation.waitingForAcceptance + '</button></div><div class="col-md-6"><button type="button"  class="btn btn-danger btn-rounded ">' + window.translation.offerrejected + '</button></div></div> ');

            }
            if (data['status'] == 'waiting') {

                $(".modal-footer").html('<div class="row text-center"><div class="col-md-6"><a href="/ElectronicContracts/create?ads_id='+data['ads_id']+'&quotes_id='+data['id']+'"> <button type="button"  class="btn  btn-success btn-rounded ">إنشاء عقد</button></a></div> <div class="col-md-6"><button type="button" data-action="rejected"  class="btn btn-danger btn-rounded quotes-action">إلغاء العرض</button></div></div> ');

            }
            if(data['file']==''){
                $('.qoutes-file-download').hide();
            }
            $('.quotes-action').click(function () {
                $(this).attr('disabled', 'disabled');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: "/Quotes/changeStatus/" + $(this).data('action') + '/' + id,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        document.getElementById("alert").innerHTML = data['message'].substring(0, data['message']
                            .length);
                        $('.toast').toast('show');
                        if (data['reload']) {
                            setTimeout(function () {
                                window.location.reload();
                            }, 1500);

                        }
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });

            });
            $('#quotesDetails').modal('show');
        },
        error: function (data) {
            console.log(data);
        }
    });



});
$('#send-Refund').click(function () {
    var fd = new FormData();
    fd.append('IBAN', $("[name='IBAN']").val());
    fd.append('amount', $("[name='amount']").val());
    fd.append('beneficiary', $("[name='beneficiary']").val());
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: '/wallet/sendRefund',
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            if (data['status'] == '1') {
                document.getElementById("alert").innerHTML = data['message'].substring(0, data['message']
                    .length);
                $('.toast').toast('show');
            }
            else {
                document.getElementById("alert").innerHTML = data['message'].substring(0, data['message']
                    .length);
                $('.toast').toast('show');

            }
            if (data['redirect'] != null) {
                setTimeout(function () {
                    location.replace(data['redirect'])
                }, 1000);

            }

        },
        error: function (data) {
            console.log(data);
        }
    });
});
$(".show-request").click(function () {
    var id = $(this).data('id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: "/wallet/showRequest/" + id,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {

            const element = document.getElementById("ShowRequest");
            console.log(data);
            if (element != null) { element.remove(); }
            $("body").append(' <div class="modal fade" id="ShowRequest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document">   <div class="modal-content">   <div class="modal-header">  <h5 class="modal-title" id="exampleModalLabel">' + window.translation.Refundetails + '</h5>  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="las la-times"></i> </button> </div><div class="modal-body"><div class="row"> <div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.Membership + '</label><input type="text" name="project_name"  class="form-control mb-4" value="' + data['Membership_id'] + '"disabled> </div></div><div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.beneficiary + '</label><input type="text" name="project_name" class="form-control mb-4" value="' + data['beneficiary'] + '" disabled=""> </div></div></div><div class="row"> <div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.amount + '</label><input type="text" name="project_name"  class="form-control mb-4" value="' + data['amount'] + '"disabled> </div></div><div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.IBAN + '</label><input type="text" name="project_name" class="form-control mb-4" value="' + data['IBAN'] + '" disabled=""> </div></div></div><div class="row"> <div class="col-md-6"><div class="form-group"><label class="fieldlabels">' + window.translation.Createdat + '</label> <input id="basicExample" name="start_date"class="form-control flatpickr flatpickr-input active basicExample"type="text" value="' + data['created_at'] + '"disabled> </div> </div> </div></div></div></div></div>');
            $('#ShowRequest').modal('show');
        },
        error: function (data) {
            console.log(data);
        }
    });


});
$(".send-message").click(function () {
    var id = $(this).data('id');
    var fd = new FormData();
    fd.append('message', $("[name='message']").val());
    fd.append('file', $("[name='file']").get(0).files[0]);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: "/Disputes/addComent/" + id,
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            document.getElementById('message').value = '';
            var image = '';
            if (data['image']) {
                image = '<p><a class="text-primary" style="text-decoration: underline;"href="/image/' + data['image'] + '" download><i class="las la-paperclip font-20"></i>' + window.translation.Download + '</a></p>';

            }
            if (data['statu'] == 1) {
                $(".meesage-list").append('<br><div id="ct" class="note-container note-grid"> <div class="note-item all-notes note-personal" style=""><div class="note-inner-content"> <div class="note-content"> <p class="note-title">' + data['user_id'] + '</p><p class="meta-time"> ' + data['date'] + '</p> <div class="note-description-content"><p class="note-description">' + data['message'] + '</p> </div>' + image + '</div> </div></div> </div>');
            }
            document.getElementById("alert").innerHTML = data['status'].substring(0, data['status']
                .length);
            $('.toast').toast('show');
            if (data['statu'] == 1) {
                setTimeout(function () {
                    location.reload()
                }, 1500);
            }
        },
        error: function (data) {
            console.log(data);
        }
    });


});
$('.send-msg').click(function () {
    var fd = new FormData();
    if ($(this).data('type') != 'all') {
        fd.append('phone', $("[name='phone']").val());
    }
    $(".send-msg").prop("disabled", true);

    fd.append('message', $("[name='message']").val());

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: $(this).data('url'),
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            $(".send-msg").prop("disabled", false);
            if (data['status'] == '1') {
                document.getElementById("alert").innerHTML = data['message'].substring(0, data['message']
                    .length);
                $('.toast').toast('show');
            }
            else {
                document.getElementById("alert").innerHTML = data['message'].substring(0, data['message']
                    .length);
                $('.toast').toast('show');

            }
            if (data['reload'] != null) {
                setTimeout(function () {
                    location.reload()
                }, 1000);

            }

        },
        error: function (data) {
            console.log(data);
        }
    });
});
$('.close-dispute').click(function () {
    var id = $(this).data('id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: '/Disputes/close-dispute/' + id,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            if (data['status'] == '1') {
                document.getElementById("alert").innerHTML = data['message'].substring(0, data['message']
                    .length);
                $('.toast').toast('show');
            }
            else {
                document.getElementById("alert").innerHTML = data['message'].substring(0, data['message']
                    .length);
                $('.toast').toast('show');

            }
            if (data['reload'] != null) {
                setTimeout(function () {
                    location.reload()
                }, 1000);

            }

        },
        error: function (data) {
            console.log(data);
        }
    });
});
$('.continue-dispute').click(function () {
    var id = $(this).data('id');
    document.getElementById('option-dialog').remove();
    $(".send-form").append('<div class="messenger-sendCard"><div class="row"><div class="col-md-8"><div class="form-group">  <textarea class="form-control" name="message" id="message" placeholder="' + window.translation.Typemessage + '"  rows="3"></textarea> </div> </div><div class="col-md-4"><div class="row" style="    margin-top: 5%;"><div><label for="file"><a style="margin-top: 17%;" data-placement="top"title="' + window.translation.attach + '" class="mr-2 pointer text-primary btn btn-outline-primary bs-tooltip"> <i class="las la-paperclip font-20"></i></a></label><input id="file" name="file" type="file" style="display:none;" accept="image/*"></div><div class="form-group"> <button class="btn btn-secondary btn-lg btn btn-secondary btn-rounded send-message" data-id="' + id + '"style="margin-top: 7%; height: 43px; ">' + window.translation.sendComment + '</button></div></div></div></div></div>');
    $(".send-message").click(function () {
        var id = $(this).data('id');
        var fd = new FormData();
        fd.append('message', $("[name='message']").val());
        fd.append('file', $("[name='file']").get(0).files[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: "/Disputes/addComent/" + id,
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                document.getElementById('message').value = '';
                var image = '';
                if (data['image']) {
                    image = '<p><a class="text-primary" style="text-decoration: underline;"href="/image/' + data['image'] + '" download><i class="las la-paperclip font-20"></i>' + window.translation.Download + '</a></p>';

                }
                $(".meesage-list").append('<br><div id="ct" class="note-container note-grid"> <div class="note-item all-notes note-personal" style=""><div class="note-inner-content"> <div class="note-content"> <p class="note-title">' + data['user_id'] + '</p><p class="meta-time"> ' + data['date'] + '</p> <div class="note-description-content"><p class="note-description">' + data['message'] + '</p> </div>' + image + '</div> </div></div> </div>');
                document.getElementById("alert").innerHTML = data['status'].substring(0, data['status']
                    .length);
                $('.toast').toast('show');
                setTimeout(function () {
                    location.reload()
                }, 1500);
            },
            error: function (data) {
                console.log(data);
            }
        });


    });

});
$(".show-contract").click(function () {
    var id = $(this).data('id');
    var trans = [
        window.translation.batch4,
        window.translation.batch5,
        window.translation.batch6,
        window.translation.batch7,
        window.translation.batch8,
        window.translation.batch9,
        window.translation.batch10,
    ];
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: "/ElectronicContracts/show/" + id,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {

            const element = document.getElementById("ShowContract");
            console.log(data);
            if (element != null) { element.remove(); }
            if (data['status'] == 'waiting' && data['is_received']) {
                var footer = '<div class="modal-footer text-center" style="display: revert;"> <button class="btn btn-success contract-action" data-action="Accepted" ><i class="flaticon-cancel-12"></i>' + window.translation.ContractApproval + '</button><button type="button" class="btn btn-danger contract-action" data-action="rejected">' + window.translation.contractRefusal + '</button> </div>'

            }
            else {
                var footer = '';
            }
            var batch = ''
            for (let index = 3; index < data['batch'].length; index++) {

                batch += '<div class="col-md-4"><div class="form-group"><label for="degree2">' + trans[index - 3] + '</label><input type="text" name="project_name" class="form-control mb-4" value="' + data['batch'][index] + '" disabled=""> </div></div>';
            }

            $("body").append(' <div class="modal fade bd-example-modal-lg" id="ShowContract" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg" role="document">   <div class="modal-content">   <div class="modal-header">  <h5 class="modal-title" id="exampleModalLabel">' + window.translation.Contractdetails + '</h5>  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="las la-times"></i> </button> </div><div class="modal-body">' +
                '<div class="row"> <div class="col-md-4"><div class="form-group"><label for="degree2">' + window.translation.ContractID + '</label><input type="text" name="project_name"  class="form-control mb-4" value="' + data['contract_number'] + '"disabled> </div></div>' +
                '<div class="col-md-4"><div class="form-group"><label for="degree2">' + window.translation.typeCompany + '</label><input type="text" name="project_name" class="form-control mb-4" value="' + data['type'] + '" disabled=""> </div></div>' +
                '<div class="col-md-4"><div class="form-group"><label for="degree2">' + window.translation.CommercialRecord + '</label><input type="text" name="project_name"  class="form-control mb-4" value="' + data['CRecord'] + '"disabled> </div></div></div>' +
                '<div class="row"> <div class="col-md-4"><div class="form-group"><label for="degree2">' + window.translation.company_name + '</label><input type="text" name="project_name" class="form-control mb-4" value="' + data['company_name'] + '" disabled=""> </div></div>' +
                '<div class="col-md-4"><div class="form-group"><label for="degree2">' + window.translation.responsible + '</label><input type="text" name="project_name" class="form-control mb-4" value="' + data['responsible'] + '" disabled=""> </div></div>' +
                '<div class="col-md-4"><div class="form-group"><label for="degree2">' + window.translation.phone + '</label><input type="text" name="project_name" class="form-control mb-4" value="' + data['phone'] + '" disabled=""> </div></div>' +
                '<div class="col-md-4"><div class="form-group"><label for="degree2">' + window.translation.City + '</label><input type="text" name="project_name" class="form-control mb-4" value="' + data['City'] + '" disabled=""> </div></div>' +
                '<div class="col-md-4"><div class="form-group"><label for="degree2">' + window.translation.renewable + '</label><input type="text" name="project_name" class="form-control mb-4" value="' + data['renewable'] + '" disabled=""> </div></div></div>' +
                '<div class="row"> <div class="col-md-12"><div class="form-group"><label for="degree2">' + window.translation.BriefDescription + '</label><textarea type="text" name="project_name"  class="form-control mb-4" row="2" disabled>' + data['Brief_description'] + '</textarea></div></div></div>' +
                '<div class="row"> <div class="col-md-4"><div class="form-group"><label for="degree2">' + window.translation.amount + '</label><input type="text" name="project_name" class="form-control mb-4" value="' + data['amount'] + '" disabled=""> </div></div>' +
                '<div class="col-md-4"><div class="form-group"><label for="degree2">' + window.translation.PaymentSystem + '</label><input type="text" name="project_name" class="form-control mb-4" value="' + data['Payment_system'] + '" disabled=""> </div></div>' +
                '<div class="col-md-4"><div class="form-group"><label for="degree2">' + window.translation.fbatch + '</label><input type="text" name="project_name" class="form-control mb-4" value="' + data['batch'][0] + '" disabled=""> </div></div>' +
                '<div class="col-md-4"><div class="form-group"><label for="degree2">' + window.translation.sbatch + '</label><input type="text" name="project_name" class="form-control mb-4" value="' + data['batch'][1] + '" disabled=""> </div></div></div>' +
                '<div class="row"> <div class="col-md-4"><div class="form-group"><label for="degree2">' + window.translation.tbatch + '</label><input type="text" name="project_name" class="form-control mb-4" value="' + data['batch'][2] + '" disabled=""> </div></div>' +
                batch +
                '<div class="col-md-4"><div class="form-group"><label for="degree2">' + window.translation.finalBatch + '</label><input type="text" name="project_name" class="form-control mb-4" value="' + data['final_batch'] + '" disabled=""> </div></div>' +
                '<div class="col-md-4"><div class="form-group"><label for="degree2">' + window.translation.Datecontract + '</label><input type="text" name="project_name" class="form-control mb-4" value="' + data['contract_date'] + '" disabled=""> </div></div></div>' +
                '<div class="row"> <div class="col-md-4"><div class="form-group"><label for="degree2">' + window.translation.sDatecontract + '</label><input type="text" name="project_name" class="form-control mb-4" value="' + data['date_start'] + '" disabled=""> </div></div>' +
                '<div class="col-md-4"><div class="form-group"><label for="degree2">' + window.translation.eDatecontract + '</label><input type="text" name="project_name" class="form-control mb-4" value="' + data['date_end'] + '" disabled=""> </div></div>' +
                '<div class="col-md-4"><div class="form-group"><label for="degree2">' + window.translation.ContractStatus + '</label><input type="text" name="project_name" class="form-control mb-4" value="' + data['status'] + '" disabled=""> </div></div>' +
                '<div class="col-md-4"><div class="form-group"><label for="degree2">' + window.translation.Attachedcontract + '</label><p><a title="' + window.translation.Attachedcontract + '"class="mr-2 pointer text-primary" href="/image/' + data['Contract_file'] + '" download><i class="las la-paperclip font-20"></i> <span class="font-17">' + window.translation.downloadcontact + '</span></a></p>' +
                '</div></div></div>' +
                footer +
                ' </div></div></div></div></div>');
            $('#ShowContract').modal('show');
            $('.contract-action').click(function () {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: "/ElectronicContracts/changeStatus/" + $(this).data('action') + '/' + id,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        if (data['reload']) {
                            setTimeout(function () {
                                window.location.reload();
                            }, 1000);

                        }
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });

            });
        },
        error: function (data) {
            console.log(data);
        }
    });


});
$(".Invoices").click(function () {
    var id = $(this).data('id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: "/ElectronicContracts/invoice/" + id,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            var tableBody = '';
            for (let index = 0; index < data.length; index++) {
                tableBody += '<tr><td>' + data[index]['id'] + '</td><td>' + data[index]['customer_name'] + '</td><td>' + data[index]['responsible'] + '</td> <td>' + data[index]['invoice_date'] + '</td> <td>  <div class="dropdown custom-dropdown"> <a class="dropdown-toggle  text-primary" href="/eBills/show/' + data[index]['id'] + '">' + window.translation.InvoiceDetails + '</a></div></td></tr>'

            }
            const element = document.getElementById("ShowInvoice");
            console.log(data);
            if (element != null) { element.remove(); }
            $("body").append(' <div class="modal fade bd-example-modal-xl" id="ShowInvoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-xl" role="document">   <div class="modal-content">   <div class="modal-header">  <h5 class="modal-title" id="exampleModalLabel">' + window.translation.Invoices + '</h5>  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="las la-times"></i> </button> </div><div class="modal-body">' +
                '  <table id="basic-dt" class="table table-hover" style="width:100%">' +
                ' <thead> <tr><th>' + window.translation.invoiceNumber + '</th><th>' + window.translation.customerName + '</th><th>' + window.translation.responsible + '</th> <th>' + window.translation.InvoiceDate + '</th> <th class="no-content">' + window.translation.InvoiceDetails + '</th>   </tr>' +
                ' </thead><tbody> ' +
                tableBody +
                '</tbody></table>' +
                ' </div>' +
                '<div class="modal-footer text-center" style="display: initial;"> <button class="btn btn-danger" data-dismiss="modal"><i class="flaticon-cancel-12"></i>' + window.translation.close + '</button> <a href="/eBills/create/' + id + '"><button type="button" class="btn btn-info"><i class="las la-plus"></i> ' + window.translation.addInvoice + '</button></a></div>' +
                '</div></div></div></div>');
            $('#basic-dt').DataTable({
                "language": {
                    "paginate": {
                        "previous": "<i class='las la-angle-left'></i>",
                        "next": "<i class='las la-angle-right'></i>"
                    }
                },
                "lengthMenu": [5, 10, 15, 20],
                "pageLength": 5
            });
            $('#ShowInvoice').modal('show');
        },
        error: function (data) {
            console.log(data);
        }
    });


});
$('#add_product').click(function () {
    var id = $('#add_product').data("id") + 1;
    $('#add_product').data('id', $('#add_product').data("id") + 1);
    $("#product_card").append('<div class="widget-content widget-content-area br-6 mt-3" id="card' + id + '"><div class="row"><div class="col-md-6"><h4 class="table-header">' + window.translation.product + '</h4></div><div class="col-md-6"><button type="button" onclick="remoproduct(' + id + ')" class="btn btn-danger font-12" id="remove_product" data-id="' + id + '" style="    margin-right: 60%;"><i class="las la-minus"></i></button></div></div><div class="row"><div class="col-md-12"><div class="form-group"><label for="degree2">' + window.translation.nameService + '</label><input type="text" name="product_name[' + id + ']" class="form-control mb-4"> </div></div></div><div class="row"><div class="col-md-6"> <div class="form-group"><label for="degree2">' + window.translation.Quantity + '</label><input type="text" name="Quantity[' + id + ']" class="form-control mb-4"> </div> </div><div class="col-md-6"> <div class="form-group"><label for="degree2">' + window.translation.Price + '</label><input type="text" name="Price[' + id + ']" class="form-control mb-4"> </div></div></div><div class="row"><div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.Discount + '</label><input type="text" name="Discount[' + id + ']" class="form-control mb-4" value="0"> </div></div><div class="col-md-6"> <div class="form-group"><label for="degree2">' + window.translation.DiscountType + '</label><select name="Discount_type[' + id + ']" class="form-control mb-4"> <option value="1">' + window.translation.Fixed + '</option><option value="2">' + window.translation.percent + '</option></select> </div></div></div><div class="row"><div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.Tax + '</label><input type="text" name="Tax[' + id + ']" class="form-control mb-4" value="15"> </div></div></div></div>');
    // $('#remove_product').click(function () {
    //     var id = $(this).data("id");
    //     document.getElementById('card' + id).remove();
    // });
});
function remoproduct(id) {
    const element = document.getElementById('card' + id);
    element.remove();

};
$("#create_bank").click(function () {

    var fd = new FormData();
    fd.append('bank_name', $("[name='bank_name']").val());
    fd.append('account_name', $("[name='account_name']").val());
    fd.append('account_number', $("[name='account_number']").val());
    fd.append('iban_number', $("[name='iban_number']").val());

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: "/bank/store",
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            if (data['status'] == '1') {
                document.getElementById("alert").innerHTML = data['message'].substring(0, data['message']
                    .length);
                $('.toast').toast('show');
            }
            if (data['reload']) {
                setTimeout(function () {
                    window.location.reload();
                }, 1000);

            }

        },
        error: function (data) {
            console.log(data);
        }
    });

});
$(".show-bank").click(function () {
    var id = $(this).data('id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: "/bank/show/" + id,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            console.log(window.translation);
            const element = document.getElementById("bank-details");
            console.log(data);
            if (element != null) { element.remove(); }
            $("body").append(' <div class="modal fade" id="bank-details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document">   <div class="modal-content">   <div class="modal-header">  <h5 class="modal-title" id="exampleModalLabel">' + window.translation.bankDetails + '</h5>  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="las la-times"></i> </button> </div><div class="modal-body"><div class="row"> <div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.BankName + '</label><input type="text" name="project_name"  class="form-control mb-4" value="' + data['bank_name'] + '"disabled> </div></div><div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.accountName + '</label><input type="text" name="project_name" class="form-control mb-4" value="' + data['account_name'] + '" disabled=""> </div></div></div><div class="row"> <div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.accountNumber + '</label><input type="text" name="project_name"  class="form-control mb-4" value="' + data['account_number'] + '"disabled> </div></div><div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.IBANumber + '</label><input type="text" name="project_name" class="form-control mb-4" value="' + data['iban_number'] + '" disabled=""> </div></div></div></div></div></div></div>');
            $('#bank-details').modal('show');
        },
        error: function (data) {
            console.log(data);
        }
    });


});
$(".edit-bank").click(function () {
    var id = $(this).data('id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: "/bank/show/" + id,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            console.log(window.translation);
            const element = document.getElementById("bank-edit");
            console.log(data);
            if (element != null) { element.remove(); }
            $("body").append(' <div class="modal fade" id="bank-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document">   <div class="modal-content">   <div class="modal-header">  <h5 class="modal-title" id="exampleModalLabel">' + window.translation.bankDetails + '</h5>  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="las la-times"></i> </button> </div><div class="modal-body"><div class="row"> <div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.BankName + '</label><input type="text" id="bank_name"  class="form-control mb-4" value="' + data['bank_name'] + '"> </div></div><div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.accountName + '</label><input type="text" id="account_name" class="form-control mb-4" value="' + data['account_name'] + '" > </div></div></div><div class="row"> <div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.accountNumber + '</label><input type="text" id="account_number"  class="form-control mb-4" value="' + data['account_number'] + '"> </div></div><div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.IBANumber + '</label><input type="text" id="iban_number" class="form-control mb-4" value="' + data['iban_number'] + '" > </div></div></div></div><div class="modal-footer"><button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>' + window.translation.cancle + '</button> <button type="button" class="btn btn-primary" id="edit_bank">' + window.translation.save + '</button></div></div></div></div>');
            $('#bank-edit').modal('show');

            $("#edit_bank").click(function () {
                console.log($("[name='bank_name']").val());
                var fd = new FormData();
                fd.append('bank_name', $("#bank_name").val());
                fd.append('account_name', $("#account_name").val());
                fd.append('account_number', $("#account_number").val());
                fd.append('iban_number', $("#iban_number").val());

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "/bank/update/" + id,
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        if (data['status'] == '1') {
                            document.getElementById("alert").innerHTML = data['message'].substring(0, data['message']
                                .length);
                            $('.toast').toast('show');
                        }
                        if (data['reload']) {
                            setTimeout(function () {
                                window.location.reload();
                            }, 1000);

                        }

                    },
                    error: function (data) {
                        console.log(data);
                    }
                });


            });

        },
        error: function (data) {
            console.log(data);
        }
    });


});
$(".add-batch").click(function () {
    var id = $('.add-batch').data("id") + 1;
    var trans = [
        window.translation.batch4,
        window.translation.batch5,
        window.translation.batch6,
        window.translation.batch7,
        window.translation.batch8,
        window.translation.batch9,
        window.translation.batch10,
    ];

    $('.add-batch').data('id', $('.add-batch').data("id") + 1);
    $(".batchs").append(' <div class="row"  id="batchContainer[' + id + ']" > <div class="col-md-6"><div class="form-group"><label for="degree2">' + trans[id - 4] + '</label><input  type="text" name="batch[' + id + ']" id="batch[' + id + ']" class="form-control " > </div> </div><button  class="delete-batch" type="button" data-id="' + id + '" onclick="remo(' + id + ')" style="background: transparent; margin-top: 10px;"><i class="las la-times font-20" style="background:#e7515a; color:white;"></i></button></div>');

    if (id == 10) {
        $('.add-batch').remove();
    }
});
function remo(id) {

    const element = document.getElementById('batchContainer[' + id + ']');
    element.remove();

};
$(".check").click(function () {
    var CRecord = $('[name="CRecord"]').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: "/ElectronicContracts/checkUser/" + CRecord,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            if (data['status'] == '1') {
                document.getElementById("alert").innerHTML = data['message'].substring(0, data['message']
                    .length);
                $('.toast').toast('show');
                $('input[name=customer]').val(data['user']['id']);
                $('input[name=CRecord]').val(CRecord);
                // $(".check").hide();
                $(".la-check-circle").show();
                // $("[name='CRecord']").prop('disabled', true);
                if ($(".company-info").html() != '') {
                    $(".company-info").html('');
                }
                $(".company-info").append('<div class="row"><div class="col-md-5"><div class="form-group"><label for="degree2">' + window.translation.company_name + '</label><input type="text" value="' + data['user']['name'] + '" class="form-control mb-4" disabled> </div></div><div class="col-md-5"><div class="form-group"><label for="degree2">' + window.translation.typeCompany + '</label><input type="text" value="' + data['userType'] + '" class="form-control mb-4" disabled> </div></div> </div>');

            }
            else {
                document.getElementById("alert").innerHTML = data['message'].substring(0, data['message']
                    .length);
                $('.toast').toast('show');
                $('input[name=CRecord]').val('');

            }
            console.log(data);

        },
        error: function (data) {
            console.log(data);
        }
    });


});
$(".subscribe").click(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: "/eBills/DoSubscribe",
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            if (data['status'] == '1') {
                document.getElementById("alert").innerHTML = data['message'].substring(0, data['message']
                    .length);
                $('.toast').toast('show');
                setTimeout(function () {
                    window.location.replace("/eBills/all");
                }, 1000);

            }

            console.log(data);
        },
        error: function (data) {
            console.log(data);
        }
    });


});
$(".edit-message").click(function () {
    var id = $(this).data('id');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: "/Disputes/message/" + id,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            console.log(window.translation);
            const element = document.getElementById("message-edit");
            console.log(data);
            if (element != null) { element.remove(); }
            $("body").append(' <div class="modal fade" id="message-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document">   <div class="modal-content">   <div class="modal-header">  <h5 class="modal-title" id="exampleModalLabel">' + window.translation.Editmessage + '</h5>  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="las la-times"></i> </button> </div>' +
                '<div class="modal-body"><div class="row"> <div class="col-md-12"><div class="form-group"><label for="degree2">' + window.translation.Message + '</label><textarea type="text" name="message_content"  class="form-control mb-4"  rows="5">' + data['message'] + '</textarea></div></div>' +
                '</div>' +
                '<div class="row"> <div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.TheAttachedPhoto + '</label> <label for="message_file"><a data-placement="top" title="' + window.translation.TheAttachedPhoto + '" class="mr-2 pointer text-primary btn btn-outline-primary bs-tooltip"> <i class="las la-paperclip font-20"></i>  ' + window.translation.TheAttachedPhoto + '</a> </label><input  id="message_file" type="file" style="display: none;" aria-describedby="inputGroupPrepend" required></div></div></div>' +
                '<div class="modal-footer"><button class="btn btn-rounded" data-dismiss="modal"><i class="flaticon-cancel-12"></i>' + window.translation.cancle + '</button> <button type="button" class="btn btn-primary" id="edit_message">' + window.translation.save + '</button></div></div></div></div>');
            $('#message-edit').modal('show');

            $("#edit_message").click(function () {
                var fd = new FormData();

                fd.append('file', $("#message_file").get(0).files[0]);
                fd.append('message_content', $("[name='message_content']").val());
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "/Disputes/message/update/" + id,
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        if (data['status'] == '1') {
                            document.getElementById("alert").innerHTML = data['message'].substring(0, data['message']
                                .length);
                            $('.toast').toast('show');
                        }
                        if (data['reload']) {
                            setTimeout(function () {
                                window.location.reload();
                            }, 1000);

                        }

                    },
                    error: function (data) {
                        console.log(data);
                    }
                });


            });

        },
        error: function (data) {
            console.log(data);
        }
    });


});
$(".edit-message-support").click(function () {
    var id = $(this).data('id');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: "/Support/message/" + id,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            console.log(window.translation);
            const element = document.getElementById("message-edit");
            console.log(data);
            if (element != null) { element.remove(); }
            $("body").append(' <div class="modal fade" id="message-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document">   <div class="modal-content">   <div class="modal-header">  <h5 class="modal-title" id="exampleModalLabel">' + window.translation.Editmessage + '</h5>  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="las la-times"></i> </button> </div>' +
                '<div class="modal-body"><div class="row"> <div class="col-md-12"><div class="form-group"><label for="degree2">' + window.translation.Message + '</label><textarea type="text" name="message_content"  class="form-control mb-4"  rows="5">' + data['message'] + '</textarea></div></div>' +
                '</div>' +
                '<div class="row"> <div class="col-md-6"><div class="form-group"><label for="degree2">' + window.translation.TheAttachedPhoto + '</label> <label for="message_file"><a data-placement="top" title="' + window.translation.TheAttachedPhoto + '" class="mr-2 pointer text-primary btn btn-outline-primary bs-tooltip"> <i class="las la-paperclip font-20"></i>  ' + window.translation.TheAttachedPhoto + '</a> </label><input  id="message_file" type="file" style="display: none;" aria-describedby="inputGroupPrepend" required></div></div></div>' +
                '<div class="modal-footer"><button class="btn btn-rounded" data-dismiss="modal"><i class="flaticon-cancel-12"></i>' + window.translation.cancle + '</button> <button type="button" class="btn btn-primary" id="edit_message">' + window.translation.save + '</button></div></div></div></div>');
            $('#message-edit').modal('show');

            $("#edit_message").click(function () {
                var fd = new FormData();

                fd.append('file', $("#message_file").get(0).files[0]);
                fd.append('message_content', $("[name='message_content']").val());
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "/Support/message/update/" + id,
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        if (data['status'] == '1') {
                            document.getElementById("alert").innerHTML = data['message'].substring(0, data['message']
                                .length);
                            $('.toast').toast('show');
                        }
                        if (data['reload']) {
                            setTimeout(function () {
                                window.location.reload();
                            }, 1000);

                        }

                    },
                    error: function (data) {
                        console.log(data);
                    }
                });


            });

        },
        error: function (data) {
            console.log(data);
        }
    });


});
$(".send-message-support").click(function () {

    var id = $(this).data('id');
    var fd = new FormData();
    fd.append('message', $("[name='message']").val());
    fd.append('file', $("[name='file']").get(0).files[0]);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: "/Support/addComent/" + id,
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            document.getElementById('message').value = '';
            var image = '';
            if (data['image']) {
                image = '<p><a class="text-primary" style="text-decoration: underline;"href="/image/' + data['image'] + '" download><i class="las la-paperclip font-20"></i>' + window.translation.Download + '</a></p>';

            }
            if (data['statu'] == 1) {
                $(".meesage-list").append('<br><div id="ct" class="note-container note-grid"> <div class="note-item all-notes note-personal" style=""><div class="note-inner-content"> <div class="note-content"> <p class="note-title">' + data['user_id'] + '</p><p class="meta-time"> ' + data['date'] + '</p> <div class="note-description-content"><p class="note-description">' + data['message'] + '</p> </div>' + image + '</div> </div></div> </div>');
            }
            document.getElementById("alert").innerHTML = data['status'].substring(0, data['status']
                .length);
            $('.toast').toast('show');
            if (data['statu'] == 1) {
                setTimeout(function () {
                    location.reload()
                }, 1500);

            }
        },
        error: function (data) {
            console.log(data);
        }
    });


});
document.querySelector('#invoice-logo').addEventListener('change', function () {
    if (this.files && this.files[0]) {
        var file = $('#invoice-logo').val();

        var fd = new FormData();
        fd.append('file', $('#invoice-logo').get(0).files[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: "/eBills/update-your-invoice-logo",
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                if (data['status'] == '1') {
                    document.getElementById("alert").innerHTML = data['message'].substring(0, data['message']
                        .length);
                    $('.toast').toast('show');
                }
                if (data['reload']) {
                    setTimeout(function () {
                        window.location.reload();
                    }, 1000);

                }

            },
            error: function (data) {
                console.log(data);
            }
        });


    }
});
document.querySelector('#invoice-signature').addEventListener('change', function () {
    if (this.files && this.files[0]) {
        var file = $('#invoice-signature').val();

        var fd = new FormData();
        fd.append('file', $('#invoice-signature').get(0).files[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: "/eBills/update-your-invoice-signature",
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                if (data['status'] == '1') {
                    document.getElementById("alert").innerHTML = data['message'].substring(0, data['message']
                        .length);
                    $('.toast').toast('show');
                }
                if (data['reload']) {
                    setTimeout(function () {
                        window.location.reload();
                    }, 1000);

                }

            },
            error: function (data) {
                console.log(data);
            }
        });


    }
});

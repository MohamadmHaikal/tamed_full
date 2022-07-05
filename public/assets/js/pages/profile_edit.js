jQuery(document).ready(function ($) {
    "use strict";
    $('.dropify').dropify({
        messages: { 'default': 'Click to Upload or Drag n Drop', 'remove': '<i class="flaticon-close-fill"></i>', 'replace': 'Upload or Drag n Drop' }
    });
});

document.querySelector('#UploadLogo').addEventListener('change', function () {
    if (this.files && this.files[0]) {
        var file = $('#UploadLogo').val();

        var fd = new FormData();
        fd.append('file', $('#UploadLogo').get(0).files[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: "update-your-avatar",
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
$("#updateProfile").click(function () {

    var fd = new FormData();
    fd.append('name', $("[name='name']").val());
    fd.append('description', $("[name='description']").val());
    fd.append('phone', $("[name='phone']").val());
    fd.append('email', $("[name='email']").val());
    fd.append('CRecord', $("[name='CRecord']").val());
    fd.append('specialNumber', $("[name='specialNumber']").val());
    fd.append('TaxNumber', $("[name='TaxNumber']").val());
    fd.append('city', $("[name='city']").val());
    fd.append('neighbor', $("[name='Neighborhood']").val());
    fd.append('activitie_id', $("[name='facility_activity']").val());

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: "update-your-profile",
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

document.querySelector('#profile').addEventListener('change', function () {
    if (this.files && this.files[0]) {
        var file = $('#profile').val();

        var fd = new FormData();
        fd.append('file', $('#profile').get(0).files[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: "update-your-file",
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
$("#AddProject").click(function () {

    var fd = new FormData();
    fd.append('name', $("[name='project_name']").val());
    fd.append('description', $("[name='project_description']").val());
    fd.append('start_date', $("[name='start_date']").val());
    fd.append('end_date', $("[name='end_date']").val());
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: "add-your-project",
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

$(".show-item").click(function () {
    var id = $(this).data('id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: "show/project/" + id,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            const element = document.getElementById("exampleModal");

            if (element != null) { element.remove(); }
            $("body").append(' <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document">   <div class="modal-content">   <div class="modal-header">  <h5 class="modal-title" id="exampleModalLabel">' + window.translations.projectDetails + '</h5>  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="las la-times"></i> </button> </div><div class="modal-body"> <div class="col-md-12"><div class="form-group"><label for="degree2">' + window.translations.nameOfProject + '</label><input type="text" name="project_name"  class="form-control mb-4" value="' + data['name'] + '"disabled> </div></div><div class="col-md-12"> <div class="form-group"><label for="aboutBio">' + window.translations.description + '</label> <textarea class="form-control" rows="10" disabled>' + data['description'] + '</textarea></div></div>  <div class="row"> <div class="col-md-6"><div class="form-group"><label class="fieldlabels">' + window.translations.startingFrom + '</label> <input id="basicExample" name="start_date"class="form-control flatpickr flatpickr-input active basicExample"type="text" value="' + data['start_date'] + '"disabled> </div> </div> <div class="col-md-6"><div class="form-group"><label class="fieldlabels">' + window.translations.endingIn + '</label><input id="basicExample" name="end_date" class="form-control flatpickr flatpickr-input active basicExample" type="text" value="' + data['end_date'] + '"disabled></div></div></div></div></div></div></div>');
            $('#exampleModal').modal('show');
        },
        error: function (data) {
            console.log(data);
        }
    });


});

$(".edit-item").click(function () {
    var id = $(this).data('id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: "show/project/" + id,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            const element = document.getElementById("exampleModal");

            if (element != null) { element.remove(); }
            $("body").append(' <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document">   <div class="modal-content">   <div class="modal-header">  <h5 class="modal-title" id="exampleModalLabel">' + window.translations.projectDetails + '</h5>  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="las la-times"></i> </button> </div><div class="modal-body"> <div class="col-md-12"><div class="form-group"><label for="degree2">' + window.translations.nameOfProject + '</label><input type="text" name="project_name" id="project_name_edit" class="form-control mb-4" value="' + data['name'] + '"> </div></div><div class="col-md-12"> <div class="form-group"><label for="aboutBio">' + window.translations.description + '</label> <textarea class="form-control" rows="10" id="project_description_edit" >' + data['description'] + '</textarea></div></div>  <div class="row"> <div class="col-md-6"><div class="form-group"><label class="fieldlabels">' + window.translations.startingFrom + '</label> <input id="project_start_date_edit" name="start_date"class="form-control flatpickr flatpickr-input active basicExample"type="text" value="' + data['start_date'] + '"> </div> </div> <div class="col-md-6"><div class="form-group"><label class="fieldlabels">' + window.translations.endingIn + '</label><input id="project_end_date_edit" name="end_date" class="form-control flatpickr flatpickr-input active basicExample" type="text" value="' + data['end_date'] + '"></div></div> </div></div><div class="modal-footer"><button type="button" id="edit_project" class="btn btn-primary">Save</button> </div</div></div></div>');
            $('#exampleModal').modal('show');
            $("#edit_project").click(function () {
                var fd = new FormData();
                fd.append('name', $("#project_name_edit").val());
                fd.append('description', $("#project_description_edit").val());
                fd.append('start_date', $("#project_start_date_edit").val());
                fd.append('end_date', $("#project_end_date_edit").val());
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "edit/project/" + id,
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


$(window).on('load', function () {
    var current = $("#city").data('now');
    var current2 = $("#city").data('current');
    var current3 = $("#facility_type").data('current');
    var current4 = $("#facility_type").data('now');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: "activity/" + current4,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {

            var options_str = "";
            for (let index = 0; index < data.length; index++) {

                if (current3 == data[index]['id']) {
                    options_str += '<option value="' + data[index]['id'] + '" selected>' + data[index]['name'] + '</option>';
                }
                else {
                    options_str += '<option value="' + data[index]['id'] + '">' + data[index]['name'] + '</option>';

                }


            }
          //  document.getElementById("facility_activity").innerHTML = options_str;

        },
        error: function (data) {
            console.log(data);
        }
    });
    $.ajax({
        type: 'GET',
        url: "additional/" + current3,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {

            var options_str = "";
            for (let index = 0; index < data.length; index++) {

                options_str += '<input id="' + data[index]['id'] + '" onclick="toogleButton(this,' + 'tt' + data[index]['id'] + ')" class="btn btn-outline-primary btn-rounded mb-2" type="button" style="margin-right: 5px;" value="' + data[index]['name'] + '"><input name="FM_city" id="' + 'tt' + data[index]['id'] + '" type="hidden" value="0">';

            }

            document.getElementById("subActivity").innerHTML = options_str;

        },
        error: function (data) {
            console.log(data);
        }
    });
    $.ajax({
        type: 'GET',
        url: "userAdditional",
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            for (let index = 0; index < data.length; index++) {

                if ($('#' + data[index]["activity_id"]).length != 0) {
                    var callingElement = document.getElementById(data[index]["activity_id"]);
                    callingElement.classList.remove('btn-outline-primary');
                    callingElement.classList.add('btn-primary');
                }


            }
        },
        error: function (data) {
            console.log(data);
        }
    });
    $.ajax({
        type: 'GET',
        url: "neighbor/" + current,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {

            var options_str = "";
            for (let index = 0; index < data.length; index++) {

                if (current2 == data[index]['id']) {
                    options_str += '<option value="' + data[index]['id'] + '" selected>' + data[index]['name'] + '</option>';
                }
                else {
                    options_str += '<option value="' + data[index]['id'] + '">' + data[index]['name'] + '</option>';

                }


            }
            document.getElementById("Neighborhood").innerHTML = options_str;

        },
        error: function (data) {
            console.log(data);
        }
    });

   


});
$('#city').change(function () {
    var current = $(this).data('current');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: "neighbor/" + this.value,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            var options_str = "";
            for (let index = 0; index < data.length; index++) {


                options_str += '<option value="' + data[index]['id'] + '">' + data[index]['name'] + '</option>';




            }
            document.getElementById("Neighborhood").innerHTML = options_str;

        },
        error: function (data) {
            console.log(data);
        }
    });
});
$('#facility_type').change(function () {
    document.getElementById('subActivity').innerHTML='';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: "activity/" + this.value,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            var options_str = "<option> </option>";
            for (let index = 0; index < data.length; index++) {


                options_str += '<option value="' + data[index]['id'] + '">' + data[index]['name'] + '</option>';




            }
           // document.getElementById("facility_activity").innerHTML = options_str;

        },
        error: function (data) {
            console.log(data);
        }
    });
});

$('#facility_activity').change(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: "additional/" + this.value,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {

            var options_str = "";
            for (let index = 0; index < data.length; index++) {

                options_str += '<input id="' + data[index]['id'] + '" onclick="toogleButton(this,' + 'tt' + data[index]['id'] + ')" class="btn btn-outline-primary btn-rounded mb-2" type="button" style="margin-right: 5px;" value="' + data[index]['name'] + '"><input name="FM_city" id="' + 'tt' + data[index]['id'] + '" type="hidden" value="0">';




            }

            document.getElementById("subActivity").innerHTML = options_str;

        },
        error: function (data) {
            console.log(data);
        }
    });
});
// Called when the button is clicked
function toogleButton(callingElement, hiddenElement) {
    var type;
    if (callingElement.classList.contains('btn-outline-primary')) {
        // If the button is 'unset'; change color and update hidden element to 1
        callingElement.classList.remove('btn-outline-primary');
        callingElement.classList.add('btn-primary');
        document.getElementById(hiddenElement.id).value = "1";
        type = 1;

    } else {
        // If the button is 'set'; change color and update hidden element to 0
        callingElement.classList.remove('btn-primary');
        callingElement.classList.add('btn-outline-primary');
        document.getElementById(hiddenElement.id).value = "0";
        type = 0;
    }


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: "changeStatus/"+type +'/'+callingElement.id,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
        },
        error: function (data) {
            console.log(data);
        }
    });


}
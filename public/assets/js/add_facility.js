jQuery(document).ready(function ($) {
    "use strict";
    $('.dropify').dropify({
        messages: { 'default':'<h5>'+ window.translation.Clickimage+'</h5>', 'remove': '<i class="flaticon-close-fill"></i>', 'replace': 'Upload or Drag n Drop' }
    });
});

// document.querySelector('#UploadLogo').addEventListener('change', function () {
//     if (this.files && this.files[0]) {
//         var file = $('#UploadLogo').val();

//         var fd = new FormData();
//         fd.append('file', $('#UploadLogo').get(0).files[0]);
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//         });
//         $.ajax({
//             type: 'POST',
//             url: "update-your-avatar",
//             data: fd,
//             cache: false,
//             contentType: false,
//             processData: false,
//             success: (data) => {
//                 if (data['status'] == '1') {
//                     document.getElementById("alert").innerHTML = data['message'].substring(0, data['message']
//                         .length);
//                     $('.toast').toast('show');
//                 }
//                 if (data['reload']) {
//                     setTimeout(function () {
//                         window.location.reload();
//                     }, 1000);

//                 }

//             },
//             error: function (data) {
//                 console.log(data);
//             }
//         });


//     }
// });
$("#AddFacility").click(function () {

    var fd = new FormData();
    fd.append('logo', $('#UploadLogo').get(0).files[0]);
    fd.append('name', $("[name='name']").val());
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
        url: "/Business/add-facility",
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            if (data['status'] == '1') {
                $("#AddFacility").prop("disabled", true);
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
           // document.getElementById("Neighborhood").innerHTML = options_str;

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
            document.getElementById("facility_activity").innerHTML = options_str;

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
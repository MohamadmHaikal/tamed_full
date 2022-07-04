$(document).ready(function () {
    var url = window.location.pathname;
    var stuff = url.split('/');
    if (stuff[stuff.length - 1] == 'edit') {
        var id = stuff[stuff.length - 2];
        type($('#type').val(), id)

     
    }

});

function type(type, id = '') {
    var retVal = null;
    $('#inputsAds').empty();
    $('#type').empty();

    var url = "/ads/getType/" + type + '/' + id;
    $.ajax({
        url: url,
        type: "get",
        contentType: 'application/json',
        success: function (data) {
         
            $('#inputsAds').append(data);
            $('#type').val(type);

     var multiple_form_one_current_fs = $(document).find('.fildsetSection');
       var multiple_form_one_next_fs = $(document).find('.fildsetSection').next();

        multiple_form_one_next_fs.show();

        multiple_form_one_current_fs.animate({opacity: 0}, {
            step: function(now) {
                // for making fielset appear animation
                multiple_form_one_opacity = 1 - now;
                multiple_form_one_current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                multiple_form_one_next_fs.css({'opacity': multiple_form_one_opacity});
            },
            duration: 600
        });
        },
        error: function (xhr) {}
    });
    
}

$('.type').on('click', function () {
    var id = $(this).attr('value');
   var x = type(id);
   if(id=='6'){
    $(".has-price").prop('hidden', true);
   
   }
   else{
    $(".has-price").prop('hidden', false);
   }
   if (id == "1") {

  var Certificate=['السجل التجاري','شهادة القيمة المضافة','شهادة السعودة','شهادة الغرفة التجارية','شهادة التأمينات الأجتماعية','شهادة المنشآة','شهادة تصنيف','بروفايل المنشآة']


    $(".multiple-form-one #progressbar li").css("width", "18%");
    $(`<li  id="account">
    <strong>${window.translation.Application_conditions}</strong></li>`).insertBefore('#payment');
    
    var options_str = `  <fieldset class="ApplicationConditions">
<h3>${window.translation.Application_conditions}</h3>
<div class="form-card">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="custom-radio-1">
                    <label>${ window.translation.employment}</label>
                    <label for="rdo-employment_warranty"class="btn-radio">
                        <input type="radio" id="rdo-employment_warranty"  name="employment" value="on warranty">
                        <svg width="20px" height="20px" viewBox="0 0 20 20">
                            <circle cx="10" cy="10" r="9"></circle>
                            <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z"
                                class="inner"></path>
                            <path
                                d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z"
                                class="outer"></path>
                        </svg>
                        <span>${ window.translation.on_warranty}</span>
                    </label>
                    <label for="rdo-employment_contract" class="btn-radio">
                        <input type="radio" id="rdo-employment_contract" name="employment" value="rent contract">
                        <svg width="20px" height="20px" viewBox="0 0 20 20">
                            <circle cx="10" cy="10" r="9"></circle>
                            <path
                                d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z"
                                class="inner"></path>
                            <path
                                d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z"
                                class="outer"></path>
                        </svg>
                        <span>${ window.translation.rent_contract}</span>
                    </label>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div style="align-self: center;"
                class="input-group-prepend switch-outer-container">
                <div class="col-md-8">
                    <label for="">${ window.translation.Bank_guarantee}</label>
                </div>
                <div class="col-md-4">
                    <span
                        class="switch switch-outline switch-icon switch-primary">
                        <label>
                            <input type="checkbox"value="" name="Bank_guarantee">
                            <span></span>
                        </label>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <label>${ window.translation.The_required_paperwork}</label>
        <div class="form-group"
            style="padding-right: inherit;"
            id="subActivity">`

            $.each(Certificate, function (key, input) {
                options_str += '<input id="' + key+ '" onclick="toogleButton(this,' + 'tt' + key + ')" class="btn btn-outline-primary btn-rounded mb-2" type="button" style="margin-right: 5px;" value="' + input + '"><input name="FM_city" id="' + 'tt' + key + '" type="hidden" value="0">';

                // options_str += '<input id="' + input + '" onclick="toogleButton(this,' + input + ')" class="btn btn-outline-primary btn-rounded mb-2" type="button" style="margin-right: 5px;" value="' + input + '"><input name="FM_city" id="' + 'tt' + input+ '" type="hidden" value="0">'

            });
            
            options_str +=   `<input type="hidden" name="Certificate[]" id="Certificate">
        </div>
    </div>
    <div class="row">
        <label>${ window.translation.nots} </label>
        <div class="container-fluid">
        <textarea
            class="form-control"
            data-error="#Errordescription"
            name="nots"
            dir="rtl">
        </textarea>
        </div>
    </div>
</div>

    <input type="button" name="next"
    class="next action-button btn btn-primary"
    data-conditions="true"
    value="`+window.translation.Next+`" /> 
    <input type="button" name="previous"
    class="previous action-button-previous btn btn-outline-primary"
    value="`+window.translation.Previous+`" />
</fieldset>`;
$(options_str).insertBefore('.fildsetFile');
$(".multiple-form-one .previous").on('click', function(){
    multiple_form_one_current_fs = $(this).parent();
    multiple_form_one_previous_fs = $(this).parent().prev();
    //Remove class active
    $(".multiple-form-one #progressbar li").eq($(".multiple-form-one fieldset").index(multiple_form_one_current_fs)).removeClass("active");
    //show the previous fieldset
    multiple_form_one_previous_fs.show();
    //hide the current fieldset with style
    multiple_form_one_current_fs.animate({opacity: 0}, {
        step: function(now) {
            // for making fielset appear animation
            multiple_form_one_opacity = 1 - now;
            multiple_form_one_current_fs.css({
                'display': 'none',
                'position': 'relative'
            });
            multiple_form_one_previous_fs.css({'opacity': multiple_form_one_opacity});
        },
        duration: 600
    });
});

}

//    if (checked == '1') {
       
    var multiple_form_one_current_fs = $(this).closest('.fildsetSection');
       var multiple_form_one_next_fs = $(this).closest('.fildsetSection').next();
       $(".multiple-form-one #progressbar li").eq($(".multiple-form-one fieldset").index(multiple_form_one_next_fs)).addClass("active");
        multiple_form_one_next_fs.show();

        multiple_form_one_current_fs.animate({opacity: 0}, {
            step: function(now) {
                // for making fielset appear animation
                multiple_form_one_opacity = 1 - now;
                multiple_form_one_current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                multiple_form_one_next_fs.css({'opacity': multiple_form_one_opacity});
            },
            duration: 600
        });

//    } else {

//     document.getElementById("alert").innerHTML =
//                                 '<div style="position:fixed; bottom: 15px; right: 0;z-index: 9999; margin-left: 20px; margin-right: 20px;"> <div class="toast toast-danger fade hide" role="alert" data-delay="2000" aria-live="assertive"  aria-atomic="true"><div class="toast-header-danger"> <strong class="mr-auto" id="mr-auto">' +
//                                 window.translation.systemMessages +
//                                 '</strong><button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button></div> <div class="toast-body" id="toast-body">' +
//                                 window.translation.AllRequired + '</div></div></div>';
//                             $('.toast').toast('show');
       
//    }
 

});

$("#bestPrice").change(function () {
    if ($(this).prop("checked") == true) {
        $("[name='price']").val('');
        $("#price").prop('hidden', true);
        $("#pricee").html('');
    } else {
        $("#price").prop('hidden', false);
       
    }
});

$(document).on('change',"#Classification_is_required",function () {
    if ($(this).prop("checked") == true) {
        $("[name='CategoryCategory']").val('');
        $("#Category_Category").prop('hidden',false );
    } else {
        
        $("#Category_Category").prop('hidden', true);
    }
});

$(document).on('change',"#Building_Category",function () {
    if ($(this).prop("checked") == true) {
       
        $("#Building_Category_choices").prop('hidden',false );
    } else {
        $("#Building_Category_choices").prop('hidden', true);
    }
});


$(document).on('change', '.getselecct', function () {
    var appendItemID=$(this).data('appenditemid');
    var url = $(this).data('url') + $(this).val();
    $(appendItemID).empty();

    $.ajax({
        url: url,
        type: "get",
        contentType: 'application/json',
        success: function (data) {

            $( appendItemID).append("   <option  ></option>");
                    
            $.each(data, function (key, value) {

                $( appendItemID).append("<option value=" +
                    value.id + ">" + value.name + "</option>");
            })
            // $('#AddActivity').append(data);
        },
        error: function (xhr) {}
    });
});


$(document).on('change', '#AddActivity', function () {
   
    var url = "/ads/getServices/" + $(this).val();
    $.ajax({
        url: url,
        type: "get",
        contentType: 'application/json',
        success: function (data) {

            var serv=`<div class="row"> `
           
            $.each(data, function (key, value) {
                serv+=`
                <div style="align-self: center;"
                class="input-group-prepend switch-outer-container col-md-4 mb-2">
              
                <div class="col-md-8">
                <label for="">${value.name}</label>
              </div>

              <div class="col-md-4">
              <span
              class="switch switch-outline switch-icon switch-primary">
              <label>
          
                  <input type="checkbox" id="${value.name}" 
                    value="off"
                       name="${value.name}" >
                  <span></span>
              </label>
          </span>
          
          </div>
          </div>
         `;
            })
            serv+=`</div>`;
            $('#on_off').append(serv);
            // $('#AddActivity').append(data);
        },
        error: function (xhr) {}
    });
});


$('#createItem').on('click', function () {
    var fd = new FormData();
  
    $.each($(".file-upload"), function (key, value) {
        var files = value.files;
        for (var i = 0; i < files.length; i++) {
            fd.append(value.name, $(this).get(0).files[i]);
        }
    });
    $.each($(".file-upload2"), function (key, value) {
        var files = value.files;
        for (var i = 0; i < files.length; i++) {
            fd.append(value.name, $(this).get(0).files[i]);
        }
    });
    let form = $(this).closest("form").serializeArray();
    editor = $(".ql-editor").html();
            fd.append('description', editor);
    $.each(form, function (key, input) {
        if (input.name === 'description') {
            editor = $(".Editor-editor").html();
            fd.append('description', editor);
        } else {
        fd.append(input.name, input.value);
            
        }
       
    });
  

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: $(this).closest("form").attr('method'),
        url: $(this).closest("form").attr('action'),
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            

            var multiple_form_one_current_fs = $(this).closest('.fildsetFile');
       var multiple_form_one_next_fs = $(this).closest('.fildsetFile').next();
       $(".multiple-form-one #progressbar li").eq($(".multiple-form-one fieldset").index(multiple_form_one_next_fs)).addClass("active");
        multiple_form_one_next_fs.show();

        multiple_form_one_current_fs.animate({opacity: 0}, {
            step: function(now) {
                // for making fielset appear animation
                multiple_form_one_opacity = 1 - now;
                multiple_form_one_current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                multiple_form_one_next_fs.css({'opacity': multiple_form_one_opacity});
            },
            duration: 600
        });


            
            if (data['status'] == '1') {
                document.getElementById("alert").innerHTML = data['message'].substring(0, data['message']
                    .length);
                // $('.toast').toast('show');
       
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


arrp=[];

$.each($('#Certificate').val() .split(','), function (key, input) {
    arrp.push( input );
});

function toogleButton(callingElement, hiddenElement) {
 
    var type;
    if (callingElement.classList.contains('btn-outline-primary')) {
        // If the button is 'unset'; change color and update hidden element to 1
        callingElement.classList.remove('btn-outline-primary');
        callingElement.classList.add('btn-primary');
        document.getElementById(hiddenElement.id).value = "1";
        type = 1;
       
        arrp.push( callingElement.value );
        $('#Certificate').val(arrp);

    } else {
        // If the button is 'set'; change color and update hidden element to 0
        callingElement.classList.remove('btn-primary');
        callingElement.classList.add('btn-outline-primary');
        document.getElementById(hiddenElement.id).value = "0";
        type = 0;

        arrp = jQuery.grep(arrp, function(value) {
            return value != callingElement.value;
          });

        $('#Certificate').val(arrp);
    }


  


}


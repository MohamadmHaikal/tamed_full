(function($) {
    "use strict";
    $(document).ready(function(){
        /* Step type 1 */
        var multiple_form_one_current_fs,
            multiple_form_one_next_fs,
            multiple_form_one_previous_fs; //fieldsets
        var multiple_form_one_opacity;
        $(document).on('click',".multiple-form-one .next ", function(){
            var form = $("#msform");
		form.validate({
			rules: {
				title: "required",
				activitie_id: "required",
				activitie_Add_id: "required",
				city: "required",
				neighborhood: "required",
				description: "required",
                price: "required",
                BriefDescription:"required",
                deadline:"required",
                Category_Category:"required",
                // phone:
                // {
				// 	required: true,
				// 	minlength: 6,
				// },
			
			},
			messages: {
                title: window.translation.ProjectTitleRequired,
                activitie_id: window.translation.MainActivityRequired,
                activitie_Add_id: window.translation.AdditionalActivitRequired,
                city: "city is required",
                neighborhood: window.translation.neighborhoodIsRequired,
                BriefDescription: window.translation.ShortDescriptionRequired,
                price: window.translation.ProjectvalueRequired,
                deadline: window.translation.ApplicationDeadlineIsRequired,
                Category_Category: window.translation.ClassificationCategoryRequired,
				// title: {
				// 	required: "title is required",
				// },
			
			},
            errorPlacement: function(error, element) {
                var placement = $(element).data('error');
                if (placement) {
                  $(placement).append(error)
                } else {
                  error.insertAfter(element);
                }
              }
        });
       
        if(form.valid() == true || $(this).data('conditions') == true ){
            multiple_form_one_current_fs = $(this).parent();
            multiple_form_one_next_fs = $(this).parent().next();
            //Add Class Active
            $(".multiple-form-one #progressbar li").eq($(".multiple-form-one fieldset").index(multiple_form_one_next_fs)).addClass("active");
            //show the next fieldset
            multiple_form_one_next_fs.show();
            //hide the current fieldset with style
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

        }
        });

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
        $('.radio-group .radio').on('click', function(){
            $(this).parent().find('.radio').removeClass('selected');
            $(this).addClass('selected');
        });
        $(".multiple-form-one .submit").on('click', function(){
            return false;
        })
        /* Step type 2 */
        var multiple_form_two_current_fs,
            multiple_form_two_next_fs,
            multiple_form_two_previous_fs; //fieldsets
        var multiple_form_two_opacity;
        var current = 1;
        var steps = $(".multiple-form-two fieldset").length;
        setProgressBar(current);
        $(".multiple-form-two .next").on('click', function(){
            multiple_form_two_current_fs = $(this).parent();
            multiple_form_two_next_fs = $(this).parent().next();
            //Add Class Active
            $(".multiple-form-two #progressbar li").eq($(".multiple-form-two fieldset").index(multiple_form_two_next_fs)).addClass("active");
            //show the next fieldset
            multiple_form_two_next_fs.show();
            //hide the current fieldset with style
            multiple_form_two_current_fs.animate({opacity: 0}, {
                step: function(now) {
                    // for making fielset appear animation
                    multiple_form_two_opacity = 1 - now;
                    multiple_form_two_current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    multiple_form_two_next_fs.css({'opacity': multiple_form_two_opacity});
                },
                duration: 500
            });
            setProgressBar(++current);
        });
        $(".multiple-form-two .previous").on('click', function(){
            multiple_form_two_current_fs = $(this).parent();
            multiple_form_two_previous_fs = $(this).parent().prev();
            //Remove class active
            $(".multiple-form-two #progressbar li").eq($(".multiple-form-two fieldset").index(multiple_form_two_current_fs)).removeClass("active");
            //show the previous fieldset
            multiple_form_two_previous_fs.show();
            //hide the current fieldset with style
            multiple_form_two_current_fs.animate({opacity: 0}, {
                step: function(now) {
                    // for making fielset appear animation
                    multiple_form_two_opacity = 1 - now;
                    multiple_form_two_current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    multiple_form_two_previous_fs.css({'opacity': multiple_form_two_opacity});
                },
                duration: 500
            });
            setProgressBar(--current);
        });
        function setProgressBar(curStep){
            var percent = parseFloat(100 / steps) * curStep;
            percent = percent.toFixed();
            $(".multiple-form-two .progress-bar").css("width",percent+"%")
        }
        $(".multiple-form-two .submit").on('click', function(){
            return false;
        })
        // For file attachment
        var arr = [];
        var count = 0;
        var count2 = 0
    
    $('.file-upload').on('change', function(e) {
            const dt = new DataTransfer(); 
            var children = "";
            count2++
            if(count2 > 1){
                count++;
            }
        //     var file ;
        //     $.each( $(this)[0].files, function( key, value ) {
                
        //     file = value.name;
        //     arr.push(file);
        //     var idxDot = file.lastIndexOf(".") + 1;
        //     var extFile = file.substr(idxDot, file.length).toLowerCase();
        // if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
        //     children += ' <div class="attached-files" ><img id="image-preview" src='+ URL.createObjectURL(e.target.files.item(key))+' width="320"><label class="name">' + file + '<span title="Remove Attachment" data-idIMG=' + value.lastModified + ' class="delete-label bs-tooltip"><i class="las la-times"></i></span></label>   </div>';
                
        //     }
            
           

        // });

        // for (let file of this.files) {
        //     dt.items.add(file);
        // }
        var elem = document.getElementById("myBar");
        var elem2 = document.getElementById("pers");
        elem.style.width = 0 + "%";
        elem2.innerHTML = 0 + "%";
         $(this).closest(".Content").find(".fileContent").css('display', 'none');
         $(this).closest(".Content").find(".note-img-download").css('display', 'none');
        document.getElementById('progressContainer').style.display='block';
       
        var fd = new FormData();

        $.each($(".file-upload"), function (key, value) {
            var files = value.files;
            for (var i = 0; i < files.length; i++) {
                fd.append(value.name, $(this).get(0).files[i]);
            }
        });
        fd.append('name', 'upload_cont_img');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        xhr: function() {
            var xhr = new window.XMLHttpRequest();
            var elem = document.getElementById("myBar");
            var elem2 = document.getElementById("pers");
            xhr.upload.addEventListener("progress", function(evt) {
              if (evt.lengthComputable) {
                var percentComplete = evt.loaded / evt.total;
                percentComplete = parseInt(percentComplete * 100);
              //  console.log(percentComplete);
                elem.style.width = percentComplete + "%";
                 elem2.innerHTML = percentComplete + "%";
                if (percentComplete === 100) {
        
                }
        
              }
            }, false);
        
            return xhr;
          },
        type: 'POST',
        url: "/ads/uploadFile",
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            document.getElementById('progressContainer').style.display='none';
            $(this).closest(".Content").find(".fileContent").css('display', 'flex');
            var g= ( $('#gallery').val())==''? []:(Array)( $('#gallery').val());
            for (var i = 0; i < data[0].length; i++) {
                g.push(data[0][i]);
                children += ' <div class="attached-files" ><img id="image-preview" src="/image/'+ data[1][i]["file"]+'" width="320"><label class="name">' +data[1][i]["name"] + '<span title="Remove Attachment" data-idIMG=' +data[1][i]["id"] + ' class="delete-label bs-tooltip"><i class="las la-times"></i></span></label>   </div>';
            }
            $(this).closest(".Content").find(".fileContent").append(children);
            $('span.delete-label').click(function(){
                let name = $(this).data('idimg');
                $(this).parent().parent().remove();
                for(let i = 0; i < dt.items.length; i++){
                    if(name === dt.items[i].getAsFile().lastModified){
                        dt.items.remove(i);
                        continue;
                    }
                    
                }
                $(this).closest('.file-upload').files = dt.files;
                 var fd = new FormData();
                 fd.append('gallery',$('#gallery').val() );
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "/ads/removeFile/"+name,
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                       $('#gallery').val(data);
                
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });
           $('#gallery').val(g);
          // alert('file upload successfully');
        },
        error: function (data) {
            console.log(data);
        }
    });

        // Mise à jour des fichiers de l'input file après ajout
        this.files = dt.files;
       
    
      

     });
    $('.specifications').on('change', function(e) {
            const dt = new DataTransfer(); 
            var children = "";
            count2++
            if(count2 > 1){
                count++;
            }
       
        var fd = new FormData();

        $.each($(".specifications"), function (key, value) {
            var files = value.files;
            for (var i = 0; i < files.length; i++) {
                fd.append(value.name, $(this).get(0).files[i]);
            }
        });
        fd.append('name', 'upload_Specif_Quant');
        var elem = document.getElementById("myBar1");
        var elem2 = document.getElementById("pers1");
        elem.style.width = 0 + "%";
        elem2.innerHTML = 0 + "%";
        $("#file-content-div1").addClass("align-items-center");
        $(this).closest(".Content").find(".fileContent").css('display', 'none');
        $(this).closest(".Content").find(".note-sp-download").css('display', 'none');
        document.getElementById('progressContainer1').style.display='block';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        xhr: function() {
            var xhr = new window.XMLHttpRequest();
            var elem = document.getElementById("myBar1");
            var elem2 = document.getElementById("pers1");
            xhr.upload.addEventListener("progress", function(evt) {
              if (evt.lengthComputable) {
                var percentComplete = evt.loaded / evt.total;
                percentComplete = parseInt(percentComplete * 100);
              //  console.log(percentComplete);
                elem.style.width = percentComplete + "%";
                 elem2.innerHTML = percentComplete + "%";
                if (percentComplete === 100) {
        
                }
        
              }
            }, false);
        
            return xhr;
          },
        type: 'POST',
        url: "/ads/uploadFile",
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            document.getElementById('progressContainer1').style.display='none';
            $(this).closest(".Content").find(".fileContent").css('display', 'flex');
            $("#file-content-div1").removeClass("align-items-center");
            var g= ( $('#specificationsFiles').val())==''? []:(Array)( $('#specificationsFiles').val());
            for (var i = 0; i < data[0].length; i++) {
                g.push(data[0][i]);
                children += ' <div  class="col-md-4" ><a href="javascript:void(0);">'+data[1][i]["name"]+'</a> <a href="javascript:void(0);"  data-idIMG=' + data[1][i]["id"] + ' class="delete-label bs-tooltip"><i class="las la-trash text-danger font-15"></i></a></div>';
            }
            $(this).closest(".Content").find(".fileContent").append(children);
            $('.delete-label').click(function(){
                let name = $(this).data('idimg');
                $(this).parent().remove();
                for(let i = 0; i < dt.items.length; i++){
                    if(name === dt.items[i].getAsFile().lastModified){
                        dt.items.remove(i);
                        continue;
                    }
                    
                }
               // $(this).closest('.file-upload').files = dt.files;
                 var fd = new FormData();
                 fd.append('gallery',$('#specificationsFiles').val() );
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "/ads/removeFile/"+name,
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                       $('#specificationsFiles').val(data);
                
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });
           $('#specificationsFiles').val(g);
        //    alert('file upload successfully');
        },
        error: function (data) {
            console.log(data);
        }
    });


        this.files = dt.files;
       
    
      

     });
     $('.3D-file').on('change', function(e) {
        const dt = new DataTransfer(); 
        var children = "";
        count2++
        if(count2 > 1){
            count++;
        }
   
    var fd = new FormData();

    $.each($(".3D-file"), function (key, value) {
        var files = value.files;
        for (var i = 0; i < files.length; i++) {
            fd.append(value.name, $(this).get(0).files[i]);
        }
    });
    fd.append('name', 'upload_3D_files');
    var elem = document.getElementById("myBar2");
    var elem2 = document.getElementById("pers2");
    elem.style.width = 0 + "%";
    elem2.innerHTML = 0 + "%";
    $("#file-content-div2").addClass("align-items-center");
    $(this).closest(".Content").find(".fileContent").css('display', 'none');
    $(this).closest(".Content").find(".note-3d-download").css('display', 'none');
    document.getElementById('progressContainer2').style.display='block';
    
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$.ajax({
    xhr: function() {
        var xhr = new window.XMLHttpRequest();
        var elem = document.getElementById("myBar2");
        var elem2 = document.getElementById("pers2");
        xhr.upload.addEventListener("progress", function(evt) {
          if (evt.lengthComputable) {
            var percentComplete = evt.loaded / evt.total;
            percentComplete = parseInt(percentComplete * 100);
          //  console.log(percentComplete);
            elem.style.width = percentComplete + "%";
             elem2.innerHTML = percentComplete + "%";
            if (percentComplete === 100) {
    
            }
    
          }
        }, false);
    
        return xhr;
      },
    type: 'POST',
    url: "/ads/uploadFile",
    data: fd,
    cache: false,
    contentType: false,
    processData: false,
    success: (data) => {
        document.getElementById('progressContainer2').style.display='none';
        $(this).closest(".Content").find(".fileContent").css('display', 'flex');
        $("#file-content-div2").removeClass("align-items-center");
        var g= ( $('#3D_Files').val())==''? []:(Array)( $('#3D_Files').val());
        for (var i = 0; i < data[0].length; i++) {
            g.push(data[0][i]);
            children += ' <div  class="col-md-4" ><a href="javascript:void(0);">'+data[1][i]["name"]+'</a> <a href="javascript:void(0);"  data-idIMG=' + data[1][i]["id"] + ' class="delete-label bs-tooltip"><i class="las la-trash text-danger font-15"></i></a></div>';
        }
        $(this).closest(".Content").find(".fileContent").append(children);
        $('.delete-label').click(function(){
            let name = $(this).data('idimg');
            $(this).parent().remove();
            for(let i = 0; i < dt.items.length; i++){
                if(name === dt.items[i].getAsFile().lastModified){
                    dt.items.remove(i);
                    continue;
                }
                
            }
           // $(this).closest('.file-upload').files = dt.files;
             var fd = new FormData();
             fd.append('gallery',$('#3D_Files').val() );
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "/ads/removeFile/"+name,
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                   $('#3D_Files').val(data);
            
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });
       $('#3D_Files').val(g);
    //    alert('file upload successfully');
    },
    error: function (data) {
        console.log(data);
    }
});


    this.files = dt.files;
   

  

 });
    $('.plan-files').on('change', function(e) {
        const dt = new DataTransfer(); 
        var children = "";
        count2++
        if(count2 > 1){
            count++;
        }
   
    var fd = new FormData();

    $.each($(".plan-files"), function (key, value) {
        var files = value.files;
        for (var i = 0; i < files.length; i++) {
            fd.append(value.name, $(this).get(0).files[i]);
        }
    });
    var elem = document.getElementById("myBar3");
    var elem2 = document.getElementById("pers3");
    elem.style.width = 0 + "%";
    elem2.innerHTML = 0 + "%";
    fd.append('name', 'upload_project_plans');
    $("#file-content-div3").addClass("align-items-center");
    $(this).closest(".Content").find(".fileContent").css('display', 'none');
    $(this).closest(".Content").find(".note-plan-download").css('display', 'none');
    document.getElementById('progressContainer3').style.display='block';
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$.ajax({
    xhr: function() {
        var xhr = new window.XMLHttpRequest();
        var elem = document.getElementById("myBar3");
        var elem2 = document.getElementById("pers3");
        xhr.upload.addEventListener("progress", function(evt) {
          if (evt.lengthComputable) {
            var percentComplete = evt.loaded / evt.total;
            percentComplete = parseInt(percentComplete * 100);
          //  console.log(percentComplete);
            elem.style.width = percentComplete + "%";
             elem2.innerHTML = percentComplete + "%";
            if (percentComplete === 100) {
    
            }
    
          }
        }, false);
    
        return xhr;
      },
    type: 'POST',
    url: "/ads/uploadFile",
    data: fd,
    cache: false,
    contentType: false,
    processData: false,
    success: (data) => {
        document.getElementById('progressContainer3').style.display='none';
        $(this).closest(".Content").find(".fileContent").css('display', 'flex');
        $("#file-content-div3").removeClass("align-items-center");
        var g= ( $('#planFiles').val())==''? []:(Array)( $('#planFiles').val());
        for (var i = 0; i < data[0].length; i++) {
            g.push(data[0][i]);
            children += ' <div  class="col-md-4" ><a href="javascript:void(0);">'+data[1][i]["name"]+'</a> <a href="javascript:void(0);"  data-idIMG=' + data[1][i]["id"] + ' class="delete-label bs-tooltip"><i class="las la-trash text-danger font-15"></i></a></div>';
        }
        $(this).closest(".Content").find(".fileContent").append(children);
        $('.delete-label').click(function(){
            let name = $(this).data('idimg');
            $(this).parent().remove();
            for(let i = 0; i < dt.items.length; i++){
                if(name === dt.items[i].getAsFile().lastModified){
                    dt.items.remove(i);
                    continue;
                }
                
            }
           // $(this).closest('.file-upload').files = dt.files;
             var fd = new FormData();
             fd.append('gallery',$('#planFiles').val() );
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "/ads/removeFile/"+name,
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                   $('#planFiles').val(data);
            
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });
       $('#planFiles').val(g);
    //    alert('file upload successfully');
    },
    error: function (data) {
        console.log(data);
    }
});


    this.files = dt.files;
   

  

 });
    });
})(jQuery);

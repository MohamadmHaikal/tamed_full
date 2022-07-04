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

                
                // phone:
                // {
				// 	required: true,
				// 	minlength: 6,
				// },
			
			},
			messages: {
                title: window.translation.ProjectTitleRequired,
                activitie_id: window.translation.MainActivityRequired,
                activitie_Add_id:  window.translation.AdditionalActivitRequired,
                // city:    "city is required",
                // neighborhood:    "neighborhood is required",
                // description:    "description is required",
                price: window.translation.ProjectvalueRequired,
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
        console.log($(this));
            const dt = new DataTransfer(); // Permet de manipuler les fichiers de l'input file

            var children = "";
            $(this).closest(".Content").find(".fileContent").empty();
            count2++
            if(count2 > 1){
                count++;
            }
            var file ;
            // = $(this)[0].files[0].name;
            $.each( $(this)[0].files, function( key, value ) {
                
            file = value.name;
            arr.push(file);
            var idxDot = file.lastIndexOf(".") + 1;
            var extFile = file.substr(idxDot, file.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            children += ' <div class="attached-files" ><img id="image-preview" src='+ URL.createObjectURL(e.target.files.item(key))+' width="320"><label class="name">' + file + '<span title="Remove Attachment" data-idIMG=' + value.lastModified + ' class="delete-label bs-tooltip"><i class="las la-times"></i></span></label>   </div>';
                
            } else {
            children += ' <div class="attached-files" ><img id="image-preview" src="http://tamed/image/unnamed.png" width="320"><label class="name">' + file + '<span title="Remove Attachment" data-idIMG=' + value.lastModified + ' class="delete-label bs-tooltip"><i class="las la-times"></i></span></label>   </div>';

                
            }
            
            // console.log(children);

        });

        for (let file of this.files) {
            dt.items.add(file);
        }
        // Mise à jour des fichiers de l'input file après ajout
        this.files = dt.files;
        $(this).closest(".Content").find(".fileContent").append(children);
    
        $('span.delete-label').click(function(){
            let name = $(this).data('idimg');
            // Supprimer l'affichage du nom de fichier
            $(this).parent().parent().remove();
            for(let i = 0; i < dt.items.length; i++){
                // Correspondance du fichier et du nom
                if(name === dt.items[i].getAsFile().lastModified){
                    // Suppression du fichier dans l'objet DataTransfer
                    dt.items.remove(i);
                    continue;
                }
            }
            // Mise à jour des fichiers de l'input file après suppression
            $(this).closest('.file-upload').files = dt.files;
        });

     });

     $('.file-upload2').on('change', function(e) {
      
            const dt = new DataTransfer(); // Permet de manipuler les fichiers de l'input file
console.log($(this)[0].files);
            var children = "";
            //$(this).closest(".Content").find(".fileContent").empty();
            count2++
            if(count2 > 1){
                count++;
            }
            var file ;
            // = $(this)[0].files[0].name;
            $.each( $(this)[0].files, function( key, value ) {
                
            file = value.name;
            arr.push(file);
            var idxDot = file.lastIndexOf(".") + 1;
            var extFile = file.substr(idxDot, file.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            children += ' <div  class="col-md-4" ><a href="/image/1652288878.Untitled.pdf" download="">'+file+'</a> <a href="javascript:void(0);"  data-idIMG=' + value.lastModified + ' class="delete-label bs-tooltip"><i class="las la-trash text-danger font-15"></i></a></div>';
                
            } else {
                children += ' <div class="col-md-4" ><a href="/image/1652288878.Untitled.pdf" download="">'+file+'</a> <a href="javascript:void(0);" class="remove" name="TaxCertificate"><i class="las la-trash text-danger font-15"></i></a></div>';

                
            }
            
            // console.log(children);

        });

        for (let file of this.files) {
            dt.items.add(file);
        }
        // Mise à jour des fichiers de l'input file après ajout
        this.files = dt.files;
        $(this).closest(".Content").find(".fileContent").append(children);
    
        $('.delete-label').click(function(){
            let name = $(this).data('idimg');
           console.log($(this).parent());
            // Supprimer l'affichage du nom de fichier
            $(this).parent().remove();
            for(let i = 0; i < dt.items.length; i++){
                // Correspondance du fichier et du nom
                if(name === dt.items[i].getAsFile().lastModified){
                    // Suppression du fichier dans l'objet DataTransfer
                    dt.items.remove(i);
                    continue;
                }
            }
            // Mise à jour des fichiers de l'input file après suppression
            $(this).closest('.file-upload').files = dt.files;
        });

     });
    });
})(jQuery);

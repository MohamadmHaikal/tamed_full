(function ($) {
    "use strict";
    $(function () {
        $('.search .search-full input').on('input', function () {
            var rex = new RegExp($(this).val(), 'i');
            console.log(rex);
            $('.file-t-content tbody tr').hide();
            $('.file-t-content tbody tr').filter(function () {
                return rex.test($(this).text());
            }).fadeIn();
        });
        $('#pdf').on('click', function () {

            var rex = /pdf/i;
            $('.file-t-content tbody tr').hide();
            $('.file-t-content tbody tr').filter(function () {
                return rex.test($(this).text());
            }).fadeIn();
        });
        $('#doc').on('click', function () {

            var rex = /docx/i;
            $('.file-t-content tbody tr').hide();
            $('.file-t-content tbody tr').filter(function () {
                return rex.test($(this).text());
            }).fadeIn();
        });
        $('#xlsx').on('click', function () {

            var rex = /xlsx/i;
            $('.file-t-content tbody tr').hide();
            $('.file-t-content tbody tr').filter(function () {
                return rex.test($(this).text());
            }).fadeIn();
        });
        $('#all').on('click', function () {
            $('.file-t-content tbody tr').show();
        });
        $('#addFolder').on('click', function (event) {
            event.preventDefault();
            $('#addFolderModal').modal('show');
        });
        var fileManagerToggle;
        $('#fileManagerHistory').on('click', function (event) {
            fileManagerToggle = !fileManagerToggle;
            event.preventDefault();
            if (fileManagerToggle) {
                $('.file-manager-bottom-history').show();
                $('.file-manager-bottom-default').hide();
            } else {
                $('.file-manager-bottom-history').hide();
                $('.file-manager-bottom-default').show();
            }
        });
    })
})(jQuery);
document.querySelector('#UploadFile').addEventListener('change', function () {
    if (this.files && this.files[0]) {
        var file = $('#UploadFile').val();
        console.log(file);
        var fd = new FormData();
        fd.append('file', $('#UploadFile').get(0).files[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: "FileManger/store-file",
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

<?php
$gallery = $item['gallery'] != '' ? explode(',', $item['gallery']) : [];
$upload_Specif_Quant = $item['specificationsFiles'] != '' ? explode(',', $item['specificationsFiles']) : [];
$upload_3D_files = $item['3D_Files'] != '' ? explode(',', $item['3D_Files']) : [];
$upload_project_plans = $item['planFiles'] != '' ? explode(',', $item['planFiles']) : [];
// get_ads_attachment($id)
?>
<style>
    .attached-files span.delete-label1 {
        position: absolute;
        top: -6px;
        background: #f27261;
        height: 20px;
        width: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        border-radius: 50%;
        right: -5px;
    }
</style>
<div class="form-card Content row align-items-center">


    <small class="fs-title mb-4 filelabels">{{ __('backend.Upload Image') }}:
    </small>


    <div id="ImgContent" class="row fileContent col-md-10 align-items-center"
        style="margin-left: 0px;border-left: 1px solid #0000003b;">
        @foreach ($gallery as $id)
            <?php
            $img = get_ads_attachment($id);
            
            ?>
            @if ($img != null)
                <div class="attached-files"><img id="image-preview" src="/image/{{ $img->file }}" width="320"><label
                        class="name">{{ $img->name }}<span title="Remove Attachment"
                            data-idIMG="{{ $img->id }}" class="delete-label1 bs-tooltip"><i
                                class="las la-times"></i></span></label> </div>
            @endif
        @endforeach

    </div>

    <div class="row fileContent col-md-10 align-items-center" id="progressContainer" style="display: none">
        <small id="pers" style="position: absolute;right: 50%;color: #fff;">1%</small>
        <div class="progress mb-2 br-30" style="width: 95%;">
            <div id="myBar" class="progress-bar br-0 progress-bar-striped progress-bar-animated bg-secondary"
                role="progressbar"></div>
        </div>
    </div>
    <div class="col-md-2" style="    border-right: 1px solid #0000003b;">

        <label for="file-upload0" class="custom-file-upload mb-0" style="    cursor: pointer;">
            <i class="las la-plus-circle " style="color:gainsboro;margin: auto;font-size: 120px;"></i>
            <p class="text-primary" style="    font-size: 13px;"> <i class="las la-paperclip font-20"></i>رفع صورة او
                فيديو</p>
        </label>

    </div>
    <input id="file-upload0" name='upload_cont_img[]' multiple class="file-upload" data-max-file-size="2M"
        type="file" accept="image/*,video/*" style="display:none;">
    <input id="gallery" name='gallery' value="{{ $item->gallery }}" type="text" style="display:none;">

</div>
<div class="form-card Content row" id="file-content-div1">

    <small class="fs-title mb-4 filelabels">{{ __('backend.Specifications + Quantities') }}:
    </small>


    <div class="row fileContent col-md-10 align-items-center"
        style="margin-left: 0px;border-left: 1px solid #0000003b;">
        @foreach ($upload_Specif_Quant as $id)
            <?php
            $file = get_ads_attachment($id);
            ?>
            @if ($file != null)
                <div class="col-md-4"><a href="javascript:void(0);">{{ $file->name }}</a> <a
                        href="javascript:void(0);" data-idIMG="{{ $file->id }}" data-type="#specificationsFiles"
                        class="delete-label bs-tooltip"><i class="las la-trash text-danger font-15"></i></a></div>
            @endif
        @endforeach
    </div>
    <div class="row fileContent col-md-10 align-items-center" id="progressContainer1" style="display: none">
        <small id="pers1" style="position: absolute;right: 50%;color: #fff;">1%</small>
        <div class="progress mb-2 br-30" style="width: 95%;">
            <div id="myBar1" class="progress-bar br-0 progress-bar-striped progress-bar-animated bg-secondary"
                role="progressbar"></div>
        </div>
    </div>
    <div class="col-md-2">

        <label for="file-upload1" class="custom-file-upload mb-0 " style="    cursor: pointer;">
            <i class="las la-plus-circle " style="color:gainsboro;margin: auto;font-size: 120px;"></i>

            <p class="text-primary" style="    font-size: 13px;"> <i class="las la-paperclip font-20"></i>رفع ملف</p>
        </label>

    </div>
    <input class="specifications" id="file-upload1" name='upload_Specif_Quant[]' multiple type="file"
        data-type="#specificationsFiles" accept=".png,.gpj,.rar,.pdf,.zip" style="display:none;">

    <input id="specificationsFiles" name='specificationsFiles' value="{{ $item->specificationsFiles }}" type="text"
        style="display:none;">
</div>
<div class="form-card Content row" id="file-content-div2">

    <small class="fs-title mb-4 filelabels">{{ __('backend.3D files upload') }}:
    </small>

    <div class="row fileContent col-md-10 align-items-center"
        style="margin-left: 0px;border-left: 1px solid #0000003b;">
        @foreach ($upload_3D_files as $id)
            <?php
            $file = get_ads_attachment($id);
            ?>
            @if ($file != null)
                <div class="col-md-4"><a href="javascript:void(0);">{{ $file->name }}</a> <a
                        href="javascript:void(0);" data-idIMG="{{ $file->id }}" data-type="#3D_Files"
                        class="delete-label bs-tooltip"><i class="las la-trash text-danger font-15"></i></a></div>
            @endif
        @endforeach
    </div>
    <div class="row fileContent col-md-10 align-items-center" id="progressContainer2" style="display: none">
        <small id="pers" style="position: absolute;right: 50%;color: #fff;">1%</small>
        <div class="progress mb-2 br-30" style="width: 95%;">
            <div id="myBar2" class="progress-bar br-0 progress-bar-striped progress-bar-animated bg-secondary"
                role="progressbar"></div>
        </div>
    </div>
    <div class="col-md-2">

        <label for="file-upload2" class="custom-file-upload mb-0" style="    cursor: pointer;">
            <i class="las la-plus-circle " style="color:gainsboro;margin: auto;font-size: 120px;"></i>
            <p class="text-primary" style="    font-size: 13px;"> <i class="las la-paperclip font-20"></i>رفع ملف</p>
        </label>
    </div>
    <input class="3D-file" name='upload_3D_files[]' id="file-upload2" multiple type="file" data-type="#3D_Files"
        accept=".png,.gpj,.rar,.pdf,.zip" style="display:none;">
    <input id="3D_Files" name='3D_Files' value="{{ $item['3D_Files'] }}" type="text" style="display:none;">
</div>
<div class="form-card Content row" id="file-content-div3">

    <small class="fs-title mb-4 filelabels">{{ __('backend.Upload project plans') }}:
    </small>


    <div id="ImgContent" class="row fileContent col-md-10 align-items-center"
        style="margin-left: 0px;border-left: 1px solid #0000003b;">
        @foreach ($upload_project_plans as $id)
            <?php
            $file = get_ads_attachment($id);
            ?>
            @if ($file != null)
                <div class="col-md-4"><a href="javascript:void(0);">{{ $file->name }}</a> <a
                        href="javascript:void(0);" data-idIMG="{{ $file->id }}" data-type="#planFiles"
                        class="delete-label bs-tooltip"><i class="las la-trash text-danger font-15"></i></a></div>
            @endif
        @endforeach
    </div>
    <div class="row fileContent col-md-10 align-items-center" id="progressContainer3" style="display: none">
        <small id="pers" style="position: absolute;right: 50%;color: #fff;">1%</small>
        <div class="progress mb-2 br-30" style="width: 95%;">
            <div id="myBar3" class="progress-bar br-0 progress-bar-striped progress-bar-animated bg-secondary"
                role="progressbar"></div>
        </div>
    </div>
    <div class="col-md-2">
        <label for="file-upload3" class="custom-file-upload mb-0">
            <i class="las la-plus-circle " style="color:gainsboro;margin: auto;font-size: 120px;"></i>
            <p class="text-primary" style="    font-size: 13px;"> <i class="las la-paperclip font-20"></i>رفع ملف</p>

        </label>
    </div>

    <input class="plan-files" id="file-upload3" name='upload_project_plans[]' multiple type="file"
        accept=".png,.gpj,.rar,.pdf,.zip" style="display:none;">
    <input id="planFiles" name='planFiles' value="{{ $item->planFiles }}" type="text" style="display:none;">

</div>




@push('custom-scripts')
    <script>
        $('span.delete-label1').click(function() {
            let name = $(this).data('idimg');
            $(this).parent().parent().remove();
            var fd = new FormData();
            fd.append('gallery', $('#gallery').val());
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "/ads/removeFile/" + name,
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    $('#gallery').val(data);

                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
        $('.delete-label').click(function() {
            let name = $(this).data('idimg');
            let type = $(this).data('type');
            $(this).parent().remove();
            var fd = new FormData();
            console.log($(type).val());
            fd.append('gallery', $(type).val());
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "/ads/removeFile/" + name,
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    $(type).val(data);

                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    </script>
@endpush

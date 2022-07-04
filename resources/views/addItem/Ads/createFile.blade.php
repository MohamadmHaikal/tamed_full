<div class="form-card Content row align-items-center">


    <small class="fs-title mb-4 filelabels">{{ __('backend.Upload Image') }}:
    </small>


    <div id="ImgContent" class="row fileContent col-md-10 align-items-center"
        style="margin-left: 0px;border-left: 1px solid #0000003b;">
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

</div>
<div class="form-card Content row">

    <small class="fs-title mb-4 filelabels">{{ __('backend.Specifications + Quantities') }}:
    </small>


    <div class="row fileContent col-md-10 align-items-center"
        style="margin-left: 0px;border-left: 1px solid #0000003b;">
    </div>
    <div class="col-md-2">

        <label for="file-upload1" class="custom-file-upload mb-0 " style="    cursor: pointer;">
            <i class="las la-plus-circle " style="color:gainsboro;margin: auto;font-size: 120px;"></i>

            <p class="text-primary" style="    font-size: 13px;"> <i class="las la-paperclip font-20"></i>رفع ملف</p>
        </label>

    </div>
    <input class="file-upload2" id="file-upload1" name='upload_Specif_Quant[]' multiple type="file"
        accept=".png,.gpj,.rar,.pdf,.zip" style="display:none;">
    {{-- <label for="file-upload1" class="custom-file-upload mb-0">
    <a title="Attach a file" class="mr-2 pointer text-primary btn btn-outline-primary">
        <i class="las la-paperclip font-20"></i>
        <span class="font-17">{{__('backend.Specifications + Quantities')}}</span>
    </a>
</label>
<input class="file-upload" id="file-upload1" name='upload_Specif_Quant[]' multiple type="file"
    accept=".png,.gpj,.rar,.pdf,.zip" style="display:none;"> --}}

</div>
<div class="form-card Content row">

    <small class="fs-title mb-4 filelabels">{{ __('backend.3D files upload') }}:
    </small>

    <div class="row fileContent col-md-10 align-items-center"  style="margin-left: 0px;border-left: 1px solid #0000003b;">
    </div>
    <div class="col-md-2">

        <label for="file-upload2" class="custom-file-upload mb-0" style="    cursor: pointer;">
            <i class="las la-plus-circle " style="color:gainsboro;margin: auto;font-size: 120px;"></i>
            <p class="text-primary" style="    font-size: 13px;"> <i class="las la-paperclip font-20"></i>رفع ملف</p>
        </label>
    </div>
    <input class="file-upload2" name='upload_3D_files[]' id="file-upload2" multiple type="file"
        accept=".png,.gpj,.rar,.pdf,.zip" style="display:none;">

</div>
<div class="form-card Content row">
    
            <small class="fs-title mb-4 filelabels">{{ __('backend.Upload project plans') }}:
            </small>

    
    <div id="ImgContent" class="row fileContent col-md-10 align-items-center"  style="margin-left: 0px;border-left: 1px solid #0000003b;">
    </div>
    <div class="col-md-2">
    <label for="file-upload3" class="custom-file-upload mb-0">
        <i class="las la-plus-circle " style="color:gainsboro;margin: auto;font-size: 120px;"></i>
        <p class="text-primary" style="    font-size: 13px;"> <i class="las la-paperclip font-20"></i>رفع ملف</p>
 
    </label>
    </div>
    
    <input class="file-upload2" id="file-upload3" name='upload_project_plans[]' multiple type="file"
        accept=".png,.gpj,.rar,.pdf,.zip" style="display:none;">
    
</div>

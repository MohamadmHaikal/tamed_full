<style>
    #myProgress {
        width: 90%;
        background-color: #ddd;
    }

    #myBar {
        width: 1%;
        height: 30px;
        background-color: #04AA6D;
    }
    .col-md-2{
        border-right: 1px solid #0000003b;
    }
</style>
<div class="form-card Content row align-items-center">


    <small class="fs-title mb-4 filelabels">{{ __('backend.Upload Image') }}:
    </small>


    <div id="ImgContent" class="row fileContent col-md-10 align-items-center"
        style="margin-left: 0px;border-left: 1px solid #0000003b;">
    </div>
    <div class="row  col-md-10 align-items-center" id="progressContainer" style="display: none">
        <small id="pers" style="position: absolute;right: 50%;color: #fff;">1%</small>
        <div class="progress mb-2 br-30" style="width: 95%;">
            <div id="myBar" class="progress-bar br-0 progress-bar-striped progress-bar-animated bg-success"
                role="progressbar"></div>
        </div>
    </div>
    <div class="note-img-download col-md-10 align-items-center text-center">
     <p>{{__('backend.The sum of attached file sizes must not exceed 10 MB')}}</p>
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
    <input id="gallery" name='gallery' type="text" style="display:none;">

</div>
<div class="form-card Content row align-items-center" id="file-content-div1">

    <small class="fs-title mb-4 filelabels">{{ __('backend.Specifications + Quantities') }}:
    </small>


    <div class="row fileContent col-md-10 align-items-center"
        style="margin-left: 0px;border-left: 1px solid #0000003b;">
    </div>
    <div class="row  col-md-10 align-items-center" id="progressContainer1" style="display: none">
        <small id="pers1" style="position: absolute;right: 50%;color: #fff;">1%</small>
        <div class="progress mb-2 br-30" style="width: 95%;">
            <div id="myBar1" class="progress-bar br-0 progress-bar-striped progress-bar-animated bg-success"
                role="progressbar"></div>
        </div>
    </div>
    <div class="note-sp-download col-md-10 align-items-center text-center">
        <p>{{__('backend.The sum of attached file sizes must not exceed 10 MB')}}</p>
       </div>
    <div class="col-md-2">

        <label for="file-upload1" class="custom-file-upload mb-0 " style="    cursor: pointer;">
            <i class="las la-plus-circle " style="color:gainsboro;margin: auto;font-size: 120px;"></i>

            <p class="text-primary" style="    font-size: 13px;"> <i class="las la-paperclip font-20"></i>رفع ملف</p>
        </label>

    </div>
    <input class="specifications" id="file-upload1" name='upload_Specif_Quant[]' multiple type="file"
        accept=".png,.gpj,.rar,.pdf,.zip" style="display:none;">
    {{-- <label for="file-upload1" class="custom-file-upload mb-0">
    <a title="Attach a file" class="mr-2 pointer text-primary btn btn-outline-primary">
        <i class="las la-paperclip font-20"></i>
        <span class="font-17">{{__('backend.Specifications + Quantities')}}</span>
    </a>
</label>
<input class="file-upload" id="file-upload1" name='upload_Specif_Quant[]' multiple type="file"
    accept=".png,.gpj,.rar,.pdf,.zip" style="display:none;"> --}}
    <input id="specificationsFiles" name='specificationsFiles' type="text" style="display:none;">
</div>
<div class="form-card Content row  align-items-center" id="file-content-div2">

    <small class="fs-title mb-4 filelabels">{{ __('backend.3D files upload') }}:
    </small>

    <div class="row fileContent col-md-10 align-items-center"
        style="margin-left: 0px;border-left: 1px solid #0000003b;">
    </div>
    <div class="row  col-md-10 align-items-center" id="progressContainer2" style="display: none">
        <small id="pers2" style="position: absolute;right: 50%;color: #fff;">1%</small>
        <div class="progress mb-2 br-30" style="width: 95%;">
            <div id="myBar2" class="progress-bar br-0 progress-bar-striped progress-bar-animated bg-success"
                role="progressbar"></div>
        </div>
    </div>
    <div class="note-3d-download col-md-10 align-items-center text-center">
        <p>{{__('backend.The sum of attached file sizes must not exceed 10 MB')}}</p>
       </div>
    <div class="col-md-2">

        <label for="file-upload2" class="custom-file-upload mb-0" style="    cursor: pointer;">
            <i class="las la-plus-circle " style="color:gainsboro;margin: auto;font-size: 120px;"></i>
            <p class="text-primary" style="    font-size: 13px;"> <i class="las la-paperclip font-20"></i>رفع ملف</p>
        </label>
    </div>
    <input class="3D-file" name='upload_3D_files[]' id="file-upload2" multiple type="file"
        accept=".png,.gpj,.rar,.pdf,.zip" style="display:none;">
    <input id="3D_Files" name='3D_Files' type="text" style="display:none;">
</div>
<div class="form-card Content row align-items-center" id="file-content-div3">

    <small class="fs-title mb-4 filelabels">{{ __('backend.Upload project plans') }}:
    </small>


    <div id="ImgContent" class="row fileContent col-md-10 align-items-center"
        style="margin-left: 0px;border-left: 1px solid #0000003b;">
    </div>
    <div class="row  col-md-10 align-items-center" id="progressContainer3" style="display: none">
        <small id="pers3" style="position: absolute;right: 50%;color: #fff;">1%</small>
        <div class="progress mb-2 br-30" style="width: 95%;">
            <div id="myBar3" class="progress-bar br-0 progress-bar-striped progress-bar-animated bg-success"
                role="progressbar"></div>
        </div>
    </div>
    <div class="note-plan-download col-md-10 align-items-center text-center">
        <p>{{__('backend.The sum of attached file sizes must not exceed 10 MB')}}</p>
       </div>
    <div class="col-md-2">
        <label for="file-upload3" class="custom-file-upload mb-0">
            <i class="las la-plus-circle " style="color:gainsboro;margin: auto;font-size: 120px;"></i>
            <p class="text-primary" style="    font-size: 13px;"> <i class="las la-paperclip font-20"></i>رفع ملف</p>

        </label>
    </div>

    <input class="plan-files" id="file-upload3" name='upload_project_plans[]' multiple type="file"
        accept=".png,.gpj,.rar,.pdf,.zip" style="display:none;">
    <input id="planFiles" name='planFiles' type="text" style="display:none;">

</div>

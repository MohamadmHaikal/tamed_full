<style>
  .delete-file  {
        position: absolute;
    top: -6px;
    background: #e91e7c;
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
                    <div class="form-card Content">
                        <div class="row">
                            <div class="col-7">
                                <h6 class="fs-title mb-4">{{__('backend.Upload Image')}}:
                                </h6>
                            </div>
                            {{-- <div class="col-5">
                                    <h6 class="steps">{{__('Forms')}}Step 3 - 4</h6>
                        </div> --}}
                    </div>
                    <div id="ImgContent" class="row fileContent"></div>
                    <div  class="row ">
                      
                        @foreach ($item->File as $file)
                        <?php
                        $modal = unserialize($file->info);
                        $type = $modal['type'];
                        ?>
                        @if (  $type == 'jpg')
                    <div class="attached-files" >
                        <img id="image-preview" src="{{ asset('image/'.$file->file) }}"
                        width="320">
                        <label class="name">{{ $file->name }}
                            <span title="Remove Attachment"
                            data-idimg="{{ $file->id }}"
                            class="delete-file bs-tooltip">
                            <i class="las la-times"></i></span>
                        </label> 
                            </div>
                            @endif
                        @endforeach
                    </div>
                    
                    
                    <label for="file-upload0" class="custom-file-upload mb-0">
                        <a title="Attach a file" class="mr-2 pointer text-primary">
                            <i class="las la-paperclip font-20"></i>
                            <span class="font-17">{{__('backend.Click here to attach an image/video')}}</span>
                        </a>
                    </label>
                    <input id="file-upload0" name='upload_cont_img[]' multiple class="file-upload" data-max-file-size="2M" type="file"
                        accept="image/*,video/*" style="display:none;">
                    
                    </div>
                    <div class="form-card Content">
                        <div class="row">
                            <div class="col-7">
                                <h6 class="fs-title mb-4">{{__('backend.Specifications + Quantities')}}:
                                </h6>
                            </div>
                            {{-- <div class="col-5">
                                    <h6 class="steps">{{__('Forms')}}Step 3 - 4</h6>
                        </div> --}}
                    </div>
                    <div class="row fileContent"></div>

                    <div  class="row ">
                      
                        @foreach ($item->File as $file)
                        <?php
                        $modal = unserialize($file->info);
                        $type = $modal['type'];
                        ?>
                        @if (  $type == 'pdf')
                    <div class="attached-files" >
                        <img id="image-preview" src="{{ asset('image/unnamed.png') }}"
                        width="320">
                        <label class="name">{{ $file->name }}
                            <span title="Remove Attachment"
                            data-idimg="{{ $file->id }}"
                            class="delete-file bs-tooltip">
                            <i class="las la-times"></i></span>
                        </label> 
                            </div>
                            @endif
                        @endforeach
                    </div>
                    
                    <label for="file-upload1" class="custom-file-upload mb-0">
                        <a title="Attach a file" class="mr-2 pointer text-primary btn btn-outline-primary">
                            <i class="las la-paperclip font-20"></i>
                            <span class="font-17">{{__('backend.Specifications + Quantities')}}</span>
                        </a>
                    </label>
                    <input class="file-upload" id="file-upload1" name='upload_Specif_Quant[]' multiple type="file"
                        accept=".png,.gpj,.rar,.pdf,.zip" style="display:none;">
                    
                    </div>
                    <div class="form-card Content">
                        <div class="row">
                            <div class="col-7">
                                <h6 class="fs-title mb-4">{{__('backend.3D files upload')}}:
                                </h6>
                            </div>
                            {{-- <div class="col-5">
                                    <h6 class="steps">{{__('Forms')}}Step 3 - 4</h6>
                        </div> --}}
                    </div>
                    <div class="row fileContent">
                    </div>

                    <div  class="row ">
                      
                        @foreach ($item->File as $file)
                        <?php
                        $modal = unserialize($file->info);
                        $type = $modal['type'];
                        ?>
                        @if (  $type == 'rar')
                    <div class="attached-files" >
                        <img id="image-preview" src="{{ asset('image/unnamed.png') }}"
                        width="320">
                        <label class="name">{{ $file->name }}
                            <span title="Remove Attachment"
                            data-idimg="{{ $file->id }}"
                            class="delete-file bs-tooltip">
                            <i class="las la-times"></i></span>
                        </label> 
                            </div>
                            @endif
                        @endforeach
                    </div>
                    
                    <label for="file-upload2" class="custom-file-upload mb-0">
                        <a title="Attach a file" class="mr-2 pointer text-primary btn btn-outline-primary">
                            <i class="las la-paperclip font-20"></i>
                            <span class="font-17">{{__('backend.3D files upload')}}</span>
                        </a>
                    </label>
                    <input class="file-upload" name='upload_3D_files[]' id="file-upload2" multiple type="file"
                        accept=".png,.gpj,.rar,.pdf,.zip" style="display:none;">
                    
                    </div>
                    <div class="form-card Content">
                        <div class="row">
                            <div class="col-7">
                                <h6 class="fs-title mb-4">{{__('backend.Upload project plans')}}:
                                </h6>
                            </div>
                            {{-- <div class="col-5">
                                    <h6 class="steps">{{__('Forms')}}Step 3 - 4</h6>
                        </div> --}}
                    </div>
                    <div id="ImgContent" class="row fileContent">
                    </div>

                    <div  class="row ">
                      
                        @foreach ($item->File as $file)
                        <?php
                        $modal = unserialize($file->info);
                        $type = $modal['type'];
                        ?>
                        @if (  $type == 'zip')
                    <div class="attached-files" >
                        <img id="image-preview" src="{{ asset('image/unnamed.png') }}"
                        width="320">
                        <label class="name">{{ $file->name }}
                            <span title="Remove Attachment"
                            data-idimg="{{ $file->id }}"
                            class="delete-file bs-tooltip">
                            <i class="las la-times"></i></span>
                        </label> 
                            </div>
                            @endif
                        @endforeach
                    </div>
                    
                    <label for="file-upload3" class="custom-file-upload mb-0">
                        <a title="Attach a file" class="mr-2 pointer text-primary btn btn-outline-primary">
                            <i class="las la-paperclip font-20"></i>
                            <span class="font-17 ">{{__('backend.Upload project plans')}}</span>
                        </a>
                    </label>
                    <input class="file-upload" id="file-upload3" name='upload_project_plans[]' multiple type="file"
                        accept=".png,.gpj,.rar,.pdf,.zip" style="display:none;">
                    
                    </div>








        @push('custom-scripts')
                <script>
                $('span.delete-file').click(function(){
                    var x=$(this);
                    let id = x.data('idimg');
                    // Supprimer l'affichage du nom de fichier
                    var url = "{{ URL::to('ads/deleteFile') }}/" + id;
                        $.ajax({
                            url: url,
                            type: "get",
                            contentType: 'application/json',
                            success: function (data) {
                                x.parent().parent().remove();
                               console.log(data);
                            },
                            error: function (xhr) {}
                        });

                });
                </script>

        @endpush
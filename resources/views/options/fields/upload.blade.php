<?php
$layout = !empty($layout) ? $layout : 'col-12';
if (empty($value)) {
    $value = $std;
}
$idName = str_replace(['[', ']'], '_', $id);
// enqueue_style('dropzone-css');
// enqueue_script('dropzone-js');
$langs = $translation == false ? [''] : get_languages_field();
$class_seo = $seo_detect ? 'seo-detect' : '';
?>
<div id="setting-{{ $idName }}" data-condition="{{ $condition }}" data-unique="{{ $unique }}"
    data-operator="{{ $operation }}" class="form-group mb-3 col {{ $layout }} field-{{ $type }}">
    <label for="{{ $idName }}">
        {{ __($label) }}
        @if (!empty($desc))
            <i class="dripicons-information field-desc" data-toggle="popover" data-placement="right" data-trigger="hover"
                data-content="{{ __($desc) }}"></i>
        @endif
    </label> <br />

    @foreach ($langs as $key => $item)
        <?php
        $url = get_attachment_url(get_translate($value, $item), 'medium');
        if (!$value) {
            $url = 'https://dummyimage.com/800x600/e0e0e0/c7c7c7.png';
        }
        ?>
        <div class="hh-upload-wrapper {{ get_lang_class($key, $item) }}"
            @if (!empty($item)) data-lang="{{ $item }}" @endif>
            <div class="hh-upload-wrapper clearfix">
                <div class="attachments">
                    @if ($url)
                        <div class="attachment-item">
                            <div class="thumbnail"><img src="{{ $url }}" alt="Image"
                                    id="im-{{ $id }}{{ get_lang_suffix($item) }}" style="height: 105px;">
                            </div>
                        </div>
                    @endif
                </div>
                <div class="mt-1">
                    {{-- <a href="javascript:void(0);" class="remove-attachment">{{ __('backend.Remove') }}</a> --}}
                    <label for="file-{{ $id }}{{ get_lang_suffix($item) }}">

                        <a class="add-attachment" title="{{ __('Add Image') }}" data-text="{{ __('Add Image') }}"
                            data-img="im-{{ $id }}{{ get_lang_suffix($item) }}"
                            data-file="file-{{ $id }}{{ get_lang_suffix($item) }}"
                            data-form="form-{{ $id }}{{ get_lang_suffix($item) }}"
                            data-inp="{{ $id }}{{ get_lang_suffix($item) }}"
                            data-url="{{ dashboard_url('all-media') }}">{{ __('backend.Add Image') }}</a>

                    </label>
                    {{-- <form method="POST" enctype="multipart/form-data" id="form-{{ $id }}{{get_lang_suffix($item)}}"
                        action="javascript:void(0)"> --}}
                    {{-- <div class="row"> --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="file" name="something"
                                id="file-{{ $id }}{{ get_lang_suffix($item) }}" style="display:none;">
                            <span class="text-danger">{{ $errors->first('file') }}</span>
                        </div>
                    </div>
                    {{-- </div>
                    </form> --}}

                    <input id="{{ $id }}{{ get_lang_suffix($item) }}" type="hidden"
                        class="upload_value input-upload {{ $class_seo }}"
                        value="{{ get_translate($value, $item) }}" data-seo-detect="{{ $seo_put_to }}"
                        name="{{ $id }}{{ get_lang_suffix($item) }}"
                        data-url="{{ dashboard_url('get-attachments') }}">
                </div>
            </div>
        </div>
    @endforeach
</div>
@if ($break)
    <div class="w-100"></div>
@endif

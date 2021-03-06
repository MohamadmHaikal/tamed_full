<?php

    $layout = (!empty($layout)) ? $layout : 'col-12';
    if (empty($value)) {
        $value = $std;
    }
    if (empty($value)) {
        $value = '#FFFFFF';
    }
    $idName = str_replace(['[', ']'], '_', $id);

    // enqueue_script('bootstrap-colorpicker-js');
    // enqueue_style('bootstrap-colorpicker-css');
?>

<div id="setting-{{ $idName }}" data-condition="{{ $condition }}"
     data-unique="{{ $unique }}"
     data-operator="{{ $operation }}"
     class="form-group mb-3 col {{ $layout }} field-{{ $type }}">
    <label for="{{ $idName }}">
        {{ __($label) }}
        @if (!empty($desc))
            <i class="dripicons-information field-desc" data-toggle="popover" data-placement="right"
               data-trigger="hover"
               data-content="{{ __($desc) }}"></i>
        @endif
    </label>
    <div class="input-group">
        {{-- <div class="input-group-prepend">
            <div class="input-group-text color" id="{{$idName}}-color"></div>
        </div> --}}
      
            <input type="color" class="form-control form-control-color" 
            title="Choose your color" id="{{ $idName }}" data-plugin="colorpicker"
            data-validation="{{ $validation }}"
            name="{{ $id }}" value="{{ $value }}"@disabled(true) onchange="change(this)">
            <input type="text" id="{{ $idName }}-color" data-plugin="colorpicker"
            class="form-control @if (!empty($validation)) has-validation @endif"
             value="{{ $value }}" readonly>
    </div>
</div>
@if($break)
    <div class="w-100"></div> @endif
<script>
function change(element) {
    document.getElementById(element.id+'-color').value =element.value;



}

    
</script>
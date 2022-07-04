
<form id="form-Item" action="{{route($action)  }}" method="POST" 
enctype="multipart/form-data"
class="form form-action">

<div id="Create" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
    
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('backend.'.$title)}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="las la-times"></i>
                </button>
            </div>

            <div class="modal-body">

                <div class="widget-header">
                    <div class="row">
                        <input type="hidden" name="model" id="model" value="{{ $model }}">
                    </div>
                </div>
                <div class="widget-content widget-content-area" id="widget-content-area" style="box-shadow: 0px 0px 20px 0px rgb(0 0 0 / 0%);">
                
                    @foreach ($arrayItem as $key => $item)
                
                    @if ($item->columnType == 'select')
                    <select class="form-control form-control-sm" name="{{ $item->columnName }}">
                        @foreach ($item->options as $option)
                            <option value="{{ isset($option->id) ? $option->id : $option->name }}">{{ $option->name }}</option>
                        @endforeach
                    </select>
                   @elseif ($item->columnType == 'hidden')
                    
                        <input type="{{ $item->columnType }}" class="form-control" value=" {{$item->value }}" name="{{ $item->columnName }}" id="{{ $item->columnName }}" hidden>
                  
                    @else
                    <div class="form-group">
                        @if ($item->columnName=='image')  
                        <label>{{ __('backend.image') }}</label>
                      @else 
                          <label>{{ __('backend.name of Item') }}</label>
                        @endif
                      
                        <input type="{{ $item->columnType }}" class="form-control" value=" {{ isset( $item->value) }}" name="{{ $item->columnName }}" id="{{ $item->columnName }}">
                    </div>
                    @endif
                    @endforeach

                </div>

            </div>
            
                
            
            <div class="modal-footer md-button" >
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                    {{ __('backend.Cancel') }}</button>
                <button class="btn btn-primary createItem" id="createItem"
                 onclick="Create(this)"
                 >{{ __('backend.add') }}</button>
            </div>
            
        </div>
    </div>
</div>
</form>
@push('custom-scripts')
{!! Html::script('assets/js/myJS.js') !!}
@endpush



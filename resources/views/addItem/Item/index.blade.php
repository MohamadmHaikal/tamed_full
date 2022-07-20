@extends('layout.master')

@push('plugin-styles')
{!! Html::style('plugins/table/datatable/datatables.css') !!}
{!! Html::style('plugins/table/datatable/dt-global_style.css') !!}


{!! Html::style('plugins/sweetalerts/sweetalert2.min.css') !!}
{!! Html::style('plugins/sweetalerts/sweetalert.css') !!}
{!! Html::style('assets/css/basic-ui/custom_sweetalert.css') !!}


@endpush

@php 

    $modelName = 'App\\Models\\' .$model;
    $Newmodel = new $modelName();
    $arrayItem = $Newmodel->getColumn();
    $arrayTitle = $Newmodel->getTitleColumn();
    $list_button_back = array('Activitie','AdditionalActivitie','Service');
    $screen=request()->route()->model;
@endphp



@section('content')
    <!--  Navbar Starts / Breadcrumb Area  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                <i class="las la-bars"></i>
            </a>
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Datatables')}}</a></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
<!--  Navbar Ends / Breadcrumb Area  -->
<!-- Main Body Starts -->
<div class="layout-px-spacing">
    <div class="layout-top-spacing mb-2">
        <div class="col-md-12">
            <div class="row">
                <div class="container p-0">
                    <div class="row layout-top-spacing date-table-container">
                        <!-- Datatable go to last page -->
                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                            <div class="widget-content widget-content-area br-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="table-header">{{ __('backend.'.$model) }}</h4>

                                    </div>
                                    <div class="col-md-6">
                                        @if(in_array($model, $list_button_back))
                                        <a href="{{ URL::previous() }}" class="btn btn-primary mb-2 mr-2 add">{{ __('backend.back') }}</a>
                                            
                                        @endif
                                        <button type="button" class="btn btn-primary mb-2 mr-2 add" data-toggle="modal"
                                            data-target="#Create">{{ __('backend.add') }}</button>

                                    </div>
                                </div>
                              
                                <div class="table-responsive mb-4">
                                    <table id="last-page-dt" class="table table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                @foreach ($arrayTitle as $item)
                                                <th>{{ __('backend.'.$item) }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        
                                     
                                
                                        <tbody>
                                            @foreach ($Item as $key => $item)
                                          
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{$screen=='Section'? __('backend.'.$item->name):$item->name }}</td>
                                                    @if ($item->relation)
                                                    {{-- ( $item->type_id || $item->activitie_id) --}}
                                                    <td>{{ $item->relation->name }}</td>
                                                    @endif
                                                    @if(method_exists( $item, 'showRelation'))
                                                    <td>
                                                        @if ($model=='Section' && $item['name']=='job')
                                                        <a href="{{route('Item',['model'=>'TypeEmployment' ])}}" 
                                                            class="btn btn-outline-primary">
                                                            {{ __('backend.View Jobs') }}
                                                        </a>
                                                        @else
                                                        <a href="{{route('Item',['model'=>$item->showRelation(),'id'=>$item->id ])}}" 
                                                            class="btn btn-outline-primary">
                                                            {{ __('backend.Show'.$item->showRelation() ) }}
                                                        </a>
                                                        @endif
                                                    </td>
                                                    @endif
                                                    <td class="text-center">
                                                        <div class="dropdown custom-dropdown">
                                                            <a class="dropdown-toggle font-20 text-primary" href="#"
                                                                role="button" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                <i class="las la-cog"></i>
                                                            </a>
                                                            <div class="dropdown-menu"
                                                                aria-labelledby="dropdownMenuLink1"
                                                                style="will-change: transform;">
                                                                <?php
                                                                $data = [
                                                                    'ID' => $item->id,
                                                                    'model' => $model
                                                                ];
                                                                ?>
                                                               <a class="dropdown-item hh-link-action hh-link-delete-home"
                                                               onclick="Delete(this)"
                                                               data-params="{{ json_encode($data) }}"
                                                               data-action="{{ route('get-item')  }}"
                                                               href="javascript: void(0)"
                                                                    data-type="Show">
                                                                    {{ __('backend.Show') }}</a>

                                                                    <a class="dropdown-item hh-link-action hh-link-delete-home"
                                                                    onclick="Delete(this)"
                                                                    data-params="{{ json_encode($data) }}"
                                                                    data-action="{{ route('get-item')  }}"
                                                                    href="javascript: void(0)"
                                                                    data-type="Edit">
                                                                    {{ __('backend.Edit') }}</a>

                                                                    
                                                                    <a class="dropdown-item hh-link-action hh-link-delete-home"
                                                                    data-action="{{ route('delete-item')  }}"
                                                                    data-parent="tr"
                                                                    data-is-delete="true"
                                                                    onclick="Delete(this)"
                                                                    data-confirm="yes"
                                                                    data-confirm-title="{{__('System Alert')}}"
                                                                    data-confirm-question="{{__('Are you sure want to delete this home?')}}"
                                                                    data-confirm-button="{{__('Delete it!')}}"
                                                                    data-params="{{ json_encode($data) }}"
                                                                    href="javascript: void(0)"> {{ __('backend.Delete') }}
                                                                    
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        {{-- <tfoot>
                                            <tr>
                                                @foreach ($arrayTitle as $item)
                                                <th>{{ __('backend.'.$item) }}</th>
                                                @endforeach
                                            </tr>
                                        </tfoot> --}}
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Body Ends -->

@include('common.modal', [
    'model' => $model,
    'action' => 'add-item',
    'id' => 'Create',
    'title' => 'Add '.$model,
]) 
<div id="alert">

</div>

<!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
{!! Html::script('assets/js/loader.js') !!}
{!! Html::script('plugins/sweetalerts/promise-polyfill.js') !!}
{!! Html::script('plugins/sweetalerts/sweetalert2.min.js') !!}
{!! Html::script('assets/js/basicui/sweet_alerts.js') !!}

@endpush
@push('plugin-scripts')
{!! Html::script('plugins/table/datatable/datatables.js') !!}
{!! Html::script('plugins/table/datatable/button-ext/dataTables.buttons.min.js') !!}
{!! Html::script('plugins/table/datatable/button-ext/jszip.min.js') !!}
{!! Html::script('plugins/table/datatable/button-ext/buttons.html5.min.js') !!}
{!! Html::script('plugins/table/datatable/button-ext/buttons.print.min.js') !!}
{!! Html::script('plugins/table/datatable/button-ext/pdfmake.min.js') !!}
{!! Html::script('plugins/table/datatable/button-ext/vfs_fonts.js') !!}
@endpush
@push('custom-scripts')
<script>
 $(document).ready(function () {
        $('#basic-dt').DataTable({
            "language": {
                "paginate": {
                    "previous": "<i class='las la-angle-left'></i>",
                    "next": "<i class='las la-angle-right'></i>"
                }
            },
            "lengthMenu": [5, 10, 15, 20],
            "pageLength": 5
        });
        $('#dropdown-dt').DataTable({
            "language": {
                "paginate": {
                    "previous": "<i class='las la-angle-left'></i>",
                    "next": "<i class='las la-angle-right'></i>"
                }
            },
            "lengthMenu": [5, 10, 15, 20],
            "pageLength": 5
        });
        $('#last-page-dt').DataTable({
            "pagingType": "full_numbers",
            "language": {
                "paginate": {
                    "first": "<i class='las la-angle-double-left'></i>",
                    "previous": "<i class='las la-angle-left'></i>",
                    "next": "<i class='las la-angle-right'></i>",
                    "last": "<i class='las la-angle-double-right'></i>"
                }
            },
            "lengthMenu": [3, 6, 9, 12],
            "pageLength": 6,
            "order": [[0, 'desc']]
        });
        $.fn.dataTable.ext.search.push(
            function (settings, data, dataIndex) {
                var min = parseInt($('#min').val(), 10);
                var max = parseInt($('#max').val(), 10);
                var age = parseFloat(data[3]) || 0; // use data for the age column
                if ((isNaN(min) && isNaN(max)) ||
                    (isNaN(min) && age <= max) ||
                    (min <= age && isNaN(max)) ||
                    (min <= age && age <= max)) {
                    return true;
                }
                return false;
            }
        );
        var table = $('#range-dt').DataTable({
            "language": {
                "paginate": {
                    "previous": "<i class='las la-angle-left'></i>",
                    "next": "<i class='las la-angle-right'></i>"
                }
            },
            "lengthMenu": [5, 10, 15, 20],
            "pageLength": 5
        });
        $('#min, #max').keyup(function () {
            table.draw();
        });
        $('#export-dt').DataTable({
            dom: '<"row"<"col-md-6"B><"col-md-6"f> ><""rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>>',
            buttons: {
                buttons: [{
                        extend: 'copy',
                        className: 'btn btn-primary'
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-primary'
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-primary'
                    },
                    {
                        extend: 'pdf',
                        className: 'btn btn-primary'
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-primary'
                    }
                ]
            },
            "language": {
                "paginate": {
                    "previous": "<i class='las la-angle-left'></i>",
                    "next": "<i class='las la-angle-right'></i>"
                }
            },
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
        });
        // Add text input to the footer
        $('#single-column-search tfoot th').each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" class="form-control" placeholder="Search ' + title +
                '" />');
        });
        // Generate Datatable
        var table = $('#single-column-search').DataTable({
            "language": {
                "paginate": {
                    "previous": "<i class='las la-angle-left'></i>",
                    "next": "<i class='las la-angle-right'></i>"
                }
            },
            "lengthMenu": [5, 10, 15, 20],
            "pageLength": 5
        });
        // Search
        table.columns().every(function () {
            var that = this;
            $('input', this.footer()).on('keyup change', function () {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });
        var table = $('#toggle-column').DataTable({
            "language": {
                "paginate": {
                    "previous": "<i class='las la-angle-left'></i>",
                    "next": "<i class='las la-angle-right'></i>"
                }
            },
            "lengthMenu": [5, 10, 15, 20],
            "pageLength": 5
        });
        $('a.toggle-btn').on('click', function (e) {
            e.preventDefault();
            // Get the column API object
            var column = table.column($(this).attr('data-column'));
            // Toggle the visibility
            column.visible(!column.visible());
            $(this).toggleClass("toggle-clicked");
        });
    });
</script>
@endpush
@extends('layout.master')

@push('plugin-styles')
{!! Html::style('plugins/sweetalerts/sweetalert2.min.css') !!}
{!! Html::style('plugins/sweetalerts/sweetalert.css') !!}
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
    {!! Html::style('plugins/notification/snackbar/snackbar.min.css') !!}
    {!! Html::style('assets/css/ui-elements/buttons.css') !!}
@endpush

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
                                <li class="breadcrumb-item"><a
                                        href="javascript:void(0);">{{ __('backend.CustomerList') }}</a>
                                </li>

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
                                            <h4 class="table-header">
                                                {{ __('backend.CustomerList') }}</h4>

                                        </div>
                                        <div class="col-md-6">
                                    
                                            <button type="button" class="btn btn-primary mb-2 mr-2 add" data-toggle="modal"
                                                data-target="#Create">{{ __('backend.add') }}</button>
    
                                        </div>
                                    </div>
                                    <div class="table-responsive mb-4">
                                       
                                        <div class="action-toolbar">
                                            <form class="hh-form form-inline" action="{{dashboard_url('bulkActions')}}"
                                            data-model="Customers"
                                                  data-target="#export-dt" method="post">
                                                <select class="mr-1 min-w-100" name="action" data-plugin="customselect">
                                                    {{-- <option value="none">{{__('Bulk Actions')}}</option>
                                                    <option value="publish">{{__('Publish')}}</option>
                                                    <option value="pending">{{__('Pending')}}</option>
                                                    <option value="draft">{{__('Draft')}}</option>
                                                    <option value="trash">{{__('Trash')}}</option> --}}
                                                    <option value="delete">{{__('Delete')}}</option>
                                                </select>
                                                <button type="submit" class="btn btn-success">{{__('Apply')}}</button>
                                            </form>
                                        </div>

                                        <table id="export-dt" class="table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th data-priority="-1" class="hh-checkbox-td">
                                                        <div class="checkbox-inline">
                                                        <div class="checkbox checkbox-success hh-check-all d-none d-md-block ">
                                                            <input id="hh-checkbox-all--my-experience inp-cbx" type="checkbox">
                                                            <label for="hh-checkbox-all--my-experience"><span
                                                                    class="d-none">{{__('Check All')}}</span></label>
                                                        </div>
                                                    </div>
                                                    </th>
                                                    <th>{{ __('backend.id') }}</th>
                                                    <th>{{ __('backend.Facility Name') }}</th>
                                                    <th>{{ __('backend.responsible') }}</th>
                                                    <th>{{ __('backend.phone') }}</th>
                                                    <th class="no-content text-center">{{ __('backend.Message') }}</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($customers as $item)
                                                    <tr>
                                                        <td class="align-middle hh-checkbox-td">
                                                            <div class="checkbox checkbox-success d-none d-md-block">
                                                                <input type="checkbox" name="post_id" value="{{$item->id}}"
                                                                       id="hh-check-all-item-{{$item->id}}" class="hh-check-all-item">
                                                                <label for="hh-check-all-item-{{$item->id}}"></label>
                                                            </div>
                                                        </td>

                                                        <td>{{ $item->id }}</td>
                                                        <td>{{ $item->facility_name  }}</td>
                                                        <td>{{ $item->responsible  }}</td>
                                                        <td>{{ $item->phone  }}</td>
                                                        {{-- <td>test</td>
                                                        <td>{{ $item->customer_id == get_current_user_id() ? get_user_by_id($item->facility_id)->phone : get_user_by_id($item->customer_id)->phone }}
                                                        </td> --}}
                                                        <td class="text-center">
                                                            @if (getUserBymobile($item->phone ) != null)
                                                            <a class="dropdown-toggle  text-primary "
                                                            href="{{route('user',[getUserBymobile($item->phone)])}}"
                                                           >
 
                                                           <i class="las la-comments font-30 text-primary"></i>
                                                        </a>
 
                                                            @else
                                                            <a class="dropdown-toggle "
                                                            href="javascript:void(0);"
                                                            
                                                           >
                                                           <i class="las la-comments font-30 "style="color: #d6d6d6"></i>
                                                        </a>
                                                            @endif
                                                      
                                                        </td>
                                                        <?php
                                                        $data = [
                                                            'ID' => $item->id,
                                                            'model' => 'Customers'
                                                        ];
                                                        ?>
                                                        <td class="text-center">
                                                            <div class="dropdown custom-dropdown">
                                                                <a class="dropdown-toggle font-20 text-primary" href="#"
                                                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <i class="las la-cog"></i>
                                                                </a>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1"
                                                                    style="will-change: transform;">
                                                               
                                                            
        
                                                                    <a class="dropdown-item editCustomer"
                                                                    data-action="/FacilityCustomers/customer_edit/"
                                                                    data-id="{{ $item->id }}"
                                                                    href="javascript:void(0);"
                                                                    >{{__('backend.Edit')}}</a>
        
                                                                    <a class="dropdown-item confirmDelete"
                                                                    data-action="/FacilityCustomers/customer_delete/"
                                                                    data-id="{{ $item->id }}"
                                                                       href="javascript:void(0);">{{__('backend.Delete')}}</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                   


                                                    </tr>
                                                @endforeach
                                            </tbody>

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


    <form id="form-Item" action="{{route('FacilityCustomersAdd')  }}" method="POST" 
enctype="multipart/form-data"
class="form form-action">
    <div id="Create" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
        
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        {{ __("backend.add customer") }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
    
                <div class="modal-body">
    
                    <div class="widget-header">
                        <label>{{ __('backend.If the customer is registered within the platform, enter the commercial registration number and press Verify') }}</label>
                    </div>
                    <div class="widget-content widget-content-area" id="widget-content-area"
                     style="box-shadow: 0px 0px 20px 0px rgb(0 0 0 / 0%);">

                     <div class="row">
                        <div class="col-12 col-md-6">
                            <label>{{ __('backend.Commercial Registration No') }}</label>

                            <div class="input-group">

                                <input type="text" class="form-control" name=""
                                id="CRecord"
                                    placeholder="{{ __('backend.Commercial Registration No') }}"
                                    aria-describedby="inputGroupPrepend" required>
                                <i class="las la-check-circle" aria-hidden="true"  style="position: absolute;
                                                                                    top: 14px;
                                                                                    right: 80%;
                                                                                    color: green;
                                                                                    display:none;
                                                                                "></i>
                                <div class="input-group-append">
                                    <span class="btn btn-soft-primary " style="border-radius: 23px 0px 0px 23px;"
                                      id="customer_get"
                                    type="button">{{ __('backend.check') }}</span>
                                </div>
                            
                            </div>

                           
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>{{ __('backend.Facility Name') }}</label>
                    
                                <input type="text" class="form-control" value="" name="facility_name" id="facility_name" >
                             </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>{{ __('backend.responsible') }}</label>
                    
                                <input type="text" class="form-control" value="" name="responsible" id="responsible">
                                <input type="hidden" class="form-control" value="{{ get_current_user_id() }}" name="facility_id" >
                             </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>{{ __('backend.phone') }}</label>
                    
                                <input type="text" class="form-control" value="" name="phone" id="phone">
                                <input type="hidden" class="form-control" value="" name="customer_id" id="customer_id">
                             </div>
                        </div>
                     </div>
                    
                 
                     <div class="row">
                        <div class="col-md-12">
                            <div class="form-group"><label
                                    for="degree2">{{ __('backend.description') }}</label>
                                <textarea type="text" name="note" id="note" class="form-control " maxlength="100" row="3"
                                    aria-describedby="inputGroupPrepend" required></textarea>
                                <div class="invalid-feedback">
                                    {{ __('backend.Description required') }}
                                </div>
                            </div>
                        </div>
                    </div>
                   
       
    
                    </div>
    
                </div>
                
                    
                
                <div class="modal-footer md-button" >
        
                    <button class="btn btn-primary createItem" id="createItem"
                    onclick="Create(this)"
                     >{{ __('backend.add') }}</button>
                </div>
                
            </div>
        </div>
    </div>
</form>


    
    
    
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
{!! Html::script('plugins/sweetalerts/sweetalert2.min.js') !!}
{!! Html::script('assets/js/basicui/sweet_alerts.js') !!}
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('plugins/table/datatable/datatables.js') !!}
    <!--  The following JS library files are loaded to use Copy CSV Excel Print Options-->
    {!! Html::script('plugins/table/datatable/button-ext/dataTables.buttons.min.js') !!}
    {!! Html::script('plugins/table/datatable/button-ext/jszip.min.js') !!}
    {!! Html::script('plugins/table/datatable/button-ext/buttons.html5.min.js') !!}
    {!! Html::script('plugins/table/datatable/button-ext/buttons.print.min.js') !!}
    <!-- The following JS library files are loaded to use PDF Options-->
    {!! Html::script('plugins/table/datatable/button-ext/pdfmake.min.js') !!}
    {!! Html::script('plugins/table/datatable/button-ext/vfs_fonts.js') !!}
@endpush


@push('custom-scripts')
    {!! Html::script('plugins/notification/snackbar/snackbar.min.js') !!}
    {!! Html::script('assets/js/basicui/notifications.js') !!}
    {!! Html::script('assets/js/myJS.js') !!}

@endpush

@push('custom-scripts')
    <script>
     
        $(document).ready(function() {
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
                "pageLength": 9
            });
            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
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
            $('#min, #max').keyup(function() {
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
                            extend: 'excel',
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
            $('#single-column-search tfoot th').each(function() {
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
            table.columns().every(function() {
                var that = this;
                $('input', this.footer()).on('keyup change', function() {
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
            $('a.toggle-btn').on('click', function(e) {
                e.preventDefault();
                // Get the column API object
                var column = table.column($(this).attr('data-column'));
                // Toggle the visibility
                column.visible(!column.visible());
                $(this).toggleClass("toggle-clicked");
            });
        });

        $('#customer_get').on('click', function(e) {
            $( '#info_facility').empty();
          var id=  $(document).find('#CRecord').val();
            var url = "/FacilityCustomers/customer_get/" + id;
            $.ajax({
        url: url,
        type: "get",
        contentType: 'application/json',
        success: function (data) {
            $(document).find('#facility_name').val(data.name);
            $(document).find('#responsible').val(data.responsible);
            $(document).find('#customer_id').val(data.id);
            $(document).find('#phone').val(data.phone);

           
 
        },
        error: function (xhr) {}
    });
        })

        $('.editCustomer').on('click', function(e) {


            var id = $(this).data('id');
            var action = $(this).data('action');

            $.ajax({
            url: action + id,
            type: "get",
            contentType: 'application/json',
            success: function (data) {
                $(document).find('#form-Item').attr('action', '/FacilityCustomers/customer_update/'+data.id);
                $(document).find('#facility_name').val(data.facility_name);
                $(document).find('#responsible').val(data.responsible);
                $(document).find('#phone').val(data.phone);
                $(document).find('#note').html(data.note);
                $('#Create').modal('show');
            
    
            },
            error: function (xhr) {}
        });
        })
    </script>
@endpush

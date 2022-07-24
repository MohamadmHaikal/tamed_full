@extends('layout.master')

@push('plugin-styles')
{!! Html::style('plugins/table/datatable/datatables.css') !!}
{!! Html::style('plugins/table/datatable/dt-global_style.css') !!}


{!! Html::style('plugins/sweetalerts/sweetalert2.min.css') !!}
{!! Html::style('plugins/sweetalerts/sweetalert.css') !!}
{!! Html::style('assets/css/basic-ui/custom_sweetalert.css') !!}
{!! Html::style('assets/css/ui-elements/tooltip.css') !!}

<style>
    .service-status.status-icon {
    display: inline-block;
    width: 15px;
    height: 15px;
    border-radius: 50%;
}

.service-status.status-icon.icon1 {
    background-color: #16ca5b
}
.service-status.status-icon.icon0 {
    background-color: rgb(255, 0, 0);
}
</style>
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('backend.All Ads')}}</a></li>
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
                                            {{ __('backend.all permits') }}</h4>

                                    </div>
                                    <div class="col-md-6">
                                
                                        <button type="button" class="btn btn-primary mb-2 mr-2 add" data-toggle="modal"
                                            data-target="#Create">{{ __('backend.add') }}</button>

                                    </div>
                                </div>
                                <div class="table-responsive mb-4">
                                    <div class="action-toolbar">
                                        <form class="hh-form form-inline" action="{{dashboard_url('bulkActions')}}"
                                        data-model="Permits"
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
                                    <table id="last-page-dt" class="table table-hover" >
                                        <thead>
                                            <tr>
                                                <th data-priority="-1" class="hh-checkbox-td">
                                                    <div class="checkbox-inline" style="    z-index: 55555555555555;">
                                                    <div class="checkbox checkbox-success hh-check-all d-none d-md-block ">
                                                        <input id="hh-checkbox-all--my-experience inp-cbx" type="checkbox">
                                                        <label for="hh-checkbox-all--my-experience"><span
                                                                class="d-none">{{__('Check All')}}</span></label>
                                                    </div>
                                                </div>
                                                </th>
                                                <th style="">{{__('backend.ID')}}</th>
                                                <th>{{__('backend.Facility Name')}}</th>
                                                <th>{{__('backend.Permit expiration date')}}</th>
                                                {{-- <th>{{__('Description')}}</th> --}}
                                                <th>{{__('backend.Employee/worker name')}}</th>
                                                <th>{{__('backend.Identification number / Location')}}</th>
                                                <th>{{__('backend.Vehicle plate number')}}</th>
                                                <th>{{__('backend.status permit')}}</th>
                                        
                                                <th  class="no-content">{{__('backend.Settings')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            @foreach ($Permit as $item)
                                         @php
                                        $image=get_ads_cover($item->ads->id);
                         
                                         @endphp
                                            <tr>
                                                <td class="align-middle hh-checkbox-td">
                                                    <div class="checkbox checkbox-success d-none d-md-block">
                                                        <input type="checkbox" name="post_id" value="{{$item->id}}"
                                                               id="hh-check-all-item-{{$item->id}}" class="hh-check-all-item">
                                                        <label for="hh-check-all-item-{{$item->id}}"></label>
                                                    </div>
                                                </td>
                                                <td>{{ $item->refernce_num }}</td>
                                                <td>{{ $item->ads->user->name }}</td>
                                                <td>{{  $item->date_Expired }}</td>
                                                {{-- <td>{{ $item->ads->description }}</td> --}}
                                                <td>{{ $item->emp_name }}</td>
                                                <td>{{ $item->emp_Identification }}</td>
                                                <td>{{ $item->car_number }}</td>
                                                {{-- <td>{{ $item->status }}</td> --}}
                                                <td>
                                                    <div class="service-status  status-icon icon{{ $item->status }}  bs-tooltip"
                                                         data-toggle="tooltip"  data-placement="top" title="{{$item->status=='1'?__('backend.published'):__('backend.pending')}}"
                                                         data-original-title=""><span
                                                            class="exp d-none">{{ $item->status }}</span>
                                                    </div>
                                                </td>
                                               
                                                <?php
                                                $data = [
                                                    'ID' => $item->id,
                                                    'model' => 'Permit'
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
                                                            data-action="/ads/permit_status/"
                                                            data-id="{{ $item->id }}"
                                                            href="javascript:void(0);"
                                                            >{{__('backend.status')}}</a>

                                                            <a class="dropdown-item editCustomer"
                                                            data-action="/ads/permit_get/"
                                                            data-id="{{ $item->id }}"
                                                            href="javascript:void(0);"
                                                            >{{__('backend.Edit')}}</a>

                                                            <a class="dropdown-item confirmDelete"
                                                            data-action="/ads/permitsdelete/"
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
<!-- Main Body Ends -->


<form id="form-Item" action="{{route('permitsCreate')  }}" method="POST" 
enctype="multipart/form-data"
class="form ">
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
                                    aria-describedby="inputGroupPrepend" >
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
                    <input type="hidden" name="refernce_num" value="{{ rand(10 * 45, 100 * 98) }}">
                                <input type="text" class="form-control" value="" name="f_name" id="facility_name" required>
                             </div>
                        </div>
                     </div>
                 
             
                     <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>{{ __('backend.Employee/worker name') }}</label>
                    
                                <input type="text" class="form-control" value="" name="emp_name" id="emp_name" required>
                             </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>{{ __('backend.Identification number / Location') }}</label>
                    
                                <input type="text" class="form-control" value="" name="emp_Identification" id="emp_Identification" required>
                             </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>{{__('backend.Vehicle plate number') }}</label>
                    
                                <input type="text" class="form-control" value="" name="car_number" id="car_number">
                             </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>{{ __('backend.Permit expiration date') }}</label>
                    
                                <input type="date" class="form-control" value="" name="date_Expired" id="date_Expired" required>
                             </div>
                        </div>
                     </div>
                  
                 
                     <div class="row">
                        <div class="col-md-12">
                            <div class="form-group"><label
                                    for="degree2">{{ __('backend.image') }}</label>
                                    <input name="image" id="file" type="file"
                                    data-behaviour="custom-upload-input" value="multiple" onchange="readURL(this);" />
                                <img id="blah" 
                                width= "110px">
                                <input type="hidden" name="ads_id" id="ads_id" value="{{  Request::segment(3) }}">
                            </div>
                        </div>
                    </div>
                   
       
    
                    </div>
    
                </div>
                
                    
                
                <div class="modal-footer md-button" >
        
                    <span class="btn btn-primary " id="createItemFile"
                    {{-- onclick="Createfile(this)" --}}
                     >{{ __('backend.add') }}</span>
                </div>
                
            </div>
        </div>
    </div>
</form>


@endsection

@push('plugin-scripts')
{!! Html::script('plugins/sweetalerts/sweetalert2.min.js') !!}
{!! Html::script('assets/js/basicui/sweet_alerts.js') !!}
{{-- {!! Html::script('assets/js/loader.js') !!} --}}
{!! Html::script('plugins/table/datatable/datatables.js') !!}
<!--  The following JS library files are loaded to use Copy CSV Excel Print Options-->
{!! Html::script('plugins/table/datatable/button-ext/dataTables.buttons.min.js') !!}
{!! Html::script('plugins/table/datatable/button-ext/jszip.min.js') !!}
{!! Html::script('plugins/table/datatable/button-ext/buttons.html5.min.js') !!}
{!! Html::script('plugins/table/datatable/button-ext/buttons.print.min.js') !!}
<!-- The following JS library files are loaded to use PDF Options-->
{!! Html::script('plugins/table/datatable/button-ext/pdfmake.min.js') !!}
{!! Html::script('plugins/table/datatable/button-ext/vfs_fonts.js') !!}

{!! Html::script('assets/js/myJS.js') !!}
@endpush

@push('custom-scripts')
<script>

// $(document).on('click', '#createItemFile', function (ev) {
//         var fd = new FormData();
//         fd.append('file', $('#file').get(0).files[0]);
//         let form = $(this).closest("form").serializeArray();
//         $.each(form, function (key, input) {
//             if (input.name === 'description') {
//                 editor = $(".Editor-editor").html();
//                 fd.append('description', editor);
//             } else {
//             fd.append(input.name, input.value);
                
//             }
           
//         });
   
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//         });
    
//         $.ajax({
//             type: $(this).closest("form").attr('method'),
//             url: $(this).closest("form").attr('action'),
//             data: fd,
//             cache: false,
//             contentType: false,
//             processData: false,
//             success: (data) => {
                
//     console.log(data);
    
//             },
//             error: function (data) {
//                 console.log(data);
//             }
//         });
    


//     });

    $('.delete-item').click(function(){
        var x=$(this);
        let id = x.data('id');
        // Supprimer l'affichage du nom de fichier
        var url = x.data('action')
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

    $('.editCustomer').on('click', function(e) {

        var id = $(this).data('id');
        var action = $(this).data('action');
      

        $.ajax({
        url: action + id,
        type: "get",
        contentType: 'application/json',
        success: function (data) {
    
            if (typeof data === "string") {
               
                var respon = $.parseJSON(data)
                if (typeof respon == 'object') {
                            document.getElementById("alert").innerHTML = respon.message.substring(0, respon.message
                                .length);

                            $('.toast').toast('show');

                            if (respon.redirect) {
                                setTimeout(function () {
                                    window.location.href = respon.redirect;
                                }, 1500);
                            }

                            if (respon.reload) {
                                setTimeout(function () {
                                    window.location.reload();
                                }, 1000);
                            }
                        }
            } else {
            $(document).find('#form-Item').attr('action', '/ads/permit_update/' + data.id);
            $(document).find('#facility_name').val(data.f_name);
            $(document).find('#emp_name').val(data.emp_name);
            $(document).find('#emp_Identification').val(data.emp_Identification);
            $(document).find('#car_number').val(data.car_number);
            $(document).find('#date_Expired').val(data.date_Expired);
            $(document).find('#blah').attr('src','http://tttttttttttt/image/'+data.image);
            $('#Create').modal('show');
            }
        


        },
        error: function (xhr) {}
        });
        })

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
        },
        error: function (xhr) {}
    });
        })

        function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result)
                .width(150);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
</script>

@endpush
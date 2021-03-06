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
    background-color: darkorange;
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
                                <h4 class="table-header">{{__('backend.All Ads')}}</h4>
                                <div class="table-responsive mb-4">
                                    <div class="action-toolbar">
                                        <form class="hh-form form-inline" action="{{dashboard_url('bulkActions')}}"
                                        data-model="Ads"
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
                                                    <div class="checkbox-inline">
                                                    <div class="checkbox checkbox-success hh-check-all d-none d-md-block ">
                                                        <input id="hh-checkbox-all--my-experience inp-cbx" type="checkbox">
                                                        <label for="hh-checkbox-all--my-experience"><span
                                                                class="d-none">{{__('Check All')}}</span></label>
                                                    </div>
                                                </div>
                                                </th>
                                                <th style="">{{__('backend.ID')}}</th>
                                                <th>{{__('backend.Title')}}</th>
                                                <th>{{__('backend.publish Date')}}</th>
                                                {{-- <th>{{__('Description')}}</th> --}}
                                                <th>{{__('backend.publisher')}}</th>
                                                <th>{{__('backend.image')}}</th>
                                                <th>{{__('backend.status')}}</th>
                                                <th>{{__('backend.permits')}}</th>
                                        
                                                <th  class="no-content">{{__('backend.Settings')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            @foreach ($Ads as $item)
                                         @php
                                        $image=get_ads_cover($item->id);
                         
                                         @endphp
                                            <tr>
                                                <td class="align-middle hh-checkbox-td">
                                                    <div class="checkbox checkbox-success d-none d-md-block">
                                                        <input type="checkbox" name="post_id" value="{{$item->id}}"
                                                               id="hh-check-all-item-{{$item->id}}" class="hh-check-all-item">
                                                        <label for="hh-check-all-item-{{$item->id}}"></label>
                                                    </div>
                                                </td>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{  date('Y-m-d', strtotime($item->created_at)) }}</td>
                                                {{-- <td>{{ $item->description }}</td> --}}
                                                <td>{{ $item->user->name }}</td>
                                                <td>
                                                    <img class="imgADS"
                                                    src="{{ isset($image) ? asset('image/'.$image) : url('https://dummyimage.com/1200x900/e0e0e0/c7c7c7.png')}}" alt=""></td>
                                               
                                                    <td>
                                                        <div class="service-status  status-icon icon{{ $item->status }}  bs-tooltip"
                                                             data-toggle="tooltip"  data-placement="top" title="{{$item->status=='1'?__('backend.published'):__('backend.pending')}}"
                                                             data-original-title=""><span
                                                                class="exp d-none">{{ $item->status }}</span>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        {{ get_permits_count($item->id) }}
                                                    </td>
                                               
                                                    <td class="text-center">
                                                        <a class="button1 previous action-button-previous" 
                                                        style="font-size: 16px;color: #009fa7;font-weight: 600;"
                                                        href="{{ route('permitsShow',$item->id) }}">{{__('backend.Show')}}</a>
                                                </td>
                                           
                                            </tr> 
                                            @endforeach
                                     
                                     
                                        </tbody>
                                        {{-- <tfoot>
                                            <tr>
                                                <th>{{__('Title')}}</th>
                                                <th>{{__('Description')}}</th>
                                                <th>{{__('publisher')}}</th>
                                                <th>{{__('image')}}</th>
                                                <th></th>
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
</script>

@endpush
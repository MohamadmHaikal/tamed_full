@extends('layout.master')

@push('plugin-styles')
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
                                        href="javascript:void(0);">{{ __('backend.EmploymentApplications') }}</a>
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
                                                {{ __('backend.EmploymentApplications') }}</h4>

                                        </div>
                                    </div>
                                    <div class="table-responsive mb-4">
                                      
                                        <div class="widget-content widget-content-area text-center">
                                            <div class="button-list">
                                                <a href="{{ route('employment', ['filter' => 'waiting']) }}">
                                                    <button type="button"
                                                        class="btn btn-warning btn-rounded">{{ __('backend.waiting') }}</button>

                                                </a>
                                                <a
                                                    href="{{ route('employment', ['filter' => 'accepted']) }}">
                                                    <button type="button"
                                                        class="btn btn-success btn-rounded">{{ __('backend.Accepted') }}</button>

                                                </a>
                                            
                                                <a
                                                    href="{{ route('employment', ['filter' => 'rejected']) }}">
                                                    <button type="button"
                                                        class="btn btn-danger btn-rounded">{{ __('backend.rejected') }}</button>

                                                </a>

                                            </div>
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
                                                    <th>{{ __('backend.applicant') }}</th> 
                                                    <th>{{ __('backend.status') }}</th>
                                                    <th>{{ __('backend.The date of application') }}</th>
                                                    <th class="no-content">{{ __('backend.Order details') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($employment as $item)
                                                    <tr>
                                                        <td class="align-middle hh-checkbox-td">
                                                            <div class="checkbox checkbox-success d-none d-md-block">
                                                                <input type="checkbox" name="post_id" value="{{$item->id}}"
                                                                       id="hh-check-all-item-{{$item->id}}" class="hh-check-all-item">
                                                                <label for="hh-check-all-item-{{$item->id}}"></label>
                                                            </div>
                                                        </td>
                                                        <td>{{$item->id}}</td>
                                                        <td>{{get_user_by_id($item->from_id)!=null ?get_user_by_id($item->from_id)->name :''}}</td>
                                                        <td style="{{$item->status=="accepted"? 'color:#16ca5b;': ($item->status=="waiting"?'color:darkorange':'color:#e7515a' )}}">{{__('backend.'.$item->status)}}</td>
                                                        <td>{{date('Y-m-d', strtotime($item->created_at))}}</td>
                                                        <td>
                                                            <div class="dropdown custom-dropdown">
                                                                <a class="dropdown-toggle  text-primary EmploymentDetails"
                                                                    href="javascript:void(0);"
                                                                    data-id="{{ $item->id }}">
                                                                    {{ __('backend.Order details') }}
                                                                </a>
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
@endsection

@push('plugin-scripts')
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
        $('#Show').on('show.bs.modal', function(event) {

            var button = $(event.relatedTarget);
            var ModalType = button.data('type')
            var name = button.data('name')
            var userType = button.data('usertype')
            console.log(userType);
            $("#name").prop('disabled', ModalType == null ? false : true);
            $("#type_id").prop('disabled', ModalType == null ? false : true);
            var modal = $(this)
            modal.find('.modal-body #name').val(name)
            modal.find('.modal-body #type_id').val(userType)
        });
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
                "pageLength": 7,
                "order": [[3, 'desc']],
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
    </script>
@endpush

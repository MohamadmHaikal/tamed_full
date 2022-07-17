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
                                        href="javascript:void(0);">{{ __('backend.electronic contracts') }}</a>
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
                                            <h4 class="table-header">{{ __('backend.electronic contracts') }}
                                                {{ __('backend.' . $source) }}</h4>

                                        </div>

                                        <div class="col-md-6">
                                            <a href="{{ route('ElectronicContracts.create') }}">
                                                <button type="button" class="btn btn-primary mb-2 mr-2 add "
                                                    data-toggle="modal"
                                                    data-target="#CreateUser">{{ __('backend.Create a contract') }}</button>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="table-responsive mb-4">
                                        <div class="widget-content widget-content-area text-center">
                                            <div class="button-list">
                                                <a href="{{ route('ElectronicContracts', ['source' => $source]) }}">
                                                    <button type="button"
                                                        class="btn btn-primary btn-rounded">{{ __('backend.All contracts') }}</button></a>
                                                <a
                                                    href="{{ route('ElectronicContracts', ['filter' => 'Accepted', 'source' => $source]) }}"><button
                                                        type="button"
                                                        class="btn btn-success btn-rounded">{{ __('backend.Accepted Contracts') }}</button>
                                                </a>
                                                <a
                                                    href="{{ route('ElectronicContracts', ['filter' => 'waiting', 'source' => $source]) }}">
                                                    <button type="button"
                                                        class="btn btn-warning btn-rounded">{{ __('backend.waiting for signature') }}</button>
                                                </a>
                                                <a
                                                    href="{{ route('ElectronicContracts', ['filter' => 'rejected', 'source' => $source]) }}">
                                                    <button type="button"
                                                        class="btn btn-danger btn-rounded">{{ __('backend.Rejected Contracts') }}</button>
                                                </a>
                                            </div>
                                        </div>
                                        <table id="export-dt" class="table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('backend.contract number') }}</th>
                                                    <th>{{ __('backend.name of company') }}</th>
                                                    <th>{{ __('backend.company type') }}</th>
                                                    <th>{{ __('backend.the amount') }}</th>
                                                    <th>{{ __('backend.Date of contract') }}</th>
                                                    <th>{{ __('backend.status') }}</th>
                                                    <th>{{ __('backend.Invoices') }}</th>
                                                    <th class="no-content">{{ __('backend.Contract details') }}</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($Contracts as $item)
                                                    <tr>
                                                        <td>{{ $item->id }}</td>
                                                        <td>{{ get_user_by_id($item->SParty_id)->name }}</td>
                                                        <td>{{ get_facility_type(get_user_by_id($item->SParty_id)->type_id) }}
                                                        </td>
                                                        <td>{{ $item->amount }}</td>
                                                        <td>{{ date('Y-m-d', strtotime($item->contract_date)) }}</td>
                                                        <td>
                                                            <p class="{{ $item->status }}">
                                                                {{ __('backend.' . $item->status) }}</p>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="Invoices"
                                                                data-id="{{ $item->id }}">
                                                                <button type="button" class="btn btn-soft-info btn-rounded"
                                                                    data-toggle="modal"
                                                                    data-target="#CreateUser">{{ __('backend.Invoices') }}</button>
                                                            </a>
                                                        </td>
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
                                                                    <a class="dropdown-item  text-primary show-contract"
                                                                        href="javascript:void(0);" role="button"
                                                                        data-toggle="dropdown"
                                                                        data-id="{{ $item->id }}" aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                        {{ __('backend.Contract details') }}
                                                                    </a>
                                                                    @if (get_current_user_id() == $item->user_id)
                                                                        <a class="dropdown-item  text-primary"
                                                                            href="{{ route('ElectronicContracts.edit', [$item->id]) }}">
                                                                            {{ __('backend.Edit') }}
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </td>


                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <p class="text-center">{{__('backend.disputes note')}} <a href="{{route('Disputes')}}" style="color:#027496;"> {{__('backend.Dispute Section')}} </a></p>

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
    </script>
@endpush

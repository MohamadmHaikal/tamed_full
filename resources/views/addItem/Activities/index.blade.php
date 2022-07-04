@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
    {!! Html::style('plugins/animate/animate.css') !!}
    {!! Html::style('plugins/notification/snackbar/snackbar.min.css') !!}
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
                                        href="javascript:void(0);">{{ __('backend.Activities') }}</a>
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
                                            <h4 class="table-header">{{ __('backend.Activities') }}</h4>

                                        </div>
                                        <div class="col-md-6">

                                            <button type="button" class="btn btn-primary mb-2 mr-2 add" data-toggle="modal"
                                                data-target="#Create">{{ __('backend.add') }}</button>

                                        </div>
                                    </div>
                                    <div class="table-responsive mb-4">
                                        <table id="last-page-dt" class="table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('backend.id') }}</th>
                                                    <th>{{ __('backend.name of activities') }}</th>
                                                    <th>{{ __('backend.user type') }}</th>

                                                    <th class="no-content"> </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($activities as $activitie)
                                                    <tr>
                                                        <td>{{ $activitie->id }}</td>
                                                        <td>{{ $activitie->activity }}</td>
                                                        <td>{{ $activitie->userType->name }}</td>

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
                                                                    <a class="dropdown-item" href="javascript:void(0);"
                                                                        data-toggle="modal" data-type="show"
                                                                        data-name="{{ $activitie->activity }}"
                                                                        data-usertype="{{ $activitie->userType->name }}"
                                                                        data-target="#Show">{{ __('backend.Show') }}</a>
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('activites.edit', [$activitie->id]) }}">{{ __('backend.Edit') }}</a>

                                                                    <a class="dropdown-item " href="javascript:void(0);"
                                                                        id="{{ $activitie->id }}" onclick="Delete(this)"
                                                                        style="color: red">{{ __('backend.Delete') }}</a>
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
    @include('Common.modal',['onclick'=>'',"type"=>"Show","id"=>"Show","title"=>"Acivity Details"])
    @include('Common.modal', [
          'model' => 'Activitie',
          'action' => 'add-item',
        'type' => 'create',
        'id' => 'Create',
        'title' => 'Add Acivity',
    ])
    <div id="alert">

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

        function Create(element) {
            var name = document.getElementById("name").value;

            var type_id = document.getElementById("type_id").value;
            let _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ route('activites.store') }}",
                type: "post",
                dataType: "json",
                data: {
                    _token: _token,
                    name: name,
                    type_id: type_id
                },
                success: function(data) {

                    document.getElementById("alert").innerHTML = data['message'].substring(0, data['message']
                        .length);

                    $('.toast').toast('show');

                    if (data['reload']) {
                        setTimeout(function() {
                            window.location.reload();
                        }, 1300);

                    }

                },


            });


        }

        function Delete(element) {
            var id = element.getAttribute('id').split(" ");
            var url = '{{ route('activites.delete', ':id') }}';
            url = url.replace(':id', id);
            let _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                data: {
                    _token: _token,

                },
                success: function(data) {

                    document.getElementById("alert").innerHTML = data['message'].substring(0, data['message']
                        .length);

                    $('.toast').toast('show');

                    if (data['reload']) {
                        setTimeout(function() {
                            window.location.reload();
                        }, 1300);

                    }

                },


            });


        }
    </script>
@endpush

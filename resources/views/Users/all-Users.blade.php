@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
    {!! Html::style('plugins/sweetalerts/sweetalert2.min.css') !!}
    {!! Html::style('plugins/sweetalerts/sweetalert.css') !!}
    {!! Html::style('assets/css/basic-ui/custom_sweetalert.css') !!}
    {!! Html::style('assets/css/settings.css') !!}
@endpush


@section('content')
    <?php
    $userType = get_users_type();
    
    ?>
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{request('id')==null? __('backend.individual users'): __('backend.All facilities') }}</a>
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
                                        @if(request('id')==null)
                                           <div class="col-md-6">
                                            <h4 class="table-header">{{ __('backend.individual users') }}</h4>
                                        </div>
                                        <!--<div class="col-md-6">-->
                                        <!--    <button type="button" class="btn btn-primary mb-2 mr-2 add " data-toggle="modal"-->
                                        <!--        data-target="#CreateUser">{{ __('backend.add') }}</button>-->

                                        </div>
                                        @else
                                           <div class="col-md-6">
                                            <h4 class="table-header">{{ __('backend.All facilities') }}</h4>
                                        </div>
                                        @endif
                                     
                                    </div>

                                    <div class="table-responsive mb-4">
                                        <div class="action-toolbar">
                                            <form class="hh-form form-inline" action="{{dashboard_url('bulkActions')}}"
                                            data-model="AuthManger"
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
                                     @if( request('id')!=null)
                                        <div id="hh-options-wrapper" class="hh-options-wrapper">
                                            <div class="hh-options-tab" style="padding-bottom: 0px; margin-right:5%;"
                                                data-tabs-calculation>
                                                <div class="nav nav-pills nav-pills-tab" id="v-pills-tab" role="tablist"
                                                    data-tabs aria-orientation="vertical">

                                                    <?php
                                               $i=0;
                                                foreach ($userType as $key => $section){
                                                $class = (request('filter')==$section['id']) ? 'active show' : '';
                                               
                                                ?>

                                                    <a class="nav-link nav-settings mb-2 {{ $class }}"
                                                        href="{{ route('user.facilities', ['id'=> request('id'),'filter'=>$section['id']]) }}">
                                                        {{ __($section['name']) }}
                                                    </a>
                                                    <?php } ?>

                                                </div>
                                            </div>
                                        </div>
                                        @endif
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
                                                    <th>{{ __('backend.Avatar') }}</th>
                                                    <th>{{ __('backend.name') }}</th>
                                                    <th>{{ __('backend.phone') }}</th>
                                                    <th>{{ __('backend.email') }}</th>
                                                    @if(request('id')!=null)
                                                    <th>{{ __('backend.facility type') }}</th>
                                                    @endif
                                                    <th>{{ __('backend.status') }}</th>
                                                    <th>{{ __('backend.Access') }}</th>
                                                    <th class="no-content"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td class="align-middle hh-checkbox-td">
                                                            <div class="checkbox checkbox-success d-none d-md-block">
                                                                <input type="checkbox" name="post_id" value="{{$user->id}}"
                                                                       id="hh-check-all-item-{{$user->id}}" class="hh-check-all-item">
                                                                <label for="hh-check-all-item-{{$user->id}}"></label>
                                                            </div>
                                                        </td>
                                                        <td>{{ $user->id }}</td>
                                                        <td> <img
                                                                src="{{ $user->logo ? url("image/$user->logo") : url('assets/img/avatar.png') }}"
                                                                alt="image" class="rounded-circle avatar-md">
                                                        </td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->phone }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        @if(request('id')!=null)
                                                        <td>{{ get_facility_type($user->activitie_id)->name }}</td>
                                                        @endif
                                                        <td><p class="{{ $user->status }}1">
                                                                {{ __('backend.'.$user->status) }}</p></td>
                                                           <td> 
                                                           <form method="POST"
                                                               action="{{ route('facil_login') }}">
                                                                 @csrf
                                                            <input type="text" name="id"
                                                            value=" {{ $user->id }}" hidden>
                                                            <button type="submit" class="btn btn-soft-info btn-rounded">{{ __('backend.Access') }}</button>
                                                                                              
                                                                                 
                                                       </form>   
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
                                                                    <a class="dropdown-item show-user"
                                                                        data-id="{{ $user->id }}"
                                                                        href="javascript:void(0);">{{ __('backend.Show') }}</a>
                                                                    <a class="dropdown-item edit-user"
                                                                        data-id="{{ $user->id }}"
                                                                        href="javascript:void(0);">{{ __('backend.Edit') }}</a>
                                                                    <a class="dropdown-item confirmDelete"
                                                                        data-id="{{ $user->id }}" data-action="/users/delete/"
                                                                        href="javascript:void(0);"
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
    <div class="modal fade" id="CreateUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('backend.userInfo') }}</h5> <button
                        type="button" class="close" data-dismiss="modal" aria-label="Close"><i
                            class="las la-times"></i> </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label for="degree2">{{ __('backend.name') }}</label><input
                                    type="text" id="user-name" name="user-name" class="form-control mb-4"> </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label for="degree2">{{ __('backend.phone') }}</label><input
                                    type="text" id="user-phone" name="user-phone" class="form-control mb-4">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label for="degree2">{{ __('backend.email') }}</label><input
                                    type="text" id="user-email" name="user-email" class="form-control mb-4">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label for="degree2">{{ __('backend.user type') }}</label>
                                <select class="form-control" name="facility_type_c" id="facility_type_c">
                                    <option></option>
                                    @foreach ($userType as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label
                                    class="fieldlabels">{{ __('backend.name of activities') }}
                                </label>
                                <select class="form-control" id="Activities_type_c" name="Activities_type_c">

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"><button type="button" id="create_user"
                        class="btn btn-primary">{{ __('backend.save') }}</button>
                </div>
            </div>
        </div>
    </div>
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
    {!! Html::script('plugins/sweetalerts/promise-polyfill.js') !!}
    {!! Html::script('plugins/sweetalerts/sweetalert2.min.js') !!}
    {!! Html::script('assets/js/basicui/sweet_alerts.js') !!}
    {!! Html::script('assets/js/option.js') !!}
    {!! Html::script('assets/js/dashboard.js') !!}
    {!! Html::script('assets/js/global.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('assets/js/myJS.js') !!}

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
                "pageLength": 6
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
                "pageLength": 20
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

@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
    {!! Html::style('assets/css/loader.css') !!}
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
                                        href="javascript:void(0);">{{ __('backend.Create a new ticket') }}</a>
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


                                <div class="widget-content widget-content-area br-6 ">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="table-header">{{ __('backend.Create a new ticket') }}</h4>

                                        </div>

                                    </div>
                                    <form action="{{ route('Support.store') }}" method="POST" class="needs-validation"
                                        novalidate>
                                        @csrf

                                    
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Ticket title') }}</label><input
                                                        type="text" name="title" class="form-control "
                                                        aria-describedby="inputGroupPrepend" required>

                                                    <div class="invalid-feedback">
                                                        {{ __('backend.Ticket title required') }}
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Ticket type') }}</label>
                                                        <!--<input-->
                                                        <!--type="text" name="type" class="form-control "-->
                                                        <!--aria-describedby="inputGroupPrepend" required>-->
                                                        <select
                                                        name="type" class="form-control "
                                                        aria-describedby="inputGroupPrepend" required>
                                                        <option value="Service problem">
                                                            {{ __('backend.Service problem') }}</option>
                                                        <option value="complaint">{{ __('backend.complaint') }}</option>
                                                          <option value="Payment problem">
                                                            {{ __('backend.Payment problem') }}</option>
                                                              <option value="sales">
                                                            {{ __('backend.sales') }}</option>
                                                              <option value="Technical support">
                                                            {{ __('backend.Technical support') }}</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        {{ __('backend.Ticket type is required') }}
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <!--<div class="row">-->
                                        <!--    <div class="col-md-6">-->
                                        <!--        <div class="form-group"><label-->
                                        <!--                for="degree2">{{ __('backend.description') }}</label>-->
                                        <!--            <textarea type="text" name="description" class="form-control " maxlength="100" row="3"-->
                                        <!--                aria-describedby="inputGroupPrepend" required></textarea>-->
                                        <!--            <div class="invalid-feedback">-->
                                        <!--                {{ __('backend.Description required') }}-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->

                                        <button type="submit" class="btn btn-primary"
                                            style="margin-right: 85%;">{{ __('backend.add') }}</button>
                                    </form>
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
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                            if ($('[name="Contract_file"]').val() != null) {

                                document.getElementById("alert").innerHTML =
                                    '<div style="position:fixed; bottom: 15px; right: 0;z-index: 9999; margin-left: 20px; margin-right: 20px;"> <div class="toast toast-danger fade hide" role="alert" data-delay="2000" aria-live="assertive"  aria-atomic="true"><div class="toast-header-danger"> <strong class="mr-auto" id="mr-auto">' +
                                    window.translation.systemMessages +
                                    '</strong><button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button></div> <div class="toast-body" id="toast-body">' +
                                    window.translation.AttachedRequired + '</div></div></div>';
                                $('.toast').toast('show');
                            } else {
                                document.getElementById("alert").innerHTML =
                                    '<div style="position:fixed; bottom: 15px; right: 0;z-index: 9999; margin-left: 20px; margin-right: 20px;"> <div class="toast toast-danger fade hide" role="alert" data-delay="2000" aria-live="assertive"  aria-atomic="true"><div class="toast-header-danger"> <strong class="mr-auto" id="mr-auto">' +
                                    window.translation.systemMessages +
                                    '</strong><button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button></div> <div class="toast-body" id="toast-body">' +
                                    window.translation.AllRequired + '</div></div></div>';
                                $('.toast').toast('show');
                            }
                        } else {

                            document.getElementById("alert").innerHTML =
                                '<div style="position:fixed; bottom: 15px; right: 0;z-index: 9999; margin-left: 20px; margin-right: 20px;"> <div class="toast toast-success fade hide" role="alert" data-delay="2000" aria-live="assertive"  aria-atomic="true"><div class="toast-header-success"> <strong class="mr-auto" id="mr-auto">' +
                                window.translation.systemMessages +
                                '</strong><button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button></div> <div class="toast-body" id="toast-body">' +
                                window.translation.TicketCreatedSuccessfully + '</div></div></div>';
                            $('.toast').toast('show');
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
@endpush

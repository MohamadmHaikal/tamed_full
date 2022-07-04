@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
    {!! Html::style('plugins/notification/snackbar/snackbar.min.css') !!}
    {!! Html::style('assets/css/ui-elements/buttons.css') !!}
    {!! Html::style('assets/css/forms/checkbox-theme.css') !!}
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
                                        href="javascript:void(0);">{{ __('backend.add invoice') }}</a>
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

                        <form
                            action="{{ request('id') != null ? route('eBills.store', [request('id')]) : route('eBills.store') }}"
                            method="POST" class="needs-validation" novalidate>
                            @csrf
                            <div class="row layout-top-spacing date-table-container">
                                <!-- Datatable go to last page -->


                                <div class="col-xl-6 col-lg-6 col-sm-6  layout-spacing">


                                    <div class="widget-content widget-content-area br-6">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="table-header">{{ __('backend.add invoice') }}</h4>

                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Invoice type') }}</label>
                                                    <select id="invice_type" name="invice_type" onchange="myFunction()"
                                                        class="form-control mb-4">
                                                        <option value="Tax bill">{{ __('backend.Tax bill') }}</option>
                                                        <option value="simplified tax invoice">
                                                            {{ __('backend.simplified tax invoice') }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.purchases or sales') }}</label>
                                                    <select name="type" class="form-control mb-4">
                                                        <option value="sales bill">{{ __('backend.sales bill') }}
                                                        </option>
                                                        <option value="Purchases bill">{{ __('backend.Purchases bill') }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Invoice date') }}</label><input
                                                        type="date" name="Invoice_date" class="form-control "
                                                        aria-describedby="inputGroupPrepend" required>
                                                    <div class="invalid-feedback">
                                                        {{ __('backend.Invoice date required') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.date of supply') }}</label><input
                                                        type="date" name="date_supply" class="form-control "
                                                        aria-describedby="inputGroupPrepend" required>
                                                    <div class="invalid-feedback">
                                                        {{ __('backend.Delivery date required') }}
                                                    </div>
                                                </div>
                                            </div>
                                          
                                        </div>
                                        <hr class="rounded" style=" border-top: 2.5px solid #e5eaff; ">
                                        <div class="clientInfo">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label
                                                            for="degree2">{{ __('backend.customer name') }}</label><input
                                                            type="text" name="customer_name" class="form-control "
                                                            aria-describedby="inputGroupPrepend" required>
                                                        <div class="invalid-feedback">
                                                            {{ __('backend.Customer name is required') }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label
                                                            for="degree2">{{ __('backend.address') }}</label><input
                                                            type="text" name="address" class="form-control"
                                                            aria-describedby="inputGroupPrepend" required>
                                                        <div class="invalid-feedback">
                                                            {{ __('backend.Address is required') }}
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label
                                                            for="degree2">{{ __('backend.Tax Number') }}</label><input
                                                            type="text" name="Tax_Number" class="form-control"
                                                            aria-describedby="inputGroupPrepend" required>
                                                        <div class="invalid-feedback">
                                                            {{ __('backend.Tax number is required') }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label
                                                            for="degree2">{{ __('backend.responsible') }}</label><input
                                                            type="text" name="responsible" class="form-control "
                                                            aria-describedby="inputGroupPrepend" required>
                                                        <div class="invalid-feedback">
                                                            {{ __('backend.Responsible Name Required') }}
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label
                                                            for="degree2">{{ __('backend.phone') }}</label><input
                                                            type="text" name="phone" class="form-control"
                                                            aria-describedby="inputGroupPrepend" required>
                                                        <div class="invalid-feedback">
                                                            {{ __('backend.Mobile number is required') }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label
                                                            for="degree2">{{ __('backend.email') }}</label><input
                                                            type="text" name="email" class="form-control"
                                                            aria-describedby="inputGroupPrepend" required>
                                                        <div class="invalid-feedback">
                                                            {{ __('backend.Email is required') }}
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <hr class="rounded" style=" border-top: 2.5px solid #e5eaff;">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Bank name') }}</label>
                                                    <br>
                                                    {{-- <select name="Banks[]" class="form-control" aria-describedby="inputGroupPrepend" required  multiple>
                                                       @foreach ($banks as $bank)
                                                       <option value="{{$bank->id}}">{{$bank->bank_name}}</option>
                                                       @endforeach
                                                    </select> --}}
                                                    <?php
                                                    $i = 0;
                                                    ?>
                                                    <div class="  checkbox-inline checkbox-group required">
                                                        @foreach ($banks as $bank)
                                                            <?php
                                                            $i++;
                                                            ?>
                                                            <label class="checkbox" style="margin-right:0;">
                                                                <input type="checkbox" name="bank[{{ $i }}]"
                                                                    value="{{ $bank->id }}">
                                                                <span></span>{{ $bank->bank_name }}</label>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        <button type="submit" class="btn btn-info btn-rounded "
                                            style="    margin-right: 80%;">{{ __('backend.add') }}</button>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-sm-6  layout-spacing" id="product_card">


                                    <div class="widget-content widget-content-area br-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="table-header">{{ __('backend.product or service') }}</h4>

                                            </div>
                                            <div class="col-md-6">

                                                <button type="button" class="btn btn-info font-12" id="add_product"
                                                    data-id="1" style="    margin-right: 60%;"><i
                                                        class="las la-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.name of Service') }}</label><input
                                                        type="text" name="product_name[1]" class="form-control "
                                                        aria-describedby="inputGroupPrepend" required>
                                                    <div class="invalid-feedback">
                                                        {{ __('backend.Service name is required') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Quantity') }}</label><input
                                                        type="text" name="Quantity[1]" class="form-control "
                                                        aria-describedby="inputGroupPrepend" required>
                                                    <div class="invalid-feedback">
                                                        {{ __('backend.Quantity required') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Price') }}</label><input type="text"
                                                        name="Price[1]" class="form-control "
                                                        aria-describedby="inputGroupPrepend" required>
                                                    <div class="invalid-feedback">
                                                        {{ __('backend.price required') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Discount') }}</label><input
                                                        type="text" name="Discount[1]" class="form-control " value="0"
                                                        aria-describedby="inputGroupPrepend" required>

                                                    <div class="invalid-feedback">
                                                        {{ __('backend.Discount required') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Discount type') }}</label><select
                                                        name="Discount_type[1]" class="form-control mb-4">
                                                        <option value="1">{{ __('backend.Fixed value') }}</option>
                                                        <option value="2">{{ __('backend.percent') }}</option>
                                                    </select>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Tax') }}</label><input type="text"
                                                        name="Tax[1]" class="form-control" value="15"
                                                        aria-describedby="inputGroupPrepend" required>
                                                    <div class="invalid-feedback">
                                                        {{ __('backend.tax required') }}
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </form>
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
                        }
                        if ($('div.checkbox-group.required :checkbox:checked').length == 0) {
                            event.preventDefault()
                            event.stopPropagation()
                            document.getElementById("alert").innerHTML =
                                '<div style="position:fixed; bottom: 15px; right: 0;z-index: 9999; margin-left: 20px; margin-right: 20px;"> <div class="toast toast-danger fade hide" role="alert" data-delay="2000" aria-live="assertive"  aria-atomic="true"><div class="toast-header-danger"> <strong class="mr-auto" id="mr-auto">' +
                                window.translation.systemMessages +
                                '</strong><button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button></div> <div class="toast-body" id="toast-body">' +
                                window.translation.Atleast + '</div></div></div>';
                            $('.toast').toast('show');
                        }

                        form.classList.add('was-validated')

                    }, false)
                })
        })()
    </script>
@endpush
@push('custom-scripts')
    <script>
        function myFunction() {
            var x = document.getElementById("invice_type").value;
            if (x == "simplified tax invoice") {
                $('.clientInfo').html("");

            } else {
                $('.clientInfo').append(
                    '<div class="row"><div class="col-md-6"> <div class="form-group"><label  for="degree2">' + window
                    .translation.customername +
                    '</label><input  type="text" name="customer_name" class="form-control " aria-describedby="inputGroupPrepend" required>  <div class="invalid-feedback"> ' +
                    window.translation.Customerrequired +
                    ' </div>  </div> </div> <div class="col-md-6"> <div class="form-group"><label for="degree2">' +
                    window.translation.address +
                    '</label><input type="text" name="address" class="form-control"  aria-describedby="inputGroupPrepend" required> <div class="invalid-feedback">' +
                    window.translation.Addressrequired +
                    ' </div> </div> </div> </div><div class="row"><div class="col-md-6">  <div class="form-group"><label  for="degree2">' +
                    window.translation.TaxNumber +
                    '</label><input type="text" name="Tax_Number" class="form-control" aria-describedby="inputGroupPrepend" required>  <div class="invalid-feedback">  ' +
                    window.translation.Taxrequired +
                    ' </div> </div></div> <div class="col-md-6"><div class="form-group"><label for="degree2">' + window
                    .translation.responsible +
                    '</label><input type="text" name="responsible" class="form-control " aria-describedby="inputGroupPrepend" required> <div class="invalid-feedback">  ' +
                    window.translation.Responsiblerequired +
                    ' </div> </div></div></div>  <div class="row"> <div class="col-md-6"> <div class="form-group"><label for="degree2">' +
                    window.translation.phone +
                    '</label><input type="text" name="phone" class="form-control" aria-describedby="inputGroupPrepend" required><div class="invalid-feedback"> ' +
                    window.translation.Mobilerequired +
                    '</div> </div> </div><div class="col-md-6"> <div class="form-group"><label for="degree2">' + window
                    .translation.email +
                    '</label><input  type="text" name="email" class="form-control" aria-describedby="inputGroupPrepend" required> <div class="invalid-feedback">' +
                    window.translation.Emailrequired +
                    '</div> </div> </div> </div>  <hr class="rounded" style=" border-top: 2.5px solid #e5eaff;">');


            }
        }
    </script>
@endpush

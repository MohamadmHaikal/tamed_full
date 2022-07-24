@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
    {!! Html::style('plugins/notification/snackbar/snackbar.min.css') !!}
    {!! Html::style('assets/css/ui-elements/buttons.css') !!}
    {!! Html::style('assets/css/forms/checkbox-theme.css') !!}
    {!! Html::style('plugins/flatpickr/flatpickr.css') !!}
    {!! Html::style('plugins/flatpickr/custom-flatpickr.css') !!}
    <style>
        .form-group label,
        label {
            font-size: 14px;
            color: #666666;
            letter-spacing: 0px;
            padding-right: 20px;
        }

        ::placeholder {
            text-align: center;
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
                                <li class="breadcrumb-item"><a
                                        href="javascript:void(0);">{{ __('backend.add extract') }}</a>
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
                                                <h4 class="table-header">{{ __('backend.add extract') }}</h4>

                                            </div>

                                        </div>
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Abstract title') }}</label><input
                                                        type="text" name="title" class="form-control "
                                                        aria-describedby="inputGroupPrepend" required>
                                                    <div class="invalid-feedback">
                                                        {{ __('backend.Abstract title is required') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Period') }}</label>
                                                    <input id="rangeCalendarFlatpickr"
                                                        class="form-control flatpickr flatpickr-input active" type="text"
                                                        name="Period" value="{{ request()->date }}"aria-describedby="inputGroupPrepend"
                                                        placeholder="{{ __('backend.Select the period') }}" required>

                                                    <div class="invalid-feedback">
                                                        {{ __('backend.Abstract title is required') }}
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


                                        <button type="submit" class="btn btn-info btn-rounded "
                                            style="    margin-right: 80%;">{{ __('backend.add') }}</button>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-sm-6  layout-spacing" id="product_card">


                                    <div class="widget-content widget-content-area br-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="table-header">{{ __('backend.clause') }}</h4>

                                            </div>
                                            <div class="col-md-6">

                                                <button type="button" class="btn btn-info font-12" id="add_clause"
                                                    data-id="1" style="    margin-right: 60%;"><i
                                                        class="las la-plus"></i></button>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Statement') }}</label><input
                                                        type="text" name="Statement[1]" class="form-control "
                                                        id="Statement" aria-describedby="inputGroupPrepend" required>
                                                    <div class="invalid-feedback">
                                                        {{ __('backend.Statement is required') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Unit') }}</label><input
                                                        type="text" name="Unit[1]" class="form-control "
                                                        id="Unit" aria-describedby="inputGroupPrepend" required>
                                                    <div class="invalid-feedback">
                                                        {{ __('backend.Unit required') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.unit price') }}</label><input
                                                        type="number" name="UnitPrice[1]" class="form-control "
                                                        id="UnitPrice" aria-describedby="inputGroupPrepend" required>
                                                    <div class="invalid-feedback">
                                                        {{ __('backend.Unit price required') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Contract quantity') }}</label><input
                                                        type="number" name="ContractQuantity[1]" class="form-control "
                                                        id="ContractQuantity" aria-describedby="inputGroupPrepend"
                                                        required>
                                                    <div class="invalid-feedback">
                                                        {{ __('backend.Contract quantity is required') }}
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Previously executed quantity') }}</label><input
                                                        type="number" name="PreviouslyQuantity[1]" class="form-control "
                                                        aria-describedby="inputGroupPrepend"
                                                        placeholder="{{ __('backend.previously') }}" required>

                                                    <div class="invalid-feedback">
                                                        {{ __('backend.Previously executed quantity required') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Quantity currently executed') }}</label><input
                                                        type="number" name="CurrentlyQuantity[1]" class="form-control "
                                                        placeholder="{{ __('backend.Currently') }}"
                                                        aria-describedby="inputGroupPrepend" required>

                                                    <div class="invalid-feedback">
                                                        {{ __('backend.Quantity currently executed required') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.The ratio') }}</label><input
                                                        type="number" name="ratio[1]" class="form-control "
                                                        aria-describedby="inputGroupPrepend" required>

                                                    <div class="invalid-feedback">
                                                        {{ __('backend.The ratio required') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.nots') }}</label>
                                                    <textarea class="form-control" data-error="#Errordescription" name="nots[1]" rows="3" dir="rtl">        </textarea>

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
    {!! Html::script('plugins/apex/apexcharts.min.js') !!}
    {!! Html::script('plugins/flatpickr/flatpickr.js') !!}
    {!! Html::script('assets/js/dashboard/dashboard_2.js') !!}
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
                document.getElementById("type_countainer").style.display = 'none';
                $('.clientInfo').html("");

            } else {
                document.getElementById("type_countainer").style.display = 'block';
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

        function myFunction1() {
            var x = document.getElementById("type_type").value;
            if (x == "short invoice") {
                document.getElementById("product_card").style.display = 'none';
                $('.clientInfo').html(
                    `<div class="row"><div class="col-md-12"> <div class="form-group"><label  for="degree2">` + window
                    .translation.note +
                    `
                    </label><input  type="text" name="note" class="form-control " aria-describedby="inputGroupPrepend" required>  <div class="invalid-feedback">` +
                    window.translation.NoteRequired +
                    ` </div>  </div> </div>

                    <div class="col-md-6"> <div class="form-group"><label  for="degree2">` + window
                    .translation.discountValue +
                    `
                    </label><input  type="text" name="discountValue" class="form-control " aria-describedby="inputGroupPrepend" required>  <div class="invalid-feedback">` +
                    window.translation.RequiredDiscountAmount +
                    ` </div>  </div> </div>

                    <div class="col-md-6"> <div class="form-group"><label  for="degree2">` + window
                    .translation.DiscountType + `
                    </label><select name="DiscountType" class="form-control mb-4">
                    <option value="1">{{ __('backend.Fixed value') }}</option>
                    <option value="2">{{ __('backend.percent') }}</option></select>` +

                    ` </div>  </div>

                    <div class="col-md-6"> <div class="form-group"><label  for="degree2">` + window
                    .translation.Tax +
                    `
                    </label><input  type="text" name="Tax" value="15" class="form-control " aria-describedby="inputGroupPrepend" required>  <div class="invalid-feedback">` +
                    window.translation.taxRequire +
                    ` </div>  </div> </div>

                    <div class="col-md-6"> <div class="form-group"><label  for="degree2">` + window
                    .translation.Total +
                    `
                    </label><input  type="text" name="Total" class="form-control " aria-describedby="inputGroupPrepend" required>  <div class="invalid-feedback">` +
                    window.translation.TotalRequired +
                    ` </div>  </div> </div>
                    <div class="col-md-6">  <div class="form-group"><label  for="degree2">` +
                    window.translation.TaxNumber +
                    `</label><input type="text" name="Tax_Number" class="form-control" aria-describedby="inputGroupPrepend" required>  <div class="invalid-feedback">  ` +
                    window.translation.Taxrequired +
                    ` </div> </div></div>
                    <div class="col-md-6"> <div class="form-group"><label  for="degree2">` + window
                    .translation.customername +
                    `
                    </label><input  type="text" name="customer_name" class="form-control " aria-describedby="inputGroupPrepend" required>  <div class="invalid-feedback"> ` +
                    window.translation.Customerrequired +
                    ` </div>  </div> </div>
                    </div>`
                );
                $("#product_card input").prop('required', false);

            } else {

                $("#product_card #Price").prop('required', true);
                $("#product_card #Quantity").prop('required', true);
                $("#product_card #product_name").prop('required', true);
                document.getElementById("product_card").style.display = 'block';
                $('.clientInfo').html(
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

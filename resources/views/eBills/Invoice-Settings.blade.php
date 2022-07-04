@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
    {!! Html::style('plugins/notification/snackbar/snackbar.min.css') !!}
    {!! Html::style('assets/css/ui-elements/buttons.css') !!}
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('plugins/dropify/dropify.min.css') !!}
    {!! Html::style('assets/css/pages/profile_edit.css') !!}
    {!! Html::style('assets/css/forms/form-widgets.css') !!}
    {!! Html::style('assets/css/forms/file-upload.css') !!}
    {!! Html::style('plugins/flatpickr/flatpickr.css') !!}
    {!! Html::style('plugins/flatpickr/custom-flatpickr.css') !!}
@endpush

@section('content')
    <?php
    $user = get_current_user_data();
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
                                <li class="breadcrumb-item"><a
                                        href="javascript:void(0);">{{ __('backend.Invoice Settings') }}</a>
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
                                            <h4 class="table-header">{{ __('backend.Invoice Settings') }}</h4>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class=" text-center img-thumbnail">
                                                <input type="file" id="invoice-logo" class="dropify"
                                                    data-default-file="{{ url("image/$user->invoiceLogo") }}"
                                                    data-max-file-size="2M" name="invoice-logo" />
                                                <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>
                                                    {{ __('backend.Company logo') }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class=" text-center img-thumbnail">
                                                <input type="file" id="invoice-signature" class="dropify"
                                                    data-default-file="{{ url("image/$user->Signature") }}"
                                                    data-max-file-size="2M" name="invoice-Signature" />
                                                <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>
                                                    {{ __('backend.Signature') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-center mt-4">
                                        {{ __('backend.To amend the commercial register and invoice numbers') }} <a href="{{route('profile')}}" target="_blank" style="color: #027496;">{{__('backend.Press here')}}</a></p>
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
    {!! Html::script('assets/js/myJS.js') !!}
    {!! Html::script('plugins/dropify/dropify.min.js') !!}
    {!! Html::script('plugins/flatpickr/flatpickr.js') !!}
    {!! Html::script('plugins/flatpickr/custom-flatpickr.js') !!}
@endpush


@push('custom-scripts')
    <script>
        jQuery(document).ready(function($) {
            "use strict";
            $('.dropify').dropify({
                messages: {
                    'default': 'Click to Upload or Drag n Drop',
                    'remove': '<i class="flaticon-close-fill"></i>',
                    'replace': 'Upload or Drag n Drop'
                }
            });
        });
    </script>
@endpush

@push('custom-scripts')
@endpush

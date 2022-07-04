@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
    {!! Html::style('plugins/notification/snackbar/snackbar.min.css') !!}
    {!! Html::style('assets/css/ui-elements/buttons.css') !!}
    {!! Html::style('assets/css/loader.css') !!}
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('backend.eBills') }}</a>
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


                                <div class="widget-content widget-content-area br-6"
                                    style="padding-left: 10%;padding-right:10%;">

                                    {{-- <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="table-header">{{ __('backend.eBills') }}</h4>

                                        </div>
                                    </div> --}}
                                    <div class="card col-12 text-white   text-center d-flex justify-content-center " style="padding-bottom: 10px; background-color: #027496; border-radius: 25px;
                                        ">
                                        <div class="card-header"
                                            style="background-color: #027496; border-color: #027496">
                                            <h4 class="mb-0 text-white">
                                                {{ __('backend.Welcome to the electronic billing service') }}</h4>
                                        </div>
                                        <div class="card-body bg-white"
                                            style="border-radius: 25px;margin: 35px 35px 35px 35px;">

                                            <p class="card-text text-dark" style="line-height: 50px;">
                                                {{ __('backend.To ensure optimal enjoyment of the electronic billing service, please follow the following steps:') }}
                                            </p>
                                            <div class="d-flex justify-content-center">
                                                <ul class="text-dark text-left ">


                                                    <li>{{ __('backend.Add bank accounts') }}</li>
                                                    <li>{{ __('backend.Add billing settings') }}</li>
                                                    <li>{{ __('backend.Complete personal information') }}</li>
                                                    <li>{{ __('backend.Subscribe to the electronic billing package') }}
                                                    </li>
                                                </ul>
                                            </div>
                                            {{-- <a href="{{ route('bank') }}" class="btn btn-outline-success" type="button">
                                                {{ __('backend.Add bank accounts') }}</a>
                                            <a href="{{ route('eBills.settings') }}" class="btn btn-outline-warning"
                                                type="button">{{ __('backend.Add billing settings') }}</a> --}}
                                            <a href="{{ route('eBills.subscribe') }}" class="btn btn-success btn-rounded" type="button">
                                                {{ __('backend.Subscribe now for free') }}</a>
                                            {{-- <a href="{{route('eBills.subscribe')}}" class="btn btn-outline-info" type="button">
                                                {{ __('backend.to subscribe') }}</a> --}}
                                        </div>
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

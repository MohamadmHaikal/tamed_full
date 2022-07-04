@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/ui-elements/pagination.css') !!}
    {!! Html::style('assets/css/pages/notifications.css') !!}
    {!! Html::style('assets/css/forms/switch-theme.css') !!}
    {!! Html::style('assets/css/settings.css') !!}
    {!! Html::style('plugins/notification/snackbar/snackbar.min.css') !!}
    {!! Html::style('assets/css/forms/form-widgets.css') !!}
    {{-- {!! Html::style('assets/css/forms/custom-switch.css') !!} --}}
@endpush

@section('content')
    <!--  Navbar Starts / Breadcrumb Area Starts -->
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

                                <li class="breadcrumb-item active" aria-current="page">
                                    <span>{{ __('backend.Settings') }}</span>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area Ends -->
    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="apps-ticket col-xl-12 col-lg-12 col-md-12">
                <div class="row">
                    <div class="col-xl-12 col-md-12 layout-spacing">
                        <div class="notifications-table-widget">
                            <div class="widget-heading">
                                <h5 class="">{{ __('backend.Settings') }}</h5>

                            </div>
                            <div class="widget-content" style="background-color: white">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card-box" style="padding: 20px 30px; margin-bottom:0px">
                                            {!! \ThemeOptions::renderOption() !!}
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
            {!! Html::script('assets/js/option.js') !!}
            {!! Html::script('assets/js/dashboard.js') !!}
            {!! Html::script('assets/js/global.js') !!}
            {{-- {!! Html::script('assets/js/vendor.min.js') !!} --}}
            {!! Html::script('plugins/notification/snackbar/snackbar.min.js') !!}
            {!! Html::script('assets/js/basicui/notifications.js') !!}
        @endpush

        @push('custom-scripts')
        @endpush

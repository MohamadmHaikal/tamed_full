@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('plugins/apex/apexcharts.css') !!}
    {!! Html::style('assets/css/dashboard/dashboard_1.css') !!}
    {!! Html::style('plugins/flatpickr/flatpickr.css') !!}
    {!! Html::style('plugins/flatpickr/custom-flatpickr.css') !!}
    {!! Html::style('assets/css/elements/tooltip.css') !!}
@endpush

@section('content')
    <?php
    $user = get_current_user_data();
    $year = date('Y');
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">
                                        {{ __('backend.dashboard') }}</a>
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
        <div class="row layout-top-spacing">
            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <a class="widget quick-category">
                    <div class="quick-category-head">
                        <span class="quick-category-icon qc-primary rounded-circle">
                            <i class="las la-shopping-cart"></i>
                        </span>

                    </div>
                    <div class="quick-category-content">
                        <h3> {{ Paid() }}</h3>
                        <p class="font-17 text-primary mb-0"> {{ __('backend.Purchases') }}</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <a class="widget quick-category">
                    <div class="quick-category-head">
                        <span class="quick-category-icon qc-secondary rounded-circle">
                            <i class="las la-hand-holding-usd"></i>
                        </span>

                    </div>
                    <div class="quick-category-content">
                        <h3> {{ Received() }}</h3>
                        <p class="font-17 text-secondary mb-0"> {{ __('backend.sales') }}</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <a class="widget quick-category">
                    <div class="quick-category-head">
                        <span class="quick-category-icon qc-warning rounded-circle">
                            <i class="las la-wallet"></i>
                        </span>

                    </div>
                    <div class="quick-category-content">
                        <h3> {{ $user->wallet_balance }} {{ __('backend.Rial') }}</h3>
                        <p class="font-17 text-warning mb-0"> {{ __('backend.wallet balance') }}</p>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <a class="widget quick-category">
                    <div class="quick-category-head">
                        <span class="quick-category-icon qc-success-teal rounded-circle">
                            <i class="las la-user-plus"></i>
                        </span>

                    </div>
                    <div class="quick-category-content">
                        <h3> {{ $customerNumber }}</h3>
                        <p class="font-17 text-success-teal mb-0"> {{ __('backend.Number of clients') }}</p>
                    </div>
                </a>
            </div>
            {{-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing ">
                <div class="widget widget-chart-one">
                    <div class="widget-heading">
                        <h5 class=""> {{ __('Weather Report') }}</h5>
                        <h6 class="pt-1"> {{ __('Sydney, Australia') }}</h6>
                    </div>
                    <div class="widget-content">
                        <div class="monthly-weather-report">
                            <div class="d-sm-flex d-block justify-content-between mb-4">
                            </div>
                            <div class="row weather-report-container justify-content-between">
                                <div class="col-xl-4 col-md-5">
                                    <div
                                        class="tempareture-box-2 d-flex justify-content-sm-center justify-content-between mb-4 mb-sm-0">
                                        <div class="tempareture-box-icon">
                                            <i class="las la-sun slow-spin text-warning font-135"></i>
                                        </div>
                                        <div class="tempareture-box-content text-center ml-4">
                                            <div class="temp-top">
                                                <span class="font-65 text-warning">18°C</span>
                                            </div>
                                            <div class="temp-bottom">
                                                <a> {{ __('Yesterday - ') }}<span
                                                        class="temp-1 strong text-primary">24°C</span></a>
                                                <a> {{ __('Tomorrow -') }} <span
                                                        class="temp-2 strong text-primary">22°C</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="row monthly-weather-report-inner">
                                        <div class="col-sm-4 col-6">
                                            <div class="media pt-3 align-items-center pb-3">
                                                <span class="mr-3 text-warning font-45">
                                                    <i class="las la-sun"></i>
                                                </span>
                                                <div class="media-body">
                                                    <h5> {{ __('Warm') }}</h5>
                                                    <p> {{ __('Clear') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-6">
                                            <div class="media pt-3 align-items-center pb-3">
                                                <span class="mr-3 text-black font-45">
                                                    <i class="las la-moon"></i>
                                                </span>
                                                <div class="media-body">
                                                    <h5> {{ __('Night') }}</h5>
                                                    <p> {{ __('Pleasant') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-6">
                                            <div class="media pt-3 align-items-center pb-3">
                                                <span class="mr-3 text-info font-45">
                                                    <i class="las la-cloud-rain"></i>
                                                </span>
                                                <div class="media-body">
                                                    <h5> {{ __('Cloudy') }}</h5>
                                                    <p> {{ __('Raining') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-6">
                                            <div class="media pt-3 align-items-center pb-3">
                                                <span class="mr-3 text-info font-45">
                                                    <i class="las la-tint"></i>
                                                </span>
                                                <div class="media-body">
                                                    <h5> {{ __('58%') }}</h5>
                                                    <p> {{ __('Humidity') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-6">
                                            <div class="media pt-3 align-items-center pb-3">
                                                <span class="mr-3 text-dpink font-45">
                                                    <i class="las la-wind"></i>
                                                </span>
                                                <div class="media-body">
                                                    <h5> {{ __('17 mph') }}</h5>
                                                    <p> {{ __('Wind Speed') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-6">
                                            <div class="media pt-3 align-items-center pb-3">
                                                <span class="mr-3 text-info font-45">
                                                    <i class="las la-cloud-moon-rain"></i>
                                                </span>
                                                <div class="media-body">
                                                    <h5> {{ __('29.57 ml') }}</h5>
                                                    <p> {{ __('Rainfall') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gradient-secondary text-white mt-3">
                            <div class="mb-0">
                                <div class="">
                                    <div class="whole-week-days d-flex flex-wrap justify-content-sm-around p-3">
                                        <div class="item">
                                            <h6 class="text-white mb-0"> {{ __('Mon') }}</h6>
                                            <div class="d-flex align-items-center mt-1">
                                                <span class="env-icon"><i
                                                        class="las la-cloud-moon font-35"></i></span>
                                                <div class="temp-count ml-2">
                                                    <h6 class="text-white mb-0"> {{ __('58°F') }}</h6>
                                                    <p class="mb-0 text-white"> {{ __('28°C') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <h6 class="text-white mb-0"> {{ __('Tue') }}</h6>
                                            <div class="d-flex align-items-center mt-1">
                                                <span class="env-icon"><i
                                                        class="las la-cloud-sun font-35"></i></span>
                                                <div class="temp-count ml-2">
                                                    <h6 class="text-white mb-0"> {{ __('60°F') }}</h6>
                                                    <p class="mb-0 text-white"> {{ __('29°C') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <h6 class="text-white mb-0"> {{ __('Wed') }}</h6>
                                            <div class="d-flex align-items-center mt-1">
                                                <span class="env-icon"><i
                                                        class="las la-cloud-moon font-35"></i></span>
                                                <div class="temp-count ml-2">
                                                    <h6 class="text-white mb-0">{{ __('60°F') }}</h6>
                                                    <p class="mb-0 text-white">{{ __('30°C') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <h6 class="text-white mb-0"> {{ __('Thu') }}</h6>
                                            <div class="d-flex align-items-center mt-1">
                                                <span class="env-icon"><i
                                                        class="las la-cloud-sun font-35"></i></span>
                                                <div class="temp-count ml-2">
                                                    <h6 class="text-white mb-0"> {{ __('40°F') }}</h6>
                                                    <p class="mb-0 text-white">{{ __('19°C') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <h6 class="text-white mb-0"> {{ __('Fri') }}</h6>
                                            <div class="d-flex align-items-center mt-1">
                                                <span class="env-icon"><i
                                                        class="las la-cloud-sun-rain font-35"></i></span>
                                                <div class="temp-count ml-2">
                                                    <h6 class="text-white mb-0"> {{ __('46°F') }}</h6>
                                                    <p class="mb-0 text-white">{{ __('23°C') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <h6 class="text-white mb-0"> {{ __('Sat') }}</h6>
                                            <div class="d-flex align-items-center mt-1">
                                                <span class="env-icon"><i
                                                        class="las la-cloud-moon font-35"></i></span>
                                                <div class="temp-count ml-2">
                                                    <h6 class="text-white mb-0">{{ __('48°F') }}</h6>
                                                    <p class="mb-0 text-white">{{ __('28°C') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-xl-4 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget " style="height: 100%">
                    <div class="widget-heading mb-4">
                        <h5> {{ __('backend.The number of visitors to the profile') }}</h5>
                        <span class="w-numeric-title" style="margin-top: 10%;"> {{ $user->name }}</span>
                    </div>
                    <div class="bs-content" style="margin-top: 35%;">
                        <div class="text-center">
                            <img src="{{ asset('assets/img/trophy.png') }}" class="best-seller-trophy" />
                        </div>
                        <div class=" text-center">
                            <h1 class="mb-0"> {{ $user->views }}</h1>
                            <p class="mb-4"> {{ __('backend.account visitor') }}</p>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-4">
                <div class="widget overflow-hidden text-center  mb-4" style="height: 100%;
                    padding-top: 50%;">
                    <div class="confetti">
                        <div class="confetti-piece"></div>
                        <div class="confetti-piece"></div>
                        <div class="confetti-piece"></div>
                        <div class="confetti-piece"></div>
                        <div class="confetti-piece"></div>
                        <div class="confetti-piece"></div>
                        <div class="confetti-piece"></div>
                        <div class="confetti-piece"></div>
                        <div class="confetti-piece"></div>
                        <div class="confetti-piece"></div>
                        <div class="confetti-piece"></div>
                        <div class="confetti-piece"></div>
                        <div class="confetti-piece"></div>
                    </div>
                    <img src="{{ url('assets/img/new-badge.png') }}" height="100px" />
                    <h5 class="mt-4 mb-3">{{__('backend.Regular Membership')}}</h5>
                    <p class="text-muted mb-3">{{__('backend.You can upgrade your membership here')}}</p>
                    <br>
                    <button class="btn btn-sm bg-gradient-primary text-white">{{__('backend.upgrade Membership')}}</button>
                </div>

            </div>
            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-two">
                    <div class="widget-heading text-center">
                        <ul class="tabs tab-pills list-unstyled">
                            <li>
                                <div class="dropdown  custom-dropdown-icon " style="text-align: -webkit-center; ">

                                    <select class="form-control year" style="width: 34%">
                                        @for ($i = $year; $i > $year - 5; $i--)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor

                                    </select>
                                    {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
                                        <a class="dropdown-item" data-value="Settings" href="javascript:void(0);">
                                            {{ __('2019') }}</a>
                                        <a class="dropdown-item" data-value="Settings"
                                            href="javascript:void(0);">{{ __('2018') }}</a>
                                        <a class="dropdown-item" data-value="Mail"
                                            href="javascript:void(0);">{{ __('2017') }}</a>
                                        <a class="dropdown-item" data-value="Print"
                                            href="javascript:void(0);">{{ __('2016') }}</a>
                                    </div> --}}
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="widget-content mt-40">
                        <div id="companyGrowth" class=""></div>
                        <p class="font-17 text-center mb-0 text-muted">
                            <a class="text-primary" href="javascript:void(0);">{{ __('10%') }}</a>
                            {{ __('backend.more than') }} 2019
                        </p>
                    </div>
                </div>
            </div>
            {{-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-expense-summary dashboard-table">
                    <div class="widget-heading">
                        <h5 class=""> {{ __('Expense Summary') }}</h5>
                    </div>
                    <div class="widget-content">
                        <div class="row">
                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing pb-0">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="th-content"> {{ __('Last Month Expense') }}</div>
                                                </th>
                                                <th class="text-right">
                                                    <div class="th-content"> {{ __('Amount') }}</div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> {{ __('Subscription') }}</td>
                                                <td class="text-right"> {{ __('$99.00') }}</td>
                                            </tr>
                                            <tr>
                                                <td> {{ __('Server Cost') }}</td>
                                                <td class="text-right"> {{ __('$999.00') }}</td>
                                            </tr>
                                            <tr>
                                                <td> {{ __('Hosting') }}</td>
                                                <td class="text-right"> {{ __('$71.00') }}</td>
                                            </tr>
                                            <tr>
                                                <td> {{ __('Electricity') }}</td>
                                                <td class="text-right"> {{ __('$59.00') }}</td>
                                            </tr>
                                            <tr>
                                                <td> {{ __('Office') }}</td>
                                                <td class="text-right"> {{ __('$199.00') }}</td>
                                            </tr>
                                            <tr>
                                                <td> {{ __('Misc') }}</td>
                                                <td class="text-right"> {{ __('$599.00') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="strong text-primary"> {{ __('Total') }}</td>
                                                <td class="text-right strong text-primary"> {{ __('$2026.00') }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="flex-grow-1 pl-2 pr-2">
                                    <span class="font-15"><small class="font-15 text-light-black strong mr-2">
                                            {{ __('$2,026') }}</small> {{ __('Total Expense') }}</span>
                                    <span class="float-right"> {{ __('65%') }}</span>
                                    <div class="progress progress-sm mt-2">
                                        <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="75"
                                            style="width:75%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing pb-0">
                                <div id="expenseSummary" class=""></div>
                                <p class="text-center"> {{ __('Extra Expense') }}</p>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="th-content"> {{ __('Expense') }}</div>
                                                </th>
                                                <th class="text-right">
                                                    <div class="th-content"> {{ __('Amount') }}</div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> {{ __('Office') }}</td>
                                                <td class="text-right"> {{ __('$799.00') }}</td>
                                            </tr>
                                            <tr>
                                                <td> {{ __('Misc') }}</td>
                                                <td class="text-right"> {{ __('$3500.00') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="strong text-danger"> {{ __('Total') }}</td>
                                                <td class="text-right strong text-danger"> {{ __('$4299.00') }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing pb-0">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="th-content"> {{ __('This Month Expense') }}</div>
                                                </th>
                                                <th class="text-right">
                                                    <div class="th-content"> {{ __('Amount') }}</div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> {{ __('Subscription') }}</td>
                                                <td class="text-right"> {{ __('$99.00') }}</td>
                                            </tr>
                                            <tr>
                                                <td> {{ __('Server Cost') }}</td>
                                                <td class="text-right"> {{ __('$999.00') }}</td>
                                            </tr>
                                            <tr>
                                                <td> {{ __('Hosting') }}</td>
                                                <td class="text-right"> {{ __('$71.00') }}</td>
                                            </tr>
                                            <tr>
                                                <td> {{ __('Electricity') }}</td>
                                                <td class="text-right"> {{ __('$59.00') }}</td>
                                            </tr>
                                            <tr>
                                                <td> {{ __('Office') }}</td>
                                                <td class="text-right"> {{ __('$999.00') }}</td>
                                            </tr>
                                            <tr>
                                                <td> {{ __('Misc') }}</td>
                                                <td class="text-right"> {{ __('$4099.00') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="strong text-info"> {{ __('Total') }}</td>
                                                <td class="text-right strong text-info"> {{ __('$7526.00') }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="flex-grow-1 pl-2 pr-2">
                                    <span class="font-15"><small class="font-15 text-light-black strong mr-2">
                                            {{ __('$7,526') }}</small> {{ __('Total Expense') }}</span>
                                    <span class="float-right"> {{ __('75%') }}</span>
                                    <div class="progress progress-sm mt-2">
                                        <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="75"
                                            style="width:75%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
          
        </div>

    </div>
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('plugins/apex/apexcharts.min.js') !!}
    {!! Html::script('plugins/flatpickr/flatpickr.js') !!}
    {!! Html::script('assets/js/dashboard/dashboard.js') !!}
@endpush

@push('custom-scripts')
@endpush

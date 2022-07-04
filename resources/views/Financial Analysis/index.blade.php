@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('plugins/apex/apexcharts.css') !!}
    {!! Html::style('assets/css/dashboard/dashboard_1.css') !!}
    {!! Html::style('plugins/flatpickr/flatpickr.css') !!}
    {!! Html::style('plugins/flatpickr/custom-flatpickr.css') !!}
    {!! Html::style('assets/css/elements/tooltip.css') !!}
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
                                        href="javascript:void(0);">{{ __('backend.FinancialAnalysis') }}</a>
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
                                        <div class="col-md-4">
                                            <h4 class="table-header">
                                                {{ __('backend.FinancialAnalysis') }}</h4>

                                        </div>
                                        <div class="col-md-8">
                                            <div class="button-list mb-3" style="margin-right:35%;">
                                                <div class="col-md-12">
                                                    <div class="input-group input-group-sm">
                                                        <form action="{{ route('FinancialAnalysis', ['date']) }}"
                                                            method="GET">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-10"> <input
                                                                        id="rangeCalendarFlatpickr"
                                                                        class="form-control flatpickr flatpickr-input active"
                                                                        type="text" name="date"
                                                                        value="{{ request()->date }}"
                                                                        placeholder="{{ __('backend.Select a date to search for invoices') }}">
                                                                </div>
                                                                <div class="col-md-2 mt-1">
                                                                    <button type="submit"
                                                                        data-original-title="{{ __('backend.Search') }}"
                                                                        data-placement="bottom"
                                                                        class="btn btn-primary dash-btn btn-sm ml-2 bs-tooltip">
                                                                        <i class="las la-search"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class=" table-responsive mb-4">
                                        <div class="row mt-5 ml-2 mr-2">
                                            <div
                                                class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing text-center">
                                                <div class="widget top-welcome">
                                                    <div class="f-100">
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="media">
                                                                    <div class="mr-3">
                                                                        @if (!empty($user['logo']))
                                                                            <img src="{{ url("image/$user->logo") }}"
                                                                                alt=""
                                                                                class="avatar-md rounded-circle img-thumbnail">
                                                                        @else
                                                                            <img src="{{ url('https://dummyimage.com/1200x900/e0e0e0/c7c7c7.png') }}"
                                                                                alt=""
                                                                                class="avatar-md rounded-circle img-thumbnail">
                                                                        @endif

                                                                    </div>
                                                                    <div class="align-self-center media-body">
                                                                        <div class="text-muted">
                                                                            <p class="mb-2 text-primary">
                                                                                {{ __('backend.Welcome to Financial Analysis') }}
                                                                            </p>
                                                                            <h5 class="mb-1">
                                                                                {{ $user->name }}</h5>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="align-self-center col-lg-8">
                                                                <div class="text-lg-center mt-4 mt-lg-0">
                                                                    <div class="row">
                                                                        <div class="col-2">
                                                                            <div>
                                                                                <p class="text-muted text-truncate mb-2">
                                                                                    {{ __('backend.Number of clients') }}
                                                                                </p>
                                                                                <h5 class="mb-0">
                                                                                    {{ $customerNumber }}</h5>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-2">
                                                                            <div>
                                                                                <p class="text-muted text-truncate mb-2">
                                                                                    {{ __('backend.Count of contracts') }}
                                                                                </p>
                                                                                <h5 class="mb-0">
                                                                                    {{ $contract }}</h5>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <div>
                                                                                <p class="text-muted mb-2">
                                                                                    {{ __('backend.Number of invoices issued') }}
                                                                                </p>
                                                                                <h5 class="mb-0">
                                                                                    {{ $Iinvoices }}</h5>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-3">
                                                                            <div>
                                                                                <p class="text-muted  mb-2">
                                                                                    {{ __('backend.Number of invoices received') }}
                                                                                </p>
                                                                                <h5 class="mb-0">
                                                                                    {{ $Rinvoices }}</h5>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-2">
                                                                            <div>
                                                                                <p class="text-muted mb-2">
                                                                                    {{ __('backend.wallet balance') }}
                                                                                </p>
                                                                                <h5 class="mb-0 ">
                                                                                    {{ $user->wallet_balance }}
                                                                                    {{ __('backend.Rial') }}</h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">

                                                <div class=" layout-spacing">
                                                    <div class="row">
                                                        <div class="col-md-6 ">
                                                            <div class="widget widget-six bg-light-danger p-4  ">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="col-md-9 p-0">
                                                                        <p class="text-danger">
                                                                            {{ __('backend.Purchases') }}
                                                                        </p>
                                                                        <h2 class="text-danger">
                                                                            {{ $date != '' ? Paid($date) : Paid() }}
                                                                            {{ __('backend.Rial') }}
                                                                        </h2>

                                                                    </div>
                                                                    <div class="col-md-3 chart-icon text-right p-0">
                                                                        <i class="las la-coins font-45 text-danger"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 ">
                                                            <div class="widget widget-six bg-light-success p-4">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="col-md-9 p-0">
                                                                        <p class="text-success-teal">
                                                                            {{ __('backend.sales') }}</p>
                                                                        <h2 class="text-success-teal">
                                                                            {{ $date != '' ? Received($date) : Received() }}
                                                                            {{ __('backend.Rial') }}
                                                                        </h2>

                                                                    </div>
                                                                    <div class="col-md-3 chart-icon text-right p-0">
                                                                        <i
                                                                            class="las la-hand-holding-usd font-45 text-success-teal"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">

                                                <div class="row">
                                                    <div class="col-md-6 layout-spacing">
                                                        <div class="widget widget-chart-one">
                                                            <div class="widget-heading">
                                                                <h5 class="">
                                                                    {{ __('backend.Invoices paid') }}</h5>
                                                            </div>
                                                            <div class="widget-content">
                                                                <div class="d-flex justify-content-between">
                                                                    <p class="font-35 text-success-teal">
                                                                        {{ $Paidinvoices }}</p>
                                                                    <i
                                                                        class="lar la-chart-bar font-45 text-success-teal"></i>
                                                                </div>

                                                                <a href="{{ route('eBills') }}"
                                                                    class="btn btn-sm btn-primary">
                                                                    {{ __('backend.View Details') }}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 layout-spacing">
                                                        <div class="widget widget-chart-one">
                                                            <div class="widget-heading">
                                                                <h5 class="">
                                                                    {{ __('backend.Invoices to be paid') }}</h5>
                                                            </div>
                                                            <div class="widget-content">
                                                                <div class="d-flex justify-content-between">
                                                                    <p class="font-35 text-warning">
                                                                        {{ $UnPaidinvoices }}
                                                                    </p>
                                                                    <i class="lar la-chart-bar font-45 text-warning"></i>
                                                                </div>

                                                                <a href="{{ route('eBills', ['source' => 'Unpaid']) }}"
                                                                    class="btn btn-sm btn-warning btn-rounded">
                                                                    {{ __('backend.View Details') }}</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">

                                                <div class="row">
                                                    <div class="col-md-4 layout-spacing">
                                                        <div class="widget widget-chart-one">
                                                            <div class="widget-heading">
                                                                <h5 class="text-success">
                                                                    {{ __('backend.wallet balance') }}</h5>
                                                            </div>
                                                            <div class="widget-content">
                                                                <div class="d-flex justify-content-between">
                                                                    <p class="font-35 text-success">
                                                                        {{ $user->wallet_balance }}
                                                                        {{ __('backend.Rial') }}</p>
                                                                    <i class="lar la-chart-bar font-45 text-success"></i>
                                                                </div>

                                                                <a class="btn btn-sm btn-success btn-rounded"
                                                                    href="{{ route('RchargeAccount') }}">
                                                                    {{ __('backend.View Details') }}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-md-6 layout-spacing">
                                                        <div class="widget widget-chart-one">
                                                            <div class="widget-heading">
                                                                <h5 class="">
                                                                    {{ __('Pending payment of product') }}</h5>
                                                            </div>
                                                            <div class="widget-content">
                                                                <div class="d-flex justify-content-between">
                                                                    <p class="font-35 text-warning"> {{ __('$24,989') }}
                                                                    </p>
                                                                    <i class="lar la-chart-bar font-45 text-warning"></i>
                                                                </div>
                                                                <p> {{ __('Total 98 clients') }}</p>
                                                                <a class="btn btn-sm btn-warning">
                                                                    {{ __('View Details') }}</a>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                                                        <div class="widget widget-three">
                                                            <div class="widget-heading">
                                                                <h5 class="">
                                                                    {{ __('backend.Total sales and purchases') }}
                                                                </h5>

                                                            </div>
                                                            <div class="widget-content">
                                                                <div class="customer-issues">
                                                                    <div class="customer-issue-list">
                                                                        <div class="customer-issue-details">
                                                                            <div class="customer-issues-info">
                                                                                <h6 class="mb-2 font-12 text-success-teal">
                                                                                    {{ __('backend.Purchases') }}</h6>
                                                                                <p
                                                                                    class="issues-count mb-2 font-12 text-success-teal">
                                                                                    {{ $date != '' ? Paid($date) : Paid() }}
                                                                                    {{ __('backend.Rial') }}
                                                                                </p>
                                                                            </div>
                                                                            <div class="customer-issues-stats">
                                                                                <div class="progress">

                                                                                    <div class="progress-bar bg-gradient-success position-relative"
                                                                                        role="progressbar"
                                                                                        style="width: {{ $date != '' ? (int) ((Paid($date) / (Paid($date) + Received($date) + UnPaid($date) + 1)) * 100) + 8 : (int) ((Paid() / (Paid() + Received() + UnPaid() + 1)) * 100) + 8 }}%"
                                                                                        aria-valuenow="{{ $date != '' ? Paid($date) / 100 : Paid() / 100 }}"
                                                                                        aria-valuemin="0"
                                                                                        aria-valuemax="100">
                                                                                        <span
                                                                                            class="success-teal"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="customer-issue-list">
                                                                        <div class="customer-issue-details">
                                                                            <div class="customer-issues-info">
                                                                                <h6 class="mb-2 font-12 text-secondary">
                                                                                    {{ __('backend.sales') }}</h6>
                                                                                <p
                                                                                    class="issues-count mb-2 font-12 text-secondary">
                                                                                    {{ $date != '' ? Received($date) : Received() }}
                                                                                    {{ __('backend.Rial') }}
                                                                                </p>
                                                                            </div>
                                                                            <div class="customer-issues-stats">
                                                                                <div class="progress">
                                                                                    <div class="progress-bar bg-gradient-secondary  position-relative"
                                                                                        role="progressbar"
                                                                                        style="width: {{ $date != '' ? (int) ((Received($date) / (Paid($date) + Received($date) + UnPaid($date) + 1)) * 100) + 8 : (int) ((Received() / (Paid() + Received() + UnPaid() + 1)) * 100) + 8 }}%"
                                                                                        aria-valuenow="{{ $date != '' ? Received($date) / 100 : Received() / 100 }}"
                                                                                        aria-valuemin="0"
                                                                                        aria-valuemax="100">
                                                                                        <span
                                                                                            class="secondary"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="customer-issue-list">
                                                                        <div class="customer-issue-details">
                                                                            <div class="customer-issues-info">
                                                                                <h6 class="mb-2 font-12 text-warning">
                                                                                    {{ __('backend.Not paid') }}</h6>
                                                                                <p
                                                                                    class="issues-count mb-2 font-12 text-warning">
                                                                                    {{ $date != '' ? UnPaid($date) : UnPaid() }}
                                                                                    {{ __('backend.Rial') }}
                                                                                </p>
                                                                            </div>
                                                                            <div class="customer-issues-stats">
                                                                                <div class="progress">
                                                                                    <div class="progress-bar bg-gradient-warning position-relative"
                                                                                        role="progressbar"
                                                                                        style="width:{{ $date != '' ? (int) ((UnPaid($date) / (Paid($date) + Received($date) + UnPaid($date) + 1)) * 100) + 8 : (int) ((UnPaid() / (Paid() + Received() + UnPaid() + 1)) * 100) + 8 }}%"
                                                                                        aria-valuenow="{{ $date != '' ? UnPaid($date) / 100 : UnPaid() / 100 }}"
                                                                                        aria-valuemin="0"
                                                                                        aria-valuemax="100">
                                                                                        <span
                                                                                            class="warning"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="text-center mt-5">
                                                                        <p class="mb-2 text-muted font-20">
                                                                            {{ __('backend.net value added') }}</p>
                                                                        <h4 class="stronger">
                                                                            {{ $date != '' ? number_format((((Received($date) - Paid($date)))-((Received($date) - Paid($date))/1.15)),2,",",".") : number_format((((Received() - Paid()))-((Received() - Paid())/1.15)),2,",",".") }}
                                                                            {{ __('backend.Rial') }}</h4>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                                                        <div class="widget widget-three widget-best-seller">
                                                            <div class="widget-heading mb-0"></div>
                                                            <div class="text-center">
                                                                <div class="mb-4">
                                                                    <i class="las la-file-invoice-dollar pt-1 font-45 text-danger"
                                                                       ></i>
                                                                </div>
                                                                <h3> {{ $date != '' ? (Received($date)*0.03) : (Received()*0.03) }} {{ __('backend.Rial') }}</h3>
                                                                <p> {{ __('backend.The percentage due for a baptism platform') }}
                                                                </p>
                                                            </div>
                                                            <div class="table-responsive mt-4">
                                                                <table class="table table-centered table-nowrap mb-2">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="width: 30%;">
                                                                                <p class="mb-0">
                                                                                    {{ __('backend.sales') }}</p>
                                                                            </td>
                                                                            <td style="width: 25%;">
                                                                                <h5 class="mb-0">
                                                                                    {{ $date != '' ? Received($date) : Received() }}
                                                                                    </h5>
                                                                            </td>
                                                                           
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <p class="mb-0">
                                                                                    {{ __('backend.Purchases') }}</p>
                                                                            </td>
                                                                            <td>
                                                                                <h5 class="mb-0">
                                                                                    {{ $date != '' ? Paid($date) : Paid() }}
                                                                                  </h5>
                                                                            </td>
                                                                           
                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                               <a href="{{route('RchargeAccount')}}" ><p class=" text-primary text-center">{{__('backend.Pay now by wallet')}}</p></a> 
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('plugins/apex/apexcharts.min.js') !!}
    {!! Html::script('plugins/flatpickr/flatpickr.js') !!}
    {!! Html::script('assets/js/dashboard/dashboard_1.js') !!}
@endpush


@push('custom-scripts')
@endpush

@push('custom-scripts')
@endpush

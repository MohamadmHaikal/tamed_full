@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('plugins/notification/snackbar/snackbar.min.css') !!}
    {!! Html::style('assets/css/dashboard/dashboard_5.css') !!}
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
                                        href="javascript:void(0);">{{ __('backend.Rcharge the balance') }}</a>
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
                                            <h4 class="table-header">{{ __('backend.Rcharge the balance') }}</h4>

                                        </div>

                                    </div>
                                    <h4 class="pl-2">{{ __('backend.wallet balance') }}</h4>
                                    <div class="form-inline mt-3 mb-3 pl-4">
                                        <label for="tt"
                                            class="mr-5">{{ __('backend.Current wallet balance:') }}</label>
                                        <h5 id="tt" style="color: darkgreen;font-weight: 900;">{{ $user->wallet_balance }}
                                        </h5>
                                    </div>
                                    <h4 class="pl-2 mt-4">{{ __('backend.Balance recharge request') }}</h4>
                                    <div class="form-inline mt-4 mb-3 pl-4">
                                        <label for="tt"
                                            class="mr-5">{{ __('backend.Date') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <h6 id="tt">{{ date('h:s:ia , Y-m-d') }}</h6>
                                    </div>
                                    <div class="form-inline mt-4 mb-3 pl-4">
                                        <label for="tt" class="mr-5">{{ __('backend.Membership No') }}</label>
                                        <h6 id="tt"> {{ $user->name }} - {{ $user->id }}</h6>
                                    </div>
                                    <div class="form-inline mt-4 mb-3 pl-4">
                                        <label for="tt" class="mr-5">
                                            {{ __('backend.Payment method') }}&nbsp;&nbsp;&nbsp;&nbsp;</label>


                                        <img src="{{ asset('assets/img/visa-mas.png') }}" height="40px" />
                                    </div>
                                    <div class="form-inline mt-4 mb-3 pl-4">
                                        <label for="tt" class="mr-5">{{ __('backend.shipping cost') }} </label>
                                        <input class="form-control" type="text" id="example-text-input">

                                    </div>
                                    <button type="button" class="btn btn-primary"
                                        style="margin-right: 75%;">{{ __('backend.recharge') }}</button>

                                    <div class="col-md-12 mt-4">
                                        <div class="widget widget-chart-one bg-gradient-secondary">
                                            <div class="widget-heading">
                                                <h5 class="text-white"> {{ __('backend.To transfer a baptism percentage to the bank account') }}</h5>
                                               
                                            </div>
                                            <div class="widget-content">
                                                <h6 class="text-white">
                                                    {{ __('backend.For amounts from 10,000 and above, the transfer is made through the attached bank accounts and a copy of the transfer is sent ‎') }}</h6>
                                                <span class="text-white font-13">
                                                    {{ __('backend.Al Rajhi Bank :') }}  000000000000
                                                </span>
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
@endpush

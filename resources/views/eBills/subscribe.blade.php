@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
    {!! Html::style('plugins/notification/snackbar/snackbar.min.css') !!}
    {!! Html::style('assets/css/ui-elements/buttons.css') !!}
@endpush

@section('content')
    <?php
    $date = new DateTime('now');
    $date->modify('+3 month'); // or you can use '-90 day' for deduct
    $date = $date->format('Y-m-d');
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
                                <div class="widget-content widget-content-area br-6">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="table-header">
                                                {{ __('backend.Subscribe to the electronic billing package') }}</h4>

                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <div class=" col-md-8 " style="border-radius: 25px; background-color:#027496; margin: auto;
                                                            width: 100%;
                                                            padding: 10px;">

                                            <p class="card-text text-light" style="line-height: 50px;">
                                                {{ __('backend.Terms of subscription to the electronic billing service:') }}
                                            </p>
                                            <div class="d-flex justify-content-center">
                                                <ul class="text-light text-left ">
                                                    <li> {{ __('backend.Add bank accounts') }}</li>
                                                    <li>{{ __('backend.Add billing settings') }}</li>
                                                    <li>{{ __('backend.Complete personal information') }}</li>
                                                   
                                                    <li>{{ __('backend.The amount will be deducted from the wallet balance') }}
                                                    </li>
                                                </ul>
                                            </div>

                                            <table class="table table-sm mt-3 mb-0 " style="width:100%; background-color: #f6f7f8;margin: auto;
                                                          border-radius: 25px;
                                                            padding: 10px;">

                                                <tbody>

                                                    <tr>
                                                        <th style="border-top: none;">
                                                            {{ __('backend.Subscription date') }}</th>
                                                        <td style="border-top: none;">{{ date('Y-m-d') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>{{ __('backend.Subscription end date') }}</th>
                                                        <td>{{ $date }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>{{ __('backend.Subscription period') }}</th>
                                                        <td>90 يوم</td>
                                                    </tr>
                                                    <tr>
                                                        <th>{{ __('backend.Subscription cost') }}</th>
                                                        <td> 0.00 {{ __('backend.Rial') }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>{{ __('backend.Tax') }}</th>
                                                        <td>0.00 {{ __('backend.Rial') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th> {{ __('backend.Total') }} </th>
                                                        <td>0.00 {{ __('backend.Rial') }}</td>

                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="mt-3 text-left row" style=" width:100%; background-color: #f6f7f8;margin: auto;
                                                    border-radius: 25px;
                                                      padding: 10px;">
                                                <div class="col-md-4 mt-2 text-center">{{ __('backend.wallet balance') }}</div>
                                                <div class="col-md-4 mt-2 text-center" >{{get_current_user_data()->wallet_balance}} {{__('backend.Rial')}}</div>
                                                <div class="col-md-4 text-center">
                                                    <a href="{{route('RchargeAccount')}}"> <button class="btn btn-success btn-rounded ">
                                                            {{ __('backend.recharge') }}</button></a>
                                                </div>
                                            </div>
                                        </div>

                                        <button class="btn btn-success btn-rounded mt-3 subscribe">
                                            {{ __('backend.Continue to subscribe') }}</button>
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
    {!! Html::script('assets/js/myJS.js') !!}
    {!! Html::script('plugins/notification/snackbar/snackbar.min.js') !!}
    {!! Html::script('assets/js/basicui/notifications.js') !!}
@endpush

@push('custom-scripts')
@endpush

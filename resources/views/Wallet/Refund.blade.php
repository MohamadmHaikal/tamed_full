@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('plugins/notification/snackbar/snackbar.min.css') !!}
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('backend.Refund') }}</a>
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
                                            <h4 class="table-header">{{ __('backend.Refund') }}</h4>

                                        </div>

                                    </div>
                                   
                                      
                                        <h4 class="pl-2"> {{ __('backend.wallet balance') }}</h4>
                                        <div class="form-inline mt-3 mb-3 pl-4">
                                            <label for="tt"
                                                class="mr-5">{{ __('backend.Current wallet balance:') }}</label>
                                            <input class="form-control" type="text" id="example-text-input"
                                                value="{{ $user->wallet_balance }}" readonly>

                                        </div>
                                        <h4 class="pl-2 mt-4">{{ __('backend.Request a refund') }}</h4>
                                        <div class="form-inline mt-4 mb-3 pl-4">
                                            <label for="tt"
                                                class="mr-5">{{ __('backend.Date') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                            <h6 id="tt">{{ date('h:s:ia , Y-m-d') }}</h6>
                                        </div>
                                        <div class="form-inline mt-4 mb-3 pl-4">
                                            <label for="tt" class="mr-4">{{ __('backend.Membership No') }}
                                                &nbsp;&nbsp;&nbsp;</label>
                                            <h6 id="tt">{{ $user->id }} - {{ $user->name }}</h6>
                                        </div>

                                        <div class="form-inline mt-3 mb-3 pl-4">
                                            <label for="tt" class="mr-5">{{ __('backend.beneficiary') }}
                                                :</label>
                                            <input class="form-control" type="text" id="example-text-input"
                                                name="beneficiary" >

                                        </div>
                                        <div class="form-inline mt-3 mb-3 pl-4">
                                            <label for="tt" class="mr-5">IBAN :
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                            <input class="form-control" type="text" id="example-text-input" name="IBAN">

                                        </div>
                                        {{-- <div class="form-inline mt-3 mb-3 pl-4">
                                        <label for="tt" class="mr-5">البنك  :  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <select class="form-control pl-9" id="exampleSelect1" style="padding-left: 27px;
                                    padding-right: 22px;">
                                        <option>البنك العربي الدولي</option>
                                        <option>البنك القطري الدولي</option>
                                        <option>البنك القطري الدولي</option>
                                        <option>البنك القطري الدولي</option>
                                        <option>البنك القطري الدولي</option>
                                    </select>
                                    </div> --}}
                                        <div class="form-inline mt-3 mb-3 pl-4">
                                            <label for="tt" class="mr-5">{{ __('backend.the amount') }} :
                                                &nbsp;&nbsp;&nbsp;&nbsp;</label>
                                            <input class="form-control" type="text" id="example-text-input" name="amount">

                                        </div>

                                        <button  class="btn btn-primary " id="send-Refund"
                                            style="margin-right: 75%;">{{ __('backend.Apply') }}</button>
                                    
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
@endpush

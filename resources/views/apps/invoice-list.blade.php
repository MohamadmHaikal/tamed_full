@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/apps/invoice.css') !!}
@endpush

@section('content')
    <!--  Navbar Starts / Breadcrumb Area Starts -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);"> {{__('Apps')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span> {{__('Invoice')}}</span></li>
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
        <div class="row invoice layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="app-hamburger-container">
                    <div class="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu chat-menu d-xl-none"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></div>
                </div>
                <div class="doc-container">
                    <div class="tab-title">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="search search-bar-container">
                                    <i class="las la-search toggle-search"></i>
                                    <form class="form-inline search-full form-inline search" role="search">
                                        <div class="search-bar">
                                            <input type="text" class="search-form-control  ml-lg-auto" placeholder="{{__('Search here')}}">
                                        </div>
                                    </form>
                                </div>
                                <ul class="nav nav-pills inv-list-container d-block" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <div class="nav-link list-actions" id="K5UI89OP78" data-invoice-id="K5UI89OP78">
                                            <div class="f-m-body">
                                                <div class="f-head">
                                                    <span>{{__('11')}}</span>
                                                    <span>{{__('Apr')}}</span>
                                                    <span>{{__('2021')}}</span>
                                                </div>
                                                <div class="f-body">
                                                    <p class="invoice-number">{{__('Id: K5UI89OP78')}}</p>
                                                    <p class="invoice-customer-name">{{__('Sales Invoice')}}</p>
                                                    <p class="invoice-generated-date">{{__('Umbrella Corporation')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <div class="nav-link list-actions" id="P5UI89OP79" data-invoice-id="P5UI89OP79">
                                            <div class="f-m-body">
                                                <div class="f-head">
                                                    <span>{{__('11')}}</span>
                                                    <span>{{__('Apr')}}</span>
                                                    <span>{{__('2021')}}</span>
                                                </div>
                                                <div class="f-body">
                                                    <p class="invoice-number">{{__('Id: P5UI89OP79')}}</p>
                                                    <p class="invoice-customer-name">{{__('Order Invoice')}}</p>
                                                    <p class="invoice-generated-date">{{__('Hethwoy Inc.')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <div class="nav-link list-actions" id="A4UI89OP90" data-invoice-id="A4UI89OP90">
                                            <div class="f-m-body">
                                                <div class="f-head">
                                                    <span>{{__('10')}}</span>
                                                    <span>{{__('Apr')}}</span>
                                                    <span>{{__('2021')}}</span>
                                                </div>
                                                <div class="f-body">
                                                    <p class="invoice-number">{{__('Id: A4UI89OP90')}}</p>
                                                    <p class="invoice-customer-name">{{__('Sales Invoice')}}</p>
                                                    <p class="invoice-generated-date">{{__('Orapt Watches')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <div class="nav-link list-actions" id="H8UI89OP47" data-invoice-id="H8UI89OP47">
                                            <div class="f-m-body">
                                                <div class="f-head">
                                                    <span>{{__('15')}}</span>
                                                    <span>{{__('Apr')}}</span>
                                                    <span>{{__('2021')}}</span>
                                                </div>
                                                <div class="f-body">
                                                    <p class="invoice-number">{{__('Id: H8UI89OP47')}}</p>
                                                    <p class="invoice-customer-name">{{__('Order Invoice')}}</p>
                                                    <p class="invoice-generated-date">{{__('Zindo Consultants')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <div class="nav-link list-actions" id="I0PI89OP11" data-invoice-id="I0PI89OP11">
                                            <div class="f-m-body">
                                                <div class="f-head">
                                                    <span>{{__('16')}}</span>
                                                    <span>{{__('Apr')}}</span>
                                                    <span>{{__('2021')}}</span>
                                                </div>
                                                <div class="f-body">
                                                    <p class="invoice-number">{{__('Id: I0PI89OP11')}}</p>
                                                    <p class="invoice-customer-name">{{__('Sales Invoice')}}</p>
                                                    <p class="invoice-generated-date">{{__('Balmo Electronics')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
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
    {!! Html::script('assets/js/apps/invoice.js') !!}
@endpush

@push('custom-scripts')

@endpush

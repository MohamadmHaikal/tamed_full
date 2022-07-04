@extends('layout.master')

@push('plugin-styles')

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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Forms')}}</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">{{__('Controls')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Base Input')}}</span></li>
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
                        <div class="row layout-top-spacing">
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow mb-4">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('add Project')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group">
                                            <label>{{__('Project Type')}}
                                                <span class="text-danger">*</span></label>
                                            <input type="name" class="form-control" name="name" placeholder="{{__('Project Type')}}">
                                        </div>
                                      
                                    <div class="widget-footer text-right">
                                        <button type="reset" class="btn btn-primary mr-2">{{__('Submit')}}</button>
                                        <button type="reset" class="btn btn-outline-primary"> {{__('Cancel')}}</button>
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

@endpush

@push('custom-scripts')

@endpush

@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
    <!--  Navbar Starts / Breadcrumb Area  -->
    <div class="sub-header-container ">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                <i class="las la-bars"></i>
            </a>
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('Forms') }}</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a
                                        href="javascript:void(0);">{{ __('Controls') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{ __('Base Input') }}</span>
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
    <br>
    <div class="layout-px-spacing">
        <div class="col-lg-12 layout-spacing">
            <form method="post" action="{{ route('activites.store') }}" role="form">
                @csrf
                <div class="statbox widget box box-shadow mb-4">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                                <br>
                                <h4>{{ __('backend.Add Acivity') }}
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area ">

                        <div class="form-group">
                            <label>{{ __('backend.name of activities') }}</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label>{{ __('backend.user type') }}</label>
                            <select class="form-control form-control-sm" name="type_id">
                                @foreach ($userType as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach


                            </select>
                        </div>

                    </div>
                    <div class="widget-footer text-right">



                        <button type="submit" class="btn btn-primary mr-2">{{ __('backend.save') }}</button>
                       
                    </div>
            </form>
        </div>

    </div>
    </div>
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush

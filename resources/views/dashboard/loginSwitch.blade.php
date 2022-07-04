@extends('layout.master-auth')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/authentication/auth_3.css') !!}
    {!! Html::style('plugins/notification/snackbar/snackbar.min.css') !!}
@endpush

@section('content')
    <!-- Main Body Starts -->
    <div class="login-three">
        <div class="container-fluid login-three-container">
            <div class="row main-login-three">
                <div class="col-xl-7 col-lg-6 col-md-6 d-none d-md-block p-0">
                    <div class="login-bg" style=" background-image: url(../assets/img/auth_3_bg.jpg);"></div>
                </div>

                <div class="col-xl-5 col-lg-6 col-md-6">
                    <div class="d-flex flex-column justify-content-between  right-area header-title">

                        <div class="d-flex align-items-center justify-content-center title">
                            <h3 class="title-welcome" >{{ __('backend.Welcome to the baptism platform') }}</h3>
                        </div>
                        <div class="d-flex align-items-center justify-content-center title1 mt-5">
                            <p>{{ __('backend.To enter please choose (Enter Business or Individuals)') }}</p>
                        </div>
                        <a href="{{ route('Business.login') }}">
                            <div class="d-flex align-items-center justify-content-center title1 mt-5">
                                <img class="cardlog" src="{{ asset('assets/img/Business.png') }}" width="60%">
                            </div>
                        </a>
                        <a href="{{ route('auth.login') }}">
                            <div class="d-flex align-items-center justify-content-center title1 mt-5">
                                <img class="cardlog" src="{{ asset('assets/img/Individuals.png') }}" width="60%">
                            </div>
                        </a> 
                        
                        <a href="/" class="text-center" style="margin-bottom: 15px;">
                        
                        <h6 style="margin-top:60px;color:#026f90;"> العودة للصفحة الرئيسية <i class="las la-chevron-left" style="padding-right:25px;color:rgb(242, 162, 59);vertical-align:middle;font-size:25px;"></i></h6>
                       
                        </a>
                     <div class="row mt-3 " style="position: absolute;bottom: 0;    border-top: 1px solid rgb(200, 204, 208);">
                          <div class="col-md-12 d-flex align-items-center justify-content-center"><p class="copyRight">جميع الحقوق محفوظة ©2021 - منصة تعميد - المملكة العربية السعودية</p></div>
                         
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('assets/js/libs/jquery-3.6.0.min.js') !!}
    {!! Html::script('plugins/bootstrap/js/bootstrap.min.js') !!}
@endpush

@push('custom-scripts')
@endpush

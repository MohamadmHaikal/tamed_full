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
                    <div class="login-bg" style=" background-image: url(../assets/img/loginBusiness.jpg);"></div>
                </div>

                <div class="col-xl-5 col-lg-6 col-md-6 ">
                    <div class="d-flex flex-column justify-content-between  right-area header-title ">

                        <div class="d-flex align-items-center justify-content-center title">
                            <h3 class="title-welcome">إعادة تعيين كلمة المرور</h3>
                        </div>
                        <div class="d-flex align-items-center justify-content-center title1 ">
                            <p style="color:#027496">إعادة التعيين بأستخدام ( رقم الهوية الوطنية أو الإقامه )</p>
                        </div>
                        <div class="mt-5">
                            <div class="password">
                                
                            </div>
                            <div class="login-three-inputs mt-2">
                                <small>يجب ان يكون الرقم من 10 خانات او ارقام</small>
                                <input type="text" placeholder="رقم الهوية / الاقامة" id="IdCard" min="10" max="10">
                            </div>

                            <div class="form-2" id="gg">
                                <h6 class="text-center">ادخل الكود المرسل الى رقم الجوال</h6>
                                <p class="text-center text-muted mt-3 mb-3 font-14" id="codeNote">
                                </p>

                                <input type="text" id='phone' hidden>
                                <form method="get" class="digit-group mt-3 " data-group-name="digits"
                                    data-autosubmit="false" autocomplete="off" dir="rtl">
                                    <p class="mb-3" style="color:#0298a7;">الوقت المتبقي 180 ثانية</p>
                                    <input type="text" id="digit-1" name="digit-1" data-previous="digit-2" />
                                    <input type="text" id="digit-2" name="digit-2" data-next="digit-1"
                                        data-previous="digit-3" />
                                    <input type="text" id="digit-3" name="digit-3" data-next="digit-2"
                                        data-previous="digit-4" />
                                    <input type="text" id="digit-4" name="digit-4" data-next="digit-3" />
                                </form>

                            </div>
                           

                            <div class="d-flex align-items-center justify-content-center mt-5 checkButton">
                                <a class="text-white btn " id="getResetCode"
                                    style="background-color:#0298a7; width: 50%; height: 100%; border-radius: 25px; "
                                    href="javascript:void(0);">{{ __('backend.continue') }} </a>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mt-4 " id="underCheck">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Body Ends -->
    <div id="alert">

    </div>
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('assets/js/libs/jquery-3.6.0.min.js') !!}
    {!! Html::script('plugins/bootstrap/js/bootstrap.min.js') !!}
    {!! Html::script('assets/js/authentication/auth_2.js') !!}
    {!! Html::script('plugins/notification/snackbar/snackbar.min.js') !!}
    {!! Html::script('assets/js/basicui/notifications.js') !!}
@endpush

@push('custom-scripts')
@endpush

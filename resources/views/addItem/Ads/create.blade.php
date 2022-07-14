@extends('layout.master')

@push('plugin-styles')
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    {!! Html::style('assets/css/forms/form-widgets.css') !!}
    {!! Html::style('assets/css/forms/multiple-step.css') !!}
    {!! Html::style('plugins/flatpickr/flatpickr.css') !!}
    {!! Html::style('plugins/flatpickr/custom-flatpickr.css') !!}
    {!! Html::style('assets/css/forms/switch-theme.css') !!}
    {!! Html::style('assets/css/forms/radio-theme.css') !!}
    {!! Html::style('assets/css/forms/jquery.dropdown.css') !!}
    {!! Html::style('plugins/sweetalerts/sweetalert2.min.css') !!}
    {!! Html::style('plugins/sweetalerts/sweetalert.css') !!}
    {!! Html::style('assets/css/forms/checkbox-theme.css') !!}
    {!! Html::style('assets/css/basic-ui/custom_sweetalert.css') !!}
    {!! Html::style('plugins/editors/quill/quill.snow.css') !!}
    {!! Html::style('plugins/editors/markdown/simplemde.min.css') !!}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="{{ asset('editor.css') }}" type="text/css" rel="stylesheet" />
    <style>
        #on_off1 {
            padding: 35px 20px 10px 20px;
            border: solid 1px #ced4da;
            border-radius: 30px;
        }

        #on_off1 .row {
            border-bottom: solid 1px #ced4da00;
        }

        #on_off1 .row div {
            padding: 0;
        }

        .ApplicationConditions .form-card .row label {
            margin: 0% 2% 3% 0%;
            /* font-size: large; */
        }

        .button1 {
            display: inline-block;
            padding: 8px 40px 8px 40px;
            border-radius: 10rem;
            color: #fff;
            text-transform: uppercase;
            font-size: 18px;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .button1:after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #027496;
            border-radius: 10rem;
            z-index: -2;
        }

        .button1:before {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0%;
            height: 100%;
            background-color: #28a5c4;
            transition: all 0.3s;
            border-radius: 10rem;
            z-index: -1;
        }

        .button1:hover {
            color: #fff;
        }

        .button1:hover:before {
            width: 100%;
        }

        #Available,
        #status_equipment,
        #Receiving_orders,
        #deals_or_auction,
        #status_materialsو#work_hours {
            border: 1px solid #ced4da;
            border-radius: 30px;
            margin-bottom: 25px;
            padding: 10px 30px 5px 30px;
        }
    </style>
@endpush

@section('content')
    <!--  Navbar Starts / Breadcrumb Area  -->

    @php
    $item = isset($item) ? $item : null;
    $Certificate = ['السجل التجاري', 'شهادة القيمة المضافة', 'شهادة السعودة', 'شهادة الغرفة التجارية', 'شهادة التأمينات الأجتماعية', 'شهادة المنشآة', 'شهادة تصنيف', 'بروفايل المنشآة'];

    @endphp
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('backend.Add Ads') }}</a>
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
                        <div class="row layout-top-spacing">

                            <div class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="card multiple-form-one px-0 pb-0 mb-3"
                                                    style="box-shadow: rgb(0 0 0 / 0%) 0px 1px 5px; ">
                                                    <h5 class="text-center"><strong>{{ __('backend.Add Ads') }}</strong>
                                                    </h5>

                                                    <div class="row">
                                                        <div class="col-md-12 mx-0 nopadding">
                                                            <form id="msform" method='POST'
                                                                action="{{ isset($item) ? route('update', $item->id) : route('ads.store') }}"
                                                                enctype="multipart/form-data">
                                                                <input type="hidden" name="user_id" placeholder=""
                                                                    value="{{ get_current_user_id() }}"
                                                                    class="form-control Shadow mb-3" />

                                                                <ul id="progressbar">
                                                                    <li class="active" id="account">
                                                                        <strong>{{ __('backend.Section') }}</strong>
                                                                    </li>
                                                                    <li id="personal">
                                                                        <strong>{{ __('backend.informaton') }}</strong>
                                                                    </li>
                                                                    <li id="payment">
                                                                        <strong>{{ __('backend.files') }}</strong>
                                                                    </li>

                                                                    <li id="confirm">
                                                                        <strong>{{ __('backend.Finish') }}</strong>
                                                                    </li>
                                                                </ul>
                                                                <fieldset class="fildsetSection">
                                                                    <div class="form-card">
                                                                        <h5 class="fs-title mb-4">
                                                                            {{ __('backend.select section') }}</h5>
                                                                        @php
                                                                            $ArrayType = getArrayType();
                                                                        @endphp
                                                                        <div class="form-group x row">
                                                                            @foreach ($ArrayType as $Type)
                                                                                <div class="col-md-3 mb-3">
                                                                                    <span class="TypeProject type sec "
                                                                                        id="animateArea"
                                                                                        value="{{ $Type->id }}"
                                                                                        {{ isset($item) && $item->type == $Type->name ? 'selected' : '' }}>
                                                                                        <img src="{{ asset('image/' . $Type->image) }}"
                                                                                            class="sectionImage">

                                                                                        <p id="LabelTypeProject">
                                                                                            {{ __('backend.' . $Type->name) }}
                                                                                        </p>

                                                                                    </span>
                                                                                </div>
                                                                            @endforeach

                                                                        </div>
                                                                    </div>
                                                                    {{-- <input type="button" name="next"
                                                                    class="next action-button btn btn-primary"
                                                                    value="{{__('Forms')}}Next Step" /> --}}
                                                                </fieldset>
                                                                <fieldset>
                                                                    <div class="form-card">
                                                                        <div id="inputsAds">

                                                                        </div>
                                                                        <div class="row">

                                                                            <div class="col-12 col-md-6">
                                                                                <div class="row">
                                                                                    <div class="col-12 col-md-12">
                                                                                        <label
                                                                                            class="fieldlabels">{{ __('backend.title') }}</label>
                                                                                        <input type="text" name="title"
                                                                                            placeholder=""
                                                                                            data-error="#title"
                                                                                            maxlength="70"
                                                                                            value="{{ isset($item) ? $item->title : '' }}"
                                                                                            class="form-control Shadow mb-3" />
                                                                                    </div>
                                                                                    <div class="errorTxt col-md-6">
                                                                                        <span class="spanError"
                                                                                            id="title"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-md-6">
                                                                                <div class="row ">
                                                                                    <div class="col-12 col-md-12">
                                                                                        <label
                                                                                            class="fieldlabels">{{ __('backend.Brief description') }}</label>
                                                                                        <input type="text"
                                                                                            name="BriefDescription"
                                                                                            placeholder=""
                                                                                            data-error="#BriefDescription"
                                                                                            maxlength="60"
                                                                                            value="{{ isset($item) ? $item->BriefDescription : '' }}"
                                                                                            class="form-control Shadow mb-3"
                                                                                            required />
                                                                                    </div>
                                                                                    <div class="errorTxt col-md-6">
                                                                                        <span class="spanError"
                                                                                            id="BriefDescription"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-6">
                                                                            <div class="col-12">
                                                                                <label
                                                                                    class="fieldlabels">{{ __('backend.description') }}</label>
                                                                                <div class="container-fluid">
                                                                                    <div class="row">
                                                                                        <div class="container">
                                                                                            <div class="row">

                                                                                                <div
                                                                                                    class="col-lg-12 nopadding ">

                                                                                                    <div
                                                                                                        class="form-group row">
                                                                                                        <div
                                                                                                            class="col-lg-12 col-sm-12">
                                                                                                            <div
                                                                                                                id="editor">
                                                                                                                <?php echo isset($item) ? $item->description : ''; ?>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="errorTxt col-md-6">
                                                                                <span class="spanError"
                                                                                    id="Errordescription"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row row mt-3">
                                                                            <div class="col-md-6">
                                                                                @php
                                                                                    $city = App\Models\City::all();
                                                                                @endphp
                                                                                <label
                                                                                    class="fieldlabels">{{ __('backend.city') }}</label>

                                                                                <select
                                                                                    class="form-control form-control-lg getselecct"
                                                                                    id="mainActivity"
                                                                                    data-url="/ads/getNeighborhood/"
                                                                                    data-appendItemID="#Neighborhood"
                                                                                    data-error="#city"
                                                                                    aria-describedby="inputGroupPrepend"
                                                                                    required name="city_id">

                                                                                    @foreach ($city as $cityItem)
                                                                                        <option
                                                                                            value="{{ $cityItem->id }}"
                                                                                            {{ isset($item) && $item->city()->first()->id == $cityItem->id ? 'selected' : '' }}>
                                                                                            {{ $cityItem->name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>


                                                                                <div class="errorTxt col-md-6">
                                                                                    <span class="spanError"
                                                                                        id="city"></span>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-6">
                                                                                <label
                                                                                    class="fieldlabels">{{ __('backend.neighborhood') }}</label>

                                                                                {{-- <select
                                                                                class="form-control form-control-lg "
                                                                                id="Neighborhood"
                                                                                data-error="#neighborhood"
                                                                                aria-describedby="inputGroupPrepend"
                                                                                required name="neighborhood_id">
                                                                                @if (isset($item))
                                                                                <option value="{{  $NeighborhoodID }}">
                                                                                    {{  $item->Neighborhood()->first()->name }}
                                                                                </option>

                                                                                @endif


                                                                            </select> --}}

                                                                                <input type="text" id="Neighborhood"
                                                                                    style="height: 62px;"
                                                                                    data-error="#neighborhood"
                                                                                    aria-describedby="inputGroupPrepend"
                                                                                    required name="neighborhood"
                                                                                    placeholder=""
                                                                                    data-error="#neighborhood"
                                                                                    value="{{ isset($item) ? $item->neighborhood : '' }}"
                                                                                    class="form-control form-control-lg " />


                                                                                <div class="errorTxt col-md-6">
                                                                                    <span class="spanError"
                                                                                        id="neighborhood"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>




                                                                        {{-- <label class="fieldlabels">{{__('backend.startdate')}}</label>
                                                                    <input id="basicExample" name="startdate"
                                                                        value="{{ isset($item) ? $item->startdate : '' }}"
                                                                        class="form-control Shadow flatpickr flatpickr-input active basicExample"
                                                                        type="text"
                                                                        placeholder="{{__('backend.Select Date')}}"> --}}

                                                                        <div class="row mt-6">
                                                                            <div class="col-4">
                                                                                <input type="hidden" name="type"
                                                                                    id="type"
                                                                                    value="{{ isset($item) ? $item->type : '' }}">
                                                                                <input type="hidden"
                                                                                    id="activitie_Add_id"
                                                                                    value="{{ isset($item) ? $item->activitie_Add_id : '' }}">
                                                                                <label
                                                                                    class="fieldlabels">{{ __('backend.Submission deadline') }}</label>
                                                                                <input id="basicExample" name="deadline"
                                                                                    value="{{ isset($item) ? $item->deadline : '' }}"
                                                                                    class="form-control Shadow flatpickr flatpickr-input active basicExample"
                                                                                    type="text" required
                                                                                    data-error="#deadline"
                                                                                    aria-describedby="inputGroupPrepend"
                                                                                    required name="deadline"
                                                                                    data-error="#deadline"
                                                                                    placeholder="{{ __('backend.Select Date') }}">
                                                                                <div class="errorTxt col-md-12">
                                                                                    <span class="spanError"
                                                                                        id="deadline"></span>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-2"></div>

                                                                            @if (!isset($item))
                                                                            <div class="col-6 has-price">
                                                                                {{-- <label class="fieldlabels">{{__('backend.Price')}}</label> --}}
                                                                                <div class="input-group mt-3">

                                                                                    <div style="align-self: center;"
                                                                                        class="input-group-prepend col-md-4 switch-outer-container">
                                                                                        <label class="bestPrice">
                                                                                            {{ __('backend.best price') }}</label>

                                                                                        <span
                                                                                            class="switch switch-outline switch-icon switch-primary">
                                                                                            <label>

                                                                                                <input type="checkbox"
                                                                                                    id="bestPrice"
                                                                                                    value="{{ isset($item) ? $item->pricestatus : 'on' }}"
                                                                                                    {{ isset($item) ? ($item->pricestatus == 'on' ? 'checked' : '') : 'checked' }}
                                                                                                    name="pricestatus">

                                                                                                <span></span>
                                                                                            </label>
                                                                                        </span>
                                                                                    </div>

                                                                                    <div class="input-group-prepend col-md-8"
                                                                                        id="price"
                                                                                        {{ isset($item) ? ($item->pricestatus == 'on' ? 'hidden' : '') : 'hidden' }}>
                                                                                        <label
                                                                                            class="fieldlabels">{{ __('backend.Contract Value') }}</label>

                                                                                        <input type="number"
                                                                                            name="price"
                                                                                            value="{{ isset($item) ? $item->price : '' }}"
                                                                                            placeholder="{{ __('backend.Price') }}"
                                                                                            data-error="#pricee"
                                                                                            aria-describedby="inputGroupPrepend"
                                                                                            class="form-control Shadow"
                                                                                            required />

                                                                                    </div>
                                                                                    <div class="errorTxt col-md-6">
                                                                                        <span class="spanError"
                                                                                            id="pricee"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            @else
                                                                            <div class="col-6">
                                                                            <div class="form-group " id="salary">
                                                                                <label class="fieldlabels">الراتب</label>
                                                                                <input type="number" name="salary" placeholder="" data-error="#Errorsalary" aria-describedby="inputGroupPrepend" value="{{isset(json_decode($item->application_conditions)->salary) ? json_decode($item->application_conditions)->salary : ''}}" class="form-control mb-3">
                                                                            </div>
                                                                            <div class="errorTxt col-md-12">
                                                                            <span class="spanError" id="Errorsalary"></span>
                                                                            </div>
                                                                              </div>
                                                                            @endif
                                                                                                                                                    
                                                                        </div>


                                                                        <div class="errorTxt">
                                                                            <span id="errNm2"></span>
                                                                        </div>
                                                                    </div>

                                                                    @if (!isset($item))
                                                                        <a href="{{ route('ads.create') }}"
                                                                            class="button1"
                                                                            style="float: right;margin-right: 35px;"> <i
                                                                                class="las la-angle-double-right"
                                                                                style="position: relative;right: -25px;"></i>
                                                                            {{ __('backend.Previous') }} </a>
                                                                    @endif
                                                                    <a href="javascript:void(0);"
                                                                        class="button1 next action-button"
                                                                        style="float: left;margin-left: 35px;">
                                                                        {{ __('backend.continue') }} <i
                                                                            class="las la-angle-double-left"
                                                                            style="position: relative;left: -25px;"></i>
                                                                    </a>


                                                                </fieldset>

                                                                {{-- edit for application conditions --}}

                                                                @if (isset($item))

                                                                    <fieldset class="ApplicationConditions">

                                                                        <div class="form-card">
                                                                            @if ($item['type']==1)
                                                                                <div style="padding: 35px 20px 10px 20px;border: solid 1px #ced4da;border-radius: 30px;margin-top: 3rem !important;">
                                                                                <label class="fieldlabels" style="  top: 62px; position: absolute;right: 75px;">شروط
                                                                                    التقديم </label>
                                                                                <div class="row" style="align-items: baseline;">
                                                                                    <div class="col-md-4 mb-4">
                                                                                        <div style="align-self: center;"
                                                                                            class="input-group-prepend switch-outer-container">
                                                                                            <div class="col-md-6 text-start" style="text-align: start;">
                                                                                                <label for="">{{__('backend.Bank guarantee')}}</label>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <span class="switch switch-outline switch-icon switch-primary">
                                                                                                    <label>
                                                                                                      
                                                                                                        <input type="checkbox" {{ array_key_exists("Bank_guarantee",json_decode($item->application_conditions))?'checked':''}} value=""  name="Bank_guarantee">
                                                                                                        <span></span>
                                                                                                    </label>
                                                                                                </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div style=""
                                                                                        class="input-group-prepend switch-outer-container col-md-4">

                                                                                        <div class="col-md-6 text-start">
                                                                                            <label for="">التسعير
                                                                                                بالمواد</label>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <span class="switch switch-outline switch-icon switch-primary">
                                                                                                <label>
                                                                                                    <input type="checkbox" id="Pricing_with_materials" {{ array_key_exists("PricingWithMaterials",json_decode($item->application_conditions))?'checked':''}} value="" name="PricingWithMaterials">
                                                                                                    <span></span>
                                                                                                </label>
                                                                                            </span>

                                                                                        </div>

                                                                                    </div>

                                                                                    <div style=""
                                                                                        class="input-group-prepend switch-outer-container col-md-4 ">

                                                                                        <div class="col-md-8 text-start">
                                                                                            <label for="">مطابق
                                                                                                للكود السعودي</label>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <span
                                                                                                class="switch switch-outline switch-icon switch-primary">
                                                                                                <label>

                                                                                                    <input type="checkbox"
                                                                                                        id="CodeKSA"
                                                                                                        {{ array_key_exists("CodeKSA",json_decode($item->application_conditions))?'checked':''}}
                                                                                                        value=""
                                                                                                        name="CodeKSA">

                                                                                                    <span></span>
                                                                                                </label>
                                                                                            </span>

                                                                                        </div>




                                                                                    </div>


                                                                                    <div style=""
                                                                                        class="input-group-prepend switch-outer-container col-md-4 mb-4">

                                                                                        <div class="col-md-6 text-start"
                                                                                            style="    text-align: right;">
                                                                                            <label for=""> تصنيف
                                                                                                المنشآة</label>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <span
                                                                                                class="switch switch-outline switch-icon switch-primary">
                                                                                                <label>

                                                                                                    <input type="checkbox"
                                                                                                        id="Classification_is_required"
                                                                                                        value="off"
                                                                                                        {{ array_key_exists("Classification",json_decode($item->application_conditions))?'checked':''}}
                                                                                                        name="Classification">

                                                                                                    <span></span>
                                                                                                </label>
                                                                                            </span>

                                                                                        </div>




                                                                                    </div>




                                                                                    <div class="col-md-5 ">
                                                                                        <div class="form-group "
                                                                                            id="Category_Category"
                                                                                            {{ array_key_exists("Classification",json_decode($item->application_conditions))?'':'hidden'}} >
                                                                                            <label class="fieldlabels">فئة
                                                                                                التصنيف</label>
                                                                                            <input type="text"
                                                                                                name="Category_Category"
                                                                                                placeholder=""
                                                                                                data-error="#ErrorCategory_Category"
                                                                                                aria-describedby="inputGroupPrepend"
                                                                                                value="{{ array_key_exists("Category_Category",json_decode($item->application_conditions))?json_decode($item->application_conditions)->Category_Category:''}}"
                                                                                                
                                                                                                class="form-control mb-3"
                                                                                                required="">
                                                                                        </div>
                                                                                        <div class="errorTxt col-md-12">
                                                                                            <span class="spanError"
                                                                                                id="ErrorCategory_Category"></span>
                                                                                        </div>
                                                                                    </div>


                                                                                    <br>
                                                                                    <div style="align-self: center;"
                                                                                        class="input-group-prepend switch-outer-container col-md-4">

                                                                                        <div class="col-md-6 text-left">
                                                                                            <label for="">فئة
                                                                                                البناء</label>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <span
                                                                                                class="switch switch-outline switch-icon switch-primary">
                                                                                                <label>

                                                                                                    <input type="checkbox"
                                                                                                        id="Building_Category"
                                                                                                        value="off"
                                                                                                        {{ array_key_exists("Building_Category",json_decode($item->application_conditions))?'checked':''}}
                                                                                                        name="Building_Category">

                                                                                                    <span></span>
                                                                                                </label>
                                                                                            </span>

                                                                                        </div>




                                                                                    </div>




                                                                                    <div class="col-md-3 mt-4 ">
                                                                                        <div class="form-group">
                                                                                            <div class="custom-radio-1" style=" float: none;"
                                                                                                id="Building_Category_choices"
                                                                                                {{ array_key_exists("Building_Category",json_decode($item->application_conditions))?'':'hidden'}}>
                                                                                                <label style="  margin-left: 2%">
                                                                                                    اختر الفئة</label>
                                                                                                <label
                                                                                                    for="rdo-Building_Category_choices-a"
                                                                                                    class="btn-radio">
                                                                                                    <input type="radio"
                                                                                                        id="rdo-Building_Category_choices-a"
                                                                                                        name="Building_Category_choices"
                                                                                                        value="A"  {{ array_key_exists("Building_Category_choices",json_decode($item->application_conditions))?(json_decode($item->application_conditions)->Building_Category_choices=='A'?'checked':''):''}}>
                                                                                                    <svg width="20px"
                                                                                                        height="20px"
                                                                                                        viewBox="0 0 20 20">
                                                                                                        <circle
                                                                                                            cx="10"
                                                                                                            cy="10"
                                                                                                            r="9">
                                                                                                        </circle>
                                                                                                        <path
                                                                                                            d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z"
                                                                                                            class="inner">
                                                                                                        </path>
                                                                                                        <path
                                                                                                            d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z"
                                                                                                            class="outer">
                                                                                                        </path>
                                                                                                    </svg>
                                                                                                    <span>A</span>
                                                                                                </label>

                                                                                                <label
                                                                                                    for="rdo-Building_Category_choices-b"
                                                                                                    class="btn-radio">
                                                                                                    <input type="radio"
                                                                                                        id="rdo-Building_Category_choices-b"
                                                                                                        name="Building_Category_choices"
                                                                                                        value="B" {{ array_key_exists("Building_Category_choices",json_decode($item->application_conditions))?(json_decode($item->application_conditions)->Building_Category_choices=='B'?'checked':''):''}}>
                                                                                                    <svg width="20px"
                                                                                                        height="20px"
                                                                                                        viewBox="0 0 20 20">
                                                                                                        <circle
                                                                                                            cx="10"
                                                                                                            cy="10"
                                                                                                            r="9">
                                                                                                        </circle>
                                                                                                        <path
                                                                                                            d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z"
                                                                                                            class="inner">
                                                                                                        </path>
                                                                                                        <path
                                                                                                            d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z"
                                                                                                            class="outer">
                                                                                                        </path>
                                                                                                    </svg>
                                                                                                    <span>B</span>
                                                                                                </label>

                                                                                                <label
                                                                                                    for="rdo-Building_Category_choices-c"
                                                                                                    class="btn-radio">
                                                                                                    <input type="radio"
                                                                                                        id="rdo-Building_Category_choices-c"
                                                                                                        name="Building_Category_choices"
                                                                                                        value="c" {{ array_key_exists("Building_Category_choices",json_decode($item->application_conditions))?(json_decode($item->application_conditions)->Building_Category_choices=='c'?'checked':''):''}}>
                                                                                                    <svg width="20px"
                                                                                                        height="20px"
                                                                                                        viewBox="0 0 20 20">
                                                                                                        <circle
                                                                                                            cx="10"
                                                                                                            cy="10"
                                                                                                            r="9">
                                                                                                        </circle>
                                                                                                        <path
                                                                                                            d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z"
                                                                                                            class="inner">
                                                                                                        </path>
                                                                                                        <path
                                                                                                            d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z"
                                                                                                            class="outer">
                                                                                                        </path>
                                                                                                    </svg>
                                                                                                    <span>c</span>
                                                                                                </label>



                                                                                            </div>
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="col-md-4 mt-4 ">

                                                                                        <div class="form-group mb-4">

                                                                                            <div class="checkbox-inline"
                                                                                                id="employment">

                                                                                                <label>{{__('backend.employment')}}</label>
                                                                                                <label class="checkbox">
                                                                                                    <input type="checkbox" {{ array_key_exists("employment_on_warranty",json_decode($item->application_conditions))?'checked':''}}
                                                                                                        name="employment_on_warranty">
                                                                                                    <span></span>{{__('backend.on warranty')}}</label>
                                                                                                <label class="checkbox">
                                                                                                    <input type="checkbox" {{ array_key_exists("employment_rent_contract",json_decode($item->application_conditions))?'checked':''}}
                                                                                                        name="employment_rent_contract">
                                                                                                    <span></span>{{__('backend.rent contract')}}</label>

                                                                                            </div>



                                                                                        </div>
                                                                                    </div>



                                                                                    <div id="on_off"
                                                                                        class="col-md-12 mt-2">
                                                                                    </div>





                                                                                </div>
                                                                            </div> 
                                                                        
                                                                            @elseif ($item['type']==4)
                                                                            <div style="padding: 35px 20px 10px 20px;border: solid 1px #ced4da;border-radius: 30px;margin-top: 3rem !important;">
                                                                                <label class="fieldlabels" style="
                                                                                        top: 62px;
                                                                                        position: absolute;
                                                                                        right: 75px;
                                                                                        ">{{__('backend.Application conditions')}}</label>
                                                                                <div class="row align-items-center">
                                                                                
                                                                                        
                                                                                        <div class="col-md-4 mb-4">
                                                                                            <div style="align-self: center;"
                                                                                                class="input-group-prepend switch-outer-container">
                                                                                                <div class="col-md-6 text-start" style="    text-align: start;">
                                                                                                    <label for="">{{__('backend.Bank guarantee')}}</label>
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <span
                                                                                                        class="switch switch-outline switch-icon switch-primary">
                                                                                                        <label>
                                                                                                            <input type="checkbox"value="" {{ array_key_exists("Bank_guarantee",json_decode($item->application_conditions))?'checked':''}} name="Bank_guarantee">
                                                                                                            <span></span>
                                                                                                        </label>
                                                                                                    </span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                
                                                                                        <div style="" class="input-group-prepend switch-outer-container col-md-4 mb-4">
                                                                                
                                                                                        <div class="col-md-6 text-start" style="    text-align: right;">
                                                                                          <label for=""> تصنيف المنشآة</label>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                          <span class="switch switch-outline switch-icon switch-primary">
                                                                                          <label>
                                                                                      
                                                                                              <input type="checkbox" id="Classification_is_required"   {{ array_key_exists("Classification",json_decode($item->application_conditions))?'checked':''}} value="" name="Classification">
                                                                                                  
                                                                                              <span></span>
                                                                                          </label>
                                                                                      </span>
                                                                                      
                                                                                      </div>
                                                                                      
                                                                                      
                                                                                      
                                                                                      
                                                                                      </div>
                                                                                      
                                                                                      
                                                                                      
                                                                                      
                                                                                        <div class="col-md-4 ">
                                                                                          <div class="form-group " id="Category_Category"  {{ array_key_exists("Classification",json_decode($item->application_conditions))?'':'hidden'}}>
                                                                                              <label class="fieldlabels">فئة التصنيف</label>
                                                                                              <input type="text" name="Category_Category" placeholder="" data-error="#ErrorCategory_Category" aria-describedby="inputGroupPrepend" value="{{ array_key_exists("Category_Category",json_decode($item->application_conditions))?json_decode($item->application_conditions)->Category_Category:''}}"  class="form-control mb-3" required="">
                                                                                          </div>
                                                                                           <div class="errorTxt col-md-12">
                                                                                            <span class="spanError" id="ErrorCategory_Category"></span>
                                                                                        </div>
                                                                                          </div>
                                                                                         
                                                                                      <div class="col-md-4 mt-4  ml-2">
                                                                                                
                                                                                                   <div class="form-group mb-4">
                                                                                                      
                                                                                                       <div class="checkbox-inline" id="employment"> 
                                                                                                       
                                                                                                       <label >{{__('backend.employment')}}</label>
                                                                                                           <label class="checkbox">
                                                                                                               <input type="checkbox"  name="employment_on_warranty"  {{ array_key_exists("employment_on_warranty",json_decode($item->application_conditions))?'checked':''}}>
                                                                                                               <span></span>{{__('backend.on warranty')}}</label>
                                                                                                           <label class="checkbox">
                                                                                                               <input type="checkbox" name="employment_rent_contract" {{ array_key_exists("employment_rent_contract",json_decode($item->application_conditions))?'checked':''}}>
                                                                                                               <span></span>{{__('backend.rent contract')}}</label>
                                                                                                         
                                                                                                       </div>
                                                                                                  
                                                                                                     
                                                                                                      
                                                                                                      </div>
                                                                                                      </div>
                                                                                      
                                                                                
                                                                                
                                                                                
                                                                                
                                                                                </div>
                                                                                
                                                                            </div>
                                                                                
                                                                                
                                                                            @elseif ($item['type']==5|| $item['type']==2||$item['type']==3)
                                                                            <div style="padding: 35px 20px 10px 20px;border: solid 1px #ced4da;border-radius: 30px;margin-top: 3rem !important;">
                                                                                <label class="fieldlabels" style="
                                                                                        top: 62px;
                                                                                        position: absolute;
                                                                                        right: 75px;
                                                                                        ">{{__('backend.Application conditions')}} </label>
                                                                                <div class="row">
                                                                                
                                                                                        
                                                                                        <div class="col-md-3 mb-4">
                                                                                            <div style="align-self: center;"
                                                                                                class="input-group-prepend switch-outer-container">
                                                                                                <div class="col-md-8 text-start" style="    text-align: start;">
                                                                                                    <label for="">{{__('backend.Bank guarantee')}}</label>
                                                                                                </div>
                                                                                                <div class="col-md-4">
                                                                                                    <span
                                                                                                        class="switch switch-outline switch-icon switch-primary">
                                                                                                        <label>
                                                                                                            <input type="checkbox"value="" {{ array_key_exists("Bank_guarantee",json_decode($item->application_conditions))?'checked':''}} name="Bank_guarantee">
                                                                                                            <span></span>
                                                                                                        </label>
                                                                                                    </span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div style="" class="input-group-prepend switch-outer-container col-md-4 ">
                                                                                
                                                                                  <div class="col-md-8 text-start">
                                                                                    <label for="">مطابق للكود السعودي</label>
                                                                                  </div>
                                                                                  <div class="col-md-4">
                                                                                    <span class="switch switch-outline switch-icon switch-primary">
                                                                                    <label>
                                                                                
                                                                                        <input type="checkbox" id="CodeKSA" {{ array_key_exists("CodeKSA",json_decode($item->application_conditions))?'checked':''}} value="" name="CodeKSA">
                                                                                            
                                                                                        <span></span>
                                                                                    </label>
                                                                                </span>
                                                                                
                                                                                </div>
                                                                                </div>
                                                                                <div style="" class="input-group-prepend switch-outer-container col-md-5">
                                                                                
                                                                                  <div class="col-md-9 text-start">
                                                                                    <label for=""> مطابق لهيئة المواصفات والمقاييس السعودية</label>
                                                                                  </div>
                                                                                  <div class="col-md-3">
                                                                                    <span class="switch switch-outline switch-icon switch-primary">
                                                                                    <label>
                                                                                
                                                                                        <input type="checkbox" id="conforming"  value="" {{ array_key_exists("conforming",json_decode($item->application_conditions))?'checked':''}} name="conforming">
                                                                                            
                                                                                        <span></span>
                                                                                    </label>
                                                                                </span>
                                                                                
                                                                                </div>
                                                                                
                                                                                
                                                                                
                                                                                
                                                                                
                                                                                
                                                                                
                                                                                
                                                                                </div>
                                                                               </div> 
                                                                                </div> 
                                                                            @elseif ($item['type']==6)
                                                                            <div style="padding: 35px 20px 10px 20px;border: solid 1px #ced4da;border-radius: 30px;margin-top: 3rem !important;">
                                                                                <label class="fieldlabels" style="
                                                                                        top: 62px;
                                                                                        position: absolute;
                                                                                        right: 75px;
                                                                                        ">{{__('backend.Application conditions')}} </label>
                                                                                <div class="row" >
                                                                                
                                                                                        
                                                                                        <div class="col-md-5">
                                                                                            <div style="align-self: center;"
                                                                                                class="input-group-prepend switch-outer-container">
                                                                                                <div class="col-md-6 text-start" style="    text-align: start;">
                                                                                                    <label for="">إقامة سارية المفعول</label>
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <span
                                                                                                        class="switch switch-outline switch-icon switch-primary">
                                                                                                        <label>
                                                                                                            <input type="checkbox"value="" name="residintal" {{ array_key_exists("residintal",json_decode($item->application_conditions))?'checked':''}}>
                                                                                                            <span></span>
                                                                                                        </label>
                                                                                                    </span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                
                                                                                
                                                                                
                                                                                <div class="col-md-7 ">
                                                                                 
                                                                                <div class="checkbox-inline" id="employment"> 
                                                                                
                                                                                    <label class="checkbox">
                                                                                        <input type="checkbox"  name="employment_on_warranty" {{ array_key_exists("employment_on_warranty",json_decode($item->application_conditions))?'checked':''}}>
                                                                                        <span></span>{{__('backend.on warranty')}}</label>
                                                                                    <label class="checkbox">
                                                                                        <input type="checkbox" name="employment_rent_contract" {{ array_key_exists("employment_rent_contract",json_decode($item->application_conditions))?'checked':''}}>
                                                                                        <span></span>{{__('backend.rent contract')}}</label>
                                                                                  
                                                                                </div>           
                                                                                </div>
                                                                                
                                                                                
                                                                                
                                                                                <div id="on_off" class="col-md-12 mt-2">
                                                                                  </div>
                                                                                
                                                                                
                                                                                 
                                                                                
                                                                                
                                                                                </div>
                                                                                </div>
                                                                            @elseif ($item['type']==7)
                                                                            <div style="padding: 35px 20px 10px 20px;border: solid 1px #ced4da;border-radius: 30px;margin-top: 3rem !important;">
                                                                                <label class="fieldlabels" style="
                                                                                        top: 62px;
                                                                                        position: absolute;
                                                                                        right: 75px;
                                                                                        ">{{__('backend.Application conditions')}}</label>
                                                                                <div class="row">
                                                                                
                                                                                        
                                                                                        <div class="col-md-4 mb-4">
                                                                                            <div style="align-self: center;"
                                                                                                class="input-group-prepend switch-outer-container">
                                                                                                <div class="col-md-6 text-start" style="    text-align: start;">
                                                                                                    <label for="">{{__('backend.Bank guarantee')}}</label>
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <span
                                                                                                        class="switch switch-outline switch-icon switch-primary">
                                                                                                        <label>
                                                                                                            <input type="checkbox"value="" name="Bank_guarantee" {{ array_key_exists("Bank_guarantee",json_decode($item->application_conditions))?'checked':''}}>
                                                                                                            <span></span>
                                                                                                        </label>
                                                                                                    </span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                <div style="" class="input-group-prepend switch-outer-container col-md-4">
                                                                                
                                                                                  <div class="col-md-6 text-start">
                                                                                    <label for="">التسعير بالمواد</label>
                                                                                  </div>
                                                                                  <div class="col-md-6">
                                                                                    <span class="switch switch-outline switch-icon switch-primary">
                                                                                    <label>
                                                                                
                                                                                        <input type="checkbox" id="Pricing_with_materials" value="" name="PricingWithMaterials" {{ array_key_exists("PricingWithMaterials",json_decode($item->application_conditions))?'checked':''}}>
                                                                                            
                                                                                        <span></span>
                                                                                    </label>
                                                                                </span>
                                                                                
                                                                                </div>
                                                                                
                                                                                </div>
                                                                                
                                                                                <div style="" class="input-group-prepend switch-outer-container col-md-4 ">
                                                                                
                                                                                  <div class="col-md-8 text-start">
                                                                                    <label for="">مطابق للكود السعودي</label>
                                                                                  </div>
                                                                                  <div class="col-md-4">
                                                                                    <span class="switch switch-outline switch-icon switch-primary">
                                                                                    <label>
                                                                                
                                                                                        <input type="checkbox" id="CodeKSA" value="" name="CodeKSA" {{ array_key_exists("CodeKSA",json_decode($item->application_conditions))?'checked':''}}>
                                                                                            
                                                                                        <span></span>
                                                                                    </label>
                                                                                </span>
                                                                                
                                                                                </div>
                                                                                
                                                                                
                                                                                
                                                                                
                                                                                </div>
                                                                                
                                                                                
                                                                                <div style="" class="input-group-prepend switch-outer-container col-md-4">
                                                                                
                                                                                  <div class="col-md-6 text-start" style="    text-align: right;">
                                                                                    <label for=""> تصنيف المنشآة</label>
                                                                                  </div>
                                                                                  <div class="col-md-6">
                                                                                    <span class="switch switch-outline switch-icon switch-primary">
                                                                                    <label>
                                                                                
                                                                                        <input type="checkbox" id="Classification_is_required" value="" {{ array_key_exists("Classification",json_decode($item->application_conditions))?'checked':''}} name="Classification">
                                                                                            
                                                                                        <span></span>
                                                                                    </label>
                                                                                </span>
                                                                                
                                                                                </div>
                                                                                
                                                                                
                                                                                
                                                                                
                                                                                </div>
                                                                                
                                                                                
                                                                                
                                                                                
                                                                                  <div class="col-md-5 ">
                                                                                    <div class="form-group " id="Category_Category" {{ array_key_exists("Classification",json_decode($item->application_conditions))?'':'hidden'}}>
                                                                                        <label class="fieldlabels">فئة التصنيف</label>
                                                                                        <input type="text" name="Category_Category" placeholder="" data-error="#ErrorCategory_Category" aria-describedby="inputGroupPrepend" value="{{ array_key_exists("Category_Category",json_decode($item->application_conditions))?json_decode($item->application_conditions)->Category_Category:''}}" class="form-control mb-3" required="">
                                                                                    </div>
                                                                                     <div class="errorTxt col-md-12">
                                                                                      <span class="spanError" id="ErrorCategory_Category"></span>
                                                                                  </div>
                                                                                    </div>
                                                                                   
                                                                                
                                                                                  <br>
                                                                                
                                                                                
                                                                                
                                                                                
                                                                                
                                                                                 
                                                                                
                                                                                <div class="col-md-4 mt-4 ml-2 ">
                                                                                          
                                                                                             <div class="form-group mb-4">
                                                                                                
                                                                                                 <div class="checkbox-inline" id="employment"> 
                                                                                                 
                                                                                                 <label >{{__('backend.employment')}}</label>
                                                                                                     <label class="checkbox">
                                                                                                         <input type="checkbox"  name="employment_on_warranty" {{ array_key_exists("employment_on_warranty",json_decode($item->application_conditions))?'checked':''}}>
                                                                                                         <span></span>{{__('backend.on warranty')}}</label>
                                                                                                     <label class="checkbox">
                                                                                                         <input type="checkbox" name="employment_rent_contract" {{ array_key_exists("employment_rent_contract",json_decode($item->application_conditions))?'checked':''}}>
                                                                                                         <span></span> {{__('backend.rent contract')}}</label>
                                                                                                   
                                                                                                 </div>
                                                                                            
                                                                                               
                                                                                                
                                                                                                </div>
                                                                                                </div>
                                                                                            </div> 
                                                                                
                                                                                        </div>
                                                                                
                                                                            @endif
                                                                           
                                                                            <div id="on_off1"
                                                                                class="col-md-12 mt-5 mb-5">
                                                                                <label
                                                                                    class="fieldlabels">{{ __('backend.Services provided') }}</label>

                                                                            </div>
                                                                            @if ($item['type']!=6)
                                                                          
                                                                            <div
                                                                                style=" padding: 20px 28px 0px 28px;border: solid 1px #ced4da;border-radius: 30px;">
                                                                                <label class="fieldlabels"
                                                                                    style="    top: -30px;
                                                                                right: -42%;
                                                                                position: relative;">{{ __('backend.The required paperwork') }}</label>
                                                                                <div class="row">

                                                                                    <div class="form-group"
                                                                                        style="padding-right: inherit;"
                                                                                        id="subActivity">
                                                                                        @if (isset(json_decode($item->application_conditions)->Certificate))
                                                                                            @php
                                                                                                $Certificate_conditions = explode(',', json_decode($item->application_conditions)->Certificate[0]);
                                                                                            @endphp
                                                                                            @foreach ((array) $Certificate as $Kn => $CertificateItem)
                                                                                                <input
                                                                                                    id="{{ $Kn }}"
                                                                                                    onclick="toogleButton(this,tt{{ $Kn }})"
                                                                                                    class="btn {{ in_array($CertificateItem, $Certificate_conditions) ? 'btn-primary' : 'btn-outline-primary' }} btn-rounded mb-4"
                                                                                                    type="button"
                                                                                                    style="margin-right: 8px;"
                                                                                                    value="{{ $CertificateItem }}">
                                                                                                <input
                                                                                                    id='tt{{ $Kn }}'
                                                                                                    type="hidden"
                                                                                                    value="{{ in_array($CertificateItem, $Certificate_conditions) ? '1' : '0' }}">
                                                                                            @endforeach

                                                                                            <input type="hidden"
                                                                                                name="Certificate[]"
                                                                                                id="Certificate"
                                                                                                value="{{ json_decode($item->application_conditions)->Certificate[0] }}">
                                                                                        @else
                                                                                            @foreach ((array) $Certificate as $Kn => $Certificate)
                                                                                                <input
                                                                                                    id="{{ $Kn }}"
                                                                                                    onclick="toogleButton(this,tt{{ $Kn }})"
                                                                                                    class="btn btn-outline-primary btn-rounded mb-2"
                                                                                                    type="button"
                                                                                                    style="margin-right: 5px;"
                                                                                                    value="{{ $Certificate }}">
                                                                                                <input
                                                                                                    id='tt{{ $Kn }}'
                                                                                                    type="hidden"
                                                                                                    value="0">
                                                                                            @endforeach
                                                                                            <input type="hidden"
                                                                                                name="Certificate[]"
                                                                                                id="Certificate">
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                                  
                                                                            @endif
                                                                            <div class="row">
                                                                                <label class="fieldlabels"
                                                                                    style="    top: 38px;
                                                                                position: relative;">{{ __('backend.nots') }}</label>
                                                                                <div class="container-fluid">
                                                                                    <textarea class="form-control" name="nots" rows="5" dir="rtl"> {{ isset(json_decode($item->application_conditions)->nots) ? json_decode($item->application_conditions)->nots : '' }}</textarea>
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                    @if ($item['type']!=6)
                                                                    <a href="javascript:void(0);" name="previous"
                                                                    class="button1 previous action-button-previous"
                                                                    style="float: right;margin-right: 35px;"> <i
                                                                        class="las la-angle-double-right"
                                                                        style="position: relative;right: -25px;"></i>
                                                                    {{ __('backend.Previous') }} </a>
                                                                    <a href="javascript:void(0);" name="next"
                                                                    data-conditions="true"
                                                                    class="button1 next action-button"
                                                                    style="float: left;margin-left: 35px;">
                                                                    {{ __('backend.continue') }} <i
                                                                        class="las la-angle-double-left"
                                                                        style="position: relative;left: -25px;"></i>
                                                                    </a>

                                                                    @else
                                                                    <a href="javascript:void(0);" name="previous" class="button1 previous action-button-previous" style="float: right;margin-right: 35px;"> <i class="las la-angle-double-right" style="position: relative;right: -25px;"></i> {{__('backend.Previous')}}</a>
                                                                    <a href="javascript:void(0);" id="createItem" name="make_payment"   class="button1  action-button" style="float: left;margin-left: 35px;">  {{__('backend.send')}} <i class="las la-angle-double-left" style="position: relative;left: -25px;"></i> </a>

                                                                    @endif
                                          

                                                                    </fieldset>

                                                                @endif



                                                                <fieldset class="fildsetFile">
                                                                    <div class="form-card">
                                                                        @if (isset($item))
                                                                            @include('addItem.Ads.editFile')
                                                                        @else
                                                                            @include('addItem.Ads.createFile')
                                                                        @endif
                                                                    </div>

                                                                    <a href="javascript:void(0);" name="previous"
                                                                        class="button1 previous action-button-previous"
                                                                        style="float: right;margin-right: 35px;"> <i
                                                                            class="las la-angle-double-right"
                                                                            style="position: relative;right: -25px;"></i>
                                                                        {{ __('backend.Previous') }} </a>
                                                                    <a href="javascript:void(0);" id="createItem"
                                                                        name="make_payment" class="button1  action-button"
                                                                        style="float: left;margin-left: 35px;">
                                                                        {{ __('backend.send') }} <i
                                                                            class="las la-angle-double-left"
                                                                            style="position: relative;left: -25px;"></i>
                                                                    </a>


                                                                </fieldset>

                                                                <fieldset class="finalstep">
                                                                    <div class="form-card">
                                                                        <h5 class="fs-title mb-4 text-center">
                                                                            {{ __('backend.Congrats') }}</h5><br>
                                                                        <div class="row justify-content-center">
                                                                            <div class="col-md-3">
                                                                                <svg class="checkmark"
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    viewBox="0 0 52 52">
                                                                                    <circle class="checkmark__circle"
                                                                                        cx="26" cy="26"
                                                                                        r="25" fill="none" />
                                                                                    <path class="checkmark__check"
                                                                                        fill="none"
                                                                                        d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                                                                                </svg>
                                                                            </div>
                                                                        </div> <br><br>
                                                                        <div class="row justify-content-center">
                                                                            <div class="col-md-7 text-center">
                                                                                <p>{{ __('backend.You Have Successfully Add advertisement') }}
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>


                                                            </form>
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
    {!! Html::script('plugins/sweetalerts/sweetalert2.min.js') !!}
    {!! Html::script('assets/js/basicui/sweet_alerts.js') !!}
    {!! Html::script('assets/js/forms/multiple-step.js') !!}
    {!! Html::script('plugins/flatpickr/flatpickr.js') !!}
    {!! Html::script('plugins/flatpickr/custom-flatpickr.js') !!}
    {!! Html::script('assets/js/jquery.dropdown.js') !!}
    {!! Html::script('assets/js/mock.js') !!}

    {!! Html::script('assets/js/Ads.js') !!}
    {!! Html::script('plugins/editors/quill/quill.js') !!}
    {!! Html::script('plugins/editors/markdown/simplemde.min.js') !!}
    {!! Html::script('assets/js/forms/forms-text-editor.js') !!}

    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script src="{{ asset('editor.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#demo-editor-bootstrap").Editor();

            $(".Editor-editor").html($("#dd").val());
        });
    </script>
@endpush

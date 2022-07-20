@extends('layout.master-auth-manger')

@push('plugin-styles')
    {!! Html::style('plugins/notification/snackbar/snackbar.min.css') !!}
    {!! Html::style('assets/css/ui-elements/buttons.css') !!}
    {!! Html::style('assets/css/basic-ui/tabs.css') !!}
    {!! Html::style('plugins/dropify/dropify.min.css') !!}
    {!! Html::style('assets/css/pages/profile_edit.css') !!}
    {!! Html::style('assets/css/forms/form-widgets.css') !!}
    {!! Html::style('assets/css/forms/file-upload.css') !!}
    {!! Html::style('plugins/flatpickr/flatpickr.css') !!}
    {!! Html::style('plugins/flatpickr/custom-flatpickr.css') !!}
@endpush

@section('content')
    <?php
    $facilities = get_current_manger_faci();
    $current_user = Auth::guard('mangers')->user();
    $cities = get_cities();
    $userType = get_users_type();
    ?>

    <!--  Navbar Starts / Breadcrumb Area  -->
    <div class="sub-header-container">

    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->
    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
        <div class="layout-top-spacing mb-2">
            <div class="col-md-12">
                <div class="">
                    <div class="container p-0">
                        <div class="row layout-top-spacing date-table-container">
                            <!-- Datatable go to last page -->

                            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">


                                <div id="tabsWithIcons" class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <div class="statbox widget box box-shadow">
                                        <div class="widget-header">
                                            <div class="row">
                                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                    <h4>{{ __('backend.dashboard') }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content widget-content-area rounded-corner-pills-icon">
                                            <div class="row">
                                                <div class="col-md-2 mt-5">
                                                    <ul class="nav nav-pills mb-4 mt-3  justify-content-center"
                                                        id="rounded-corner-pills-icon-tab" role="tablist">
                                                        <li class="nav-item ml-2 mr-2">
                                                            <a class="nav-link mb-2 active text-center"
                                                                id="rounded-corner-pills-icon-home-tab" data-toggle="pill"
                                                                href="#rounded-corner-pills-icon-home" role="tab"
                                                                aria-controls="rounded-corner-pills-icon-home"
                                                                aria-selected="true"><i class="las la-home"></i>
                                                                {{ __('backend.my facility') }}</a>
                                                        </li>
                                                        <li class="nav-item ml-2 mr-2">
                                                            <a class="nav-link mb-2  text-center"
                                                                id="rounded-corner-pills-icon-profile-tab"
                                                                data-toggle="pill" href="#rounded-corner-pills-icon-profile"
                                                                role="tab" aria-controls="rounded-corner-pills-icon-profile"
                                                                aria-selected="true"><i class="las la-user-tie"></i>
                                                                {{ __('backend.My Account') }}</a>
                                                        </li>
                                                        {{-- <li class="nav-item ml-2 mr-2">
                                                            <a class="nav-link mb-2 text-center"
                                                                id="rounded-corner-pills-icon-about-tab" data-toggle="pill"
                                                                href="#rounded-corner-pills-icon-about" role="tab"
                                                                aria-controls="rounded-corner-pills-icon-about"
                                                                aria-selected="false"><i class="las la-life-ring"></i></i>
                                                                {{ __('backend.Technical support') }}</a>
                                                        </li> --}}
                                                        <li class="nav-item ml-2 mr-2" hidden>
                                                            <a class="nav-link mb-2 text-center"
                                                                id="rounded-corner-pills-icon-addfacil-tab"
                                                                data-toggle="pill"
                                                                href="#rounded-corner-pills-icon-addfacil" role="tab"
                                                                aria-controls="rounded-corner-pills-icon-addfacil"
                                                                aria-selected="false"><i class="las la-life-ring"></i></i>
                                                                {{ __('backend.Technical support') }}</a>
                                                        </li>

                                                    </ul>
                                                </div>

                                                <div class="col-md-10">
                                                    <div class="tab-content" id="rounded-corner-pills-icon-tabContent">
                                                        <div class="tab-pane fade show active"
                                                            id="rounded-corner-pills-icon-home" role="tabpanel"
                                                            aria-labelledby="rounded-corner-pills-icon-home-tab">
                                                            <div class="row">
                                                                @foreach ($facilities as $item)
                                                                    <div class="col-md-4 mt-5">
                                                                        <div class="card component-card_9 cardlog">
                                                                            <img class="card-img1" 
                                                                                src="{{ $item->logo != null ? url("image/$item->logo") : url('https://dummyimage.com/1200x900/e0e0e0/c7c7c7.png') }}"
                                                                                class="card-img-top" alt="widget-card-2">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title" style="color:#568c96;">
                                                                                    {{ $item->name }}</h5>
                                                                                <p class="card-text">
                                                                                    {{ __('backend.Commercial record') }}
                                                                                    :
                                                                                    {{ $item->CRecord }}</p>
                                                                                <div
                                                                                    class="d-flex align-items-center justify-content-between">

                                                                                    <div class="d-flex align-items-center">
                                                                                        <div class="text-danger mr-3"
                                                                                            style="font-size: 15px;">
                                                                                            <i class="las la-bell"></i>
                                                                                            {{ get_faci_notification_count($item->id) }}
                                                                                        </div>
                                                                                        <div class="text-info"
                                                                                            style="font-size: 15px;">
                                                                                            <i class="las la-comments"></i>
                                                                                            {{ get_faci_message_count($item->id) }}
                                                                                        </div>

                                                                                    </div>
                                                                                    @if($item->status=='active')
                                                                                     <p class="text-success card-status" >{{ __('backend.'.$item->status) }}</p>
                                                                                    @else
                                                                                     <p class="text-danger card-status" >{{ __('backend.'.$item->status) }}</p>
                                                                                    @endif
                                                                                   
                                                                                    <div class="d-flex align-items-center"> 
                                                                                       @if($item->status=='active')
                                                                                        <form method="POST"
                                                                                            action="{{ route('facil_login') }}">
                                                                                            @csrf
                                                                                            <input type="text" name="id"
                                                                                                value=" {{ $item->id }}"
                                                                                                hidden>
                                                                                          
                                                                                              <button type="submit"
                                                                                                class="btn btn-success btn-rounded ">{{ __('backend.sign in') }}</button>
                                                                                          
                                                                                         
                                                                                                
                                                                                        </form>
                                                                                        @else
                                                                                            <button 
                                                                                                class="btn  btn-rounded" >{{ __('backend.sign in') }}</button>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach


                                                                <div class="col-md-4 mt-5">
                                                                    <a class=" mb-2 text-center"
                                                                        href="javascript:void(0);"
                                                                        onclick="document.getElementById('rounded-corner-pills-icon-addfacil-tab').click()">
                                                                        <div class="card component-card_9 cardlog">
                                                                            <div class="card-body text-center" style="margin-bottom: 30%; margin-top: 29%;">
                                                                                <i class="las la-plus-circle "
                                                                                    style="color:gainsboro; margin: auto; font-size: 70px"></i>
                                                                                <h5>{{ __('backend.Open a facility file') }}
                                                                                    </h3>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="rounded-corner-pills-icon-about"
                                                            role="tabpanel"
                                                            aria-labelledby="rounded-corner-pills-icon-about-tab">
                                                            <div class="media">
                                                                <img class="mr-3"
                                                                    src="{{ url('assets/img/profile-10.jpg') }}"
                                                                    alt="Generic placeholder image">
                                                                <div class="media-body">
                                                                    <h5 class="mt-0">{{ __('Media heading') }}
                                                                    </h5>
                                                                    {{ __('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.') }}
                                                                    <div class="media mt-3">
                                                                        <a class="pr-3" href="#">
                                                                            <img src="{{ url('assets/img/profile-11.jpg') }}"
                                                                                alt="Generic placeholder image">
                                                                        </a>
                                                                        <div class="media-body">
                                                                            <h5 class="mt-0">
                                                                                {{ __('Media heading') }}
                                                                            </h5>
                                                                            {{ __('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.') }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="rounded-corner-pills-icon-addfacil"
                                                            role="tabpanel"
                                                            aria-labelledby="rounded-corner-pills-icon-about-tab">

                                                            <div class="tab-pane fade show active"
                                                                id="v-border-pills-general" role="tabpanel"
                                                                aria-labelledby="v-border-pills-general-tab">
                                                                <h5 class="text-center">
                                                                    {{ __('backend.Open a facility file') }}</h3>

                                                                    <div class=" text-center img-thumbnail">
                                                                        <input type="file" id="UploadLogo"
                                                                            class="dropify" data-max-file-size="2M"
                                                                            name="logo" />
                                                                        <p class="mt-2"><i
                                                                                class="flaticon-cloud-upload mr-1"></i>
                                                                            {{ __('backend.Upload Picture') }}</p>
                                                                    </div>

                                                                    <div class="row mt-10 md-0 mt-4">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="fullName">{{ __('backend.Facility Name') }}</label>
                                                                                <input type="text"
                                                                                    class="form-control mb-4 "
                                                                                    placeholder="{{ __('backend.Facility Name') }}"
                                                                                    name="name">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="CRecord">{{ __('backend.Commercial record') }}</label>
                                                                                <input type="text"
                                                                                    class="form-control mb-4 "
                                                                                    placeholder="{{ __('backend.Commercial record') }}"
                                                                                    name="CRecord">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-10 md-0 mt-4">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="fullName">{{ __('backend.phone') }}</label>
                                                                                <input type="text"
                                                                                    class="form-control mb-4 "
                                                                                    placeholder="{{ __('backend.phone') }}"
                                                                                    name="phone">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="CRecord">{{ __('backend.email') }}</label>
                                                                                <input type="text"
                                                                                    class="form-control mb-4 "
                                                                                    placeholder="{{ __('backend.email') }}"
                                                                                    name="email">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row md-0 ">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="special number">{{ __('backend.special number') }}</label>
                                                                                <input type="text"
                                                                                    class="form-control mb-4 "
                                                                                    placeholder="{{ __('backend.special number') }}"
                                                                                    name="specialNumber">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="Tax Number">{{ __('backend.Tax Number') }}</label>
                                                                                <input type="text"
                                                                                    class="form-control mb-4 "
                                                                                    placeholder="{{ __('backend.Tax Number') }}"
                                                                                    name="TaxNumber">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="country">{{ __('backend.City') }}</label>
                                                                                <select class="form-control" name="city"
                                                                                    id="city">
                                                                                    <option value=""></option>
                                                                                    @foreach ($cities as $city)
                                                                                        <option
                                                                                            value="{{ $city->id }}">
                                                                                            {{ $city->name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="country">{{ __('backend.Neighborhood') }}</label>
                                                                                {{-- <select class="form-control"
                                                                                    name="Neighborhood" id="Neighborhood">



                                                                                </select> --}}
                                                                                 <input type="text" class="form-control mb-4 "
                                                                                placeholder="{{ __('backend.neighborhood') }}"
                                                                                name="Neighborhood">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="country">{{ __('backend.facility type') }}</label>
                                                                                <select class="form-control"
                                                                                    name="facility_type" id="facility_type">
                                                                                    <option value=""></option>
                                                                                    @foreach ($userType as $type)
                                                                                        <option
                                                                                            value="{{ $type->id }}">
                                                                                            {{ $type->name }}
                                                                                        </option>
                                                                                    @endforeach

                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="country">{{ __('backend.facility activity') }}</label>
                                                                                <select class="form-control"
                                                                                    name="facility_activity"
                                                                                    id="facility_activity">


                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row col-md-12">
                                                                            <?php
                                                                            $i = 0;
                                                                            
                                                                            ?>
                                                                            <div class="form-group"
                                                                                style="padding-right: inherit;"
                                                                                id="subActivity">

                                                                            </div>

                                                                            <button class="btn btn-success btn-rounded"
                                                                                id="AddFacility" style="position: absolute;
                                                                                        left: 1%;
                                                                                        bottom: -15px;">
                                                                                {{ __('backend.add') }}</button>

                                                                        </div>
                                                                    </div>

                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="rounded-corner-pills-icon-profile"
                                                            role="tabpanel"
                                                            aria-labelledby="rounded-corner-pills-icon-messages-tab">
                                                            <div class="tab-pane fade show active"
                                                                id="v-border-pills-general" role="tabpanel"
                                                                aria-labelledby="v-border-pills-general-tab">


                                                                <div class=" text-center img-thumbnail">
                                                                    <input type="file" id="UploadLogo"
                                                                        class="dropify"
                                                                        data-default-file="{{url('assets/img/avatar.png') }}"
                                                                        data-max-file-size="2M" name="logo" />
                                                                    <p class="mt-2"><i
                                                                            class="flaticon-cloud-upload mr-1"></i>
                                                                        {{ __('backend.Upload Picture') }}</p>
                                                                </div>

                                                                <div class="row mt-10 md-0 mt-4">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="fullName">{{ __('backend.name') }}</label>
                                                                            <input type="text" class="form-control mb-4 "
                                                                                placeholder="{{ __('backend.name') }}"
                                                                                name="name"
                                                                                value="{{ $current_user->name }}" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="IdCard">{{ __('backend.ID card number') }}</label>
                                                                            <input type="text" class="form-control mb-4 "
                                                                                placeholder="{{ __('backend.ID card number') }}"
                                                                                name="IdCard"
                                                                                value="{{ $current_user->IdCard }}" disabled>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row md-0 ">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="phone">{{ __('backend.phone') }}</label>
                                                                            <input type="text" class="form-control mb-4 "
                                                                                placeholder="{{ __('backend.phone') }}"
                                                                                name="phone"
                                                                                value="{{ $current_user->phone }}"
                                                                                disabled>
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
    {!! Html::script('plugins/dropify/dropify.min.js') !!}
    {!! Html::script('assets/js/add_facility.js') !!}
    
@endpush

@push('custom-scripts')
@endpush

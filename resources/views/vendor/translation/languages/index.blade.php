@extends('layout.master')

@section('content')
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
                                        href="javascript:void(0);">{{ __('backend.Languages') }}</a>
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
                                            <h4 class="table-header">{{ __('backend.Languages') }}</h4>

                                        </div>
                                        <div class="col-md-6">

                                        </div>
                                    </div>
                                    @if (count($languages))
                                        <div class="panel w-1/2">

                                            <div class="panel-header">

                                                {{ __('backend.Languages') }}

                                                <div class="flex flex-grow justify-end items-center">

                                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#zoomupModal" class="button btn-primary">
                                                        {{ __('backend.add') }}
                                                    </a>

                                                </div>

                                            </div>

                                            <div class="panel-body">

                                                <table>

                                                    <thead>
                                                        <tr>
                                                            <th>{{ __('backend.language_name') }}</th>
                                                            <th>{{ __('backend.Locale') }}</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @foreach ($languages as $language => $name)
                                                            <tr>
                                                                <td>
                                                                    <a
                                                                        href="{{ route('languages.translations.index', $language) }}">
                                                                    {{ __('backend.'.$name) }}
                                                                </td>
                                                                <td>
                                                                    
                                                                        {{ $language }}
                                                                   
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                            </div>

                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Body Ends -->
    <div id="zoomupModal" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('backend.add language') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <div class="panel w-1/2">

                    
            
                    <form action="{{ route('languages.store') }}" method="POST">

                        <fieldset>
            
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
                            <div class="panel-body p-4">
            
                                @include('translation::forms.text', ['field' => 'name', 'label' => __('backend.language_name'), ])
            
                                @include('translation::forms.text', ['field' => 'locale', 'label' => __('backend.Locale'), ])
            
                            </div>
            
                        </fieldset>
            
                        <div class="panel-footer flex flex-row-reverse">
            
                            <button class="button button-blue">
                                {{ __('backend.add') }}
                            </button>
            
                        </div>
            
                    </form>
            
            
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    {!! Html::script('plugins/notification/snackbar/snackbar.min.js') !!}
    {!! Html::script('assets/js/basicui/notifications.js') !!}
@endpush


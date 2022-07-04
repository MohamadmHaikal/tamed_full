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
                                        href="javascript:void(0);">{{ __('backend.Translation') }}</a>
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
                                            <h4 class="table-header">{{ __('backend.Translation') }}</h4>

                                        </div>
                                        <div class="col-md-6">

                                        </div>
                                    </div>
                                    <div id="app">




                                        <form
                                            action="{{ route('languages.translations.index', ['language' => $language]) }}"
                                            method="get">

                                            <div class="panel">

                                                <div class="panel-header">

                                                 

                                                    <div class=" row flex flex-grow  items-center">

                                                        @include(
                                                            'translation::forms.search',
                                                            ['name' => 'filter', 'value' => Request::get('filter')]
                                                        )

                                                        @include(
                                                            'translation::forms.select',
                                                            [
                                                                'name' => 'language',
                                                                'items' => $languages,
                                                                'submit' => true,
                                                                'selected' => $language,
                                                            ]
                                                        )

                                                        <div class="sm:hidden lg:flex items-center">

                                                            @include(
                                                                'translation::forms.select',
                                                                [
                                                                    'name' => 'group',
                                                                    'items' => $groups,
                                                                    'submit' => true,
                                                                    'selected' => Request::get('group'),
                                                                    'optional' => true,
                                                                ]
                                                            )

                                                            <a href="javascript:void(0);" data-toggle="modal"
                                                                data-target="#zoomupModal" class="button btn-primary">
                                                                {{ __('backend.add') }}
                                                            </a>

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="panel-body">

                                                    @if (count($translations))
                                                        <table>

                                                            <thead>
                                                                <tr>
                                                                    <th class="w-1/5 uppercase font-thin">
                                                                        {{ __('backend.Group') }}</th>
                                                                    <th class="w-1/5 uppercase font-thin">
                                                                        {{ __('backend.key') }}</th>
                                                                    <th class="uppercase font-thin">{{ __('backend.ar') }}
                                                                    </th>
                                                                    <th class="uppercase font-thin">
                                                                        {{ __('backend.' . $language) }}</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                @foreach ($translations as $type => $items)
                                                                    @foreach ($items as $group => $translations)
                                                                        @foreach ($translations as $key => $value)
                                                                            @if (!is_array($value['ar']))
                                                                                <tr>
                                                                                    <td>{{ $group }}</td>
                                                                                    <td>{{ $key }}</td>
                                                                                    <td>{{ $value['ar'] }}</td>
                                                                                    <td>
                                                                                        <translation-input
                                                                                            initial-translation="{{ $value[$language] }}"
                                                                                            language="{{ $language }}"
                                                                                            group="{{ $group }}"
                                                                                            translation-key="{{ $key }}"
                                                                                            route="{{ config('translation.ui_url') }}">
                                                                                        </translation-input>
                                                                                    </td>
                                                                                </tr>
                                                                            @endif
                                                                        @endforeach
                                                                    @endforeach
                                                                @endforeach
                                                            </tbody>

                                                        </table>
                                                    @endif

                                                </div>

                                            </div>

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
    <!-- Main Body Ends -->
    <div id="zoomupModal" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('backend.add translation') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <div class="panel w-1/2">



                    <form action="{{ route('languages.translations.store', 'ar') }}" method="POST">

                        <fieldset>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="panel-body p-4">

                                @include('translation::forms.text', [
                                    'field' => 'group',
                                    'label' => __('backend.GROUP (OPTIONAL)'),
                                ])

                                @include('translation::forms.text', [
                                    'field' => 'key',
                                    'label' => __('backend.key'),
                                ])

                                @include('translation::forms.text', [
                                    'field' => 'value',
                                    'label' => __('backend.value'),
                                ])


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
    {!! Html::script('/vendor/translation/js/app.js') !!}
@endpush

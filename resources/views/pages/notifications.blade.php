@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/ui-elements/pagination.css') !!}
    {!! Html::style('assets/css/pages/notifications.css') !!}
    {!! Html::style('assets/css/forms/switch-theme.css') !!}
@endpush

@section('content')
    <!--  Navbar Starts / Breadcrumb Area Starts -->
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

                                <li class="breadcrumb-item active" aria-current="page">
                                    <span>{{ __('backend.notifications') }}</span>
                                </li>
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
        <div class="row layout-top-spacing">
            <div class="apps-ticket col-xl-12 col-lg-12 col-md-12">
                <div class="row">
                    <div class="col-xl-12 col-md-12 layout-spacing">
                        <div class="notifications-table-widget">
                            <div class="widget-heading">
                                <h5 class="">{{ __('backend.notifications') }}</h5>
                                {{-- <div class="d-none d-md-flex switch-outer-container">
                                    {{ __('Do not disturb') }}
                                    <span class="switch">
                                        <label>
                                            <input type="checkbox" checked="checked" name="select">
                                            <span></span>
                                        </label>
                                    </span>
                                </div> --}}
                            </div>
                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>

                                                <th data-priority="1">

                                                    <div class="th-content">#{{ __('backend.id') }}</div>
                                                </th>
                                                <th data-priority="1">
                                                    <div class="th-content">{{ __('backend.title') }}</div>
                                                </th>
                                                <th data-priority="3">
                                                    <div class="th-content">{{ __('backend.message') }}</div>

                                                </th>
                                                <th data-priority="4">
                                                    <div class="th-content">{{ __('backend.type') }}</div>

                                                </th>
                                                <th data-priority="5">{{ __('backend.Created at') }}</th>
                                                <th data-priority="-1"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($allNotifications['total'])
                                                @foreach ($allNotifications['results'] as $item)
                                                    <tr>
                                                        <td>{{ $item->ID }}</td>
                                                        <td>
                                                          
                                                                {!! balanceTags($item->title) !!} 
                                                            
                                                        </td>

                                                        <td >{{ $item->message }}</td>
                                                        <td>{{ $item->type }}</td>
                                                        <td>{{ date('Y-m-d', strtotime($item->created_at)) }}
                                                        </td>
                                                        <td>

                                                            <a class=" bs-tooltip font-20 ml-2 text-danger"
                                                                href="{{ route('delete-notification', [$item->ID]) }}"
                                                                data-parent="tr"
                                                                data-original-title="{{ __('backend.Delete') }}">
                                                                <i class="las la-trash"></i></a>
                                                            </a>


                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td class="d-none"></td>
                                                    <td class="d-none"></td>
                                                    <td class="d-none"></td>
                                                    <td class="d-none"></td>
                                                    <td class="d-none"></td>
                                                    <td colspan="6">
                                                        <h4 class="mt-3 text-center">{{ __('No notification yet .') }}
                                                        </h4>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                    <div class="pagination p13">
                                        <ul class="mx-auto">
                                            {{ dashboard_pagination(['total' => $allNotifications['total']]) }}

                                        </ul>
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
@endpush

@push('custom-scripts')
@endpush

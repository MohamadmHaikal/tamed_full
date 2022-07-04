@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/apps/file-manager.css') !!}
    {!! Html::style('assets/css/elements/tooltip.css') !!}
    {!! Html::style('plugins/bootstrap-select/bootstrap-select.min.css') !!}
    {!! Html::style('plugins/sweetalerts/sweetalert2.min.css') !!}
    {!! Html::style('plugins/sweetalerts/sweetalert.css') !!}
    {!! Html::style('assets/css/basic-ui/custom_sweetalert.css') !!}
    {!! Html::style('plugins/notification/snackbar/snackbar.min.css') !!}
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
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span>{{ __('backend.FileManger') }}</span>
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
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="row">
                    <div class="col-xl-12  col-md-12">
                        <div class="card-box file-manager">

                            <div class="file-manager-right">

                                <div class="file-manager-bottom-default">
                                    <div class="file-manager-right-bottom">
                                        <div class="mt-4 d-block">

                                            <div class="mt-4">
                                                <h6>{{ __('backend.Quick access files') }}</h6>
                                            </div>
                                            <div class="file-list">
                                                <div class="file pdf" id="pdf">
                                                    <i class="lar la-file-pdf file-icon"></i>
                                                    <div>
                                                        <p class="main-title">{{ __('backend.ملفات pdf') }}</p>
                                                        {{-- <p class="sub-title">{{ __('Last Modified') }}</p>
                                                        <p class="date">{{ __('20 Aug 2020') }}</p> --}}
                                                    </div>
                                                </div>
                                                <div class="file doc" id="doc">
                                                    <i class="lar la-file-word file-icon"></i>
                                                    <div>
                                                        <p class="main-title">{{ __('backend.Word files') }}</p>
                                                        {{-- <p class="sub-title">{{ __('Last Modified') }}</p>
                                                        <p class="date">{{ __('20 Aug 2020') }}</p> --}}
                                                    </div>
                                                </div>
                                                <div class="file xlsx" id="xlsx">
                                                    <i class="lar la-file-excel file-icon"></i>
                                                    <div>
                                                        <p class="main-title">{{ __('backend.excel files') }}</p>
                                                        {{-- <p class="sub-title">{{ __('Last Modified') }}</p>
                                                        <p class="date">{{ __('20 Aug 2020') }}</p> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 layout-spacing">
                                        <div class="files-table">
                                            <div class="files-t-heading">
                                                <h6 class="mb-0" id="all">{{ __('backend.All Files') }}</h6>
                                                <div class="search">
                                                    <i class="las la-search toggle-search mr-5"></i>
                                                    <form class="form-inline search-full form-inline search" role="search">
                                                        <div class="search-bar">
                                                            <input type="text"
                                                                class="form-control search-form-control  ml-lg-auto"
                                                                placeholder="{{ __('backend.Search Files') }}">
                                                        </div>
                                                    </form>
                                                </div>

                                                <label for="UploadFile"
                                                    class="ripple-button m-auto ripple-button-primary btn-sm text-white font-12">
                                                  

                                                    {{ __('backend.Upload New File') }}
                                                    </label>
                                                    <input type="file" id="UploadFile" hidden multiple>
                                            </div>
                                            <div class="file-t-content">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    <div class="th-content">{{ __('backend.name') }}
                                                                    </div>
                                                                </th>
                                                                <th>
                                                                    <div class="th-content">
                                                                        {{ __('backend.Owners') }}</div>
                                                                </th>
                                                                <th>
                                                                    <div class="th-content">
                                                                        {{ __('backend.Created at') }}
                                                                    </div>
                                                                </th>
                                                                <th>
                                                                    <div class="th-content">{{ __('backend.Size') }}
                                                                    </div>
                                                                </th>
                                                                <th>
                                                                    <div class="th-content"></div>
                                                                </th>
                                                            </tr>


                                                        </thead>
                                                        <tbody>
                                                            @foreach ($files as $file)
                                                                <?php
                                                                $modal = unserialize($file->info);
                                                                $owner = get_user_by_id($modal['owner']);
                                                                ?>
                                                                <tr>
                                                                    <td>{{ $file->name }}</td>
                                                                    <td>
                                                                        <div class="d-flex">
                                                                            <a href="javascript:void(0);"
                                                                                class="bs-tooltip"
                                                                                title="{{ $owner->name }}"><img
                                                                                    src="{{$owner->logo? url("image/$owner->logo"):url("assets/img/avatar.png") }}"
                                                                                    class="avatar-sm rounded-circle border-width-2px border-solid border-light"
                                                                                    alt="avatar"></a>
                                                                        </div>
                                                                    </td>
                                                                    <td>{{ date('Y-m-d', strtotime($file->created_at)) }}
                                                                    </td>
                                                                    <td>{{ $modal['size'] }}</td>
                                                                    <td>
                                                                        <div class="d-flex">
                                                                            <a href="/image/{{ $file->file}}" 
                                                                                class="bs-tooltip font-20 text-primary "
                                                                                title=""
                                                                                data-original-title="{{ __('backend.download') }}" download><i
                                                                                    class="las la-download" ></i></a>
                                                                            <a href="javascript:void(0);"
                                                                                class="bs-tooltip font-20 ml-2 text-danger confirmDelete"
                                                                                title="" data-id="{{ $file->id }}"
                                                                                data-action="FileManger/delete-file/"
                                                                                data-original-title="{{ __('backend.Delete') }}"><i
                                                                                    class="las la-trash"></i></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Create a folder Modal -->
                        <div class="modal fade" id="addFolderModal" tabindex="-1" role="dialog"
                            aria-labelledby="addFolderModalTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <i class="las la-times" data-dismiss="modal"></i>
                                        <div class="compose-box">
                                            <div class="compose-content" id="addFolderModalTitle">
                                                <h5 class="">{{ __('Create a folder') }}</h5>
                                                <form>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="d-flex mail-to mb-4">
                                                                <div class="w-100">
                                                                    <input id="task" type="text" placeholder="Folder name"
                                                                        class="form-control" name="task">
                                                                    <span class="validation-text"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex mb-4">
                                                        <div class="w-100">
                                                            <select class="selectpicker w-100" multiple data-max-options="3"
                                                                title="{{ __('Share this folder with') }}">
                                                                <option>{{ __('Jeremy Lawson') }}</option>
                                                                <option>{{ __('Dino Morea') }}</option>
                                                                <option>{{ __('Bolor Johnson') }}</option>
                                                                <option>{{ __('Nadel Pichungso') }}</option>
                                                                <option>{{ __('Andy Flower') }}</option>
                                                                <option>{{ __('Heath Streak') }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="w-100 mb-4 text-right">
                                                        <form>
                                                            <label for="file-upload" class="custom-file-upload mb-0">
                                                                <a title="{{ __('Attach a file') }}"
                                                                    class="btn btn-sm btn-primary  mr-2 pointer ">
                                                                    {{ __('Add files') }}
                                                                </a>
                                                            </label>
                                                            <input id="file-upload" name='upload_cont_img' type="file"
                                                                style="display:none;">
                                                        </form>
                                                    </div>
                                                    <div class="d-flex mb-4">
                                                        <div class="w-100">
                                                            <div class="">
                                                                <div class="card mb-1 shadow-none border border-light">
                                                                    <div class="p-2">
                                                                        <div class="row align-items-center">
                                                                            <div class="col-auto">
                                                                                <div class="avatar-sm">
                                                                                    <span
                                                                                        class="avatar-sm background-success-teal text-white rounded d-flex align-center justify-content-center">
                                                                                        .JPG
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col pl-0">
                                                                                <a href="javascript:void(0);"
                                                                                    class="text-success-teal strong">{{ __('design-changes.jpg') }}</a>
                                                                                <p class="mb-0">3.25 MB</p>
                                                                            </div>
                                                                            <div class="col-auto">
                                                                                <!-- Button -->
                                                                                <a href="javascript:void(0);"
                                                                                    class="font-25 text-danger mr-2">
                                                                                    <i class="las la-times-circle"></i>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button class="btn btn-sm btn-danger"
                                            data-dismiss="modal">{{ __('Close') }}</button>
                                        <button class="btn btn-sm btn-primary">{{ __('Create') }}</button>
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
    {!! Html::script('assets/js/apps/file-manager.js') !!}
    {!! Html::script('plugins/bootstrap-select/bootstrap-select.min.js') !!}
    {!! Html::script('plugins/sweetalerts/promise-polyfill.js') !!}
    {!! Html::script('plugins/sweetalerts/sweetalert2.min.js') !!}
    {!! Html::script('assets/js/basicui/sweet_alerts.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('plugins/notification/snackbar/snackbar.min.js') !!}
    {!! Html::script('assets/js/basicui/notifications.js') !!}
    {!! Html::script('assets/js/myJS.js') !!}
@endpush

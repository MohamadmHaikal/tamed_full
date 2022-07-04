@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('plugins/notification/snackbar/snackbar.min.css') !!}
    {!! Html::style('assets/css/apps/notes.css') !!}
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('backend.TechnicalSupport') }}</a>
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
                                            <h4 class="table-header">{{ __('backend.TechnicalSupport') }}</h4>

                                        </div>

                                    </div>



                                    <table class="table table-sm mb-0"
                                        style="width:50%; border: 1px solid #dee2e6; background-color: #f6f7f8;">

                                        <tbody>
                                            <tr>
                                                <th> {{ __('backend.ticket number') }} </th>
                                                <td>{{ $report->id }}</td>

                                            </tr>
                                            <tr>
                                                <th>{{ __('backend.Created at') }}</th>
                                                <td>{{ date('Y-m-d', strtotime($report->created_at)) }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('backend.title') }}</th>
                                                <td>{{ $report->title }}</td>
                                            </tr>
                                           

                                            <tr>
                                                <th>{{ __('backend.status') }}</th>
                                                <td>{{ __('backend.' . $report->status) }}</td>
                                            </tr>
                                           
                                            <tr>
                                                <th>{{ __('backend.reference number') }}</th>
                                                <td>{{ $report->ref_number }}#</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <br>
                                    <hr class="rounded" style=" border-top: 1px solid #bbb;  border-radius: 5px;">
                                    <div class="meesage-list">

                                        @foreach ($message as $item)
                                            <br>
                                            <div id="ct" class="note-container note-grid">
                                                <div class="note-item all-notes note-personal" style="">
                                                    <div class="note-inner-content">
                                                        <div class="note-content">
                                                            <p class="note-title">
                                                                {{ get_user_by_id($item->user_id)->name }}
                                                            </p>
                                                            <div class="meta-time" style="width: 100%">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        {{ date('Y-m-d', strtotime($item->created_at)) }}
                                                                    </div>
                                                                    @if (get_current_user_id() == $item->user_id && get_current_user_id() == $message[$message->count() - 1]->user_id && $message[$message->count() - 1]->id == $item->id)
                                                                        <div class="col-md-6 text-right"><i
                                                                                class="las la-pen font-20 edit-message-support"
                                                                                data-id="{{ $item->id }}"></i>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="note-description-content">
                                                                <p class="note-description">
                                                                    {{ $item->message }}
                                                                </p>
                                                            </div>
                                                            @if ($item->image)
                                                                <p><a class="text-primary"
                                                                        style="text-decoration: underline;"
                                                                        href="{{ url('image/' . $item->image) }}"
                                                                        download><i
                                                                            class="las la-paperclip font-20"></i>{{ __('backend.Download the attached image') }}</a>
                                                                </p>
                                                            @endif
                                                        </div>


                                                    </div>
                                                </div>

                                            </div>
                                        @endforeach

                                    </div>
                                    <br>
                          
                                        @if ($report->status != 'closed')
                                           
                                                <div class="messenger-sendCard">

                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">

                                                                <textarea class="form-control" name="message" id="message" placeholder="{{ __('backend.Type a message..') }}"
                                                                    rows="3"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="row" style="    margin-top: 5%;">
                                                                <div>
                                                                    <label for="file">
                                                                        <a style="margin-top: 17%;" data-placement="top"
                                                                            title="{{ __('backend.attach a picture') }}"
                                                                            class="mr-2 pointer text-primary btn btn-outline-primary bs-tooltip">
                                                                            <i class="las la-paperclip font-20"></i>

                                                                        </a>
                                                                    </label>
                                                                    <input id="file" name='file' type="file"
                                                                        style="display:none;" accept="image/*">
                                                                </div>
                                                                <div class="form-group">

                                                                    <button
                                                                        class="btn btn-secondary btn-lg btn btn-secondary btn-rounded send-message-support"
                                                                        data-id="{{ $report->id }}"
                                                                        style="margin-top: 7%; height: 43px; ">{{ __('frontend.sendComment') }}</button>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                          
                                        @endif
                                   
                                    <div class="send-form">

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
    {!! Html::script('assets/js/ie11fix/fn.fix-padStart.js') !!}
    {!! Html::script('assets/js/myJS.js') !!}
    {{-- {!! Html::script('assets/js/apps/notes.js') !!} --}}
@endpush

@push('custom-scripts')
@endpush

<div class="right-bar">
    <div class="h-100">
        <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" style="height: 100%;">
                        <div class="simplebar-content" style="padding: 0px;">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-bordered nav-justified" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link  active" data-toggle="tab" href="#chat-tab" role="tab"
                                        aria-selected="true">
                                        <i class="las la-sms"></i>
                                    </a>
                                </li>

                            </ul>
                            <!-- Tab panes starts -->
                            <div class="tab-content pt-0 rightbar-tab-container">
                                <div class="tab-pane active rightbar-tab" id="chat-tab" role="tabpanel">

                                    <h6 class="right-bar-heading px-3 mt-2 text-uppercase">
                                        {{ __('backend.My Favourites') }} <a href="javascript: void(0);"><i
                                                class="las la-angle-right"></i></a></h6>
                                    <div class="p-2">
                                        <a href="javascript: void(0);" class="text-reset">
                                            <div class="media pt-0">
                                                <div class="position-relative mr-2">
                                                    <img src="{{ url('assets/img/profile-1.jpg') }}"
                                                        class="rounded-circle avatar-sm ml-2" alt="user-pic">
                                        
                                                </div>
                                                <div class="media-body overflow-hidden mr-2">
                                                    <h6 class="mt-0 mb-1 font-13">{{ __('Andrew Mackie') }}</h6>
                                                    <div class="font-12">
                                                        <p class="mb-0 text-truncate">
                                                            {{ __('It will seem like simplified English.') }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                    <h6 class="right-bar-heading px-3 mt-2 text-uppercase"> {{ __('backend.CHATS') }}
                                        <a href="javascript: void(0);"><i class="las la-angle-right"></i></a></h6>
                                    <div class="p-2 pb-4">
                                        <a href="javascript: void(0);" class="text-reset">
                                            <div class="media pt-0">
                                                <div class="position-relative mr-2">
                                                    <img src="{{ url('assets/img/profile-4.jpg') }}"
                                                        class="rounded-circle avatar-sm ml-2" alt="user-pic">
                                                   
                                                </div>
                                                <div class="media-body overflow-hidden mr-2">
                                                    <h6 class="mt-0 mb-1 font-13">{{ __('Owen Hargrieves') }}</h6>
                                                    <div class="font-12">
                                                        <p class="mb-0 text-truncate">{{ __('Thats really cool') }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                        <div class="text-center pt-4">
                                            <a href="javascript:void(0);" class="btn btn-sm btn-primary">
                                                Load more
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane rightbar-tab" id="status-tab" role="tabpanel">
                                    <h6 class="right-bar-heading p-2 px-3 mt-2 text-uppercase">{{ __('Order Status') }}
                                    </h6>
                                    <div class="px-2">
                                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                                            <p class="text-muted mb-0">{{ __('Order Success') }}<span
                                                    class="float-right">{{ __('75%') }}</span></p>
                                            <div class="progress mt-2" style="height: 4px;">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </a>
                                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                                            <p class="text-muted mb-0">{{ __('Order Processing') }}<span
                                                    class="float-right">{{ __('37%') }}</span></p>
                                            <div class="progress mt-2" style="height: 4px;">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 37%"
                                                    aria-valuenow="37" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </a>
                                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                                            <p class="text-muted mb-0">{{ __('Order Initiated') }}<span
                                                    class="float-right">{{ __('52%') }}</span></p>
                                            <div class="progress mt-2" style="height: 4px;">
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                    style="width: 52%" aria-valuenow="52" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <h6 class="font-weight-medium px-3 mb-0 mt-4 text-uppercase">
                                        {{ __('Payment Status') }}</h6>
                                    <div class="p-2">
                                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                                            <p class="text-muted mb-0">{{ __('Payment Failed') }}<span
                                                    class="float-right">{{ __('12%') }}</span></p>
                                            <div class="progress mt-2" style="height: 4px;">
                                                <div class="progress-bar bg-danger" role="progressbar"
                                                    style="width: 12%" aria-valuenow="12" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </a>
                                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                                            <p class="text-muted mb-0">{{ __('Payment on hold') }}<span
                                                    class="float-right">{{ __('67%') }}</span></p>
                                            <div class="progress mt-2" style="height: 4px;">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                    style="width: 67%" aria-valuenow="67" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </a>
                                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                                            <p class="text-muted mb-0">{{ __('Payment Successful') }}<span
                                                    class="float-right">{{ __('84%') }}</span></p>
                                            <div class="progress mt-2" style="height: 4px;">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 84%" aria-valuenow="84" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="text-center pt-2">
                                        <a href="javascript: void(0);"
                                            class="btn btn-primary btn-sm">{{ __('Show All') }}</a>
                                    </div>
                                </div>
                                <div class="tab-pane rightbar-tab" id="settings-tab" role="tabpanel">
                                    <h6 class="right-bar-heading p-2 px-3 mt-2 text-uppercase">
                                        {{ __('Account Setting') }} </h6>
                                    <div class="px-2">
                                        <div class="switch-container mb-3 pl-2">
                                            <label class="switch">
                                                <input type="checkbox" checked>
                                                <span class="slider round primary-switch"></span>
                                            </label>
                                            <p class="ml-3 text-dark">{{ __('Sync Contacts') }}</p>
                                        </div>
                                        <div class="switch-container mb-3 pl-2">
                                            <label class="switch">
                                                <input type="checkbox">
                                                <span class="slider round primary-switch"></span>
                                            </label>
                                            <p class="ml-3 text-dark">{{ __('Auto Update') }}</p>
                                        </div>
                                        <div class="switch-container mb-3 pl-2">
                                            <label class="switch">
                                                <input type="checkbox">
                                                <span class="slider round primary-switch"></span>
                                            </label>
                                            <p class="ml-3 text-dark">{{ __('Receive Notifications') }}</p>
                                        </div>
                                    </div>
                                    <h6 class="right-bar-heading p-2 px-3 mt-2 text-uppercase">{{ __('Mail Setting') }}
                                    </h6>
                                    <div class="px-2">
                                        <div class="switch-container mb-3 pl-2">
                                            <label class="switch">
                                                <input type="checkbox" checked>
                                                <span class="slider round primary-switch"></span>
                                            </label>
                                            <p class="ml-3 text-dark">{{ __('Mail Auto Responder') }}</p>
                                        </div>
                                        <div class="switch-container mb-3 pl-2">
                                            <label class="switch">
                                                <input type="checkbox" checked>
                                                <span class="slider round primary-switch"></span>
                                            </label>
                                            <p class="ml-3 text-dark">{{ __('Auto Trash Delete') }}</p>
                                        </div>
                                        <div class="switch-container mb-3 pl-2">
                                            <label class="switch">
                                                <input type="checkbox">
                                                <span class="slider round primary-switch"></span>
                                            </label>
                                            <p class="ml-3 text-dark">{{ __('Custom Signature') }}</p>
                                        </div>
                                    </div>
                                    <h6 class="right-bar-heading p-2 px-3 mt-2 text-uppercase">
                                        {{ __('Chat Setting') }} </h6>
                                    <div class="px-2">
                                        <div class="switch-container mb-3 pl-2">
                                            <label class="switch">
                                                <input type="checkbox" checked>
                                                <span class="slider round primary-switch"></span>
                                            </label>
                                            <p class="ml-3 text-dark">{{ __('Show Online') }}</p>
                                        </div>
                                        <div class="switch-container mb-3 pl-2">
                                            <label class="switch">
                                                <input type="checkbox" checked>
                                                <span class="slider round primary-switch"></span>
                                            </label>
                                            <p class="ml-3 text-dark">{{ __('Chat Notifications') }}</p>
                                        </div>
                                    </div>
                                    <div class="px-2 text-center pt-4">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-danger">
                                            {{ __('Set Default') }}
                                        </a>
                                        <button class="ripple-button ripple-button-primary btn-sm" type="button">
                                            <div class="ripple-ripple js-ripple">
                                                <span class="ripple-ripple__circle"></span>
                                            </div>
                                            {{ __('Ripple Effect') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Tab panes ends -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

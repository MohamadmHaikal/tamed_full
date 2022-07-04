<?php
$user = get_current_user_data();
$menu_dashboard = get_menu_dashboard();
?>
<nav id="sidebar">
    <div class="fixed-profile">
        <div class="premium-border">
            @if (!empty($user['logo']))
                <img src="{{ url("image/$user->logo") }}" class="profile-avatar" />
            @else
                <img src="{{ url('https://dummyimage.com/1200x900/e0e0e0/c7c7c7.png') }}" class="profile-avatar" />
            @endif

        </div>
        <div class="mt-3">
            <h6 class="text-white font-14 mb-1">{{ $user->name }}</h6>

        </div>
        <br>
        <ul class="flex-row profile-option-container">
            <li class="option-item dropdown message-dropdown">
                <div class="option-link-container dropdown-toggle" id="messageDropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <a class="option-link dropdown-toggle" href="{{ route('chat') }}">
                        <i class="las la-envelope"></i>
                         @if (get_current_user_message_count() != 0)
                            <div class="blink">
                                <div class="circle"></div>
                            </div>
                        @endif
                    </a>
                    <a href="{{ route('chat') }}">
                        <div class="text-left">
                            <h6>{{ __('backend.mail') }}</h6>
                            <p>{{ get_current_user_message_count() }} {{ __('backend.New Mails') }}</p>
                        </div>
                    </a>

                </div>
                {{-- <div class="dropdown-menu position-absolute md-container" aria-labelledby="messageDropdown">
                    <div class="nav-drop is-notification-dropdown">
                        <div class="inner">
                            <div class="nav-drop-header">
                                <span class="text-black font-12 strong">3 new mails</span>
                                <a class="text-muted font-12" href="#">
                                    Mark all read
                                </a>
                            </div>
                            <div class="nav-drop-body account-items pb-0">
                                <a class="account-item">
                                    <div class="media">
                                        <div class="user-img">
                                            <img class="rounded-circle avatar-xs" src="assets/img/profile-11.jpg"
                                                alt="profile">
                                        </div>
                                        <div class="media-body">
                                            <div class="">
                                                <h6 class="text-dark font-13 mb-0 strong">Jennifer Queen</h6>
                                                <p class="m-0 mt-1 font-10 text-muted">Permission Required</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a class="account-item marked-read">
                                    <div class="media">
                                        <div class="user-img">
                                            <img class="rounded-circle avatar-xs" src="assets/img/profile-10.jpg"
                                                alt="profile">
                                        </div>
                                        <div class="media-body">
                                            <div class="">
                                                <h6 class="text-dark font-13 mb-0 strong">Lara Smith</h6>
                                                <p class="m-0 mt-1 font-10 text-muted">Invoice needed</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a class="account-item marked-read">
                                    <div class="media">
                                        <div class="user-img">
                                            <img class="rounded-circle avatar-xs" src="assets/img/profile-9.jpg"
                                                alt="profile">
                                        </div>
                                        <div class="media-body">
                                            <div class="">
                                                <h6 class="text-dark font-13 mb-0 strong">Victoria Williamson</h6>
                                                <p class="m-0 mt-1 font-10 text-muted">Account need to be synced</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <hr class="account-divider">
                                <div class="text-center">
                                    <a class="text-primary strong font-13" href="apps_mail.html">View All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </li>
            <li class="option-item dropdown notification-dropdown">
                <a class="option-link-container" href="{{ route('all-notifications') }}">
                    <div class="option-link">
                        <i class="las la-bell"></i>
                        @if (get_current_user_notification_count() != 0)
                            <div class="blink">
                                <div class="circle"></div>
                            </div>
                        @endif

                    </div>
                    <div class="text-left">
                        <h6>{{ __('backend.notifications') }}</h6>
                        <p>{{ get_current_user_notification_count() }} {{ __('backend.Unread') }}</p>
                    </div>
                </a>
            </li>
        </ul>
    </div>

    <ul class="list-unstyled menu-categories" id="accordionExample">
        @foreach ($menu_dashboard as $menu)
            @if ($menu['type'] != 'parent')
                @if (!isset($menu['parameter']))
                    <li class="menu {{ active_class([$menu['route_name']]) }}">
                        <a href="{{ isset($menu['soon']) ? '#' : route($menu['route_name']) }}"
                            data-active={{ is_active_route([$menu['route_name']]) }} class="dropdown-toggle">
                            @if (isset($menu['soon']))
                                <span class="menu-badge soon">{{ __('backend.soon') }}</span>
                            @endif
                            <i class="las {{ $menu['icon'] }}"></i>
                            <span>{{ __($menu['label']) }}</span>
                        </a>
                    </li>
                @else
                    <li
                        class="menu {{ active_class([isset($menu['active_class']) ? $menu['active_class'] : $menu['route_name']]) }}">
                        <a href="{{ route($menu['route_name'], [$menu['parameter']]) }}"
                            data-active={{ is_active_route([isset($menu['active_class']) ? $menu['active_class'] : $menu['route_name']]) }}
                            class="dropdown-toggle">
                            @if (isset($menu['soon']))
                                <span class="menu-badge soon">{{ __('backend.soon') }}</span>
                            @endif
                            <i class="las {{ $menu['icon'] }}"></i>
                            <span>{{ __($menu['label']) }}</span>
                        </a>
                    </li>
                @endif
            @else
                <li class="menu {{ active_class([$menu['route_name'] . '/*']) }}">
                    <a data-active={{ is_active_route([$menu['route_name'] . '/*']) }} href="javascript:void(0);"
                        id="{{ $menu['id'] }}" class="main-item dropdown-toggle">
                        {{-- <span class="new-notification"></span> --}}
                        <i class="las {{ $menu['icon'] }}"></i>
                        <span>{{ __($menu['label']) }}</span>
                    </a>
                </li>
            @endif
        @endforeach

    </ul>
    <div class="sidebar-submenu">
        <span class="sidebar-submenu-close" id="sidebarSubmenuClose">
            <i class="las la-times"></i>
        </span>

        @foreach ($menu_dashboard as $menu)
            @if ($menu['type'] == 'parent')
                <div class="submenu" id="{{ $menu['id'] }}Menu">
                    <div class="submenu-info">
                        <div class="submenu-inner-info">
                            <h5 class="mb-3">{{ __($menu['label']) }}</h5>
                        </div>
                        <ul class="submenu-list">
                            @foreach ($menu['child'] as $item)
                                @if (!isset($item['parameter']))
                                    <li class="{{ active_class([$item['active_class']]) }}">
                                       
                                        <a class="app-submenu" href="{{ route($item['route_name']) }}">
                                             <i class="las {{isset($item['icon'])? $item['icon']:'la-times'}} font-35" ></i>
                                            {{ __($item['label']) }} </a>

                                    </li>
                                @else
                                    <li class="{{ active_class([$item['active_class']]) }}">
                                         
                                        <a class="app-submenu"
                                            href="{{ route($item['route_name'], $item['parameter']) }}">
                                           <i class="las {{isset($item['icon'])? $item['icon']:'la-times'}} font-35"></i>
                                            {{ __($item['label']) }} </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        @endforeach

    </div>
</nav>

<?php
$enable_multi_language = get_option('multi_language', 'on');
$enable_dark_mode = get_option('dark_mode', 'on');
$current_theme = $_COOKIE['theme'];
?>
<style>
    .main-container::before {
        content: "";
        height: 67px;

    }

</style>
<header class="header navbar navbar-expand-sm">
    <ul class="navbar-item flex-row ml-md-0 ml-auto theme-brand">
        <li class="nav-item align-self-center d-md-none">
            @include('include.logo')
        </li>


    </ul>
    <?php
    $user = get_current_user_data();
    
    ?>
    <ul class="navbar-item flex-row ml-md-auto">
        @if ($enable_dark_mode == 'on')
        <li class="nav-item dropdown fullscreen-dropdown">
            <a class="nav-link night-light-mode" href="javascript:void(0);">
                @if ($current_theme == 'lightmode')
                    <i class="las la-moon" id="darkModeIcon"></i>
                @else
                    <i class="las la-sun" id="darkModeIcon"></i>
                @endif
            </a>
        </li>
    @endif
    <li class="nav-item dropdown fullscreen-dropdown d-none d-lg-flex">
        <a class="nav-link full-screen-mode" href="javascript:void(0);">
            <i class="las la-compress" id="fullScreenIcon"></i>
        </a>
    </li>
    @if ($enable_multi_language == 'on')
        <li class="nav-item dropdown language-dropdown">
            <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="language-dropdown"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="las la-language"></i>
            </a>
            <div class="dropdown-menu position-absolute" aria-labelledby="language-dropdown">
                @if (session()->get('lang') == 'en')
                    <a class="dropdown-item d-flex" href="{{ route('LanguageSwitcher', ['ar']) }}">
                        <img src="{{ url('assets/img/flag/saudi-arabia-flag.png') }}" class="flag-width"
                            alt="flag">
                        <span class="align-self-center">&nbsp;{{ __('Arabic') }}</span>
                    </a>
                @else
                    <a class="dropdown-item d-flex" href="{{ route('LanguageSwitcher', ['en']) }}">
                        <img src="{{ url('assets/img/flag/usa-flag.png') }}" class="flag-width" alt="flag">
                        <span class="align-self-center"> {{ __('English') }}</span>
                    </a>
                @endif
            </div>
        </li>
    @endif
        <!-- Using Switch option -->
        <li class="nav-item dropdown fullscreen-dropdown">
            <div class="switch-container mb-0 pl-0">
                <h6 style="    margin-top: 12px;
                color: white;">{{ Auth::guard('mangers')->user()->name }}</h6>
            </div>
        </li>


        <li class="nav-item dropdown user-profile-dropdown">



            <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">

                <img src="{{ url('assets/img/avatar.png') }}" alt="avatar">

            </a>


            <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                <div class="nav-drop is-account-dropdown">
                    <div class="inner">
                        <div class="nav-drop-header">
                            <span class="text-primary font-15"> {{ __('backend.Welcome') }}
                                {{ Auth::guard('mangers')->user()->name }}
                                !</span>
                        </div>
                        <div class="nav-drop-body account-items pb-0">


                            {{-- <a class="account-item" href="{{ url('/pages/timeline') }}">
                                <div class="media align-center">
                                    <div class="icon-wrap">
                                        <i class="las la-briefcase font-20"></i>
                                    </div>
                                    <div class="media-content ml-3">
                                        <h6 class="font-13 mb-0 strong">{{ __('My Activity') }}</h6>
                                    </div>
                                </div>
                            </a> --}}
                            <a class="account-item " href="/">
                                <div class="media align-center">
                                    <div class="icon-wrap">
                                        <i class="las la-home font-20"></i>
                                    </div>
                                    <div class="media-content ml-3">
                                        <h6 class="font-13 mb-0 strong">{{ __('backend.Go to home page') }}</h6>
                                    </div>
                                </div>
                            </a>
                            {{-- <a class="account-item" href="{{ url('/authentications/style3/locked') }}">
                                <div class="media align-center">
                                    <div class="icon-wrap">
                                        <i class="las la-lock font-20"></i>
                                    </div>
                                    <div class="media-content ml-3">
                                        <h6 class="font-13 mb-0 strong">{{ __('Lock Screen') }}</h6>
                                    </div>
                                </div>
                            </a> --}}
                            <hr class="account-divider">
                            <a class="account-item" href="javascript:void(0);" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <div class="media align-center">
                                    <div class="icon-wrap">
                                        <i class="las la-sign-out-alt font-20"></i>
                                    </div>
                                    <div class="media-content ml-3">
                                        <h6 class="font-13 mb-0 strong ">{{ __('backend.Logout') }}</h6>
                                    </div>
                                </div>
                            </a>
                            <form id="logout-form" action="{{ route('Business.logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
    <ul class="navbar-item flex-row">
        <li class="nav-item dropdown header-setting">
            <a href="javascript:void(0);" class="nav-link dropdown-toggle rightbarCollapse" data-placement="bottom">
                {{-- <i class="las la-sliders-h"></i> --}}
            </a>
        </li>
    </ul>
</header>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>{{ page_title(true) }}</title>
    <!-- initiate head with meta tags, css and script -->
    @include('include.head')

</head>

<body class="{{ $theme . 'mode' }}" data-base-url="{{ url('/') }}">
    <?php
    $enable_lazyload = get_option('enable_lazyload', 'off');
    $currentRoute = request()
        ->route()
        ->getName();
    ?>
    <!-- Loader Starts -->
    @if ($enable_lazyload == 'on' && $currentRoute != 'languages.translations.index')
        @include('include.loader')
        <!--  Loader Ends -->
    @endif
    <!--  Main Container Starts  -->
    <div class="main-container" id="container" style="    background: gainsboro;
    ">
        @include('include.logo')
        <div class="overlay"></div>
        <div class="search-overlay"></div>
        <div class="rightbar-overlay"></div>

        <!--  Sidebar Starts  -->
        
        <!--  Sidebar Ends  -->

        <!--  Content Area Starts  -->
        <div id="content" class="main-content" style="margin-right: 0px;">
            <!--  Navbar Starts  -->
            <div class="header-container fixed-top">
                @include('include.manger-header')
            </div>
            <!--  Navbar Ends  -->
            <!-- Main Body Starts -->
            @yield('content')
            <!-- Main Body Ends -->

            @include('include.responsive-message')
            <div id="alert">

            </div>
            <!-- Copyright Footer Starts -->
            <!-- Copyright Footer Ends -->

            <!-- Arrow Starts -->
            <div class="scroll-top-arrow" style="display: none;">
                <i class="las la-angle-up"></i>
            </div>
            <!-- Arrow Ends -->
        </div>
        <!--  Content Area Ends  -->

        <!--  Rightbar Area Starts -->
        <!--  Rightbar Area Ends -->
    </div>
    <!-- Main Container Ends -->

    <!-- Common Script Starts -->
    @include('include.scripts')

    <!-- Common Script Ends -->

</body>

</html>

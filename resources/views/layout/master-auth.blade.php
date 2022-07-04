<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{__('backend.Tamed Platform')}} | {{__('backend.login')}} </title>
    <!-- initiate head with meta tags, css and script -->
    <link href="https://fonts.googleapis.com/css?family=Noto Kufi Arabic:100,200,300,500,600,700,800,900:arabic" rel="stylesheet">
    @include('include.head')

</head>
<body class="{{ $theme . 'mode' }}" data-base-url="{{url('/')}}" >
    @include('include.login-nav')
    <!-- Loader Starts -->
    {{-- dir="{{session()->get('lang') == 'en'?'rtl':'ltr'}}"*/> --}}
    {{-- @include('include.loader') --}}
    <!--  Loader Ends -->

    <!--  Main Container Starts  -->
    @yield('content')
    <!-- Main Container Ends -->

    @stack('plugin-scripts')
</body>
</html>

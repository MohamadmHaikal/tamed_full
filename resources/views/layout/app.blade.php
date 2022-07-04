<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="description" content="منصة تعميد عالم التشيد والبناء ">
    <meta name="keywords"
        content="تعميد,منصة,موقع,الرياض,السعودية,تطبيق,مشاريع,عقود,مقاولات,مناقصات,في,صفقات,مزادات,سكراب,إنشاء,بناء,وظائف,جديدة,حديد,تسليم مفتاح,تسجيل الدخول,إعتماد,مقاولة,مكتب هندسي,مخططات,مشروع,مواد,المواد,بدون,جدة,الدمام">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php
    $favicon = get_option('favicon');
    $favicon_url = get_attachment_url($favicon);
    ?>
    <link rel="icon" href="{{ asset("$favicon_url") }}">
    <title>منصة تعميد </title>
    <!-- Fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Noto%20Kufi%20Arabic:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <div id="app">
        <main>
            {{ $slot }}
        </main>
    </div>
    @if (is_user_logged_in())
        <script>
            window.Laravel = {!! json_encode([
    'isLoggedin' => true,
    'user' => get_current_user_data(),
]) !!}
        </script>
    @else
        <script>
            window.Laravel = {!! json_encode([
    'isLoggedin' => false,
]) !!}
        </script>
    @endif
    <script>
        window.language = {!! json_encode([
    'currentLanguage' => session()->get('lang'),
]) !!}
    </script>
</body>

</html>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

<!-- CSRF Token -->
<meta name="_token" content="{{ csrf_token() }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<?php
$favicon = get_option('favicon');
$favicon_url = get_attachment_url($favicon);
?>
{{-- <link rel="shortcut icon" type="image/png" href="{{ $favicon_url }}"/> --}}
<link rel="icon" type="image/x-icon" href="{{ asset("$favicon_url") }}" />

<!-- fonts library -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
{{-- <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700;900&display=swap" rel="stylesheet"> --}}

<script src="{{ asset('assets/js/app.js') }}"></script>
@if (session()->get('lang') == 'en')
    <link rel="stylesheet" media="all" href="{{ asset('assets/css/all_en.css') }}">
@else
    <link rel="stylesheet" media="all" href="{{ asset('assets/css/all.css') }}">
@endif
<script>
window.translate={
auth:'{{__("backend.We have sent a message to")}}',
continue: "{{ __('backend.continue') }}",
systemMessages: "{{ __('backend.system messages') }}",
successfully: "{{ __('backend....Logged in successfully. Redirecting') }}",
};

</script>
<?php
if(!isset($_COOKIE['theme'])) {
    setcookie('theme', 'lightmode');
    $_COOKIE['theme'] = 'lightmode';
}
if(is_user_logged_in())
{if(!isset($_COOKIE['user'])) {
    setcookie ("user",  get_current_user_id() );  
    
}
    
    else{
         $_COOKIE['user'] = get_current_user_id();
        
    }
}

init_style();
?>

<link rel="stylesheet" href="{{ asset('plugins/line-awesome-1.3.0/css/line-awesome.min.css') }}">

<!-- Stack array for including inline css or head elements -->
@stack('plugin-styles')

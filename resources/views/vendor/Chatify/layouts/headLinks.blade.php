<?php
$favicon = get_option('favicon');
$favicon_url = get_attachment_url($favicon);
?>
<title>{{page_title(true)}}</title>

{{-- Meta tags --}}
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="id" content="{{ $id }}">
<meta name="type" content="{{ $type }}">
<meta name="messenger-color" content="{{ $messengerColor }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="url" content="{{ url('').'/'.config('chatify.routes.prefix') }}" data-user="{{ get_current_user_id() }}">
<link rel="icon" type="image/x-icon" href="{{ asset("$favicon_url") }}" />
{{-- scripts --}}
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/chatify/font.awesome.min.js') }}"></script>
<script src="{{ asset('js/chatify/autosize.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src='https://unpkg.com/nprogress@0.2.0/nprogress.js'></script>


{{-- styles --}}
<link rel='stylesheet' href='https://unpkg.com/nprogress@0.2.0/nprogress.css'/>
<link href="{{ asset('css/chatify/style.css') }}" rel="stylesheet" />
<link href="{{ asset('css/chatify/chat.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/all_en.css') }}" rel="stylesheet" />
<link href="{{ asset('css/chatify/'.$dark_mode.'.mode.css') }}" rel="stylesheet" />
<link href="{{ asset('css/app.css') }}" rel="stylesheet" />

{{-- Messenger Color Style--}}
@include('Chatify::layouts.messengerColor')

<?php
$logo = get_option('dashboard_logo', '');
?>

<div class="tl-logo-area d-none d-md-block">
    <div class="d-flex flex-row align-center justify-content-center logo-area">
        <a href="{{ url('/') }}" class="nav-link pr-0 pl-0">
            <img src="{{ url("image/$logo") }}" class="navbar-logo" alt="logo">
        </a>
    </div>
</div>

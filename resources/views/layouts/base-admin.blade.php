<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{ config('app.name') }} - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
    <link rel="shortcut icon" href="{{ asset(Storage::url(\App\Profile::find(1)->logo)) }}" type="image/x-icon">
    <link href="{{ asset('assets/architectui/main.css') }}" rel="stylesheet">

    @yield('styles')
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        @include('layouts.components.header-admin')
        @include('layouts.components.ui-theme-settings-admin')
        <div class="app-main">
            @include('layouts.components.sidebar-admin')
            <div class="app-main__outer">
                @yield('content')
                @include('layouts.components.footer-admin')
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('assets/architectui/assets/scripts/main.js') }}"></script>
    @stack('scripts')
</body>

</html>

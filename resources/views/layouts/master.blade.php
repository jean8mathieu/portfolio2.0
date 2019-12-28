!<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <title>JMDev - @yield('title')</title>
    @yield('meta')
    @yield('css')
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

    <!-- CSRF Token-->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
</head>
<body>
    @include('')
    @include('shared.errors')
    @yield('js')
</body>
</html>

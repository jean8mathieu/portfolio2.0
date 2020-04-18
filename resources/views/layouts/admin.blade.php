<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('meta')

    <title>{{ config('app.name', 'JMDev') }} - @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body class="bg-dark text-white">
<div id="app">
    @include('shared.message')
    <nav class="navbar navbar-expand-md navbar-dark shadow-sm bg-black">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}">
                {{ config('app.name', 'JMDev') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.home.index') }}">
                            Projects
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.tag.index') }}">
                            Tags
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.experience.index') }}">
                            Work Experience
                        </a>
                    </li>

                    <!-- Authentication Links -->

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('admin.home.index') }}">
                                Admin
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @include('shared.message')
        @yield('content')
    </main>
</div>

<!-- Footer -->
    <footer class="page-footer bg-black">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">
            Copyright © <a href="https://jmdev.ca">JMDev</a> 2016 - 2020
        </div>
        <!-- Copyright -->

    </footer>
<!-- Footer -->

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ mix('js/app-public.js') }}"></script>

@yield('js')
</body>
</html>

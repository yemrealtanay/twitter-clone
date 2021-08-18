<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Font Awesome for İcons -->
    <script src="https://kit.fontawesome.com/dcd8b6ca00.js" crossorigin="anonymous"></script>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/octicons/4.4.0/font/octicons.min.css'>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased bg-light">
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-white border-bottom sticky-top">
            <div class="container">
                <!-- Logo -->



                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>



                <div class="collapse navbar-collapse container">
                    <!-- Navbar navigation links -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ view('dashboard') }}"><i class="octicon octicon-home"
                                    aria-hidden="true"></i> Feed
                                <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="octicon octicon-person"></i> Profile </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="octicon octicon-zap"></i> Explore </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="octicon octicon-bell"></i> Notifications</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="octicon octicon-bookmark"></i> Bookmarks</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://quickabdest.com/"><i class="octicon octicon-book"></i>
                                Help
                                Center </a>
                        </li>

                    </ul>

                </div>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Settings Dropdown -->
                    @auth
                        <x-dropdown id="settingsDropdown">
                            <x-slot name="trigger">
                                {{ Auth::user()->name }}
                            </x-slot>

                            <x-slot name="content">
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                                          this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    @endauth
                </ul>
            </div>
            </div>
        </nav>
    </header>
    @yield('content')
</body>
</html>

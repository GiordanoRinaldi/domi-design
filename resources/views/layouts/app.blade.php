<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset(mix('js/app.js')) }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-light bg-white">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Logo</a>
                <div class="dropdown">
                    <button class="navbar-toggler" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-start" aria-labelledby="dropdownMenu2">
                        <li><strong class="dropdown-item-text">Works &#9660;</strong></li>
                        <li><a class="ps-4 dropdown-item" href="{{route('projects')}}">University Projects</a></li>
                        <li><a class="ps-4 dropdown-item" href="#">Portfolio</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" aria-current="page" href="#">About Me</a>
                        </li>
                        @auth
                            <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route('admin.home')}}">Area riservata</a></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endauth
                    </ul>
                </div>
{{--                <div class="dropdown">--}}
{{--                    <button class="navbar-toggler" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                        <span class="navbar-toggler-icon"></span>--}}
{{--                    </button>--}}
{{--                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">--}}
{{--                        <li class="nav-item dropdown">--}}
{{--                            <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                Work--}}
{{--                            </a>--}}
{{--                            <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">--}}
{{--                                <li><a class="dropdown-item" href="{{route('projects')}}">University Projects</a></li>--}}
{{--                                <li><a class="dropdown-item" href="#">Portfolio</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" aria-current="page" href="#">About Me</a>--}}
{{--                        </li>--}}
{{--                        @auth--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">--}}
{{--                                    Logout--}}
{{--                                </a>--}}
{{--                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                                    @csrf--}}
{{--                                </form>--}}
{{--                            </li>--}}
{{--                        @endauth--}}

{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">--}}
{{--                    <div class="offcanvas-header">--}}
{{--                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>--}}
{{--                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>--}}
{{--                    </div>--}}
{{--                    <div class="offcanvas-body">--}}
{{--                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">--}}
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                    Work--}}
{{--                                </a>--}}
{{--                                <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">--}}
{{--                                    <li><a class="dropdown-item" href="{{route('projects')}}">University Projects</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">Portfolio</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" aria-current="page" href="#">About Me</a>--}}
{{--                            </li>--}}
{{--                            @auth--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">--}}
{{--                                        Logout--}}
{{--                                    </a>--}}
{{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                                        @csrf--}}
{{--                                    </form>--}}
{{--                                </li>--}}
{{--                            @endauth--}}

{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </nav>
        <hr class="m-0">
        <main class="py-4">
            @yield('content')
        </main>
        <footer>

        </footer>
        @stack('modals')
        @stack('scripts')
    </div>
</body>
</html>

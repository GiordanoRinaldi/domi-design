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

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/2f84a78eba.js" crossorigin="anonymous"></script>
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
                            <a class="dropdown-item" aria-current="page" href="{{route('bio')}}">About Me</a>
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
            </div>
        </nav>
        <hr class="m-0">
        <main class="py-4">
            @yield('content')
        </main>
        <footer>
            <div class="text-center">
                <p class="pt-5"><i class="fa-solid fa-envelope fa-2xl"></i> <i class="fa-brands fa-linkedin-in fa-2xl"></i></p>
                <p class="pt-3">All works © Domiziano Sagnelli {{Carbon\Carbon::now()->format('Y')}} . Please do not reproduce without the expressed written consent of Domiziano Sagnelli.</p>
            </div>
        </footer>
        @stack('modals')
        @stack('scripts')
    </div>
</body>
</html>

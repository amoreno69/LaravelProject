<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @if (Auth::check())
                            <li class="nav-item dropdown">
                                <div>
                                    <a class="nav-link" href="{{ route('home') }}">
                                            {{ __('Home') }}
                                    </a>
                                </div>
                                @if($user->venedor == true)
                                <div>
                                    <a class="nav-link" href="{{ route('allMySubastas') }}">
                                            {{ __('Meves Subastes') }}
                                    </a>
                                </div>
                                @endif
                                @if($user->venedor == false)
                                <div>
                                    <a class="nav-link" href="{{ route('allCotxes') }}">
                                            {{ __('Meus Cotxes') }}
                                    </a>
                                </div>
                                @endif
                                @if($user->venedor == true)
                                <div>
                                    <a class="nav-link" href="{{ route('allCotxes') }}">
                                            {{ __('Tots Cotxes') }}
                                    </a>
                                </div>
                                @endif
                                @if($user->venedor == false)
                                <div>
                                    <a class="nav-link" href="{{ route('allIlitacions') }}">
                                            {{ __('Licitacions') }}
                                    </a>
                                </div>
                                @endif
                                @if($user->venedor == true)
                                <div>
                                    <a class="nav-link" href="{{ route('crearSubasta') }}">
                                            {{ __('Crear Subasta') }}
                                    </a>
                                </div>
                                @endif
                                <div>
                                    <a class="nav-link" href="{{ route('check') }}">
                                            {{ __('Check') }}
                                    </a>
                                </div>
                            </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item dropdown">
                            <div class="nav-link">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                            <div class="form-group row">
                                <label for="saldo" class="col-md-4 col-form-label text-md-right">{{ __('Saldo:') }}</label>
                                <div class="col-md-6">
                                    <p class="form-control"id="saldo" name="saldo">{{Auth::user()->saldo}}</p>
                                </div>
                            </div>
                            <div class="nav-link">
                                <a class="dropdown-item" href="{{ route('saldo') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('saldo-form').submit();">
                                    {{ __('Afegir 1000 de saldo') }}
                                </a>

                                <form id="saldo-form" action="{{ route('saldo') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
            @yield('subastas')
            @yield('coches')
            @yield('licitacions')
        </main>
    </div>
</body>
</html>

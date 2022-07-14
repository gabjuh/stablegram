<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'stablegram') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/css/compiled-4.20.0.min.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm position-fixed  w-100" style="z-index:1;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'stablegram') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth
                        <ul class="navbar-nav me-auto">
                            <li>
                                <a href="{{ route('create_post') }}" class="btn btn-primary">+ Post Picture</a>
                            </li>
                        </ul>
                    @endauth

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
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
                            <input class="form-control" type="text" name="search_user" id="search_user" placeholder="Search users...">

                            @php
                                $user = Auth::user();
                            @endphp


                            @if(isset($user->oauth_avatar) || isset($user->avatar))
                                <img
                                    class="rounded-circle ml-3"
                                    @if(isset($user->avatar))
                                        {{-- src="{{ asset('/storage/' .$user->id .'/' .$user->avatar) }}" --}}
                                        src="{{ asset('storage/' .$user->avatar) }}"
                                    @else
                                        src="{{ $user->oauth_avatar }}"
                                    @endif
                                    alt="{{ $user->name }}'s profile image"
                                    height="40"
                                    width="40"
                                    style="object-fit:cover; min-width:40px;"
                                />
                            @endif
{{--
                            @isset($user->oauth_avatar)
                                <img
                                    class="rounded-circle ml-3"
                                    src="{{ $user->oauth_avatar }}"
                                    alt="{{ $user->name }}'s profile image"
                                    width="40"
                                    height="40"
                                    style="object-fit:cover;"
                                />
                            @endisset

                            @isset($user->avatar)
                                <img
                                    class="rounded-circle ml-3"
                                    src="/storage/{{ $user->id }}/{{ $user->avatar }}"
                                    alt="{{ $user->name }}'s profile image"
                                    width="40"
                                    height="40"
                                    style="object-fit:cover;"
                                />
                            @endisset --}}

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ $user->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="/profile/{{ $user->id }}">
                                        {{ __('Profile') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
        </main>
    </div>
    <script type="text/javascript" src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/js/bundles/4.20.0/compiled.min.js"></>
    <script type="text/javascript" src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/js/dist/search-v4/search.min.js"></script>
    <script src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/js/dist/main.min.js"></script>
    <script>
</body>
</html>

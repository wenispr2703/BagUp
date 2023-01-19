<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BagUp') }}</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Fonts -->
    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.0/css/all.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        @if (Auth::check())
        <nav class="navbar navbar-expand-md navbar-light shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand text-light" href="{{ url('/') }}">
                    BagUp
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Masuk') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Daftar') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item mx-2"><a href="{{ route('home') }}"
                                class="nav-link text-decoration-none text-light fw-normal">Rumah</a></li>
                        <li class="nav-item mx-2"><a href="{{ route('product') }}"
                                class="nav-link text-decoration-none text-light fw-normal">Produk</a></li>
                        <li class="nav-item mx-2"><a href="{{ url('create') }}"
                                class="nav-link text-decoration-none text-light fw-normal">Custom</a></li>
                        <li class="nav-item mx-2"><a href="{{ route('about') }}"
                                class="nav-link text-decoration-none text-light fw-normal">Tentang</a></li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-light fw-bold" href="#"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <!-- <a href="{{ route('myorder') }}" class="dropdown-item text-decoration-none">Pesanan saya</a> -->
                                @if (Auth::user()->role_as == '1')
                                <a href="{{ url('order') }}" class="dropdown-item text-decoration-none">Dasbor</a>
                                <a href="{{ url('/product/create') }}" class="dropdown-item text-decoration-none">Unggah Produk</a>
                                @endif
                                <a href="{{ route('myorder') }}" class="dropdown-item text-decoration-none">Pesanan
                                    Saya</a>
                                <a href="{{ url('/confirm') }}" class="dropdown-item text-decoration-none">Konfirmasi
                                    pembayaran</a>
                                <a href="{{ route('alamat') }}" class="dropdown-item text-decoration-none">Tambah
                                    alamat</a>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Keluar') }}
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
        @endif

        <main>
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('asset/js/script.js')}}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();

    </script>
</body>

</html>

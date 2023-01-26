@extends('layouts.app')

@section('content')
<body class="bg-brown overflow-hidden">
    <div class="container">
        <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="row rounded-2 text-dark" style="width: 500px;">
                <div class="col-sm-12 px-5 py-3 bg-light shadow-lg rounded-2">
                    <img src="{{ asset('asset/img/logo.png') }}" alt="logo" class="d-block mx-auto" style="width: 280px;">
                    <form method="POST" action="{{ route('login') }}" class="form-group">
                        @csrf
                        <div class="row mb-3">
                            <!-- <h2 class="text-center fw-bold mb-3">{{__('Masuk')}}</h2> -->
                            <div class="col-sm-12 mt-3">
                                <div class="input-group input-group-md w-100 ">
                                    <input id="email" type="email"
                                        class="form-control border-0 border-bottom @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus
                                        placeholder="{{ __('Email Address') }}">

                                    @error('email')
                                    
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <div class="input-group input-group-md w-100">
                                    <input id="password" type="password"
                                        class="form-control password @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="current-password"
                                        placeholder="{{ __('Password')}}">
                                    <span class="input-group-text togglePassword bg-transparent" id="">
                                        <i data-feather="eye" style="cursor: pointer"></i>
                                    </span>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-labell" for="remember">
                                        {{ __('Ingat saya') }}
                                    </label>

                                </div>
                                <p class="text-center mb-0 mt-3">Belum Memiliki Akun?<a
                                        class="text-green text-decoration-none" href="{{ route('register') }}">
                                        {{ __('Daftar') }}
                                    </a><br>
                                    <a class="text-green text-decoration-none" href="{{ route('password.request') }}">
                                        {{ __('Lupa sandi?') }}
                                    </a></p>
                                @if (Route::has('password.request'))


                                @endif
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-sm-12 text-center pb-4">
                                <button type="submit" class="css-button-rounded--green w-75">
                                    {{ __('Masuk') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection

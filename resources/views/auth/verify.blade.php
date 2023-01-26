@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('verifikasi alamat email anda') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Link verifikasi sudah dikirimkan ke email anda.') }}
                        </div>
                    @endif

                    {{ __('Sebeluk melanjutkan, silahkan cek email anda untuk link verifikasi.') }}
                    {{ __('Jika anda tidak menerima email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('klik disini untuk cara lain atau kirim ulang.') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

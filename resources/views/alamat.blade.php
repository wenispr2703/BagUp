@extends('layouts.app')

@section('content')

<body>
    <div class="container">
        <div class="col-sm-12 mt-5 text-center">
            <h2 class="fw-bold text-green pt-5 mt-5">Form Alamat</h2>
            <div class="custom-separator my-3 mb-5 mx-auto bg-brown"></div>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Gagal</strong>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @else

        @endif
        <form action="{{ route('addalamat') }}" method="POST" enctype="multipart/form-data" class="w-75 d-block mx-auto">
            @csrf
            <div class="row">
                <div class="col-xs-12 my-sm-2">
                    <div class="form-group">
                        <p><strong>Nama penerima</strong></p>
                        <input type="text" name="nama" id="" class="form-control" placeholder="Nama pengguna">
                    </div>
                </div>
                <div class="col-xs-12 my-sm-2">
                    <div class="form-group">
                        <p><strong>No. Telepon penerima</strong></p>
                        <input type="number" name="hp" id="" class="form-control" placeholder="No. handphone">
                    </div>
                </div>
                <div class="col-xs-12 my-sm-2">
                    <div class="form-group">
                        <p><strong>alamat</strong></p>
                        <textarea name="alamat" id="" cols="30" rows="10" class="form-control"
                            placeholder="alamat"></textarea>
                    </div>
                </div>

                <div class="col-xs-12 my-sm-4">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                    <a href="{{ route('home')}}" class="btn btn-danger mx-2">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</body>
@endsection

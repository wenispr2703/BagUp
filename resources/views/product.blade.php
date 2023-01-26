@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
</head>

<body>
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
    <h2 class="text-center mt-5 fw-bold pt-5">Semua Produk</h2>
    <div class="custom-separator my-3 mb-5 mx-auto bg-brown"></div>
    <div class="container">
        <div
            class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3 d-flex justify-content-center align-content-center ">
            @foreach ($products as $data)
            <div class="col d-flex justify-content-center align-content-center">
                <div class="card" style="width: 18rem;" data-aos="zoom-out" data-aos-delay="300">
                    <img src="products/{{ $data->gambar }}" class="card-img-top mx-auto pt-2" style="width: 175px;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $data->nama_product }}</h5>
                        <p class="card-text">{{ $data->deskripsi }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Rp {{number_format($data->harga)}}</b></li>
                    </ul>
                    <div class="card-body text-center ">
                        <a href="{{ route('show', $data->id) }}" class="card-link text-decoration-none text-brown">Lebih lengkap</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>
@endsection

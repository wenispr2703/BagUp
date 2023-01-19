@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container mt-5 mb-5 pt-3">
        <h2 class="text-center fw-bold mt-5">Detail Product</h2>
        <div class="custom-separator my-3 mb-5 mx-auto bg-brown"></div>
        <div class="card">
            <div class="row g-0">
                <div class="col-md-6 border-end">
                    <div class="d-flex flex-column justify-content-center">
                        <div class="main_image"> <img src="/products/{{ $product->gambar }}" width="350" class="align-items-center w-50 mt-5 pt-5"> </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 right-side">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3>{{ $product->nama_product }}</h3> <span class="heart"><i class='bx bx-heart'></i></span>
                        </div>
                        <div class="mt-2 pr-3 content">
                            <p>{{ $product->deskripsi }}</p>
                        </div>
                        <h3>Rp {{number_format($product->harga)}}</h3>
                        <div class="ratings d-flex flex-row align-items-center">
                            <div class="d-flex flex-row"> <i class='bx bxs-star'></i> <i class='bx bxs-star'></i> <i
                                    class='bx bxs-star'></i> <i class='bx bxs-star'></i> <i class='bx bx-star'></i>
                            </div> <span>441 reviews</span>
                        </div>

                        <form action="{{route('addcart', $product->id)}}" method="post">

                            @csrf

                            <div class="form-group col-sm-12 mt-3">
                                <label for="color_id"><strong>Warna</strong></label>
                                <select class="form-select w-25" name="color_id" id="color_id">
                                    <option value="" selected>Pilih Warna</option>
                                    @foreach ($color as $data)
                                    <option value="{{$data->id}}" onkeyup="sum();">{{ $data->nama_warna }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="quantity col-sm-6 mt-2">
                                <span><strong>Jumlah :</strong></span>
                                <input type="number" name="quantity" id="" class="form-control w-25" value="1" min="1">
                            </div>
                            <div class="form-group col-sm-12 mt-2">
                                <label for="size_id"><strong>Ukuran</strong></label>
                                <select class="form-select w-25" name="size_id" id="size_id">
                                    <option value="" selected>Pilih Ukuran</option>
                                    @foreach ($size as $data)
                                    <option value="{{$data->id}}" onkeyup="sum();">{{ $data->nama_ukuran }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="buttons d-flex flex-row mt-5 gap-3">
                                <button class="btn btn-outline-dark" type="submit">Beli Sekarang</button>
                                <button class="btn btn-dark"><a href="{{url('/product')}}" class="text-decoration-none text-light">Kembali</a></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
@endsection

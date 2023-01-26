@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumen</title>
</head>

<body>
    <div class="container">
        <div class="col-sm-12">
            <h2 class="text-center fw-bold pt-5 mt-5">Perbarui Produk</h2>
            <div class="custom-separator my-3 mb-5 mx-auto bg-brown"></div>
        </div>
        <form action="{{ route('update', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-xs-12 my-sm-2">
                    <div class="form-group">
                        <p><strong>Nama Produk</strong></p>
                        <input type="text" name="nama_product" id="nama_product" class="form-control w-25"
                            placeholder="Nama product" value="{{ $product->nama_product }}">
                    </div>
                </div>

                <div class="col-xs-12 my-sm-2">
                    <div class="form-group">
                        <p><strong>Harga</strong></p>
                        <input type="number" name="harga" id="" class="form-control w-25" placeholder="warna" value="{{ $product->harga }}">
                    </div>
                </div>

                <div class="col-xs-12 my-sm-2">
                    <div class="form-group">
                        <p><strong>Deskripsi Produk</strong></p>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control">{{ $product->deskripsi }}</textarea>
                    </div>
                </div>

                <div class="form-group col-sm-12 mt-2">
                    <label for="category_id"><strong>Jenis Bahan</strong></label>
                    <select class="form-select w-50" name="material_id" id="material_id">
                        <option value="" selected>Pilih Jenis Bahan</option>
                        @foreach ($material as $data)
                        <option value="{{$data->id}}" onkeyup="sum();">{{ $data->nama_material }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-xs-12 my-sm-2">
                    <p><strong>Gambar</strong></p>
                    <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
                </div>

                <div class="col-xs-12 my-sm-4">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
@endsection

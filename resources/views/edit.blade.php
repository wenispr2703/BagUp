@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-sm-12">
        <h2 class="text-center fw-bold">Perbarui Pesanan</h2>
        <div class="custom-separator my-3 mb-5 mx-auto bg-brown"></div>
    </div>
    <form action="{{ route('update', $order->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="form-group col-sm-12 mt-2">
                <label for="category_id"><strong>Jenis Bahan</strong></label>
                <select class="form-select w-50" name="material_id" id="material_id">
                    <option value="" selected>Pilih Jenis Bahan</option>
                    @foreach ($material as $data)
                    <option value="{{$data->id}}" onkeyup="sum();">{{ $data->nama_material }}</option>
                    @endforeach
                </select>
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

            <div class="col-xs-12 my-sm-2">
                <div class="form-group">
                    <p><strong>Pilih warna</strong></p>
                    <input type="text" name="color" id="color" class="form-control w-25" placeholder="warna" value="{{ $order->color }}">
                </div>
            </div>

            <div class="form-group col-sm-6 mt-2">
                <label for="customer_id"><strong>Alamat</strong></label>
                <select class="form-select" name="customer_id" id="customer_id">
                    @foreach ($customer as $data)
                    <option value="{{$data->id}}" onkeyup="sum();">{{ $data->alamat }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-12 form-group mt-2">
                <label for="quantity"><strong>Jumlah pesanan</strong></label>
                <input type="number" name="quantity" id="quantity" class="form-control w-25"
                    placeholder="Jumlah pesanan" value="{{ $order->quantity }}">
            </div>
            <!-- <div class="col-xs-12 my-sm-2">
                    <div class="form-group">
                        <p><strong>Catatan</strong></p>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control"
                            placeholder="Catatan tambahan"></textarea>
                    </div>
                </div> -->
            <div class="col-xs-12 my-sm-2">
                <p><strong>Desain</strong></p>
                <input type="file" name="design" id="design" class="form-control" accept="image/*">
            </div>
            <div class="col-xs-12 my-sm-4">
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
        </div>
    </form>
</div>
@endsection

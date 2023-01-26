@extends('layouts.app')
@section('content')

<div class="container mt-5">
    @if (Auth::user()->role_as == '1')
    <h2 class="text-center fw-bold pt-5">Halaman Admin</h2>
    <div class="custom-separator my-3 mb-5 mx-auto bg-brown"></div>

    <li class="my-4"><a href="" class="text-decoration-none fs-5 fw-bold text-dark">Produk Pesanan</a></li>
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">

                <td scope="col">No</td>
                <td scope="col">ID Pemesan</td>
                <td scope="col">Nama produk</td>
                <td scope="col" width="150">harga</td>
                <td scope="col" width="400">warna</td>
                <td scope="col">jumlah</td>
                <td scope="col" width="300">ukuran</td>
                <td scope="col" width="100">Status pembayaran</td>
                <td scope="col" width="100">Status pesanan</td>
                <td scope="col" width="300">Total harga</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesanan as $cart)
            <tr class="text-center">
                <td>{{$loop->iteration}}</td>
                <td>{{$cart->user_id}}</td>
                <td>{{$cart->nama_product}}</td>
                <td>{{$cart->harga}}</td>
                <td>{{$cart->color->nama_warna}}</td>
                <td>{{$cart->quantity}}</td>
                <td>{{$cart->size->nama_ukuran}}</td>
                <td>{{$cart->pembayaran->nama_pembayaran}}</td>
                <td>{{$cart->status->nama_status}}</td>
                <td>{{$cart->total_cost}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>


    <li class="my-4"><a href="" class="text-decoration-none fs-5 fw-bold text-dark">Pesanan Custom</a></li>
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <td scope="col">No</td>
                <td scope="col">Nama</td>
                <td scope="col" width="150">alamat</td>
                <td scope="col" width="400">Desain totebag</td>
                <td scope="col">Jenis Bahan</td>
                <td scope="col" width="150">Ukuran</td>
                <td scope="col" width="100">Status pembayaran</td>
                <td scope="col" width="100">Status pesanan</td>
                <td scope="col" width="300">Total bayar</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr class="text-center">
                <td>{{$loop->iteration}}</td>
                <td>{{$order->customer->nama}}</td>
                <td>{{$order->customer->alamat}}</td>
                <td><img src="file/{{ $order->design }}" class="img-fluid rounded-start w-50"></td>
                <td>{{$order->material->nama_material}}</td>
                <td>{{$order->size->nama_ukuran}}</td>
                <td>{{$order->pembayaran->nama_pembayaran}}</td>
                <td>{{$order->status->nama_status}}</td>
                <td>{{number_format($order->material->harga * $order->quantity)}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <li class="my-4"><a href="" class="text-decoration-none fs-5 fw-bold text-dark">Konfirmasi pembayaran</a></li>
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <td scope="col">No</td>
                <td scope="col">ID pesanan</td>
                <td scope="col" width="150">Nama pengirim</td>
                <td scope="col" width="400">Bukti pembayaran</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($confirm as $pesan)
            <tr class="text-center">
                <td>{{$loop->iteration}}</td>
                <td>{{$pesan->id_pesanan}}</td>
                <td>{{$pesan->nama_pengirim}}</td>
                <td><img src="konfir/{{ $pesan->foto }}" class="img-fluid rounded-start w-25"></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <li class="my-4"><a href="" class="text-decoration-none fs-5 fw-bold text-dark">Data pelanggan</a></li>
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">

                <td scope="col">No</td>
                <td scope="col">User_id</td>
                <td scope="col">Nama</td>
                <td scope="col" width="150">Alamat</td>
                <td scope="col" width="200">No. Telepon</td>
                <td scope="col">Email</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $orang)
            <tr class="text-center">
                <td>{{$loop->iteration}}</td>
                <td>{{$orang->user_id}}</td>
                <td>{{$orang->nama}}</td>
                <td>{{$orang->alamat}}</td>
                <td>{{$orang->hp}}</td>
                <td>{{$orang->email}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @else
    <div class="container position-fixed">
        <div class="text-center d-flex justify-content-center w-100 flex-column vh-100">
            <div class="row main mx-auto py-5 px-4" style="width: 500px;">
            <img src="{{ asset('asset/img/not-found.svg') }}" class="img-fluid animated" alt="gambar">
                <h2 class="fw-bold mt-3">Error not found</h2>
                <p class="text-muted">Silahkan kembali ke halaman utama</p>
                <button class="btn btn-primary d-block mx-auto" style="width: 200px;"><a href="{{ url('/home') }}" class="text-light text-decoration-none">Back to Home</a></button>
            </div>
        </div>
    </div>
    @endif
    
</div>

@endsection

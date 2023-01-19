<?php

namespace App\Http\Controllers;

use App\Models\Confirm;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alamat');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirm()
    {
        return view('confirm');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addalamat(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'hp' => 'required',
            'alamat' => 'required',
        ]);

        $data = $request->all();

        $customer = new Customer;

        $customer->nama = $data['nama'];
        $customer->hp = $data['hp'];
        $customer->alamat = $data['alamat'];
        $customer->email = auth()->user()->email;
        $customer->user_id = auth()->id();

        $customer->save();

        return redirect()->route('home')->with('status', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $customer = Customer::all();

        return view('edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $input = $request->all();
        $customer->update($input);

        return redirect()->route('order')->with('success', 'Orderan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $customer
     * @return \Illuminate\Http\Response
     */
    public function hapuscust(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('order')->with('success', 'orderan berhasil dihapus');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addconfirm(Request $request) {
        $request->validate([
            'foto' => 'required|file|mimes:png,jpg,svg|max:2048',
        ]);

        $gambar = $request->file('foto');
        $destinationPath = 'konfir/';
        $gambarImage = date('YmdHis') . "." .$gambar->getClientOriginalExtension();
        $gambar->move($destinationPath, $gambarImage);
        $input['foto'] = "$gambarImage";

        $data = $request->all();

        $confirms = new Confirm;
        $confirms->id_pesanan = $data['id_pesanan'];
        $confirms->nama_pengirim = $data['nama_pengirim'];
        $confirms->foto = $gambarImage;

        $confirms->save();
        return redirect()->route('home')->with('status', 'success');
    }
}

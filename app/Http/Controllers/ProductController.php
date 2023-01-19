<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Color;
use App\Models\Size;
use App\Models\Product;
use App\Models\Material;
use App\Models\Pickup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $size = Size::with('orders')->get();
        $material = Material::with('orders')->get();
        $products = Product::with('size','material')->get();

        return view('product', compact('size', 'material', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $material = Material::all();
        $size = Size::all();

        return view('product.create', compact('material', 'size'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|file|mimes:png,jpg,svg|max:2048',
        ]);

        $gambar = $request->file('gambar');
        $destinationPath = 'products/';
        $gambarImage = date('YmdHis') . "." .$gambar->getClientOriginalExtension();
        $gambar->move($destinationPath, $gambarImage);
        $input['gambar'] = "$gambarImage";

        $data = $request->all();

        $product = new Product;
        $product->nama_product = $data['nama_product'];
        $product->harga = $data['harga'];
        $product->deskripsi = $data['deskripsi'];
        $product->gambar = $gambarImage;
        $product->material_id = $data['material_id'];
        $product->save();

        return redirect()->route('product')->with('status', 'product berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $color = Color::all();
        $size = Size::all();
        $pickup = Pickup::all();

        return view('product.show', compact('product', 'size', 'color', 'pickup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function payments(Cart $cart)
    {

        return view('payments', compact('cart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $material = Material::all();
        $size = Size::all();

        return view('product.edit', compact('product','material', 'size'));
    }

    public function addcart(Request $request, $id)
    {
        $request->validate([
            'size_id' => 'required',
            'color_id' => 'required',
        ]);
        $product = Product::find($id);

        $cart = new Cart;
        $cart->nama_product = $product->nama_product;
        $cart->harga = $product->harga;
        $cart->color_id = $request->color_id;
        $cart->quantity = $request->quantity;
        $cart->pickup_id = $request->pickup_id;
        $cart->size_id = $request->size_id;
        $cart->total_cost = $product->harga * $cart->quantity;
        $cart->user_id = auth()->id();
        $cart->save();

        return redirect()->route('payments', $cart->id)->with('success', 'berhasil');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $input = $request->all();

        if ($gambar = $request->file('gambar')) {
            $destinationPath = 'products/';
            $gambarImage = date('YmdHis') . "." .$gambar->getClientOriginalExtension();
            $gambar->move($destinationPath, $gambarImage);
            $input['gambar'] = "$gambarImage";
        } else {
            unset($input['gambar']);
        }
        $product->update($input);

        return redirect()->route('order')->with('success', 'Product berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function hapusproduct(Product $product)
    {
        $product->delete();

        return redirect()->route('product')->with('status', 'product berhasil dihapus');
    }
}

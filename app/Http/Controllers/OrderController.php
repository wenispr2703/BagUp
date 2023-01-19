<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Size;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Material;
use App\Models\Product;
use App\Models\Color;
use App\Models\Confirm;
use App\Models\Pickup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $confirm = Confirm::all();
        $customers = Customer::all();
        $pesanan = Cart::all();
        $size = Size::with('orders')->get();
        $material = Material::with('orders')->get();
        $customer = Customer::with('orders')->get();
        $orders = Order::with('size','material','customer')->get();

        return view('order', compact('size', 'material', 'customer', 'orders', 'pesanan', 'customers', 'confirm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pickup = Pickup::all();
        $color = Color::all();
        $material = Material::all();
        $customer = Customer::where('user_id', Auth::id())->get();
        $size = Size::all();

        return view('create', compact('material', 'customer', 'size', 'color', 'pickup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addcustom(Request $request)
    {
        $request->validate([
            'design' => 'required|file|mimes:png,jpg,svg|max:2048'
        ]);

        $design = $request->file('design');
        $destinationPath = 'file/';
        $designImage = date('YmdHis') . "." .$design->getClientOriginalExtension();
        $design->move($destinationPath, $designImage);
        $input['image'] = "$designImage";

        $data = $request->all();

        $order = new Order;
        $order->design = $designImage;
        $order->material_id = $data['material_id'];
        $order->size_id = $data['size_id'];
        $order->color_id = $data['color_id'];
        $order->customer_id = $data['customer_id'];
        $order->quantity = $data['quantity'];
        $order->user_id = auth()->id();
        $order->save();

        return redirect()->route('payment', $order->id)->with('success', 'berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */

    public function myAddress(Customer $customer) {
        $address = Customer::where('user_id', Auth::id())->get();
        
        return view('myaddress', compact('address'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('show', compact('order'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function payment(Order $order)
    {
        return view('payment', compact('order'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $pickup = Pickup::all();
        $material = Material::all();
        $customer = Customer::all();
        $size = Size::all();

        return view('edit', compact('order','material', 'customer', 'size', 'pickup'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $input = $request->all();

        if ($design = $request->file('design')) {
            $destinationPath = 'file/';
            $designImage = date('YmdHis') . "." .$design->getClientOriginalExtension();
            $design->move($destinationPath, $designImage);
            $input['design'] = "$designImage";
        } else {
            unset($input['design']);
        }
        $order->update($input);

        return redirect()->route('order')->with('success', 'Orderan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function hapusorder(Order $order)
    {
        $order->delete();

        return redirect()->route('order')->with('success', 'orderan berhasil dihapus');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function myOrder(Order $order) {
        $orders = Order::where('user_id', Auth::id())->get();
        $products = Cart::where('user_id', Auth::id())->get();
        
        return view('myorder', compact('products', 'orders'));
    }
}

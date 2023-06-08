<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Survey;
use App\Models\User;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function changeDetail(Request $request){
        $order = Order::where('id', $request->id)->first();
        if($order->seller_id != Auth::user()->id && ($request->status == 1 || $request->status == 2)) return redirect('/order/detail/'.$request->id);
        if($order->seller_id != Auth::user()->id && $order->buyer_id != Auth::user()->id) return redirect('/order/detail/'.$request->id);
        $order->status = $request->status;
        $order->save();
        if($order->status == 3 || $order->status == '3'){
            $seller = User::where('id', $order->seller->id)->first();
            $seller->saldo = $seller->saldo+($seller->harga*$order->durasi);
            $seller->save();
        }
        if($order->status == 1 || $order->status == '1'){
            $buyer = User::where('id', $order->buyer->id)->first();
            $buyer->saldo = $buyer->saldo+($order->seller->harga*$order->durasi);
            $buyer->save();
        }
        if(Auth::user()->kategori == 0) return redirect('/order/detail/'.$request->id);
        else  return redirect('/order/customer/'.$request->id);
    }

    public function viewCustomer()
    {
        return view('listCustomer', [
            'orders' => Order::where('seller_id', Auth::user()->id)->get(),
        ]);        
    }
    public function viewOrder($id)
    {
        if($id == Auth::user()->id) return redirect('/user/detail/'.$id);
        return view('form', [
            'user' => User::where('id', $id)->first(),
        ]);        
    }

    public function viewOrderDetail($id)
    {
        return view('orderDetail', [
            'order' => Order::where('id', $id)->first(),
        ]);        
    }
    public function viewOrderDetailCustomer($id)
    {
        return view('orderDetailCustomer', [
            'order' => Order::where('id', $id)->first(),
        ]);        
    }

    public function createOrder(Request $request)
    {
        $seller = User::where('id', $request->user_id)->first();
        if(Auth::user()->saldo < $seller->harga*$request->jam) return redirect()->back()->with('error', 'Saldo anda tidak mencukupi!');
        $buyer = User::where('id', Auth::user()->id)->first();
        $order = new Order();
        $order->buyer_id = $buyer->id;
        $order->seller_id = $seller->id;
        $order->deskripsi = $request->deskripsi;
        $order->durasi = $request->jam;
        $order->save();
        if($request->file('lampiran')){
            $file = $request->file('lampiran');

            $name = $order->id;
            $extension = $file->getClientOriginalExtension();
            $newName = $name.'.'.$extension;
            $input = 'uploads/lampiran/'.$newName;
            $request->lampiran->move(public_path('uploads/lampiran/'), $newName);

            $order->lampiran = $input;
            $order->save();
        }

        $buyer->saldo = $buyer->saldo - ($seller->harga*$request->jam);
        $buyer->save();

        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function showHistory()
    {
        return view('history', [
            'orders' => Order::where('buyer_id', Auth::user()->id)->get(),
            'surveys' => Survey::where('buyer_id', Auth::user()->id)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}

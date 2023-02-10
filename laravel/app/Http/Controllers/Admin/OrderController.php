<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', '0')->get();
        // $paybukti =  Order::where('id')->get();
        return view('admin.orders.index', compact('orders'));
    }
    public function view($id)
    {

        $orders = Order::where('id', $id)->first();
        return view('admin.orders.view', compact('orders'));
    }
    public function updatePesanan(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->status = $request->input('status_pesanan');
        $orders->update();
        return redirect('orders')->with('status', "Pesanan Telah Terupdate");
    }
    public function riwayatPesanan()
    {
        $orders = Order::where('status', '1')->get();
        return view('admin.orders.riwayat', compact('orders'));
    }
    public function orderload()
    {
        $ordercount = Order::where('user_id')->count();
        return response()->json(['count' => $ordercount]);
    }
}

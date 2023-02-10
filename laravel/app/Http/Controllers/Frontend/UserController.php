<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->get();


        return view('frontend.orders.index', compact('orders'));
    }
    public function viewOrder($id)
    {
        // $ordernotif =  OrderItem::where('order_id', Order::id())->get();
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        return view('frontend.orders.view', compact('orders'));
    }
    public function pembayaran(Request $request, $id)
    {
        // $orders = OrderItem::find($id)->first();
        // $orderitemA = OrderItem::where('order_id', $id)->get();
        // $orders = OrderItem::find($id)->first();
        $orders = OrderItem::where('id', $id)->first();
        if ($request->hasFile('pay')) {
            $path = 'admin/assets/uploads/pembayaran' . $orders->pay;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('pay');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('admin/assets/uploads/pembayaran', $filename);
            $orders->pay = $filename;
        }
        $orders->update();
        return redirect('my-orders')->with('status' . "Pesanan telah di proses");
    }
}

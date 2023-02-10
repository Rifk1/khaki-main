<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalOrder = Order::count();
        $totaluser = User::where('role_as', '0')->count();
        $totalProduk = Product::count();
        $totalCategory = Category::count();
        return view('admin.index', compact('totalOrder', 'totaluser', 'totalProduk', 'totalCategory'));
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    public function viewUser($id)
    {
        $users = User::find($id);
        return view('admin.users.view', compact('users'));
    }
}

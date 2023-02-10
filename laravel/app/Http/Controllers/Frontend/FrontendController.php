<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $unggulan_products = Product::where('trending', '1')->take(15)->get();
        $trending_category = Category::where('popular', '1')->take(15)->get();

        return view('frontend.index', compact('unggulan_products', 'trending_category'));
    }
    public function category()
    {
        $category = Category::where('status', '0')->get();
        return view('frontend.category', compact('category'));
    }

    public function viewcategory($slug)
    {
        if (Category::Where('slug', $slug)->exists()) {
            $category = Category::Where('slug', $slug)->first();
            $products = Product::Where('cate_id', $category->id)->where('status', '0')->get();
            return view('frontend.products.index', compact('category', 'products'));
        } else {
            return redirect('/')->with('status', 'slug doestnot esxis');
        }
    }
    public function productview($cate_slug, $prod_slug)
    {
        if (Category::Where('slug', $cate_slug)->exists()) {
            if (Product::Where('slug', $prod_slug)->exists()) {
                $products = Product::Where('slug', $prod_slug)->first();
                return view('frontend.products.view', compact('products'));
            } else {
                return redirect('/')->with('status', "link rusak");
            }
        } else {
            return redirect('/')->with('status', "category tidak di temukan");
        }
    }
    public function productview2($slug)
    {
        $products = Product::Where('slug', $slug)->first();
        return view('frontend.products.view', compact('products'));
    }
    // public function payalert()
    // {
    //     $orderalert = Order::where('user_id', Auth::id())->count();
    //     if ($orderalert == 0) {
    //         $tag = '<span class="position-absolute top-10 start-90 me-4 translate-middle p-1 bg-danger border border-light rounded-circle ">
    //     <span class="visually-hidden">New alerts</span>
    //   </span>';
    //     }
    //     return view('layouts.inc.frontnav', ['tag' => $tag], compact('tag'));
    // }
    public function productlistajax()
    {
        $products = Product::select('name')->where('status', '0')->get();
        $data = [];
        foreach ($products as $item) {
            $data[] = $item['name'];
        }
        return $data;
    }
    public function searcProduct(Request $request)
    {
        $searched_product = $request->product_name;
        if ($searched_product != "") {
            $product = Product::where("name", "LIKE", "%$searched_product%")->first();
            if ($product) {
                return redirect('category/' . $product->category->slug . '/' . $product->slug);
            } else {
                return redirect()->back()->with("status", "Produk Yang Kamu Cari Tidak Ada");
            }
        } else {
            return redirect()->back();
        }
    }
}

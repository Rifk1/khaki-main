<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v1;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        return view('frontend.wishlist', compact('wishlist'));
    }

    public function add(Request $request)
    {
        // if (Auth::check()) {
        //     $prod_id = $request->input('product_id');
        //     if (Product::find($prod_id)) {
        //         $wish = new Wishlist();
        //         $wish->prod_id = $prod_id;
        //         $wish->user_id = Auth::id();
        //         $wish->save();
        //         return response()->json(['status' =>   "Produk Ditambahkan Ke sukai"]);
        //     } else {
        //         return response()->json(['status' =>   "Produk Sudah Ada"]);
        //     }
        // } else {
        //     return response()->json(['status' => "Login dahulu"]);
        // }
        ////////////////////////////////////////
        $prod_id = $request->input('product_id');

        if (Auth::check()) {
            $prod_check = Product::where('id', $prod_id)->first();

            if ($prod_check) {

                if (Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {

                    return response()->json(['status' => "(" . $prod_check->name .  ") Sudah Ada Di List"]);
                } else {
                    $wish = new Wishlist();
                    $wish->prod_id = $prod_id;
                    $wish->user_id = Auth::id();
                    $wish->save();
                    return response()->json(['status' =>   "Produk Ditambahkan Ke sukai"]);
                }
            }
        } else {
            return response()->json(['status' => "Login dahulu"]);
        }
    }
    public function deleteWishlist(Request $request)
    {
        if (Auth::check()) {
            $prod_id = $request->input('prod_id');
            if (Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {

                $wish = Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $wish->delete();
                return response()->json(['status' => "Produk Berhasil Di Hapus Dari List"]);
            }
        } else {
            return response()->json(['status' => "Login dahulu"]);
        }
    }
    public function hatiload()
    {
        $haticount = Wishlist::where('user_id', Auth::id())->count();
        return response()->json(['count' => $haticount]);
    }
}

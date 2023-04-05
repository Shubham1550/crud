<?php

namespace App\Http\Controllers;

use App\Models\Front;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //

    public  function index(){
        return view('front.index');
    }

    public function about(){
        return view('front.about');
    }

    public function shop(){
        // $product = Front::with('product')->get();
        // dd($product);
        return view('front.shop');
    }

    public function shop_single(){
        // $product = Front::with('product')->get();
        // dd($product);
        return view('front.shop_single');
    }

    public function contact(){
        return view('front.contact');
    }

    public function cart(){
        return view('front.cart');
    }

    public function checkout(){
        return view('front.checkout');
    }

    public function thankyou(){
        return view('front.thankyou');
    }
}

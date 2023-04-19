<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Contact;
use App\Models\Front;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //

    public  function index(){
        $products = Product::take(3)->get();
        $category = Category::all();
        return view('front.index',compact('products','category'));
    }

    public function about(){
        return view('front.about');
    }

    public function shop(){
        $products = Product::take(3)->get();
        $category = Category::all();
        $color = Color::all();
        // dd($products);
        return view('front.shop',compact('products','category','color'));
    }

    public function shop_single($id){
        $product = Product::find($id);
        $data = Product::all();
        // dd($products);
        return view('front.shop_single',compact('product','data'));
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

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    //
    public function cart(){
        return view('front.cart');
    }
    //Add to Wishlist
	public function addToWishlist($id){

		$res = array();
		$datalist = Product::where('id', $id)->first();

		$user = User::where('id', $datalist['user_id'])->first();

		$data = array();
		$data['id'] = $datalist['id'];
		$data['name'] = $datalist['title'];
		$data['qty'] = 1;
		$data['price'] = $datalist['sale_price'];
		$data['weight'] = 0;


		$response = Cart::instance('wishlist')->add($data);
        // dd($response);
		if($response){
			$res['msgType'] = 'success';
			$res['msg'] = __('New Data Added Successfully');
		}else{
			$res['msgType'] = 'error';
			$res['msg'] = __('Added product to wishlist failed.');
		}

		return response()->json($res);
	}

    public function countWishlist(){

		$count = Cart::instance('wishlist')->content()->count();
    // dd($count);
		return response()->json($count);
	}

    public function AddToCart($id){

		$res = array();
		$datalist = Product::where('id', $id)->first();
		$user = User::where('id', $datalist['user_id'])->first();

		$data = array();
		$data['id'] = $datalist['id'];
		$data['name'] = $datalist['title'];
        $data['qty'] = 1;
		// $data['qty'] = $qty == 0 ? 1 : $qty;
		$data['price'] = $datalist['sale_price'];
		$data['weight'] = 0;
    // dd($data);



		$response = Cart::instance('shopping')->add($data);
		if($response){
			$res['msgType'] = 'success';
			$res['msg'] = __('New Data Added Successfully');
		}else{
			$res['msgType'] = 'error';
			$res['msg'] = __('Added product to cart failed.');
		}

		return response()->json($res);
	}
}



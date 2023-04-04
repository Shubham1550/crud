<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\User;

class BrandController extends Controller
{
    //
    public function create(Request $request){
        $product = Product::all();
        $user = User::all();
        return view('admin.brand.create', compact('product','user'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'user_id'=>'required',
            'product_id'=>'required'
        ]);
        $brand = new Brand();
        $brand-> name =$request-> name;
        $brand-> user_id =$request-> user_id;
        $brand-> product_id =$request-> product_id;
        $brand->Save();
        return redirect()->route('brand.index')->with('message','Data Added Successfully!');
    }

    public function index(){
        $brand = Brand::with('product','user')->get();
        // $categories = Category::all();
        // $product = Product::all();
        // dd($brand);
        return view('admin.brand.index', compact('brand'));
    }

    public function edit($id){
        $brand= Brand::with('user','product')->find($id);
        $users = User::all();
        $product = Product::all();

        return view('admin.brand.edit', compact('brand','users','product'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'name'=>'required',
            'user_id'=>'required',
            'product_id'=>'required'
        ]);
        $brand = Brand::find($id);
        $brand-> name =$request-> name;
        $brand-> user_id =$request-> user_id;
        $brand-> product_id =$request-> product_id;
        $brand->Save();
        return redirect()->route('brand.index')->with('message','Data Updated Successfully!');
    }

    public function delete($id){
        $brand=Brand::find($id);
        $brand->delete();
        return redirect()->route('brand.index')->with('message','Data Deleted Successfully!');
    }
}

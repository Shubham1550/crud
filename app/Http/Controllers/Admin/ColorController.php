<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Product;
use App\Models\User;

class ColorController extends Controller
{
    //
    public function create(Request $request){
        $product = Product::all();
        $user = User::all();
        return view('admin.color.create', compact('product','user'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'user_id'=>'required',
            'product_id'=>'required'
        ]);
        $color = new Color();
        $color-> name =$request-> name;
        $color-> user_id =$request-> user_id;
        $color-> product_id =$request-> product_id;
        $color->Save();
        return redirect()->route('color.index')->with('message','Data Added Successfully!');
    }

    public function index(){
        $color = Color::with('product','user')->get();
        // $product = Product::all();
        // $categories = Category::all();
        // dd($color);
        return view('admin.color.index', compact('color'));
    }

    public function edit($id){
        $color= Color::with('user','product')->find($id);
        $users = User::all();
        $product = Product::all();
        return view('admin.color.edit', compact('product','users','color'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'name'=>'required',
            'user_id'=>'required',
            'product_id'=>'required'
        ]);
        $color = Color::find($id);
        $color-> name =$request-> name;
        $color-> user_id =$request-> user_id;
        $color-> product_id =$request-> product_id;
        $color->Save();
        return redirect()->route('color.index')->with('message','Data Updated Successfully!');
    }

    public function delete($id){
        $color=Color::find($id);
        $color->delete();
        return redirect()->route('color.index')->with('message','Data Deleted Successfully!');
    }
}

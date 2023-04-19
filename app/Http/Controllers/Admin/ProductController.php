<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class ProductController extends Controller
{
    //
    public function create(Request $request){
        $categories = Category::all();
        $brand = Brand::all();
        $color = Color::all();
        $user = User::all();
        return view('admin.product.create', compact('categories','brand','color','user'));
    }

    public function store(Request $request){
        // $this->validate($request,[
        //     'title'=>'required',
        //     'description'=>'required',
        //     'image'=>'required',
        //     'category'=>'required'
        // ]);
        $product = new Product();
        $product -> title = $request-> title;
        $product -> description = $request-> description;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('image/',$filename);
            $product->image = $filename;
        }
        $product -> category_id = $request-> category_id;
        $product -> sizes = $request-> sizes;
        $product -> brand_id = $request-> brand_id;
        $product -> color_id = $request-> color_id;
        $product -> user_id = $request-> user_id;
        $product -> t_quantity = $request-> t_quantity;
        $product -> price = $request-> price;
        $product-> save();
        return redirect()->route('product.index')->with('message','Data Added Successfully!');
}
    public function index(){
    $product = Product::all();
    $categories = Category::all();
    $brand = Brand::all();
    $color = Color::all();
    $user = User::all();
    // dd($product);
    return view('admin.product.index', compact('product','categories','brand','color','user'));
}

public function edit($id){
    $product= Product::find($id);
    $categories = Category::all();
    $brand = Brand::all();
    $color = Color::all();
    $user = User::all();
    return view('admin.product.edit', compact('product','categories','brand','color','user'));
}

public function update(Request $request,$id){
    // $this->validate($request,[
    //     'title'=>'required',
    //     'description'=>'required',
    //     'image'=>'required',
    //     'category'=>'required'
    // ]);
    $product = Product::find($id);
    $product -> title = $request-> title;
    $product -> description = $request-> description;
    if($request->hasFile('image'))
    {
        $file = $request->file('image');
        $extention = $file->getClientOriginalExtension();
        $filename = time().'.'.$extention;
        $file->move('image/',$filename);
        $product->image = $filename;
    }
    $product -> category_id = $request-> category_id;
    $product -> sizes = $request-> sizes;
    $product -> color_id = $request-> color_id;
    $product -> user_id = $request-> user_id;
    $product -> t_quantity = $request-> t_quantity;
    $product -> price = $request-> price;
    $product -> brand_id = $request-> brand_id;
    // dd($user);
    $product-> save();
    return redirect()->route('product.index')->with('message','Data Updated Successfully!');
}

    public function delete($id){
        $product=Product::find($id);
        $product->delete();
        return redirect()->route('product.index')->with('message','Data Deleted Successfully!');
}
}

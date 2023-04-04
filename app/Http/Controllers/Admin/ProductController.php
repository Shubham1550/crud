<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function create(Request $request){
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'image'=>'required',
            'category'=>'required'
        ]);
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
        // dd($user);
        $product-> save();
        return redirect()->route('product.index')->with('message','Data Added Successfully!');
}
    public function index(){
    $product = Product::all();
    $categories = Category::all();
    return view('admin.product.index', compact('product','categories'));
}

public function edit($id){
    $product= Product::find($id);
    $categories = Category::all();
    return view('admin.product.edit', compact('product','categories'));
}

public function update(Request $request,$id){
    $this->validate($request,[
        'title'=>'required',
        'description'=>'required',
        'image'=>'required',
        'category'=>'required'
    ]);
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

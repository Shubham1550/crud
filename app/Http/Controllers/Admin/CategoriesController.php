<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function create(){
        return view('admin.categories.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'image'=>'required',
            'status'=>'required'
        ]);
        $user = new Category();
        $user -> name = $request-> name;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('image/',$filename);
            $user->image = $filename;
        }
        $user -> status = $request-> status;
        // dd($user);
        $user-> save();
        return redirect()->route('category.index')->with('message','Data Added Successfully!');
    }

    public function index(){
        $user = Category::all();
        return view('admin.categories.index', compact('user'));
    }

    public function edit($id){
        $user= Category::find($id);
        return view('admin.categories.edit', compact('user'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'name'=>'required',
            'image'=>'required',
            'status'=>'required'
        ]);
        $user=Category::find($id);
        $user -> name = $request-> name;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('image/',$filename);
            $user->image = $filename;
        }
        $user -> status = $request-> status;
        $user->save();
        return redirect()->route('category.index')->with('message','Data Updated Successfully!');
    }

    public function delete($id){
    $user=Category::find($id);
    $user->delete();
    return redirect()->route('category.index')->with('message','Data Deleted Successfully!');
}
}

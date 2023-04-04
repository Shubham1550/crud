<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function index(){
        // $user = Category::all();
        return view('index');
    }

    public function store(Request $request){
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
        return redirect()->route('table');
    }

    public function table(){
        $user= Category::all();
        return view('table', compact('user'));
    }

    public function edit($id){
        $user= Category::find($id);
        return view('edit', compact('user'));
    }

    public function update(Request $request,$id){
        $user=Category::find($id);
        $user -> name = $request-> name;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/image/',$filename);
            $user->image = $filename;
        }
        $user -> status = $request-> status;
        $user->save();
        return redirect()->route('table');
    }

    public function delete($id){
    $user=Category::find($id);
    $user->delete();
    return redirect()->route('table');
}
}

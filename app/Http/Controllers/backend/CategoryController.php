<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function CategoryView(){
        $category = Category::latest()->get();
        return view('backend.category.category_view',compact('category'));
    }

    public function CategoryStore(Request $request){
        $request->validate([                // Data validation
            'category_name' => 'required',
            'category_icon' => 'required',
        ]);

        Category::insert([                  //Data Insertion
            'Category_name' => $request->category_name,
            'Category_icon' => $request->category_icon,
            
        ]);
                                            //success Message     
        $notification = array(
            'message' => 'Category Inserted Successfuly',
            'alert-type' => 'success'        
        );

        return redirect()->back()->with($notification);
    }

    public function CategoryDelete($id){
        Category::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Brand Inserted Successfuly',
            'alert-type' => 'success'        
        );
        return redirect()->route('all.category')->with($notification);       
    }
    
    public function CategoryEdit($id){
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit',compact('category'));
    }

    public function CategoryUpdate(Request $request){
       // print_r($request->category_icon);
        $data = Category::findOrFail($request->id);
        $data->category_name = $request->category_name;
        $data->category_icon = $request->category_icon;

        $data->save();
        return redirect()->route('all.category');
    }



}

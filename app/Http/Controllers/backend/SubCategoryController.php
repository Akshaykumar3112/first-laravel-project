<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;


class SubCategoryController extends Controller
{
    // View All SubCategory
    public function SubCategoryView(){
        
        $categories = Category::orderBy('category_name','ASC')->get();
        $subcategory = SubCategory::latest()->get();

        return view('backend.category.subcategory_view',compact('subcategory','categories'));
    }

    // Store SubCategory
    public function SubCategoryStore(Request $request){
        $request->validate([                // Data validation
            'category_id' => 'required',
            'subcategory_name' => 'required',
        ]);
        

        SubCategory::insert([                  //Data Insertion
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            
        ]);
                                            //success Message     
        $notification = array(
            'message' => 'Category Inserted Successfuly',
            'alert-type' => 'success'        
        );

        return redirect()->back()->with($notification);
    }

    public function SubCategoryEdit($id){
        $categories = Category::orderBy('category_name','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);

        return view('backend.category.subcategory_edit',compact('categories','subcategory'));
    }

    public function SubcategoryUpdate(Request $request){
        $data = SubCategory::findOrFail($request->id);
        $data->category_id = $request->category_id;
        $data->subcategory_name = $request->subcategory_name;

        $data->save();
        return redirect()->route('all.subcategory');
    }

    public function SubCategoryDelete($id){
        SubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Brand Inserted Successfuly',
            'alert-type' => 'success'        
        );
        return redirect()->route('all.subcategory')->with($notification);       
    }
}


<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
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
    }//End Function

    // View Page For Edit SubCategory
    public function SubCategoryEdit($id){
        $categories = Category::orderBy('category_name','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);

        return view('backend.category.subcategory_edit',compact('categories','subcategory'));
    }//End Function

    //Update SubCategory
    public function SubCategoryUpdate(Request $request){
        $data = SubCategory::findOrFail($request->id);
        $data->category_id = $request->category_id;
        $data->subcategory_name = $request->subcategory_name;

        $data->save();
        return redirect()->route('all.subcategory');
    }// End Function

    // Delete SubCategory
    public function SubCategoryDelete($id){
        SubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Brand Inserted Successfuly',
            'alert-type' => 'success'        
        );
        return redirect()->route('all.subcategory')->with($notification);       
    }//End Function

    // ------------------- Sub Sub Category
    // View Sub-Sub Category Data
    public function SubSubCategoryView(){
        $categories = Category::orderBy('category_name','ASC')->get();
        $subsubcategory = SubSubCategory::latest()->get();

        return view('backend.category.sub_subcategory_view',compact('subsubcategory','categories'));
    }// End Function

    // Add Sub-SubCategory Data
    public function SubSubCategoryStore(Request $request){
        $request->validate([                // Data validation
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name' => 'required',
        ]);
        
        SubSubCategory::insert([                  //Data Insertion
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name' => $request->subsubcategory_name,
        ]);
                                            //success Message     
        $notification = array(
            'message' => 'Category Inserted Successfuly',
            'alert-type' => 'success'        
        );

        return redirect()->back()->with($notification);
    }// End Function
     
    public function SubSubCategoryDelete($id){
        SubSubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Brand Inserted Successfuly',
            'alert-type' => 'success'        
        );
        return redirect()->route('all.subsubcategory')->with($notification);
    }//End Function

    // View Sub-SubCategory Edit 
    public function SubSubCategoryEdit($id){
        $categories = Category::orderBy('category_name','ASC')->get();
        $subcategory = SubCategory::orderBy('subcategory_name','ASC')->get();
        $subsubcategory = SubSubCategory::findOrFail($id);

        return view('backend.category.sub_subcategory_edit',compact('categories','subcategory','subsubcategory'));
    }//End Function

    // Update Sub-SubCategory
    public function SubSubCategoryUpdate(Request $request){
        $data = SubSubCategory::findOrFail($request->id);
        $data->category_id = $request->category_id;
        $data->subcategory_id = $request->subcategory_id;
        $data->subsubcategory_name = $request->subsubcategory_name;

        $data->save();
        return redirect()->route('all.subsubcategory');

    }//End Function

    // Get Sub Category to Load DropDown With JavaScript
    public function GetSubCategory($category_id){
        $data = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();
        return json_encode($data);
    } // End Function
}


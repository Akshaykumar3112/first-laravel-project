<?php

namespace App\Http\Controllers\backend;
use App\Models\brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
class BrandController extends Controller
{
    public function BrandView(){

        $brands = Brand::latest()->get();
        return view('backend.brand.brand_view',compact('brands'));
    }

    // Add New Brand 
    public function BrandStore(Request $request){
        $request->validate([                // Data validation
            'brand_name' => 'required',
            'brand_image' => 'required',
        ]);

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('images/brand/'.$name_gen);
        //$image->move(public_path('images/brand'),$name_gen);
        
        
        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $name_gen,
            
        ]);

        $notification = array(
            'message' => 'Brand Inserted Successfuly',
            'alert-type' => 'success'        
        );

        return redirect()->back()->with($notification);
    } //End Method

    // Brand Edit Function
    public function BrandEdit($id){
        $brand = Brand::findOrFail($id);
        return view('backend.brand.brand_edit',compact('brand'));
    }

    //Brand Update Function 
    public function BrandUpdate(Request $request){
       $brand = Brand::find($request->id);
        $brand->brand_name = $request->brand_name;
        if($request->file('brand_image')){
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            @unlink(public_path('images/brand/'.$brand->brand_image));
            Image::make($image)->resize(300,300)->save('images/brand/'.$name_gen);
            $brand['brand_image'] = $name_gen;           
        }
        $brand->save();
        return redirect()->route('all.brand');        
    }

    //Delete Brand Function
    public function BrandDelete($id){
        $brand = Brand::findOrFail($id);
        @unlink(public_path('images/brand/'.$brand->brand_image));
        Brand::findOrFail($id)->delete();
        
        $notification = array(
            'message' => 'Brand Inserted Successfuly',
            'alert-type' => 'success'        
        );
        return redirect()->route('all.brand')->with($notification);       
    }


}

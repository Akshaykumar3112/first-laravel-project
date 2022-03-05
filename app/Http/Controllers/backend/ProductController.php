<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Category;
use App\Models\brand;
use App\Models\Product;
use Carbon\Carbon;
use Image;
use App\Models\MultiImg;




class ProductController extends Controller
{
    // View Page To Add Product
    public function AddProduct(){

        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        
        return view('backend.product.product_add', compact('categories','brands'));
    }



    // Store Products
    public function StoreProduct(Request $request){

        $request->validate([                // Data validation
            'brand_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'product_name' => 'required',
            'product_code' => 'required',
            'product_qty' => 'required',
            'product_tags' => 'required',
            'product_size' => 'required',
            'product_color' => 'required',
            'selling_price' => 'required',
            'discount_price' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'product_thambnail' => 'required',
            'multi_img' => 'required',

        ]);

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('images/product/thambnail/'.$name_gen);
        $saveUrl = 'images/product/thambnail/'.$name_gen;
        
        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            
            'product_name' => $request->product_name,
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,

            'product_size' => $request->product_size,
            'product_color' => $request->product_color,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,

            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => $request->status,
            'product_thambnail' => $saveUrl,            
            'created_at' => Carbon::now(),
        ]);


        //Multiple image Upload Start
        $images = $request->file('multi_img');
        foreach($images as $img){
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('images/product/multi-image/'. $make_name);
            $uploadPath = 'images/product/multi-image/'. $make_name;
            MultiImg::insert([
                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('manage.product')->with($notification);
    }

    // Display Products 
    public function ManageProduct(){
        $products = Product::latest()->get();
        return view('backend.product.product_view',compact('products'));
    }

    // Delete Product
    public function DeleteProduct($id){
            Product::findOrFail($id)->delete();
            $notification = array(
                'message' => 'Brand Inserted Successfuly',
                'alert-type' => 'success'        
            );
            return redirect()->route('manage.product')->with($notification);
    }

    public function EditProduct($id){

        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        $brands = Brand::latest()->get();
        $product = Product::findOrFail($id);
       // $multiImage = MultiImg::where('product_id',$id);
       // dd($multiImage->photo_name);
        return view('backend.product.product_edit', compact('categories','brands','product','multiImage'));
    }


}

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
            $product =  Product::findOrFail($id);
            @unlink(public_path($product->product_thambnail));
            $multiImgs = MultiImg :: where('product_id',$id)->get();
            foreach($multiImgs as $img){
                @unlink(public_path($img->photo_name));   
            }
            MultiImg :: where('product_id',$id)->delete();
            Product::findOrFail($id)->delete();
            $notification = array(
                'message' => 'Product Deleted Successfuly',
                'alert-type' => 'success'        
            );
            return redirect()->route('manage.product')->with($notification);
    }

    // Display Edit Product Viewpage Withdata
    public function EditProduct($id){

        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        $brands = Brand::latest()->get();
        $product = Product::findOrFail($id);
        $multiImgs = MultiImg :: where('product_id',$id)->get();
    
        return view('backend.product.product_edit', compact('categories','brands','product','subcategories','subsubcategories','multiImgs'));
    }// End Method

    // Update Product Data
    public function UpdateProduct(Request $request){

        $product_id = $request->id;
        $product = Product::findOrFail($product_id);

        if($request->file('product_thambnail'))       // Update Thambnail Image If New Image selected
        {
            $image = $request->file('product_thambnail');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            @unlink(public_path($product->product_thambnail));
            Image::make($image)->resize(917,1000)->save('images/product/thambnail/'.$name_gen);
            $saveUrl = 'images/product/thambnail/'.$name_gen;
            $product['product_thambnail'] = $saveUrl;
        }  // End If 

        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->subsubcategory_id = $request->subsubcategory_id;
            
        $product->product_name = $request->product_name;
        $product->product_code = $request->product_code;
        $product->product_qty = $request->product_qty;
        $product->product_tags = $request->product_tags;

        $product->product_size = $request->product_size;
        $product->product_color = $request->product_color;
        $product->selling_price = $request->selling_price;
        $product->discount_price = $request->discount_price;

        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
       
        if($request->hot_deals == 1){$product->hot_deals = 1;}else{$product->hot_deals=0;}
        if($request->featured == 1){$product->featured = 1;}else{$product->featured=0;}
        if($request->special_offer == 1){$product->special_offer = 1;}else{$product->special_offer=0;}
        if($request->special_deals == 1){$product->special_deals = 1;}else{$product->special_deals=0;}
        if($request->status == 1){$product->status = 1;}else{$product->status=0;}           
        $product->created_at = Carbon::now();
        
        $product->save();  // Update Product Data
        
        if($request->file('multi_img')){   // Update Multiple Images If New Images Selected
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
        } // End If

        $notification = array(
            'message' => 'Product Updated Successfuly',
            'alert-type' => 'success'        
        );
        return redirect()->route('manage.product')->with($notification);

    }// End Method


    // Delete Products Multiple Images
    public function DeleteProductMultiImages($id){
        $image = MultiImg::findOrFail($id);
        @unlink(public_path($image->photo_name));
        $image->delete();
        return redirect()->back();
    }//End Function

    //Change The Product Status 
    public function ProductStatus($id){
        $status = Product::findOrFail($id);
        if($status->status == 1){
            $status->status = 0;
        }else{
            $status->status = 1;
        }
        $status->save();
        return redirect()->back();
    }

}

<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Carbon\Carbon;
use Image;

class SliderController extends Controller
{
    //
    public function SliderView(){
        $sliders = Slider::latest()->get();
        return view('backend.slider.slider_view',compact('sliders'));
    }

    public function SliderStore(Request $request){
        $request->validate([                // Data validation
            'slider_img' => 'required',
        ]);

        $image = $request->file('slider_img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(1200,470)->save('images/slider/'.$name_gen);
        $save_url = 'images/slider/'.$name_gen;
        if($request->status == NULL){
            $request->status = 0; 
        }
        Slider::insert([
            'slider_img' => $save_url,
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        $notification = array(
            'message' => 'Brand Inserted Successfuly',
            'alert-type' => 'success'        
        );

        return redirect()->back()->with($notification);
    }

    public function SliderDelete($id){
        $slider = Slider::findOrFail($id);
        @unlink(public_path($slider->slider_img));
        Slider::findOrFail($id)->delete();
        
        $notification = array(
            'message' => 'Brand Inserted Successfuly',
            'alert-type' => 'success'        
        );
        return redirect()->route('slider.view')->with($notification);       
    }
}

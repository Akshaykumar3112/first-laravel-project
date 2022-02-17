<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\models\User;
use Auth;
class IndexController extends Controller
{
    // index page view function
    public function index(){
        return view('frontend.index');
    }

    // Contact Us page view function
    public function contactUs(){
        return view('frontend.contactUs.contact_us');
    }

    // user logout function
    public function UserLogout(){
        Auth::logout();
        return redirect()->route('login');
    }

    //user edit profile view page function
    public function UserProfile(){
        $id = Auth::user()->id;
        $user = User::find($id); 
        return view('frontend.profile.user_profile',compact('user'));
    }

    // user profile update function
    public function UserProfileUpdate(Request $request){
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email; 
        $user->phone = $request->phone; 
        if($request->file('profilePhoto')){
            $file = $request->file('profilePhoto');
           // print_r($file);
            @unlink(public_path('images/user_images/'.$user->profile_image));
            $filename = rand(1,50000).$file->getClientOriginalName();
            $file->move(public_path('images/user_images'),$filename);
            $user['profile_image'] = $filename;
        }
        $user->save();

        $notification = array(
            'message' => 'Uder Profile Updated Successfully',
            'alert-type' => 'success');
        return redirect()->route('user.profile')->with($notification);
    }

    // User edit password view page function
    public function UserChangePassword(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.change_password',compact('user'));
    }

    // User change password function
    public function UserPasswordUpdate(Request $request){

        $validateData = $request->validate([
            'current_password' => 'required',
            'newPassword' => 'min:6|required_with:confirmPassword|same:confirmPassword',
            
        ]);
        $id = Auth::user()->id;
        $user = User::find($id);
        if(Hash::check($request->current_password,$user->password)){
            $user->password = Hash::make($request->newPassword);
            $user->save();
            return redirect()->route('user.logout');
        }else{
            return back()->with('error','Existing Password Does Not Match');
        }
    }

    
}


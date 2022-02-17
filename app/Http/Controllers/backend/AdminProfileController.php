<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Auth;
class AdminProfileController extends Controller
{
    //View Page For Admin Profile
    public function AdminProfile(){
        $id = auth::guard('admin')->id();
        $adminData = Admin::find($id);
        return view('admin.admin_Profile',compact('adminData'));
    }//End Function

    //View Page For Admin Profile Edit
    public function AdminProfileEdit(){
        $id = auth::guard('admin')->id();
        $editAdminData = Admin::find($id);
        return view('admin.admin_profile_edit',compact('editAdminData'));
    }//End Function

    // Update Function For Admin Profile
    public function AdminProfileUpdate(Request $request){
        $id = auth::guard('admin')->id();
        $data = Admin::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        if($request->file('profilePhoto')){
            $file = $request->file('profilePhoto');
            @unlink(public_path('images/admin_images/'.$data->profile_photo));
            $filename = rand(1,50000).$file->getClientOriginalName();
            $file->move(public_path('images/admin_images'),$filename);
            $data['profile_photo'] = $filename;
        }
        $data->save();
        return redirect()->route('admin.profile');
    }//End Function

    // View Change Password Page For Admin 
    public function AdminChangePassword(){
        return view('admin.admin_change_password');
    }// End Function

    // Change Password Function For Admin
    public function AdminNewPassword(Request $request){
        $validateData = $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'min:6|required_with:confirmPassword|same:confirmPassword',
            
        ]);
        $id = auth::guard('admin')->id();    
        $data = Admin::find($id);
        if(Hash::check($request->oldPassword,$data->password)){
            $data->password = Hash::make($request->newPassword);
            $data->save();
            return redirect()->route('admin.logout');
        }else{
            return back()->with('error','Existing Password Does Not Match');
        }
    }//End Function

}

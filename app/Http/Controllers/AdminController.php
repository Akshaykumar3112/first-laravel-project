<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
class AdminController extends Controller
{
    
    //View Admin LogIn Page
   public function Index(){
       return view('admin.admin_login');
   }//End Function

   //View Admin DashBoard
   public function Dashboard(){
        return view('admin.index');
    }//End Function
   
    // Admin LogIn Authentication 
    public function Login(Request $request){
        $check = $request->all();
        if(auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])){
            return redirect()->route('admin.dashboard')->with('error','Admin Login Successfully');
        }else{
            return back()->with('error','Invalid Email or Password');
        }
    }//End Function

    //Admin Logout
    public function AdminLogout(){
        Auth :: guard('admin')->logout();
        return redirect()->route('login_form')->with('error','Admin Logout Successfully');
    }//End Function
}

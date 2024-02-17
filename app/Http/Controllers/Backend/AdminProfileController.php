<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class AdminProfileController extends Controller
{
    public function AdminProfile(){
        $adminData = Auth::guard('admin')->user();
        if($adminData){
            return view('admin.admin_profile_view',compact('adminData'));
        }else{
            return redirect()->route('admin.login');
        }
        
    }
     public function AdminProfileEdit(){
        $EditAdminData = Auth::guard('admin')->user();
        if($EditAdminData){
            return view('admin.admin_profile_edit',compact('EditAdminData')); 
        }else{
            return redirect()->route('admin.login');
        }
       
    }

    public function AdminProfileStore(Request $request){
        $data = Auth::guard('admin')->user();
        if($data){
            $data->name = $request->name;
            $data->email = $request->email;
            if($request->file('profile_photo_path')){
                $file = $request->file('profile_photo_path');
                @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
                $filename = date('YmHi').$file->getClientOriginalName();
                $file->move(public_path('upload/admin_images'),$filename);
                $data['profile_photo_path'] = $filename;
            }
            $data->save();
            $notification = array(
                'message' => 'Admin đã được cập nhật',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.profile')->with($notification);
        }else{
                return redirect()->route('admin.login');
        }
        
    }

    public function AdminChangePassword(){
        return view('admin.admin_change_password');
    }

    public function AdminUpdatePassword(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',

        ]);
        $hashedPassword = Auth::guard('admin')->user()->password;;
        if(Hash::check($request->oldpassword,$hashedPassword)){
           $admin =  Auth::guard('admin')->user();
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');
        }else{
             return redirect()->back();
        }

    }



}

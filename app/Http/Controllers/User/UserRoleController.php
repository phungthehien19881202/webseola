<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Auth;
use Carbon\Carbon;

class UserRoleController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    public function UserRole(){
        $user = Admin::where('type',2)->get();
        return view('role.all_role',compact('user'));
    }
    public function UserCreate(){
        return view('role.create_role');
    }

    public function StoreCreateUser(Request $request){
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            $filename = date('YmHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['profile_photo_path'] = $filename;
        }

        $data['category'] = $request->category;
        $data['product'] = $request->product;
        $data['blog'] = $request->blog;
        $data['page'] = $request->page;
        $data['setting'] = $request->setting;
        $data['role'] = $request->role;
        $data['type'] = 2;
       Admin::insert($data);
         $notification = array(
            'message' => 'Admin đã được Thêm',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.all.user')->with($notification);
   
    }
    public function UserDelete($id){
        $user = Admin::find($id);
        
      
        if ($user->profile_photo_path != NULL) {
            @unlink(public_path('upload/admin_images/'.$user->profile_photo_path));
        } 

        $user->delete();
        $notification = array(
            'message' => 'Admin đã được xóa',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.all.user')->with($notification);
    }

    public function AdminUserEdit($id){

        $user = Admin::find($id);
        return view('role.edit_role',compact('user'));
    }

    public function AdminUserUpdate(Request $request){
        $admincu = Admin::find($request->id);
        $admincu->name = $request->name;
        $admincu->email = $request->email;
        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            if ($admincu->profile_photo_path != NULL) {
                @unlink(public_path('upload/admin_images/'.$admincu->profile_photo_path));
            }
            $filename = date('YmHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $admincu->profile_photo_path = $filename;
             
        }

        $admincu->category = $request->category;
        $admincu->product = $request->product;
        $admincu->blog = $request->blog;
        $admincu->page = $request->page;
        $admincu->setting = $request->setting;
        $admincu->role = $request->role;
        $admincu->created_at = Carbon::now();
        $admincu->save();
         $notification = array(
            'message' => 'Admin đã được cập nhật',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.all.user')->with($notification);

    }





}

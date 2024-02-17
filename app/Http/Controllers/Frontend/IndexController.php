<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\BlogPost;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    public function index(){
        $blogposts = BlogPost::latest()->limit(3)->get();
        return view('frontend.index',compact('blogposts'));
    }

    public function UserLogout(){
        Auth::logout();
        return Redirect()->route('login');
    }

    public function UserProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile',compact('user'));
    }
    public function UserProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            $filename = date('YmHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'User đã được cập nhật',
            'alert-type' => 'success'
        );
        return redirect()->route('dashboard')->with($notification);
    }

      public function UserChangePassword(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_change_password',compact('user'));
    }

    public function UserUpdatePassword(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',

        ]);
        $id = Auth::user()->id;
        $user = User::find($id);
        $hashedPassword = $user->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');
        }else{
             return redirect()->back();
        }
    }
    public function ProductDetails($slugcat,$slug,$id){
        $product = Product::findOrFail($id);
        $cat     = Category::where('category_slug_vn',$slugcat)->firstOrFail();

        if($product->subcategory_id != 0){
            $subcat  = SubCategory::findOrFail($product->subcategory_id);
        }else{
            $subcat="";
        }
     
        
        return view('frontend.product.product_details',compact('product','cat','subcat'));
    }


    
    // category wise data
    public function CatWiseProduct(Request $request, $slug){
        $categories = Category::where('category_slug_vn',$slug)->firstOrFail();
        $cat_id= $categories->id;
        $products = Product::where('status',1)->where('category_id',$cat_id)->orderBy('id','DESC')->paginate(16);
        
        
        return view('frontend.product.category_view',compact('products','categories'));
    }
    // Subcategory wise data
    public function SubCatWiseProduct($slug,$subslug){
        $subcategories = SubCategory::where('subcategory_slug',$subslug)->firstOrFail();
        $subcat_id = $subcategories->id;
        $categories = Category::where('category_slug_vn',$slug)->firstOrFail();
        $products = Product::where('status',1)->where('subcategory_id',$subcat_id)->orderBy('id','DESC')->paginate(16);
        return view('frontend.product.subcategory_view',compact('products','subcategories','categories'));

    }


    





}

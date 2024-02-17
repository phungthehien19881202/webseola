<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\MultiImg;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Image;
// use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    public function AddProduct()
    {
        $categories = Category::latest()->get();
        return view('backend.product.product_add',compact('categories'));
    }
    public function StoreProduct(Request $request){

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,1634)->save('upload/products/thambnail/'.$name_gen);
        $save_url = 'upload/products/thambnail/'.$name_gen;

        if($request->subcategory_id){
            $subcategoryid = $request->subcategory_id;
        }else{
             $subcategoryid = 0;
        }
        $str = Str::slug($request->product_name);
        $str = preg_replace('/[^A-Za-z0-9-]+/', '', $str);
        $request->validate([
            'product_name' => 'required|unique:products,product_name',
        ],[
            'product_name.required' => 'Bạn cần nhập tên sản phẩm',
            'product_name.unique' => 'Tên sản phẩm này đã tồn tại, hãy nhập tên khác',
        ]);

        $product_id = Product::insertGetId([
            'category_id' => $request->category_id,
            'subcategory_id' => $subcategoryid,
            'product_name' => $request->product_name,
            'product_slug' =>  strtolower(str_replace(' ', '-', $str)),
            'product_code' => $request->product_code,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'linkdemo' => $request->linkdemo,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'product_thambnail' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now(),   
        ]);
      ////////// Multiple Image Upload Start ///////////

        if($request->file('multi_img')){
            $images = $request->file('multi_img');
            foreach ($images as $img) {
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->save('upload/products/multi-image/'.$make_name);
            $uploadPath = 'upload/products/multi-image/'.$make_name;

            MultiImg::insert([
                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(), 

            ]);

          }
        }
      ////////// End Multiple Image Upload Start ///////////


       $notification = array(
            'message' => 'Thêm sản phẩm thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-product')->with($notification);

    }

    public function MultiImageAdd(Request $request){
        if($request->file('multi_img')){
           $images = $request->file('multi_img');
            $product_id = $request->id;
            foreach ($images as $img) {
                $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                Image::make($img)->save('upload/products/multi-image/'.$make_name);
                $uploadPath = 'upload/products/multi-image/'.$make_name;

                MultiImg::insert([
                    'product_id' => $product_id,
                    'photo_name' => $uploadPath,
                    'created_at' => Carbon::now(), 
                ]);
            }
            $notification = array(
                'message' => 'Thêm ảnh thành công',
                'alert-type' => 'success'
            ); 
        }else{
             $notification = array(
                'message' => 'Thêm ảnh thất bại',
                'alert-type' => 'error'
            ); 
        }
        

        return redirect()->back()->with($notification);
        
    }

    public function ManageProduct(){

        $products = Product::latest()->get();
        return view('backend.product.product_view',compact('products'));
    }

    public function EditProduct($id){

        $multiImgs = MultiImg::where('product_id',$id)->get();
        $categories = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $products = Product::findOrFail($id);
        return view('backend.product.product_edit',compact('categories','subcategory','products','multiImgs'));

    }
    public function ProductDataUpdate(Request $request){

        $product_id = $request->id;
        if($request->subcategory_id){
            $subcat = $request->subcategory_id;
        }else{
            $subcat = 0;
        }
        $str = Str::slug($request->product_name);
        $str = preg_replace('/[^A-Za-z0-9-]+/', '', $str);
        Product::findOrFail($product_id)->update([
        'category_id' => $request->category_id,
        'subcategory_id' => $subcat,
        'product_name' => $request->product_name,
        'product_slug' =>  strtolower(str_replace(' ', '-', $str)),
        'product_code' => $request->product_code,
        'selling_price' => $request->selling_price,
        'linkdemo' => $request->linkdemo,
        'discount_price' => $request->discount_price,
        'short_descp' => $request->short_descp,
        'long_descp' => $request->long_descp,        
        'status' => 1,
        'created_at' => Carbon::now(),   

      ]);

          $notification = array(
            'message' => 'Sản phẩm đã được cập nhật',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-product')->with($notification);


    } // end method 

    /// Multiple Image Update
    public function MultiImageUpdate(Request $request){
        
        if($request->multi_img){
            $imgs = $request->multi_img;
            foreach ($imgs as $id => $img) {
                $imgDel = MultiImg::findOrFail($id);
                unlink($imgDel->photo_name);
                 
                $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                Image::make($img)->save('upload/products/multi-image/'.$make_name);
                $uploadPath = 'upload/products/multi-image/'.$make_name;

                MultiImg::where('id',$id)->update([
                    'photo_name' => $uploadPath,
                    'updated_at' => Carbon::now(),

                ]);

            } // end foreach
        }
        

       $notification = array(
            'message' => 'Ảnh kèm theo của sản phẩm đã được cập nhật',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

        } // end mehtod 


        /// Product Main Thambnail Update /// 
    public function ThambnailImageUpdate(Request $request){
        $pro_id = $request->id;
        $oldImage = $request->old_img;
        unlink($oldImage);

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,1634)->save('upload/products/thambnail/'.$name_gen);
        $save_url = 'upload/products/thambnail/'.$name_gen;

        Product::findOrFail($pro_id)->update([
            'product_thambnail' => $save_url,
            'updated_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'Ảnh đại diện sản phẩm đã được cập nhật',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

     } // end method

     //// Multi Image Delete ////
     public function MultiImageDelete($id){
        $oldimg = MultiImg::findOrFail($id);
        unlink($oldimg->photo_name);
        MultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Xóa ảnh kèm theo thành công',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

     } // end method 

      public function ProductInactive($id){
        Product::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Sản phẩm đã bị ẩn',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
     }


      public function ProductActive($id){
        Product::findOrFail($id)->update(['status' => 1]);
            $notification = array(
                'message' => 'Sản phẩm đã hiển thị',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
            
         }

      public function ProductDelete($id){
        $product = Product::findOrFail($id);
        unlink($product->product_thambnail);
        Product::findOrFail($id)->delete();
        if(MultiImg::where('product_id',$id)->get()){
            $images = MultiImg::where('product_id',$id)->get();
            foreach ($images as $img) {
                unlink($img->photo_name);
                MultiImg::where('product_id',$id)->delete();
            }
        }
       

        $notification = array(
            'message' => 'Đã xóa sản phẩm',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

     }// end method 

}

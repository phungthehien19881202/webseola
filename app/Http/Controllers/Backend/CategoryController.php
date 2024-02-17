<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\MultiImg;
use Illuminate\Support\Str;
use Image;

class CategoryController extends Controller
{
   public function CategoryView(){
    $category = Category::latest()->get();
    $products = Product::latest()->get();
    return view('backend.category.category_view',compact('category','products'));
   }

   public function CategoryAdd(){
    return view('backend.category.category_add');
   }

   public function CategoryStore(Request $request){
        $request->validate([
            'category_name_vn'=>'required|unique:categories,category_name_vn',
        ],[
            'category_name_vn.required' => 'Bạn hãy điền thông tin',
            'category_name_vn.unique' => 'Tên danh mục đã tồn tại. Vui lòng chọn một tên khác.',


        ]);
        $image = $request->file('category_icon');
        if(!empty($image)){
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/category/'.$name_gen);
            $save_url = 'upload/category/'.$name_gen;
        }else{
            $save_url='';
        }
        

         // Chuyển chuỗi thành không dấu
        $str = Str::slug($request->category_name_vn);

        // Xóa các kí tự không mong muốn khỏi chuỗi
        $str = preg_replace('/[^A-Za-z0-9-]+/', '', $str);

        Category::insert([
        'category_name_vn' => $request->category_name_vn,
        'category_slug_vn' => strtolower(str_replace(' ', '-',$str)),
        'category_content' => $request->category_content,
        'category_icon' => $save_url,

        ]);

        $notification = array(
            'message' => 'Thêm Category thành công',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


   }
    public function CategoryEdit($id){
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit',compact('category'));

    }

    public function CategoryUpdate(Request $request){
        
        $category_id = $request->id;
        $old_img = $request->old_image;
        $str = Str::slug($request->category_name_vn);
        $str = preg_replace('/[^A-Za-z0-9-]+/', '', $str);

        if ($request->file('category_icon')) {
            if($old_img!=''){
                 unlink($old_img);
            }
            $image = $request->file('category_icon');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/category/'.$name_gen);
            $save_url = 'upload/category/'.$name_gen;

            Category::findOrFail($category_id)->update([
            'category_name_vn' => $request->category_name_vn,
            'category_slug_vn' => strtolower(str_replace(' ', '-',$str)),
            'category_content' => $request->category_content,
            'category_icon' => $save_url,
            ]);

            $notification = array(
                'message' => 'Danh mục được cập nhật thành công',
                'alert-type' => 'info'
            );

            return redirect()->route('all.category')->with($notification);

        }else{

            Category::findOrFail($category_id)->update([
            'category_name_vn' => $request->category_name_vn,
            'category_slug_vn' => strtolower(str_replace(' ', '-',$str)),
            'category_content' => $request->category_content,

            ]);

            $notification = array(
                'message' => 'Danh mục được cập nhật thành công',
                'alert-type' => 'info'
            );

            return redirect()->route('all.category')->with($notification);

        } // end else 
    } // end method 


     public function CategoryDelete($id){

        $category = Category::findOrFail($id);
        $img = $category->category_icon;
        if($img!=''){
            unlink($img);
        }
        if(Product::where('category_id',$id)->get()){
            $products = Product::where('category_id',$id)->get();
            foreach ($products as $product) {
                unlink($product->product_thambnail);
                if(MultiImg::where('product_id',$product->id)->get()){
                    $images = MultiImg::where('product_id',$product->id)->get();
                    foreach ($images as $img) {
                        unlink($img->photo_name);
                        MultiImg::where('product_id',$product->id)->delete();
                    }
                }
                $product->delete();
            }
        }
       
       if(SubCategory::where("category_id", $id)->get()){
            $subcats = SubCategory::where("category_id", $id)->get();
            foreach ($subcats as $subcat) {
                $subcat->delete();
            }
       }
        Category::findOrFail($id)->delete();
         $notification = array(
            'message' => 'Xóa danh mục thành công',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);

    } // end method 








}

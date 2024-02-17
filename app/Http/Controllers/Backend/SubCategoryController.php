<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\MultiImg;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
     public function GetSubCategory($category_id){

        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();
        return json_encode($subcat);
     }


     public function SubCategoryView(){
        $products = Product::latest()->get();
        $subcategory = SubCategory::latest()->get();
        return view('backend.category.subcategory_view',compact('subcategory','products'));

    }
    public function SubCategoryAdd(){
        $categories = Category::orderBy('category_name_vn','ASC')->get();
        return view('backend.category.subcategory_add',compact('categories'));
    }
    public function SubCategoryStore(Request $request){
        $str = Str::slug($request->subcategory_name);
        $str = preg_replace('/[^A-Za-z0-9-]+/', '', $str);
       $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required|unique:sub_categories,subcategory_name',
        ],[
            'category_id.required' => 'Bạn cần chọn danh mục cha',
            'subcategory_name.required' => 'Bạn cần nhập tên danh mục con',
            'subcategory_name.unique' => 'Tên danh mục con này đã tồn tại hãy chọn 1 tên khác',
        ]);
         
       SubCategory::insert([
        'category_id' => $request->category_id,
        'subcategory_name' => $request->subcategory_name,
        'subcategory_slug' => strtolower(str_replace(' ', '-',$str)),
        'subcategory_content' => $request->subcategory_content,
        ]);

        $notification = array(
            'message' => 'Danh mục con đã được thêm thành công',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // end method 

     public function SubCategoryEdit($id){
        $categories = Category::orderBy('category_name_vn','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.category.subcategory_edit',compact('subcategory','categories'));

    }

     public function SubCategoryUpdate(Request $request){

        $subcat_id = $request->id;
        $str = Str::slug($request->subcategory_name);
        $str = preg_replace('/[^A-Za-z0-9-]+/', '', $str);
        SubCategory::findOrFail($subcat_id)->update([
        'category_id' => $request->category_id,
        'subcategory_name' => $request->subcategory_name,
        'subcategory_slug' => strtolower(str_replace(' ', '-',$str)),
        'subcategory_content' => $request->subcategory_content,
        ]);

        $notification = array(
            'message' => 'Danh mục con đã được cập nhật',
            'alert-type' => 'info'
        );

        return redirect()->route('all.subcategory')->with($notification);

    }  // end method
    public function SubCategoryDelete($id){
        if(Product::where('subcategory_id',$id)->get()){
            $products = Product::where('subcategory_id',$id)->get();
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
        

        SubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Danh mục con đã được xóa',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }


}

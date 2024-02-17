<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\BlogPostCategory;
use App\Models\BlogPost;
use App\Models\MultiImgBlog;
use Illuminate\Support\Str;
use Image;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function BlogCategory(){
        $posts = BlogPost::latest()->get();
        $blogcategory = BlogPostCategory::latest()->get();
        return view('backend.blog.category.category_view',compact('blogcategory','posts'));
    }

    public function BlogCategoryStore(Request $request){

        $str = Str::slug($request->blog_category_name);
        $str = preg_replace('/[^A-Za-z0-9-]+/', '', $str);
        $request->validate([
            'blog_category_name' => 'required|unique:blog_post_categories,blog_category_name',
        ],[
            'blog_category_name.required' => 'Bạn cần nhập tên chuyên mục',
            'blog_category_name.unique' => 'Chuyên mục đã tồn tại',
        ]);

        BlogPostCategory::insert([
        'blog_category_name' => $request->blog_category_name,
        'tieu_de_seo' => $request->tieu_de_seo,
        'meta_des' => $request->meta_des,
        'keyword' => $request->keyword,
        'blog_category_slug' => strtolower(str_replace(' ', '-',$str)),
        'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Chuyên mục đã thêm thành công',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
    public function BlogCategoryEdit($id){

        $blogcategory = BlogPostCategory::findOrFail($id);
        return view('backend.blog.category.category_edit',compact('blogcategory'));
    }
    public function BlogCategoryUpdate(Request $request){
        $str = Str::slug($request->blog_category_name);
        $str = preg_replace('/[^A-Za-z0-9-]+/', '', $str);
       $blogcar_id = $request->id;
        BlogPostCategory::findOrFail($blogcar_id)->update([
        'blog_category_name' => $request->blog_category_name,
        'tieu_de_seo' => $request->tieu_de_seo,
        'meta_des' => $request->meta_des,
        'keyword' => $request->keyword,
        'blog_category_slug' => strtolower(str_replace(' ', '-',$str)),
        'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Chuyên mục đã được cập nhật',
            'alert-type' => 'info'
        );

        return redirect()->route('blog.category')->with($notification);

    } 

    public function BlogCategoryDelete($id){
        if(BlogPost::where("category_id", $id)->get()){
            $posts = BlogPost::where("category_id", $id)->get();
             foreach ($posts as $post) {
                unlink($post->post_image);
                if(MultiImgBlog::where('post_id',$post->id)->get()){
                    $images = MultiImgBlog::where('post_id',$post->id)->get();
                    foreach ($images as $img) {
                        unlink($img->photo_name);
                        MultiImgBlog::where('post_id',$post->id)->delete();
                    } 
                }
                $post->delete();
            }
        }
        
        BlogPostCategory::findOrFail($id)->delete();
       
         $notification = array(
            'message' => 'Xóa chuyên mục thành công',
            'alert-type' => 'info'
        );
        return redirect()->route('blog.category')->with($notification);

    } // end method 

    public function ListBlogPost(){
      $blogpost = BlogPost::with('category')->latest()->get();
      return view('backend.blog.post.post_list',compact('blogpost'));
  }
     public function AddBlogPost(){
        $blogcategory = BlogPostCategory::latest()->get();
        $blogpost = BlogPost::latest()->get();
        return view('backend.blog.post.post_view',compact('blogpost','blogcategory'));

      }   
     public function BlogPostStore(Request $request){

        $request->validate([
            'post_title' => 'required|unique:blog_posts,post_title',
            'post_image' => 'required',
            'category_id' => 'required',
        ],[
            'post_title.required' => 'Bạn cần nhập tiêu đề',
            'post_title.unique' => 'Tiêu đề đã tồn tại',
            'category_id.required' => 'Bạn cần chọn chuyên mục',
        ]);
        $str = Str::slug($request->post_title);
        $str = preg_replace('/[^A-Za-z0-9-]+/', '', $str);
        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->save('upload/post/thambnail/'.$name_gen);
        $save_url = 'upload/post/thambnail/'.$name_gen;

        $post_id = BlogPost::insertGetId([
        'category_id' => $request->category_id,
        'post_title' => $request->post_title,
        'tieu_de_seo' => $request->tieu_de_seo,
        'meta_des' => $request->meta_des,
        'keyword' => $request->keyword,
        'post_slug' => strtolower(str_replace(' ', '-',$str)),
        'post_image' => $save_url,
        'post_details' => $request->post_details,
        'created_at' => Carbon::now(),

        ]);
        if($request->file('multi_img_post')){
             $images = $request->file('multi_img_post');
            foreach ($images as $img) {
                $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                Image::make($img)->save('upload/post/multi-image/'.$make_name);
                $uploadPath = 'upload/post/multi-image/'.$make_name;

                MultiImgBlog::insert([
                    'post_id' => $post_id,
                    'photo_name' => $uploadPath,
                    'created_at' => Carbon::now(), 

                ]);

              }

        }
           
           

        $notification = array(
            'message' => 'Thêm bài viết thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('list.post')->with($notification);

  } // end mehtod 


    public function EditBlogPost($id){

        $multiImgs = MultiImgBlog::where('post_id',$id)->get();
        $categories = BlogPostCategory::latest()->get();
        $post = BlogPost::findOrFail($id);
        return view('backend.blog.post.post_edit',compact('categories','post','multiImgs'));

    }

    public function DataBlogPostUpdate(Request $request){

        $post_id = $request->id;
        $str = Str::slug($request->post_title);
        $str = preg_replace('/[^A-Za-z0-9-]+/', '', $str);
        BlogPost::findOrFail($post_id)->update([
        'category_id' => $request->category_id,
        'post_title' => $request->post_title,
        'tieu_de_seo' => $request->tieu_de_seo,
        'keyword' => $request->keyword,
        'meta_des' => $request->meta_des,
        'post_slug' =>  strtolower(str_replace(' ', '-', $str)),
        'post_details' => $request->post_details,
        'created_at' => Carbon::now(),   

      ]);
          $notification = array(
            'message' => 'Bài viết đã được cập nhật',
            'alert-type' => 'success'
        );
        return redirect()->route('list.post')->with($notification);


    } // end method 

       /// post Main Thambnail Update /// 
    public function ThambnailImageUpdate(Request $request){
        $pro_id = $request->id;
        $oldImage = $request->old_img;
        unlink($oldImage);

        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->save('upload/post/thambnail/'.$name_gen);
        $save_url = 'upload/post/thambnail/'.$name_gen;

        BlogPost::findOrFail($pro_id)->update([
            'post_image' => $save_url,
            'updated_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'Ảnh đại diện bài viết đã được cập nhật',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

     } // end method

    public function MultiImageUpdateBlog(Request $request){
        if ($request->multi_img) {
            $imgs = $request->multi_img;

            foreach ($imgs as $id => $img) {
                $imgDel = MultiImgBlog::findOrFail($id);
                unlink($imgDel->photo_name);
                 
                $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                Image::make($img)->save('upload/post/multi-image/'.$make_name);
                $uploadPath = 'upload/post/multi-image/'.$make_name;

                MultiImgBlog::where('id',$id)->update([
                    'photo_name' => $uploadPath,
                    'updated_at' => Carbon::now(),

                ]);

             } // end foreach
        }
           $notification = array(
                'message' => 'Ảnh kèm theo của post đã được cập nhật',
                'alert-type' => 'info'
            );

            return redirect()->back()->with($notification);

        } // end mehtod 

     public function MultiImageDeleteBlog($id){
        $oldimg = MultiImgBlog::findOrFail($id);
        unlink($oldimg->photo_name);
        MultiImgBlog::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Xóa ảnh kèm theo thành công',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

     } // end method 

     public function MultiImageAddBlog(Request $request){
        if($request->file('multi_img')){
           $images = $request->file('multi_img');
            $post_id = $request->id;
            foreach ($images as $img) {
                $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                Image::make($img)->save('upload/post/multi-image/'.$make_name);
                $uploadPath = 'upload/post/multi-image/'.$make_name;

                MultiImgBlog::insert([
                    'post_id' => $post_id,
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




   public function BlogPostDelete($id){
        $post = BlogPost::findOrFail($id);
        unlink($post->post_image);
        BlogPost::findOrFail($id)->delete();
        if(MultiImgBlog::where('post_id',$id)->get()){
            $images = MultiImgBlog::where('post_id',$id)->get();
            foreach ($images as $img) {
                unlink($img->photo_name);
                MultiImgBlog::where('post_id',$id)->delete();
            }
        }
        $notification = array(
            'message' => 'Đã xóa sản phẩm',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

     }// end method 



}

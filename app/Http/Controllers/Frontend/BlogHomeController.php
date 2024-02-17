<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\Blog\BlogPostCategory;
use Illuminate\Support\Str;
use Parsedown;


class BlogHomeController extends Controller
{
     public function CatWiseBlog($slugblog){
       $blogcategory = BlogPostCategory::where('blog_category_slug',$slugblog)->firstOrFail();
       $cat_id= $blogcategory->id;
      $blogposts = BlogPost::where('category_id',$cat_id)->orderBy('id','DESC')->paginate(12);
        return view('frontend.blog.blog_list',compact('blogposts','blogcategory'));
    } 

    public function PostDetails($slugpost){
        $post = BlogPost::where('post_slug',$slugpost)->firstOrFail();
        $blogcategory     = BlogPostCategory::where('id',$post->category_id)->firstOrFail();
        $parsedown = new Parsedown();
        $html = $parsedown->text($post->post_details);
        $toc = [];
         preg_match_all('/<h([1-6])>(.*?)<\/h\1>/', $html, $matches, PREG_SET_ORDER);
        foreach ($matches as $match) {
            $level = $match[1];
            $text = strip_tags($match[2]);
            $id= Str::slug($text);
            
            // Thêm ID vào tiêu đề trong HTML
            $html = str_replace($match[0], "<h{$level} id=\"{$id}\">{$match[2]}</h{$level}>", $html);

            // Thêm mục vào bảng định mức nội dung
            $toc[] = "<li><a href=\"#{$id}\">{$text}</a></li>";
        }

        return view('frontend.blog.blog_details',compact('post','blogcategory','html','toc'));
    }




}

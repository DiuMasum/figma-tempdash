<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function AddBlog(){
        $categories = Category::latest()->get();

        return view('admin.addblog', compact('categories'));
    }

    public function AllBlog(){
        $blogs = Blog::latest()->get();

        return view('admin.allblog', compact('blogs'));
    }

    public function StoreBlog(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories',
            'blog_title' => 'required',
            'author_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'author_name' => 'required',
            'date' => 'required',
            'blog_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'blog_description' => 'required',
        ]);

        $image1 = $request->file('author_img');
        $img_name1 = hexdec(uniqid()).'.'. $image1->getClientOriginalExtension();
        $request->author_img->move(public_path('upload'), $img_name1);
        $img_url1 = 'upload/' . $img_name1;

        $image2 = $request->file('blog_img');
        $img_name2 = hexdec(uniqid()).'.'. $image2->getClientOriginalExtension();
        $request->blog_img->move(public_path('upload'), $img_name2);
        $img_url2 = 'upload/' . $img_name2;

        $category_id = $request->category_name;

        $category_name = Category::where('id', $category_id)->value('category_name');

        Blog::insert([
            'category_name' => $category_name,
            'blog_title' => $request -> blog_title,
            'author_img' => $img_url1,
            'author_name' => $request -> author_name,
            'date' => $request -> date,
            'blog_img' => $img_url2,
            'blog_description' => $request -> blog_description,
        ]);

        return redirect()->route('allblog')->with('message', 'Blog Posted Successfully!');
    }

    public function EditBlog($id){
        $blog_info = Blog::findOrFail($id);

        return view('admin.editblog', compact('blog_info'));
    }

    public function UpdateBlog(Request $request){
        $request->validate([
            'blog_title' => 'required',
            'date' => 'required',
            'blog_description' => 'required',
        ]);

        $blog_id =$request->blog_id;

        Blog::findOrFail($blog_id)->update([
            'blog_title' => $request->blog_title,
            'date' => $request->date,
            'blog_description' => $request->blog_description,
        ]);

        return redirect()->route('allblog')->with('message', 'Blog Updated Successfully!!');
    }

    public function DeleteBlog($id){
        Blog::findOrFail($id)->delete();

        return redirect()->route('allblog')->with('message', 'Blog deleted Successfully!!');
    }
}

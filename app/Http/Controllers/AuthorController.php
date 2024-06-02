<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function AddAuthor(){
        return view('admin.addauthor');
    }

    public function AllAuthor(){
        $authors = Author::latest()->get();

        return view('admin.allauthor', compact('authors'));
    }

    public function StoreAuthor(Request $request){
        $request->validate([
            'author_name' => 'required|unique:authors',
            'designation' => 'required',
            'author_description' => 'required',
            'facebokk_link' => 'required',
            'author_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $image3 = $request->file('author_img');
        $img_name3 = hexdec(uniqid()).'.'. $image3->getClientOriginalExtension();
        $request->author_img->move(public_path('upload'), $img_name3);
        $img_url3 = 'upload/' . $img_name3;

        Author::insert([
            'author_name' => $request -> author_name,
            'designation' => $request -> designation,
            'author_description' => $request -> author_description,
            'facebokk_link' => $request -> facebokk_link,
            'twitter_link' => $request -> twitter_link,
            'instagram_link' => $request -> instagram_link,
            'youtube_link' => $request -> youtube_link,
            'author_img' => $img_url3
        ]);

        return redirect()->route('allauthor')->with('messagge', 'New Author added successfully!!');
    }

    public function EditAuthor($id){
        $author_info = Author::findOrFail($id);

        return view('admin.editauthor', compact('author_info'));
    }

    public function UpdateAuthor(Request $request){
        $request->validate([
            'author_name' => 'required|unique:authors',
            'designation' => 'required',
            'author_description' => 'required',
            'facebokk_link' => 'required'
        ]);

        $author_id = $request->author_id;

        Author::findOrFail($author_id)->update([
            'author_name' => $request -> author_name,
            'designation' => $request -> designation,
            'author_description' => $request -> author_description,
            'facebokk_link' => $request -> facebokk_link
        ]);

        return redirect()->route('allauthor')->with('message', 'Author info updated successfully!');
    }

    public function DeleteAuthor($id){
        Author::findOrFail($id)->delete();

        return redirect()->route('allauthor')->with('message', 'author info deleted successfully');
    }
}

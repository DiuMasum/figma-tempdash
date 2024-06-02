<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function EmaiLlist(){
        $emails = Newsletter::latest()->get();

        return view('admin.emaillist', compact('emails'));
    }

    public function Newsletter(Request $request){
        $request->validate([
            'email' => 'required|unique:newsletters'
        ]);

        Newsletter::insert([
            'email' => $request->email
        ]);

        return redirect()->route('')->with('message', 'Your email submitted succesfully!');
    }

    public function DeleteEmail($id){
        Newsletter::findOrFail($id)->delete();

        return redirect()->route('emaillist');
    }
}
